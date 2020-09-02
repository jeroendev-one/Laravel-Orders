<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->middleware('auth');
        $this->user = $user;

    }
    public function admin()
    {
        return view('admin.index');
    }

    public function users()
    {
        $users = $this->user->all();
        return view('admin.users', [
            'users' => $users
        ]);
    }
}