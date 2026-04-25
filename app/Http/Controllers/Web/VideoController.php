<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\ProductMaster;
use App\Models\ProductCategory;

class VideoController extends Controller
{
    public function video()
    {
        $metatitle="Explore Our Videos | Armstrong";
        $metadescription="Discover Armstrong in action through our videos, showcasing advanced finishing solutions, precision engineering, and customer-focused innovation.";
        $product_category =  ProductCategory::where('status' , 'Active')->get();
        $videos = Video::where('status','Active')->orderBy('id','desc')->get();
        return view('front.videos',compact('metatitle','metadescription','videos' , 'product_category'));
    }

    public function filterVideos(Request $request)
    {
        try {
            $categoryId = $request->query('category');

            $videos = ProductMaster::where('category_id', $categoryId)
                ->where('product_status', 'Active')
                ->latest()
                ->take(10)
                ->get()
                ->map(function($video) {
                    // Compute video URL
                    $videoUrl = $video->video_source == 'youtube'
                        ? $video->video
                        : ($video->video ? asset($video->video) : '');

                    // Compute thumbnail
                    $thumbnail = $video->thumnail_image 
                        ? asset($video->thumnail_image)
                        : ($video->video_source == 'youtube' && $video->video
                            ? 'https://img.youtube.com/vi/' . \Illuminate\Support\Str::afterLast($video->video, 'v=') . '/hqdefault.jpg'
                            : '');

                    return [
                        'id' => $video->id,
                        'video_source' => $video->video_source,
                        'video_url' => $videoUrl,
                        'thumbnail' => $thumbnail,
                    ];
                })
                ->filter(function($video) {
                    // Filter out videos with empty URLs or thumbnails
                    return !empty($video['video_url']) && !empty($video['thumbnail']);
                })
                ->values(); // Reset keys after filtering

            if ($videos->isNotEmpty()) {
                return response()->json([
                    'status' => true,
                    'data' => [
                        'videos' => $videos
                    ]
                ]);
            } else {
                return response()->json([
                    'status' => true,
                    'data' => [
                        'videos' => []
                    ],
                    'message' => 'No videos found for this category.'
                ]);
            }

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'An error occurred.',
                'error' => $e->getMessage()
            ], 500);
        }
    }


}
 