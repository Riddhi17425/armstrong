<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quote;

use App\Mail\SendContactMailToUser;
use App\Mail\SendContactMailToAdmin;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class QuoteController extends Controller
{
    
    public function store(Request $request)
    {
        if (!empty($request->website_url)) {
            Log::warning('Honeypot trap triggered', $request->all());
            return response()->json(['status' => 'success', 'redirect' => route('thankyou')]);
        }
        
        $message = $request->message ?? '';
        $url_count = substr_count($message, 'http'); 
        
        if ($url_count > 0 || preg_match('/kra2kn\.cc|kraken|onion|darknet|зекрало/i', $message)) {
            Log::warning('Spam content detected in message field.', $request->all());
            return response()->json(['status' => 'success', 'redirect' => route('thankyou')]);
        }

        $request->validate([
            'name' => [
                'required', 'string', 'min:2', 'max:70',
                'regex:/^[a-zA-Z]+(?:\s[a-zA-Z]+)*$/',
            ],
            'company_name' => [
                'required', 'string', 'min:2', 'max:70',
                'regex:/^[a-zA-Z0-9]+(?:\s[a-zA-Z0-9]+)*$/',
            ],
            'email' => [
                'required', 'string', 'email:rfc,dns', 'max:60',
            ],
            'contact' => [
                'required', 'regex:/^[0-9]{6,15}$/',
            ],
            'full_phone' => [
                'nullable', 'regex:/^\+[1-9][0-9]{6,14}$/',
            ],
            'country'   => ['nullable', 'string', 'max:100'],
            'phonecode' => ['required', 'digits_between:1,4'],
            'message'   => ['nullable', 'string', 'max:150'],
            'custom_captcha' => [
                'required', 'digits:4',
                function ($attribute, $value, $fail) {
                    $code = session('captcha_code');
                    if (!$code || (string) $value !== (string) $code) {
                        $fail('The CAPTCHA code is invalid. Please try again.');
                    }
                },
            ],
        ], [
            'name.required'          => 'Please enter your name.',
            'name.min'               => 'Name must be at least 2 characters.',
            'name.regex'             => 'Name may only contain letters and spaces.',

            'company_name.required'  => 'Please enter your company name1.',
            'company_name.min'       => 'Company name must be at least 2 characters.',
            'company_name.regex'     => 'Company name may only contain letters, numbers and spaces.',

            'email.required'         => 'Please enter your email address.',
            'email.email'            => 'Please enter a valid email address.',
            'email.max'              => 'Email may not be longer than 60 characters.',

            'contact.required'            => 'Please enter your contact number.',
            'contact.regex'               => 'Phone number must contain 6 to 15 digits.',
            'phonecode.required'          => 'Please select your country code.',
            'full_phone.regex'            => 'Please enter a valid phone number.',

            'custom_captcha.required' => 'The CAPTCHA field is required.',
            'custom_captcha.digits'   => 'The CAPTCHA must be 4 digits.',
        ]);

        session()->forget('captcha_code');

        $fullPhone = $request->phonecode && $request->contact
            ? '+' . $request->phonecode . $request->contact
            : $request->full_phone;

        // Save to database
        $quote = Quote::create([
            'name'         => $request->name,
            'company_name' => $request->company_name,
            'contact'      => $fullPhone,
            'country'      => $request->country,
            'email'        => $request->email,
            'message'      => $request->message,
        ]);
    
        // ... (Email sending logic remains the same) ...
      if ($quote) {
        // try {
        //     Log::info('Sending emails...');
        //     Mail::to($request->email)->send(new SendContactMailToUser($quote));
        //     Mail::to('sales@armstrongex.com')
        //         ->cc('vyom@armstrongex.com')
        //         ->send(new SendContactMailToAdmin($quote));
        //     Log::info('Emails sent successfully.');
        // } catch (\Exception $e) {
        //     Log::error("Email sending failed: " . $e->getMessage());
        // }
    }

    // --- 7. Push to Google Sheet AFTER DB save ---
    if ($quote) {
        app()->terminating(function () use ($request, $quote, $fullPhone) {
            try {
                Http::timeout(30)
                    ->withHeaders(['Content-Type' => 'application/json'])
                    ->post(
                        // 'https://script.google.com/macros/s/AKfycbwLSt6-2tAYRHL3f9GpfClTbq9slI4aX4CepQwdIkNL2ENUNOjMF9egjYQVy2d1GN4C/exec',
                        'https://script.google.com/macros/s/AKfycbw49ndwOyK2RlEJg4ZgsEVjwsoT3ZlOPBO1Fkb8CwIqc2MnmRiUGvnryHSPDMbsX5Wvjw/exec',
                        [
                            'form_type'    => 'Header Form',
                            'name'         => $request->name ?? '',
                            'company_name' => $request->company_name ?? '',
                            'contact'      => $fullPhone ?? '',
                            'email'        => $request->email ?? '',
                            'country'      => $request->country ?? '',
                            'product_name' => '',
                            'message'      => $request->message ?? '',
                            'date'         => now()->format('d/m/Y H:i:s')
                        ]
                    );
            } catch (\Exception $e) {
                Log::error("Sheet update failed: " . $e->getMessage());
            }
        });
    }
    
        // ✅ Return success with redirect URL for AJAX to handle
        return response()->json(['status' => 'success', 'redirect' => route('thankyou')]);
    }
}