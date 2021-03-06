<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;

class ConsultationMail extends Mailable
{
    use Queueable;

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        $subject = __('ProClinic заявка на консультацию от') . ' ' . $this->data['contact'];

        return $this->subject($subject)->view('mail.consultation')->with([
            'contact' => $this->data['contact'],
        ]);
    }
}