<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyDoctor extends Mailable
{
    protected $doctor;
    protected $patient;

    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @param $doctor
     * @param $patient
     */
    public function __construct($doctor, $patient)
    {
        $this->doctor = $doctor;
        $this->patient = $patient;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Patiënt evaluatie AQUACEL verband')
            ->markdown('emails.notify-doctor')->with(['doctor' => $this->doctor, 'patient' => $this->patient]);
    }
}
