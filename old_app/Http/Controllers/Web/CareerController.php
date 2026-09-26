<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobsCategory;
use App\Models\Jobs;
use App\Models\CareerForm;
use App\Models\NoVacancy;
use App\Mail\SendJobPositionsMailToUser;
use App\Mail\SendJobPositionsMailToAdmin;
use App\Mail\SendNoVacancyFormMailToAdmin;
use App\Mail\SendNoVacancyFormMailToUser;
use Illuminate\Support\Facades\Mail;

class CareerController extends Controller
{
    public function careerlisting()
    {
        $metatitle = "Careers at Armstrong";
        $metadescription = "At Armstrong, every role, from engineering to operations, thrives on innovation, accuracy, and purpose. Explore our careers where your work truly matters.";
    
        $departments = JobsCategory::where('status', 'Active')->get();
    
        // Check if any active jobs exist
        $jobs = Jobs::where('status', 'Active')->get();
    
        if ($jobs->isEmpty()) {
            // No jobs → redirect to novacancy route
            return redirect()->route('novacancy');
        }
        return view('front.careers-listing', compact('metatitle', 'metadescription', 'departments', 'jobs'));
    }


    public function careerdetail($url)
    {
        // Find job
        $job = Jobs::where('url', $url)->firstOrFail();
        $metatitle = $job->meta_title;
        $metadescription = $job->meta_description;

        

        return view('front.careers-detail', compact('metatitle', 'metadescription', 'job'));
    }

    public function jobsByDepartment(Request $request)
    {
        $jobs = Jobs::where('status', 'Active')
            ->when($request->department_id, function ($q) use ($request) {
                $q->where('jobcategory_id', $request->department_id);
            })
            ->get();

        // Append URL for each job
        $jobs->map(function ($job) {
            $job->detail_url = route('career.detail', $job->url);
            return $job;
        });
        return response()->json(['jobs' => $jobs]);
    }
    
    public function noVacancy()
    {
        $title = "No Vacancies Available";
        $description = "Currently, there are no job openings. Please check back later.";
    
        return view('front.no-vacancies', compact('title', 'description'));
    }

    public function careerstore(Request $request) 
{
    $request->validate([
        'fullname'          => 'required|string|max:255',
        'email'             => 'required|email|max:255',
        'phone'             => 'required|string|max:20',
        'current_location'  => 'nullable|string|max:255',
        'linkedin_profile'  => 'nullable|max:255',
        'resume'            => 'required|mimes:pdf,doc,docx|max:5120', // 5 MB
    ]);

    $pdfPath = null;
    if ($request->hasFile('resume') && $request->file('resume')->isValid()) {
        $pdfFile = $request->file('resume');
        $pdfName = 'resume_' . time() . '_' . uniqid() . '.' . $pdfFile->getClientOriginalExtension();
        $pdfFile->move(public_path('admin/uploads/resume'), $pdfName);

        // ✅ Cleaner path (no "public/" prefix)
        $pdfPath = 'admin/uploads/resume/' . $pdfName;
    }

    // Save to DB (Career model)
    $carrer = CareerForm::create([
        'fullname'         => $request->fullname,
        'job_positions'    => $request->job_possition,
        'email'            => $request->email,
        'phone'            => $request->phone,
        'current_location' => $request->current_location,
        'linkedin_profile' => $request->linkedin_profile,
        'resume'           => $pdfPath,
    ]);
    return redirect()->route('thankyou')->with('success', 'Your message has been sent successfully.');
    // try {
    //     // Send mail to user
    //     Mail::to($request->email)->send(new SendJobPositionsMailToUser());

    //     // Send mail to admin WITH resume
    //         Mail::to('hr@armstrongex.com')
    //             ->send(new SendJobPositionsMailToAdmin($carrer, $pdfPath));
    //     return redirect()->route('thankyou')->with('success', 'Your message has been sent successfully.');
    // } catch (\Exception $e) {
    //     Log::error('Email sending failed: ' . $e->getMessage());
    //     return back()->with('error', 'Failed to send the email. Please try again later.');
    // }
}

    
public function noVacancystore(Request $request)
    {
        $request->validate([
            'fullname'          => 'required|string|max:255',
            'email'             => 'required|email|max:255',
            'phone'             => 'required|string|max:20',
            'current_location'  => 'nullable|string|max:255',
            'linkedin_profile'  => 'nullable|max:255',
            'resume'            => 'required|mimes:pdf,doc,docx|max:5120', // 5 MB
        ]);
    
            $pdfPath = null;
            if ($request->hasFile('resume') && $request->file('resume')->isValid()) {
                $pdfFile = $request->file('resume');
                $pdfName = 'resume_' . time() . '_' . uniqid() . '.' . $pdfFile->getClientOriginalExtension();
                $pdfFile->move(public_path('admin/uploads/resume'), $pdfName);
                $pdfPath = 'admin/uploads/resume/' . $pdfName; // ✅ correct path
            }
    
            // Save to DB (Career model)
            $novacancy= NoVacancy::create([
                'fullname'         => $request->fullname,
                'email'            => $request->email,
                'phone'            => $request->phone,
                'current_location' => $request->current_location,
                'linkedin_profile' => $request->linkedin_profile,
                'resume'           => $pdfPath,
            ]);
            return redirect()->route('thankyou')->with('success', 'Your message has been sent successfully.');
        // try {
        //         // Send mail to user
        //         Mail::to($request->email)->send(new SendNoVacancyFormMailToUser());

        //         // Send mail to admin WITH resume
        //             Mail::to('hr@armstrongex.com')
        //                 ->cc('vyom@armstrongex.com')
        //                 ->send(new SendNoVacancyFormMailToAdmin($carrer, $pdfPath));
        //         return redirect()->route('thankyou')->with('success', 'Your message has been sent successfully.');
        //     } catch (\Exception $e) {
        //         Log::error('Email sending failed: ' . $e->getMessage());
        //         return back()->with('error', 'Failed to send the email. Please try again later.');
        // }
    }
}
