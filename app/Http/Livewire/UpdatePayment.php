<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;

class UpdatePayment extends Component
{
	public $orderid;

	protected $queryString = ['orderid'];

	public function render()
	{
		$check = Order::where('id', $this->orderid)->value('paid');
		$usercheck = Order::where('id', $this->orderid)->value('name');


		if ($usercheck != auth()->user()->name) {
			session()->flash('errorMessage', 'Niet jouw bestelling.');
		}
		else {
				if ($check == 0) {
					Order::where('id', $this->orderid)->update(['paid' => 1]);
					session()->flash('successMessage', 'Bedankt voor je betaling!');
				} else {
					session()->flash('errorMessage', 'Was al betaald!');
				}
			}
		return view('livewire.update-payment');
	}
}
