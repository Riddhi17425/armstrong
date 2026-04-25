<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use App\Mail\SendContactMailToUser;
use App\Mail\SendContactMailToAdmin;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use DB;

class ContactController extends Controller
{
    public function contact()
    {
        $metatitle = "Contact Us | Armstrong";
        $metadescription = "Contact Armstrong, where our experts provide personalized support, expert guidance, and high-performance machinery to increase business efficiency and growth.";
        
        return view('front.contact', compact('metatitle', 'metadescription'));
    }
    
    public function store(Request $request)
    {
        $message = $request->message ?? '';
        $url_count = substr_count($message, 'http'); 
        
        if ($url_count > 0 || preg_match('/kra2kn\.cc|kraken|onion|darknet|зекрало/i', $message)) {
            Log::warning('Contact Form: Spam content detected in message field.', $request->all());
            return response()->json(['status' => 'success', 'redirect' => route('thankyou')]);
        }

        $request->validate([
            'name'           => 'required|string|max:70',
            'company_name'   => 'required|string|max:70',
            'contact'        => 'required|string|min:10|max:20', 
            'phonecode'      => 'required|string|max:10', 
            'country'        => 'required|string|max:100',
            'email'          => 'required|email|max:60',
            'contact_custom_captcha' => 'required|in:' . session('captcha_code'),
        ], [
            'contact.min'                     => 'The contact number must be at least 10 digits.',
            'contact_custom_captcha.required' => 'The CAPTCHA field is required.',
            'contact_custom_captcha.in'       => 'The CAPTCHA code is invalid. Please try again.',
        ]);
        
        $fullPhone = '+' . ltrim($request->phonecode, '+') . $request->contact;
        
        $contact = Contact::create([
            'name'         => $request->name,
            'company_name' => $request->company_name,
            'contact'      => $fullPhone,
            'country'      => $request->country,
            'email'        => $request->email,
            'message'      => $request->message,
        ]);
        
        // try {
        //     Mail::to($request->email)->send(new SendContactMailToUser());
        //     Mail::to('sales@armstrongex.com')->cc('vyom@armstrongex.com')->send(new SendContactMailToAdmin($contact));
        // } catch (\Exception $e) {
        //     Log::error('Contact Form: Email sending failed: ' . $e->getMessage());
        // }
        
        app()->terminating(function () use ($request, $contact, $fullPhone) {
            $sheetData = [
                'form_type'    => 'Contact Form',
                'name'         => $request->name ?? '',
                'company_name' => $request->company_name ?? '',
                'contact'      => $fullPhone,
                'email'        => $request->email ?? '',
                'product_name' => '',
                'message'      => $request->message ?? '',
                'country'      => $request->country ?? '',
                'date'         => Carbon::now()->format('d/m/Y H:i:s'),
            ];
            
            try {
                Http::timeout(5)->withHeaders(['Content-Type' => 'application/json'])
                    ->post('https://script.google.com/macros/s/AKfycbwLSt6-2tAYRHL3f9GpfClTbq9slI4aX4CepQwdIkNL2ENUNOjMF9egjYQVy2d1GN4C/exec', $sheetData);
            } catch (\Exception $e) {
                Log::error('Contact Form: Google Sheets API Exception (Async): ' . $e->getMessage());
            }
        });

        return response()->json(['status' => 'success', 'redirect' => route('thankyou')]);
    }
}