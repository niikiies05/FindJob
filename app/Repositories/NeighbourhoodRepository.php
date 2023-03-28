<?php

namespace App\Repositories;

use App\Models\Neighbourhood;

class NeighbourhoodRepository extends MainRepository
{

    public function __construct(Neighbourhood $neighbourhood)
	{
		$this->model = $neighbourhood;
	}

}