<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Order;

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
        $orders = Order::all();

        foreach ($orders as $order) {
            echo " Naam: $order->naam \n";
            echo " Bestelling: $order->bestelling";
            $price = $this->ask('Bedrag');
            $query = Order::where('bestelling', '=', $order->bestelling)->update(['amount' => $price]);

        }
    }
}
