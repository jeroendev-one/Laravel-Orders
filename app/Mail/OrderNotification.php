<?php

namespace App\Mail;

use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

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

    public function __construct(Request $request)
    {

        $this->request = $request;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $date = date('d-m');
        $restaurant = $this->request['restaurant'];

        return $this->view('mail')->subject("Je bestelling van $date bij $restaurant")->from(env('MAIL_FROM_ADDRESS'), 'Order system')->with([
            'request' => $this->request
        ]);

    }
}
