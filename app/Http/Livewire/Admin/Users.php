<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

class Users extends Component
{
    public function deleteUser($id)
    {
        User::where('id', $id)->delete();
        session()->flash('message', 'User deleted!');
    }

    public function render()
    {
        return view('livewire.admin.users', [
            'users' => User::all()
        ]);
    }
}
