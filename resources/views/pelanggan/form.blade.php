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

<form class="form-horizontal row-border" action="{{ url('/pelanggan') }}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
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


     <!--     <div class="form-group {{ $errors->has('latitude') ? 'has-error' : '' }}">
            <label class="col-md-4 control-label">Latitude</label>
            <div class="col-md-8">
                <input type="text" name="latitude" class="form-control" value="{{ isset($pelanggan->latitude)? $pelanggan->latitude : '' }}">
                @if($errors->has('latitude'))
                <p class="help-block">{{ $errors->first('latitude') }}</p>
                @endif
            </div>
        </div>


         <div class="form-group {{ $errors->has('longitude') ? 'has-error' : '' }}">
            <label class="col-md-4 control-label">Longitude</label>
            <div class="col-md-8">
                <input type="text" name="longitude" class="form-control" value="{{ isset($pelanggan->longitude)? $pelanggan->tipe_member : '' }}">
                @if($errors->has('longitude'))
                <p class="help-block">{{ $errors->first('longitude') }}</p>
                @endif
            </div>
        </div>
 -->
          <div class="form-group">
            <label class="col-md-4 control-label">Jenis Kelamin</label>
            <div class="col-md-4">
                <select name="jk" id="jk" class="form-control">
                    <option value="L" {{ (isset($pelanggan->id_pelanggan) && $pelanggan->id_pelanggan == 'tidak') ? 'selected' : '' }}>L</option>
                    <option value="P" {{ (isset($pelanggan->id_pelanggan) && $pelanggan->id_pelanggan == 'iya') ? 'selected' : '' }}>P</option>
                    
                </select>
            </div>
        </div>

  <!--       <div class="form-group {{ $errors->has('foto') ? 'has-error' : '' }}">
            <label class="col-md-4 control-label">Foto</label>
            <div class="col-md-8">
                <input type="text" name="foto" class="form-control" value="{{ isset($pelanggan->foto)? $pelanggan->foto : '' }}">
                @if($errors->has('foto'))
                <p class="help-block">{{ $errors->first('foto') }}</p>
                @endif
            </div>
        </div> -->
   
    <div class="col-md-6">
        <a href="{{ url()->previous() }}" class="btn btn-danger">Batal</a>
        <button type="reset" class="btn btn-default">Reset</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>

@section('scripts')
<script src="https://unpkg.com/leaflet@1.3.3/dist/leaflet.js"
integrity="sha512-tAGcCfR4Sc5ZP5ZoVz0quoZDYX5aCtEm/eu1KhSLj2c9eFrylXZknQYmxUssFaVJKvvc0dJQixhGjG2yXWiV9Q=="
crossorigin=""></script>
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
<script src="http://labs.easyblog.it/maps/leaflet-search/dist/leaflet-search.min.js"></script>
<script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('js/pelanggan.js') }}"></script>
<script>
    $(document).ready(function() {
        //inisiasi ajax headers
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN' : $('input[name="_token"]').attr('value')
            }
        });


        //tampilkan maps jika butuh id_pelanggan
        $('#id_pelanggan').on('change', function() {
            if($(this).val() == 'iya') {
                $('.maps-divider').show('slow', 'easeInOutCirc');
                $('#maps').show('slow', 'easeInOutCirc');
                $('.btn-add-tip').show();
                //fungsi get lokasi yg sudah ditentukan di database
                getLokasi();
                $('.id_pelanggan').text('7,000');
            } else {
                $('.maps-divider').hide('slow', 'easeInOutCirc');
                $('#maps').hide('slow', 'easeOutBounce');
                $('.id_pelanggan').text('0');
                $('.btn-add-tip').hide();
            }
        });

        //munculkan harga pelanggan
        $('input[name="harga"]').on('keyup', function() {
            var nama    = 'pelanggan';
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
