<?php

namespace App\Http\Controllers;

use App\Models\Salarytype;
use Illuminate\Http\Request;

class SalarytypeController extends Controller
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
    public function index()
    {
        $salaries= Salarytype::all();
        return view('salary_type.index', compact('salaries'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
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
            'name' => 'required|unique:salarytypes,name',
        ]);
        Salarytype::create($request->all());
        return redirect()->route('salaryTypes.index')
        ->with('success', 'Created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Salarytype  $salarytype
     * @return \Illuminate\Http\Response
     */
    public function show(Salarytype $salarytype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Salarytype  $salarytype
     * @return \Illuminate\Http\Response
     */
    public function edit(Salarytype $salarytype)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Salarytype  $salarytype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:salarytypes,name',
        ]);
        $salary= Salarytype::find($id);
        $salary->update($request->all());

        return redirect()->route('salaryTypes.index')
        ->with('success', 'Updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Salarytype  $salarytype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $salary= Salarytype::find($id);
        $salary->delete();
        return redirect()->route('salaryTypes.index')
        ->with('success', 'Deleted successfully.');

    }
}
