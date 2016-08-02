@extends('layouts.admin')

@section('content')
    <form action="{{route('admin.apero.update', [$apero->id])}}" method="POST" enctype="multipart/form-data">

        {{ csrf_field() }}
        {{method_field('PUT')}}

        <p> l'ensemble des éléments compotant une * sont obligatoire</p>

        <p><label for="title">titre de l'apero *</label></p>
        <input id="title" type="text" name="title" value="{{$apero->title}}">

        @if($errors->has('title'))
            <span class="admin_error">
        {{$errors->first('title')}}
    </span>
        @endif

        <p><label for="email">email *</label></p>
        <input id="email" type="text" name="email" value="{{$apero->user->email}}">

        @if($errors->has('email'))
            <span class="admin_error">
        {{$errors->first('email')}}
    </span>
        @endif

        <p><label for="date_event">Date de l'apéro *</label>{{$apero->date_event}}</p>
        <input id="date_event" type="date" name="date_event" value="">

        @if($errors->has('date_event'))
            <span class="admin_error">
        {{$errors->first('date_event')}}
    </span>
        @endif

        <p><label for="abstract">Résume de l'événement *</label></p>
        <textarea rows="1" cols="60" id="abstract" name="abstract">{{$apero->abstract}}</textarea>

        @if($errors->has('abstract'))
            <span class="admin_error">
        {{$errors->first('abstract')}}
    </span>
        @endif

        <p><label for="content">content texte *</label></p>
        <textarea rows="10" cols="60" id="content" name="content">{{$apero->content}}</textarea>

        @if($errors->has('content'))
            <span class="admin_error">
        {{$errors->first('content')}}
    </span>
        @endif

        <p><label for="status">status *</label></p>
        <input {{$apero->status=='published'? 'checked' : ''}} type="radio" name="status" value="published"> published
        <input {{$apero->status=='unpublished'? 'checked' : ''}} type="radio" name="status" value="unpublished">
        unpublished

        <h2>Catégorie *</h2>
        <select name="category_id" id="category">
            @forelse($categories as $id=>$title)
                <option {{ (!is_null($apero->category) && $apero->category->id == $id)? 'selected' : ''}} value="{{$id}}">{{$title}}</option>
            @empty
                aucune catégorie
            @endforelse
            @if($errors->has('category_id'))
                <span class="admin_error">
                {{$errors->first('category_id')}}</span>
            @endif
        </select>


        <h2>Mots clés *</h2>
        <ul class="admin__tags">
            @forelse($tags as $id => $name)
                <li>
                    <br>
                    <label for="{{$id}}">{{$name}}</label>
                    <input @foreach($apero->tags as $tag)
                           {{$tag-> id ==$id?'checked' : ''}}
                           @endforeach type="checkbox" name="tags[]" value="{{$id}}">
                </li>
            @empty
                aucun mot clé
            @endforelse


            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>

            @endif
        </ul>

        <div>
            <h3> IMAGES </h3>
            @if($apero->uri)
                <img src="{{url('assets', ['images', $apero->uri])}}" alt="{{$apero->uri}}">
                <br><input type="checkbox" name="delete_picture"> supprimer
            @endif
            <br>(modifier/ajouter): <input type="file" name="picture" value="" id="picture"> Ajouter une image

        </div>

        <p><input type="submit"></p>
    </form>
@endsection