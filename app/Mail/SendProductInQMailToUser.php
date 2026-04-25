<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendProductInQMailToUser extends Mailable
{
    use Queueable, SerializesModels;
    
    public $data;
    
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Create a new message instance.
     *
     * 
     * @return void
     */

    public function build()
    {
        return $this->subject('New Product Inquiry')
                   ->view('front.email.productinquiryuser');
    }
}
