<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lokasi;
use DB;

class LokasiController extends Controller
{
    public function getLokasi()
    {
        $kantor = Lokasi::where('nama', '=', 'kantor')->get();

        return response()->json(['kantor' => $kantor]);
    }

     public function create()
    {
        return view('lokasi.create');
    }

      public function simpan(Request $request)
    {
    	$simpan = DB::table('lokasi')
    	->insert([
    		'nama'=>$request->nama,
    		'latlng'=>$request->latling
    	]);

    	return redirect('lokasi');
    }

    // aksi

      public function detail($id)
    {
         
    }

    public function edit($id)
    {
        $data = DB::table('lokasi')->where('id', $id)->get();

        return view('lokasi.edit')->with('lokasi', $data);
    }

    public function editlokasi(Request $request)
    {
        $simpan = DB::table('order')->where('id', $request->id_lokasi)
        ->update([
            'nama'=>$request->nama,
            'latlng'=>$request->latlng,
            'updated_at'=>DB::raw('now()')
        ]);

        // return dd($simpan);
        return redirect('lokasi');
    }

    public function hapus($id)
    {
        $hapus = DB::table('lokasi')->where('id', $id)->delete();

        return redirect('lokasi');
    }
}
