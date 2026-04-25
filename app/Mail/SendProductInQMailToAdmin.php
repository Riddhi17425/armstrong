<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendProductInQMailToAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $data; 
 
   public function __construct($request)
    {
        $this->data = $request; // Assign the contact data to the public property
    }

    public function build()     
    {
        return $this->subject('New Product Inquiry')
                    ->view('front.email.productinquiryadmin')
                    ->with('data', $this->data); 
    } 
} 
