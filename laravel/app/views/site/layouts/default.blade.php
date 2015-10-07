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
    <link href="{{ asset('template/css/bootstrap.min.css')}}" rel="stylesheet">
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


    @section('styles')
        @show
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('template/img/favicon/favicon.ico')}}">
</head>

<body>
{{--*/ $configuracion = Confighdad::first() /*--}}

<div class="navbar navbar-fixed-top bs-docs-nav" role="banner">

    <div class="conjtainer">
        <!-- Menu button for smallar screens -->
        <div class="navbar-header">
            <button class="navbar-toggle btn-navbar" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                <span>Menu</span>
            </button>
            <!-- Site name for smallar screens -->
            <a href="#" class="navbar-brand hidden-lg" style="color: #D31B1B;"><b>{{$configuracion->nombre_hdad}}</b></a>
        </div>



        <!-- Navigation starts -->
        <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">

            <ul class="nav navbar-nav">

                <!-- Upload to server link. Class "dropdown-big" creates big dropdown -->
                <li class="dropdown dropdown-big">
                    <a class="dropdown-toggle" data-toggle="dropdown"><span class="label label-success"><i class="fa fa-user"></i></span> {{User::find(Auth::user()->id)->hermano->nombre }} {{User::find(Auth::user()->id)->hermano->apellidos }}</a>
                    <!-- Dropdown -->

                </li>

                <!-- Sync to server link -->


            </ul>


            <!-- Links -->
            <ul class="nav navbar-nav pull-right">
                <li class="dropdown pull-right">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="fa fa-user"></i> <b class="caret"></b>
                    </a>

                    <!-- Dropdown menu -->
                    <ul class="dropdown-menu">
                        <li><a href="{{ URL::to('users/logout') }}"><i class="fa fa-sign-out"></i> Logout</a></li>
                    </ul>
                </li>

            </ul>
        </nav>

    </div>
</div>



<!-- Header starts -->
<header>
    <div class="container">
        <div class="row">



            <!-- Logo section -->
            <div class="col-md-10">
                <!-- Logo. -->
                <div class="logo">
                    <div class="col-md-1">
                        <img class="img-responsive" alt="Logo" src="{{asset('template/css/images/logo.png')}}" />
                    </div>
                    <br>
                    <h1><a href="#"><span class="bold" style="color: #D31B1B;">{{$configuracion->nombre_hdad}}</span></a></h1>

                    <p>{{$configuracion->descripcion}}</p>
                </div>
                <!-- Logo ends -->
            </div>


            <!-- Data section -->

            <div class="col-md-2">
                <div class="header-data">

                    <!-- revenue data -->
                    <div class="hdata">
                        <div class="mcol-left">
                            <!-- Icon with green background -->
                            <i class="fa fa-money bred"></i>
                        </div>
                        <div class="mcol-right">
                            <!-- Number of visitors -->
                            <p><em>Recibos</em><a href="#">1</a></p>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</header>

<!-- Header ends -->

<!-- Main content starts -->

<div class="content">

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-dropdown"><a href="#">Menú</a></div>

        <!--- Sidebar navigation -->
        <!-- If the main navigation has sub navigation, then add the class "has_sub" to "li" of main navigation. -->
        <ul id="nav">
            <!-- Main menu with font awesome icon -->
            <li><a href="{{URL::to('gestionhdad/inicio')}}"><i class="fa fa-home"></i> Inicio</a></li>

            @if(Auth::check())

                @if(Auth::user()->hasRole('user'))
                    <li><a href="{{URL::to('gestionhdad/misdatos')}}"><i class="fa fa-file-o"></i> Mis datos</a></li>
                    <li><a href="{{URL::to('gestionhdad/misrecibos')}}"><i class="fa fa-table"></i> Mis recibos</a></li>
                    <li><a href="{{URL::to('gestionhdad/papeleta')}}"><i class="fa fa-tasks"></i> Papeleta de Sitio</a></li>
                @endif

                @if(Auth::user()->hasRole('admin'))
                    <li><a href="{{URL::to('gestionhdad/listado-hermanos')}}"><i class="fa fa-file-o"></i> Listado Hermanos</a></li>
                    <li><a href="{{URL::to('gestionhdad/listado-insignias')}}"><i class="fa fa-table"></i> Listado Insignias</a></li>
                @endif
            @endif
        </ul>
    </div>

    <!-- Sidebar ends -->
    <!-- Main bar -->
    <div class="mainbar">



    @yield('content')

        <!-- Matter -->



        <!-- Matter ends -->

    </div>

    <!-- Mainbar ends -->
    <div class="clearfix"></div>

</div>
<!-- Content ends -->

<!-- Footer starts -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Copyright info -->
                <p class="copy">Copyright &copy; 2012 | <a href="#">Your Site</a> </p>
            </div>
        </div>
    </div>
</footer>

<!-- Footer ends -->

<!-- Scroll to top -->
<span class="totop"><a href="#"><i class="fa fa-chevron-up"></i></a></span>

<!-- JS -->
<script src="{{ asset('template/js/respond.min.js')}}"></script>
<!--[if lt IE 9]>
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