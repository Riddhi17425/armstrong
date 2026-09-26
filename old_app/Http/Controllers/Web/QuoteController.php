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
        // --- 1. Bot Defense & Honeypot Check (Return success to hide detection) ---
        if (!empty($request->website_url)) {
            Log::warning('Honeypot trap triggered', $request->all());
            return response()->json(['status' => 'success', 'redirect' => route('thankyou')]);
        }
        
        // --- 2. Spam Content Check (Blocking known malicious links) ---
        $message = $request->message ?? '';
        $url_count = substr_count($message, 'http'); 
        
        // Check for links (http/https), or specific spam keywords (like 'kraken' or the domain)
        if ($url_count > 0 || preg_match('/kra2kn\.cc|kraken|onion|darknet|зекрало/i', $message)) {
            Log::warning('Spam content detected in message field.', $request->all());
            return response()->json(['status' => 'success', 'redirect' => route('thankyou')]);
        }

        $request->validate([
            'name'           => 'required|string|max:70',
            'company_name'   => 'required|string|max:70',
            'email'          => 'required|email|max:60',
            'contact'        => 'required_without:full_phone|nullable|string|max:20', 
            'full_phone'     => 'required_without:contact|nullable|string|max:30', 
            'message'        => 'nullable|string|max:150',
            'custom_captcha' => 'required|in:' . session('captcha_code'), 
        ], [
            'custom_captcha.required' => 'The CAPTCHA field is required.',
            'custom_captcha.in'       => 'The CAPTCHA code is invalid. Please try again.',
        ]);


        // Combine phonecode + contact for unified saving
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
                        'https://script.google.com/macros/s/AKfycbwLSt6-2tAYRHL3f9GpfClTbq9slI4aX4CepQwdIkNL2ENUNOjMF9egjYQVy2d1GN4C/exec',
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