@extends('layouts.auth')

@section('title','Cinevesture-Login')

@section('content')
<section class="auth_section">
    <div class="container signup-container">
    <div class="hide-me animation for_authtoast">
    @include('include.flash_message')
</div>
        <div class="row">
            <div class="col-md-12">
                <div class="signup-text mt-5 mt-md-5"> Log in</div>
            </div>
            <form method="POST" enctype="multipart/form-data" action="{{ route('login') }}">
                @csrf

                <div class="col-12 mt-2 mt-lg-5 pt-5 pt-lg-5">
                    <input type="text" class="w-100 @error('email') is-invalid @enderror" name="email" placeholder="Email" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>
                <div class="col-12 mt-2 mt-lg-5">
                    <input type="password" class="w-100 @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="col-12 mt-2 mt-lg-5">
                    <button type="submit" class="w-100 btn btn-primary">
                        {{ __('Log In') }}
                    </button>
                </div>
                <div class="col-12 mt-2">
                    <button class="w-100"> <img src="{{asset('public/images/asset/google.png')}}" width="24" width="24" class="mx-3">Log
                        In
                        with google</button>
                </div>

                {{-- <div class="help-text mt-2 mt-lg-3 text-center">Forgot password ?</div> --}}
                <div class="help-text mt-2 mt-lg-3 text-center">
                    @if (Route::has('password.request'))
                        <a class="btn-link text_decor_none" href="{{ route('password.request') }}">
                            {{ __('Forgot password ?') }}
                        </a>
                    @endif
                </div>
                <div class="bottom-container mb-3">
                    <div class="aleady-text">New to Cinevesture?<span class="mx-2 sign_now_text">
                    @if (Route::has('password.request'))
                        <a class="btn-link text_decor_none"href="{{ route('register') }}">
                            {{ __('Sign Up') }}
                        </a>
                    @endif
                    </span>now
                    </div>
                    <div class="my-3 proctect_by_capta_text">
                        This site is protected by reCAPTCHA and with Google Privacy
                        Policy and Terms of Service apply.
                    </div>
                </div>
            </form>
        </div>
    </div>   
</section>    
@endsection
@push('scripts')
<script>

$(document).ready(function(){
   
        $("#error-toast").toast("show");
        $("#success-toast").toast("show");
        
     

});
</script>
@endpush