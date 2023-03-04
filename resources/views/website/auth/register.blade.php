@extends('website.layouts.auth')

{{-- @section('title','Cinevesture-Register') --}}

@section('header')
@include('website.auth.guest_header')
@endsection
@section('content')
<section class="auth_section p-0 mt-0">
<div class="main_page_wraper">
    <div class="">
        <form method="POST" id="register-form" enctype="multipart/form-data" action="{{ route('register') }}">
            @csrf
            <div class="container">
                <div class="row">
                    <div class="col col-md-12">
                        <div class="signup-container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="signup-text mt-4 pt-2 pt-md-0 mt-md-5"> Sign Up</div>
                            </div>
                            <div class="col-lg-6 col-sm-6 mt-4-5 pt-2 pt-lg-5">
                                <input type="text" class="name-only is-invalid-remove alphabets-only outline w-100 @error('first_name') is-invalid @enderror" id="first_name" name="first_name" placeholder="First Name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror     
                            </div>
                            <div class="col-lg-6 col-sm-6 mt-4-5 pt-0 pt-lg-5">
                                <input type="text" class="name-only is-invalid-remove alphabets-only outline w-100 @error('last_name') is-invalid @enderror" id="last_name" required name="last_name" placeholder="Last Name" value="{{ old('last_name') }}" autocomplete="last_name" autofocus>
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror     
                            </div>
                            <div class="col-12 mt-4-5">
                                <input type="text" class="email-only is-invalid-remove outline w-100 @error('email') is-invalid @enderror" placeholder="Email" id="email" name="email" value="@php if(request('email')){echo(request('email'));} @endphp"  required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong> 
                                </span>
                                @enderror
                            </div>
                            <div class="col-12 mt-4-5">
                                <input type="password" class="password-only is-invalid-remove outline w-100 @error('password') is-invalid @enderror" placeholder="Password"  id="password" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-12 mt-4-5">
                                <input type="password" class="password-only is-invalid-remove outline w-100" placeholder="Re Enter Password" name="password_confirmation" id = "password_confirmation" required autocomplete="new-password">
                            </div>
                            @if (config('app.env') != 'development')
                                <div class="col-12 mt-4-5">
                                    <div class="g-recaptcha" data-callback="imNotARobot" data-sitekey="{{config('constants.site-key-local')}}"></div>
                                    <div id="captchaError" class=" field-error "></div>
                                </div>
                            @endif
                            <div class="col-12 mt-4 pt-2 pt-md-0 ">
                                <input type="hidden" name="invited_by" value="<?php if(isset($_REQUEST['iuid'])){echo (decrypt($_REQUEST['iuid']));}?>">
                                <button id="register-submit" class="outline w-100 mt-2 mt-md-0">{{ __('Create Account') }}</button>
                            </div>
                            <div class="col-12 mt-2">
                                <a href="{{ route('google.login') }}">
                                    <button class="with_google_btn" type="button"> <img src="{{ asset('images/asset/google.png') }}" width="24" width="24" class="mx-3">Sign Up with google</button>
                                </a>
                            </div>
                            <div class="col col-md-12">
                                <div class="help-text mt-2 mt-lg-4"><a href="https://www.mkt.cinevesture.com/help/"> Need Help?</a></div>
                                <div class="bottom-container mb-5 mt-4 mt-md-0">
                                    <div class="aleady-text">Already have an account?<a href="{{route('login')}}" class="text_decor_none"><span class="ml_10 sign_now_text">Login here</span></a>
                                    </div>
                                    <div class="my-3">
                                        This site is protected by reCAPTCHA and with Google Privacy
                                        Policy and Terms of Service apply.
                                    </div>
                                    <div>
                                        By clicking "Create Account", I agree to Cinevesture's TOS
                                        and Privacy Policy.
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
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
@push('script')
<script>
	$('#register-submit').on('click', function (e) {
		if (grecaptcha.getResponse() == "" && $.trim($('#email').val()) != "" && $.trim($('#password').val()) != "" &&
        $.trim($('#first_name').val()) != "" && $.trim($('#last_name').val()) != "" && $.trim($('#password_confirmation').val()) != "") {
			e.preventDefault();
			$("#captchaError").show().html("Recaptcha is invalid");
		} else {
			$("#captchaError").hide();
			$('#register-form').submit();
		}


	});
    
	function imNotARobot(){
		$("#captchaError").hide();
	}
	</script>
@endpush
