@extends('layouts.master')

@section('content')

    @if(!empty($aperos))
        <div xmlns="http://www.w3.org/1999/html">
            <hr class="featurette-divider">
            @foreach($aperos as $apero)
                <div class="row featurette">
                    <div class="col-md-7">
                        <a href="{{url('apero', $apero->id)}}"><h2 class="featurette-heading">{{$apero->title}}</h2></a>
                        <p class="lead">{{$apero->abstract}}</p>
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

                        <a class="btn btn-default" href="{{url('apero', $apero->id)}}">lire la suite</a>
                    </div>

                    <div class="col-md-5">
                        <img class="featurette-image img-responsive" src="{{url('assets',['images', $apero->uri])}}"/>
                    </div>
                </div>
            @endforeach



            @else
                <p>Aucun apero trouvé</p>
            @endif
        </div>
@endsection