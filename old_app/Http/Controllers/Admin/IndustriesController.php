<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Industries;
use DataTables;
class IndustriesController extends Controller
{
    public function index(){
        return view('admin.industries.index');
    }

    public function IndustriesGetData(Request $request)
    {
        $industries = Industries::select(['id', 'name', 'status', 'created_at']);
        return DataTables::of($industries)
            ->addColumn('action', function ($row) {
                return '
                    <button type="button" class="btn btn-outline-secondary edit_industries" data-id="' . $row->id . '"><i class="icofont-edit text-success"></i></button>
                    <button type="button" class="btn btn-outline-secondary delete_industries" data-id="' . $row->id . '"><i class="icofont-ui-delete text-danger"></i></button>
                ';
            })
            ->rawColumns(['action']) // allow HTML rendering
            ->make(true);
    }

    public function IndustriesstoreAndUpdate(Request $request){

        $industries_id = $request->industries_id;
        $exists = Industries::where('name', $request->industries_name)->exists();
        if($industries_id){
            $createData = Industries::find($industries_id);
        }else{
            if ($exists) {
                return response()->json(['result' => false, 'message' => 'Industries name already exists.']);
            }
            $createData = new Industries();
        }

        $createData->name = $request->industries_name;
        $createData->status = $request->industries_status;
        $createData->save();

        return response()->json([
            'result' => true,
            'message' => $industries_id ? "Industries Updated Successfully" : "Industries Created Successfully.",
        ]);
    }

    public function edit($id){
        $get_data = Industries::find($id);
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
        $get_data = Industries::find($id);
        if(empty($get_data)){
            return response()->json([
                'result' => false,
                'message' => "Data Not Found",
            ]);
        }
        $get_data->delete();
        return response()->json([
            'result' => true,
            "message" => "Data Deleted Successfully.",
        ]); 
    }
}
