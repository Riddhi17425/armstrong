<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendChannelPartnerMailToUser extends Mailable
{
    use Queueable, SerializesModels;

    public $channelPartner;

    public function __construct($channelPartner)
    {
        $this->channelPartner = $channelPartner;
    }

    public function build()
    {
        return $this->subject('Thank you for contacting Armstrong')
                    ->view('front.email.channel_partner_user')
                    ->with(['channelPartner' => $this->channelPartner]);
    }
}
