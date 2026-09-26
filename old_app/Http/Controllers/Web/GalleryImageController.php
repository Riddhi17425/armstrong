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
        $title = "";
        $description = "";
        $gallery = Gallery::where('status', 'Active')->get();
        $gallery_types = GalleryTypes::where('status', 'Active')->get();
        return view('front.gallery',compact('title','description','gallery' , 'gallery_types'));
    }
}
