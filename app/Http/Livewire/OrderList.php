<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderList extends Component
{
    public $date;

    public function deleteOrder($id)
    {

        $delete = Order::where('id', $id)->delete();
        session()->flash('message', 'Order deleted!');

    }

    public function render()
    {
        // Variables
        $orderDates = Order::distinct('datum')->pluck('datum');
        $orders = Order::where('datum', 'like', '%'.$this->date.'%')->orderBy('datum', 'DESC')->get();

        if (request()->routeIs('my-orders')) {
            $orders = Order::where('name', Auth::user()->name)->get();
            if($this->date) {
                $orders = Order::where('name', Auth::user()->name)->where('datum', 'like', '%'.$this->date.'%')->get();
            }
        }
        
        return view('livewire.order-list', [
            'orders' => $orders,
            'orderDates' => $orderDates
        ]);
    }
}
