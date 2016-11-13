@inject('countries','App\Http\Utilities\Country')
@inject('states','App\Http\Utilities\State')
@extends('app')
@section('content')
    <h1>Register</h1>

    @include("errors._error")

    @include("flashes._flash")

    <form action="/register" method="POST">

    {!! csrf_field()!!}

    <!-- Firstname Form Input -->
        <div class="form-group">
            <label for="firstname">First Name:</label><span class="required">*</span>
            <input type="text" name="firstname" id="firstname" placeholder="First name" class="form-control"
                   value="{{old('firstname')}}">
        </div>

        <!-- Middlename Form Input -->
        <div class="form-group">
            <label for="middlename">Middle Name:</label>
            <input type="text" name="middlename" id="middlename" placeholder="Middle name" class="form-control"
                   value="{{old('middlename')}}">
        </div>

        <!-- Lastname Form Input -->
        <div class="form-group">
            <label for="lastname">Last Name:</label>
            <input type="text" name="lastname" id="lastname" placeholder="Last name" class="form-control"
                   value="{{old('lastname')}}">
        </div>

        <!-- Username Form Input -->
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" placeholder="Username" class="form-control"
                   value="{{old('username')}}">
        </div>

        <!-- Address1 Form Input -->
        <div class="form-group">
            <label for="address1">Address1:</label>
            <input type="text" name="address1" id="address1" placeholder="Street Address" class="form-control"
                   value="{{old('address1')}}">
        </div>

        <!-- Address2 Form Input -->
        <div class="form-group">
            <label for="address2">Address2:</label>
            <input type="text" name="address2" id="address2" placeholder="Apt/Suite" class="form-control"
                   value="{{old('address2')}}">
        </div>

        <!-- City Form Input -->
        <div class="form-group">
            <label for="city">City:</label>
            <input type="text" name="city" id="city" placeholder="City" class="form-control" value="{{old('city')}}">
        </div>
        <!-- State Form Input -->
        <div class="form-group">
            <label for="state">State:</label>

            <select name="state"
                    id="state"

                    class="form-control">
                <option value="" >Choose State</option>
                @foreach($states::all() as $code=>$state)
                    <option value="{{$code}}">{{$state}}</option>
                @endforeach

            </select>
        </div>
        <!-- Zip/Postal code Form Input -->
        <div class="form-group">
            <label for="zip">Zip:</label>
            <input type="text" name="zip" id="zip" placeholder="Zipcode" class="form-control" value="{{old('zip')}}">
        </div>

        <!-- Country Form Input -->
        <div class="form-group">
            <label for="country">Country:</label>
            <select id="country" name="country" class="form-control">
                <option value="">Choose Country</option>
                @foreach($countries::all() as $code=>$country)
                    <option value="{{$code}}">{{$country}}</option>
                @endforeach
            </select>
        </div>

        <!-- Email Form Input -->
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" placeholder="Email address" class="form-control"
                   value="{{old('email')}}">
        </div>

        <!-- Password Form Input -->
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" placeholder="Password" class="form-control"
                   value="{{old('password')}}">
        </div>

        <!-- Confirm password Form Input -->
        <div class="form-group">
            <label for="password_confirmation">Confirm password:</label>
            <input type="password" name="password_confirmation" placeholder="Password confirmation"
                   id="password_confirmation" class="form-control" value="{{old('password_confirmation')}}">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-default">Register</button>
        </div>

    </form>
@stop
@section('footer')
    @include("pages.footer")
@stop