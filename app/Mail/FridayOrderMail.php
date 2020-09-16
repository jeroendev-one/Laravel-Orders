<?php

namespace App\Mail;

use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;
use App\Models\Restaurant;

class FridayOrderMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $request;
    public $subject;

    public function __construct($restaurants)
    {
        $this->restaurants = $restaurants;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->view('mail.fridaymail')->subject("Eten bestellen")->from(env('MAIL_FROM_ADDRESS'), env('APP_NAME'))->with([
            'restaurants' => $this->restaurants
        ]);

    }
}
