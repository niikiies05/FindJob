<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
    // protected $redirectTo = RouteServiceProvider::HOME;

    public function redirectTo()
    {
        foreach (Auth::user()->roles as $role) {
            // $for=$role->name;
            if ($role->name == 'Admin') {
                return $this->redirectTo = route('admin.index');
            } elseif ($role->name == 'Recruiter') {
                return $this->redirectTo = route('home');
            } {
                return $this->redirectTo = route('home');
            }
            

            // return $this->redirectTo = route($for);

        }

        // $for =[
        //     'Admin' => 'admin-dashboard',
        //     'Client' => 'client-dashboard'
        // ];
        // return $this->redirectTo = route($for[Auth::user()->roles]);
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
