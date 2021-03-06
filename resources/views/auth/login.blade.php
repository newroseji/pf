@extends('app')
@section('content')


    <h1>Login</h1>
    @include("errors._error")

    @include("flashes._flash")

    <form method="POST" action="/login">
        {!! csrf_field() !!}
        <!-- Email Form Input -->
        <div class="form-group">
            <label for="email">Email Address:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{old('email')}}">
        </div>

        <!-- Password Form Input -->
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-control" value="{{old('password')}}">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Sign In
            </button>
        </div>
    </form>
    @stop
@section('footer')
    @include("pages.footer")
@stop

