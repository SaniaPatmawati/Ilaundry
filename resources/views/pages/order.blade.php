@extends('template.master')
    @section('title', 'Order')

    @section('styles')
      <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
    @endsection

    @section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
                <li class="active">Order</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Order</h1>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-md-12">
              @if(Session::has('success'))
              <div class="alert bg-success" role="alert">
                <em class="fa fa-lg fa-check">&nbsp;</em>
                {{ Session::get('success') }} <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a>
              </div>
              @endif
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Data Order
                        <a href="{{ url('/Order/create') }}" class="btn btn-primary pull-right">Tambah Order</a>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Jenis Cucian</th>
                                    <th>Harga</th>
                                    <th>Diskon</th>
                                    <th>Harga Total</th>
                                    <th>Created By</th>
                                    <th>Updated By</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($Order as $i => $data)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $data->id_cucian}}</td>
                                    <td>{{ $data->harga }} </td>
                                    <td>{{ $data->diskon }} </td>
                                    <td>{{ $data->harga_total }} </td>
                                    <td>{{ $data->created_at }} </td>
                                    <td>{{ $data->updated_at}}</td>
                                    <td>
                                        <a href="{{ url('/editorder/'.$data->id.'') }}" class="btn btn-sm btn-warning">Edit</a>
                                        <a href="{{url('/hapusorder/'.$data->id)}}" class="btn btn-del btn-sm btn-danger">Hapus</a>
                                    </td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!--/.row-->


        <div class="row">
            <!-- Footer -->
            @include('partials._footer')
            <!-- End Footer -->
        </div>
    </div>
    @endsection

    
