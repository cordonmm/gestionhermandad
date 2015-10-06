<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <!-- Title and other stuffs -->
    <title>Acceso Hermanos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <!-- Stylesheets -->
    <link href="{{ asset('template/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('template/css/font-awesome.min.css')}}">
    <link href="{{ asset('template/css/style.css')}}" rel="stylesheet">

    <script src="{{ asset('template/js/respond.min.js')}}"></script>
    <!--[if lt IE 9]>
    <script src="{{ asset('template/js/html5shiv.js')}}"></script>
    <![endif]-->

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('template/img/favicon/favicon.png')}}">
</head>

<body>

<!-- Form area -->
<div class="admin-form">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <!-- Widget starts -->
                <div class="widget worange">
                    <!-- Widget head -->
                    <div class="widget-head">
                        <i class="fa fa-lock"></i> Login
                    </div>

                    <div class="widget-content">
                        <div class="padd">
                            <!-- Login form -->
                            <form role="form" method="POST" action="{{{ URL::to('/users/login') }}}" accept-charset="UTF-8">
                                <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
                                <fieldset>
                                    <div class="form-group">
                                        <label for="email">{{{ Lang::get('confide::confide.e_mail') }}}</label>
                                        <input class="form-control" tabindex="1" placeholder="{{{ Lang::get('confide::confide.e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">
                                            {{{ Lang::get('confide::confide.password') }}}
                                        </label>
                                        <input class="form-control" tabindex="2" placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" name="password" id="password">
                                        <p class="help-block">
                                            <a href="{{{ URL::to('/users/forgot_password') }}}">{{{ Lang::get('confide::confide.login.forgot_password') }}}</a>
                                        </p>
                                    </div>
                                    <div class="checkbox">
                                        <label for="remember">
                                            <input tabindex="4" type="checkbox" name="remember" id="remember" value="1"> {{{ Lang::get('confide::confide.login.remember') }}}
                                        </label>
                                    </div>
                                    @if (Session::get('error'))
                                        <div class="alert alert-error alert-danger">{{{ Session::get('error') }}}</div>
                                    @endif

                                    @if (Session::get('notice'))
                                        <div class="alert">{{{ Session::get('notice') }}}</div>
                                    @endif
                                    <div class="form-group">
                                        <button tabindex="3" type="submit" class="btn btn-default">{{{ Lang::get('confide::confide.login.submit') }}}</button>
                                    </div>
                                </fieldset>
                            </form>

                        </div>
                    </div>

                    <div class="widget-foot">
                        Not Registred? <a href="#">Register here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- JS -->
<script src="{{ asset('template/js/jquery.js')}}"></script>
<script src="{{ asset('template/js/bootstrap.min.js')}}"></script>
</body>
</html>