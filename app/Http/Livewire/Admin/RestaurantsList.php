<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Restaurant;

class RestaurantsList extends Component
{
    public $restaurant_id;
    public $updateMode = false;
    public $time_closed;
    public $enabled;

    private function resetInputFields(){
        $this->time_closed= '';     
    }
    
    public function deleteRestaurant($id)
    {
        Restaurant::find($id)->delete();
        session()->flash('successMessage', 'Restaurant deleted!');
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $restaurant = Restaurant::find($id);
        $this->name = $restaurant->name;
        $this->restaurant_id = $id;
        $this->time_closed = $restaurant->time_closed;
        $this->enabled = $restaurant->enabled;
        
    }

    public function update()
    {
        $restaurant = Restaurant::find($this->restaurant_id);
        $restaurant->update([
            'time_closed' => $this->time_closed,
            'enabled' => $this->enabled
        ]);
        $this->name = $restaurant->name;
        $this->updateMode = false;
        session()->flash('successMessage', "Restaurant: $this->name updated successfully.");
        $this->resetInputFields();
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function render()
    {
        $restaurants = Restaurant::all();

        return view('livewire.admin.restaurants-list', [
            'restaurants' => $restaurants
        ]);
    }
}
