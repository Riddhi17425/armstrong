<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HowItWork;
use App\Models\HomeSlider;

use App\Models\Blogs;
use App\Models\ProductCategory;
use App\Models\ProductEnquiry;
use App\Models\LandingQuote;
use Intervention\Image\ImageManager;

use Google\Client;
use Google\Service\Sheets;
use App\Services\GoogleSheetsService;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

use App\Mail\SendLandingFormMailToUser;
use App\Mail\SendLandingFormMailToAdmin;
use Illuminate\Support\Facades\Mail;
class LandingController extends Controller
{
    
    
    public function landing()
    {    
        $title = "";
        $description = "";
        return view('front.landing');
    }
    
    

    public function showCaptcha(Request $request)
    {
        $width = 150;
        $height = 60;

        // Generate random captcha text
        $characters = '0123456789'; // Only numbers like in your image
        $captcha_text = '';
        for ($i = 0; $i < 4; $i++) { // 4 digits like your example
            $captcha_text .= $characters[rand(0, strlen($characters) - 1)];
        }

        // Store captcha in session
        session(['captcha_code' => $captcha_text]);

        // Create ImageManager with GD driver
        $manager = ImageManager::gd();
        $img = $manager->create($width, $height)->fill('#f8f8f8'); // Light gray background

        // Add colorful background dots
        $colors = ['#f0dcdbff', '#ceebf5ff', '#daf1daff', '#c5c1adff', '#e7c5e7ff', '#b8b59bff', '#cab6afff'];
        
        for ($i = 0; $i < 80; $i++) {
            $color = $colors[array_rand($colors)];
            $x = rand(0, $width);
            $y = rand(0, $height);
            
            // Create small circles instead of single pixels
            $img->drawCircle($x, $y, function ($circle) use ($color) {
                $circle->radius(rand(1, 3));
                $circle->background($color);
            });
        }
        
        // Add some subtle gray dots for texture
        for ($i = 0; $i < 30; $i++) {
            $img->drawPixel(rand(0, $width), rand(0, $height), '#e0e0e0');
        }

        // Add some very light noise lines
        for ($i = 0; $i < 3; $i++) {
            $img->drawLine(function($line) use ($width, $height) {
                $line->from(rand(0, $width), rand(0, $height))
                    ->to(rand(0, $width), rand(0, $height))
                    ->color('#eeeeee');
            });
        }

        // Add each digit with spacing like in your image
        $start_x = 20;
        $spacing = 35;
        
        for ($i = 0; $i < strlen($captcha_text); $i++) {
            $char = $captcha_text[$i];
            $x = $start_x + ($i * $spacing);
            
            // Add slight random offset for each character
            $offset_x = rand(-3, 3);
            $offset_y = rand(-2, 2);
            
            $img->text($char, $x + $offset_x, 35 + $offset_y, function ($font) {
                $font->filename(public_path('fonts/Roboto-Black.ttf'));
                $font->size(28);
                $font->color('#666666'); // Dark gray text
                $font->align('center');
                $font->valign('center');
            });
        }
        return $img->toPng();
    }

