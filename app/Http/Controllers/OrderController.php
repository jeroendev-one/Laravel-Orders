<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderNotification;
use App\Order;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->dateExact = date('d-m-Y H:i');
        $this->date = date('d-m-Y');
    }

    protected function createOrder(Request $request)
    {
        $subject = $this->date;

        $order = [
            'naam' => $request['naam'],
            'email' => $request['email'],
            'bestelling' => $request['bestelling'],
            'restaurant' => $request['restaurant'],
            'datum' => $this->dateExact
        ];

        Order::create($order);
        
        Mail::to($request->email)->send(new OrderNotification($request));

        return view('home')->with([
            'successMsg' => 'Je bestelling is doorgegeven!'
        ]);

        
    }

    public function listOrder()
    {

        $orders = Order::where('datum', 'like', '%' . $this->date . '%')->get();

        return view('orderlist')->with([
            'orders' => $orders
        ]);

    }
}
