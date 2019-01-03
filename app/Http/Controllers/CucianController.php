<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cucian;
use DB;

class CucianController extends Controller
{

    public function index()
    {
        // $cucian = Cucian::orderBy('created_at', 'DESC')->get();
      $cucian = DB::table('cucian')
              ->join('pelanggan','cucian.id_pelanggan','=','pelanggan.id')
              ->join('order','cucian.id_cucian','=','order.harga')
              ->select('cucian.*', 'pelanggan.nama', 'order.id_cucian')
              ->get();

        return view('cucian.index', compact('cucian'));
        // return $cucian;
    }

    public function create()
    {
      $pelanggan = DB::table('pelanggan')->get();
      $order = DB::table('order')->get();

        return view('cucian.create')->with(['pelanggan'=>$pelanggan,'order'=>$order]);
    }

    public function validateRules($request)
    {
        $this->validate($request, $this->rules, $this->customMessage);
    }

    public function store(Request $request)
    {
        // $this->validateRules($request);

        DB::table('cucian')->insert([
            'id_pelanggan'=>$request->id_pelanggan,
            'id_cucian'=>$request->id_order,
            'kurir'=>$request->kurir,
            'berat'=>$request->berat
        ]);
        return redirect('/cucian')->with('success', 'Data berhasil ditambah');
    }

    public function delete(Request $request)
    {
      $cucian = Cucian::find($request->id);
      $cucian->delete();
    }

    public function edit($id)
    {
      $cucian = Cucian::findOrFail($id);

      return view('cucian.edit', compact('cucian'));
    }

    public function show($id)
    {
      $cucian = Cucian::find($id);
      return view('cucian.show', compact('cucian'));
    }







    private $rules = [
      'nama_pelanggan'            => 'required',
      'berat'                     => 'required',
      'id_pelanggan'              => 'sometimes'
    ];

    private $customMessage = [
      'nama_pelanggan.required'   => 'Nama pelanggan tidak boleh kosong',
      'berat.required'            => 'Berat tidak boleh kosong',
    ];
}