    public function verifyCaptcha(Request $request)
    {
        $userInput = $request->input('custom_captcha'); // value from input
        $captchaCode = session('captcha_code'); // value stored in session

        if ($userInput === $captchaCode) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Captcha incorrect']);
        }
    }

    

    // public function LandingStoreQuate(Request $request)
    // {
    //     try {

    //         // Save to database first
    //         $landing_quote = new LandingQuote;
    //         $landing_quote->name = $request->full_name;
    //         $landing_quote->company_name = $request->company_name;
    //         $landing_quote->contact = $request->phone;
    //         $landing_quote->email = $request->email;
    //         $landing_quote->message = $request->message;
    //         $landing_quote->customization_details = $request->custom_details;
    //         $landing_quote->save();

    //         // Prepare data for Google Sheets
    //         $sheetData = [
    //             'name' => $request->full_name,
    //             'company_name' => $request->company_name ?? '',
    //             'contact' => $request->phone,
    //             'email' => $request->email,
    //             'message' => $request->message ?? '',
    //             'customization_details' => $request->custom_details ?? ''
    //         ];

    //         // Send data to Google Sheet via Apps Script
    //         $response = Http::timeout(30)
    //             ->withHeaders([
    //                 'Content-Type' => 'application/json'
    //             ])
    //             ->post('https://script.google.com/macros/s/AKfycbyKHbh0Fawc81Z0nvGv9F8Fa_9xBmEDx_0afWYld5qGrcpvKG8WiOLBBPhH25PSIQaMPw/exec', $sheetData);

    //         // Check response
    //         if ($response->successful()) {
    //             $responseData = $response->json();
                
    //             if (isset($responseData['status']) && $responseData['status'] === 'success') {
    //                 Log::info('Data successfully sent to Google Sheets', [
    //                     'email' => $request->email,
    //                     'response' => $responseData
    //                 ]);
                    
    //                 return redirect()->route('landing')
    //                     ->with('success', 'Quote submitted successfully and synced with Google Sheets!');
    //             } else {
    //                 Log::warning('Google Sheets API returned error', [
    //                     'response' => $responseData,
    //                     'email' => $request->email
    //                 ]);
                    
    //                 return redirect()->route('landing')
    //                     ->with('warning', 'Quote saved successfully, but there was an issue syncing with Google Sheets.');
    //             }
    //         } else {
    //             Log::error('Google Sheets API request failed', [
    //                 'status' => $response->status(),
    //                 'body' => $response->body(),
    //                 'email' => $request->email
    //             ]);
                
    //             return redirect()->route('landing')
    //                 ->with('warning', 'Quote saved successfully, but failed to sync with Google Sheets.');
    //         }

    //     } catch (\Exception $e) {
    //         Log::error('Error in LandingStoreQuate', [
    //             'error' => $e->getMessage(),
    //             'trace' => $e->getTraceAsString(),
    //             'email' => $request->email ?? 'unknown'
    //         ]);

    //         return redirect()->route('landing')
    //             ->with('error', 'An error occurred while processing your request. Please try again.');
    //     }
    // }
    
    public function LandingStoreQuate(Request $request)
    {
        try { 

            // Save to database first
            $landing_quote = new LandingQuote;
            $landing_quote->name = $request->full_name;
            $landing_quote->company_name = $request->company_name;
            $landing_quote->contact = $request->phone;
            $landing_quote->email = $request->email;
            $landing_quote->message = $request->message;
            $landing_quote->customization_details = $request->custom_details;
            $landing_quote->save();

            // Prepare data for Google Sheets
            $sheetData = [
                'name' => $request->full_name,
                'company_name' => $request->company_name ?? '',
                'contact' => $request->phone,
                'email' => $request->email,
                'message' => $request->message ?? '',
                'customization_details' => $request->custom_details ?? ''
            ];

            // Redirect to contact route with success message
            // try {
            //     Mail::to($request->email)->send(new SendLandingFormMailToUser());    
            //     Mail::to(['inquiry@armstrongex.com'])->send(new SendLandingFormMailToAdmin($quate));
            // }catch (\Exception $e) {
            //     Log::error('Email sending failed: ' . $e->getMessage());
            // }
 

            // Send data to Google Sheet via Apps Script
            $response = Http::timeout(30)
                ->withHeaders([
                    'Content-Type' => 'application/json'
                ])
                ->post('https://script.google.com/macros/s/AKfycbyKHbh0Fawc81Z0nvGv9F8Fa_9xBmEDx_0afWYld5qGrcpvKG8WiOLBBPhH25PSIQaMPw/exec', $sheetData);

            // Check response
            if ($response->successful()) {
                $responseData = $response->json();
                
                if (isset($responseData['status']) && $responseData['status'] === 'success') {
                    Log::info('Data successfully sent to Google Sheets', [
                        'email' => $request->email,
                        'response' => $responseData
                    ]);
                    
                    return redirect()->route('thankyoufromlandingpage')
                        ->with('success', 'Quote submitted successfully and synced with Google Sheets!');
                } else {
                    Log::warning('Google Sheets API returned error', [
                        'response' => $responseData,
                        'email' => $request->email
                    ]);
                    
                    return redirect()->route('thankyoufromlandingpage')
                        ->with('warning', 'Quote saved successfully, but there was an issue syncing with Google Sheets.');
                }
            } else {
                Log::error('Google Sheets API request failed', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                    'email' => $request->email
                ]);
                
                return redirect()->route('thankyoufromlandingpage')
                    ->with('warning', 'Quote saved successfully, but failed to sync with Google Sheets.');
            }

        } catch (\Exception $e) {
            Log::error('Error in LandingStoreQuate', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'email' => $request->email ?? 'unknown'
            ]);

            return redirect()->route('landing') 
                ->with('error', 'An error occurred while processing your request. Please try again.');
        }
    }
    
    public function ThankYouFromLandingPage()
    {
        return view('front.landing-thank-you');
    }
}