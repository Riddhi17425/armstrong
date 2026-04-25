<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blogs;

class BlogController extends Controller
{
    public function blog()
    {
        $metatitle="Our Blogs & Insights | Armstrong";
        $metadescription="Explore our latest blogs & articles about the woven sack, FIBC industrial machines, HDPE/PP, jumbo bag-making machines, and many more.";
        $blogs = Blogs::orderBy('id','desc')->where('status','Active')->get();
        return view('front.blogs',compact('metatitle','metadescription','blogs'));
    }
    public function BlogsDetail($url)
    {
        $blog = Blogs::where('url', $url)->firstOrFail();
        // dd($blog);
        $metatitle = $blog->meta_title;
        $metadescription = $blog->meta_description;
        $blogs = Blogs::where('status','Active')->where('id', '!=', $blog->id)->get();
        // dd($blogs);
        return view('front.blog-detail', compact('blog','blogs','metatitle','metadescription'));
    }
}
