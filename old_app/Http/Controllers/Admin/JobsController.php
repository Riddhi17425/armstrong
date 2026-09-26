<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Jobs;
use App\Models\JobsCategory;
use Str;
use DataTables;
class JobsController extends Controller
{
    public function index(){
        return view('admin.jobs.index');
    }

    public function createJobs(){
        $jobCategories = JobsCategory::where('status', 'Active')->get();
        return view('admin.jobs.create',compact('jobCategories'));
    }

   public function JobsStore(Request $request)
{
    // Validate input
    $validator = Validator::make($request->all(), [
        'jobcategory_id'                 => 'required|string|max:255',
        'title'                 => 'required|string|max:255',
        'url'                 => 'required|string|max:255',
        'details'                 => 'required|string|max:255',
        'short_description'           => 'required|string',
        'meta_title'           => 'nullable|string',
        'meta_description'      => 'nullable|string',
        'description'           => 'required|string',
        'status'                => 'nullable|in:Active,In-Active',
    ]);

    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput()
            ->with('error', 'Please fix the validation errors.');
    }

    try {
        // Create jobs record (Correct field names)
        Jobs::create([
            'jobcategory_id'       => $request->jobcategory_id,
            'url'       => $request->url,
            'title'       => $request->title,
            'details'       => $request->details,
            'short_description'       => $request->short_description,
            'meta_title'       => $request->meta_title,
            'meta_description'       => $request->meta_description,
            'description' => $request->description,
            'status'      => $request->status ?? 'Active',
        ]);

        return redirect()->route('jobs')->with('success', 'Record added successfully!');
    } catch (\Exception $e) {
        \Log::error('Jobs category Store Error: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Failed to save: ' . $e->getMessage());
    }
}   

    public function getJobsData()
    {
        $jobs = Jobs::whereNull('deleted_at')->get();
        return DataTables::of($jobs)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                
                $editUrl = route('jobs.edit', $row->id);
                return '
                    <a href="' . $editUrl . '" class="btn btn-outline-primary btn-sm">
                        <i class="icofont-edit"></i>
                    </a>
                    <button type="button" class="btn btn-outline-danger btn-sm delete_jobs" data-id="' . $row->id . '">
                        <i class="icofont-ui-delete"></i>
                    </button>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function EditJobs($id){
        $jobs = Jobs::find($id);
         $jobCategories = JobsCategory::where('status', 'Active')->get();
        return view('admin.jobs.edit' , compact('jobs','jobCategories'));
    }

    public function DestoryJobs($id){
        $jobs = Jobs::find($id);
        if(empty($jobs)){
            return response()->json([
                'result' => false,
                "message" => "Product Not Found."
            ]);
        }
        $jobs->delete();
        return response()->json([
            'result' => true,
            'message' => "Data Deleted."
        ]);
    }


    public function UpdateJobs(Request $request, $id)
    {
        // 1. Validate the request
        $validator = Validator::make($request->all(), [
            'jobcategory_id'                 => 'required|string|max:255',
            'url'                 => 'required|string|max:255',
            'title'                 => 'required|string|max:255',
            'meta_title'           => 'nullable|string',
            'status'                => 'nullable|in:Active,In-Active',
            'details'       => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    // remove all HTML tags and whitespace
                    $plainText = trim(strip_tags($value));
                    if ($plainText === '') {
                        $fail("Details cannot be blank.");
                    }
                },
            ],
            'meta_description'       => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    // remove all HTML tags and whitespace
                    $plainText = trim(strip_tags($value));
                    if ($plainText === '') {
                        $fail("meta description cannot be blank.");
                    }
                },
            ],
            'short_description'       => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    // remove all HTML tags and whitespace
                    $plainText = trim(strip_tags($value));
                    if ($plainText === '') {
                        $fail("Short Description cannot be blank.");
                    }
                },
            ],

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
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Please correct the highlighted errors.');
        }

        try {
            // 2. Find the job
            $jobs = Jobs::findOrFail($id);
            // 4. Update jobs data
            $jobs->update([
            'jobcategory_id'       => $request->jobcategory_id,
            'url'       => $request->url,
            'title'       => $request->title,
            'details'       => $request->details,
            'short_description'       => $request->short_description,
            'description' => $request->description,
            'status'      => $request->status ?? 'Active',
            'meta_title'       => $request->meta_title,
            'meta_description'       => $request->meta_description,
            ]);

            return redirect()->route('jobs')->with('success', 'Jobs updated successfully!');
        } catch (\Exception $e) {
            \Log::error('Jobs update failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to update jobs: ' . $e->getMessage());
        }
    }

}
