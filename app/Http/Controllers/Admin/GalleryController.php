<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\GalleryTypes;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use DataTables;
use Str;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $gallerytypes = GalleryTypes::where('status','Active')->get();
        return view('admin.gallery.index',compact('gallerytypes'));
    }  

    public function getData(Request $request)
    {
        $gallery = Gallery::select(['id', 'name','image', 'status', 'created_at']);
        return DataTables::of($gallery)
            ->addColumn('action', function ($row) {
                return '
                    <button type="button" class="btn btn-outline-secondary edit_gallery" data-id="' . $row->id . '"><i class="icofont-edit text-success"></i></button>
                    <button type="button" class="btn btn-outline-secondary delete_gallery" data-id="' . $row->id . '"><i class="icofont-ui-delete text-danger"></i></button>
            
                ';
            })
            ->rawColumns(['action']) // allow HTML rendering
            ->make(true);
    }

    public function store(Request $request)
    {
        $exists = Gallery::where('id', $request->gallery_id)->exists();
        if ($exists) {
            return response()->json(['result' => false, 'message' => 'Image already exists.']);
        }

        $gallery = new Gallery();
        $gallery->status = $request->gallery_status;
        $gallery->alt = $request->alt;
        $gallery->types = $request->gallery_type_id;

    if ($request->hasFile('gallery_image')) {
    $imageFile = $request->file('gallery_image');
    $extension = $imageFile->getClientOriginalExtension();

    $originalName = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
    $sanitizedOriginal = Str::slug($originalName);
    $uniqueName = $sanitizedOriginal . '-' . uniqid() . '.' . $extension;

    $uploadPath = public_path('admin/gallery/');
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

    $gallery->image = 'public/admin/gallery/' . $uniqueName;
}

        $gallery->save();

        return response()->json([
            'result' => true,
            'message' => 'Gallery Save Successfully.',
            'image' => $gallery->image
        ]);
    }

    public function update(Request $request, $id)
    {
        $gallery = Gallery::find($id);
        if (!$gallery) {
            return response()->json(['result' => false, 'message' => 'Image not found.']);
        }

        // Optional: prevent name duplication
        $exists = Gallery::where('id', $request->gallery_id)->where('id', '!=', $id)->exists();
        if ($exists) {
            return response()->json(['result' => false, 'message' => 'Image already exists.']);
        }

        $gallery->status = $request->gallery_status;
        $gallery->alt = $request->alt;
         $gallery->types = $request->gallery_type_id;

        if ($request->hasFile('gallery_image')) {
            $image = $request->file('gallery_image');
            $extension = $image->getClientOriginalExtension();
            $imageName = Str::uuid() . '.' . $extension;

            $uploadPath = public_path('admin/gallery/');
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
            if (!empty($gallery->image)) {
                $oldImagePath = public_path(str_replace('public/', '', $gallery->image));
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $gallery->image = 'public/admin/gallery/' . $imageName;
        }
        $gallery->save();

        return response()->json([
            'result' => true,
            'message' => 'Image Updated Successfully.',
        ]);
    }
    public function edit($id){
        $get_data = Gallery::find($id);
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
        $get_data = Gallery::find($id);
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
