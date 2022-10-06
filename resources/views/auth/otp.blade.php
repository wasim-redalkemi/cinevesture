@extends('layouts.app')

@section('title','Cinevesture-Otp')

@section('content')
<div class="hide-me animation for_authtoast">
    @include('include.flash_message')
</div>
<section class="auth_section">
    <div class="container signup-container">
        
        <form method="POST" enctype="multipart/form-data" action="{{ route('verify-otp') }}">
            @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="signup-text  mt-5 mt-md-5"> OTP Verification</div>
            </div>
            <div class="col-12 mt-2 mt-lg-5 pt-2 pt-lg-5">
                <input type="hidden" name = "email" value = "{{$user->email}}">
                <input type="password" class="w-100 {{ $errors->has('otp') ? ' is-invalid' : '' }}" name="otp" placeholder="Please Enter OTP" required>
              
                @if ($errors->has('otp'))
                <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong>{{ $errors->first('otp') }}</strong>
                </span>
                @endif              
            </div>
            <div class="col-12 mt-2 mt-lg-5">
                <button class="w-100">Submit</button>
            </div>
        </div>
    </form>
    </div>
</section>
@endsection
@push('scripts')
<script>
$(document).ready(function(){
        $("#error-toast").toast("show");
});
</script>
@endpush