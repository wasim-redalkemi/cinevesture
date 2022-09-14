@extends('layouts.auth')
@section('content')
    <div class="container signup-container">
        <div class="row">
            <div class="col-md-12">
                <div class="signup-text"> Log in</div>
            </div>
            <div class="col-12 mt-2 mt-lg-5 pt-2 pt-lg-5">
                <input type="text" class="w-100" placeholder="Email">
            </div>
            <div class="col-12 mt-2 mt-lg-5">
                <input type="text" class="w-100" placeholder="Password">
            </div>

            <div class="col-12 mt-2 mt-lg-5">
                <button class="w-100">Log In</button>
            </div>
            <div class="col-12 mt-2">
                <button class="w-100"> <img src="{{asset('public/images/asset/google.png')}}" width="24" width="24" class="mx-3">Log
                    In
                    with google</button>
            </div>

            <div class="help-text mt-2 mt-lg-3 text-center">Forgot password ?</div>
            <div class="bottom-container mb-3">
                <div class="aleady-text">New to Cinevesture? <span class="mx-2 sign_now_text">Sign Up </span>now
                </div>
                <div class="my-3 proctect_by_capta_text">
                    This site is protected by reCAPTCHA and with Google Privacy
                    Policy and Terms of Service apply.
                </div>
            </div>
        </div>
    </div>       
@endsection
