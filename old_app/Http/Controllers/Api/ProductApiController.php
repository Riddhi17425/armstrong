<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\ProductMaster;
use App\Models\ProductColor;
use App\Models\Application;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Validator;
use App\Models\ProductCategory;
use App\Models\ProductFeature;
use App\Models\Inquiry;
use App\Models\InquiryProducts;
class ProductApiController extends Controller
{

    

    

   
    
    public function productDetails($id)
    {
        // Fetch the active product by ID with relations
        $product = ProductMaster::with(['images', 'application'])
            ->where('product_status', 'Active')
            ->where('id', $id)
            ->first();

        if (!$product) {
            return response()->json([
                'status' => false,
                'message' => 'Product not found',
                'data' => null
            ], 404);
        }

        // Initialize applicationsData
        $applicationsData = [];
        $productApplications = json_decode($product->product_applications, true) ?? [];

        if (!empty($productApplications)) {
            // Fetch all active applications at once by name
            $applications = Application::where('status', 'Active')
                ->whereIn('name', $productApplications)
                ->get()
                ->keyBy('name'); // Allows fast lookup by name

            foreach ($productApplications as $appName) {
                if (isset($applications[$appName])) {
                    $application = $applications[$appName];
                    $applicationsData[] = [
                        'id'    => $application->id,
                        'order' => $application->id,
                        'title' => $application->name,
                        'image' => asset('/') . $application->application_image,
                    ];
                }
            }
        }

        // Main application info
        $application = $product->application
            ? [
                'id'   => $product->application->id,
                'name' => $product->application->name,
            ]
            : ['id' => '', 'name' => ''];
 
        $view_brochure = [
            'label' => 'View Brochure',
            'url'   => $product->product_pdf ? asset('/') . $product->product_pdf : null,
        ];

        $tabs = [
            'usps'                    => json_decode($product->product_usp, true) ?? [],
            'applications'            => $applicationsData,
            'technical_specifications'=> json_decode($product->product_technical, true) ?? []
        ];

        $imageCarousel = [
            'images' => $product->images->map(function ($img) {
                return asset('/' . $img->image);
            })->toArray()
        ];

        $video_link = null; 
        if(!empty($product->video_source)){
            if($product->video_source === 'upload'){
               if(!empty($product->video)){
                    $video_link = asset('/' . $product->video);
                }
            }else{
                $video_link = $product->video;
            }
        }
        

        $productData = [
            'id'                => $product->id,
            'title'             => $product->product_name,
            'image_url'         => $product->images->first()
                                        ? asset('/' . $product->images->first()->image)
                                        : asset('public/defaults/no-image.png'),
            'short_description' => $product->product_short_desc,
            'long_description'  => $product->product_desc,
            'application'       => $application,
            'features'          => json_decode($product->product_feature, true) ?? [],
           // 'industries'        => json_decode($product->product_industries, true) ?? [],
            'product_status'    => $product->product_status ?? '',
            'view_brochure'     => $view_brochure,
            'tabs'              => $tabs,
            'image_carousel'    => $imageCarousel,
            'video_link'        => $video_link,
            'video_thumbnail'   => asset('/' . $product->thumnail_image) ?? '',
        ];

        return response()->json([
            'status'  => true,
            'message' => 'Product detail fetched successfully',
            'data'    => [
                'products' => [$productData]
            ]
        ]);
    }
 


    // public function GetAllProducts(Request $request)
    // {
    //     $search = $request->query('search');
    //     $limit = $request->query('limit') ?? 6 ;

    //     $query = ProductMaster::with(['images'])
    //         ->where('product_status', 'Active');

    //     if (!empty($search)) {
    //         $query->where(function ($q) use ($search) {
    //             $q->where('product_name', 'LIKE', "%{$search}%")
    //             ->orWhere('product_applications', 'LIKE', "%{$search}%")
    //             ->orWhere('product_feature', 'LIKE', "%{$search}%");
    //         });
    //     }

    //     $products = $query->latest()->take($limit)->get();

    //     $popularProducts = $products->map(function ($product) {
    //         return [
    //             'id'             => $product->id,
    //             'title'          => $product->product_name,
    //             'image_url'      => $product->images->first()
    //                                     ? asset('/' . $product->images->first()->image)
    //                                     : asset('public/defaults/no-image.png'),
    //             'features'       => json_decode($product->product_feature, true) ?? [],
    //             'applications'   => json_decode($product->product_applications, true) ?? [],
    //             'product_status' => $product->product_status ?? '',
    //         ];
    //     });

    //     return response()->json([
    //         'status'  => true,
    //         'message' => 'Home screen data fetched successfully',
    //         'data'    => $popularProducts,
    //     ]);
    // }

