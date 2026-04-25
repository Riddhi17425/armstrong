<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application; 
use DataTables;
use Str;

class ApplicationController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.application.index');
    }  

    public function getData(Request $request)
    {
        $applications = Application::select(['id', 'name', 'status', 'created_at']);
        return DataTables::of($applications)
            ->addColumn('action', function ($row) {
                return '
                    <button type="button" class="btn btn-outline-secondary edit_application" data-id="' . $row->id . '"><i class="icofont-edit text-success"></i></button>
                    <button type="button" class="btn btn-outline-secondary delete_application" data-id="' . $row->id . '"><i class="icofont-ui-delete text-danger"></i></button>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function store(Request $request) 
    {
        $exists = Application::where('name', $request->application_name)->exists();
        if ($exists) {
            return response()->json(['result' => false, 'message' => 'Application name already exists.']);
        }

        $application = new Application();
        $application->name = $request->application_name;
        $application->alt = $request->alt;
        $application->status = $request->application_status;
        
        if ($request->hasFile('application_image')) {
            $image = $request->file('application_image');
            $extension = $image->getClientOriginalExtension();

            $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $slugName = Str::slug($originalName);
            $imageName = $slugName . '_' . uniqid() . '.' . $extension;

            $uploadPath = public_path('admin/application/');
            $savePath = $uploadPath . $imageName;

            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            if ($request->has('compress')) {
                $manager = new \Intervention\Image\ImageManager(new \Intervention\Image\Drivers\Gd\Driver());
                $img = $manager->read($image->getRealPath());
                $img->toJpeg(75)->save($savePath);
            } else {
                $image->move($uploadPath, $imageName);
            }

            $image_url = 'public/admin/application/' . $imageName;
            $application->application_image = $image_url;
        }

        $application->save();

        return response()->json([
            'result' => true,
            'message' => 'Application Created Successfully.',
            'image' => $application->application_image ?? null
        ]);
    }

    public function update(Request $request, $id)
    {
        $application = Application::find($id);
        if (!$application) {
            return response()->json(['result' => false, 'message' => 'Application not found.']);
        }

        $exists = Application::where('name', $request->application_name)->where('id', '!=', $id)->exists();
        if ($exists) {
            return response()->json(['result' => false, 'message' => 'Application name already exists.']);
        }

        $application->name = $request->application_name;
        $application->alt = $request->alt;
        $application->status = $request->application_status;

        if ($request->hasFile('application_image')) {
            $image = $request->file('application_image');

            $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $slugName = Str::slug($originalName);
            $imageName = $slugName . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            $uploadPath = public_path('admin/application/');
            $savePath = $uploadPath . $imageName;

            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            if ($request->has('compress')) {
                $manager = new \Intervention\Image\ImageManager(new \Intervention\Image\Drivers\Gd\Driver());
                $img = $manager->read($image->getRealPath());
                $img->toJpeg(75)->save($savePath);
            } else {
                $image->move($uploadPath, $imageName);
            }

            $image_url = 'public/admin/application/' . $imageName;
            $application->application_image = $image_url;
        }

        $application->save();

        return response()->json([
            'result' => true,
            'message' => 'Application Updated Successfully.',
        ]);
    }

    public function edit($id)
    {
        $get_data = Application::find($id);
        if (empty($get_data)) {
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

    public function destroy($id)
    {
        $get_data = Application::find($id);
        if (empty($get_data)) {
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
