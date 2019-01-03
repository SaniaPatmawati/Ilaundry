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

<form class="form-horizontal row-border" action="{{ url('/cucian') }}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-4 control-label">ID Pelanggan</label>
            <div class="col-md-8">
                <select name="id_pelanggan" class="form-control">
                    <option>- Pelanggan -</option>
                    @foreach($pelanggan as $data)
                    <option value="{{$data->id}}">{{$data->nama}}</option>
                    @endforeach
                </select>
                <!-- <input type="number" name="id_pelanggan" placeholder="isi jika punya kartu member" class="form-control" value="{{ (isset($cucian->id_pelanggan) && $cucian->id_pelanggan != '0') ? $cucian->id_pelanggan : '' }}"> -->
            </div>
        </div>
        <div class="form-group {{ $errors->has('nama_pelanggan') ? 'has-error' : '' }}">
            <label class="col-md-4 control-label">Cucian</label>
            <div class="col-md-8">
                <select name="id_order" class="form-control" id="order">
                    <option>- order -</option>
                    @foreach($order as $data)
                    <option value="{{$data->harga}}">{{$data->id_cucian}}>{{$data->harga}}</option>
                    @endforeach
                </select>
                <!-- <input type="text" name="nama_pelanggan" class="form-control" value="{{ isset($cucian->nama_pelanggan) ? $cucian->nama_pelanggan : '' }}"> -->
                
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('berat') ? 'has-error' : '' }}">
            <label class="col-md-4 control-label">Berat Cucian</label>
            <div class="col-md-4">
                <input type="number" name="berat" class="form-control" placeholder="KG" value="{{ isset($cucian->berat) ? $cucian->berat : '' }}">
                @if($errors->has('berat'))
                <p class="help-block">{{ $errors->first('berat') }}</p>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label">Kurir</label>
            <div class="col-md-4">
                <select name="kurir" id="kurir" class="form-control">
                    <option value="tidak" {{ (isset($cucian->kurir) && $cucian->kurir == 'tidak') ? 'selected' : '' }}>Tidak</option>
                    <option value="iya" {{ (isset($cucian->kurir) && $cucian->kurir == 'iya') ? 'selected' : '' }}>Iya</option>
                </select>
            </div>
        </div>
    </div>
    <div class="divider"></div>
    <hr class="maps-divider">
    <div class="map-wrapper">
      <div id="maps"></div>
    </div>
    <br>
    <button type="button" class="btn-add-tip btn btn-sm btn-info"><i class="glyphicon glyphicon-map-marker"></i></button>
    <hr>
    <div class="col-md-6">
        <table>
            <tr>
                <th>Harga : </th>
                <td>&nbsp; Rp. <span value='harga' class="harga">0</span>,-</td>
            </tr>
            <tr>
                <th>Kurir : </th>
                <td>&nbsp; Rp. <span value='kurir' class="kurir">0</span>,-</td>
            </tr>
            <tr>
                <th>Diskon : </th>
                <td>&nbsp; Rp. 0,-</td>
            </tr>
            <tr>
                <th>Total Harga : </th>
                <td>&nbsp; Rp. <span value='total_harga' class="total_harga" id="total_harga">0</span>,-</td>
            </tr>
        </table>
    </div>
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


        //tampilkan maps jika butuh kurir
        $('#kurir').on('change', function() {
            if($(this).val() == 'iya') {
                $('.maps-divider').show('slow', 'easeInOutCirc');
                $('#maps').show('slow', 'easeInOutCirc');
                $('.btn-add-tip').show();
                //fungsi get lokasi yg sudah ditentukan di database
                getLokasi();
                var harga = document.getElementById('total_harga').innerHTML;
                $('.kurir').text('7,000');
                $('.total_harga').text(parseInt(harga)+7000);

            } else {
                $('.maps-divider').hide('slow', 'easeInOutCirc');
                $('#maps').hide('slow', 'easeOutBounce');
                $('.kurir').text('0');
                $('.btn-add-tip').hide();
            }
        });

        //munculkan harga cucian
        $('input[name="berat"]').on('keyup', function() {
            var nama    = 'cucian';
            var qty     = $(this).val();
            var cucian  = document.getElementById('order').value;
            var harga   = cucian * qty;
            //jalankan ajax get harga
            // getHarga(nama, qty);
            $('.harga').text(harga);
            $('.total_harga').text(harga);
        });

        $('.btn-add-tip').on('click', function() {
          addMarker();
        });
    });
</script>
@endsection
