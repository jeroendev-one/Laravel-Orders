<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Restaurant;

class RestaurantsForm extends Component
{
    public $name;
    public $enabled;
    public $site_url;
    public $time_closed;

    public function submit()
    {
        $validatedData = $this->validate([
            'name' => 'required|unique:restaurants',
            'enabled' => 'boolean',
            'site_url' => 'required',
            'time_closed' => 'required',
        ]);

        Restaurant::create($validatedData);
        session()->flash('successMessage', 'Added restaurant!');
    }  
    public function render()
    {
        return view('livewire.admin.restaurants-form');
    }
}
