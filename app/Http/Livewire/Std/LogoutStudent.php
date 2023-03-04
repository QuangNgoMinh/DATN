<?php

namespace App\Http\Livewire\Std;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;


class LogoutStudent extends Component
{
    public function render()
    {
        return view('livewire.std.stdLogout');
    }

    public function logout()
    {
        Auth::logout();

        return redirect(route('std-login'));
    }
}
