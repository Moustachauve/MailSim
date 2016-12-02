
@extends('layouts.app')

@section('content')

    <div class="container">

        <h2>Welcome, {{$user->name}}</h2>

        <div class="row">
            <div class="col-sm-3">
                @include('messageMenu')
            </div>
            <div class="col-sm-9">
                @yield('content.message')
            </div>
        </div>
    </div>

@endsection