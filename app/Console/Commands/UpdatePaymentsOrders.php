<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UpdatePaymentsOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orders:updatepayments';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the payments for the orders';

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
        return 0;
    }
}
