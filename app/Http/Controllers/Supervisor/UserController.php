<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {


        $users = User::all();
        return view('Supervisor.User.index',compact('users'));
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request,User $user)
    {


        if ($user->assignRole($request->role)){
            return redirect()->back()->with('success','Role Added Successfully');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(User $user)
    {

        $permissions = Permission::all();
        $roles = Role::all();
        return view('Supervisor.User.role',compact('user','roles','permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->back()->with('no','User Delete Successfully');
    }

    public function revokeRole(User $user, Role $role)
    {

        if ($user->removeRole($role)){
            return redirect()->back()->with('no','User Delete Successfully');
        }
    }

    public function assignPermission(Request $request, User $user)
    {
     if ( $user->givePermissionTo($request->permission)){
         return redirect()->back()->with('success','Role Added Successfully');
     }

    }

    public function revokePermission(Permission $permission,User $user )
    {

        if ($user->revokePermissionTo($permission)){
            return redirect()->back()->with('no','Permission delete successfully');
        }
    }

}
