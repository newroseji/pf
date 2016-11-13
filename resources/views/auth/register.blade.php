@extends('app')
@section('content')
    <h1>Register</h1>

    @include("errors._error")

    @include("flashes._flash")

    <form action="/register" method="POST">

    {!! csrf_field()!!}

    <!-- Name Form Input -->
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}">
        </div>

        <!-- Email Form Input -->
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{old('email')}}">
        </div>

        <!-- Password Form Input -->
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-control" value="{{old('password')}}">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-default">Register</button>
        </div>

    </form>
@stop