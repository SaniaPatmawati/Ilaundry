<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class PagesController extends Controller
{
    //fungsi menuju halaman pages.index
    public function index()
    {
        if (Session::has('login')) {
          return view('pages.index');
        }
      return redirect('/login')->with('login',false);
    }

     public function order()
    {
    	$data = DB::table('order')->get();
          return view('pages.order')->with('Order',$data);
    }


     public function pelanggan()
    {
    	$data = DB::table('pelanggan')->get();
        return view('pages.pelanggan')->with('pelanggan',$data);;
    }

      public function lokasi	()
    {
       $data = DB::table('lokasi')->get();
       return view('pages.lokasi')->with('lokasi',$data);;
    }
     public function user()
    {
    	$data = DB::table('users')->get();
        return view('pages.users')->with('users', $data);
    }

     public function logout()
    {
        return view('pages.logout');
    }
}
