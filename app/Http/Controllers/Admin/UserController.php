<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User; 
use DB,Hash;

class UserController extends Controller
{
    public function index()
    {
    	$users = User::orderBy('id', 'DESC')->get();
    	foreach ($users as $key => $user) {
    		$user->gen_pass = DB::table('user_verifications')->select('token')->where('user_id', $user->id)->first();
    	}
    	
    	return view('backend.user.index', compact('users'));
    }

    public function create()
    {
    	return view('backend.user.create');
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            
          
        ]);
    	
        $name = $request->name;
        $email = $request->email;
        $verification_code = str_random(10);
        $password = $verification_code;
        $user = User::create(['name' => $name, 'email' => $email, 'password' => Hash::make($password), 'employee_id' => $request->employee_id]);

        //Generate verification code
        DB::table('user_verifications')->insert(['user_id'=>$user->id,'token'=>$verification_code]);

        return redirect()->action('Admin\UserController@index');

    }

    public function destroy($id)
    {
    	$user = User::findOrFail($id);
    	$user->delete();
    	return redirect()->back();
    }

    public function pass($id)
    {
        $pass = DB::table('user_verifications')->where('user_id', $id)->first();
        $pass->email = User::find($id)->email;
        return view('backend.user.password', compact('pass'));
    }
    
       public function edit($id)
    {
        $user = User::findOrFail($id);
        $users = User::orderBy('id', 'DESC')->get();

        return view('backend.user.edit', compact('user', 'users'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->fill($request->only('id', 'employee_id', 'name', 'email'));
        $user->save();
        return redirect()->action('Admin\UserController@index');
    }
}
