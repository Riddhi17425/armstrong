<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HowItWork;
use App\Models\HomeSlider;
use App\Models\Client;
use App\Models\Blogs;
use App\Models\ProductCategory;
use App\Models\ProductEnquiry;
use App\Models\LandingQuote;
use Intervention\Image\ImageManager;
use App\Mail\SendProductInQMailToAdmin;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use App\Mail\SendProductInQMailToUser;
use App\Models\Milestone;
use App\Models\AboutUsSlider;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Models\Event;
use App\Models\OurFacility;
use App\Models\InfrastructureSlider;
use App\Models\Certificate;
use App\Models\LifeArmstrong;
use App\Models\ResearchDevelopmentSlider;
use App\Models\ProductMaster;
use App\Models\WhatsappInquiry;
use App\Models\ChannelPartner;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {    
        // $metatitle = "Machinery and spare parts Manufacturer for PP industry";
        // $metadescription = "From advanced weaving and needle loom machines to high-speed finishing equipment & spare parts, Armstrong delivers high-quality industrial machinery.";
        
        $metatitle = "Manufacturer – FIBC, Woven Sack & Mulch Film Punching Machine";
        $metadescription = "Armstrong is a leading manufacturer of FIBC machines (Jumbo), woven sack, PP/HDPE bag making machines, heavy-duty bag closers, etc., with 40+ years of expertise.";
        $steps = HowItWork::orderBy('id','desc')->where('status','Active')->get();
        $homesliders = HomeSlider::orderBy('id','asc')->where('status','Active')->select('id','image')->get();
        $clientsays = Client::orderBy('id','asc')->where('status','Active')->get();
        $blogs = Blogs::orderBy('id','desc')->where('status','Active')->get();
        $category = ProductCategory::with('products')->where('status', 'Active')->get();
        return view('front.dashboard',compact('metatitle','metadescription','steps','homesliders','clientsays','blogs','category'));
    }
    
    public function about()
    {
        $metatitle="About Us | Armstrong";
        $metadescription="With over 43 years of experience, Armstrong is a trusted manufacturer and exporter of finishing machinery & spare parts for PP/FIBC and woven-sack industries.";
        $milestones = Milestone::orderBy('id','asc')->where('status','Active')->get();
        $aboutsliders = AboutUsSlider::where('status','Active')->get();
        $homesliders = HomeSlider::orderBy('id','asc')->where('status','Active')->select('id','image')->get();
        return view('front.about',compact('metatitle','metadescription','milestones','aboutsliders' , 'homesliders'));
    }
    
    public function events()
    {    
        $metatitle = "Events & Exhibitions | Armstrong";
        $metadescription = "At Armstrong, every event is a chance to engage, celebrate, & make a difference. We have participated in 20 worldwide exhibitions in Brazil, Germany, and more.";
        Event::where('status', 'Active')->where('type', 'upcoming')->whereDate('end_date', '<', now())->update(['type' => 'past']);
        $upcomingevents = Event::where('status','Active')->orderBy('id','desc')->where('type','upcoming')->get();
        $pastevents = Event::where('status','Active')->orderBy('end_date', 'desc')->orderBy('id','desc')->where('type','past')->get();
        return view('front.event',compact('metatitle','metadescription','upcomingevents','pastevents'));
    }
    
    public function certificate()
    {
        $metatitle="Our Certifications | Armstrong";
        $metadescription="At Armstrong, certifications reflect more than compliance and showcase our commitment to global quality standards, reliability, and customer trust.";
        $certificates = Certificate::orderBy('id','asc')->where('status','Active')->get();
        return view('front.certificate',compact('metatitle','metadescription','certificates'));
    }
    
    public function productlist()
    {    
        $metatitle = "Check Out Our Product Categories | Armstrong";
        $metadescription = "Explore our product lists at Armstrong like FIBC Machines, Woven Sack Machines, Sewing Machines, Mulch Film Punching Machine, Bag Closing Machines & many more.";
        $category = ProductCategory::with('products')->where('status', 'Active')->get();
        return view('front.product-list',compact('metatitle','metadescription','category'));
    }
    
    
    
    public function privacypolicy()
    {    
        $metatitle = "Our Privacy Policy | Armstrong";
        $metadescription = "We are committed to protecting the privacy of our users and have taken all necessary measures in line with the best industry practice to protect the confidentiality of our users.";
        return view('front.privacy-policy',compact('metatitle','metadescription'));
    }
    public function termsandcondition()
    {    
        $metatitle = "Our Terms & Conditions | Armstrong";
        $metadescription = "Welcome to Armstrong’s official website. By accessing, browsing, or using this website, you agree to be bound by these Terms and Conditions.";
        return view('front.term-condition',compact('metatitle','metadescription'));
    }
     public function fibcmachine()
    {    
        $metatitle = "FIBC Fabric Cutting Machine – Jumbo Bag Cutting Machine";
        $metadescription = "Armstrong FIBC fabric cutting machine delivers high-speed, fully automatic cutting for FIBC jumbo bags with precise cutting length control.";
        return view('front.fibc-fabric-cutting-machine',compact('metatitle','metadescription'));
    }
    
    public function wovenmachine()
    {    
        $metatitle = "PP Woven Bag Lamination Machine";
        $metadescription = "Armstrong High-Speed Woven Sack Lamination Machine delivers precise, high-speed lamination for FIBC and PP/HDPE woven bag production with consistent quality.";
        return view('front.woven-bag-lamination-machine',compact('metatitle','metadescription'));
    }
    
    
    
    
     public function channelpartner()
    {    
        $metatitle = "Armstrong Authorized Channel Partner – Trusted Machinery Brand";
        $metadescription = "Partner with Armstrong, a 40-year leader in FIBC and packaging machinery, and become an authorized channel partner with exclusive territory and full technical support.";
        return view('front.channel-partner',compact('metatitle','metadescription'));
    }
   
    public function channelpartnerstore(Request $request)
    {
        $message = $request->message ?? '';
        $url_count = substr_count($message, 'http');
    
        if ($url_count > 0 || preg_match('/kra2kn\.cc|kraken|onion|darknet|зекрало/i', $message)) {
            Log::warning('Channel Partner Form: Spam content detected.', $request->all());
            return response()->json(['status' => 'success', 'redirect' => route('thankyou')]);
        }
    
        $validator = Validator::make($request->all(), [
            'name'                   => 'required|string|max:70',
            'company_name'           => 'required|string|max:70',
            'contact'                => 'required|string|min:10|max:30',
            'phonecode'              => 'required|string|max:10',
            'country'                => 'required|string|max:100',
            'email'                  => 'required|email|max:60',
            'business_type'          => 'required|string|max:255',
            'industry_segment'       => 'required|string|max:255',
            'contact_custom_captcha' => 'required|in:' . session('captcha_code'),
        ], [
            'contact.min'                     => 'The contact number must be at least 10 digits.',
            'contact_custom_captcha.required' => 'The CAPTCHA field is required.',
            'contact_custom_captcha.in'       => 'The CAPTCHA code is invalid. Please try again.',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        $fullPhone = '+' . ltrim($request->phonecode, '+') . $request->contact;
    
        try {
            $channelPartner = ChannelPartner::create([
                'name'             => $request->name,
                'company_name'     => $request->company_name,
                'business_type'    => $request->business_type,
                'industry_segment' => $request->industry_segment,
                'contact'          => $fullPhone,
                'email'            => $request->email,
                'message'          => $request->message ?? '',
                'country'          => $request->country,
            ]);
    
            Log::info('Channel Partner stored successfully', ['id' => $channelPartner->id]);
        } catch (\Exception $e) {
            Log::error('Channel Partner DB Error: ' . $e->getMessage());
            return response()->json(['error' => 'Database error occurred'], 500);
        }
    
        // try {
        //     Mail::to($channelPartner->email)
        //         ->send(new \App\Mail\SendChannelPartnerMailToUser($channelPartner));
        
        //     Mail::to('vyom@armstrongex.com')
        //         ->send(new \App\Mail\SendChannelPartnerMailToAdmin($channelPartner));
        
        //     Log::info('Admin email sent successfully');
        // } catch (\Exception $e) {
        //     Log::error('Mail sending failed: '.$e->getMessage());
        // }

    
        $sheetData = [
            'form_type'     => 'Channel Partner Form',
            'name'          => $channelPartner->name,
            'product_name'  => $channelPartner->business_type,    
            'company_name'  => $channelPartner->company_name,
            'contact'       => $channelPartner->contact,
            'email'         => $channelPartner->email,
            'country'       => $channelPartner->industry_segment,  
            'message'       => $channelPartner->message,
            'date'          => \Carbon\Carbon::now()->format('d/m/Y H:i:s'),
        ];

    
        dispatch(function () use ($sheetData) {
            try {
                $response = \Http::timeout(30)
                    ->withHeaders(['Content-Type' => 'application/json'])
                    ->post('https://script.google.com/macros/s/AKfycbwLSt6-2tAYRHL3f9GpfClTbq9slI4aX4CepQwdIkNL2ENUNOjMF9egjYQVy2d1GN4C/exec', $sheetData);
    
                if ($response->successful()) {
                    \Log::info('Google Sheet updated successfully', ['email' => $sheetData['email']]);
                } else {
                    \Log::warning('Google Sheet failed', [
                        'status' => $response->status(),
                        'body'   => $response->body(),
                    ]);
                }
            } catch (\Exception $e) {
                \Log::error('Google Sheet Error: ' . $e->getMessage());
            }
        })->afterResponse();
    
        return response()->json(['success' => true, 'redirect' => route('thankyou')]);
    }


    public function thankyou()
    {    
        $metatitle = "";
        $metadescription = "";
        return view('front.thank-you',compact('metatitle','metadescription'));
    }
    public function thankyouwidewidth()
    {    
        $metatitle = "";
        $metadescription = "";
        return view('front.thankyouwidewidth',compact('metatitle','metadescription'));
    }
    public function armstrongincity()
    {    
        $metatitle = "";
        $metadescription = "";
        return view('front.armstrongincity',compact('metatitle','metadescription'));
    }
    

    // public function productenquirystore(Request $request)
    // {
    //     $request->validate([
    //         'name'         => 'required|string|max:255',
    //         'product_name' => 'required|string|max:255',
    //         'company_name' => 'required|string|max:255',
    //         'contact'      => 'required|digits_between:10,20',
    //         'email'        => 'required|email',
    //     ]);
    
    //     $produt_url = $request->original_product_url;
    //     $find_category = $produt_url
    //         ? ProductMaster::where('url', $produt_url)->first()
    //         : ProductMaster::where('product_name', $request->product_name)->first();
    
    //     if (!$find_category) {
    //         return redirect()->back()->with('error', 'Product not found.');
    //     }
    
    //     $product_inquiry = ProductEnquiry::create([
    //         'name'         => $request->name,
    //         'company_name' => $request->company_name,
    //         'product_name' => $find_category->product_name,
    //         'contact'      => $request->contact,
    //         'email'        => $request->email,
    //         'message'      => $request->message,
    //     ]);
    
    //     $find_category_name = ProductCategory::where('id', $find_category->category_id)->first();
    
    //     if (!$find_category_name) {
    //         return redirect()->back()->with('error', 'Category not found.');
    //     }
    
    //     // Category-wise email mapping
    //     $adminEmails = [
    //         'Woven Sack'  => 'inquiry@armstrongex.com',
    //         'Needle Loom' => 'inquiry@armstrongex.com',
    //         'FIBC'        => 'sales@armstrongex.com',
    //         'Mulch'       => 'sales@armstrongex.com',
    //         'Lumber'      => 'sales@armstrongex.com',
    //         'Bag Closing' => 'marketing.bagclosing@armstrongex.com',
    //         'Sewing'      => 'saleswest@armstrongex.com',
    //     ];
    
    //     $categoryName = $find_category_name->name;
    //     $adminEmail = $adminEmails[$categoryName] ?? 'inquiry@armstrongex.com'; // fallback
    
    //     $sheetData = [
    //         'form_type'    => 'Product Form',
    //         'name'         => $request->name ?? $request->fullname ?? '',
    //         'company_name' => $request->company_name ?? '',
    //         'contact'      => $request->contact ?? $request->phone ?? '',
    //         'email'        => $request->email ?? '',
    //         'product_name' => $find_category->product_name ?? '',
    //         'message'      => $request->message ?? '',
    //         'date'         => Carbon::now()->format('d/m/Y H:i:s'),
    //     ];
    
    //     try {
    //         // Send emails
    //         Mail::to($request->email)->send(new SendProductInQMailToUser());
    //         Mail::to($adminEmail)->send(new SendProductInQMailToAdmin($product_inquiry));
    //     } catch (\Exception $e) {
    //         Log::error('Mail sending failed: ' . $e->getMessage());
    //     }
    
    //     // Send to Google Sheets
    //     $response = Http::timeout(30)
    //         ->withHeaders(['Content-Type' => 'application/json'])
    //         ->post('https://script.google.com/macros/s/AKfycbxnMJSN6Lk7ejJTqpUXFCXIIMKo5oxk4GcbcXn-nvALvAFE4dl9IrGnCTboVJ1V_2DZ/exec', $sheetData);
    
    //     // Optional logging for Sheets response
    //     if ($response->successful()) {
    //         Log::info('Data successfully sent to Google Sheets', [
    //             'email' => $request->email,
    //             'response' => $response->json(),
    //         ]);
    //     } else {
    //         Log::warning('Google Sheets API failed', [
    //             'status' => $response->status(),
    //             'body' => $response->body(),
    //         ]);
    //     }
    
    //     // ✅ SPECIAL REDIRECT CONDITION
    //     if (trim($find_category->product_name) === 'The Wide-Width Flexo Printing Machine') {
    //         return redirect()->route('thankyouwidewidth')
    //             ->with('success', 'Your message has been sent successfully.');
    //     }
    
    //     // Default redirect for all other products
    //     return redirect()->route('thankyou')
    //         ->with('success', 'Your message has been sent successfully.');
    // }
    // public function productenquirystore(Request $request)
    // {
    //     $request->validate([
    //         'name'         => 'required|string|max:255',
    //         'product_name' => 'required|string|max:255',
    //         'company_name' => 'required|string|max:255',
    //         'contact'      => 'required|string|max:20', // full phone (+91XXXXXXXXXX)
    //         'email'        => 'required|email',
    //     ]);
    
    //     $produt_url = $request->original_product_url;
    //     $find_category = $produt_url
    //         ? ProductMaster::where('url', $produt_url)->first()
    //         : ProductMaster::where('product_name', $request->product_name)->first();
    
    //     if (!$find_category) {
    //         return redirect()->back()->with('error', 'Product not found.');
    //     }
    
    //     // ✅ Store full phone number (+code+number) and country
    //     $product_inquiry = ProductEnquiry::create([
    //         'name'         => $request->name,
    //         'company_name' => $request->company_name,
    //         'product_name' => $find_category->product_name,
    //         'contact'      => $request->contact,  // full formatted number like +919876543210
    //         'country'      => $request->country,  // new country field
    //         'email'        => $request->email,
    //         'message'      => $request->message,
    //     ]);
    
    //     $find_category_name = ProductCategory::where('id', $find_category->category_id)->first();
    //     if (!$find_category_name) {
    //         return redirect()->back()->with('error', 'Category not found.');
    //     }
    
    //     // ✅ Category-wise email mapping
    //     $adminEmails = [
    //         'Woven Sack'  => 'inquiry@armstrongex.com',
    //         'Needle Loom' => 'inquiry@armstrongex.com',
    //         'FIBC'        => 'sales@armstrongex.com',
    //         'Mulch'       => 'sales@armstrongex.com',
    //         'Lumber'      => 'sales@armstrongex.com',
    //         'Bag Closing' => 'marketing.bagclosing@armstrongex.com',
    //         'Sewing'      => 'saleswest@armstrongex.com',
    //     ];
    
    //     $categoryName = $find_category_name->name;
    //     $adminEmail = $adminEmails[$categoryName] ?? 'inquiry@armstrongex.com'; // fallback
    
    //     // ✅ Send data to Google Sheet
    //     $sheetData = [
    //         'form_type'    => 'Product Form',
    //         'name'         => $request->name ?? '',
    //         'product_name' => $find_category->product_name ?? '',
    //         'company_name' => $request->company_name ?? '',
    //         'contact'      => $request->contact ?? '', // full phone + code
    //         'email'        => $request->email ?? '',
    //         'country'      => $request->country ?? '',
    //         'message'      => $request->message ?? '',
    //         'date'         => \Carbon\Carbon::now()->format('d/m/Y H:i:s'),
    //     ];
    
    //     try {
    //         // ✅ Send email to user and admin
    //         \Mail::to($request->email)->send(new \App\Mail\SendProductInQMailToUser());
    //         \Mail::to($adminEmail)->send(new \App\Mail\SendProductInQMailToAdmin($product_inquiry));
    //     } catch (\Exception $e) {
    //         \Log::error('Mail sending failed: ' . $e->getMessage());
    //     }
    
    //     // ✅ Send data to Google Sheets
    //     $response = \Http::timeout(30)
    //         ->withHeaders(['Content-Type' => 'application/json'])
    //         ->post('https://script.google.com/macros/s/AKfycbwLSt6-2tAYRHL3f9GpfClTbq9slI4aX4CepQwdIkNL2ENUNOjMF9egjYQVy2d1GN4C/exec', $sheetData);
    
    //     if ($response->successful()) {
    //         \Log::info('Data successfully sent to Google Sheets', [
    //             'email' => $request->email,
    //             'response' => $response->json(),
    //         ]);
    //     } else {
    //         \Log::warning('Google Sheets API failed', [
    //             'status' => $response->status(),
    //             'body' => $response->body(),
    //         ]);
    //     }
    
    //     // ✅ Redirect conditions
    //     if (trim($find_category->product_name) === 'The Wide-Width Flexo Printing Machine') {
    //         return redirect()->route('thankyouwidewidth')
    //             ->with('success', 'Your message has been sent successfully.');
    //     }
    
    //     return redirect()->route('thankyou')
    //         ->with('success', 'Your message has been sent successfully.');
    // }

public function productenquirystore(Request $request)
{
    $request->validate([
        'name'         => 'required|string|max:255',
        'product_name' => 'required|string|max:255',
        'company_name' => 'required|string|max:255',
        'contact'      => 'required|string|max:20',
        'email'        => 'required|email',
    ]);

    $produt_url = $request->original_product_url;
    $find_category = $produt_url
        ? ProductMaster::where('url', $produt_url)->first()
        : ProductMaster::where('product_name', $request->product_name)->first();

    if (!$find_category) {
        return redirect()->back()->with('error', 'Product not found.');
    }

    // ✅ Step 1: Store in database immediately
    $product_inquiry = ProductEnquiry::create([
        'name'         => $request->name,
        'company_name' => $request->company_name,
        'product_name' => $request->product_name,
        // 'product_name' => $find_category->product_name,
        'contact'      => $request->contact,
        'country'      => $request->country,
        'email'        => $request->email,
        'message'      => $request->message,
    ]);

    $find_category_name = ProductCategory::find($find_category->category_id);
    if (!$find_category_name) {
        return redirect()->back()->with('error', 'Category not found.');
    }

    $adminEmails = [
        'Woven Sack'  => 'inquiry@armstrongex.com',
        'Needle Loom' => 'inquiry@armstrongex.com',
        'FIBC'        => 'sales@armstrongex.com',
        'Mulch'       => 'sales@armstrongex.com',
        'Lumber'      => 'sales@armstrongex.com',
        'Bag Closing' => 'marketing.bagclosing@armstrongex.com',
        'Sewing'      => 'saleswest@armstrongex.com',
    ];

    $categoryName = $find_category_name->name;
    $adminEmail = $adminEmails[$categoryName] ?? 'inquiry@armstrongex.com';

    // ✅ Step 2: Send mail immediately (non-blocking)
    // try {
    //     \Mail::to($request->email)->send(new \App\Mail\SendProductInQMailToUser($product_inquiry));
    //     \Mail::to($adminEmail)->cc('vyom@armstrongex.com')->send(new \App\Mail\SendProductInQMailToAdmin($product_inquiry));
    // } catch (\Exception $e) {
    //     \Log::error('Mail sending failed: ' . $e->getMessage());
    // }

    // ✅ Step 3: Dispatch Google Sheet saving as a background job
    $sheetData = [
        'form_type'    => 'Product Form',
        'name'         => $request->name ?? '',
        'product_name' => $request->product_name,
        // 'product_name' => $find_category->product_name ?? '',
        'company_name' => $request->company_name ?? '',
        'contact'      => $request->contact ?? '',
        'email'        => $request->email ?? '',
        'country'      => $request->country ?? '',
        'message'      => $request->message ?? '',
        'date'         => \Carbon\Carbon::now()->format('d/m/Y H:i:s'),
    ];

    // 👉 This will not block user redirect
    dispatch(function () use ($sheetData) {
        try {
            $response = \Http::timeout(30)
                ->withHeaders(['Content-Type' => 'application/json'])
                ->post('https://script.google.com/macros/s/AKfycbwLSt6-2tAYRHL3f9GpfClTbq9slI4aX4CepQwdIkNL2ENUNOjMF9egjYQVy2d1GN4C/exec', $sheetData);

            if ($response->successful()) {
                \Log::info('✅ Google Sheet updated successfully', ['email' => $sheetData['email']]);
            } else {
                \Log::warning('⚠️ Google Sheet failed', [
                    'status' => $response->status(),
                    'body'   => $response->body(),
                ]);
            }
        } catch (\Exception $e) {
            \Log::error('❌ Google Sheet Error: ' . $e->getMessage());
        }
    })->afterResponse(); // ✅ Runs after response is sent

    // ✅ Step 4: Respond instantly to user
    if (trim($find_category->product_name) === 'The Wide-Width Flexo Printing Machine') {
        return redirect()->route('thankyouwidewidth')
            ->with('success', 'Your message has been sent successfully.');
    }

    return redirect()->route('thankyou')
        ->with('success', 'Your message has been sent successfully.');
}


    public function rDevelopment()
    {
        $metatitle="Research & Development | Armstrong";
        $metadescription="At Armstrong, our dedicated R&D team explores new technologies, prototypes smarter solutions, and refines processes to meet the changing industry needs.";
        $slider = ResearchDevelopmentSlider::orderBy('id','asc')->where('status','Active')->get();
        return view('front.research-development',compact('metatitle','metadescription','slider'));
    }
    
    public function ourInfrasturcture()
    {
        $metatitle="Our Infrastructure | Armstrong";
        $metadescription="From single-unit machines to full-line systems, our robust and scalable infrastructure helps us get you engineering solutions that reduce labor involvement";

        $infrastructureslider = InfrastructureSlider::where('status','Active')->get();
        $facilities = OurFacility::orderBy('id','asc')->where('status','Active')->get();
        return view('front.our-infrastructure',compact('metatitle','metadescription','infrastructureslider','facilities'));
    }
    public function lifearmstrong()
    {
        $metatitle="Life At Armstrong";
        $metadescription="Join our team where ambition drives action, collaboration sparks innovation, and every day brings the chance to create finishing solutions that create a powerful impact.";
        $lifearmstrong = LifeArmstrong::where('status','Active')->get();
        return view('front.life-armstrong',compact('metatitle','metadescription','lifearmstrong'));
    }
    
     public function whatsaapinquiry(Request $request)
    {
        WhatsappInquiry::create([
           
            'number'  => $request->number,
            'message'  => $request->message,
        ]);
    
        $timestamp = Carbon::now()->format('Y-m-d H:i:s');
    
        // Google Sheet expects:
        // form_type, contact, message, date
        $sheetsData = [
            'form_type' => 'whatsapp inquiry',
            'contact'   => $request->number,
            'message'  => $request->message,
            'date'      => $timestamp,
        ];
    
        // Send to Google Sheets
        try {
            Http::withHeaders(['Content-Type' => 'application/json'])
                ->post('https://script.google.com/macros/s/AKfycbyiWRofXVf9V0lj8xKffnzl3ygyRIzPh_EJ2FvgPmClfgJWU0xHe0hE63BaLDCSVjfE/exec', 
                    $sheetsData
                );
        } catch (\Exception $e) {
            \Log::error('Google Sheets Exception (WhatsApp Inquiry):', [
                'message'   => $e->getMessage(),
                'trace'     => $e->getTraceAsString(),
                'data_sent' => $sheetsData
            ]);
        }
    
        // Redirect to WhatsApp
        $number = '916358820089'; // Change if needed
        $message = 'Inquiry from the website.';
        $whatsappUrl = "https://api.whatsapp.com/send/?phone={$number}&text=" . urlencode($message);
    
        return back()->with('whatsapp_url', $whatsappUrl);
    }

}
