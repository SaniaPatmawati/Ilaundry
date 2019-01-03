@extends('template.master')
    @section('title', 'Edit Pelanggan')

    @section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
                <li class="active">Pelanggan</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Pelanggan</h1>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Edit Pelanggan
                        
                    </div>
                    <div class="panel-body">
                        @foreach($pelanggan as $pelanggan)
                       <form class="form-horizontal row-border" action="{{ url('/editpelanggan') }}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id_pelanggan" value="{{ $pelanggan->id }}">

    <div class="col-md-6">
         <div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
            <label class="col-md-4 control-label">Nama Pelanggan</label>
            <div class="col-md-8">
                <input type="text" name="nama" class="form-control" value="{{ isset($pelanggan->nama)? $pelanggan->nama : '' }}">
                @if($errors->has('nama'))
                <p class="help-block">{{ $errors->first('nama_pelanggan') }}</p>
                @endif
            </div>
        </div>

         <div class="form-group {{ $errors->has('no_hp') ? 'has-error' : '' }}">
            <label class="col-md-4 control-label">Nomor HP</label>
            <div class="col-md-8">
                <input type="text" name="no_hp" class="form-control" value="{{ isset($pelanggan->nama)? $pelanggan->no_hp : '' }}">
                @if($errors->has('no_hp'))
                <p class="help-block">{{ $errors->first('no_hp') }}</p>
                @endif
            </div>
        </div>
       
        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            <label class="col-md-4 control-label">Email</label>
            <div class="col-md-8">
                <input type="text" name="email" class="form-control" value="{{ isset($pelanggan->email)? $pelanggan->email : '' }}">
                @if($errors->has('email'))
                <p class="help-block">{{ $errors->first('email') }}</p>
                @endif
            </div>
        </div>

       <!--   <div class="form-group {{ $errors->has('tipe_member') ? 'has-error' : '' }}">
            <label class="col-md-4 control-label">Type Member</label>
            <div class="col-md-8">
                <input type="text" name="tipe_member" class="form-control" value="{{ isset($pelanggan->tipe_member)? $pelanggan->tipe_member : '' }}">
                @if($errors->has('tipe_member'))
                <p class="help-block">{{ $errors->first('tipe_member') }}</p>
                @endif
            </div>
        </div> -->

        <div class="form-group {{ $errors->has('alamat') ? 'has-error' : '' }}">
            <label class="col-md-4 control-label">Alamat</label>
            <div class="col-md-8">
                <input type="text" name="alamat" class="form-control" value="{{ isset($pelanggan->alamat)? $pelanggan->alamat : '' }}">
                @if($errors->has('alamat'))
                <p class="help-block">{{ $errors->first('alamat') }}</p>
                @endif
            </div>
        </div>

<!-- 
     -->

          <div class="form-group">
            <label class="col-md-4 control-label">Jenis Kelamin</label>
            <div class="col-md-4">
                <select name="jk" id="jk" class="form-control">
                    <option value="L" {{ (isset($pelanggan->id_pelanggan) && $pelanggan->id_pelanggan == 'tidak') ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ (isset($pelanggan->id_pelanggan) && $pelanggan->id_pelanggan == 'iya') ? 'selected' : '' }}>Perempuan</option>
                    
                </select>
            </div>
        </div>

        <div class="form-group {{ $errors->has('foto') ? 'has-error' : '' }}">
            <label class="col-md-4 control-label">Foto</label>
            <div class="col-md-8">
                <input type="text" name="foto" class="form-control" value="{{ isset($pelanggan->foto)? $pelanggan->foto : '' }}">
                @if($errors->has('foto'))
                <p class="help-block">{{ $errors->first('foto') }}</p>
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
