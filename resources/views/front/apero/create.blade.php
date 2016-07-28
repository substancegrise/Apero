@extends('layouts.admin')

@section('content')
    <form  action="{{route('admin.post.store')}}" method="POST" enctype="multipart/form-data">

        {{ csrf_field() }}

        <p> <label for="titre">titre de l'apero</label></p>
        <input id="title" type="text" name="title" value="">

        @if($errors->has('title'))
            <span class="admin_error">
        {{$errors->first('title')}}
    </span>
        @endif

        <p> <label for="content">content texte</label></p>
        <textarea cols="120" id="content" name="content"></textarea>

        @if($errors->has('content'))
            <span class="admin_error">
        {{$errors->first('content')}}
    </span>
        @endif

        <p><label for="status">status</label></p>
        <input type="radio" name="status" value="published"> published
        <input checked type="radio" name="status" value="unpublished"> unpublished

        <h2>Catégorie</h2>
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


        <h2>Mots clés</h2>
        <ul class="admin__tags">
            @forelse($tags as $id => $name)
                <li>
                    <label for="{{$id}}">{{$name}}</label>
                    <input {{( !empty(old('tags')) && in_array($id, old('tags')) )? 'checked' : ''}} id="{{$id}}" type="checkbox" name="tags[]" value="{{$id}}">
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