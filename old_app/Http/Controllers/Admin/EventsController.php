<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Event;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use Str;
use DataTables;
class EventsController extends Controller
{
    public function index(){
        return view('admin.event.index');
    }

    public function createEvent(){
        return view('admin.event.create');
    }

    public function EventStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type'        => 'nullable|string|max:255',
            'title'       => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'address'     => 'required|string|max:255',
            'start_date'  => 'required|date',
            'end_date'    => 'required|date',
            'status'      => 'nullable|in:Active,In-Active',
            'image'       => 'required|file|mimes:jpg,jpeg,png,webp|max:2048',
            'alt'         => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Please fix the validation errors.');
        }

        try {
            // Define upload path
            $uploadPath = public_path('admin/events/');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            $ImagePath = null;

            // Handle image upload
            if ($request->hasFile('image')) {
                $Image = $request->file('image');
                $Name = \Str::slug(pathinfo($Image->getClientOriginalName(), PATHINFO_FILENAME))
                    . '-' . uniqid() . '.' . $Image->getClientOriginalExtension();
                $SavePath = $uploadPath . $Name;

                if ($request->has('compress')) {
                    $manager = new ImageManager(new \Intervention\Image\Drivers\Gd\Driver());
                    $image = $manager->read($Image->getRealPath());
                    $image->toJpeg(75)->save($SavePath);
                } else {
                    $Image->move($uploadPath, $Name);
                }

                $ImagePath = 'public/admin/events/' . $Name;
            }
            $type = (strtotime($request->end_date) >= strtotime(date('Y-m-d'))) ? 'upcoming' : 'past';
            // Save event
            Event::create([
                'type'        => $type,
                'title'       => $request->title,
                'description' => $request->description,
                'address'     => $request->address,
                'start_date'  => date('Y-m-d', strtotime($request->start_date)),
                'end_date'    => date('Y-m-d', strtotime($request->end_date)),
                'status'      => $request->status,
                'image'       => $ImagePath,
                'alt'         => $request->alt,
            ]);

            return redirect()->route('event')->with('success', 'Event created successfully!');
        } catch (\Exception $e) {
            \Log::error('EventStore error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to create event: ' . $e->getMessage());
        }
    }


    public function getEventData()
    {
        $event = Event::whereNull('deleted_at')->select([
        'id', 'type', 'title', 'description', 'address','start_date','end_date', 'status', 'alt'])->get();
        return DataTables::of($event)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                
                $editUrl = route('event.edit', $row->id);
                return '
                    <a href="' . $editUrl . '" class="btn btn-outline-primary btn-sm">
                        <i class="icofont-edit"></i>
                    </a>
                    <button type="button" class="btn btn-outline-danger btn-sm delete_event" data-id="' . $row->id . '">
                        <i class="icofont-ui-delete"></i>
                    </button>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function EditEvent($id){
        $event = Event::find($id);
        return view('admin.event.edit' , compact('event'));
    }

    public function DestoryEvent($id){
        $event = Event::find($id);
        if(empty($event)){
            return response()->json([
                'result' => false,
                "message" => "Event Not Found."
            ]);
        }
        $event->delete();
        return response()->json([
            'result' => true,
            'message' => "Data Deleted."
        ]);
    }


   public function UpdateEvent(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            // 'type'        => 'required|string|max:255',
            'title'       => 'required|string|max:255',
        // 'description' => 'required|string|max:500',
            'address'     => 'required|string|max:255',
            'start_date'  => 'required|date',
            'end_date'    => 'required|date',
            'status'      => 'nullable|in:Active,In-Active',
            'image'       => 'nullable|file|mimes:jpg,jpeg,png,webp|max:2048', // make optional
            'alt'         => 'required|string|max:255',
            'description'       => [
                    'required',
                    'string',
                    function ($attribute, $value, $fail) {
                        // remove all HTML tags and whitespace
                        $plainText = trim(strip_tags($value));
                        if ($plainText === '') {
                            $fail("Description cannot be blank.");
                        }
                    },
                ],
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Please correct the highlighted errors.');
        }

        try {
            $event = Event::findOrFail($id);

            $uploadPath = public_path('admin/events/');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            $ImagePath = $event->image;

            // If new image uploaded
            if ($request->hasFile('image')) {
                if ($event->image && file_exists(public_path(str_replace('public/', '', $event->image)))) {
                    unlink(public_path(str_replace('public/', '', $event->image)));
                }

                $Image = $request->file('image');
                $Name = \Str::slug(pathinfo($Image->getClientOriginalName(), PATHINFO_FILENAME))
                    . '-' . uniqid() . '.' . $Image->getClientOriginalExtension();
                $SavePath = $uploadPath . $Name;

                if ($request->has('compress')) {
                    $manager = new ImageManager(new \Intervention\Image\Drivers\Gd\Driver());
                    $image = $manager->read($Image->getRealPath());
                    $image->toJpeg(75)->save($SavePath);
                } else {
                    $Image->move($uploadPath, $Name);
                }

                $ImagePath = 'public/admin/events/' . $Name;
            }

            // Update event
            $event->update([
                // 'type'        => $request->type,
                'title'       => $request->title,
                'description' => $request->description,
                'address'     => $request->address,
                'start_date'  => date('Y-m-d', strtotime($request->input('start_date'))),
                'end_date'    => date('Y-m-d', strtotime($request->input('end_date'))),
                'status'      => $request->status,
                'image'       => $ImagePath,
                'alt'         => $request->alt,
            ]);

            return redirect()->route('event')->with('success', 'Event updated successfully!');
        } catch (\Exception $e) {
            \Log::error('Event update failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to update event: ' . $e->getMessage());
        }
    }


}
