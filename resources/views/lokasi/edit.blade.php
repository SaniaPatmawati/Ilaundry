@extends('template.master')
    @section('title', 'Edit lokasi')

    @section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
                <li class="active">lokasi</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">lokasi</h1>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Edit lokasi
                    </div>
                    <div class="panel-body">

                         @foreach($lokasi as $cucian)
                                        <form class="form-horizontal row-border" action="{{ url('/lokasi') }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="col-md-6">
                         
                        <div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
                            <label class="col-md-4 control-label">Nama</label>
                            <div class="col-md-8">
                                <input type="text" name="nama" class="form-control" >
                                @if($errors->has('nama'))
                                <p class="help-block">{{ $errors->first('nama') }}</p>
                                @endif
                            </div>
                        </div>

                          <div class="form-group {{ $errors->has('latling') ? 'has-error' : '' }}">
                            <label class="col-md-4 control-label">Latling</label>
                            <div class="col-md-8">
                                <input type="text" name="latling" class="form-control" value="{{ isset($cucian->latling) ? $cucian->latling : '' }}">
                                @if($errors->has('latling'))
                                <p class="help-block">{{ $errors->first('latling') }}</p>
                                @endif
                            </div>
                        </div>   
<!-- 
                        <div class="form-group {{ $errors->has('created_at') ? 'has-error' : '' }}">
                            <label class="col-md-4 control-label">UPDATE</label>
                            <div class="col-md-4">
                                <input type="number" name="created_at" class="form-control" placeholder=" hari " value="{{ isset($cucian->updated_at) ? $cucian->harga : '' }}">
                                @if($errors->has('updated_at'))
                                <p class="help-block">{{ $errors->first('updated_at') }}</p>
                                @endif
                            </div>
                        </div> -->

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
