@extends('website.layouts.auth')

@section('title','Cinevesture-Register')

@section('content')
<section class="auth_section p-0">


<div class="row">
    <div class="col-md-5">
    <div class="container signup-container px-5">
    <div class="row">
        <div class="col-md-12">
            <div class="signup-text mt-5 mt-md-5"> Sign Up</div>
        </div>
        <form method="POST" enctype="multipart/form-data" action="{{ route('register') }}">
            @csrf
            <div class="row">
                <div class="col-lg-6 col-sm-6 mt-4-5 pt-0 pt-lg-5">
                    <input type="text" class="name-only is-invalid-remove alphabets-only outline w-100 @error('first_name') is-invalid @enderror" name="first_name" placeholder="First Name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                    @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror     
                </div>
                <div class="col-lg-6 col-sm-6 mt-4-5 pt-0 pt-lg-5">
                    <input type="text" class="name-only is-invalid-remove alphabets-only outline w-100 @error('last_name') is-invalid @enderror" required name="last_name" placeholder="Last Name" value="{{ old('last_name') }}" autocomplete="last_name" autofocus>
                    @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror     
                </div>
                <div class="col-12 mt-4-5">
                    <input type="text" class="email-only is-invalid-remove outline w-100 @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-12 mt-4-5">
                    <input type="password" class="password-only is-invalid-remove outline w-100 @error('password') is-invalid @enderror" placeholder="Password" id="password" name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-12 mt-4-5">
                    <input type="password" class="password-only is-invalid-remove outline w-100" placeholder="Re Enter Password" name="password_confirmation" id = "password_confirmation" required autocomplete="new-password">
                </div>
                <div class="col-12 mt-4-5">
                    <button type="submit" class="outline w-100">{{ __('Create Account') }}</button>
                </div>
            </div>
        </form>
        <div class="col-12 mt-2">
            <button class="with_google_btn"> <img src="{{ asset('public/images/asset/google.png') }}" width="24" width="24" class="mx-3">Sign
                up
                with google</button>
        </div>
        <div class="help-text mt-2 mt-lg-4">Need Help ?</div>
        <div class="bottom-container mb-5">
            <div class="aleady-text">Already have an account ?<a href="{{route('login')}}" class="text_decor_none"><span class="mx-3 sign_now_text">Login here</span></a>
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
    </div>
    <div class="col-md-7 d-none d-lg-block">
    <div class="register_sidewraper">
            <img src="{{asset('public/images/asset/gordon-cowie-OPlXmibx__I-unsplash-2.jpg')}}" width="100%" height="100%" alt="">
        </div>
    </div>
</div>
@endsection
