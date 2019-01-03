<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
        <div class="profile-userpic">
            <img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
        </div>
        <div class="profile-usertitle">
            <div class="profile-usertitle-name">Admin</div>
            <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="divider"></div>
    @if(Request::is('cucian'))
    <form role="search">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Cari">
        </div>
    </form>
    @endif
    <ul class="nav menu">
        <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ url('/') }}"><em class="fa fa-dashboard">&nbsp;</em> Menu Utama</a></li>
        <li class="{{ (Request::is('cucian') || Request::is('cucian/create') || Request::is('cucian/*/edit') || Request::is('cucian/*')) ? 'active' : '' }}"><a href="{{ url('/cucian') }}"><em class="fa fa-calendar">&nbsp;</em> Cucian</a></li>
        <li><a href="{{url('order')}}"><em class="fa fa-bar-chart">&nbsp;</em> Order</a></li>
        <li><a href="{{url('pelanggan')}}"><em class="fa fa-toggle-off">&nbsp;</em> Pelanggan</a></li>
        <li><a href="{{url('lokasi')}}"><em class="fa fa-clone">&nbsp;</em>Lokasi</a></li>
        <li><a href="{{url('user')}}"><em class="fa fa-clone">&nbsp;</em>User</a></li>
        <li><a href="{{url('logout')}}"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
    </ul>
</div><!--/.sidebar-->
