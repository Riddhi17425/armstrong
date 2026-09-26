<?php
 
namespace App\Http\Controllers\Api;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use App\Models\ProductCategory;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\Application;
class ApplicationApiController extends Controller
{
    public function filterList(Request $request) 
    {
        try {
            // Fetch applications
            $appQuery = Application::where('status', 'Active');

            if ($request->filled('search')) {
                $searchTerm = $request->search;
                $appQuery->where('name', 'like', '%' . $searchTerm . '%');
            }

            $applications = $appQuery->get()->map(function ($application) {
                return [
                    'id'    => $application->id,
                    'title' => $application->name,
                    'image' => asset('/' . $application->application_image),
                ];
            });

            // Fetch categories
            $catQuery = ProductCategory::where('status', 'Active'); // Assuming 'status' column exists

            if ($request->filled('search')) {
                $searchTerm = $request->search;
                $catQuery->where('name', 'like', '%' . $searchTerm . '%');
            }

            $categories = $catQuery->get()->map(function ($category) {
                return [
                    'id'    => $category->id,
                    'title' => $category->name,
                    'image' => asset('/' . $category->category_image), // Adjust if image column differs
                ];
            });

            return response()->json([
                'result'  => 'success',
                'message' => 'Data retrieved successfully',
                'data'    => [
                    'applications' => $applications,
                    'categories'   => $categories,
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'result'  => false,
                'message' => 'An error occurred.',
                'error'   => $e->getMessage()
            ], 500);
        }
    }


}

    

