<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;

class ContactMail extends Mailable
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
        if ($this->data['phone']) {
            $contact = $this->data['phone'];
        } else if ($this->data['email']) {
            $contact = $this->data['email'];
        } else {
            $contact = '';
        }

        $subject = __('ProClinic вопрос от ') . ' ' . $contact;

        return $this->subject($subject)->view('mail.contact')->with([
            'phone'       => $this->data['phone'],
            'email'       => $this->data['email'],
            'messageText' => nl2br(strip_tags($this->data['message'])),
        ]);
    }
}