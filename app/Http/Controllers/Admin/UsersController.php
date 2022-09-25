<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Office;
use App\OfficeUser;
use App\Role;
use App\User;
use App\Department;
use App\RoleUser;
use App\DepartmentUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('user_access'), 403);
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('user_create'), 403);
        $offices=Office::all()->pluck('name','id');
        $departments=Department::all()->pluck('name','id');
        $roles = Role::all()->pluck('title', 'id');
        return view('admin.users.create', compact('roles','departments','offices'));
    }

    public function store(Request $request)
    {
        abort_unless(\Gate::allows('user_create'), 403);
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password= Hash::make($request->password);
        $user->updated_by=Auth::user()->id;
        if($user->save())
        {
            if($request->roles !=null) {
                foreach ($request->roles as $role) {
                    $role_user = new RoleUser();
                    $role_user->user_id = $user->id;
                    $role_user->role_id = $role;
                    $role_user->updated_by = Auth::user()->id;
                    $role_user->save();
                }
            }
            //----------------- Save Departments --------------------
            if($request->departments !=null)
            {
                foreach ($request->departments as $department) {
                    $department_user = new DepartmentUser();
                    $department_user->user_id = $user->id;
                    $department_user->department_id = $department;
                    $department_user->updated_by = Auth::user()->id;
                    $department_user->save();
                }
            }
            if($request->offices !=null)
            {
                foreach ($request->offices as $office) {
                    $office_user = new OfficeUser();
                    $office_user->user_id = $user->id;
                    $office_user->office_id = $office;
                    $office_user->updated_by = Auth::user()->id;
                    $office_user->save();
                }
            }
            return redirect()->route('admin.users.index');
        }


    }

    public function edit(User $user)
    {
        abort_unless(\Gate::allows('user_edit'), 403);
        $roles = Role::all()->pluck('title', 'id');
        $offices=Office::all()->pluck('name','id');
        $departments=Department::all()->pluck('name','id');
        $user->load('roles');
        return view('admin.users.edit', compact('roles', 'user','departments','offices'));
    }

    public function update( Request $request,User $user)
    {
        abort_unless(\Gate::allows('user_edit'), 403);
        $user->name=$request->name;
        $user->email=$request->email;
        if($request->password!=null)
        {
            $user->password= Hash::make($request->password);
        }
        $user->updated_by=Auth::user()->id;
        if($user->save())
        {
            DepartmentUser::where('user_id',$user->id)->delete();
            OfficeUser::where('user_id',$user->id)->delete();
            RoleUser::where('user_id',$user->id)->delete();

            if($request->roles !=null) {
                foreach ($request->roles as $role) {
                    $role_user = new RoleUser();
                    $role_user->user_id = $user->id;
                    $role_user->role_id = $role;
                    $role_user->updated_by = Auth::user()->id;
                    $role_user->save();
                }
            }
            //----------------- Save Departments --------------------
           if($request->departments !=null)
           {
               foreach ($request->departments as $department)
               {
                   $department_user=new DepartmentUser();
                   $department_user->user_id=$user->id;
                   $department_user->department_id=$department;
                   $department_user->updated_by=Auth::user()->id;
                   $department_user->save();
               }
           }
           if($request->offices !=null)
            {
                foreach ($request->offices as $office) {
                    $office_user = new OfficeUser();
                    $office_user->user_id = $user->id;
                    $office_user->office_id = $office;
                    $office_user->updated_by = Auth::user()->id;
                    $office_user->save();
                }
            }


            return redirect()->route('admin.users.index');
        }
    }

    public function show(User $user)
    {
        abort_unless(\Gate::allows('user_show'), 403);
        $user->load('roles');
        return view('admin.users.show', compact('user'));
    }

    public function destroy(User $user)
    {
        abort_unless(\Gate::allows('user_delete'), 403);
        $user->delete();
        DepartmentUser::where('user_id',$user->id)->delete();
        OfficeUser::where('user_id',$user->id)->delete();
        RoleUser::where('user_id',$user->id)->delete();
        return back();
    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
//        User::whereIn('id', request('ids'))->delete();

//        return response(null, 204);
    }
}
