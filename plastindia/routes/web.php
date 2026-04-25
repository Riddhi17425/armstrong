<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// use Illuminate\Support\Facades\Artisan;

Route::get('/clear-cache', function () {

    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('cache:clear');

    return '✅ Cache cleared successfully!';
});

Route::get('/', function () {
    //$url = route('form.show');
    $url = 'https://www.armstrongsewing.com/plastindia/form';
    return QrCode::size(200)->generate($url);
});

Route::get('/smtp-test', function () {
    //try {
        $to = 'webdeveloper9.intelliworkz@gmail.com';
        $subject = "TESTING MAIL";
        $headers =  'MIME-Version: 1.0' . "\r\n";                
        $headers .= 'From: ARMSTRONG <exhibition@armstrongex.com>' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $html = '<p>Testing at armstrongex 121219</p>';
        mail($to, $subject, $html, $headers);
        
        // Mail::send([], [], function ($message) {
        //     $message->to('webdeveloper9.intelliworkz@yopmail.com')
        //             ->subject('SMTP Test – Armstrong - live server')
        //             ->html('<p>Test By Yamini at armstrongex</p>');
        // });

        return '✅ SMTP test mail sent (check Gmail inbox / spam / all mail)';
    // } catch (\Exception $e) {
    //     Log::error('SMTP ERROR: '.$e->getMessage());
    //     return '❌ SMTP failed: '.$e->getMessage();
    // }
});

//Route::get('/form', [FormController::class, 'showForm'])->name('form.show');
Route::get('/form', function () {
    return redirect()->away('https://www.armstrongsewing.com/plastindia/form', 301);
});
Route::post('/form', [FormController::class, 'submitForm'])->name('form.submit');