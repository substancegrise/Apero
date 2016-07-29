@extends('layouts.master')

@section('content')
    <form  action="{{url('create')}}"  method="POST" enctype="multipart/form-data">

        {{ csrf_field() }}

        <p> l'ensemble des éléments compotant une * sont obligatoire</p>
        <p> <label for="title">titre de l'apero *</label></p>
        <input id="title" type="text" name="title" value="">

        @if($errors->has('title'))
            <span class="admin_error">
        {{$errors->first('title')}}
    </span>
        @endif

        <p> <label for="email">email *</label></p>
        <input id="email" type="text" name="email" value="">

        @if($errors->has('email'))
            <span class="admin_error">
        {{$errors->first('email')}}
    </span>
        @endif

        <p> <label for="date_event">Date de l'apéro *</label></p>
        <input id="date_event" type="date" name="date_event" value="">

        @if($errors->has('date_event'))
            <span class="admin_error">
        {{$errors->first('date_event')}}
    </span>
        @endif

        <p> <label for="abstract">Résume de l'événement *</label></p>
        <textarea  rows="1" cols="60" id="abstract" name="abstract"> tapez une courte présentation ici</textarea>

        @if($errors->has('abstract'))
            <span class="admin_error">
        {{$errors->first('abstract')}}
    </span>
        @endif

        <p> <label for="content">content texte *</label></p>
        <textarea  rows="10" cols="60" id="content" name="content"> tapez votre texte de presentation ici</textarea>

        @if($errors->has('content'))
            <span class="admin_error">
        {{$errors->first('content')}}
    </span>
        @endif

        <p><label for="status">status *</label></p>
        {{-- <input type="radio" name="status" value="published"> published--}}
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
                    <input {{( !empty(old('tags')) && in_array($id, old('tags')) )? 'checked' : ''}} id="{{$id}}" type="checkbox" name="tags[]" value="{{$id}}">

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

        <p>
            <input type="file" name="picture" value="" id="picture">

            @if($errors->has('picture'))
                <span class="admin_error"></span>
                {{$errors->first('picture')}}
            @endif
        </p>

        <p><input type="submit" ></p>
    </form>
@endsection