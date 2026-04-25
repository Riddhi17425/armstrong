<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InfrastructureSlider;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use DataTables;
use Str;

class InfrastructureSliderController extends Controller
{
    public function index(Request $request){
        return view('admin.infrastructure_slider.index');
    }  

    public function getData(Request $request)
    {
        $infrastructure_slider = InfrastructureSlider::select(['id','image', 'status', 'created_at']);
        return DataTables::of($infrastructure_slider)
            ->addColumn('action', function ($row) {
                return '
                    <button type="button" class="btn btn-outline-secondary edit_infrastructureslider" data-id="' . $row->id . '"><i class="icofont-edit text-success"></i></button>
                    <button type="button" class="btn btn-outline-secondary delete_infrastructureslider" data-id="' . $row->id . '"><i class="icofont-ui-delete text-danger"></i></button>
            
                ';
            })
            ->rawColumns(['action']) // allow HTML rendering
            ->make(true);
    }

    public function store(Request $request)
    {
        
        $exists = InfrastructureSlider::where('id', $request->infrastructureslider_id)->exists();
        if ($exists) {
            return response()->json(['result' => false, 'message' => 'Image already exists.']);
        }

        $infrastructure_slider = new InfrastructureSlider();
        $infrastructure_slider->status = $request->infrastructureslider_status;
        $infrastructure_slider->alt = $request->alt;

        if ($request->hasFile('infrastructureslider_image')) {
        $imageFile = $request->file('infrastructureslider_image');
        $extension = $imageFile->getClientOriginalExtension();

        $originalName = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
        $sanitizedOriginal = Str::slug($originalName);
        $uniqueName = $sanitizedOriginal . '-' . uniqid() . '.' . $extension;

        $uploadPath = public_path('admin/infrastructureslider/');
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

        $infrastructure_slider->image = 'public/admin/infrastructureslider/' . $uniqueName;
    }

        $infrastructure_slider->save();

        return response()->json([
            'result' => true,
            'message' => 'Image Save Successfully.',
            'image' => $infrastructure_slider->image
        ]);
    }

    public function update(Request $request, $id)
    {
        $infrastructureslider = InfrastructureSlider::find($id);
        if (!$infrastructureslider) {
            return response()->json(['result' => false, 'message' => 'Image not found.']);
        }

        // Optional: prevent name duplication
        $exists = InfrastructureSlider::where('id', $request->infrastructureslider_id)->where('id', '!=', $id)->exists();
        if ($exists) {
            return response()->json(['result' => false, 'message' => 'Image already exists.']);
        }

        $infrastructureslider->status = $request->infrastructureslider_status;
        $infrastructureslider->alt = $request->alt;
        if ($request->hasFile('infrastructureslider_image')) {
            $image = $request->file('infrastructureslider_image');
            $extension = $image->getClientOriginalExtension();
            $imageName = Str::uuid() . '.' . $extension;

            $uploadPath = public_path('admin/infrastructureslider/');
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
            if (!empty($infrastructureslider->image)) {
                $oldImagePath = public_path(str_replace('public/', '', $infrastructureslider->image));
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $infrastructureslider->image = 'public/admin/infrastructureslider/' . $imageName;
        }
        $infrastructureslider->save();

        return response()->json([
            'result' => true,
            'message' => 'Image Updated Successfully.',
        ]);
    }
    public function edit($id){
        $get_data = InfrastructureSlider::find($id);
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
        $get_data = InfrastructureSlider::find($id);
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
