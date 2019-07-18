<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;

class TestimonialMail extends Mailable
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
        $subject = __('ProClinic отзыв от ') . ' ' . $this->data['name'];

        return $this->subject($subject)->view('mail.testimonial')->with([
            'name'       => $this->data['name'],
            'messageText' => $this->data['message'],
        ]);
    }
}