<?php

namespace App\Repositories;

use App\Models\Region;

class RegionRepository extends MainRepository
{

    public function __construct(Region $region)
	{
		$this->model = $region;
	}

}