<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\File;

class SendNoVacancyFormMailToAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $pdfPath;
 
    public function __construct($novacancy, $pdfPath = null)
    {
        $this->data = $novacancy; // Assign the contact data to the public property
        $this->pdfPath = $pdfPath;  // Resume path
    }

    public function build()     
    {
        $mail = $this->subject('New Career Inquiry')
                 ->view('front.email.novacancyformadmin')
                 ->with('data', $this->data);

        if ($this->pdfPath && file_exists(public_path($this->pdfPath))) {
            $absolutePath = public_path($this->pdfPath);
            $mail->attach($absolutePath, [
                'as'   => 'Resume.' . pathinfo($absolutePath, PATHINFO_EXTENSION),
                'mime' => File::mimeType($absolutePath),
            ]);
        }

        return $mail;
    } 
} 
