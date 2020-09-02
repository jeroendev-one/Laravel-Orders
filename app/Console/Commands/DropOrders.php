<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Order;

class DropOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orders:drop';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Drop the whole orders table';

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
        if ($this->confirm('Do you wish to continue?')) {
            Order::truncate();
        }
    }
}
