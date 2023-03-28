<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\City;
use App\Models\Job;
use App\Models\Jobtype;
use App\Models\Salarytype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobadminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:Admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        foreach (Auth::user()->roles as $role) {
            // dd($role->name);
        };
        $categories = Category::all();
        $jobTypes = Jobtype::all();
        $salaryTypes = Salarytype::all();
        $cities = City::all();

        $jobs = Job::latest()->get();
        return view('jobs.admin.index', compact('jobs', 'categories', 'jobTypes', 'salaryTypes', 'cities'))
        ->with('i', ($request->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required|max:60',
            'category' => 'required',
            'description' => 'required|min:10|max:5000',
            'city' => 'required',
            'jobtype' => 'required',
            'salary' => 'required|integer',
            'salarytype' => 'required',
            'image' => 'sometimes|image|max:2000'
        ]);
        // dd($request->all());

        if ($request->image) {

            $imgpath = $request->image->store('profile', 'public');

            $users = Job::create(array_merge(
                [
                    'title' => $request->title,
                    'category_id' => $request->category,
                    'description' => $request->description,
                    'city_id' => $request->city,
                    'jobtype_id' => $request->jobtype,
                    'salary' => $request->salary,
                    'salarytype_id' => $request->salarytype,
                    'status' => 1,
                    'user_id' => Auth::user()->id,
                ],
                ['image' => $imgpath]
            ));

            return back()->with('success', 'Ads created successfully.');
        }else {
            $users= Job::create([
                'title' => $request->title,
                'category_id' => $request->category,
                'description' => $request->description,
                'city_id' => $request->city,
                'jobtype_id' => $request->jobtype,
                'salary' => $request->salary,
                'salarytype_id' => $request->salarytype,
                'status' => 1,
                'user_id' => Auth::user()->id,
            ]);
            // dd($users);
            return back()->with('success', 'Ads created successfully.');

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
                // dd($request->all());
                $request->validate([
                    'title' => 'required|max:60',
                    'category' => 'required',
                    'description' => 'required|min:10|max:5000',
                    'city' => 'required',
                    'jobtype' => 'required',
                    'salary' => 'required|integer',
                    'salarytype' => 'required',
                    'image' => 'sometimes|image|max:2000'
                ]);
                // dd($request->all());
        
                if ($request->image) {
        
                    $imgpath = $request->image->store('profile', 'public');
        
                    $job= Job::find($id);
                    $jobs = $job->update(array_merge(
                        [
                            'title' => $request->title,
                            'category_id' => $request->category,
                            'description' => $request->description,
                            'city_id' => $request->city,
                            'jobtype_id' => $request->jobtype,
                            'salary' => $request->salary,
                            'salarytype_id' => $request->salarytype,
                            'status' => 1,
                            'user_id' => Auth::user()->id,
                        ],
                        ['image' => $imgpath]
                    ));
        
                    return back()->with('success', 'Ads created successfully.');
                }else {
                    $job= Job::find($id);

                    $jobs= $job->update([
                        'title' => $request->title,
                        'category_id' => $request->category,
                        'description' => $request->description,
                        'city_id' => $request->city,
                        'jobtype_id' => $request->jobtype,
                        'salary' => $request->salary,
                        'salarytype_id' => $request->salarytype,
                        'status' => 1,
                        'user_id' => Auth::user()->id,
                    ]);
                    // dd($users);
                    return back()->with('success', 'Ads created successfully.');
        
                }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job= Job::find($id);
        $job->delete();

        return back()->with('success', 'Deleted successfully');

    }
}
