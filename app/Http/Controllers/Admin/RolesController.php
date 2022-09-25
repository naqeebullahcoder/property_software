<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRoleRequest;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Permission;
use App\Role;
use App\Rights;
use App\MenuOPtion;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\PermissionRole;
use Illuminate\Support\Facades\Auth;


class RolesController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('role_access'), 403);
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('role_create'), 403);
        $menu_options=MenuOPtion::where('parent_id',null)->pluck('title', 'id');
        $permissions = Permission::all()->pluck('title', 'id');
        return view('admin.roles.create', compact('permissions','menu_options'));
    }

    public function store(Request $request)
    {
        abort_unless(\Gate::allows('role_create'), 403);
        $role=new Role();
        $role->title=$request->title;
        if($role->save())
        {
            //------------save  Role Permissions ---------------------
            foreach($request->permissions as $permission)
            {
                $permission_role=new PermissionRole();
                $permission_role->role_id=$role->id;
                $permission_role->permission_id=$permission;
                $permission_role->updated_by=Auth::user()->id;
                $permission_role->save();

            }
            foreach($request->menu_options as $menu_option)
            {
                $rights=new Rights();
                $rights->role_id=$role->id;
                $rights->menu_option_id=$menu_option;
                $rights->updated_by=Auth::user()->id;
                $rights->save();
            }

            return redirect()->route('admin.roles.index');
        }

    }

    public function edit(Role $role)
    {
        abort_unless(\Gate::allows('role_edit'), 403);

        $permissions = Permission::all()->pluck('title', 'id');
        $role->load('permissions');
        $menu_options=MenuOPtion::where('parent_id',null)->pluck('title', 'id');
        $rights=Rights::where('role_id',$role->id)->get();

        return view('admin.roles.edit', compact('permissions', 'role','menu_options','rights'));
    }

    public function update(Request $request,Role $role)
    {

       abort_unless(\Gate::allows('role_edit'), 403);
        $role->title=$request->title;
        if($role->save())
        {
            PermissionRole::where('role_id',$role->id)->delete();
            Rights::where('role_id',$role->id)->delete();

            //------------save  Role Permissions ---------------------
            foreach($request->permissions as $permission)
            {
                $permission_role=new PermissionRole();
                $permission_role->role_id=$role->id;
                $permission_role->permission_id=$permission;
                $permission_role->updated_by=Auth::user()->id;
                $permission_role->save();

            }
            foreach($request->menu_options as $menu_option)
            {
                $rights=new Rights();
                $rights->role_id=$role->id;
                $rights->menu_option_id=$menu_option;
                $rights->updated_by=Auth::user()->id;
                $rights->save();
            }

            return redirect()->route('admin.roles.index');
        }

    }

    public function show(Role $role)
    {
        abort_unless(\Gate::allows('role_show'), 403);

        $role->load('permissions');

        return view('admin.roles.show', compact('role'));
    }

    public function destroy(Role $role)
    {
        abort_unless(\Gate::allows('role_delete'), 403);
        PermissionRole::where('role_id',$role->id)->delete();
        Rights::where('role_id',$role->id)->delete();

        $role->delete();

        return back();
    }

    public function massDestroy(MassDestroyRoleRequest $request)
    {
//        Role::whereIn('id', request('ids'))->delete();
//
//        return response(null, 204);
    }
}
