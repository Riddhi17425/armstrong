<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GalleryTypes;
use DataTables;
class GalleryTypesController extends Controller
{
    public function index(){
        return view('admin.gallery_types.index');
    }

    public function GallerytypesGetData(Request $request)
    {
        $gallery_types = GalleryTypes::select(['id', 'name', 'status', 'created_at']);
        return DataTables::of($gallery_types)
            ->addColumn('action', function ($row) {
                return '
                    <button type="button" class="btn btn-outline-secondary edit_gallery_types" data-id="' . $row->id . '"><i class="icofont-edit text-success"></i></button>
                    <button type="button" class="btn btn-outline-secondary delete_gallery_types" data-id="' . $row->id . '"><i class="icofont-ui-delete text-danger"></i></button>
                ';
            })
            ->rawColumns(['action']) // allow HTML rendering
            ->make(true);
    }

    public function GallerytypesstoreAndUpdate(Request $request){

        $gallery_types_id = $request->gallerytypes_id;
        $exists = GalleryTypes::where('name', $request->gallerytypes_name)->exists();
        if($gallery_types_id){
            $createData = GalleryTypes::find($gallery_types_id);
        }else{
            if ($exists) {
                return response()->json(['result' => false, 'message' => 'Gallery Types name already exists.']);
            }
            $createData = new GalleryTypes();
        }

        $createData->name = $request->gallerytypes_name;
        $createData->status = $request->gallerytypes_status;
        $createData->save();

        return response()->json([
            'result' => true,
            'message' => $gallery_types_id ? "Gallery Types Updated Successfully" : "Gallery Types Created Successfully.",
        ]);
    }

    public function edit($id){
        $get_data = GalleryTypes::find($id);
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
        $get_data = GalleryTypes::find($id);
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
