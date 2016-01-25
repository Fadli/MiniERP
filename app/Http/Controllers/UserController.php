<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\Role;
use App\RoleUser;
use App\permission;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Gate;
use Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 protected $rules =[
			'name' => ['required','min:5'],
			'email' => ['required','email','unique:users'],
			'password' => ['required','min:6'],
	 ];
	 
	protected $roles_update =[
			'name' => ['required','min:5'],
			'email' => ['required','email'],
	 ];
	 
	 
    public function index()
    {
        $users = User::all();
        return view('user.users',['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		if(Gate::denies('user.create'))
		{
			return Redirect::back();
		}
		else
		{
			 $roles= Role::all();
		     return view('user.adduser', ['roles'=> $roles]);
			
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
        if(Gate::denies('user.create'))
        {
            return Redirect::back();
        }
        else
        {
            //validation
    		$this->validate($request, $this->rules);

            $input=$request->all();
            $input['password'] = bcrypt($input['password']);
            $id=User::create($input)->id;

            $RoleUser = new RoleUser;
            $RoleUser->role_id = $input['role_id'];
            $RoleUser->user_id = $id;
            $RoleUser->save();

            return redirect('/user');
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
       $user=User::find($id);
       $roles= Role::all();
		
       return view('user.show',['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		if(Gate::denies('user.edit'))
		{
			return Redirect::back();
		}
		else
		{
			$user=User::find($id);
			$roles=Role::all();
		
			return view('user.edit',['user' => $user,'roles' => $roles]);
		}
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
       if(Gate::denies('user.edit'))
        {
            return Redirect::back();
        }
        else
        {
           $this->validate($request, $this->roles_update);
    	   
    	   $input=$request->all();
           $user=User::find($id);
    	   $user->name	= $input['name'];
    	   $user->email = $input['email'];
    	   $user->save();

           DB::table('role_user')->where('user_id', '=', $id)->delete();

           $RoleUser = new RoleUser;
            $RoleUser->role_id = $input['role_id'];
            $RoleUser->user_id = $id;
            $RoleUser->save();


            return redirect('/user');
        }
	   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Gate::denies('user.delete'))
        {
            return Redirect::back();
        }
        else
        {
            DB::table('users')->where('id', '=', $id)->delete();
        }

        return redirect('/user');
    }

    

}
