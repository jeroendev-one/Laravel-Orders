<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\OrderNotification;
use Illuminate\Support\Facades\Mail;
use App\Models\Order;

class InsertPricesOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orders:insertprices';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insert prices for orders';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $orders = Order::where('amount', '=', '0')->get();
        $tikkieLink = $this->ask('Tikkie link');
        $paypalLink = env('PAYPAL_LINK');

        foreach ($orders as $order) {

            $this->line(' Naam: ' . $order->name);
            $this->line(' Bestelling: ' . $order->bestelling);
            $price = $this->ask('Bedrag');

	    // Update queries
            Order::where('bestelling', '=', $order->bestelling)->update(['amount' => $price]);
	    Order::where('bestelling', '=', $order->bestelling)->update(['tikkielink' => $tikkieLink]);

	    // Mail
            Mail::to($order->email)->send(new OrderNotification($order, $tikkieLink, $paypalLink));

        }
    }
}
