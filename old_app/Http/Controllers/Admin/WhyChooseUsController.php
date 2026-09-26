<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\WhyChooseUs;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use Str;
use DataTables;
class WhyChooseUsController extends Controller
{
    public function index(){
        return view('admin.why_choose_us.index');
    }

    public function create(){
        return view('admin.why_choose_us.create');
    }

   public function Store(Request $request)
{
    // Validate input
    $validator = Validator::make($request->all(), [
        'whychooseus_desc'    => 'required|string|max:500',
        'whychooseus_title'   => 'required|string|max:255',
        'whychooseus_status'  => 'nullable|in:Active,In-Active',
        'whychooseus_alt'     => 'required|string|max:255',
        'whychooseus_image'   => 'required|file|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput()
            ->with('error', 'Please fix the validation errors.');
    }

    try {
        $imagePath = null;

        if ($request->hasFile('whychooseus_image')) {
            $imageFile = $request->file('whychooseus_image');
            $extension = $imageFile->guessExtension() ?? 'png';
            $originalName = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
            $sanitizedOriginal = \Str::slug($originalName);
            $uniqueName = $sanitizedOriginal . '-' . uniqid() . '.' . $extension;

            $uploadPath = public_path('admin/whychooseus_image/');
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

            $imagePath = 'public/admin/whychooseus_image/' . $uniqueName;
        }

        // Create whychooseus record (Correct field names)
        WhyChooseUs::create([
            'title'       => $request->whychooseus_title,
            'description' => $request->whychooseus_desc,
            'status'      => $request->whychooseus_status ?? 'Active',
            'alt_tag'     => $request->whychooseus_alt,
            'image'       => $imagePath,
        ]);

        return redirect()->route('whychooseus')->with('success', 'Record added successfully!');
    } catch (\Exception $e) {
        \Log::error('whychooseus Store Error: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Failed to save: ' . $e->getMessage());
    }
}   

    public function getData()
    {
        $whychooseus = WhyChooseUs::whereNull('deleted_at')->get();
        return DataTables::of($whychooseus)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                
                $editUrl = route('whychooseus.edit', $row->id);
                return '
                    <a href="' . $editUrl . '" class="btn btn-outline-primary btn-sm">
                        <i class="icofont-edit"></i>
                    </a>
                    <button type="button" class="btn btn-outline-danger btn-sm delete_whychoose" data-id="' . $row->id . '">
                        <i class="icofont-ui-delete"></i>
                    </button>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function Edit($id){
        $whychooseus = WhyChooseUs::find($id);
        return view('admin.why_choose_us.edit' , compact('whychooseus'));
    }

    public function Destory($id){
        $whychooseus = WhyChooseUs::find($id);
        if(empty($whychooseus)){
            return response()->json([
                'result' => false,
                "message" => "Product Not Found."
            ]);
        }
        $whychooseus->delete();
        return response()->json([
            'result' => true,
            'message' => "Data Deleted."
        ]);
    }


    public function Update(Request $request, $id)
    {
        // 1. Validate the request
        $validator = Validator::make($request->all(), [
            //'whychooseus_desc'    => 'required|string|max:500',
            'whychooseus_title'   => 'required|string|max:255',
            'whychooseus_status'  => 'required|in:Active,In-Active',
            'whychooseus_alt'     => 'required|string|max:255',
            'whychooseus_image'   => 'nullable|file|mimes:jpg,jpeg,png,webp|max:2048',
            'whychooseus_desc'       => [
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
            // 2. Find the whychooseus
            $whychooseus = WhyChooseUs::findOrFail($id);

            $imagePath = $whychooseus->image;

            // 3. Handle new image upload (replace old one if new image is uploaded)
            if ($request->hasFile('whychooseus_image')) {
                $imageFile = $request->file('whychooseus_image');
                $extension = $imageFile->guessExtension() ?? 'jpg';
                $originalName = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $sanitizedOriginal = \Str::slug($originalName);
                $uniqueName = $sanitizedOriginal . '-' . uniqid() . '.' . $extension;

                $uploadPath = public_path('admin/whychooseus_image/');
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

                $imagePath = 'public/admin/whychooseus_image/' . $uniqueName;
            }

            // 4. Update whychooseus data
            $whychooseus->update([
                'title'       => $request->whychooseus_title,
                'description' => $request->whychooseus_desc,
                'status'      => $request->whychooseus_status,
                'alt_tag'     => $request->whychooseus_alt,
                'image'       => $imagePath,
            ]);

            return redirect()->route('whychooseus')->with('success', 'whychooseus updated successfully!');
        } catch (\Exception $e) {
            \Log::error('whychooseus update failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to update whychooseus: ' . $e->getMessage());
        }
    }

}
