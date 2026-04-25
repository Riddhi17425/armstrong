<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application; 
use App\Models\Inquiry;
use App\Models\ProductEnquiry;
use App\Models\Contact;
use App\Models\LandingQuote;
use DataTables;
use Str;

class APKProductInquiryController extends Controller
{
    public function index(Request $request)
    {
        //return 111;
        return view('admin.apk_product_inquiry.index');
    }  

     public function GetData(Request $request)
    { 
        $type =  $request->inquiry_type;
        
        switch($type){
            case 'landing-page-inquiry':
                $query = LandingQuote::select(
                    'id', 
                    'name as full_name', 
                    'contact as mobile_number', 
                    'email', 
                    'company_name'
                )->get()
                ->map(function($item) {
                    $item->purpose_of_inquiry = 'Landing Page Inquiry';
                    return $item;
                });
                break;

            case 'quote-inquiry':
                $query = Quote::select(
                    'id', 
                    'name as full_name', 
                    'contact as mobile_number', 
                    'email', 
                    'company_name'
                )->get()
                ->map(function($item) {
                    $item->purpose_of_inquiry = 'Quote Inquiry';
                    return $item;
                });
                break;

            case 'product-inquiry':
                $query = ProductEnquiry::select(
                    'id', 
                    'name as full_name', 
                    'contact as mobile_number', 
                    'email', 
                    'company_name'
                )->get()
                ->map(function($item) {
                    $item->purpose_of_inquiry = 'Product Inquiry';
                    return $item;
                });
                break;

            case 'application-inquiry':
                $query = Inquiry::select(
                    'id', 
                    'purpose_of_inquiry', 
                    'full_name', 
                    'mobile_number', 
                    'email', 
                    'company_name'
                )->get()
                ->map(function($item) {
                    // purpose_of_inquiry already exists
                    return $item;
                });
                break;

            case 'contact-us-inquiry':
                $query = Contact::select(
                    'id', 
                    'name as full_name', 
                    'contact as mobile_number', 
                    'email', 
                    'company_name'
                )->get()
                ->map(function($item) {
                    $item->purpose_of_inquiry = 'Contact Us Inquiry';
                    return $item;
                });
                break;

            default:
                $query = collect();
        }

        return DataTables::of($query)
            ->addColumn('action', function ($row) {
                return '
                    <button type="button" class="btn btn-outline-secondary edit_application" data-id="' . $row->id . '"><i class="icofont-edit text-success"></i></button>
                    <button type="button" class="btn btn-outline-secondary delete_application" data-id="' . $row->id . '"><i class="icofont-ui-delete text-danger"></i></button>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

}
