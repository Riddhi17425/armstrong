<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\ProductMaster;
use App\Models\ProductCategory;
use App\Models\ProductFaq;
use App\Models\ProductDescription;

class ProductsController extends Controller
{
    
    public function productsByCategory($url)
    {
        // Fetch category with products
        $category = ProductCategory::with(['products' => function($query) {
            $query->where('product_status', 'active')->where('is_live', 1)->with('images')->orderBy('product_name', 'asc');
        }])->where('url', $url)->firstOrFail();
        $products = $category->products;
        
       $faqs = [];
        if (!empty($category->faqs)) {
            $faqs = $category->faqs; 
        }
        
        
        
        $metatitle = $category->meta_title;
        $metadescription = $category->meta_description;
        $productsForJs = $products->map(function($product) {
            return [
                    'name' => $product->product_name,
                    'url'  => route('products.detail', $product->url),
                    'image'=> asset($product->images->first()->image ?? ''),
                ];
            });

        return view('front.product', compact('metatitle','metadescription','category', 'products' , 'productsForJs','faqs'));
    }
    
    public function detail($url)
    {
        $product = ProductMaster::with('images')
            ->where('url', $url)
            ->where('product_status', 'active')
            ->firstOrFail();
    
        $metatitle = $product->meta_title;
        $metadescription = $product->meta_description;
    
        $products = ProductMaster::where('product_status','Active')
                    ->where('id', '!=', $product->id)
                    ->get();
    
        $relatedProducts = ProductMaster::with('images')
            ->where('category_id', $product->category_id)
            ->where('product_status','Active')
            ->where('id', '!=', $product->id)
            ->get();
    
        // if ($product->url === 'fibc-fabric-cutting-machine') {
        //     $metatitle = "FIBC Fabric Cutting Machine – Jumbo Bag Cutting Machine";
        //     $metadescription = "Armstrong FIBC fabric cutting machine delivers high-speed, fully automatic cutting for FIBC jumbo bags with precise cutting length control.";
        
        //     return view('front.fibc-fabric-cutting-machine', compact(
        //         'product',
        //         'metatitle',
        //         'metadescription'
        //     ));
        // }
        
        // if ($product->url === 'woven-bag-lamination-machine') {
        //     $metatitle = "PP Woven Bag Lamination Machine";
        //     $metadescription = "Armstrong High-Speed Woven Sack Lamination Machine delivers precise, high-speed lamination for FIBC and PP/HDPE woven bag production with consistent quality.";
        
        //     return view('front.woven-bag-lamination-machine', compact(
        //         'product',
        //         'metatitle',
        //         'metadescription'
        //     ));
        // }
        // if ($product->url === 'eight-color-flexographic-roll-to-roll-printing-machine') {
        //     $metatitle = "Six Colors Roll to Roll Flexographic Printing Machine";
        //     $metadescription = "Six-color flexographic roll-to-roll machine offers high-speed, continuous multi-color printing designed to meet the needs of woven bag manufacturers worldwide.";
        
        //     return view('front.six-colors-flexographic-roll-to-roll-printing-machine', compact(
        //         'product',
        //         'metatitle',
        //         'metadescription'
        //     ));
        // }

    
        // ----- Remaining existing code -----
    
        $usps = [];
        if (!empty($product->product_usp)) {
            $decoded = json_decode($product->product_usp, true);
            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                $usps = $decoded;
            }
        }
    
        $applications_array = [];
        if (!empty($product->product_applications)) {
            $applications_array = json_decode($product->product_applications, true);
        }
    
        $applications = [];
        if (!empty($applications_array)) {
            $applications = Application::where('status','Active')
                                ->whereIn('name', $applications_array)
                                ->get();
        }
    
        $specifications = [];
        if (!empty($product->product_technical)) {
            $decoded = json_decode($product->product_technical, true);
            $specifications = array_filter($decoded, function ($spec) {
                return !empty($spec['name']) || !empty($spec['description']);
            });
        }
    