    public function GetAllProducts(Request $request)
    {
        $search = $request->query('search');
        $limit = $request->query('limit') ?? 6; // Number of items per page
        $page = $request->query('page') ?? 1;   // Current page, default to 1

        $query = ProductMaster::with(['images'])
            ->where('product_status', 'Active')
            ->orderBy('id' , 'Asc');
 
        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('product_name', 'LIKE', "%{$search}%")
                ->orWhere('product_applications', 'LIKE', "%{$search}%")
                ->orWhere('product_feature', 'LIKE', "%{$search}%");
            });
        }

        // Paginate the results
        $paginated = $query->latest()->paginate($limit);

        // Map the products in the current page
        $popularProducts = $paginated->getCollection()->map(function ($product) {
            return [
                'id'             => $product->id,
                'title'          => $product->product_name,
                'image_url'      => $product->images->first()
                                        ? asset('/' . $product->images->first()->image)
                                        : asset('public/defaults/no-image.png'),
                'features'       => json_decode($product->product_feature, true) ?? [],
                'applications'   => json_decode($product->product_applications, true) ?? [],
                'product_status' => $product->product_status ?? '',
            ];
        });

        return response()->json([
            'status'  => true,
            'message' => 'Products fetched successfully',
            'data'    => $popularProducts,
            'pagination' => [
                'current_page' => $paginated->currentPage(),
                'last_page'    => $paginated->lastPage(),
                'per_page'     => $paginated->perPage(),
                'total'        => $paginated->total(),
            ],
        ]);
    }




    public function releventProducts($id)
    {
        // Get the base product
        $baseProduct = ProductMaster::find($id);
        if (!$baseProduct) {
            return response()->json([
                'status' => false,
                'message' => 'Product not found'
            ], 404);
        }

        // Decode JSON fields
        $industries = json_decode($baseProduct->product_industries, true) ?? [];
        $features   = json_decode($baseProduct->product_feature, true) ?? [];

        // Query relevant products
        $products = ProductMaster::with(['images', 'application'])
            ->where('product_status', 'Active')
            ->where('id', '!=', $id) // exclude current product
            ->where(function ($query) use ($baseProduct, $industries, $features) {
                // Match by application
                if ($baseProduct->application_id) {
                    $query->orWhere('application_id', $baseProduct->application_id);
                }
                // Match by at least one industry
                if (!empty($industries)) {
                    foreach ($industries as $industry) {
                        $query->orWhere('product_industries', 'LIKE', '%' . $industry . '%');
                    }
                }
                // Match by at least one feature
                if (!empty($features)) {
                    foreach ($features as $feature) {
                        $query->orWhere('product_feature', 'LIKE', '%' . $feature . '%');
                    }
                }
            })
            ->latest()
            ->take(6)
            ->get();

        // Format output
        $relevantProducts = $products->map(function ($product) {
            return [
                'id'         => $product->id,
                'title'      => $product->product_name,
                'image'      => $product->images->first()
                                    ? asset('/' . $product->images->first()->image)
                                    : asset('public/defaults/no-image.png'),
                'features'       => json_decode($product->product_feature, true) ?? [],
                'applications'   => json_decode($product->product_applications, true) ?? [],
                
            ];
        });

        return response()->json([
            'status'  => true,
            'message' => 'Relevant products fetched successfully',
            'data'    => [
                'relevant_products' => $relevantProducts
            ]
        ]);
    }


    public function inquiryStore(Request $request){
        $validator = Validator::make($request->all(), [
            'purpose_of_inquiry' => 'required|string|max:255',
            'full_name'          => 'required|string|max:500',
            'mobile_number'      => [
                'required',
                'regex:/^(\+?\d{1,3}[- ]?)?\d{10}$/'
            ],
            'email'              => 'required|email|max:255',
            'company_name'       => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'result' => false,
                'message' => "Required Filed."
            ]);
        }

        $createData = new Inquiry();
        $createData->purpose_of_inquiry = $request->purpose_of_inquiry;
        $createData->full_name = $request->full_name;
        $createData->mobile_number = $request->mobile_number;
        $createData->email = $request->email;
        $createData->company_name = $request->company_name;
        $createData->interested_machines = json_encode($request->interested_machines , true);
        $createData->save();
        if($request->interested_machines){
            foreach($request->interested_machines as $machine){
                $data = new InquiryProducts;
                $data->inquiry_id = $createData->id;
                $data->product_id = $machine['product_id'];
                $data->name = $machine['name'];
                $data->quantity = $machine['quantity'];
                $data->save();
            };
        };

        return response()->json([
            'result' => true,
            'message' => "Inquiry Created Successed.",
        ]);
    }

    public function FilterProduct(Request $request)
    {
        try {
            $applicationName = $request->query('application');
            $categoryName = $request->query('category');

            $query = ProductMaster::with(['images']);

            // Only get active products
            $query->where('product_status', 'Active');

            // If category is provided, join/filter by category_id
            if (!empty($categoryName)) {
                // Find the category by name first
                $category = ProductCategory::where('name', 'like', '%' . $categoryName . '%')->first();

                if ($category) {
                    $query->where('category_id', $category->id);
                } else {
                    // If category not found, return empty result
                    return response()->json([
                        'status'  => true,
                        'message' => 'No products found for this category.',
                        'data'    => [
                            'popular_products' => []
                        ]
                    ]);
                }
            }

            $products = $query->latest()->get();

            // Filter by application if provided
            if (!empty($applicationName)) {
                $products = $products->filter(function ($product) use ($applicationName) {
                    $applications = json_decode($product->product_applications, true);

                    if (!is_array($applications)) {
                        return false;
                    }

                    foreach ($applications as $app) {
                        if (stripos($app, $applicationName) !== false) {
                            return true;
                        }
                    }

                    return false;
                });
            }

            $products = $products->take(6);

            $popularProducts = $products->map(function ($product) {
                return [
                    'id'             => $product->id,
                    'title'          => $product->product_name,
                    'image_url'      => $product->images->first()
                                            ? asset('/' . $product->images->first()->image)
                                            : asset('public/defaults/no-image.png'),
                    'features'       => json_decode($product->product_feature, true) ?? [],
                   // 'industries'     => json_decode($product->product_industries, true) ?? [],
                    'applications'   => json_decode($product->product_applications, true) ?? [],
                    'categories'     => $product->category ? [$product->category->name] : [], // Return category name
                    'product_status' => $product->product_status ?? '',
                ];
            })->values();

            return response()->json([
                'status'  => true,
                'message' => 'Filtered products fetched successfully',
                'data'    => [
                    'popular_products' => $popularProducts
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status'  => false,
                'message' => 'An error occurred.',
                'error'   => $e->getMessage()
            ], 500);
        }
    }


}
