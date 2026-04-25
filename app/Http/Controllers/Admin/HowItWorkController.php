<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\HowItWork;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use Str;
use DataTables;
class HowItWorkController extends Controller
{
    public function index(){
        return view('admin.how_it_work.index');
    }

    public function create(){
        return view('admin.how_it_work.create');
    }

   public function Store(Request $request)
{
    // Validate input
    $validator = Validator::make($request->all(), [
        'howitwork_desc'    => 'required|string|max:500',
        'howitwork_title'   => 'required|string|max:255',
        'howitwork_status'  => 'nullable|in:Active,In-Active',
        'howitwork_alt'     => 'required|string|max:255',
        'howitwork_image'   => 'required|file|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput()
            ->with('error', 'Please fix the validation errors.');
    }

    try {
        $imagePath = null;

        if ($request->hasFile('howitwork_image')) {
            $imageFile = $request->file('howitwork_image');
            $extension = $imageFile->guessExtension() ?? 'png';
            $originalName = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
            $sanitizedOriginal = \Str::slug($originalName);
            $uniqueName = $sanitizedOriginal . '-' . uniqid() . '.' . $extension;

            $uploadPath = public_path('admin/howitwork_image/');
            $savePath = $uploadPath . $uniqueName;

            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            if ($request->has('compress')) {
                $manager = new \Intervention\Image\ImageManager(new \Intervention\Image\Drivers\Gd\Driver());
                $image = $manager->read($imageFile->getRealPath());
                $image->toJpeg(75)->save($savePath);
            } else {
                $imageFile->move($uploadPath, $uniqueName);
            }

            $imagePath = 'public/admin/howitwork_image/' . $uniqueName;
        }

        // Create HowItWork record (Correct field names)
        HowItWork::create([
            'title'       => $request->howitwork_title,
            'description' => $request->howitwork_desc,
            'status'      => $request->howitwork_status ?? 'Active',
            'alt_tag'     => $request->howitwork_alt,
            'image'       => $imagePath,
        ]);

        return redirect()->route('howitwork')->with('success', 'Record added successfully!');
    } catch (\Exception $e) {
        \Log::error('HowItWork Store Error: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Failed to save: ' . $e->getMessage());
    }
}   

    public function getData()
    {
        $howitwork = HowItWork::whereNull('deleted_at')->get();
        return DataTables::of($howitwork)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                
                $editUrl = route('howitwork.edit', $row->id);
                return '
                    <a href="' . $editUrl . '" class="btn btn-outline-primary btn-sm">
                        <i class="icofont-edit"></i>
                    </a>
                    <button type="button" class="btn btn-outline-danger btn-sm delete_howitwork" data-id="' . $row->id . '">
                        <i class="icofont-ui-delete"></i>
                    </button>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function Edit($id){
        $howitwork = HowItWork::find($id);
        return view('admin.how_it_work.edit' , compact('howitwork'));
    }

    public function Destory($id){
        $howitwork = HowItWork::find($id);
        if(empty($howitwork)){
            return response()->json([
                'result' => false,
                "message" => "Product Not Found."
            ]);
        }
        $howitwork->delete();
        return response()->json([
            'result' => true,
            'message' => "Data Deleted."
        ]);
    }


    public function Update(Request $request, $id)
    {
        // 1. Validate the request
        $validator = Validator::make($request->all(), [
            'howitwork_desc'    => 'required|string|max:500',
            'howitwork_title'   => 'required|string|max:255',
            'howitwork_status'  => 'required|in:Active,In-Active',
            'howitwork_alt'     => 'required|string|max:255',
            'howitwork_image'   => 'nullable|file|mimes:jpg,jpeg,png,webp|max:2048',
            'howitwork_desc'       => [
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
            // 2. Find the howitwork
            $howitwork = HowItWork::findOrFail($id);

            $imagePath = $howitwork->image;

            // 3. Handle new image upload (replace old one if new image is uploaded)
            if ($request->hasFile('howitwork_image')) {
                $imageFile = $request->file('howitwork_image');
                $extension = $imageFile->guessExtension() ?? 'jpg';
                $originalName = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $sanitizedOriginal = \Str::slug($originalName);
                $uniqueName = $sanitizedOriginal . '-' . uniqid() . '.' . $extension;

                $uploadPath = public_path('admin/howitwork_image/');
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

                $imagePath = 'public/admin/howitwork_image/' . $uniqueName;
            }

            // 4. Update howitwork data
            $howitwork->update([
                'title'       => $request->howitwork_title,
                'description' => $request->howitwork_desc,
                'status'      => $request->howitwork_status,
                'alt_tag'     => $request->howitwork_alt,
                'image'       => $imagePath,
            ]);

            return redirect()->route('howitwork')->with('success', 'howitwork updated successfully!');
        } catch (\Exception $e) {
            \Log::error('howitwork update failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to update howitwork: ' . $e->getMessage());
        }
    }

}
