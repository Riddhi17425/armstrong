<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\ImageUpload;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;

class ImageUploadController extends Controller
{
public function upload(Request $request)
{
    $request->validate([
        'image' => 'required|image|mimes:jpeg,jpg,png,webp|max:5120',
    ]);

    if ($request->hasFile('image')) {
        $imageFile = $request->file('image');
        $extension = $imageFile->getClientOriginalExtension();
        $filename = Str::uuid() . '.' . $extension;
        $savePath = public_path('uploads/' . $filename);

        if (!file_exists(dirname($savePath))) {
            mkdir(dirname($savePath), 0755, true);
        }

        if ($request->has('compress')) {
            $manager = new ImageManager(new GdDriver()); // Correct for v3

            $image = $manager->read($imageFile->getRealPath());
            $image->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            $image->toJpeg(75)->save($savePath); // Compress and save
        } else {
            $imageFile->move(public_path('uploads'), $filename); // Original
        }

        ImageUpload::create([
            'image' => 'uploads/' . $filename,
        ]);

        return view('admin.image.image'); // Adjust this view as needed
    }

    return back()->withErrors('No image uploaded.');
}
}
