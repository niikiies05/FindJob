<?php

namespace App\Repositories;

use App\Models\City;

class CityRepository extends MainRepository
{

    public function __construct(City $city)
	{
		$this->model = $city;
	}

}