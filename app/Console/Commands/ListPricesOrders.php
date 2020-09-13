<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\OrderNotification;
use Illuminate\Support\Facades\Mail;
use App\Models\Order;

class ListPricesOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orders:listprices';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List total prices for orders';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->restaurants = Order::distinct('restaurant')->pluck('restaurant');
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {


        foreach ($this->restaurants as $restaurant)
        {
            $total = Order::where('restaurant', $restaurant)->sum('amount');
            echo "$restaurant: . $total \n" ;

        }
    }
}
