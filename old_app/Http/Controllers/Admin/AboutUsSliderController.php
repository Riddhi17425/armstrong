<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUsSlider;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use DataTables;
use Str;

class AboutUsSliderController extends Controller
{
    public function index(Request $request){
        return view('admin.about_slider.index');
    }  

    public function getData(Request $request)
    {
        $about_slider = AboutUsSlider::select(['id','image', 'status', 'created_at']);
        return DataTables::of($about_slider)
            ->addColumn('action', function ($row) {
                return '
                    <button type="button" class="btn btn-outline-secondary edit_aboutslider" data-id="' . $row->id . '"><i class="icofont-edit text-success"></i></button>
                    <button type="button" class="btn btn-outline-secondary delete_aboutslider" data-id="' . $row->id . '"><i class="icofont-ui-delete text-danger"></i></button>
            
                ';
            })
            ->rawColumns(['action']) // allow HTML rendering
            ->make(true);
    }

    public function store(Request $request)
    {
        $exists = AboutUsSlider::where('id', $request->aboutslider_id)->exists();
        if ($exists) {
            return response()->json(['result' => false, 'message' => 'Image already exists.']);
        }

        $about_slider = new AboutUsSlider();
        $about_slider->status = $request->aboutslider_status;
        // $about_slider->alt = $request->aboutslider_alt ?? '';

        if ($request->hasFile('aboutslider_image')) {
    $imageFile = $request->file('aboutslider_image');
    $extension = $imageFile->getClientOriginalExtension();

    $originalName = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
    $sanitizedOriginal = Str::slug($originalName);
    $uniqueName = $sanitizedOriginal . '-' . uniqid() . '.' . $extension;

    $uploadPath = public_path('admin/aboutslider/');
    $savePath = $uploadPath . $uniqueName;

    if (!file_exists($uploadPath)) {
        mkdir($uploadPath, 0755, true);
    }

    if ($request->has('compress')) {
        $manager = new \Intervention\Image\ImageManager(new \Intervention\Image\Drivers\Gd\Driver());
        $image = $manager->read($imageFile->getRealPath());

        // No resizing — only quality reduction
        $image->toJpeg(75)->save($savePath);
    } else {
        $imageFile->move($uploadPath, $uniqueName);
    }

    $about_slider->image = 'public/admin/aboutslider/' . $uniqueName;
}

        $about_slider->save();

        return response()->json([
            'result' => true,
            'message' => 'Image Save Successfully.',
            'image' => $about_slider->image
        ]);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $aboutslider = AboutUsSlider::find($id);
        if (!$aboutslider) {
            return response()->json(['result' => false, 'message' => 'Image not found.']);
        }

        // Optional: prevent name duplication
        $exists = AboutUsSlider::where('id', $request->aboutslider_id)->where('id', '!=', $id)->exists();
        if ($exists) {
            return response()->json(['result' => false, 'message' => 'Image already exists.']);
        }

        $aboutslider->status = $request->aboutslider_status;
        // $about_slider->alt = $request->aboutslider_alt ?? '';
        if ($request->hasFile('aboutslider_image')) {
            $image = $request->file('aboutslider_image');
            $extension = $image->getClientOriginalExtension();
            $imageName = Str::uuid() . '.' . $extension;

            $uploadPath = public_path('admin/aboutslider/');
            $savePath = $uploadPath . $imageName;

            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            // Optional compression if checkbox is selected
            if ($request->has('compress')) {
                $manager = new \Intervention\Image\ImageManager(new \Intervention\Image\Drivers\Gd\Driver());
                $img = $manager->read($image->getRealPath());

                // Save as JPEG with 75% quality without changing dimensions
                $img->toJpeg(50)->save($savePath);
            } else {
                $image->move($uploadPath, $imageName);
            }

            // Optionally delete old image if updating
            if (!empty($aboutslider->image)) {
                $oldImagePath = public_path(str_replace('public/', '', $aboutslider->image));
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $aboutslider->image = 'public/admin/aboutslider/' . $imageName;
        }
        $aboutslider->save();

        return response()->json([
            'result' => true,
            'message' => 'Image Updated Successfully.',
        ]);
    }
    public function edit($id){
        $get_data = AboutUsSlider::find($id);
        if(empty($get_data)){
            return response()->json([
                'result' => false,
                'message' => "Data Not Found",
            ]);
        }

        return response()->json([
            'result' => true,
            "message" => "Data Found",
            "data" => $get_data,
        ]); 
    }

    public function destroy($id){
        $get_data = AboutUsSlider::find($id);
        if(empty($get_data)){
            return response()->json([
                'result' => false,
                'message' => "Data Not Found",
            ]);
        }
        $get_data->delete();
        return response()->json([
            'result' => true,
            "message" => "Data Deleted SuccessFulyy.",
        ]); 
    }
}
