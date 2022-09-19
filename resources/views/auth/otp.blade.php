@extends('layouts.auth')

@section('title','Cinevesture-Otp')

@section('content')
    <div class="container signup-container">
        <form method="POST" action="{{ route('verify-otp') }}">
            @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="signup-text"> OTP Verification</div>
            </div>
            <div class="col-12 mt-2 mt-lg-5 pt-2 pt-lg-5">
                <input type="hidden" name = "email" value = "{{$user->email}}">
                <input type="number" class="w-100" name="otp" placeholder="Please Enter OTP">
            </div>
            <div class="col-12 mt-2 mt-lg-5">
                <button class="w-100">Submit</button>
            </div>
        </div>
    </form>
    </div>
@endsection