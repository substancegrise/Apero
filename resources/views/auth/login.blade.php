@extends('layouts.master')

@section('content')
<form action="{{url('login')}}" method="post">
    {{csrf_field()}}
    <p><label for="email">Email</label>
        <input type="text" name="email" value="{{old('email')}}">
        @if($errors->has('email')) <span>{{$erros->first('email')}}</span>@endif
    </p>
    <p><label for="password">Password</label>
        <input type="password" name="password">
        @if($errors->has('password')) <span>{{$erros->first('password')}}</span>@endif
    </p>
    <p><input type="submit"></p>
</form>
   @endsection