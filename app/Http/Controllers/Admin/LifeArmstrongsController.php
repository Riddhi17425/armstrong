<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\LifeArmstrong;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use Str;
use DataTables;
class LifeArmstrongsController extends Controller
{
    public function index(){
        return view('admin.life_armstrong.index');
    }

    public function create(){
        return view('admin.life_armstrong.create');
    }

   public function Store(Request $request)
{
    // Validate input
    $validator = Validator::make($request->all(), [
        'lifearmstrong_desc'    => 'required|string|max:500',
        'lifearmstrong_title'   => 'required|string|max:255',
        'lifearmstrong_status'  => 'nullable|in:Active,In-Active',
        'lifearmstrong_alt'     => 'required|string|max:255',
        'lifearmstrong_image'   => 'required|file|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput()
            ->with('error', 'Please fix the validation errors.');
    }

    try {
        $imagePath = null;

        if ($request->hasFile('lifearmstrong_image')) {
            $imageFile = $request->file('lifearmstrong_image');
            $extension = $imageFile->guessExtension() ?? 'png';
            $originalName = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
            $sanitizedOriginal = \Str::slug($originalName);
            $uniqueName = $sanitizedOriginal . '-' . uniqid() . '.' . $extension;

            $uploadPath = public_path('admin/lifearmstrong_image/');
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

            $imagePath = 'public/admin/lifearmstrong_image/' . $uniqueName;
        }

        // Create lifearmstrong record (Correct field names)
        LifeArmstrong::create([
            'title'       => $request->lifearmstrong_title,
            'description' => $request->lifearmstrong_desc,
            'status'      => $request->lifearmstrong_status ?? 'Active',
            'alt_tag'     => $request->lifearmstrong_alt,
            'image'       => $imagePath,
        ]);

        return redirect()->route('lifearmstrong')->with('success', 'Record added successfully!');
    } catch (\Exception $e) {
        \Log::error('lifearmstrong Store Error: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Failed to save: ' . $e->getMessage());
    }
}   

    public function getData()
    {
        $lifearmstrong = LifeArmstrong::whereNull('deleted_at')->get();
        return DataTables::of($lifearmstrong)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                
                $editUrl = route('lifearmstrong.edit', $row->id);
                return '
                    <a href="' . $editUrl . '" class="btn btn-outline-primary btn-sm">
                        <i class="icofont-edit"></i>
                    </a>
                    <button type="button" class="btn btn-outline-danger btn-sm delete_lifearmstrong" data-id="' . $row->id . '">
                        <i class="icofont-ui-delete"></i>
                    </button>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function Edit($id){
        $lifearmstrong = LifeArmstrong::find($id);
        return view('admin.life_armstrong.edit' , compact('lifearmstrong'));
    }

    public function Destory($id){
        $lifearmstrong = LifeArmstrong::find($id);
        if(empty($lifearmstrong)){
            return response()->json([
                'result' => false,
                "message" => "Product Not Found."
            ]);
        }
        $lifearmstrong->delete();
        return response()->json([
            'result' => true,
            'message' => "Data Deleted."
        ]);
    }


    public function Update(Request $request, $id)
    {
        // 1. Validate the request
        $validator = Validator::make($request->all(), [
            //'lifearmstrong_desc'    => 'required|string|max:500',
            'lifearmstrong_title'   => 'required|string|max:255',
            'lifearmstrong_status'  => 'required|in:Active,In-Active',
            'lifearmstrong_alt'     => 'required|string|max:255',
            'lifearmstrong_image'   => 'nullable|file|mimes:jpg,jpeg,png,webp|max:2048',
            'lifearmstrong_desc'       => [
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
            // 2. Find the lifearmstrong
            $lifearmstrong = LifeArmstrong::findOrFail($id);

            $imagePath = $lifearmstrong->image;

            // 3. Handle new image upload (replace old one if new image is uploaded)
            if ($request->hasFile('lifearmstrong_image')) {
                $imageFile = $request->file('lifearmstrong_image');
                $extension = $imageFile->guessExtension() ?? 'jpg';
                $originalName = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $sanitizedOriginal = \Str::slug($originalName);
                $uniqueName = $sanitizedOriginal . '-' . uniqid() . '.' . $extension;

                $uploadPath = public_path('admin/lifearmstrong_image/');
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

                $imagePath = 'public/admin/lifearmstrong_image/' . $uniqueName;
            }

            // 4. Update lifearmstrong data
            $lifearmstrong->update([
                'title'       => $request->lifearmstrong_title,
                'description' => $request->lifearmstrong_desc,
                'status'      => $request->lifearmstrong_status,
                'alt_tag'     => $request->lifearmstrong_alt,
                'image'       => $imagePath,
            ]);

            return redirect()->route('lifearmstrong')->with('success', 'lifearmstrong updated successfully!');
        } catch (\Exception $e) {
            \Log::error('lifearmstrong update failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to update lifearmstrong: ' . $e->getMessage());
        }
    }

}
