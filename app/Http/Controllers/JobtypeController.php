<?php

namespace App\Http\Controllers;

use App\Models\Jobtype;
use App\Repositories\JobTypeRepository;
use Illuminate\Http\Request;

class JobtypeController extends Controller
{

    private $jobTypeRepository;

    public function __construct(JobTypeRepository $jobTypeRepository)
    {
        $this->jobTypeRepository=$jobTypeRepository;
        
        $this->middleware(['role:Admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $jobtypes = Jobtype::all();
        // dd($categories);
        return view('job-types.index', compact('jobtypes'))->with('i', ($request->input('page', 1) - 1) * 5);

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
        $request->validate([
            'name' => 'required|unique:categories,name',
        ]);
        Jobtype::create($request->all());

        return redirect()->route('jobTypes.index')
            ->with('success', 'new job type created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jobtype  $jobtype
     * @return \Illuminate\Http\Response
     */
    public function show(Jobtype $jobtype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jobtype  $jobtype
     * @return \Illuminate\Http\Response
     */
    public function edit(Jobtype $jobtype)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jobtype  $jobtype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:jobtypes,name',
        ]);
        $this->jobTypeRepository->update($id, $request->all());

        return redirect()->route('jobTypes.index')
            ->with('success', 'JobType updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jobtype  $jobtype
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category= Jobtype::find($id);
        $category->delete();
        return redirect()->route('jobTypes.index')
            ->with('success', 'JobType deleted successfully');
    }
}
