@extends('layouts.master')

@section('content')

    <form action="{{url('search')}}"  method="get">

        <input type="text" name="q" value="{{$search}}"   id="recherche">
        <input type="submit"  value="recherche">

    </form>


   @if(!empty($aperos))
        <ul>
            @foreach($aperos as $apero)
                <li><a href="{{url('apero', $apero->id)}}">{{$apero->title}}</a></li>
            @endforeach
        </ul>
        {{$aperos->render()}}
    @else
        <p>tapez votre recherche</p>
    @endif

@endsection