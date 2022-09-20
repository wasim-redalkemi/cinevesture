@extends('layouts.auth')

@section('title','Cinevesture-Register')

@section('content')
<section class="auth_section h-100">
<div class="container signup-container h-100">
    <div class="row h-100">
        <div class="col-md-12">
            <div class="signup-text mt-5"> Sign Up</div>
        </div>
        <div class="col-lg-6 col-sm-6 mt-2 mt-lg-5 pt-2 pt-lg-5">
            <input type="text" class="w-100" placeholder="First Name">
        </div>
        <div class="col-lg-6 col-sm-6 mt-2 mt-lg-5 pt-2 pt-lg-5">
            <input type="text" class="w-100" placeholder="Last Name">
        </div>
        <div class="col-12 mt-2 mt-lg-5">
            <input type="text" class="w-100" placeholder="Email">
        </div>
        <div class="col-12 mt-2 mt-lg-5">
            <input type="text" class="w-100" placeholder="Password">
        </div>
        <div class="col-12 mt-2 mt-lg-5">
            <input type="text" class="w-100" placeholder="Re Enter Password">
        </div>
        <div class="col-12 mt-2 mt-lg-5">
            <button class="w-100">Create Account</button>
        </div>
        <div class="col-12 mt-2">
            <button class="w-100"> <img src="{{asset('public/images/asset/google.png')}}" width="24" width="24" class="mx-3">Sign
                up
                with google</button>
        </div>
        <div class="help-text mt-2 mt-lg-4">Need Help ?</div>
        <div class="bottom-container mb-5">
            <div class="aleady-text">Already have an account ?<span class="mx-3 sign_now_text">Login here</span>
            </div>
            <div class="my-3">
                This site is protected by reCAPTCHA and with Google Privacy
                Policy and Terms of Service apply.
            </div>
            <div>
                By clicking “Create Account”, I agree to Cinevesture’s TOS
                and Privacy Policy.
            </div>
        </div>
    </div>
</div>
</section>
 @endsection