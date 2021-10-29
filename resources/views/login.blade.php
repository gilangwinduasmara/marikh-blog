@extends('layouts.default')
@section('content')
    <h1>Login</h1>
    @if ($errors->any())
        {{$errors}}
    @endif
    <form action="/login" method="POST" class="w-50 gap-4">
        @csrf
        <div class="form-group mb-3">
            <input class="form-control" type="text" placeholder="email" name="email">
            {{$errors->first('email')}}
        </div>
        <div class="form-group mb-3">
            <input type="password" class="form-control" type="text" placeholder="password" name="password">
            {{$errors->first('password')}}
        </div>
        <button class="btn btn-primary">Login</button>
    </form>
@endsection
