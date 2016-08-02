@extends('layouts.master')

@section('content')
    <form action="{{url('login')}}" method="post">
        {{csrf_field()}}
        <p><label for="username">Username</label>
            <input type="text" name="username" value="{{old('username')}}">
            @if($errors->has('username')) <span>{{$erros->first('username')}}</span>@endif
        </p>
        <p><label for="password">Password</label>
            <input type="password" name="password">
            @if($errors->has('password')) <span>{{$erros->first('password')}}</span>@endif
        </p>
        <p><input type="checkbox" name="remember"> se souvenir de moi</p>
        <p><input type="submit"></p>
    </form>
@endsection