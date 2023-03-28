<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends MainRepository
{

    public function __construct(User $user)
	{
		$this->model = $user;
	}

}