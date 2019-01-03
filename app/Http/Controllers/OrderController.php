<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class OrderController extends Controller
{
     public function create()
    {
        return view('order.create');
    }

    public function simpan(Request $request)
    {
    	$simpan = DB::table('order')
    	->insert([
    		'id_cucian'=>$request->id,
    		'harga'=>$request->harga,
    		'diskon'=>$request->diskon,
    		'harga_total'=>$request->harga_total
    	]);

    	return redirect('order');
    }

    public function detail($id)
    {
         
    }

    public function edit($id)
    {
        $data = DB::table('order')->where('id', $id)->get();

        return view('order.edit')->with('order', $data);
    }

    public function editorder(Request $request)
    {
        $simpan = DB::table('order')->where('id', $request->id_order)
        ->update([
            'id_cucian'=>$request->id,
            'harga'=>$request->harga,
            'diskon'=>$request->diskon,
            'harga_total'=>$request->harga_total,
            'updated_at'=>DB::raw('now()')
        ]);

        // return dd($simpan);
        return redirect('order');
    }

    public function hapus($id)
    {
        $hapus = DB::table('order')->where('id', $id)->delete();

        return redirect('order');
    }
}
