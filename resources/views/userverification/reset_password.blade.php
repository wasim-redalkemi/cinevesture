@extends('layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-organisation')

@section('header')
@include('include.header')
@endsection

@section('content')

<section>
    <div class="container cmn_verification_container">
    <div class="hide-me animation for_authtoast">
    @include('include.flash_message')
    </div>
    <form method="POST" enctype="multipart/form-data" action="{{ route('verify-otp') }}">
        @csrf
        <input type="hidden" id = "email" name = "email" value = "{{$user->email}}">
        <input type="hidden" id = "type" name = "type" value = "{{$type}}">
    <div class="row">
            <div class="col-md-12">
                <div class="flow_step_text">Enter OTP we emailed to you</div>
                <div class="row">
                    <div class="col-md-3 mt-3">
                        <div class="profile_input">
                            <label>Enter OTP</label>
                            <input type="password" class="form-control" placeholder="Enter OTP" name="" aria-describedby="basic-addon1">
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
@include('include.footer')
@endsection