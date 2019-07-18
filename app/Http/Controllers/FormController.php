<?php

namespace App\Http\Controllers;

use App\Mail\TestimonialMail;
use App\Mail\ConsultationMail;
use App\Mail\ContactMail;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FormController extends Controller
{
    public function consultation(Request $request)
    {
        $this->validate($request, [
            'contact' => 'required'
        ]);

        Mail::to(config('contacts.mail_to'))->queue(new ConsultationMail($request->input()));

        return [
            'message'     => __("Сообщение отправлено!"),
            'description' => __("Мы с вами скоро свяжемся")
        ];
    }

    public function contact(Request $request)
    {
        $this->validate($request, [
            'phone'   => '',
            'email'   => '',
            'message' => 'required'
        ]);

        if (! $request->input('phone') and ! $request->input('email'))
            return abort(422);

        Mail::to(config('contacts.mail_to'))->queue(new ContactMail($request->input()));

        return [
            'message'     => __("Сообщение отправлено!"),
            'description' => __("Мы с вами скоро свяжемся")
        ];
    }

    public function testimonial(Request $request)
    {
        $this->validate($request, [
            'name'    => 'required',
            'message' => 'required'
        ]);

        $data = $request->input();
        $data['message'] = nl2br(strip_tags($data['message']));

        Mail::to(config('contacts.mail_to'))->queue(new TestimonialMail($data));

        Testimonial::create([
            'name'   => $data['name'],
            'text'   => $data['message'],
            'status' => Testimonial::STATUS_HIDDEN,
        ]);

        return [
            'message'     => __("Спасибо за ваш отзыв!"),
            'description' => __("Он появится на сайте после модерации")
        ];
    }
}
