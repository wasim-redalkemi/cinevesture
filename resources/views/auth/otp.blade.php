@extends('layouts.app')

@section('title','Cinevesture-Otp')

@section('content')
<section class="auth_section">
    
    <div class="container signup-container">
        <div class="hide-me">
            @include('include.flash_message')
        </div>
        <form method="POST" action="{{ route('verify-otp') }}">
            @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="signup-text  mt-5 mt-md-5"> OTP Verification</div>
            </div>
            <div class="col-12 mt-2 mt-lg-5 pt-2 pt-lg-5">
                <input type="hidden" name = "email" value = "{{$user->email}}">
                <input type="password" class="w-100 {{ $errors->has('otp') ? ' is-invalid' : '' }}" name="otp" placeholder="Please Enter OTP" required>
              
                @if ($errors->has('otp'))
                <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong>{{ $errors->first('otp') }}</strong>
                </span>
                @endif              
            </div>
            <div class="col-12 mt-2 mt-lg-5">
                <button class="w-100">Submit</button>
            </div>
        </div>
    </form>
    </div>
</section>
@endsection