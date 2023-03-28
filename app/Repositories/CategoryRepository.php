<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository extends MainRepository
{

	public function __construct(Category $category)
	{
		$this->model = $category;
	}
}