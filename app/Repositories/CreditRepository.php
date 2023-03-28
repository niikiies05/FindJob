<?php

namespace App\Repositories;

use App\Models\Credit;

class CreditRepository  extends MainRepository
{

    public function __construct(Credit $credit)
	{
		$this->model = $credit;
	}


}