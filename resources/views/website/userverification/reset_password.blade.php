@extends('website.layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-organisation')

@section('header')
@include('website.include.header')
@endsection

@section('content')

<section>
    <div class="container cmn_verification_container">
        <div class="hide-me animation for_authtoast">
            @include('website.include.flash_message')
        </div>
        <form method="POST" action="{{ route('verify-otp-after-login') }}">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="flow_step_text">Enter OTP we emailed to you</div>
                    <div class="row">
                        <div class="col-md-3 mt-3">
                            <div class="profile_input">
                                <label>Enter OTP</label>
                                <input type="password" class="numbers-only outline w-100 {{ $errors->has('otp') ? ' is-invalid' : '' }}" name="otp" placeholder="Please Enter OTP" required>

                                @if ($errors->has('otp'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('otp') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-3">
                            <div class="d-flex justify-content-end">
                                <button class="guide_profile_btn">Confirm</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</section>

@endsection

@section('footer')
@include('website.include.footer')
@endsection
@push('scripts')
<script>
    $(document).ready(function() {

        $("#error-toast").toast("show");
        $("#success-toast").toast("show");

    });
</script>
@endpush