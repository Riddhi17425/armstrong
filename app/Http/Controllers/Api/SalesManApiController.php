<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Models\User;
class SalesManApiController extends Controller
{
    public function Salesmanprofile(Request $request)
    {
        try {
            $user  = auth()->user();
            if (!$user) {
                return response()->json([
                    'result' => false,
                    'message' => 'User not found.'
                ], 404);
            }

            // Allow only users with role = 3
            if ($user->role != 3) {
                return response()->json([
                    'result' => false,
                    'message' => 'Access denied. Only Salesmen can access this resource.'
                ], 403);
            }
            $user->load(['city', 'state', 'country']);
            return response()->json([
                'result' => true,
                'message' => "Profile retrieved successfully.",
                'data' => [
                    'full_name'     => $user->name,
                    'email'         => $user->email,
                    'mobile_number' => $user->mobile,
                    'user_key'      => $user->user_key,
                    'city'          => $user->city,
                    'country'       => $user->country,
                    'state'         => $user->state,
                    'profile_picture' => asset('/' . $user->profile_image)
                ]
            ]);

        } catch (JWTException $e) {
            return response()->json([
                'result' => false,
                'message' => 'Token is invalid or expired.',
                'error' => $e->getMessage()
            ], 401);
        } catch (\Exception $e) {
            return response()->json([
                'result' => false,
                'message' => 'Something went wrong.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function updateProfile(Request $request)
    {
        try {
            $user  = auth()->user();
            if (!$user) {
                return response()->json([
                    'result' => false,
                    'message' => 'User not found.'
                ], 404);
            }

            // Allow only Salesman
            if ($user->role != 3) {
                return response()->json([
                    'result' => false,
                    'message' => 'Access denied. Only Salesmen can update profile.'
                ], 403);
            }

            // Validate input
            $request->validate([
                'name'          => 'sometimes|string|max:255',
                'mobile'        => 'sometimes|string|min:10|max:15',
                'email'         => 'sometimes|email|max:255',
                'country'       => 'sometimes|string|max:100',
                'city'          => 'sometimes|string|max:100',
                'state'         => 'sometimes|string|max:100',
                'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            ]);

            // Update fields
            if ($request->has('name')) $user->name = $request->name;
            if ($request->has('email')) $user->email = $request->email;
            if ($request->has('mobile')) $user->mobile = $request->mobile;
            if ($request->has('country')) $user->country = $request->country;
            if ($request->has('city')) $user->city = $request->city;
            if ($request->has('state')) $user->state = $request->state;

            // Handle profile image upload
           if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('admin/uploads/salesman'), $filename);
            $user->profile_image = 'public/admin/uploads/salesman/' . $filename;
            }

            $user->save();

            return response()->json([
                'result' => true,
                'message' => 'Profile updated successfully.',
                'data' => [
                    'full_name'       => $user->name,
                    'email'           => $user->email,
                    'mobile_number'   => $user->mobile,
                    'user_key'        => $user->user_key,
                    'country'         => $user->country,
                    'city'            => $user->city,
                    'state'           => $user->state,
                    'profile_picture' => asset('/' . $user->profile_image)
                ]
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'result' => false,
                'message' => 'Validation failed.',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'result' => false,
                'message' => 'Something went wrong.',
                'error' => $e->getMessage()
            ], 500);
        }

    }

}