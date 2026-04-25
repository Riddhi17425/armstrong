<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\File;

class SendJobPositionsMailToAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $resumePath;

    public function __construct($request, $resumePath = null)
    {
        $this->data = $request;
        $this->resumePath = $resumePath;
    }

    public function build()
    {
        $mail = $this->subject('New Job Applications')
                     ->view('front.email.jobpositionsadmin')
                     ->with('data', $this->data);

        // ✅ Attach resume if available
        if ($this->resumePath && file_exists(public_path($this->resumePath))) {
            $mail->attach(public_path($this->resumePath), [
                'as'   => 'Resume.' . pathinfo($this->resumePath, PATHINFO_EXTENSION),
                'mime' => File::mimeType(public_path($this->resumePath)),
            ]);
        }

        return $mail;
    }
}
