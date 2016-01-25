<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\Role;
use App\Permission;
use App\RoleUser;
use App\PermissionRole;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Gate;
use Redirect;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles=Role::all();

        return view('user.roles',['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('user.role.create'))
        {
            return Redirect::back();
        }
        else
        {
            //$permissions=Permission::all();
            $group = DB::table('permissions')->groupBy('module_group')->get();

            return view('user.addrole',['group' => $group]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Gate::denies('user.role.create'))
        {
            return Redirect::back();
        }
        else
        {

            $input=$request->all();
            $id=Role::create($input)->id;

            DB::table('permission_role')->where('role_id', '=', $id)->delete();


            foreach($input['permission_id'] as $permissionid)
            {
                $permissionrole = new PermissionRole;
                $permissionrole->permission_id = $permissionid;
                $permissionrole->role_id = $id;
                $permissionrole->save();
            }

            return redirect('/role');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Gate::denies('user.role.delete'))
        {
            return Redirect::back();
        }
        else
        {
            DB::table('roles')->where('id', '=', $id)->delete();
        }

        return redirect('/role');
    }
}
