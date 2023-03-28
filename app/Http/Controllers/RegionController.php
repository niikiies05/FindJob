<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegionRequest;
use App\Models\Country;
use App\Repositories\RegionRepository;
use App\Repositories\CountryRepository;
use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{

    public $regionRepository;
    public $countryRepository;
    public function __construct(RegionRepository $regionRepository, CountryRepository $countryRepository)
    {
        $this->regionRepository =$regionRepository;
        $this->countryRepository = $countryRepository;

        $this->middleware(['role:Admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regions = $this->regionRepository->getAll();
        $countries = $this->countryRepository->getAll();
        // $countries= Country::where('status', 1)->get();
        return view('regions.index', compact('regions', 'countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $countries = $this->countryRepository->getAll();
        return view('regions.add_region', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegionRequest $request)
    {
        $this->regionRepository->store($request->all());
        session()->flash('message',  __('region.record_message'));
        return redirect()->route('regions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $region = $this->regionRepository->getById($id);
        return view('countries.edit_country', compact('region'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function update(RegionRequest $request, $id)
    {
        $this->regionRepository->update($id, $request->all());
        session()->flash('message',  __('region.update_message'));
        return redirect()->route('regions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->regionRepository->destroy($id);
        session()->flash('message',  __('region.delete_message'));
        return back();
    }

    public function updateRegionStatus(Request $request){
        $region = Region::find($request->id);
        $region->status = $request->status;
        $region->save();
    }
}
