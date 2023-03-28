<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\City;
use App\Models\Job;
use App\Models\Jobtype;
use App\Models\Salarytype;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function searchJobs(Request $request)
    {
        $cat = $request->category;
        $loc = $request->location;
        if (isset($cat) && isset($loc)) {
            $jobs= Job::where('category_id', $cat)
            ->where('city_id', $loc)
            ->get();

            dd($jobs);
        }

    }

    // public function searchJobPriceBetween(Request $request)
    // {
    //     $categories = Category::all();
    //     $jobTypes = Jobtype::all();
    //     $salaryTypes = Salarytype::all();
    //     $cities = City::all();

    //     // $min= request()->input('minSalary');
    //     // $max= request()->input('maxSalary');
    //     if (isset($request->minSalary) && isset($request->maxSalary) && $request->ajax()) {
    //         $min= $request->minSalary;
    //         $lui = json_decode($min);

    //         $max =$request->maxSalary;
    //         dd($lui);
    //         $jobs= Job::whereBetween('salary', [$min, $max])->get();
    //         return view('jobs.searchAjaxCheckResult', compact('jobs', 'categories', 'jobTypes', 'salaryTypes', 'cities'));    
    
    //     }

    //     $jobs= Job::all();
    //     return view('jobs.searchAjaxCheckResult', compact('jobs', 'categories', 'jobTypes', 'salaryTypes', 'cities'));    
    // }

    public function searchJob(Request $request)
    {
        $categories = Category::all();
        $jobTypes = Jobtype::all();
        $salaryTypes = Salarytype::all();
        $cities = City::all();

        $q = request()->input('q'); 
        $c = request()->input('category');
        $l = request()->input('location');


        if ($q && !$l && !$c) {
            $jobs = Job::Where('title', 'like', "%$q%")->get();
                return view('jobs.index', compact('jobs', 'categories', 'jobTypes', 'salaryTypes', 'cities'));        
        }elseif ($c && !$q && !$l) {
            $jobs = Job::Where('category_id', $c)->get();
                return view('jobs.index', compact('jobs', 'categories', 'jobTypes', 'salaryTypes', 'cities'));        
        }elseif ($l) {
            $jobs = Job::Where('city_id', $l)->get();
            return view('jobs.index', compact('jobs', 'categories', 'jobTypes', 'salaryTypes', 'cities'));        
        }elseif ($l && $c && !$q) {
            $jobs = Job::Where('category_id', $l)
            ->Where('city_id', $c)
            ->get();
            return view('jobs.index', compact('jobs', 'categories', 'jobTypes', 'salaryTypes', 'cities'));        

        }elseif ($q && $c && $l) {
            $jobs = Job::Where('title', 'like', "%$q%") 
            ->where('city_id', $l)
            ->where('category_id', $c)
            ->get();
                return view('jobs.index', compact('jobs', 'categories', 'jobTypes', 'salaryTypes', 'cities'));        
        }else {
            
        }

        $jobs = Job::where('category_id', $c)
        ->where('city_id', $l)
        ->Where('title', 'like', "%$q%")
        ->get();
            return view('jobs.index', compact('jobs', 'categories', 'jobTypes', 'salaryTypes', 'cities'));    
    }

    public function homeSearch(Request $request)
    {
        $categories = Category::all();
        $jobTypes = Jobtype::all();
        $salaryTypes = Salarytype::all();
        $cities = City::all();

        $city = request()->input('city');
        $ads = request()->input('ads');

        if ($city && $ads) {
            $jobs = Job::Where('city_id', $city)
            ->where('status', 1)
            ->Where('title', 'like', "%$ads%")->latest()->get();
            return view('jobs.index', compact('jobs', 'categories', 'jobTypes', 'salaryTypes', 'cities'));

        }elseif ($city) {
            $jobs = Job::Where('city_id', $city)
            ->where('status', 1)
            ->latest()->get();
            return view('jobs.index', compact('jobs', 'categories', 'jobTypes', 'salaryTypes', 'cities'));

        }
        $jobs = Job::where('status', 1)
        ->latest()->get();
        return view('jobs.index', compact('jobs', 'categories', 'jobTypes', 'salaryTypes', 'cities'));


    }

}
