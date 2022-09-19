@extends('layouts.auth')

@section('title','Cinevesture-Register')

@section('content')
<div class="container signup-container">
    <div class="row">
        <div class="col-md-12">
            <div class="signup-text mt-5"> Sign Up</div>
        </div>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="row">
                <div class="col-lg-6 col-sm-6 mt-2 mt-lg-5 pt-2 pt-lg-5">
                    <input type="text" class="w-100 @error('first_name') is-invalid @enderror" name="first_name" placeholder="First Name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                    @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror     
                </div>
                <div class="col-lg-6 col-sm-6 mt-2 mt-lg-5 pt-2 pt-lg-5">
                    <input type="text" class="w-100 @error('last_name') is-invalid @enderror" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}" autocomplete="last_name" autofocus>
                    @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror     
                </div>
                <div class="col-12 mt-2 mt-lg-5">
                    <input type="text" class="w-100 @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-12 mt-2 mt-lg-5">
                    <input type="password" class="w-100 @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-12 mt-2 mt-lg-5">
                    <input type="password" class="w-100" placeholder="Re Enter Password" name="password_confirmation" required autocomplete="new-password">
                </div>
                <div class="col-12 mt-2 mt-lg-5">
                    <button type="submit" class="w-100">{{ __('Create Account') }}</button>
                </div>
            </div>
        </form>
        <div class="col-12 mt-2">
            <button class="w-100"> <img src="{{ asset('public/images/asset/google.png') }}" width="24" width="24" class="mx-3">Sign
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
@endsection 