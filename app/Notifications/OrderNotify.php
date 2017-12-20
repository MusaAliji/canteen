<?php

namespace App\Notifications;

use App\Product;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Broadcast;

class OrderNotify extends Notification
{
    use Queueable;

    public $product;
    public $canteen;

    /**
     * Create a new notification instance.
     *
     * @param Product $product
     * @internal param $order
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'product' => $this->product,
//            'canteens' => $notifiable,
            'user' => auth()->user(),
            'room' => auth()->user()->room,
            'created_at'=> Carbon::now('Europe/Istanbul')
        ];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return BroadcastMessage
     */
    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'product' => $this->product,
            'user' =>auth()->user(),
            'room' =>auth()->user()->room,
            'created_at'=> Carbon::now('Europe/Istanbul')
        ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}