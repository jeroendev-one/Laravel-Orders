<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderNotification;
use App\Order;
use App\User;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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

        return redirect()->back()->with([
            'message' => 'Je bestelling is doorgegeven!'
        ]);


    }

    public function myOrders()
    {
        $user = Auth::user()->name;

        $orders = Order::all()->where('naam', $user);

        return view('auth.orderslist')->with([
            'orders' => $orders,
	        'date' => $this->date
        ]);

    }

    public function allOrders()
    {

        $orders = Order::all();

        return view('auth.orderslist')->with([
            'orders' => $orders,
            'date' => $this->date
        ]);

    }
}
