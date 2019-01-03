@extends('template.master')
    @section('title', 'Edit Order')

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
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Edit Order
                    </div>
                    <div class="panel-body">
                        @foreach($order as $cucian)
                        <form class="form-horizontal row-border" action="{{ url('/editorder') }}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id_order" value="{{$cucian->id}}">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Nomor</label>
                                    <div class="col-md-8">
                                        <input type="number" name="id" placeholder=" " class="form-control" value="{{ (isset($cucian->id) && $cucian->id != '0') ? $cucian->id : '' }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Jenis Cucian</label>
                                    <div class="col-md-4">
                                        <select name="id_cucian" id="id_cucian" class="form-control">
                                            <option value="tidak" {{ (isset($cucian->id_cucian) && $cucian->id_cucian == 'tidak') ? 'selected' : '' }}>Pakaian</option>
                                            <option value="iya" {{ (isset($cucian->id_cucian) && $cucian->id_cucian == 'iya') ? 'selected' : '' }}>Boneka</option>
                                            <option value="iya" {{ (isset($cucian->id_cucian) && $cucian->id_cucian == 'iya') ? 'selected' : '' }}>Karpet</option>
                                            <option value="iya" {{ (isset($cucian->id_cucian) && $cucian->id_cucian == 'iya') ? 'selected' : '' }}>Sepatu</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group {{ $errors->has('harga') ? 'has-error' : '' }}">
                                    <label class="col-md-4 control-label">Harga</label>
                                    <div class="col-md-8">
                                        <input type="number" name="harga" class="form-control" value="{{ isset($cucian->harga) ? $cucian->harga : '' }}">
                                        @if($errors->has('harga'))
                                        <p class="help-block">{{ $errors->first('harga') }}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('diskon') ? 'has-error' : '' }}">
                                    <label class="col-md-4 control-label">Diskon</label>
                                    <div class="col-md-8">
                                        <input type="number" name="diskon" class="form-control" value="{{ isset($cucian->diskon) ? $cucian->diskon : '' }}">
                                        @if($errors->has('diskon'))
                                        <p class="help-block">{{ $errors->first('diskon') }}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('harga_total') ? 'has-error' : '' }}">
                                    <label class="col-md-4 control-label">Harga Total</label>
                                    <div class="col-md-4">
                                        <input type="number" name="harga_total" class="form-control" placeholder=" " value="{{ isset($cucian->harga_total) ? $cucian->harga_total : '' }}">
                                        @if($errors->has('harga_total'))
                                        <p class="help-block">{{ $errors->first('harga_total') }}</p>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group {{ $errors->has('created_at') ? 'has-error' : '' }}">
                                    <label class="col-md-4 control-label">Tanggal</label>
                                    <div class="col-md-4">
                                        <input type="number" name="created_at" class="form-control" placeholder=" hari " value="{{ isset($cucian->created_at) ? $cucian->harga : '' }}">
                                        @if($errors->has('created_at'))
                                        <p class="help-block">{{ $errors->first('created_at') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ url()->previous() }}" class="btn btn-danger">Batal</a>
                                    <button type="reset" class="btn btn-default">Reset</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                    
                        @endforeach
                    </div>
                </div>
            </div>
        </div><!--/.row-->


        <div class="row">
            {{-- Footer --}}
            @include('partials._footer')
            {{-- End Footer --}}
        </div>
    </div>
    @endsection
