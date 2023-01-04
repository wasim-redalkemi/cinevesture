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
<section class="guide_profile_section">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('website.include.profile_sidebar')
            </div>
            <div class="col-md-9">
            <div class="content_wraper">
                        <div class="guide_profile_subsection">
                            <div class="profile_text">
                                <h1>{{$jobTitle}}</h1>
                            </div>
                        </div>
                        <div class="guide_profile_subsection">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex">
                                        <div class="user_profile_container">
                                            <img src="{{ asset('images/asset/user-profile.png') }}" />
                                        </div>
                                        <div class="mx-4">
                                        <div class="guide_profile_main_text pt-3">{{$applicant->first_name.' '.$applicant->last_name}}</div>
                                       <div>
                                        <span class="associate_text deep-pink"><a href="{{route('profile-public-show',['id'=>$applicant->id])}}" class="">View Profile</a></span>
                                        <span class="associate_text deep-pink mx-3"><a href="" class="">Contact</a></span>
                                       </div>
                                        <!-- <a href="{{route('profile-public-show',['id'=>$applicant->id])}}" class=""></a> -->
                                    </div>
                                            </div>
                                    <div class="pt-3">
                                        <i class="fa {{$isLiked ? 'fa-heart' : 'fa-heart-o'}} icon-size Aubergine" aria-hidden="true"></i>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="guide_profile_subsection">
                            <div class="guide_profile_main_text">Cover Letter</div>
                            <div class="posted_job_header">{{$coverLetter->cover_letter}}</div>
                        </div>

                        <div class="guide_profile_subsection">
                            <div class="guide_profile_main_text">Resume</div>

                            <div class="row">
                                <div class="col-lg-3 col-sm-6 mt-sm-2 mt-2">
                                    <div class="d-flex doc_container">
                                        <div class="icon">
                                            <img src="{{ asset('images/asset/pdf-icon.png') }}">
                                        </div>
                                        <a href="{{asset('storage/'.$coverLetter->resume)}}" download="" class="public-subheading-text mx-2">
                                            <div class="resume-download-txt">{{$coverLetter->resume_original_name}}</div>
                                            <div class="resume-download-txt">{{$coverLetter->resume_size}}</div>
</a>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="guide_profile_subsection">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="guide_profile_main_text deep-pink font_18">
                                            <h1 class="">About</h1>
                                        </div>
                                        <div class="guide_profile_main_subtext Aubergine_at_night mt-2">
                                            <p>
                                               {{$applicant->about}}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                    <div class="col-md-5 ">
                                        <div class="guide_profile_main_text mb-2">Introduction Video</div>
                                        <div>
                                            <iframe width=100% height="300" src="{{$applicant->intro_video_link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="guide_profile_subsection">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="guide_profile_main_text mb-2">Portfolio</div>
                                        <div class="portfolio owl-carousel owl-theme">
                                            @foreach($portfolios as $key=>$portfolio)
                                            <div class="item">
                                                <img src="{{ asset('images/asset/photo-1595152452543-e5fc28ebc2b8 2.png') }}">
                                                <div class="guide_profile_main_subtext">{{$portfolio->project_title}}</div>
                                            </div>
                                            @endforeach                                           
                                        </div>
                                    </div>
                                </div>
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



@include('website.include.profilefavscript')