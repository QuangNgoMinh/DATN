<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{

    

    public $username;
    public $password;

    // protected $redirectTo = '/home';
   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }

    public function render()
    {
        return view('auth.login')->layout('layout.login-app');
    }
   
    public function login(Request $request)
    {   
        $input = $request->all();
   
        $this->validate($request, [
            'username' => 'required|string',
            'password' => 'required',
        ]);
   
        $admin = Auth::attempt(['name' => $this->username, 'password' => $this->password]);

        if ($admin) {
            session()->flash('success', 'Login Successfully');
            return redirect(route('dashboard'));
        } else {
            session()->flash('error', 'Invalid Credational');
        }
    }          
}

