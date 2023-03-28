<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Jobtype;

class JobTypeRepository extends MainRepository
{

	public function __construct(Jobtype $jobtype)
	{
		$this->model = $jobtype;
	}
}