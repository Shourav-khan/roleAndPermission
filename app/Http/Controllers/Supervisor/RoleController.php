<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {

        $roles = Role::whereNotIn('name', ['supervisor'])->get();

        return view('Supervisor.Role.index',compact('roles'));
    }

    public function roleCreate()
    {
        return view('Supervisor.Role.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required'
        ]);

        Role::create($request->all());
        $userId = Auth::id();

        return redirect()->route('show.r.p',$userId)
            ->with('success','Role Added Successfully');

    }


    public function showEdit(Role $role)
    {

        $permissions = Permission::all();
        return view('Supervisor.Role.edit',compact('role','permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name'=>'required'
        ]);

        $role->update($request->all());

        return redirect()->route('supervisor.role')->with('success','Role Edited Successfully');

    }


    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('supervisor.role')
            ->with('no','Delete Successfully');
    }

    public function givePermission(Request $request, Role $role)
    {

       if ($role->hasPermissionTo($request->permission)){
           return redirect()->back()->with('success','Assign Successfully');
       }
        $role->givePermissionTo($request->permission);
        return redirect()->back()->with('succes','Added');
    }

    public function revokePermission(Permission $permission,Role $role)
    {
        if ($role->hasPermissionTo($permission)) {
            $role->revokePermissionTo($permission);
            return redirect()->back()->with('no', 'Delete Successfully');
        }
        return back()->with('no','Delete Successfully');
    }

}
