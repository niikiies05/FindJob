<?php

namespace App\Repositories;

use App\Models\Client;
use App\Models\Contact;

class ClientRepository extends MainRepository
{

  public function getAll()
	{
		return Contact::get();
	}

	public function store(Array $inputs)
	{
		return Contact::create($inputs);
	}

	public function update($id, Array $inputs)
	{
		return Contact::find($id)->update($inputs);
	}

	public function destroy($id)
	{
		return Contact::destroy($id);
	}

}