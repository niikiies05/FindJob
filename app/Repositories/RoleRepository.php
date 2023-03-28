<?php

namespace App\Repositories;

use App\Models\Role;
use App\Models\Permission as permissio;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Contracts\Permission;


class RoleRepository  extends MainRepository
{

    public function __construct(Role $role)
	{
		$this->model = $role;
	}

	public function getAll()
	{
		return $this->model->all();
	}

	// public function getAll()
	// {
	// 	return Role::all();
	// }

	public function getAllPermission()
	{
		return permissio::all();
	}

	public function findById($role)
	{
        return $rolePermissions = permissio::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", $role)
            ->get();
	}
	

	public function getwithPaginate()
	{
		return $roles = Role::orderBy('id', 'DESC')->paginate(10);
	}

	public function rolePermissions($role)
	{
		return DB::table("role_has_permissions")->where("role_has_permissions.role_id", $role)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();
	}





}