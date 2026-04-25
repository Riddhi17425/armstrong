<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Milestone;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use Str;
use DataTables;
class MileStoneController extends Controller
{
    public function index(){
        return view('admin.milestone.index');
    }

    public function createMilestone(){
        return view('admin.milestone.create');
    }

    public function MilestoneStore(Request $request)
    {
        // Validation for image upload (not PDF)
        $validator = Validator::make($request->all(), [
            'milestone_year'    => 'required|string|max:255',
            'milestone_desc'    => 'required|string|max:500',
            'milestone_title'   => 'required|string|max:255',
            'milestone_status'  => 'nullable|in:Active,In-Active',
            'milestone_alt'     => 'required|string|max:255',
            'milestone_image'   => 'required|file|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Please fix the validation errors.');
        }

        try {
            $imagePath = null;

            if ($request->hasFile('milestone_image')) {
            $imageFile = $request->file('milestone_image');

            // Correct extension detection
            $extension = $imageFile->guessExtension() ?? 'png';

            $originalName = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
            $sanitizedOriginal = \Str::slug($originalName);
            $uniqueName = $sanitizedOriginal . '-' . uniqid() . '.' . $extension;

            $uploadPath = public_path('admin/milestone/');
            $savePath = $uploadPath . $uniqueName;

            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            if ($request->has('compress')) {
                $manager = new \Intervention\Image\ImageManager(new \Intervention\Image\Drivers\Gd\Driver());
                $image = $manager->read($imageFile->getRealPath());

                // Save as jpeg regardless of original extension
                $image->toJpeg(75)->save($savePath);
            } else {
                $imageFile->move($uploadPath, $uniqueName);
            }

            $imagePath = 'public/admin/milestone/' . $uniqueName;
        }

            // Now create the milestone
            $milestone = Milestone::create([
                'year'   => $request->milestone_year,
                'description'   => $request->milestone_desc,
                'status' => $request->milestone_status,
                'title'  => $request->milestone_title,
                'alt_tag'    => $request->milestone_alt,
                'image'  => $imagePath,
            ]);
            return redirect()->route('milestone')->with('success', 'Milestone created successfully!');
        } catch (\Exception $e) {
            \Log::error('MilestoneStore error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to create milestone: ' . $e->getMessage());
        }
    }

    public function getMilestoneData()
    {
        $milestone = Milestone::whereNull('deleted_at')->get(); 
        // return $milestone;
        return DataTables::of($milestone)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                
                $editUrl = route('milestone.edit', $row->id);
                return '
                    <a href="' . $editUrl . '" class="btn btn-outline-primary btn-sm">
                        <i class="icofont-edit"></i>
                    </a>
                    <button type="button" class="btn btn-outline-danger btn-sm delete_milestone" data-id="' . $row->id . '">
                        <i class="icofont-ui-delete"></i>
                    </button>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function EditMilestone($id){
        $milestone = Milestone::find($id);
        return view('admin.milestone.edit' , compact('milestone'));
    }

    public function DestoryMilestone($id){
        $milestone = Milestone::find($id);
        if(empty($milestone)){
            return response()->json([
                'result' => false,
                "message" => "Product Not Found."
            ]);
        }
        $milestone->delete();
        return response()->json([
            'result' => true,
            'message' => "Data Deleted."
        ]);
    }


    public function UpdateMilestone(Request $request, $id)
    {
        // 1. Validate the request
        $validator = Validator::make($request->all(), [
            'milestone_year'    => 'required|string|max:255',
            'milestone_desc'    => 'required|string|max:500',
            'milestone_title'   => 'required|string|max:255',
            'milestone_status'  => 'required|in:Active,In-Active',
            'milestone_alt'     => 'required|string|max:255',
            'milestone_image'   => 'nullable|file|mimes:jpg,jpeg,png,webp|max:2048', 

            'milestone_desc'       => [
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
            // 2. Find the milestone
            $milestone = Milestone::findOrFail($id);

            $imagePath = $milestone->image;

            // 3. Handle new image upload (replace old one if new image is uploaded)
            if ($request->hasFile('milestone_image')) {
                $imageFile = $request->file('milestone_image');
                $extension = $imageFile->guessExtension() ?? 'jpg';
                $originalName = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $sanitizedOriginal = \Str::slug($originalName);
                $uniqueName = $sanitizedOriginal . '-' . uniqid() . '.' . $extension;

                $uploadPath = public_path('admin/milestone/');
                $savePath = $uploadPath . $uniqueName;

                if (!file_exists($uploadPath)) {
                    mkdir($uploadPath, 0755, true);
                }

                // Delete old image file if it exists
                if ($imagePath && file_exists(public_path($imagePath))) {
                    @unlink(public_path($imagePath));
                }

                if ($request->has('compress')) {
                    $manager = new \Intervention\Image\ImageManager(new \Intervention\Image\Drivers\Gd\Driver());
                    $image = $manager->read($imageFile->getRealPath());
                    $image->toJpeg(75)->save($savePath);
                } else {
                    $imageFile->move($uploadPath, $uniqueName);
                }

                $imagePath = 'public/admin/milestone/' . $uniqueName;
            }

            // 4. Update milestone data
            $milestone->update([
                'year'        => $request->milestone_year,
                'title'       => $request->milestone_title,
                'description' => $request->milestone_desc,
                'status'      => $request->milestone_status,
                'alt_tag'     => $request->milestone_alt,
                'image'       => $imagePath,
            ]);

            return redirect()->route('milestone')->with('success', 'Milestone updated successfully!');
        } catch (\Exception $e) {
            \Log::error('Milestone update failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to update milestone: ' . $e->getMessage());
        }
    }

}
