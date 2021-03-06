<?php

namespace App\Notification;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;

class Testimonial extends Notification implements ShouldQueue
{
    use Queueable;
    private $chatId;
    private $data;

    public function __construct($chatId, $data)
    {
        $this->chatId = $chatId;
        $this->data = $data;
    }

    public function via($notifiable)
    {
        return [TelegramChannel::class];
    }

    public function toTelegram($notifiable)
    {
        return TelegramMessage::create()
                              ->to($this->chatId)
                              ->content($this->message());
    }

    public function escape($value)
    {
        return addcslashes($value, '*`_');
    }

    public function message()
    {
        return view('telegram.testimonial')->with([
            'name'        => $this->escape($this->data['name']),
            'messageText' => $this->escape($this->data['message']),
        ])->render();
    }
}
