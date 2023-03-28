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

    public function searchJobPriceBetween()
    {
        $categories = Category::all();
        $jobTypes = Jobtype::all();
        $salaryTypes = Salarytype::all();
        $cities = City::all();

        $min= request()->input('minSalary');
        $max= request()->input('maxSalary');

        $jobs= Job::whereBetween('salary', [$min, $max])->get();
        return view('jobs.index', compact('jobs', 'categories', 'jobTypes', 'salaryTypes', 'cities'));    
    }

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

    public function homeSearch()
    {
        $categories = Category::all();
        $jobTypes = Jobtype::all();
        $salaryTypes = Salarytype::all();
        $cities = City::all();

        $city = request()->input('city');
        $ads = request()->input('ads');

        if ($city) {
            $jobs = Job::Where('city_id', $city)->paginate(5);
            return view('welcome', compact('jobs', 'categories', 'jobTypes', 'salaryTypes', 'cities'));

        }elseif ($ads) {
            $jobs = Job::Where('title', 'like', "%$ads%")->paginate(5);
            return view('welcome', compact('jobs', 'categories', 'jobTypes', 'salaryTypes', 'cities'));

        }elseif ($city and $ads) {
            $jobs = Job::Where('title', 'like', "%$ads%")
            ->where('city_id', $city)->paginate(5);
            return view('welcome', compact('jobs', 'categories', 'jobTypes', 'salaryTypes', 'cities'));

        }else {
            return view('welcome', compact('jobs', 'categories', 'jobTypes', 'salaryTypes', 'cities'));
        }
        $jobs = Job::where('city_id', $city)
        ->where('city_id', $city)->paginate(5)
        ->paginate(5);
        return view('welcome', compact('jobs', 'categories', 'jobTypes', 'salaryTypes', 'cities'));




        return view('welcome', compact('jobs', 'categories', 'jobTypes', 'salaryTypes', 'cities'));

    }

}
