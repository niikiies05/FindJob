<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->status==0) {
            foreach (Auth::user()->roles as $role) {
                if ($role->name =="Admin") {
                    // session()->message('Votre compte est inactif');
                    return redirect()->route('admin.index')->with('success', 'Votre compte est innactif.');
           
                } elseif ($role->name =="Recruiter") {
                    // flash('Votre compte est inactif')->error();
                    return redirect()->route('home');            
                }else {
                    // flash('Votre compte est inactif')->error();
                    return redirect()->route('home');            
                }
                
            }
            // dd(Auth::user()->roles);
        //    $request->session()->flash('danger', 'Vous êtes inactif'); 
        // flash('Votre compte est inactif')->error();
        // return redirect()->route('home');
        }
        return $next($request);
    }
}
