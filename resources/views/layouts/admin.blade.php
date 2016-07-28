<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Layout</title>
    {{-- FEUILLES DE STYLE MINIFIER DANS LE DOSSIER PUBLIC--}}
    <link rel="stylesheet" href="{{url('assets', ['css', 'app.min.css'])}}">
</head>
<body>
<header>
    <nav>
        {{-- LES RESSOURCES DE NOS CRUD--}}
        <a href="{{route('admin.student.index')}}">Student (CRUD)</a>
        <a href="{{route('admin.post.index')}}">Post (CRUD)</a>
    </nav>
</header>
<div class="grid-2-1">
<section id=main">
@yield('content')
</section>
<aside>
    <nav>
        <ul>
            <li> <a href="{{url('/')}}">(retour) site public</a></li>
            <li><a href="{{url('logout')}}">LOGOUT</a> </li>
        </ul>
    </nav>
</aside>
<script src="{{url('assets/js/jquery.min.js')}}"></script>
<script src="{{url('assets/js/app.min.js')}}"></script>
    </div>
</body>
</html>

