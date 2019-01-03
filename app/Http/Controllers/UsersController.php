<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UsersController extends Controller
{
     public function create()
    {
        return view('users.create');
    }

     public function simpan(Request $request)
    {
    	$simpan = DB::table('users')
    	->insert([
    		'nama'=>$request->nama,
    		'username'=>$request->username,
    		'email'=>$request->email,
    		'password'=>$request->password,
    		'no_hp'=>$request->no_hp,
    		'role'=>$request->role,
    		'jk'=>$request->jk,
    		'remember_token'=>$request->remember_token]);
    		
    	// return dd($simpan);
    	return redirect('user');
    }

     public function detail($id)
    {
         
    }

    public function edit($id)
    {
        $data = DB::table('users')->where('id', $id)->get();

        return view('users.edit')->with('users', $data);
    }

    public function editusers(Request $request)
    {
        $simpan = DB::table('users')
        ->update([
            'nama'=>$request->nama,
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>$request->password,
            'no_hp'=>$request->no_hp,
            'role'=>$request->role,
            'jk'=>$request->jk,
            'remember_token'=>$request->remember_token,
            'updated_at'=>DB::raw('now()')

        ]);

        // return dd($simpan);
        return redirect('user');
    }

    public function hapus($id)
    {
        $hapus = DB::table('users')->where('id', $id)->delete();

        return redirect('user');
    }

}
