<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\countries;
use App\Models\ForModel;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class FormController extends Controller
{
    public function showForm()
    {
        $country = countries::all();
        return view('form', compact('country'));
    }

    // public function submitForm(Request $request)
    // {
    //     // Validate form
    //     $request->validate([
    //         'name'         => 'required',
    //         'company_name' => 'required',
    //         'email'        => 'required|email',
    //         'phone'        => 'required',
    //         'country'      => 'required',
    //         'image'        => 'nullable|max:5120', 
    //     ]);

    //     // Save into database
    //     $post = new ForModel();
    //     $post->name         = $request->name;
    //     $post->company_name = $request->company_name;
    //     $post->email        = $request->email;
    //     $post->phone        = $request->phone;
    //     $post->country      = $request->country;
    //     $post->note         = $request->note;

    //     // Handle image upload
    //     if ($request->hasFile('image')) {
    //         $image     = $request->file('image');
    //         $imageName = time() . '_' . $image->getClientOriginalName();
    //         $image->move(public_path('uploads'), $imageName);
    //         $post->image = $imageName; 
    //     }

    //     $post->save();

    //     // Prepare email data
    //     $info = [
    //         'name'         => $request->name,
    //         'email'        => $request->email,
    //         'phone'        => $request->phone,
    //         'country'      => $request->country,
    //         'company_name' => $request->company_name,
    //         'note'         => $request->note,
    //         'image'        => $post->image ?? null,
    //     ];

    //     $attachmentPath = public_path('Armstrong_Brochure.pdf');

    //     // Send email after response
    //     register_shutdown_function(function () use ($info, $attachmentPath) {

    //         // USER EMAIL
    //         try {
    //             Mail::send('mail.thankyou', ['name' => $info['name']], function ($message) use ($info, $attachmentPath) {
    //                 $message->to($info['email'])
    //                     ->subject('Thank You for Visiting Our Stall')
    //                     ->attach($attachmentPath);
    //             });
    //         } catch (\Exception $e) {
    //             Log::error("User Mail Error: " . $e->getMessage());
    //         }

    //         // ADMIN EMAIL
    //         try {
    //             Mail::send('mail.inquirydata', ['inquiryquote' => $info], function ($message) {
    //                 $message->to('webdeveloper3.intelliworkz@gmail.com')
    //                     ->subject('New Inquiry Received From Plast India Form');
    //             });
    //         } catch (\Exception $e) {
    //             Log::error("Admin Mail Error: " . $e->getMessage());
    //         }

    //     });

    //     return back()->with('success', 'Form submitted successfully!');
    // }
    public function submitForm(Request $request)
    {
        // Validate form
        $request->validate([
            'name'         => 'required',
            'company_name' => 'required',
            'email'        => 'required|email',
            'phone'        => 'required',
            'country'      => 'required',
            'image'        => 'nullable|image|max:5120',
        ]);
    
        // Save into database
        $post = new ForModel();
        $post->name         = $request->name;
        $post->company_name = $request->company_name;
        $post->email        = $request->email;
        $post->phone        = $request->phone;
        $post->country      = $request->country;
        $post->note         = $request->note;
    
        // Image upload
        if ($request->hasFile('image')) {
            $image     = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);
            $post->image = $imageName;
        }
    
        $post->save();
    
        // Mail data
        $info = [
            'name'         => $post->name,
            'email'        => $post->email,
            'phone'        => $post->phone,
            'country'      => $post->country,
            'company_name' => $post->company_name,
            'note'         => $post->note,
            'image'        => $post->image ?? null,
        ];
    
        // Attachment path (VERY IMPORTANT)
        $attachmentPath = public_path('Armstrong_Brochure.pdf');
    
        if (!file_exists($attachmentPath)) {
            Log::error('Brochure file not found: '.$attachmentPath);
        }
    
        /* ================= USER EMAIL ================= */
        try {
            Mail::send('mail.thankyou', ['name' => $info['name']], function ($message) use ($info, $attachmentPath) {
                $message->to($info['email'])
                        ->from('exhibition@armstrongex.com', 'Armstrong')
                        ->replyTo('hr@armstrongex.com')
                        ->subject('Thank You for Visiting Our Stall');
    
                if (file_exists($attachmentPath)) {
                    $message->attach($attachmentPath);
                }
            });
        } catch (\Exception $e) {
            Log::error('User Mail Error: ' . $e->getMessage());
        }
    
        /* ================= ADMIN EMAIL ================= */
        try {
            Mail::send('mail.inquirydata', ['inquiryquote' => $info], function ($message) use ($info) {
                $message->to('hr@armstrongex.com')
                        ->from('exhibition@armstrongex.com', 'Armstrong')
                        ->replyTo('webdeveloper3.intelliworkz@gmail.com')
                        ->subject('New Inquiry Received From Plast India Form');
    
                if (!empty($info['image'])) {
                    $imagePath = public_path('uploads/' . $info['image']);
                    if (file_exists($imagePath)) {
                        $message->attach($imagePath);
                    }
                }
            });
        } catch (\Exception $e) {
            Log::error('Admin Mail Error: ' . $e->getMessage());
        }

    
        return back()->with('success', 'Form submitted successfully!');
    }
}
