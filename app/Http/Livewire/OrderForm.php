<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;
use App\Models\Restaurant;
use Carbon\Carbon;

class OrderForm extends Component
{
    public $name;
    public $email;
    public $restaurant;
    public $bestelling;
  
    public function submit()
    {  

        $order = [
            'name' => auth()->user()->name,
            'email' => auth()->user()->email,
            'bestelling' => $this->bestelling,
            'restaurant' => $this->restaurant,
            'datum' => \Carbon\Carbon::now()->format('d-m-Y')
        ];

        Order::create($order);

        $this->reset('bestelling', 'restaurant');
        
        session()->flash('successMessage', "Bestelling doorgegeven! Mocht je hem willen wijzigen, ga dan naar My Orders");
    }
  
    public function render()
    {

        $restaurants = Restaurant::all();

        return view('livewire.order-form', [
            'restaurants' => $restaurants
        ]);
    }
}
