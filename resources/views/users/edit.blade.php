@extends('template.master')
    @section('title', 'Edit Users')

    @section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
                <li class="active">Users</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Users</h1>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Edit Users
                    </div>
                    <div class="panel-body">
                      
                       <!-- form -->

 @foreach($users as $users)
<form class="form-horizontal row-border" action="{{ url('/edituser') }}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id" value="$users->id">
    <div class="col-md-6">

         <div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
            <label class="col-md-4 control-label">Nama </label>
            <div class="col-md-8">
                <input type="text" name="nama" class="form-control" value="{{ isset($users->nama)? $users->nama : '' }}">
                @if($errors->has('nama'))
                <p class="help-block">{{ $errors->first('nama') }}</p>
                @endif
            </div>
        </div>

          <div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
            <label class="col-md-4 control-label">Username</label>
            <div class="col-md-8">
                <input type="text" name="username" class="form-control" value="{{ isset($users->nama)? $users->username : '' }}">
                @if($errors->has('username'))
                <p class="help-block">{{ $errors->first('username') }}</p>
                @endif
            </div>
        </div>

         <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            <label class="col-md-4 control-label">Email</label>
            <div class="col-md-8">
                <input type="text" name="email" class="form-control" value="{{ isset($users->nama)? $users->email : '' }}">
                @if($errors->has('email'))
                <p class="help-block">{{ $errors->first('email') }}</p>
                @endif
            </div>
        </div>

         <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
            <label class="col-md-4 control-label">Password</label>
            <div class="col-md-8">
                <input type="text" name="password" class="form-control" value="{{ isset($users->nama)? $users->password : '' }}">
                @if($errors->has('password'))
                <p class="help-block">{{ $errors->first('password') }}</p>
                @endif
            </div>
        </div>

         <div class="form-group {{ $errors->has('no_hp') ? 'has-error' : '' }}">
            <label class="col-md-4 control-label">Nomor HP</label>
            <div class="col-md-8">
                <input type="number" name="no_hp" class="form-control" value="{{ isset($users->no_hp)? $users->no_hp : '' }}">
                @if($errors->has('no_hp'))
                <p class="help-block">{{ $errors->first('no_hp') }}</p>
                @endif
            </div>
        </div>

          <div class="form-group {{ $errors->has('role') ? 'has-error' : '' }}">
            <label class="col-md-4 control-label">Role</label>
            <div class="col-md-8">
                <input type="text" name="role" class="form-control">
                @if($errors->has('role'))
                <p class="help-block">{{ $errors->first('role') }}</p>
                @endif
            </div>
        </div>

          <div class="form-group">
            <label class="col-md-4 control-label">Jenis Kelamin</label>
            <div class="col-md-4">
                <select name="jk" id="jk" class="form-control">
                    <option value="Laki-laki" {{ (isset($users->id_users) && $users->id_users == 'tidak') ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ (isset($users->id_users) && $users->id_users == 'iya') ? 'selected' : '' }}>Perempuan</option>
                    
                </select>
            </div>
        </div

 
             <div>
                 <div class="col-md-6">
                    <br>
                <a href="{{ url()->previous() }}" class="btn btn-danger">Batal</a>
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
          </div>              
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
