<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\Country;

class GlobalApiController extends Controller
{
    public function getLocationHierarchy()
    {
        $data = Country::with(['states.cities'])->get();

        return response()->json($data);
    }
}
