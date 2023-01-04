@extends('website.layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-Applicants')

@section('header')
@include('website.include.header')
@endsection
@php
use Illuminate\Support\Facades\DB;
@endphp
@section('content')
<div class="hide-me animation for_authtoast">
    @include('website.include.flash_message')
</div>
<!-- Applications of the job -->
<section class="profile-section">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('website.include.profile_sidebar')
            </div>
            <div class="col-md-9">
                <div class="white_bg_wraper my-3 my-md-0">
                    <div class="border_btm profile_wraper_padding mt-md-0 mt-4">
                        <div class="search-head-text deep-aubergine">
                            Applicants for “{{$jobTitle}}”
                        </div>
                    </div>
                    @foreach($applicants as $applicant)
                    <div class="border_btm profile_wraper_padding">

                        <div class="d-flex justify-content-between">
                            <div class="d-flex">
                                <div class="user_profile_container">
                                    <img src="{{asset($applicant->profile_image) }}" />
                                </div>
                                <!-- </div>
                        <div class=""> -->
                                <div class="mx-4">
                                    <div class="guide_profile_main_text">
                                        <a href="{{route('showAppliedJobCoverLetter',['jobId'=>$jobId,'userId'=>$applicant->id])}}">
                                            {{$applicant->first_name.' '.$applicant->last_name}}
                                        </a>
                                    </div>

                                    @php

                                    $data = DB::select("SELECT mc.name AS location, uo.name AS company FROM `user_organisations` uo INNER JOIN master_countries mc ON mc.id=uo.location_in WHERE user_id=$applicant->id");

                                    @endphp
                                    <div class="preview_headtext lh_54 candy-pink">
                                        {{@$data[0]->company.' - '.@$data[0]->location}}
                                    </div>
                                    <div class="posted_job_header Aubergine_at_night">
                                        {{$applicant->about}}
                                    </div>
                                    <div class="d-flex flex-wrap mt-3">
                                        @foreach($applicant->skill as $key=>$skill)
                                        <button class="curv_cmn_btn skill_container">{{$skill->name}}</button>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="pointer"><i class="fa fa fa-heart-o aubergine icon-size like-profile" aria-hidden="true" data-id="{{$applicant->id}}"></i></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('footer')
@include('website.include.footer')
@endsection



@include('website.include.profilefavscript')