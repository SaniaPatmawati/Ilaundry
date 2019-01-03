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


     
        <div class="form-group {{ $errors->has('created_at') ? 'has-error' : '' }}">
            <label class="col-md-4 control-label">Tanggal</label>
            <div class="col-md-4">
                <input type="number" name="created_at" class="form-control" placeholder=" hari " value="{{ isset($cucian->created_at) ? $cucian->harga : '' }}">
                @if($errors->has('created_at'))
                <p class="help-block">{{ $errors->first('created_at') }}</p>
                @endif
            </div>
        </div>

    <!--     <div class="form-group {{ $errors->has('created_at') ? 'has-error' : '' }}">
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

@section('scripts')
<script src="https://unpkg.com/leaflet@1.3.3/dist/leaflet.js"
integrity="sha512-tAGcCfR4Sc5ZP5ZoVz0quoZDYX5aCtEm/eu1KhSLj2c9eFrylXZknQYmxUssFaVJKvvc0dJQixhGjG2yXWiV9Q=="
crossorigin=""></script>
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
<script src="http://labs.easyblog.it/maps/leaflet-search/dist/leaflet-search.min.js"></script>
<script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('js/cucian.js') }}"></script>
<script>
    $(document).ready(function() {
        //inisiasi ajax headers
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN' : $('input[name="_token"]').attr('value')
            }
        });


        //tampilkan maps jika butuh id_cucian
        $('#id_cucian').on('change', function() {
            if($(this).val() == 'iya') {
                $('.maps-divider').show('slow', 'easeInOutCirc');
                $('#maps').show('slow', 'easeInOutCirc');
                $('.btn-add-tip').show();
                //fungsi get lokasi yg sudah ditentukan di database
                getLokasi();
                $('.id_cucian').text('7,000');
            } else {
                $('.maps-divider').hide('slow', 'easeInOutCirc');
                $('#maps').hide('slow', 'easeOutBounce');
                $('.id_cucian').text('0');
                $('.btn-add-tip').hide();
            }
        });

        //munculkan harga cucian
        $('input[name="harga"]').on('keyup', function() {
            var nama    = 'cucian';
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
