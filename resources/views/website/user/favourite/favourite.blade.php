@extends('website.layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-organisation')

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
                <div class="profile_text">
                    <h1>Favourites</h1>
                </div>
                <div class="preview_headtext mb-3 deep-pink">Projects</div>
                <div class="row">
                    <div class="col-md-4">
                        @php
                            $user_projects = $user_projects->toArray();
                                                        
                        @endphp
                        @foreach ($user_projects['data'] as $k => $v)
                            @if (!empty($v['projects']['project_image']))
                                <div><img src="{{ Storage::url($v['projects']['project_image']['file_link']) }}"  class="" width=100% alt="image"></div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="movie_name_text">{{ !empty($v['projects']['project_name'])? $v['projects']['project_name'] : '-' }} </div>
                                    <i class="fa fa fa-heart aubergine icon-size" aria-hidden="true"></i>
                                </div>
                            @else
                                <div><img src="{{ asset('public/images/asset/100_no_img.jpg') }}"  class="" width=100% alt="image"></div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="movie_name_text">Movie Title </div>
                                    <i class="fa fa fa-heart aubergine icon-size" aria-hidden="true"></i>
                                </div>                            
                            @endif                                       
                        @endforeach
                    </div>                    
                </div>

                <div class="py-4">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <div class="guide_profile_main_text deep-pink mt-5">Profiles</div>
                @php
                    $user_profiles = $user_profiles->toArray();
                @endphp
                @foreach ($user_profiles['data'] as $k => $v)               
                <div class="profile_wraper profile_wraper_padding mt-1">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="user_profile_container">                                
                                @if (!empty($v['projects']['project_image']))
                                    <img src="{{ Storage::url($v['profiles']['profile_image']) }}"  class="" width=100% alt="image">
                                @else
                                <img src="{{ asset('public/images/asset/100_no_img.jpg') }}" alt="image">
                                @endif
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                    <span class="guide_profile_main_text"> {{ !empty($v['profiles']['name'])? $v['profiles']['name'] : '-' }}</span>
                                    <button class="verified_cmn_btn mx-3"> <i class="fa fa-check-circle hot-pink mx-1" aria-hidden="true"></i> VERIFIED</button>
                                </div>
                                <div class="pointer"><i class="fa fa fa-heart aubergine icon-size" aria-hidden="true"></i></div>
                            </div>
                            <div class="posted_job_header">
                                {{ !empty($v['profiles']['job_title'])? $v['profiles']['job_title'] : '-' }}
                            </div>
                            <div class="preview_headtext lh_54 candy-pink">
                                Location
                            </div>
                            <div class="posted_job_header Aubergine_at_night">
                                {{ !empty($v['profiles']['about'])? $v['profiles']['about'] : '-' }}
                            </div>
                            <div class="d-flex mt-3">
                                <button class="curv_cmn_btn">Skills 1</button>
                                <button class="curv_cmn_btn mx-4">Skills 2</button>
                                <button class="curv_cmn_btn">Skills 3</button>
                                <button class="curv_cmn_btn mx-4">Skills 4</button>
                            </div>
                        </div>
                    </div>
                </div>            
                @endforeach
                <div class="public_section">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('footer')
@include('website.include.footer')
@endsection