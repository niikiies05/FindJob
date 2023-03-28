<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryRequest;
use App\Models\Country;
use App\Notifications\AddCountry;
use App\Repositories\CountryRepository;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CountryController extends Controller
{
    protected $countryRepository;
    protected $localizationController;
    public function __construct(CountryRepository $countryRepository)
    {
        $this->countryRepository =$countryRepository;
        $this->middleware(['role:Admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries= $this->countryRepository->getAll();

        return view('countries.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('countries.add_country');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(CountryRequest $request)
    {
        $country = new Country();
        $country->name = $request->name;

        $flag = Str::slug($request->name, '-');
        $imageName =$flag. '.'. $request->flag->extension();
        $request->flag->storeAs('flags', $imageName);

        $country->flag = $imageName;
        $country->zip_code = $request->zip_code;
        $country->status = 0;

        $country->save();

        // $country->notify(new AddCountry($country));

        session()->flash('message', __('country.record_message'));
        return redirect()->route('countries.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $country = Country::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $country = $this->countryRepository->getById($id);
        return view('countries.edit_country', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(CountryRequest $request, $id)
    {
        $country= $this->countryRepository->getById($id);
        $country->name = $request->name;

        $flag = Str::slug($request->name, '-');
        $imageName =$flag.'.'. $request->flag->extension();
        $request->flag->storeAs('flags', $imageName);

        $country->flag = $imageName;
        $country->zip_code = $request->zip_code;

        $country->save();
        //$this->countryRepository->update($id, $request->all());
        session()->flash('message', __('country.update_message'));
        return redirect()->route('countries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->countryRepository->destroy($id);
        session()->flash('message',  __('country.delete_message'));

        return redirect()->route('countries.index');
    }

    public function updateCountryStatus(Request $request){
        $country = Country::find($request->id);
        $country->status = $request->status;
        $country->save();
    }
}
