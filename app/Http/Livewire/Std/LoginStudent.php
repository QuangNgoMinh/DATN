<?php

namespace App\Http\Livewire\Std;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;


class LoginStudent extends Component
{

    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }

    public $username;
    public $password;

    public function render()
    {
        return view('livewire.std.stdLogin')->layout('layout.std.login-app');
    }

    public function login()
    {
        $this->validate([
            'username' => ['required', 'string'],
            'password' => ['required'],
        ]);
        
        $std = Auth::guard('std')->attempt(['name' => $this->username, 'password' => $this->password]);
        if ($std) {
            session()->flash('success', 'Login Successfully');
            return redirect(route('dashboard-std'));
        } else {
            session()->flash('error', 'Invalid Credational');
        }
    }
}
