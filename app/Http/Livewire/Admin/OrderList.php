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

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function render()
    {
        $orderDates = Order::distinct('datum')->orderBy('datum', 'DESC')->pluck('datum');
        $orders = Order::where('datum', 'like', '%'.$this->date.'%')->orderBy('datum', 'DESC')->orderBy('created_at', 'DESC')->get();

        $total = Order::where('datum', 'like', '%'.$this->date.'%')->count('amount');
        
        return view('livewire.admin.order-list', [
            'orders' => $orders,
            'orderDates' => $orderDates,
            'total' => $total
        ]);
    }
}
