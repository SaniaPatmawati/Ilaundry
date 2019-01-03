<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class AuthController extends Controller
{
    public function getLogin()
    {
    	return view('login2')->with('login',false);
    }

    public function postLogin(Request $request)
    {
    	$login = DB::table('users')
    			->where([
    				'email'=>$request->email,
    				'password'=>$request->password	
    			]);

    	if ($login->exists()) {

    		Session::put('login', true);

    		return redirect('home');
    	}
    	// return dd();
    	// return 'test';
    }

    public function logout()
    {
    	Session::flush();

    	return redirect('login');
    }
 
    public function getRegister()
    {
    	return view('register');
    }

    public function postRegiter(Request $require)
    {
    	dd('Registration Ok');
    }
}
