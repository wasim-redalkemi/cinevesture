@extends('layouts.auth')

@section('title','Cinevesture-Login')

@section('content')
<section class="auth_section">
    <div class="container signup-container">
        <div class="row">
            <div class="col-md-12">
                <div class="signup-text mt-5 mt-md-5"> Log in</div>
            </div>
            <div class="col-12 mt-2 mt-lg-5 pt-5 pt-lg-5">
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
            <div class="bottom-container mb-5 pb-5">
                <div class="aleady-text">New to Cinevesture? <span class="mx-2 sign_now_text"><a href="" class="text_decor_none"> Sign Up </a></span>now
                </div>
                <div class="my-3 proctect_by_capta_text">
                    This site is protected by reCAPTCHA and with Google Privacy
                    Policy and Terms of Service apply.
                </div>
            </div>
        </div>
    </div>   
</section>    
@endsection
