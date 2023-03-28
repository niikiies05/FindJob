<?php

namespace App\Http\Controllers;

// use App\Models\Permission;

use App\Http\Requests\Permissions\CreatePermissionRequest;
use App\Http\Requests\Permissions\UpdatePermissionRequest;
use App\Repositories\PermissionRepository;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    private $permissionRepository;

    function __construct(PermissionRepository $permissionRepository)
    {
        $this->permissionRepository=$permissionRepository;

        // $this->middleware('permission:permission-list|permission-create|permission-edit|permission-delete', ['only' => ['index', 'store']]);
        // $this->middleware('permission:permission-create', ['only' => ['create', 'store']]);
        // $this->middleware('permission:permission-edit', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:permission-delete', ['only' => ['destroy']]);

        $this->middleware(['role:Admin']);


    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Permission $permission)
    {
        $permissions = $this->permissionRepository->getPaginate(10);

        return view('permissions.index', compact('permissions'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePermissionRequest $request)
    {
        Permission::create($request->all());
        // $this->permissionRepository->store($request->all());

        return redirect()->route('permissions.index')
            ->with('success', 'Permission created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePermissionRequest $request, $id)
    {
        // $permission->update($request->all());
        $this->permissionRepository->update($id, $request->all());

        return redirect()->route('permissions.index')
            ->with('success', 'permission updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $permission->delete();
        $permission = $this->permissionRepository->destroy($id);
        return redirect()->route('permissions.index')
            ->with('success', 'permission deleted successfully');
    }
}
