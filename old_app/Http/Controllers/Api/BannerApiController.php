<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\Banner; 
class BannerApiController extends Controller
{
    public function get_banner(Request $request)
    {
        try {
    
            $banner_data = Banner::where('banner_status', 'Active')->get()->map(function ($banner) {
                return [
                    'id'       => $banner->id,
                    'banner_title'    => $banner->banner_title,
                    'banner_subtitle'    => $banner->banner_subtitle,
                    'banner_status'    => $banner->banner_status,
                    'banner_button_text'    => $banner->banner_button_text,
                    'banner_offer_text'    => $banner->banner_offer_text,
                    'banner_image'    => asset('/' . $banner->banner_image) ,
                ];
            });
    
            return response()->json([
                'result'     => 'success',
                'message'    => 'Banner retrieved successfully',
                'banner' => $banner_data, // <-- separated field instead of 'data'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'result' => false,
                'message' => 'An error occurred.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
