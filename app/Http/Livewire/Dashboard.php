<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;

class Dashboard extends Component
{
    public function render()
    {
        $wanbetalers = Order::select('name', \DB::raw('COUNT(paid) as amount'))->where('paid', '0')->groupBy('name')->orderBy('paid', 'DESC')->get();

        $totalOrders = Order::count('id');
        return view('livewire.dashboard', [
            'wanbetalers' => $wanbetalers,
            'totalOrders' => $totalOrders
        ]);
    }
}
