<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PelangganController extends Controller
{
     public function create()
    {
        return view('pelanggan.create');
    }

     public function simpan(Request $request)
    {
    	$simpan = DB::table('pelanggan')
    	->insert([
    		'nama'=>$request->nama,
    		'no_hp'=>$request->no_hp,
    		'email'=>$request->email,
    		'tipe_member'=>$request->tipe_member,
    		'alamat'=>$request->alamat,
    		'latitude'=>$request->latitude,
    		'longitude'=>$request->longitude,
    		'jk'=>$request->jk,
    		'foto'=>$request->foto

    	]);
    	// return dd($simpan);
    	return redirect('pelanggan ');
    }

     public function detail($id)
    {
         
    }

    public function edit($id)
    {
        $data = DB::table('pelanggan')->where('id', $id)->get();

        return view('pelanggan.edit')->with('pelanggan', $data);
    }

    public function editpelanggan(Request $request)
    {
        $simpan = DB::table('pelanggan')->where('id', $request->id_pelanggan)
        ->update([
            'nama'=>$request->nama,
            'no_hp'=>$request->no_hp,
            'email'=>$request->email,
            'tipe_member'=>$request->tipe_member,
            'alamat'=>$request->alamat,
            'latitude'=>$request->latitude,
            'longitude'=>$request->longitude,
            'jk'=>$request->jk,
            'foto'=>$request->foto,
            'updated_at'=>DB::raw('now()')
        ]);

        // return dd($simpan);
        return redirect('pelanggan');
    }

    public function hapus($id)
    {
        $hapus = DB::table('pelanggan')->where('id', $id)->delete();

        return redirect('pelanggan');
    }


}
