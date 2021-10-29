@extends('layouts.default')
@section('content')
    <h1>Tulis Artikel</h1>
    <form action="/artikel/create" method="POST" class="w-50 gap-4">
        @csrf
        <div class="form-group mb-3">
            <input class="form-control" type="text" placeholder="author" name="author" value="{{auth()->user()->name}}">
        </div>
        <div class="form-group mb-3">
            <input class="form-control" type="text" placeholder="title" name="title">
        </div>
        <div class="form-group mb-3">
            <textarea class="form-control" type="text" placeholder="content" name="content"></textarea>
        </div>
        <button class="btn btn-primary">Submit</button>
    </form>
@endsection
