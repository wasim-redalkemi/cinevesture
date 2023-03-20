@extends('website.layouts.auth')

@section('content')
<div class="container signup-container">
    <div class="signup-text my-lg-5 my-md-3"> Sign Up</div>
    <div class="row">
        <div class="col-12">
            <button class="w-100"> <img src="{{asset('images/asset/google.png')}}" width="24" width="24" class="mx-3">Sign up
                with google</button>
        </div>
        <div class="col-lg-6 col-sm-6 my-lg-5 my-sm-4">
            <input type="text" class="w-100" placeholder="First Name">
        </div>
        <div class="col-lg-6 col-sm-6 my-lg-5 my-sm-4">
            <input type="text" class="w-100" placeholder="Last Name">
        </div>
        <div class="col-12">
            <input type="text" class="w-100" placeholder="Email">

        </div>
        <div class="col-12 my-lg-5 my-sm-4">
            <input type="text" class="w-100" placeholder="Password">

        </div>
        <div class="col-12">
            <input type="text" class="w-100" placeholder="Re Enter Password">
        </div>
        <div class="col-12 mt-lg-5 mt-sm-4">
            <button class="w-100">Create Account</button>
        </div>
        <div class="help-text mt-4">Need Help ?</div>
        <div class="bottom-container mb-5">
            <div class="aleady-text">Already have an account ?<span class="mx-3 fw-bolder">Login here</span></div>
            <div class="my-3">
                This site is protected by reCAPTCHA and with <a href="https://policies.google.com/privacy?hl=en-US"> Google Privacy
                    Policy</a> and <a href="https://policies.google.com/privacy?hl=en-US"> Terms of Service apply.</a>
            </div>
            <div>
                By clicking “Create Account”, I agree to Cinevesture’s TOS
                and Privacy Policy.
            </div>
        </div>
    </div>

 @endsection