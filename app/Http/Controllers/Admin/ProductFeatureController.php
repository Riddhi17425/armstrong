<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductFeature; 
use DataTables;
use Str;

class ProductFeatureController extends Controller
{
    public function index(Request $request){
        return view('admin.product_feature.index');
    }  

    public function getData(Request $request)
    {
        $product_feature = ProductFeature::select(['id', 'name', 'status', 'created_at']);
        return DataTables::of($product_feature)
            ->addColumn('action', function ($row) {
                return '
                    <button type="button" class="btn btn-outline-secondary edit_product_feature" data-id="' . $row->id . '"><i class="icofont-edit text-success"></i></button>
                    <button type="button" class="btn btn-outline-secondary delete_product_feature" data-id="' . $row->id . '"><i class="icofont-ui-delete text-danger"></i></button>
            
                ';
            })
            ->rawColumns(['action']) // allow HTML rendering
            ->make(true);
    }
    public function store(Request $request)
    {
        $exists = ProductFeature::where('name', $request->product_feature_name)->exists();
        if ($exists) {
            return response()->json(['result' => false, 'message' => 'Product Feature name already exists.']);
        }

        $product_feature = new ProductFeature();
        $product_feature->name = $request->product_feature_name;
        $product_feature->status = $request->product_feature_status;

        $product_feature->save();

        return response()->json([
            'result' => true,
            'message' => 'Product Feature Created Successfully.',
            'image' => $product_feature->product_feature_image ?? null // for debugging
        ]);
    }

    public function update(Request $request, $id)
    {
        $product_feature = ProductFeature::find($id);
        if (!$product_feature) {
            return response()->json(['result' => false, 'message' => 'Product Feature not found.']);
        }

        // Optional: prevent name duplication
        $exists = ProductFeature::where('name', $request->product_feature_name)->where('id', '!=', $id)->exists();
        if ($exists) {
            return response()->json(['result' => false, 'message' => 'Product Feature name already exists.']);
        }

        $product_feature->name = $request->product_feature_name;
        $product_feature->status = $request->product_feature_status;
        $product_feature->save();

        return response()->json([
            'result' => true,
            'message' => 'product Feature Updated Successfully.',
        ]);
    }
    public function edit($id){
        $get_data = ProductFeature::find($id);
        if(empty($get_data)){
            return response()->json([
                'result' => false,
                'message' => "Data Not Found",
            ]);
        }

        return response()->json([
            'result' => true,
            "message" => "Data Found",
            "data" => $get_data,
        ]); 
    }

    public function destroy($id){
        $get_data = ProductFeature::find($id);
        if(empty($get_data)){
            return response()->json([
                'result' => false,
                'message' => "Data Not Found",
            ]);
        }
        $get_data->delete();
        return response()->json([
            'result' => true,
            "message" => "Data Deleted SuccessFulyy.",
        ]); 
    }
}
