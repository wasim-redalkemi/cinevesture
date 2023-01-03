@extends('website.layouts.auth')

@section('header')
@include('website.auth.guest_header')
@endsection

@section('content')
<section class="auth_section main_content">
<div class="hide-me animation for_authtoast">
           @include('website.include.flash_message')
       </div>
    <div class="container signup-container">
        <div class="row">
            <div class="col-md-12">
                <div class="signup-text mt-5 mt-md-5"> Forgot Password</div>
            </div>
            <div class="col-md-12">
                <form method="POST" enctype="multipart/form-data" action="{{ route('password.email') }}" class="mt-2 mt-lg-5 pt-2">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="profile_input">
                                <input id="email" type="email" placeholder="Email" name ="email" required class="is-invalid-remove email-only outline  @error('email') is-invalid @enderror">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <button type="submit" class="outline w-100">
                                Receive OTP
                            </button>
                        </div>
                    </div>
                </form>
            </div>
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