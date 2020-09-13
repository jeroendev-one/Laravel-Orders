<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;
use Carbon\Carbon;

class RemindPaymentsOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orders:remindpayments';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send reminders for 1 week old payments';

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
        $oldpayments = Order::all()->whereDate('datum', '=', date('Y-m-d'));
        dd($oldpayments);
    }
}
