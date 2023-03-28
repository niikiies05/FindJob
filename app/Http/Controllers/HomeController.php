<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\City;
use App\Models\Job;
use App\Models\Jobtype;
use App\Models\Salarytype;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        $jobTypes = Jobtype::all();
        $salaryTypes = Salarytype::all();
        $cities = City::all();

        $jobs = Job::where('status', 1)->paginate(5);
        // dd($jobs);
        if (isset($request->Hcity) && isset($request->Htitle) && $request->ajax()) {
            $city = $request->Hcity; 
            $title = $request->Htitle;
            $jobs= Job::where('city_id', $city)
            ->Where('status', 1)
            ->Where('title', 'like', "%$title%")
            ->orWhere('description', 'like', "%$title%")
            ->latest()->get();
            // dd($jobs);
            // return view('jobs.index', compact('jobs', 'categories', 'jobTypes', 'salaryTypes', 'cities')); 
            return redirect()->route('jobs.index');
               
        }elseif (isset($request->Hcity) or isset($request->Htitle)) {
            
            $city = $request->Hcity; 
            $title = $request->Htitle;
            $jobs= Job::where('city_id', $city)
            ->Where('status', 1)
            ->Where('title', 'like', "%$title%")
            ->orWhere('description', 'like', "%$title%")
            ->latest()->get();
            // dd($jobs);
            return view('jobs.searchAjaxCheckResult', compact('jobs', 'categories', 'jobTypes', 'salaryTypes', 'cities'));    

        }

        return view('welcome', compact('jobs', 'categories', 'jobTypes', 'salaryTypes', 'cities'));

        // return view('home');
    }

    // public function indexAdmin()
    // {
    //     return view('welcomeAdmin');
    // }
}
