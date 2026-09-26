<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginApiController extends Controller
{
    // public function login(Request $request)
    // {
    //     $credentials = $request->only('email', 'password');

    //     if (!$token = JWTAuth::attempt($credentials)) {
    //         return response()->json(['error' => 'Invalid credentials'], 401);
    //     }

    //     $user = auth()->user();

    //     if ($user->role != 3) {
    //         $token = JWTAuth::getToken();
    //         JWTAuth::invalidate($token);
    //         return 1;

    //         return response()->json([
    //             'result' => false,
    //             'message' => 'You do not have access to this section.'
    //         ], 403);
    //     }

    //     return response()->json([
    //         'result' => true,
    //         'message' => "Login Successfully.",
    //         'bearer_token' => $token,
    //         'token_type'   => 'bearer',
    //         'expires_in'   => JWTAuth::factory()->getTTL() * 60,
    //         'user'         => [
    //             'id'    => $user->id,
    //             'name'  => $user->name,
    //             'email' => $user->email,
    //             'role'  => $user->role,  // assuming you have a role column
    //             'profile_picture' => asset('/' . $user->profile_image)
    //         ]
    //     ]);
    // }

    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (!$token = JWTAuth::attempt($credentials)) {
        return response()->json(['error' => 'Invalid credentials'], 401);
    }

    $user = auth()->user();

    // Only role 3 can login
    if ($user->role != 3) {
        // JWTAuth::invalidate($token);
        return response()->json([
            'result' => false,
            'message' => 'You do not have access to this section.'
        ], 403);
    }

    return response()->json([
        'result' => true,
        'message' => "Login Successfully.",
        'bearer_token' => $token,
        'token_type'   => 'bearer',
        'expires_in'   => JWTAuth::factory()->getTTL() * 60, // now 24 hours
        'user'         => [
            'id'    => $user->id,
            'name'  => $user->name,
            'email' => $user->email,
            'role'  => $user->role,
            'profile_picture' => asset('/' . $user->profile_image)
        ]
    ]);
}

    public function logout(Request $request)
    {
        try {
            // $token = JWTAuth::getToken();

            // if (!$token) {
            //     return response()->json([
            //         'result' => false,
            //         'message' => 'Token is required.'
            //     ], 400);
            // }

            // JWTAuth::invalidate($token); // this throws exception if token is invalid/expired

            return response()->json([
                'result' => true,
                'message' => 'Logged out successfully.'
            ]);

        } catch (TokenInvalidException $e) {
            return response()->json([
                'result' => false,
                'message' => 'Invalid token.'
            ], 400);
        } catch (JWTException $e) {
            return response()->json([
                'result' => false,
                'message' => 'Failed to logout, please try again.'
            ], 500);
        }
    }
}
