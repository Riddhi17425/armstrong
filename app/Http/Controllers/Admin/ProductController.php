<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use Illuminate\Support\Facades\Validator;
use App\Models\ProductImages;
use App\Models\ProductMaster;
use App\Models\Industries;
use App\Models\ProductCategory;
use App\Models\ProductFeature;
use Str;
use Illuminate\Support\Facades\DB;
use DataTables;

class ProductController extends Controller
{
    public function index(){ 
        return view('admin.product.index');
    }

    public function createProduct(){
        $data['product_category'] = ProductCategory::where('status', 'Active')->get();
        $data['application'] = Application::where('status', 'Active')->get();
        $data['feature'] = ProductFeature::where('status', 'Active')->get();
        $data['industries'] = Industries::where('status', 'Active')->get();
        return view('admin.product.create', compact('data'));
    }

    public function ProductchunkUpload(Request $request)
    {
        $fileName = $request->input('fileName');
        $chunkNumber = (int) $request->input('chunkNumber'); 
        $totalChunks = (int) $request->input('totalChunks');

        // Temp folder for chunks
        $tempPath = public_path("Productschunks/{$fileName}");
        if (!is_dir($tempPath)) {
            mkdir($tempPath, 0777, true);
        }

        // Save the chunk
        $uploadedFile = $request->file('file');
        if (!$uploadedFile) {
            return response()->json(['success' => false, 'error' => 'No file received']);
        }

        $chunkFile = $tempPath . "/chunk_" . $chunkNumber;
        file_put_contents($chunkFile, $uploadedFile->get());

        // If last chunk -> merge
        if ($chunkNumber === $totalChunks) {
            $finalDir = public_path("admin/product/videos");
            if (!is_dir($finalDir)) {
                mkdir($finalDir, 0777, true);
            }

            $finalPath = $finalDir . "/" . $fileName;
            $finalFile = fopen($finalPath, "w");

            for ($i = 1; $i <= $totalChunks; $i++) {
                $chunk = $tempPath . "/chunk_" . $i;
                if (!file_exists($chunk)) {
                    return response()->json(['success' => false, 'error' => "Missing chunk {$i}"]);
                }
                fwrite($finalFile, file_get_contents($chunk));
                unlink($chunk); // delete chunk
            }
            fclose($finalFile);
            rmdir($tempPath);

            return response()->json([
                'success' => true,
                'filePath' => "public/admin/product/videos/{$fileName}" // relative path stored in DB
            ]);
        }

        return response()->json([
            'success' => true,
            'chunkUploaded' => $chunkNumber,
        ]);
    }

