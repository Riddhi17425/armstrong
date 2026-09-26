<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeSlider;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use DataTables;
use Str;

class HomeSliderController extends Controller
{
    public function index(Request $request){
        return view('admin.home_slider.index');
    }  

    public function getData(Request $request)
    {
        $home_slider = HomeSlider::select(['id', 'name','image', 'status', 'created_at']);
        return DataTables::of($home_slider)
            ->addColumn('action', function ($row) {
                return '
                    <button type="button" class="btn btn-outline-secondary edit_homeslider" data-id="' . $row->id . '"><i class="icofont-edit text-success"></i></button>
                    <button type="button" class="btn btn-outline-secondary delete_homeslider" data-id="' . $row->id . '"><i class="icofont-ui-delete text-danger"></i></button>
            
                ';
            })
            ->rawColumns(['action']) // allow HTML rendering
            ->make(true);
    }

    public function store(Request $request)
    {
        $exists = HomeSlider::where('id', $request->homeslider_id)->exists();
        if ($exists) {
            return response()->json(['result' => false, 'message' => 'Image already exists.']);
        }

        $home_slider = new HomeSlider();
        $home_slider->status = $request->homeslider_status;

        if ($request->hasFile('homeslider_image')) {
    $imageFile = $request->file('homeslider_image');
    $extension = $imageFile->getClientOriginalExtension();

    $originalName = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
    $sanitizedOriginal = Str::slug($originalName);
    $uniqueName = $sanitizedOriginal . '-' . uniqid() . '.' . $extension;

    $uploadPath = public_path('admin/homeslider/');
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

    $home_slider->image = 'public/admin/homeslider/' . $uniqueName;
}

        $home_slider->save();

        return response()->json([
            'result' => true,
            'message' => 'Image Save Successfully.',
            'image' => $home_slider->image
        ]);
    }

    public function update(Request $request, $id)
    {
        $homeslider = HomeSlider::find($id);
        if (!$homeslider) {
            return response()->json(['result' => false, 'message' => 'Image not found.']);
        }

        // Optional: prevent name duplication
        $exists = HomeSlider::where('id', $request->homeslider_id)->where('id', '!=', $id)->exists();
        if ($exists) {
            return response()->json(['result' => false, 'message' => 'Image already exists.']);
        }

        $homeslider->status = $request->homeslider_status;
        if ($request->hasFile('homeslider_image')) {
        $image = $request->file('homeslider_image');

        // Keep the original filename as is
        $imageName = $image->getClientOriginalName();

        $uploadPath = public_path('admin/homeslider/');
        $savePath   = $uploadPath . $imageName;

        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        // Optional compression
        if ($request->has('compress')) {
            $manager = new \Intervention\Image\ImageManager(new \Intervention\Image\Drivers\Gd\Driver());
            $img     = $manager->read($image->getRealPath());

            // Save as JPEG with 75% quality without changing dimensions
            $img->toJpeg(75)->save($savePath);
        } else {
            $image->move($uploadPath, $imageName);
        }

        // Delete old image if updating
        if (!empty($homeslider->image)) {
            $oldImagePath = public_path(str_replace('public/', '', $homeslider->image));
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        $homeslider->image = $imageName;
    }
        // if ($request->hasFile('homeslider_image')) {
        //     $image = $request->file('homeslider_image');
        //     $extension = $image->getClientOriginalExtension();
        //     $imageName = Str::uuid() . '.' . $extension;

        //     $uploadPath = public_path('admin/homeslider/');
        //     $savePath = $uploadPath . $imageName;

        //     if (!file_exists($uploadPath)) {
        //         mkdir($uploadPath, 0755, true);
        //     }

        //     // Optional compression if checkbox is selected
        //     if ($request->has('compress')) {
        //         $manager = new \Intervention\Image\ImageManager(new \Intervention\Image\Drivers\Gd\Driver());
        //         $img = $manager->read($image->getRealPath());

        //         // Save as JPEG with 75% quality without changing dimensions
        //         $img->toJpeg(50)->save($savePath);
        //     } else {
        //         $image->move($uploadPath, $imageName);
        //     }

        //     // Optionally delete old image if updating
        //     if (!empty($homeslider->image)) {
        //         $oldImagePath = public_path(str_replace('public/', '', $homeslider->image));
        //         if (file_exists($oldImagePath)) {
        //             unlink($oldImagePath);
        //         }
        //     }

        //     $homeslider->image = 'public/admin/homeslider/' . $imageName;
        // }
        $homeslider->save();

        return response()->json([
            'result' => true,
            'message' => 'Image Updated Successfully.',
        ]);
    }
    public function edit($id){
        $get_data = HomeSlider::find($id);
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
        $get_data = HomeSlider::find($id);
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
