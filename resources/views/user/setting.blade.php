@extends('layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-organisation')

@section('header')
@include('include.header')
@endsection

@section('content')

<section class="profile-section">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('include.profile_sidebar')
            </div>
            <div class="col-md-9">
                <div class="profile_wraper profile_wraper_padding mt-md-0 mt-4 h-100">

                    <div class="profile_text">
                        <h1>Settings</h1>
                    </div>
                    <div class="guide_profile_main_text mt-4">Email Id</div>
                    <div class="d-flex align-items-center">
                        <div class="preview_subtext mt-2">a********@gmail.com</div> <span class="profile_upload_text aubergine mx-3">Change Email</span>
                    </div>
                    <div class="guide_profile_main_text mt-4">Password</div>
                    <div class="d-flex align-items-center">
                        <div class="preview_subtext mt-2">***********</div> <span class="profile_upload_text aubergine mx-3"><a href="{{route('password-reset-otp')}}">Change Password</a></span>
                    </div>
                    <div class="row mt_35">
                        <div class="col-md-2">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                
                                <button class="deactivate_btn" type="submit">{{ __('Logout') }} </button>
                            </form>
                            {{-- <button class="deactivate_btn">Logout</button> --}}
                        </div>
                        <div class="col-md-5 mt-2 mt-md-0">
                            <button class="deactivate_btn">Deactivate account</button>
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