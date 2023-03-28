<?php

namespace App\Repositories;

use App\Models\Country;

class CountryRepository extends MainRepository
{

    public function __construct(Country $country)
	{
		$this->model = $country;
	}

    public function index()
    {
        return Country::all();
        
    }


}
