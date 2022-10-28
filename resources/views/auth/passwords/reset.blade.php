@extends('layouts.app')

@section('content')

<div class="hide-me animation for_authtoast">
    @include('include.flash_message')
</div>
<section class="auth_section">
    <div class="container signup-container">
        <div class="row">
            <div class="col-md-12">
                <div class="signup-text mt-5 mt-md-5">Reset Password</div>
            </div>
            <div class="col-md-12">
                <form method="POST" enctype="multipart/form-data" action="{{ route('password.update') }}" class="mt-lg-5 pt-lg-5">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <input type="hidden" name="email" value="{{ $email }}">
                    <div class="col-md-12 mb-3">
                        <input id="email" type="text" disabled class="email-only  outline form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ $email ?? old('email') }}"  autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <input id="password" type="password" class="password-only reset-password is-invalid-remove outline form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <input id="password-confirm" type="password" class="reset-password is-invalid-remove password-only outline form-control" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                    </div>
                    <div class="col-md-12 mb-3">
                        <button type="submit" class="">
                            {{ __('Reset Password') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
</section>




<div class="container">
    <div class="row justify-content-center">

    </div>
</div>
@endsection
@push('scripts')
<script>

$(document).ready(function(){
   
        $("#error-toast").toast("show");
        $("#success-toast").toast("show");
        
     

});
</script>
@endpush