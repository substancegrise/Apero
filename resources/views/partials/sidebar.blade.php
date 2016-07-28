<ul>
    <li>
        hello sidebar
        @if(Auth::check())
        <li><br><a href="{{route('admin.student.index')}}">STUDENT CRUD</a></li>
            <li><a href="{{url('logout')}}">LOGOUT</a>
        @else
            <li><a href="{{URL('login')}}">LOGIN</a></li>
        @endif
    </li>

</ul>