@extends('layouts.base')
@section('body')
    <div class="container">
        <div class="w-100 p-8 bg-primary container">
            @if (auth()->user())
                {{auth()->user()->name}}
                @else
                Login
            @endif
        </div>
        @yield('content')
    </div>
@endsection