        $category_url = ProductCategory::where('status','Active')
                        ->where('id', $product->category_id)
                        ->first();
        
        $faqs = $product->faqs;
        $keyFeature = ProductDescription::where('product_master_id', $product->id)
    ->first();
        return view('front.product-detail', compact(
            'product',
            'products',
            'metatitle',
            'metadescription',
            'relatedProducts',
            'usps',
            'applications',
            'specifications',
            'category_url',
            'faqs',
            'keyFeature'
        ));
    }


    
    // public function specialCategory($special)
    // {
        
    //     $map = [
    //         'armstrong-sewing-machines' => [
    //             'ids' => [2], 
    //             'title' => 'Armstrong Sewing Machines'
    //         ],
    //         'orsan-machines' => [
    //             'ids' => [1], 
    //             'title' => 'Orsan Machines'
    //         ],
    //         'newlong-machines' => [
    //             'ids' => [4], 
    //             'title' => 'Newlong Machines'
    //         ],
    //         'juki-machines' => [
    //             'ids' => [3], 
    //             'title' => 'Juki Machines'
    //         ],
    //     ];
    
    //     if (!array_key_exists($special, $map)) {
    //         abort(404);
    //     }
    
    //     $products = ProductMaster::whereIn('subcategory_id', $map[$special]['ids'])
    //                 ->where('product_status', 'active')
    //                 ->get();
    
    //     $title = $map[$special]['title'];
    
    //     return view('front.special-category', compact('products', 'title'));
    // }
    
    // yamini 28-10-2025    
    // public function specialCategory($special) {
        
    //     $metatitle = '';
    //     $metadescription = '';
        
    //     $map = [
    //         'armstrong-sewing-machines-fibc' => [
    //             'product_names' => [
    //                 'FIBC Big Bag Sewing Machine',
    //                 'FIBC Bag Sewing Machine',
    //                 'High-Speed Single Needle Union Feed Lockstitch Machine',
    //                 // 'High-Speed Double Needle Four Thread Sewing Machine (BOPP/PP/HDPE/Paper Bags)',
    //                 // Bag Sewing Machine
    //                 'Jumbo Bag Loop Sewing Machine'
    //             ],
    //             'title' => 'Armstrong Sewing Machines'
    //         ],
    //         'armstrong-sewing-machines' => [
    //             'ids' => [2],
    //             'exclude_product_names' => [
    //                 'FIBC Big Bag Sewing Machine',
    //                 'FIBC Bag Sewing Machine',
    //                 // 'High-Speed Double Needle Four Thread Sewing Machine (BOPP/PP/HDPE/Paper Bags)',
    //                 'High-Speed Single Needle Union Feed Lockstitch Machine',
    //                 'Jumbo Bag Loop Sewing Machine',
    //                 'Woven Sack Bag Sewing Machine',
    //                 'Model -802 VMC',
    //                 'Model - 603 DR'
                    
    //             ],
    //             'title' => 'Armstrong Sewing Machines'
    //         ],
    //         'orsan-machines' => [
    //             'ids' => [1],
    //             'title' => 'Orsan Machines'
    //         ],
    //         'newlong-machines' => [
    //             'ids' => [4],
    //             'title' => 'Newlong Machines'
    //         ],
    //         'juki-machines' => [
    //             'ids' => [3],
    //             'title' => 'Juki Machines'
    //         ],
    //     ];
    
    //     if (!array_key_exists($special, $map)) {
    //         abort(404);
    //     }
    
    //     if ($special === 'armstrong-sewing-machines-fibc') {
    //     $products = ProductMaster::whereIn('product_name', $map[$special]['product_names'])
    //         ->where('product_status', 'active')
    //         ->where('category_id', '!=', 15)
    //         ->get();
    //     } elseif ($special === 'armstrong-sewing-machines') {
    //         $products = ProductMaster::whereIn('subcategory_id', $map[$special]['ids'])
    //             ->whereNotIn('product_name', $map[$special]['exclude_product_names'])
    //             ->where('product_status', 'active')
    //             ->where('category_id', '!=', 15)
    //             ->get();
    //     } else {
    //         $products = ProductMaster::whereIn('subcategory_id', $map[$special]['ids'])
    //             ->where('product_status', 'active')
    //             ->where('category_id', '!=', 15)
    //             ->get();
    //     }
    
    //     $title = $map[$special]['title'];
    
    //     return view('front.special-category', compact('products', 'title' ,  'metatitle', 'metadescription'));
    // }
    // public function spareparts($spare)
    // {
    //     $metatitle = '';
    //     $metadescription = '';
        
    //     $map = [
    //         'armstrong-spare-parts-fibc' => [
    //             'ids' => [2],
    //             'exclude_product_names' => [
    //                 'FIBC Big Bag Sewing Machine',
    //                 'FIBC Bag Sewing Machine',
    //                 'High-Speed Single Needle Union Feed Lockstitch Machine',
    //                 'High-Speed Double Needle Four Thread Sewing Machine (BOPP/PP/HDPE/Paper Bags)',
    //                 'Jumbo Bag Loop Sewing Machine',
    //                 'Bag Sewing Machine',
    //                 'Woven Sack Bag Sewing Machine'
    //             ],
    //             'title' => 'Armstrong Spare Parts'
    //         ],
    //             'armstrong-spare-parts' => [
    //                 'ids' => [2],
    //                 'exclude_product_names' => [
    //                     'Model 502',
    //                     'Model ST 602 HR',
    //                     'FIBC Big Bag Sewing Machine',
    //                     'FIBC Bag Sewing Machine',
    //                     // 'High-Speed Double Needle Four Thread Sewing Machine (BOPP/PP/HDPE/Paper Bags)',
    //                     'High-Speed Single Needle Union Feed Lockstitch Machine',
    //                     'Jumbo Bag Loop Sewing Machine',
    //                     'Woven Sack Bag Sewing Machine',
    //                     'Bag Sewing Machine',
    //                     'High-Speed Double Needle Four Thread Sewing Machine (BOPP/PP/HDPE/Paper Bags)'
                        
    //                 ],
    //                 'title' => 'Armstrong Sewing Machines'
    //             ],
    //         'orsan-spare-parts' => [
    //             'ids' => [1],
    //             'exclude_product_names' => [
    //                 'Single Needle Double Thread Plain Feed Chain Stitch Sewing Machine',
    //             ],
    //             'title' => 'Orsan Spare Parts'
    //         ],
    
    //         'juki-spare-parts' => [
    //             'ids' => [3],
    //             'exclude_product_names' => [
    //                 'Big Bag Sewing Machine',
    //             ],
    //             'title' => 'Juki Spare Parts'
    //         ],
    //         'newlong-spare-parts' => [
    //             'ids' => [4],
    //             'exclude_product_names' => [
    //                 'Bag Sewing Machine For Big Bags',
    //                 'The Single Needle Flat Bed Sewing Machine',
    //             ],
    //             'title' => 'Newlong Spare Parts'
    //         ],
    //         // ✅ Circular Loom Cutter without subcategory_id
    //         'ultrasonic-loom-cutter' => [
    //         'ids' => [5],
    //         'include_product_names' => [
    //             'Ultrasonic Loom Cutter '
    //         ],
    //         'title' => 'Ultrasonic Loom Cutter'
    //     ],
    //         'bag-closer-spare' => [
    //             'ids' => [6],
    //             'include_product_names' => [
    //                 'Bag Closer Spare'
    //             ],
    //             'title' => 'Bag Closer Spare'
    //         ],
    //             'bcs-machine-spare' => [
    //             'ids' => [8],
    //             'include_product_names' => [
    //                 'Bcs Machine Spare'
    //             ],
    //             'title' => 'Bcs Machine Spare'
    //         ],
    //         'needle-loom-spare' => [
    //             'ids' => [7],
    //             'include_product_names' => [
    //                 'Needle Loom Spare'
    //             ],
    //             'title' => 'Needle Loom Spare'
    //         ],
    //     ];
    
    //     if (!array_key_exists($spare, $map)) {
    //         abort(404);
    //     }
    
    //     // Base query
    //     $query = ProductMaster::whereIn('subcategory_id', $map[$spare]['ids'])
    //         ->where('product_status', 'active');
    
    //     // Apply exclusions if any
    //     if (!empty($map[$spare]['exclude_product_names'])) {
    //         $query->whereNotIn('product_name', $map[$spare]['exclude_product_names']);
    //     }
    
    //     $products = $query->get();
    
    //     $title = $map[$spare]['title'];
    
    //     return view('front.special-category', compact('products', 'title' ,  'metatitle', 'metadescription'));
    // }
    //end by yamini 28-10-2025
    
    
    // 22-12-2025
    // public function specialCategory($special)
    // {
    //     $map = [
    //         'armstrong-sewing-machines-fibc' => [
    //             'product_names' => [
    //                 'FIBC Big Bag Sewing Machine',
    //                 'FIBC Bag Sewing Machine',
    //                 'High-Speed Single Needle Union Feed Lockstitch Machine',
    //                 'Jumbo Bag Loop Sewing Machine'
    //             ],
    //             'title' => 'Armstrong Sewing Machines (FIBC)',
    //             'meta_title' => 'FIBC Sewing Machines For Big Bag & Jumbo Bag Solutions',
    //             'meta_description' => 'Explore Armstrong’s heavy-duty industrial sewing machines specifically for FIBC/big-bag production. Call us today at +079 27543747 to request a quote.'
    //         ],
    //         'armstrong-sewing-machines' => [
    //             'ids' => [2],
    //             'exclude_product_names' => [
    //                 'FIBC Big Bag Sewing Machine',
    //                 'FIBC Bag Sewing Machine',
    //                 'High-Speed Single Needle Union Feed Lockstitch Machine',
    //                 'Jumbo Bag Loop Sewing Machine',
    //                 'Woven Sack Bag Sewing Machine',
    //                 'Model -802 VMC',
    //                 'Model - 603 DR'
    //             ],
    //             'title' => 'Armstrong Sewing Machines',
    //             'meta_title' => 'Armstrong Industrial Sewing Machines for Bags & FIBC',
    //             'meta_description' => 'Explore our high-speed double-needle and four-thread sewing machines engineered by Armstrong and for BOPP, PP, HDPE & paper bags. Request a quote today!'
    //         ],
    //         'orsan-machines' => [
    //             'ids' => [1],
    //             'title' => 'Orsan Machines',
    //             'meta_title' => 'Orsan Sewing Machines | Armstrong FIBC Solutions',
    //             'meta_description' => 'Explore heavy-duty Orsan sewing machines at Armstrong, designed for FIBC and bulk bag production also give reliable performance with full support.'
    //         ],
    //         'newlong-machines' => [
    //             'ids' => [4],
    //             'title' => 'Newlong Machines',
    //             'meta_title' => 'Newlong Sewing Machines | Woven Sack Solutions',
    //             'meta_description' => 'Discover Newlong brand sewing machines for reliable, high-performance models from Armstrong and for woven sack and bulk-bag production.'
    //         ],
    //         'juki-machines' => [
    //             'ids' => [3],
    //             'title' => 'Juki Machines',
    //             'meta_title' => 'JUKI Industrial Sewing Machines | Armstrong',
    //             'meta_description' => 'Discover heavy-duty JUKI sewing machines at Armstrong for big-bag & woven-sack production to get high-performance, reliable solutions.'
    //         ],
    //     ];
    
    //     if (!array_key_exists($special, $map)) {
    //         abort(404);
    //     }
    
    //     if ($special === 'armstrong-sewing-machines-fibc') {
    //         $products = ProductMaster::whereIn('product_name', $map[$special]['product_names'])
    //             ->where('product_status', 'active')
    //             ->where('category_id', '!=', 15)
    //             ->get();
    //     } elseif ($special === 'armstrong-sewing-machines') {
    //         $products = ProductMaster::whereIn('subcategory_id', $map[$special]['ids'])
    //             ->whereNotIn('product_name', $map[$special]['exclude_product_names'])
    //             ->where('product_status', 'active')
    //             ->where('category_id', '!=', 15)
    //             ->get();
    //     } else {
    //         $products = ProductMaster::whereIn('subcategory_id', $map[$special]['ids'])
    //             ->where('product_status', 'active')
    //             ->where('category_id', '!=', 15)
    //             ->get();
    //     }
    
    //     $title = $map[$special]['title'];
    //     $metatitle = $map[$special]['meta_title'];
    //     $metadescription = $map[$special]['meta_description'];
    
    //     return view('front.special-category', compact('products', 'title', 'metatitle', 'metadescription'));
    // }
    //end 22-12-2025
    
    public function specialCategory($special)
    {
        $map = [
            'armstrong-sewing-machines-fibc' => [
                'product_names' => [
                    'FIBC Big Bag Sewing Machine',
                    'FIBC Bag Sewing Machine',
                    'High-Speed Single Needle Union Feed Lockstitch Machine',
                    'Jumbo Bag Loop Sewing Machine'
                ],
                'title' => 'Armstrong Sewing Machines (FIBC)',
                'meta_title' => 'FIBC Sewing Machines For Big Bag & Jumbo Bag Solutions',
                'meta_description' => 'Explore Armstrong’s heavy-duty industrial sewing machines specifically for FIBC/big-bag production.'
            ],
    
            'armstrong-sewing-machines' => [
                'ids' => [2],
                'exclude_product_names' => [
                    'FIBC Big Bag Sewing Machine',
                    'FIBC Bag Sewing Machine',
                    'High-Speed Single Needle Union Feed Lockstitch Machine',
                    'Jumbo Bag Loop Sewing Machine',
                    'Woven Sack Bag Sewing Machine',
                    'Model -802 VMC',
                    'Model - 603 DR'
                ],
                'title' => 'Armstrong Sewing Machines',
                'meta_title' => 'Armstrong Industrial Sewing Machines',
                'meta_description' => 'Explore Armstrong industrial sewing machines.'
            ],
    
            'orsan-machines' => [
                'ids' => [1],
                'title' => 'Orsan Machines',
                'meta_title' => 'Orsan Sewing Machines',
                'meta_description' => 'Explore Orsan sewing machines.'
            ],
    
            'newlong-machines' => [
                'ids' => [4],
                'title' => 'Newlong Machines',
                'meta_title' => 'Newlong Sewing Machines',
                'meta_description' => 'Discover Newlong sewing machines.'
            ],
    
            'juki-machines' => [
                'ids' => [3],
                'title' => 'Juki Machines',
                'meta_title' => 'JUKI Sewing Machines',
                'meta_description' => 'Discover JUKI sewing machines.'
            ],
        ];
    
        if (!isset($map[$special])) {
            abort(404);
        }
    
        if ($special === 'armstrong-sewing-machines-fibc') {
    
            $products = ProductMaster::whereIn('product_name', $map[$special]['product_names'])
                ->where('product_status', 'active')->where('is_live', 1)
                ->get();
    
        } elseif ($special === 'armstrong-sewing-machines') {
    
            $products = ProductMaster::whereIn('subcategory_id', $map[$special]['ids'])
                ->whereNotIn('product_name', $map[$special]['exclude_product_names'])
                ->where('product_status', 'active')
                ->get();
    
        } else {
    
            $products = ProductMaster::whereIn('subcategory_id', $map[$special]['ids'])
                ->where('product_status', 'active')
                ->get();
        }
    
        return view('front.special-category', [
            'products' => $products,
            'title' => $map[$special]['title'],
            'metatitle' => $map[$special]['meta_title'],
            'metadescription' => $map[$special]['meta_description'],
        ]);
    }

    
    public function spareparts($spare)
    {
       
        $map = [
            'armstrong-spare-parts-fibc' => [
                'ids' => [2],
                'exclude_product_names' => [
                    'FIBC Big Bag Sewing Machine',
                    'FIBC Bag Sewing Machine',
                    'High-Speed Single Needle Union Feed Lockstitch Machine',
                    'High-Speed Double Needle Four Thread Sewing Machine (BOPP/PP/HDPE/Paper Bags)',
                    'Jumbo Bag Loop Sewing Machine',
                    'Bag Sewing Machine',
                    'Woven Sack Bag Sewing Machine'
                ],
                'title' => 'Armstrong Spare Parts',
                'meta_title' => 'Our Spare Parts at Armstrong',
                'meta_description' => 'Browse our reliable spare parts for FIBC and woven-sack machinery from Armstrong. Get high-quality stock, customised solutions & global support.'
            ],
            'armstrong-spare-parts' => [
                'ids' => [2],
                'exclude_product_names' => [
                    'Model 502',
                    'Model ST 602 HR',
                    'FIBC Big Bag Sewing Machine',
                    'FIBC Bag Sewing Machine',
                    'High-Speed Single Needle Union Feed Lockstitch Machine',
                    'Jumbo Bag Loop Sewing Machine',
                    'Woven Sack Bag Sewing Machine',
                    'Bag Sewing Machine',
                    'High-Speed Double Needle Four Thread Sewing Machine (BOPP/PP/HDPE/Paper Bags)'
                ],
                'title' => 'Armstrong Sewing Machines',
                'meta_title' => '',
                'meta_description' => ''
            ],
            'orsan-spare-parts' => [
                'ids' => [1],
                'exclude_product_names' => [
                    'Single Needle Double Thread Plain Feed Chain Stitch Sewing Machine',
                ],
                'title' => 'Orsan Spare Parts',
                'meta_title' => 'Orsan Spare Parts | Model 4000 H |  Model 3000 2H',
                'meta_description' => 'Get genuine spare parts for Orsan machines at Armstrong for high-quality stock for bags, FIBC, and woven-sack production. Get a free quote today.'
            ],
            'juki-spare-parts' => [
                'ids' => [3],
                'exclude_product_names' => [
                    'Big Bag Sewing Machine',
                ],
                'title' => 'Juki Spare Parts',
                'meta_title' => 'JUKI Spare Parts | Armstrong Industrial Bag Machinery',
                'meta_description' => 'Browse our genuine JUKI spare parts at Armstrong for woven-sack & FIBC machines — global supply, expert support. Call us today to get a free quote.'
            ],
            'newlong-spare-parts' => [
                'ids' => [4],
                'exclude_product_names' => [
                    'Bag Sewing Machine For Big Bags',
                    'The Single Needle Flat Bed Sewing Machine',
                ],
                'title' => 'Newlong Spare Parts',
                'meta_title' => 'Newlong Spare Parts | Armstrong Industrial Supply',
                'meta_description' => 'Explore our genuine spare parts for NEWLONG industrial sewing & bag-closing machines at Armstrong. Call Armstrong at +07927543747 to get a quote today.'
            ],
            'ultrasonic-loom-cutter' => [
                'ids' => [5],
                'include_product_names' => [
                    'Ultrasonic Loom Cutter '
                ],
                'title' => 'Ultrasonic Loom Cutter',
                'meta_title' => 'Ultrasonic Loom Cutter | Armstrong',
                'meta_description' => 'High-quality ultrasonic loom cutter spare parts for Reliable performance, and suitable for industrial woven sack & FIBC machines.'
            ],
            'bag-closer-spare' => [
                'ids' => [6],
                'include_product_names' => [
                    'Bag Closer Spare'
                ],
                'title' => 'Bag Closer Spare',
                'meta_title' => 'Bag Closer Spare Parts | Armstrong Industrial Supply',
                'meta_description' => 'Get high-quality spare parts for bag closing machines at Armstrong for smooth operation. Call at +079-27543747 to get a quote today.'
            ],
            'bcs-machine-spare' => [
                'ids' => [8],
                'include_product_names' => [
                    'Bcs Machine Spare'
                ],
                'title' => 'Bcs Machine Spare',
                'meta_title' => 'BCS Machine Spare | Armstrong Industrial Supply',
                'meta_description' => 'High-quality spare parts for BCS machines by Armstrong to keep your bag closing & conversion lines running smoothly. Call us today to get a quote.'
            ],
            'needle-loom-spare' => [
                'ids' => [7],
                'include_product_names' => [
                    'Needle Loom Spare'
                ],
                'title' => 'Needle Loom Spare',
                'meta_title' => 'Needle-Loom Spare | Armstrong Industrial Spares',
                'meta_description' => 'Explore our high-quality spare parts for needle-loom machines at Armstrong. Keep your woven-sack or FIBC production line running.'
            ],
            'circular-loom-spare-parts' => [
                'ids' => [9],
                'include_product_names' => [
                    'Circular Loom Spare Parts'
                ],
                'title' => 'Circular Loom Spare Parts',
                'meta_title' => 'Circular Loom Spare Parts | Armstrong Industrial Spares',
                'meta_description' => 'Explore our high-quality spare parts for circular loom machines at Armstrong. Keep your woven-sack or FIBC production line running.'
            ],
        ];
    
        if (!array_key_exists($spare, $map)) {
            abort(404);
        }
    
        // Base query
        $query = ProductMaster::whereIn('subcategory_id', $map[$spare]['ids'])
            ->where('product_status', 'active');
    
        // Apply exclusions if any
        if (!empty($map[$spare]['exclude_product_names'])) {
            $query->whereNotIn('product_name', $map[$spare]['exclude_product_names']);
        }
    
        // Apply inclusions if defined (for special cases)
        if (!empty($map[$spare]['include_product_names'])) {
            $query->whereIn('product_name', $map[$spare]['include_product_names']);
        }
    
        $products = $query->get();
    
        $title = $map[$spare]['title'];
        $metatitle = $map[$spare]['meta_title'];
        $metadescription = $map[$spare]['meta_description'];
    
        return view('front.special-category', compact('products', 'title', 'metatitle', 'metadescription'));
    }
    
    public function circularLoomStatic()
    {
        $title = 'Circular Loom';
        $meta_title = 'Circular Loom Machines';
        $meta_description = 'Explore our Circular Loom Machines and spare parts.';
    
        return view('front.circular');
    }
    
    
    public function search(Request $request)
    {
        $query = $request->get('q', '');

        $products = ProductMaster::where('product_status', 'Active') // only active
            ->where('product_name', 'LIKE', "%{$query}%")
            ->limit(10) // limit suggestions
            ->get(['id', 'product_name', 'url', 'front_image']); // select only needed fields

        $results = $products->map(function ($product) {
            // handle image path
            $image = $product->front_image 
                ? asset('public/admin/product/front_image/' . $product->front_image)
                : asset('public/front/img/no-image.png');

            return [
                'name' => $product->product_name,
                'url'  => route('products.detail', $product->url),
                'image'=> $image,
            ];
        });

        return response()->json($results);
    }
}    
    

