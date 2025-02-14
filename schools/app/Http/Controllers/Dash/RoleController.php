<?php

namespace App\Http\Controllers\Dash;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{

    function __construct()
    {
        $this->middleware(['permission:role-list|role-create|role-edit|role-delete']);
        $this->middleware(['permission:role-create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:role-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:role-delete'], ['only' => ['destroy']]);
    }

    public function index()
    {
        return view('dash.roles.index');
    }

    public function create()
    {
        $permissions = Permission::all()->sortBy('type');

        return view('dash.roles.create', compact('permissions'));

    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission.*' => 'integer|exists:permissions,id', // Validate as integer and check existence
        ]);

    // Convert all permission IDs to integers
    $permissionIds = array_map('intval', $request->input('permission'));

    $role = Role::create(['name' => $request->input('name')]);
    $role->syncPermissions($permissionIds);

    return redirect()->route('roles.index')->with('success', 'Role created successfully');
    }

    public function show($id)
    {

        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", $id)
            ->get();


        return view('dash.roles.show', compact('role', 'rolePermissions'));
    }

    public function edit($id)
    {
        // Find the role by ID
        $role = Role::findOrFail($id);
        
        // Get all permissions
        $permissions = Permission::all();
        
        // Get the permissions associated with the role
        $rolePermissions = $role->permissions->pluck('id')->toArray();
        
        return view('dash.roles.edit', compact('role', 'permissions', 'rolePermissions'));
    }


    public function update(Request $request, $id)
    {
        // Validate the request
        $this->validate($request, [
            'name' => [
                'required',
                // Exclude the current role from unique validation
                'unique:roles,name,' . $id,
            ],
            'permission' => 'required|array', // Ensure it's an array and not empty
            'permission.*' => 'integer|exists:permissions,id', // Validate each permission ID
        ]);

        // Convert all permission IDs to integers
        $permissionIds = array_map('intval', $request->input('permission'));

        // Find the role or throw a 404 error
        $role = Role::findOrFail($id);

        // Update the role name
        $role->name = $request->input('name');
        $role->save();

        // Sync the permissions with the role
        $role->syncPermissions($permissionIds);

        // Redirect with success message
        return redirect()->route('roles.index')
            ->with('success', 'Role updated successfully');
    }


    public function destroy($id)
    {
        DB::table("roles")->where('id', $id)->delete();
        return redirect()->route('roles.index')
            ->with('success', 'Role deleted successfully');
    }
}
