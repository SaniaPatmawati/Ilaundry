@extends('template.master')
    @section('title', 'Detail Cucian')

    @section('styles')
      <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.3/dist/leaflet.css"
      integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
      crossorigin=""/>
      <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
      <link rel="stylesheet" href="{{ asset('css/leaflet-search.css') }}">
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
        <div class="panel panel-default">
          <div class="panel-heading">
            Detail Order
            <a href="#" class="btn btn-primary pull-right">Lihat Struk</a>
          </div>
          <div class="panel-body">
            <div class="col-md-6">
              <table class="table">
                <tbody><tr>
                  <th>Nama :</th>
                  <td>Sania</td>
                </tr>
                <tr>
                  <th>Berat Cucian :</th>
                  <td>1 KG</td>
                </tr>
                <tr>
                  <th>Kurir :</th>
                  <td>Tidak</td>
                </tr>
              </tbody></table>
              <h3>Jumlah</h3>
              <table class="table">
                <tbody><tr>
                  <th>Harga :</th>
                  <td></td>
                </tr>
                <tr>
                  <th>Kurir :</th>
                  <td></td>
                </tr>
                <tr>
                  <th>Diskon :</th>
                  <td></td>
                </tr>
                <tr>
                  <th>Total Harga :</th>
                  <td></td>
                </tr>
              </tbody></table>
              <br>
              <a href="http://localhost/halondry-master/public/cucian" class="btn btn-danger">Kembali</a>
                      </div>
                      <div class="col-md-6">
                        <div id="maps" style="width: 100%; height: 300px; position: relative;" class="leaflet-container leaflet-touch leaflet-fade-anim leaflet-grab leaflet-touch-drag leaflet-touch-zoom" tabindex="0"><div class="leaflet-pane leaflet-map-pane" style="transform: translate3d(24px, 0px, 0px);"><div class="leaflet-pane leaflet-tile-pane"><div class="leaflet-layer " style="z-index: 1; opacity: 1;"><div class="leaflet-tile-container leaflet-zoom-animated" style="z-index: 18; transform: translate3d(0px, 0px, 0px) scale(1);"><img alt="" role="presentation" src="http://c.tile.openstreetmap.org/10/511/340.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(61px, 18px, 0px); opacity: 1;"><img alt="" role="presentation" src="http://b.tile.openstreetmap.org/10/511/339.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(61px, -238px, 0px); opacity: 1;"><img alt="" role="presentation" src="http://b.tile.openstreetmap.org/10/510/340.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(-195px, 18px, 0px); opacity: 1;"><img alt="" role="presentation" src="http://a.tile.openstreetmap.org/10/512/340.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(317px, 18px, 0px); opacity: 1;"><img alt="" role="presentation" src="http://a.tile.openstreetmap.org/10/511/341.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(61px, 274px, 0px); opacity: 1;"><img alt="" role="presentation" src="http://a.tile.openstreetmap.org/10/510/339.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(-195px, -238px, 0px); opacity: 1;"><img alt="" role="presentation" src="http://c.tile.openstreetmap.org/10/512/339.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(317px, -238px, 0px); opacity: 1;"><img alt="" role="presentation" src="http://c.tile.openstreetmap.org/10/510/341.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(-195px, 274px, 0px); opacity: 1;"><img alt="" role="presentation" src="http://b.tile.openstreetmap.org/10/512/341.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(317px, 274px, 0px); opacity: 1;"></div></div></div><div class="leaflet-pane leaflet-shadow-pane"></div><div class="leaflet-pane leaflet-overlay-pane"></div><div class="leaflet-pane leaflet-marker-pane"></div><div class="leaflet-pane leaflet-tooltip-pane"></div><div class="leaflet-pane leaflet-popup-pane"></div><div class="leaflet-proxy leaflet-zoom-animated" style="transform: translate3d(131006px, 87172px, 0px) scale(512);"></div></div><div class="leaflet-control-container"><div class="leaflet-top leaflet-left"><div class="leaflet-control-zoom leaflet-bar leaflet-control"><a class="leaflet-control-zoom-in" href="#" title="Zoom in" role="button" aria-label="Zoom in">+</a><a class="leaflet-control-zoom-out" href="#" title="Zoom out" role="button" aria-label="Zoom out">−</a></div></div><div class="leaflet-top leaflet-right"></div><div class="leaflet-bottom leaflet-left"></div><div class="leaflet-bottom leaflet-right"><div class="leaflet-control-attribution leaflet-control"><a href="http://leafletjs.com" title="A JS library for interactive maps">Leaflet</a></div></div></div></div>
                          <ul class="timeline">
                            <li>
                              <div class="timeline-badge"><i class="glyphicon glyphicon-send"></i></div>
                              <div class="timeline-panel">
                                <div class="timeline-heading">
                                  <h4 class="timeline-title">Kurir sedang mengirim ke alamat</h4>
                                </div>
                                <div class="timeline-body">
                                  <p>Jl Ahmad Yani no 45 Subang. 19:00</p>
                                </div>
                              </div>
                            </li>
                            <li>
                              <div class="timeline-badge primary"><i class="glyphicon glyphicon-ok"></i></div>
                              <div class="timeline-panel">
                                <div class="timeline-heading">
                                  <h4 class="timeline-title">ilaundry sudah sampai</h4>
                                </div>
                                <div class="timeline-body">
                                  <p>struk no <a href="#">411544543</a> telah dibayar. 19.30</p>
                                </div>
                              </div>
                            </li>
                          </ul>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
      <script src="https://unpkg.com/leaflet@1.3.3/dist/leaflet.js"
      integrity="sha512-tAGcCfR4Sc5ZP5ZoVz0quoZDYX5aCtEm/eu1KhSLj2c9eFrylXZknQYmxUssFaVJKvvc0dJQixhGjG2yXWiV9Q=="
      crossorigin=""></script>
      <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
      <script type="text/javascript" src="{{ asset('js/function/maps.js') }}"></script>
      <script>
          $(document).ready(function() {
            var latlng = [51.505, -0.09];
            getMaps(latlng);
          });
      </script>
    @endsection
