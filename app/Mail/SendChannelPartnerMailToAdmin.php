<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendChannelPartnerMailToAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $channelPartner;

    public function __construct($channelPartner)
    {
        $this->channelPartner = $channelPartner;
    }

    public function build()
    {
        return $this->subject('New Channel Partner Enquiry')
                    ->view('front.email.channel_partner_admin')
                    ->with(['channelPartner' => $this->channelPartner]);
    }
}
