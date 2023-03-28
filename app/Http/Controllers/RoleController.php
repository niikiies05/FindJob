<?php

namespace App\Http\Controllers;

use App\Http\Requests\Roles\UpdateRoleRequest;
use App\Http\Requests\Roles\UpdateRoleRequestRoleRequest;
use App\Http\Requests\Roles\CreateRoleRequest;
use App\Models\Role as ModelsRole;
use App\Models\User;
use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
// use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    private $roleRepository;
    private $permissionRepository;

    function __construct(RoleRepository $roleRepository, PermissionRepository $permissionRepository)
    {
        $this->roleRepository=$roleRepository;
        $this->permissionRepository=$permissionRepository;

        // $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index', 'show']]);
        // $this->middleware('permission:role-create', ['only' => ['create', 'store']]);
        // $this->middleware('permission:role-edit', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:role-delete', ['only' => ['destroy']]);

        // $this->middleware(['role:Admin|Commerciaux']);
        $this->middleware(['role:Admin']);
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Role $role)
    {
        $permissions= $this->permissionRepository->getAll();
        $roles = $this->roleRepository->getPaginate(5);

        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $role)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        return view('roles.index', compact('roles', 'permissions', 'rolePermissions'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = $this->permissionRepository->getAll();
        return view('roles.create', compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRoleRequest $request)
    {
        // dd($request->permission);
        $role = Role::create([
            'name' => $request->input('name'),
            'guard_name' => $request->input('guard_name'),
        ]);
        // $role= $this->roleRepository->store($request->all());
        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index')
            ->with('success', 'Role created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show($role)
    {
        $role= $this->roleRepository->getAll();
        $rolePermissions= $this->roleRepository->findById($role);

                return view('roles.show', compact('role', 'rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $role= $this->roleRepository->findById($role);
        // $role = Role::find($role);
        // $permission = Permission::get();
        $permission=$this->permissionRepository->getAll();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $role)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        return view('roles.index', compact('role', 'permission', 'rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, $id)
    {
        // $role=$this->roleRepository->update($request->all(), $id);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index')
            ->with('success', 'Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')
            ->with('success', 'Role deleted successfully');
    }
}
