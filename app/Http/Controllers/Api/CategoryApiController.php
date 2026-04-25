<?php
 
namespace App\Http\Controllers\Api;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use App\Models\Category;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\ProductMaster;
class CategoryApiController extends Controller
{
    public function get_category(Request $request)
    {
        try {
            $categories = Category::where('status', 'Active')->get()->map(function ($category) {
                $productsCount = ProductMaster::where('category_id' , $category->id)->count(); // Assuming you have a relationship defined in Category model
                return [
                    'id'       => $category->id,
                    'title'    => $category->name,
                    'image'    => asset('/' . $category->category_image) ,
                    'bg_color' => $category->bg_color,
                    'product_count' => $productsCount, // Assuming you have a products_count attribute
                ];
            });
    
            return response()->json([
                'result'     => 'success',
                'message'    => 'Categories retrieved successfully',
                'categories' => $categories, // <-- separated field instead of 'data'
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