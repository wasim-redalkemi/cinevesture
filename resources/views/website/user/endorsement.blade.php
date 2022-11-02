@extends('website.layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-organisation')

@section('header')
@include('website.include.header')
@endsection

@section('content')
<div class="hide-me animation for_authtoast">
    @include('website.include.flash_message')
</div>

<section class="profile-section">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('website.include.profile_sidebar')
            </div>
            <div class="col-md-9">
                <div class="profile_text"><h1>Endorsements</h1></div>
                <div class="profile_wraper profile_wraper_padding mt-md-0 mt-4">
                  <div class="row">
                    <div class="col-md-3">
                        <div class="guide_profile_main_text deep-pink">John Doe</div>
                        <div class="guide_profile_main_subtext Aubergine_at_night">Chief Officer</div>
                        <div class="profile_upload_text Aubergine_at_night">10TH July 2021</div>
                        <div class="guide_profile_main_subtext Aubergine_at_night">Abc Private Limited</div>
                    </div>
                    <div class="col-md-7">
                        <div class="guide_profile_main_text Aubergine_at_night">Published</div>
                        <div class="guide_profile_main_subtext Aubergine_at_night">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                         Ut enim ad minim veniam, quis nostrud exercitation.
                        </div>
                    </div>
                    <div class="col-md-2">
                    <input type="checkbox" checked data-toggle="toggle" data-style="ios">   
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('footer')
@include('website.include.footer')
@endsection

@push('scripts')
<script>
    $(document).ready(function(){
        $("#error-toast").toast("show");
        $("#success-toast").toast("show");
    });
</script>
@endpush