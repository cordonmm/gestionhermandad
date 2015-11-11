<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <!-- Title and other stuffs -->
    <title>
        @section('title')
            Gestión Hdad
        @show
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    @section('meta_keywords')
        <meta name="keywords" content="your, awesome, keywords, here" />
    @show
    @section('meta_author')
        <meta name="author" content="10Code" />
    @show
    @section('meta_description')
        <meta name="description" content="Hermandad del Museo - Sevilla | Plaza del Museo, 10, 41001 Sevilla | 954 226 710" />
        @show
        <!-- Stylesheets -->
        <link href="{{ asset('template/css/bootstrap.css')}}" rel="stylesheet">
        <!-- Font awesome icon -->
        <link rel="stylesheet" href="{{ asset('template/css/font-awesome.min.css')}}">
        <!-- jQuery UI -->
        <link rel="stylesheet" href="{{ asset('template/css/jquery-ui.css')}}">
        <!-- Calendar -->
        <link rel="stylesheet" href="{{ asset('template/css/fullcalendar.css')}}">
        <!-- prettyPhoto -->
        <link rel="stylesheet" href="{{ asset('template/css/prettyPhoto.css')}}">
        <!-- Star rating -->
        <link rel="stylesheet" href="{{ asset('template/css/rateit.css')}}">
        <!-- Date picker -->
        <link rel="stylesheet" href="{{ asset('template/css/bootstrap-datetimepicker.min.css')}}">
        <!-- CLEditor -->
        <link rel="stylesheet" href="{{ asset('template/css/jquery.cleditor.css')}}">
        <!-- Data tables -->
        <link rel="stylesheet" href="{{ asset('template/css/jquery.dataTables.css')}}">
        <!-- Bootstrap toggle -->
        <link rel="stylesheet" href="{{ asset('template/css/jquery.onoff.css')}}">
        <!-- Main stylesheet -->
        <link href="{{ asset('template/css/style.css')}}" rel="stylesheet">
        <!-- Widgets stylesheet -->
        <link href="{{ asset('template/css/widgets.css')}}" rel="stylesheet">

        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/blitzer/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>


        <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
        <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

        @section('styles')
        @show
                <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('template/img/favicon/favicon.ico')}}">



</head>

<body>
{{--*/ $configuracion = Confighdad::first() /*--}}
<div class="row">
    <div class="col-md-1">
        <img style="width:100px; height:100px;" alt="Logo" src="{{asset('template/css/images/logo.png')}}" />
    </div>
    <div class="col-md-11">
        <h1><a style="text-decoration: none;" ><span class="bold" style="color: #D31B1B;">{{$configuracion->nombre_hdad}}</span></a></h1>

        <p>{{utf8_decode($configuracion->descripcion)}}</p>
    </div>
</div>

<span class="totop"><a href="#"><i class="fa fa-chevron-up"></i></a></span>

<!-- JS -->
<script src="{{ asset('template/js/respond.min.js')}}"></script><!--[if lt IE 9]>
<script src="{{ asset('template/js/html5shiv.js')}}"></script>
<![endif]-->

<script src="{{ asset('template/js/jquery.js')}}"></script> <!-- jQuery -->
<script src="{{ asset('template/js/bootstrap.min.js')}}"></script> <!-- Bootstrap -->
<script src="{{ asset('template/js/jquery-ui.min.js')}}"></script> <!-- jQuery UI -->
<script src="{{ asset('template/js/moment.min.js')}}"></script> <!-- Moment js for full calendar -->
<script src="{{ asset('template/js/fullcalendar.min.js')}}"></script> <!-- Full Google Calendar - Calendar -->
<script src="{{ asset('template/js/jquery.rateit.min.js')}}"></script> <!-- RateIt - Star rating -->
<script src="{{ asset('template/js/jquery.prettyPhoto.js')}}"></script> <!-- prettyPhoto -->
<script src="{{ asset('template/js/jquery.slimscroll.min.js')}}"></script> <!-- jQuery Slim Scroll -->
<script src="{{ asset('template/js/jquery.dataTables.min.js')}}"></script> <!-- Data tables -->

<!-- jQuery Flot -->
<script src="{{ asset('template/js/excanvas.min.js')}}"></script>
<script src="{{ asset('template/js/jquery.flot.js')}}"></script>
<script src="{{ asset('template/js/jquery.flot.resize.js')}}"></script>
<script src="{{ asset('template/js/jquery.flot.pie.js')}}"></script>
<script src="{{ asset('template/js/jquery.flot.stack.js')}}"></script>

<!-- jQuery Notification - Noty -->
<!--<script src="{{ asset('template/js/jquery.noty.js')}}"></script>-->  <!-- jQuery Notify -->
<!--<script src="{{ asset('template/js/themes/default.js')}}"></script>--> <!-- jQuery Notify -->
<!--<script src="{{ asset('template/js/layouts/bottom.js')}}"></script>--> <!-- jQuery Notify -->
<!--<script src="{{ asset('template/js/layouts/topRight.js')}}"></script>--> <!-- jQuery Notify -->
<!--<script src="{{ asset('template/js/layouts/top.js')}}"></script>--> <!-- jQuery Notify -->
<!-- jQuery Notification ends -->

<script src="{{ asset('template/js/sparklines.js')}}"></script> <!-- Sparklines -->
<script src="{{ asset('template/js/jquery.cleditor.min.js')}}"></script> <!-- CLEditor -->
<script src="{{ asset('template/js/bootstrap-datetimepicker.min.js')}}"></script> <!-- Date picker -->
<script src="{{ asset('template/js/jquery.onoff.min.js')}}"></script> <!-- Bootstrap Toggle -->
<script src="{{ asset('template/js/filter.js')}}"></script> <!-- Filter for support page -->
<script src="{{ asset('template/js/custom.js')}}"></script> <!-- Custom codes -->
<script src="{{ asset('template/js/charts.js')}}"></script> <!-- Charts & Graphs -->

@yield('scripts')
</body>
</html>