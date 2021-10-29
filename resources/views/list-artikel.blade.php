@extends('layouts.default')
@section('content')
    <h1>List Artikel</h1>
    <form action="" method="get">
        <input type="text" class="form-control" name="search" placeholder="Cari ..." value="{{request()->search}}">
    </form>
    @foreach ($articles as $article)
        <div class="mb-8">
            <strong>
                {{$article->title}}
            </strong>
            <div>
                {{$article->author}}
            </div>
            <p>
                {{$article->content}}
            </p>
        </div>
    @endforeach
@endsection
