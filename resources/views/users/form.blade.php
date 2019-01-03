
@section('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.3/dist/leaflet.css"
integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
crossorigin=""/>
<link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
<link rel="stylesheet" href="{{ asset('css/leaflet-search.css') }}">

<style>
  #maps {
    width:100%;
    height:400px;
    display:none;
  }
  .btn-add-tip {
    display: none;
  }
  .maps-divider {
    display: none;
  }
</style>
@endsection

<form class="form-horizontal row-border" action="{{ url('/users') }}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
        <!-- 
          <div class="form-group {{ $errors->has('role') ? 'has-error' : '' }}">
            <label class="col-md-4 control-label">Role</label>
            <div class="col-md-8">
                <input type="text" name="role" class="form-control">
                @if($errors->has('role'))
                <p class="help-block">{{ $errors->first('role') }}</p>
                @endif
            </div>
        </div> -->

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

@section('scripts')
<script src="https://unpkg.com/leaflet@1.3.3/dist/leaflet.js"
integrity="sha512-tAGcCfR4Sc5ZP5ZoVz0quoZDYX5aCtEm/eu1KhSLj2c9eFrylXZknQYmxUssFaVJKvvc0dJQixhGjG2yXWiV9Q=="
crossorigin=""></script>
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
<script src="http://labs.easyblog.it/maps/leaflet-search/dist/leaflet-search.min.js"></script>
<script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('js/users.js') }}"></script>
<script>
    $(document).ready(function() {
        //inisiasi ajax headers
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN' : $('input[name="_token"]').attr('value')
            }
        });


        //tampilkan maps jika butuh id_users
        $('#id_users').on('change', function() {
            if($(this).val() == 'iya') {
                $('.maps-divider').show('slow', 'easeInOutCirc');
                $('#maps').show('slow', 'easeInOutCirc');
                $('.btn-add-tip').show();
                //fungsi get lokasi yg sudah ditentukan di database
                getLokasi();
                $('.id_users').text('7,000');
            } else {
                $('.maps-divider').hide('slow', 'easeInOutCirc');
                $('#maps').hide('slow', 'easeOutBounce');
                $('.id_users').text('0');
                $('.btn-add-tip').hide();
            }
        });

        //munculkan harga users
        $('input[name="harga"]').on('keyup', function() {
            var nama    = 'users';
            var qty     = $(this).val();
            //jalankan ajax get harga
            getHarga(nama, qty);
        });

        $('.btn-add-tip').on('click', function() {
          addMarker();
        });
    });
</script>
@endsection
