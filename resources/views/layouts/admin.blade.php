<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Layout</title>
    {{-- FEUILLES DE STYLE MINIFIER DANS LE DOSSIER PUBLIC--}}
    <link rel="stylesheet"  href="{{url('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet"  href="{{url('assets/css/dashboard.css')}}">
</head>
<body>


<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand">HELLO {{Auth::user()->username}}</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><li class="active">@if(Auth::check())
                        <a href="{{url('logout')}}">LOGOUT</a>
                    @else
                        <a href="{{URL('login')}}">LOGIN</a></li>
                @endif</li>
            </ul>
        </div>
    </div>
</nav>



<div class="container">
<div class="row">
<section class="col-md-12">

    @yield('content')
</section>

</div>
</div>
<script src="{{url('assets/js/jquery.min.js')}}"></script>
<script src="{{url('assets/js/app.min.js')}}"></script>
</body>
</html>

