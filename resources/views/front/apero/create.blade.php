@extends('layouts.master')

@section('content')
    <form action="{{url('create')}}" method="POST" enctype="multipart/form-data">

        {{ csrf_field() }}
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif

        <p> l'ensemble des éléments compotant une * sont obligatoire</p>
        <p>
            <label for="title">titre de l'apero *</label>
            <input id="title" type="text" name="title" value="{{old('title')}}">
            @if($errors->has('title'))
                <span class="admin_error">{{$errors->first('title')}}</span>
            @endif
        </p>

        <p>
            <label for="email">email *</label>
            <input id="email" type="text" name="email" value="{{old('email')}}">
            @if($errors->has('email'))
                <span class="admin_error">{{$errors->first('email')}}</span>
            @endif
        </p>

        <p>
            <label for="date_event">Date de l'apéro *</label>
            <input id="date_event" type="date" name="date_event" value="{{old('date_event')}}">
            @if($errors->has('date_event'))
                <span class="admin_error">{{$errors->first('date_event')}}</span>
            @endif
        </p>

        <div>
            <p><label for="abstract">Résume de l'événement *</label></p>
            <textarea rows="1" cols="60" id="abstract" name="abstract">{{old('abstract')}}</textarea>
            @if($errors->has('abstract'))
                <span class="admin_error">{{$errors->first('abstract')}}</span>
            @endif
        </div>

        <div>
            <p><label for="content">content texte *</label></p>
            <textarea rows="10" cols="60" id="content" name="content">{{old('content')}} </textarea>
            @if($errors->has('content'))
                <span class="admin_error">{{$errors->first('content')}}</span>
            @endif
        </div>
        <p><label for="status">status *</label></p>

        <input checked type="radio" name="status" value="unpublished"> En attente de validation

        <h2>Catégorie *</h2>
        <select name="category_id" id="category">
            @forelse($categories as $id=>$title)
                <option value="{{$id}}">{{$title}}</option>
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

                <label for="{{$id}}">{{$name}}</label>
                <input {{( !empty(old('tags')) && in_array($id, old('tags')) )? 'checked' : ''}} id="{{$id}}"
                       type="checkbox" name="tags[]" value="{{$id}}">

            @empty
                aucun mot clé
            @endforelse

        </ul>

        <p>
            <input type="file" name="picture" value="" id="picture">

            @if($errors->has('picture'))
                <span class="admin_error"></span>
                {{$errors->first('picture')}}
            @endif
        </p>

        <p><input type="submit"></p>
    </form>
@endsection