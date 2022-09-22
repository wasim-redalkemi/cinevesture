@extends('layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-organisation')

@section('header')
@include('include.header')
@endsection

@section('content')

<section>
    <div class="container cmn_verification_container">
        <div class="row">
            <div class="col-md-12">
                <div class="flow_step_text">Change Password</div>
                <div class="row">
                    <div class="col-md-5 mt-3">
                        <div class="profile_input">
                            <label>Enter New Password</label>
                            <input type="text" class="form-control" placeholder="Enter Password" name="" aria-describedby="basic-addon1">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 mt-2">
                        <div class="profile_input">
                            <label>Confirm New Password</label>
                            <input type="text" class="form-control" placeholder="Enter new password" name="" aria-describedby="basic-addon1">
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
        </div>
    </div>
</section>

@endsection

@section('footer')
@include('include.footer')
@endsection