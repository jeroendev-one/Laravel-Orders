<?php

namespace App\Mail;

use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;

class OrderNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $request;
    public $subject;

    public function __construct(Order $order, string $tikkieLink)
    {

        $this->order = $order;
        $this->paypalLink = env('PAYPAL_LINK');
        $this->tikkieLink = $tikkieLink;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $date = date('d-m');
        $restaurant = $this->order['restaurant'];

        $amount = Order::select('amount')->where('bestelling', $this->order->bestelling)->value('amount');

        return $this->view('mail.order')->subject("Bevestiging bestelling $date bij $restaurant")->from(env('MAIL_FROM_ADDRESS'), env('APP_NAME'))->with([
            'order' => $this->order,
            'amount' => $amount,
            'tikkieLink' => $this->tikkieLink,
            'paypalLink' => $this->paypalLink
        ]);

    }
}
