<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\City;
use App\Models\Job;
use App\Models\Jobtype;
use App\Models\Like;
use App\Models\Salarytype;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profiles.personnal-home');
    }

    public function pendingads()
    {
        $categories = Category::all();
        $jobTypes = Jobtype::all();
        $salaryTypes = Salarytype::all();
        $cities = City::all();

        $jobs = Job::where('status', 0)->latest()->get();

        return view('profiles.pending-ads', compact('jobs', 'categories', 'jobTypes', 'salaryTypes', 'cities') );
    }

    public function myads()
    {
        $categories = Category::all();
        $jobTypes = Jobtype::all();
        $salaryTypes = Salarytype::all();
        $cities = City::all();
        if (Auth::check()) {
            $jobs = Job::where('user_id', Auth::user()->id)
            ->where('status',1)
            ->latest()->get();
            return view('profiles.my-ads', compact('jobs', 'categories', 'jobTypes', 'salaryTypes', 'cities'));    
        } else {
            return redirect()->route('login');
        }
        
    }

    public function favoritesads()
    {
        return view('profiles.favorite-ads');
    }

    public function updatepersonnal(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'mobile' => ['required', 'min:8'],
            'about_yourself' => ['nullable', 'string','max:500'],

        ]);
        // dd($request->all());
        $users = User::find(Auth::user()->id);
        // dd($users);
        $users->update($request->all());

        return back()->with('success', 'Updated');
    }

    public function updatepassword(Request $request,  $data)
    {
        
        $request->validate([
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);
// dd($request->all());
        $request->password = Hash::make($request->password);
        $users = User::find(Auth::user()->id);
        // dd($users);
        $users->update([
            'password' => Hash::make('password'),
        ]);
        return back()->with('success', 'Updated');

    }

    public function deletefavorite($id)
    {
        $like = Like::find($id);
        // dd($like);
        $like->delete();

        // $job = Job::find($id);
        // $job->delete();

        return back()->with('success', 'Removed to favorites');
    }

    public function alert()
    {
        $categories= Category::where('status', 1)->get();
        return view('profiles.alert', compact('categories'));
    }
}
