<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\GalleryTypes;

class GalleryImageController extends Controller
{
    public function gallery( Request $request)
    {
        $metatitle = "Industrial Machinery & Manufacturing Solutions | Armstrong";
        $metadescription = "View the Armstrong gallery to see industrial bag-making machines, equipment, and product visuals. Explore solutions for PP woven sacks and packaging production.";
        $gallery = Gallery::where('status', 'Active')->get();
        $gallery_types = GalleryTypes::where('status', 'Active')->get();
        return view('front.gallery',compact('metatitle','metadescription','gallery' , 'gallery_types'));
    }
}