    public function ProductStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category' => 'required|integer|exists:product_categories,id',
            'subcategory_id' => [
                'nullable',
                'integer',
                'exists:product_categories,id',
                function ($attribute, $value, $fail) use ($request) {
                    $category = ProductCategory::find($request->category);
                    if ($category && $category->name === 'Sewing' && empty($value)) {
                        $fail('The subcategory field is required when the category is Sewing Machines.');
                    }
                },
            ],
            'product_name' => 'required|string|max:255',
            'url' => 'nullable|string',
            'model_name' => 'nullable|string',
            'product_status' => 'required|in:Active,In-Active',
            'is_live' => 'required|in:1,0',
            'product_images' => 'nullable|array',
            'product_images.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048', 
        ], [
            'product_images.*.image' => 'Each file must be an image.',
            'product_images.*.mimes' => 'Images must be of type jpg, jpeg, png, or webp.',
            'product_images.*.max' => 'Each image must be less than 2MB.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Please fix the validation errors.');
        }

        try {
            $usps = array_map(function ($usp) {
                return [
                    'name' => $usp['name'],
                    'description' => $usp['description'],
                ];
            }, $request->product_usp ?? []);

            $technical_specifications = array_map(function ($technical) {
                return [
                    'name' => $technical['name'],
                    'description' => $technical['description'],
                ];
            }, $request->product_technical ?? []);

            $pdfPath = null;
            if ($request->hasFile('product_pdf') && $request->file('product_pdf')->isValid()) {
                $pdfFile = $request->file('product_pdf');
                $pdfName = 'product_' . time() . '_' . uniqid() . '.' . $pdfFile->getClientOriginalExtension();
                $pdfFile->move(public_path('admin/uploads/products/pdf'), $pdfName);
                $pdfPath = 'public/admin/uploads/products/pdf/' . $pdfName;
            }

            $videoPath = $request->video_source === 'youtube'
                ? $request->youtube_link
                : $request->uploaded_video_path;

            $imageName = null;
            $thumbnails_image = '';
            if ($request->hasFile('thumbnails_image')) {
                $image = $request->file('thumbnails_image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('admin/product/videos/images'), $imageName);
                $thumbnails_image = 'public/admin/product/videos/images/' . $imageName;
            }
            $front_images = [];
            if ($request->hasFile('front_image')) {
                foreach ($request->file('front_image') as $file) {
                    if ($file->isValid()) {
                        $filename = $file->getClientOriginalName(); // keep original name
                        $path = public_path('admin/product/front_image');
                        if (!file_exists($path)) {
                            mkdir($path, 0777, true);
                        }
                        $file->move($path, $filename);
                        $front_images[] = $filename;
                    }
                }
            }

            $product = ProductMaster::create([
                'url' => $request->url,
                'category_id' => $request->category,
                'subcategory_id' => $request->subcategory_id,
                'model_name' => $request->model_name,
                'product_name' => $request->product_name,
                'product_short_desc' => $request->product_short_desc,
                'product_tech_desc' => $request->product_tech_desc,
                'product_app_desc' => $request->product_app_desc,
                'product_desc' => $request->product_desc,
                'product_status' => $request->product_status,
                'is_live' => $request->is_live,
                'product_applications' => json_encode($request->product_application ?? []),
                'product_feature' => json_encode($request->product_feature ?? []),
                'product_usp' => json_encode($usps),
                'product_technical' => json_encode($technical_specifications),
                'product_pdf' => $pdfPath,
                'front_image' => json_encode($front_images),
                'video_source' => $request->video_source,
                'video' => $videoPath,
                'thumnail_image' => $thumbnails_image,
                'meta_title'         => $request->get('meta_title'),
                'meta_description'         => $request->get('meta_description'),
            ]);

            foreach ($request->file('product_images', []) as $image) {
                if ($image && $image->isValid()) { 
                    $filename = 'product_' . time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('admin/uploads/products'), $filename);

                    ProductImages::create([
                        'product_master_id' => $product->id,
                        'image' => 'public/admin/uploads/products/' . $filename,
                    ]);
                }
            }

            return redirect()->route('product')->with('success', 'Product created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create product. Please try again.');
        }
    }

    public function getProductData()
    {
        $product = ProductMaster::with(['images' => function($q) {
            $q->select('id', 'product_master_id', 'image')->take(1);
        }])->orderBy('id', 'asc')->get();
    
        return DataTables::of($product)
            ->addIndexColumn()
            ->addColumn('image', function ($row) {
                return $row->images->first()->image ?? null;
            })
            ->addColumn('action', function ($row) {
                $editUrl = route('product.edit', $row->id);
                return '
                    <a href="' . $editUrl . '" class="btn btn-outline-primary btn-sm">
                        <i class="icofont-edit"></i>
                    </a>
                    <button type="button" class="btn btn-outline-danger btn-sm delete_product" data-id="' . $row->id . '">
                        <i class="icofont-ui-delete"></i>
                    </button>
                ';
            })
            ->rawColumns(['action', 'image'])
            ->make(true);
    }

    public function EditProduct($id)
    {
        $data['product_details'] = ProductMaster::findOrFail($id);
        $data['application'] = Application::where('status', 'Active')->get();
        $data['feature'] = ProductFeature::where('status', 'Active')->get();
        $data['product_images'] = ProductImages::where('product_master_id', $id)->get();
        $data['product_category'] = ProductCategory::where('status', 'Active')->get();

        $data['product_details']->product_applications = json_decode($data['product_details']->product_applications, true) ?? [];
        $data['product_details']->product_feature = json_decode($data['product_details']->product_feature, true) ?? [];
        $data['product_details']->product_usp = json_decode($data['product_details']->product_usp, true) ?? [[]];
        $data['product_details']->product_technical = json_decode($data['product_details']->product_technical, true) ?? [[]];
        return view('admin.product.edit', compact('data'));
    }

    public function DestroyProduct($id)
    {
        $product = ProductMaster::find($id);
        if (empty($product)) {
            return response()->json([
                'result' => false,
                'message' => "Product Not Found."
            ]);
        }
        $product->delete();
        ProductImages::where('product_master_id', $id)->delete();
        return response()->json([
            'result' => true,
            'message' => "Data Deleted."
        ]);
    }

    public function UpdateProduct(Request $request, $id)
    {
        $old_images = ProductImages::where('product_master_id', $id)
            ->pluck('id')       
            ->map(fn($id) => (string)$id) 
            ->values()           
            ->toArray();
        
            
        $existing_images = $request->existing_images ?? [];
        $existing_images = array_map('strval', $existing_images);
        $deleted_images = array_values(array_diff($old_images, $existing_images));

        $validator = Validator::make($request->all(), [
            'category' => 'required|integer|exists:product_categories,id',
            'subcategory_id' => [
                'nullable',
                'integer',
                'exists:product_categories,id',
                function ($attribute, $value, $fail) use ($request) {
                    $category = ProductCategory::find($request->category);
                    if ($category && $category->name === 'Sewing' && empty($value)) {
                        $fail('The subcategory field is required when the category is Sewing Machines.');
                    }
                },
            ],
            'product_name' => 'required|string|max:255',
            'url' => 'required|string',
            'model_name' => 'nullable|string',
            'product_status' => 'required|in:Active,In-Active',
            'is_live' => 'required|in:1,0',
            'product_images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ], [
            'product_images.*.image' => 'Each file must be an image.',
            'product_images.*.mimes' => 'Images must be of type jpg, jpeg, png, or webp.',
            'product_images.*.max' => 'Each image must be less than 2MB.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Please fix the validation errors.');
        }

        try { 
            DB::beginTransaction();

            $product = ProductMaster::findOrFail($id);
            if ($request->video_source === 'youtube') {
                $videoPath = $request->youtube_link;
            } else {
                $videoPath = $request->uploaded_video_path ?: $product->video;
            }

            $imageName = $product->thumnail_image;
            $thumbnails_image = $product->thumnail_image;
            if ($request->hasFile('thumbnails_image')) {
                if ($imageName && file_exists(public_path('admin/product/videos/images' . $imageName))) {
                    unlink(public_path('admin/product/videos/images' . $imageName));
                }

                $image = $request->file('thumbnails_image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('admin/product/videos/images'), $imageName);
                $thumbnails_image = 'public/admin/product/videos/images/' . $imageName;
            }

            $usps = array_map(function ($usp) {
                return [
                    'name' => $usp['name'],
                    'description' => $usp['description'],
                ];
            }, array_filter($request->product_usp ?? [], fn($usp) => !empty($usp['name']) && !empty($usp['description'])));

            $technical_specifications = array_map(function ($tech) {
                return [
                    'name' => $tech['name'],
                    'description' => $tech['description'],
                ];
            }, array_filter($request->product_technical ?? [], fn($tech) => !empty($tech['name']) && !empty($tech['description'])));

            $pdfPath = $product->product_pdf;
            if ($request->hasFile('product_pdf') && $request->file('product_pdf')->isValid()) {
                if ($pdfPath && file_exists(public_path(str_replace('public/', '', $pdfPath)))) {
                    unlink(public_path(str_replace('public/', '', $pdfPath)));
                }
                $pdfFile = $request->file('product_pdf');
                $pdfName = 'product_' . time() . '_' . uniqid() . '.' . $pdfFile->getClientOriginalExtension();
                $pdfFile->move(public_path('admin/uploads/products/pdf'), $pdfName);
                $pdfPath = 'public/admin/uploads/products/pdf/' . $pdfName;
            }
            $front_image = $product->front_image ?? null;
            if ($request->hasFile('front_image')) {
                $file = $request->file('front_image');
                $filename = $file->getClientOriginalName();
                $path = public_path('admin/product/front_image');
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }
                $file->move($path, $filename);
                $front_image = $filename;
            }
            $product->update([
                'url' => $request->url,
                'category_id' => $request->category,
                'subcategory_id' => $request->subcategory_id,
                'model_name' => $request->model_name,
                'product_name' => $request->product_name,
                'product_short_desc' => $request->product_short_desc,
                'product_desc' => $request->product_desc,
                'product_tech_desc' => $request->product_tech_desc,
                'product_app_desc' => $request->product_app_desc,
                'product_status' => $request->product_status,
                'is_live' => $request->is_live,
                'product_applications' => json_encode($request->product_application ?? []),
                'product_feature' => json_encode($request->product_feature ?? []),
                'product_usp' => json_encode($usps),
                'product_technical' => json_encode($technical_specifications),
                'product_pdf' => $pdfPath,
                'video_source' => $request->video_source,
                'front_image'          => $front_image,
                'video' => $videoPath,
                'thumnail_image' => $thumbnails_image,
                'meta_title'         => $request->get('meta_title'),
                'meta_description'         => $request->get('meta_description'),
            ]);

            if ($deleted_images) {
                ProductImages::whereIn('id', $deleted_images)->delete();
            }

            if ($request->hasFile('product_images')) {
                ProductImages::where('product_master_id', $product->id)->delete();
                foreach ($request->file('product_images', []) as $image) {
                    if ($image && $image->isValid()) {
                        $filename = 'product_' . time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                        $image->move(public_path('admin/uploads/products'), $filename);

                        ProductImages::create([
                            'product_master_id' => $product->id,
                            'image' => 'public/admin/uploads/products/' . $filename,
                        ]);
                    }
                }
            }

            DB::commit();
            return redirect()->route('product')->with('success', 'Product updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to update product. Please try again.');
        }
    }

    public function getProductsByCategory($id)
    {
        $category = ProductCategory::find($id);

        if (!$category) {
            return response()->json(['error' => 'Category not found'], 404);
        }
        $products = ProductMaster::where('category_id', $id)
                    ->where('product_status', 'Active')
                    ->where('is_live', 1)
                    ->orderBy('product_name', 'ASC')
                    ->get(['product_name', 'url']);
        // $products = ProductMaster::where('category_id', $id)
        //     ->where('product_status', 'Active')
        //     ->whereNotNull('index_id')        // exclude NULL
        //     ->where('index_id', '>', 0)       // exclude 0
        //     ->orderBy('index_id', 'ASC')
        //     ->get(['product_name', 'url']);

        return response()->json([
            'category' => [
                'banner_image' => asset($category->category_image ?? 'public/front/img/products_bg_1.png'),
                'title' => $category->title
            ],
            'products' => $products
        ]);
    }
}