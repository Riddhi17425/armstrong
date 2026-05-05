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

    public function create(){
        return view('admin.application.create');
    }

    public function getData(Request $request)
    {
        $applications = Application::select(['id', 'name', 'status', 'created_at']);
        return DataTables::of($applications)
            ->addColumn('action', function ($row) {
                $editUrl = route('application.edit', $row->id);
                return '
                        <a href="'.$editUrl.'" class="btn btn-outline-secondary">
                            <i class="icofont-edit text-success"></i>
                        </a>

                        <button type="button"
                            class="btn btn-outline-secondary delete_application"
                            data-id="'.$row->id.'">
                            <i class="icofont-ui-delete text-danger"></i>
                        </button>
                    ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function store(Request $request) 
    {
        $exists = Application::where('name', $request->application_name)->exists();
        if ($exists) {
            return response()->json([
                'result' => false,
                'message' => 'Application name already exists.'
            ]);
        }

        $application = new Application();
        $application->name = $request->application_name;
        $application->alt = $request->alt;
        $application->status = $request->application_status;

        
        $application->details_title = $request->details_title;
        $application->short_description = $request->short_description;
        $application->website_top_desc = $request->website_top_desc;
        $application->website_bottom_desc = $request->website_bottom_desc;
        $application->url = $request->url;
        $application->meta_title = $request->meta_title;
        $application->meta_description = $request->meta_description;
                

        //  MAIN IMAGE
        if ($request->hasFile('application_image')) {
            $application->application_image = $this->uploadImage(
                $request->file('application_image'),
                'admin/application',
                $request->has('compress')
            );
        }

        //  TOP IMAGE
        if ($request->hasFile('website_top_image')) {
            $application->website_top_image = $this->uploadImage(
                $request->file('website_top_image'),
                'admin/application'
            );
        }

        //  BOTTOM IMAGE
        if ($request->hasFile('website_bottom_image')) {
            $application->website_bottom_image = $this->uploadImage(
                $request->file('website_bottom_image'),
                'admin/application'
            );
        }

        //  FAQ (STORE AS JSON)
        if ($request->has('faq')) {
            $application->faq = json_encode($request->faq);
        }

        $application->save();

        return response()->json([
            'result' => true,
            'message' => 'Application Created Successfully.'
        ]);
    }

    public function uploadImage($file, $folder, $compress = false)
    {
        $extension = $file->getClientOriginalExtension();
        $name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $slug = \Str::slug($name);
        $fileName = $slug . '_' . uniqid() . '.' . $extension;

        //  physical path (NO public here)
        $uploadPath = public_path($folder);

        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        $fullPath = $uploadPath . '/' . $fileName;

        if ($compress) {
            $manager = new \Intervention\Image\ImageManager(
                new \Intervention\Image\Drivers\Gd\Driver()
            );
            $img = $manager->read($file->getRealPath());
            $img->toJpeg(75)->save($fullPath);
        } else {
            $file->move($uploadPath, $fileName);
        }

        //  RETURN DB PATH WITH "public/"
        return 'public/' . $folder . '/' . $fileName;
    }

    public function update(Request $request, $id)
    {
        $application = Application::find($id);

        if (!$application) {
            return response()->json([
                'result' => false,
                'message' => 'Application not found.'
            ]);
        }

        //  Check duplicate name
        $exists = Application::where('name', $request->application_name)
            ->where('id', '!=', $id)
            ->exists();

        if ($exists) {
            return response()->json([
                'result' => false,
                'message' => 'Application name already exists.'
            ]);
        }

        //  BASIC DATA
        $application->name = $request->application_name;
        $application->alt = $request->alt;
        $application->status = $request->application_status;

        //  NEW FIELDS
        $application->details_title = $request->details_title;
        $application->short_description = $request->short_description;
        $application->website_top_desc = $request->website_top_desc;
        $application->website_bottom_desc = $request->website_bottom_desc;
        $application->url = $request->url;
        $application->meta_title = $request->meta_title;
        $application->meta_description = $request->meta_description;

        // ================= MAIN IMAGE =================
        if ($request->hasFile('application_image')) {

            // delete old image
            if ($application->application_image && file_exists(public_path($application->application_image))) {
                unlink(public_path($application->application_image));
            }

            $application->application_image = $this->uploadImage(
                $request->file('application_image'),
                'admin/application',
                $request->has('compress')
            );
        }

        // ================= TOP IMAGE =================
        if ($request->hasFile('website_top_image')) {

            if ($application->website_top_image && file_exists(public_path($application->website_top_image))) {
                unlink(public_path($application->website_top_image));
            }

            $application->website_top_image = $this->uploadImage(
                $request->file('website_top_image'),
                'admin/application'
            );
        }

        // ================= BOTTOM IMAGE =================
        if ($request->hasFile('website_bottom_image')) {

            if ($application->website_bottom_image && file_exists(public_path($application->website_bottom_image))) {
                unlink(public_path($application->website_bottom_image));
            }

            $application->website_bottom_image = $this->uploadImage(
                $request->file('website_bottom_image'),
                'admin/application'
            );
        }

        // ================= FAQ =================
        if ($request->has('faq')) {
            $application->faq = json_encode(array_values($request->faq));
        }

        $application->save();

        return response()->json([
            'result' => true,
            'message' => 'Application Updated Successfully.',
        ]);
    }
    public function edit($id)
    {
        $application = Application::findOrFail($id);

        // decode FAQ
        $application->faq = json_decode($application->faq, true);

        return view('admin.application.edit', compact('application'));
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
