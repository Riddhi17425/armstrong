<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\OurFacility;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use Str;
use DataTables;
class OurFacilityController extends Controller
{
    public function index(){
        return view('admin.our_facility.index');
    }

    public function create(){
        return view('admin.our_facility.create');
    }

   public function Store(Request $request)
{
    // Validate input
    $validator = Validator::make($request->all(), [
        'ourfacility_desc'    => 'required|string|max:500',
        'ourfacility_title'   => 'required|string|max:255',
        'ourfacility_status'  => 'nullable|in:Active,In-Active',
        'ourfacility_alt'     => 'required|string|max:255',
        'ourfacility_image'   => 'required|file|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput()
            ->with('error', 'Please fix the validation errors.');
    }

    try {
        $imagePath = null;

        if ($request->hasFile('ourfacility_image')) {
            $imageFile = $request->file('ourfacility_image');
            $extension = $imageFile->guessExtension() ?? 'png';
            $originalName = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
            $sanitizedOriginal = \Str::slug($originalName);
            $uniqueName = $sanitizedOriginal . '-' . uniqid() . '.' . $extension;

            $uploadPath = public_path('admin/ourfacility_image/');
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

            $imagePath = 'public/admin/ourfacility_image/' . $uniqueName;
        }

        // Create ourfacility record (Correct field names)
        OurFacility::create([
            'title'       => $request->ourfacility_title,
            'description' => $request->ourfacility_desc,
            'status'      => $request->ourfacility_status ?? 'Active',
            'alt_tag'     => $request->ourfacility_alt,
            'image'       => $imagePath,
        ]);

        return redirect()->route('ourfacility')->with('success', 'Record added successfully!');
    } catch (\Exception $e) {
        \Log::error('Ourfacility Store Error: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Failed to save: ' . $e->getMessage());
    }
}   

    public function getData()
    {
        $ourfacility = OurFacility::whereNull('deleted_at')->get();
        return DataTables::of($ourfacility)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                
                $editUrl = route('ourfacility.edit', $row->id);
                return '
                    <a href="' . $editUrl . '" class="btn btn-outline-primary btn-sm">
                        <i class="icofont-edit"></i>
                    </a>
                    <button type="button" class="btn btn-outline-danger btn-sm delete_ourfacility" data-id="' . $row->id . '">
                        <i class="icofont-ui-delete"></i>
                    </button>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function Edit($id){
        $ourfacility = OurFacility::find($id);
        return view('admin.our_facility.edit' , compact('ourfacility'));
    }

    public function Destory($id){
        $ourfacility = OurFacility::find($id);
        if(empty($ourfacility)){
            return response()->json([
                'result' => false,
                "message" => "Product Not Found."
            ]);
        }
        $ourfacility->delete();
        return response()->json([
            'result' => true,
            'message' => "Data Deleted."
        ]);
    }


    public function Update(Request $request, $id)
    {
        // 1. Validate the request
        $validator = Validator::make($request->all(), [
            'ourfacility_desc'    => 'required|string|max:500',
            'ourfacility_title'   => 'required|string|max:255',
            'ourfacility_status'  => 'required|in:Active,In-Active',
            'ourfacility_alt'     => 'required|string|max:255',
            'ourfacility_image'   => 'nullable|file|mimes:jpg,jpeg,png,webp|max:2048',
            'ourfacility_desc'       => [
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
            // 2. Find the ourfacility
            $ourfacility = OurFacility::findOrFail($id);

            $imagePath = $ourfacility->image;

            // 3. Handle new image upload (replace old one if new image is uploaded)
            if ($request->hasFile('ourfacility_image')) {
                $imageFile = $request->file('ourfacility_image');
                $extension = $imageFile->guessExtension() ?? 'jpg';
                $originalName = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $sanitizedOriginal = \Str::slug($originalName);
                $uniqueName = $sanitizedOriginal . '-' . uniqid() . '.' . $extension;

                $uploadPath = public_path('admin/ourfacility_image/');
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

                $imagePath = 'public/admin/ourfacility_image/' . $uniqueName;
            }

            // 4. Update ourfacility data
            $ourfacility->update([
                'title'       => $request->ourfacility_title,
                'description' => $request->ourfacility_desc,
                'status'      => $request->ourfacility_status,
                'alt_tag'     => $request->ourfacility_alt,
                'image'       => $imagePath,
            ]);

            return redirect()->route('ourfacility')->with('success', 'ourfacility updated successfully!');
        } catch (\Exception $e) {
            \Log::error('ourfacility update failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to update ourfacility: ' . $e->getMessage());
        }
    }

}
