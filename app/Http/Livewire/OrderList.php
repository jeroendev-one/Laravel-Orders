<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class OrderList extends Component
{
    public $date;
    public $updateMode = false;
    public $bestelling;
    public $restaurant;
    public $order_id;
    public $time_closed;

    private function resetInputFields(){
        $this->bestelling = '';     
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $order = Order::find($id);
        $this->bestelling = $order->bestelling;
        $this->restaurant = $order->restaurant;
        $this->order_id = $id;
    }
    
    public function update()
    {
        $order = Order::find($this->order_id);
        
        $this->name = $order->restaurant;
        
        $restaurant = Restaurant::where('name', $this->name)->value('time_closed');

        if (Carbon::now()->lt(Carbon::parse($restaurant))) {
            $order->update([
                'bestelling' => $this->bestelling
            ]);

            session()->flash('successMessage', "Bestellingen van $this->name bijgewerkt.");
            $this->resetInputFields();

        }
        else {
            session()->flash('errorMessage', "Te laat om order te bewerken.");
            $this->resetInputFields();
        }


        $this->updateMode = false;
        
        
    }

    public function deleteOrder($id)
    {
        $order = Order::find($id);
        $this->name = $order->restaurant;
        $restaurant = Restaurant::where('name', $this->name)->value('time_closed');

        if (Carbon::now()->lt(Carbon::parse($restaurant))) {
            Order::where('id', $id)->delete();
            session()->flash('successMessage', 'Order deleted!');
        }
        else
        {
            session()->flash('errorMessage', "Te laat om order te verwijderen.");
        }
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function render()
    {
        // Variables
        $orderDates = Order::distinct('datum')->orderBy('created_at', 'DESC')->pluck('datum');
        $orders = Order::where('datum', 'like', '%'.$this->date.'%')->orderBy('created_at', 'DESC')->get();

        if (request()->routeIs('my-orders')) {
            $orders = Order::where('name', Auth::user()->name)->orderBy('created_at', 'DESC')->get();
            if($this->date) {
                $orders = Order::where('name', Auth::user()->name)->where('datum', 'like', '%'.$this->date.'%')->orderBy('created_at', 'DESC')->get();
            }
        }

        return view('livewire.order-list', [
            'orders' => $orders,
            'orderDates' => $orderDates
        ]);
    }
}
