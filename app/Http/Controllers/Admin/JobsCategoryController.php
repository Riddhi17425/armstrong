<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\JobsCategory;
use Str;
use DataTables;
class JobsCategoryController extends Controller
{
    public function index(){
        return view('admin.jobs_category.index');
    }

    public function createJobscategory(){
        return view('admin.jobs_category.create');
    }

    public function JobscategoryStore(Request $request)
    {
        // dd($request->all());
        // Validate input
        $validator = Validator::make($request->all(), [
            'title'                 => 'required|string|max:255',
            'description'           => 'required|string|max:500',
            'status'                => 'nullable|in:Active,In-Active',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Please fix the validation errors.');
        }
        try {
            // Create jobscategory record (Correct field names)
            JobsCategory::create([
                'title'       => $request->title,
                'description' => $request->description,
                'status'      => $request->status ?? 'Active',
            ]);

            return redirect()->route('jobscategory')->with('success', 'Record added successfully!');
        } catch (\Exception $e) {
            \Log::error('Jobs category Store Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to save: ' . $e->getMessage());
        }
    }   

    public function getJobscategoryData()
    {
        $jobscategory = JobsCategory::whereNull('deleted_at')->get();
        return DataTables::of($jobscategory)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                
                $editUrl = route('jobscategory.edit', $row->id);
                return '
                    <a href="' . $editUrl . '" class="btn btn-outline-primary btn-sm">
                        <i class="icofont-edit"></i>
                    </a>
                    <button type="button" class="btn btn-outline-danger btn-sm delete_jobscategory" data-id="' . $row->id . '">
                        <i class="icofont-ui-delete"></i>
                    </button>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function EditJobscategory($id){
        $jobscategory = JobsCategory::find($id);
        return view('admin.jobs_category.edit' , compact('jobscategory'));
    }

    public function DestoryJobscategory($id){
        $jobscategory = JobsCategory::find($id);
        if(empty($jobscategory)){
            return response()->json([
                'result' => false,
                "message" => "Product Not Found."
            ]);
        }
        $jobscategory->delete();
        return response()->json([
            'result' => true,
            'message' => "Data Deleted."
        ]);
    }


   
    
    public function UpdateJobscategory(Request $request, $id)
    {
        // 1. Validate the request
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'title'                 => 'required|string|max:255',
            // 'description'           => 'required|string|max:500', 
            'description'       => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    // remove all HTML tags and whitespace
                    $plainText = trim(strip_tags($value));
                    if ($plainText === '') {
                        $fail("Description cannot be blank.");
                    }
                },
            ],
            'status'                => 'nullable|in:Active,In-Active',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Please correct the highlighted errors.');
        }

        try {
            // 2. Find the jobscategory
            $jobscategory = JobsCategory::findOrFail($id);
            // 4. Update jobscategory data
            $jobscategory->update([
                'title'       => $request->title,
                'description' => $request->description,
                'status'      => $request->status,
            ]);

            return redirect()->route('jobscategory')->with('success', 'Jobs category updated successfully!');
        } catch (\Exception $e) {
            \Log::error('Jobs category update failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to update jobs category: ' . $e->getMessage());
        }
    }

}
