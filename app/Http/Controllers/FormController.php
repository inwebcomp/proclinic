<?php

namespace App\Http\Controllers;

use App\Testimonial;
use App\Mail\ConsultationMail;
use App\Mail\StartMail;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FormController extends Controller
{
    public function consultation(Request $request)
    {
        $this->validate($request, [
            'contact' => 'required'
        ]);

        //Mail::to(config('contacts.mail_to'))->queue(new ConsultationMail($request->input()));

        return [
            'message' => __("Сообщение отправлено!"),
            'description' => __("Мы с вами скоро свяжемся")
        ];
    }
}
