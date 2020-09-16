<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\RemindNotification;
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
	$this->paypalLink = env('PAYPAL_LINK');
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

	$paypalLink = env('PAYPAL_LINK');

	$oldpayments = Order::where('paid', false)->get();

	foreach ($oldpayments as $order) {
	Mail::to($order->email)->send(new RemindNotification($order, $paypalLink));
	}
    }
}
