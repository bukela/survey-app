<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SurveyReminder extends Mailable
{
    use Queueable, SerializesModels;

    public $doctor;
    public $url;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($doctor, $url)
    {
        $this->doctor = $doctor;
        $this->url = $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Klinische evaluatie ConvaTec wondverband')->markdown('emails.survey-reminder');
    }
}
