@extends('website.layouts.auth')

{{-- @section('title','Cinevesture-Login') --}}

@section('header')
@include('website.auth.guest_header')
@endsection

@section('content')
<div class="hide-me animation for_authtoast">
    @include('website.include.flash_message')
</div>

<section class="auth_section p-0 mt-0">
    <div class="main_page_wraper">
        <form method="POST" enctype="multipart/form-data" action="{{ route('login') }}">
            @csrf
            <div class="container">
                <div class="row">
                    <div class="col col-md-12">
                        <div class="signup-container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="signup-text mt-5 mt-md-5"> Log in</div>
                                </div>

                                <div class="col-12 mt-4-5 pt-0 pt-lg-5">
                                    <input type="text" class="is-invalid-remove email-only outline w-100 @error('email') is-invalid @enderror" value="{{old('email')}}" name="email" placeholder="Email" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                                <div class="col-12 mt-4-5">
                                    <input type="password" class="outline w-100 @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-12 mt-4 mt-md-5">
                                    <button type="submit" class="outline w-100 mt-2 mt-md-0">
                                        {{ __('Log In') }}
                                    </button>
                                </div>
                                <div class="col-12 mt-2">
                                    <a href="{{ route('google.login') }}">
                                        <button class="with_google_btn" type="button"> <img src="{{asset('images/asset/google.png')}}" width="24" width="24" class="mx-3">Log In with google</button>
                                    </a>
                                </div>

                                {{-- <div class="help-text mt-2 mt-lg-3 text-center">Forgot password ?</div> --}}
                                <div class="help-text mt-2 mt-lg-3 text-center">
                                    @if (Route::has('password.request'))
                                    <a class="btn-link text_decor_none" href="{{ route('password.request') }}">
                                        {{__('Forgot Password?')}}
                                    </a>
                                    @endif
                                </div>
                                <div class="bottom-container mb-3">
                                    <div class="aleady-text">New to Cinevesture?<span class="mx-2 sign_now_text">
                                            @if(Route::has('password.request'))
                                            <a class="text_decor_none" href="{{ route('register') }}">{{ __('Sign Up') }}</a>@endif</span>now
                                    </div>
                                    <div class="my-3 proctect_by_capta_text">
                                        This site is protected by reCAPTCHA and with Google Privacy
                                        Policy and Terms of Service apply.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="image_wraper">
            <div class="d-none d-md-block d-lg-block">
                <div class="register_sidewraper">
                    <img src="{{asset('images/asset/gordon-cowie-OPlXmibx__I-unsplash-2.jpg')}}" width="100%" height="100%" alt="">
                </div>
            </div>
        </div>
    </div>
</section>


@endsection