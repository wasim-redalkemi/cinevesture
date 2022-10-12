@extends('layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-organisation')

@section('header')
@include('include.header')
@endsection

@section('content')

<section>
    <div class="container cmn_verification_container">
        <div class="row">
        <div class="hide-me animation for_authtoast">
            @include('include.flash_message')
        </div>
        <form method="POST" action="{{ route('password-change') }}">
            @csrf
            <div class="col-md-12">
                <div class="flow_step_text">Change Password</div>
                <div class="row">
                    <div class="col-md-5 mt-3">
                        <div class="profile_input">
                            <label>Enter New Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

@error('password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 mt-2">
                        <div class="profile_input">
                            <label>Confirm New Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-5">
                        <div class="d-flex justify-content-end">
                        <button class="cancel_btn mx-3">Cancel</button>
                        <button class="guide_profile_btn">Verify</button>
                        </div>
                    </div>
                </div>
            </div>
          </form>
        </div>
    </div>
</section>

@endsection

@section('footer')
@include('include.footer')
@endsection
@push('scripts')
<script>
    $(document).ready(function() {

        $("#error-toast").toast("show");
        $("#success-toast").toast("show");

    });
</script>
@endpush