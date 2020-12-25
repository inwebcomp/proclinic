<?php

namespace App\Http\Controllers;

use App\Mail\TestimonialMail;
use App\Mail\ConsultationMail;
use App\Mail\ContactMail;
use App\Models\Testimonial;
use App\Notification\Consultation;
use App\Notification\Contact;
use App\Notification\NewOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use NotificationChannels\Telegram\Exceptions\CouldNotSendNotification;

class FormController extends Controller
{
    public function consultation(Request $request)
    {
        $this->validate($request, [
            'contact' => 'required'
        ]);

        Mail::to(config('contacts.mail_to'))->queue(new ConsultationMail($request->input()));

        $notification = new Consultation(config('notification-chats.telegram.messages'), $request->input());

        try {
            Notification::route('telegram', '')->notify($notification);
        } catch (CouldNotSendNotification $exception) {
            \Log::critical('Notification failed: ' . $notification->message());
        }

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

        $notification = new Contact(config('notification-chats.telegram.messages'), $request->input());

        try {
            Notification::route('telegram', '')->notify($notification);
        } catch (CouldNotSendNotification $exception) {
            \Log::critical('Notification failed: ' . $notification->message());
        }

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

        $notification = new \App\Notification\Testimonial(config('notification-chats.telegram.messages'), $request->input());

        try {
            Notification::route('telegram', '')->notify($notification);
        } catch (CouldNotSendNotification $exception) {
            \Log::critical('Notification failed: ' . $notification->message());
        }

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
