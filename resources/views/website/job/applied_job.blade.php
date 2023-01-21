@extends('website.layouts.app',['class' => 'bg_white'])

{{-- @section('title','Cinevesture-organisation') --}}

@section('header')
@include('website.include.header')
@endsection

@section('content')

<section class="profile-section">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('website.include.profile_sidebar')
            </div>
            <div class="col-md-9">
                <div class="profile_job_wrap">
                <div class="white_bg_wraper profile_wraper_padding mt-md-0 mt-4">
                    <div class="profile_text">
                        <h1>Applied Jobs</h1>
                    </div>
                </div>
                @include('website.components.jobtile')
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('footer')
@include('website.include.footer')
@endsection

@include('website.job.favscript')