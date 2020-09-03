<?php

namespace App\Mail;

use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Order;

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

    public function __construct(Order $order, string $tikkieLink, string $paypalLink)
    {

        $this->order = $order;
        $this->paypalLink = $paypalLink;
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

        //dd($this->order->naam);
        $amount = Order::select('amount')->where('bestelling', $this->order->bestelling)->value('amount');
        //dd($amount);

        return $this->view('mail.order')->subject("Bevestiging bestelling $date bij $restaurant")->from(env('MAIL_FROM_ADDRESS'), 'Order system')->with([
            'order' => $this->order,
            'amount' => $amount,
            'tikkieLink' => $this->tikkieLink,
            'paypalLink' => $this->paypalLink
        ]);

    }
}
