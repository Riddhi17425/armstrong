<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductMaster;
use App\Models\Inquiry;
use App\Models\Application;

class DashboardController extends Controller
{
    public function index(){
        $data['total_products'] = ProductMaster::where('product_status' , 'Active')->count();
        $data['total_inquires'] = Inquiry::count();
        $data['total_application'] = Application::where('status' , 'Active')->count();
        
        return view("admin.dashboard.index", compact('data') );
    }
}
