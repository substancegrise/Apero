@extends('layouts.master')

@section('content')

    @if(!empty($aperos))
        <ul xmlns="http://www.w3.org/1999/html">
            @foreach($aperos as $apero)
                <li><a href="{{url('apero', $apero->id)}}">{{$apero->title}}</a></li>
                <li><img src="{{url('assets',['images', $apero->uri])}}"/></li>
                <li>{{$apero->abstract}}</li>

                @forelse($apero->tags as $tag)
                    <span class="apero__tag"><a href="{{url('tag', $tag->id)}}"> {{$tag->name}}</a> </span>
                @empty
                    <span class="apero__tag">aucun mot clé</span>
                @endforelse

                @foreach($categories as $category)
                    @if($category->id == $apero->category_id)
                        <a href="{{url('category', $category->id)}}">{{$category->title}}</a>
                    @endif
                @endforeach
                {{$apero->date_event}}

                <li></li><a href="{{url('apero', $apero->id)}}">lire la suite</a></li>
            @endforeach


        </ul>

    @else
        <p>Aucun apero trouvé</p>
    @endif

@endsection