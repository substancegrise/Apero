<ul>
    <li>
        hello sidebar
        @if(Auth::check())
        <li><br><a href="{{route('admin.apero.index')}}">APERO CRUD</a></li>
            <li><a href="{{url('logout')}}">LOGOUT</a>
        @else
            <li><a href="{{URL('login')}}">LOGIN</a></li>
        @endif
    </li>

</ul>
{{--<ul>

@forelse($categories as $id => $title)
      <br><a href="{{url('category', $id)}}">{{$categories[$id]->title}}</a>
  @empty
  @endforelse

</ul>--}}