<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ResearchDevelopmentSlider;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use DataTables;
use Str;

class ResearchDevelopmentController extends Controller
{
    public function index(Request $request){
        return view('admin.r_and_d_slider.index');
    }  

    public function getData(Request $request)
    {
        $slider = ResearchDevelopmentSlider::select(['id', 'alt','image', 'status', 'created_at']);
        return DataTables::of($slider)
            ->addColumn('action', function ($row) {
                return '
                    <button type="button" class="btn btn-outline-secondary edit_researchdevelopmentslider" data-id="' . $row->id . '"><i class="icofont-edit text-success"></i></button>
                    <button type="button" class="btn btn-outline-secondary delete_researchdevelopmentslider" data-id="' . $row->id . '"><i class="icofont-ui-delete text-danger"></i></button>
            
                ';
            })
            ->rawColumns(['action']) // allow HTML rendering
            ->make(true);
    }

    public function store(Request $request)
    {
        $exists = ResearchDevelopmentSlider::where('id', $request->researchdevelopmentslider_id)->exists();
        if ($exists) {
            return response()->json(['result' => false, 'message' => 'Image already exists.']);
        }

        $slider = new ResearchDevelopmentSlider();
        $slider->status = $request->researchdevelopmentslider_status;
        $slider->alt = $request->alt;

        if ($request->hasFile('researchdevelopmentslider_image')) {
    $imageFile = $request->file('researchdevelopmentslider_image');
    $extension = $imageFile->getClientOriginalExtension();

    $originalName = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
    $sanitizedOriginal = Str::slug($originalName);
    $uniqueName = $sanitizedOriginal . '-' . uniqid() . '.' . $extension;

    $uploadPath = public_path('admin/researchdevelopmentslider/');
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

    $slider->image = 'public/admin/researchdevelopmentslider/' . $uniqueName;
}

        $slider->save();

        return response()->json([
            'result' => true,
            'message' => 'Image Save Successfully.',
            'image' => $slider->image
        ]);
    }

    public function update(Request $request, $id)
    {
        $slider = ResearchDevelopmentSlider::find($id);
        if (!$slider) {
            return response()->json(['result' => false, 'message' => 'Image not found.']);
        }

        // Optional: prevent name duplication
        $exists = ResearchDevelopmentSlider::where('id', $request->researchdevelopmentslider_id)->where('id', '!=', $id)->exists();
        if ($exists) {
            return response()->json(['result' => false, 'message' => 'Image already exists.']);
        }

        $slider->status = $request->researchdevelopmentslider_status;
        $slider->alt = $request->alt;
        if ($request->hasFile('researchdevelopmentslider_image')) {
            $image = $request->file('researchdevelopmentslider_image');
            $extension = $image->getClientOriginalExtension();
            $imageName = Str::uuid() . '.' . $extension;

            $uploadPath = public_path('admin/researchdevelopmentslider/');
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
            if (!empty($researchdevelopmentslider->image)) {
                $oldImagePath = public_path(str_replace('public/', '', $researchdevelopmentslider->image));
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $slider->image = 'public/admin/researchdevelopmentslider/' . $imageName;
        }
        $slider->save();

        return response()->json([
            'result' => true,
            'message' => 'Image Updated Successfully.',
        ]);
    }
    public function edit($id){
        $get_data = ResearchDevelopmentSlider::find($id);
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
        $get_data = ResearchDevelopmentSlider::find($id);
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
