<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityRequest;
use App\Repositories\CityRepository;
use App\Repositories\RegionRepository;
use App\Models\City;
use App\Models\Region;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public $cityRepository;
    public $regionRepository;
    public function __construct(CityRepository $cityRepository, RegionRepository $regionRepository)
    {
        $this->cityRepository = $cityRepository;
        $this->regionRepository = $regionRepository;

        $this->middleware(['role:Admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = $this->cityRepository->getAll();
        // $regions = $this->regionRepository->getAll();
        $regions= Region::where('status', 1)->get();

        return view('cities.index', compact('cities', 'regions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = $this->regionRepository->getAll();
        return view('cities.add_city', compact('regions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityRequest $request)
    {
        $this->cityRepository->store($request->all());
        session()->flash('message',  __('city.record_message'));
        return redirect()->route('cities.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = $this->cityRepository->getById($id);
        return view('cities.edit_city', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(CityRequest $request, $id)
    {
        $this->cityRepository->update($id, $request->all());
        session()->flash('message',  __('city.update_message'));
        return redirect()->route('cities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->cityRepository->destroy($id);
        session()->flash('message',  __('city.delete_message'));
        return back();
    }

    public function updateCityStatus(Request $request){
        $city = City::find($request->id);
        $city->status = $request->status;
        $city->save();
    }
}
