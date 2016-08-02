<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>aperos techniques</title>
    <link rel="stylesheet" href="{{url('assets/css/bootstrap.min.css')}}">
</head>

<body>
<div class="container">
    <header>
        <h2>APEROS TECHNIQUES</h2>


        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                            aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="{{url('/')}}">Accueil</a></li>
                        <li><a href="{{url('search')}}">Chercher un apéro</a></li>
                        <li><a href="{{url('create')}}">Organiser un apéro</a></li>

                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active">  @if(Auth::check())
                                <a href="{{url('logout')}}">LOGOUT</a>
                        <li><a href="{{route('admin.apero.index')}}">APERO CRUD</a></li>
                        @else
                            <a href="{{URL('login')}}">LOGIN</a>
                            @endif</a></li>

                    </ul>
                </div><!--/.nav-collapse -->
            </div><!--/.container-fluid -->
        </nav>

    </header>
    <div class="row"
    ">
    <section class="col-md-8">
        @yield('content')
    </section>
    <aside class="col-md-4">
        @include('partials.sidebar')
    </aside>
</div>

</body>
</html>