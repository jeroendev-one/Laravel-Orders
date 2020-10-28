<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;
use Carbon\Carbon;

class Dashboard extends Component
{
    public function render()
    {
        $today = Carbon::now()->format('d-m-Y');

        $wanbetalers = Order::select('name', \DB::raw('COUNT(paid) as amount'))->where('paid', '0')->where('datum', '!=', $today)->groupBy('name')->orderBy('paid', 'DESC')->get();

        $totalOrders = Order::count('id');
        return view('livewire.dashboard', [
            'wanbetalers' => $wanbetalers,
            'totalOrders' => $totalOrders
        ]);
    }
}
