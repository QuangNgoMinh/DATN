<?php

namespace App\Http\Controllers\Std;

use App\Models\Student;
use Validator;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function stdLogin()
    {
        return view('livewire.std.stdLogin');
    }


    public function stdLoginPost(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|string',
            'password' => 'required',
        ]);
        if (auth()->guard('std')->attempt(['name' => $request->input('username'), 'password' => $request->input('password')]))
        {
            $user = auth()->guard('std')->user();
            dd($user);
        }else{
            return back()->with('error','your username and password are wrong.');
        }
    }
}