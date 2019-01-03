@extends('template.master')
    @section('title', 'Menu Utama')

    @section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
                <li class="active">Menu Utama</li>
            </ol>
        </div><!--/.row-->


 <div id="wrapper">
    <marquee behavior="scroll" direction="left">
        <a href="http://www.dumetschool.com/"><span><h1>I-LAUNDRY</span></a>
    </marquee>
    <marquee  behavior="scroll" direction="up">
        THE BEST LAUNDRY IN THE WORLD
   <!--  </marquee>
    <marquee behavior="scroll" direction="left">
    </marquee> -->
</div>



        <div class="panel panel-container">
            <div class="row">
                <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                    <div class="panel panel-teal panel-widget border-right">
                         <img src="images/acuk.jpg  ">
                </div>
                    </div>
                <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                    <div class="panel panel-blue panel-widget border-right">
                         <img src="images/sepatu.png" width="250">
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                    <div class="panel panel-orange panel-widget border-right">
                         <img src="images/boneka.png" width="300">
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                    <div class="panel panel-red panel-widget ">
                        <img src="images/karpet.png" width="250">
                    </div>
                </div>
            </div><!-- /.row  -->
        </div>
        
	</script>
    @endsection
