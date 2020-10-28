<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderNotification;


class OrderList extends Component
{
    public $date, $order_id, $paid, $bestelling, $restaurant, $amount, $tikkielink;
    public $updateMode = false;
    
    private function resetInputFields(){
        $this->bestelling = '';
        $this->paid = '';
        $this->amount = '';
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $order = Order::find($id);

        $this->name = $order->name;
        $this->bestelling = $order->bestelling;
        $this->restaurant = $order->restaurant;
        $this->paid = $order->paid;
        $this->order_id = $id;
        $this->amount = $order->amount;
        $this->tikkielink = $order->tikkielink;
    }

    public function update()
    {
        $order = Order::find($this->order_id);

        $paypalLink = env('PAYPAL_LINK');
        $tikkieLink = $this->tikkielink;

        $validatedData = $this->validate([
            'bestelling' => 'required',
            'tikkielink' => 'required',
            'amount' => 'required',
            'paid' => 'required'
        ]);

        Order::where('id', $this->order_id)->update($validatedData);

        if ($this->paid == "0") {
        Mail::to($order->email)->send(new OrderNotification($order, $tikkieLink, $paypalLink));
        }
        session()->flash('successMessage', "Bestellingen van $this->order_id bijgewerkt.");
        $this->resetInputFields();
    }

    public function deleteOrder($id)
    {
        $order = Order::find($id);

        Order::where('id', $id)->delete();
        session()->flash('successMessage', 'Order deleted!');
    }
    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function render()
    {
        $orderDates = Order::distinct('datum')->orderBy('created_at', 'DESC')->pluck('datum');
        $restaurants = Order::distinct('restaurant')->where('datum', 'like', '%'.$this->date.'%')->orderBy('restaurant', 'ASC')->pluck('restaurant');

        $orders = Order::where('datum', 'like', '%'.$this->date.'%')->orderBy('datum', 'ASC')->orderBy('restaurant', 'ASC')->get();

        $total = Order::where('datum', 'like', '%'.$this->date.'%')->count('amount');
        $sum = Order::where('datum', 'like', '%'.$this->date.'%')->sum('amount');


        return view('livewire.admin.order-list', [
            'orders' => $orders,
            'orderDates' => $orderDates,
            'total' => $total,
            'sum' => $sum,
            'restaurants' => $restaurants
        ]);
    }
}
