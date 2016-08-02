@extends('layouts.master')

@section('content')

    <h2>{{$aperos->title}}</h2>

    <div class="content">
        {{$aperos->date_event}}
        <br>{{$aperos->content}}
        <br><img src="{{url('assets',['images', $aperos->uri])}}"/>

        @foreach($aperos->tags as $tag)
            <span class="apero__tag"><a href="{{url('tag', $tag->id)}}"> {{$tag->name}}</a> </span>
            @if(!$tag)
                <span class="apero__tag">aucun mot clé</span>
            @endif
        @endforeach


    </div>

@endsection