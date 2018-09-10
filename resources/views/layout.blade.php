<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Laravel Social and Email Authentication</title>

    <meta name="description" content="Laravel 5.3 bootstrap app with Multi Auth, Social and Email Authentication. Google re-Captcha, Facebook, Twitter, G+ and much more...">
    <meta name="author" content="Ivan Radunovic">
    <link rel="shortcut icon" href="https://tuts.codingo.me/assets/img/box.png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.1.1/css/mdb.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    @yield('head')

</head>

<body>

<!--Navigation-->
<header>

@include('partials.above-navbar-alert')

<!--Navbar-->
    <nav class="navbar navbar-dark scrolling-navbar mdb-gradient">

        <!-- Collapse button-->
        <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#collapseEx">
            <i class="fa fa-bars"></i></button>

        <div class="container">

            <!--Collapse content-->
            <div class="collapse navbar-toggleable-xs" id="collapseEx">

                <!--Links-->
                <ul class="nav navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="https://github.com/codingo-me/laravel-social-email-authentication" target="_blank"><i class="fa fa-download"></i>  Download</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('public.home')  }}"> Home</a>
                    </li>
                    @if(!Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/login') }}"> Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/register') }}"> Register</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="#"> {{ Auth::user()->first_name }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/logout') }}"> Logout</a>
                    </li>
                    @endif
                </ul>

                <!--Navbar icons-->
                <ul class="nav navbar-nav nav-flex-icons">
                    <li class="nav-item">
                        <a href="https://www.facebook.com/codingo.me/" class="nav-link"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li class="nav-item">
                        <a href="https://twitter.com/codingo_me" class="nav-link"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li class="nav-item">
                        <a href="https://plus.google.com/u/2/b/109783202683475265470/collection/wwmLx" class="nav-link"><i class="fa fa-google-plus"></i></a>
                    </li>
                    <li class="nav-item">
                        <a href="https://github.com/codingo-me" class="nav-link"><i class="fa fa-github"></i></a>
                    </li>
                </ul>

            </div>
            <!--/.Collapse content-->

        </div>

    </nav>
    <!--/.Navbar-->


</header>
<!--/Navigation-->

<main>
<div class="container">

    <div style="height: 90px;"></div>
    @yield('content')

</div> <!-- /container -->
</main>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.3/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.1.1/js/mdb.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="/assets/js/ie10-viewport-bug-workaround.js"></script>

@yield('footer')

</body>
</html>