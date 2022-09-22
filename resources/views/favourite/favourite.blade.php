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
                <div class="profile_text">
                    <h1>Favourites</h1>
                </div>
                <div class="preview_headtext mb-3 deep-pink">Projects</div>
                <div class="row">
                    <div class="col-md-4">
                        <div> <img src="{{ asset('public/images/asset/ba947a848086b8f90238636dcf7efdb5 1.png') }}" class="" width=100% alt="image"></div>
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="movie_name_text">Movie Title </div>
                            <i class="fa fa fa-heart aubergine icon-size" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div> <img src="{{ asset('public/images/asset/ba947a848086b8f90238636dcf7efdb5 1.png') }}" class="" width=100% alt="image"></div>
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="movie_name_text">Movie Title </div>
                            <i class="fa fa fa-heart aubergine icon-size" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div> <img src="{{ asset('public/images/asset/ba947a848086b8f90238636dcf7efdb5 1.png') }}" class="" width=100% alt="image"></div>
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="movie_name_text">Movie Title </div>
                            <i class="fa fa fa-heart aubergine icon-size" aria-hidden="true"></i>
                        </div>
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
                <div class="profile_wraper profile_wraper_padding mt-4">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="user_profile_container">
                                <img src="{{ asset('public/images/asset/user-profile.png') }}" />
                            </div>
                        </div>
                        <div class="col-md-10">

                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                    <span class="guide_profile_main_text"> Lorem Ipsum</span>
                                    <button class="verified_cmn_btn mx-3"> <i class="fa fa-check-circle hot-pink mx-1" aria-hidden="true"></i> VERIFIED</button>
                                </div>
                                <div class="pointer"><i class="fa fa fa-heart aubergine icon-size" aria-hidden="true"></i></div>
                            </div>
                            <div class="posted_job_header">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </div>
                            <div class="preview_headtext lh_54 candy-pink">
                                Location
                            </div>
                            <div class="posted_job_header Aubergine_at_night">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
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
                <div class="profile_wraper profile_wraper_padding mt-md-0 mt-4">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="user_profile_container">
                                <img src="{{ asset('public/images/asset/user-profile.png') }}" />
                            </div>
                        </div>
                        <div class="col-md-10">

                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                    <span class="guide_profile_main_text"> Lorem Ipsum</span>
                                    <button class="verified_cmn_btn mx-3"> <i class="fa fa-check-circle hot-pink mx-1" aria-hidden="true"></i> VERIFIED</button>
                                </div>
                                <div class="pointer"><i class="fa fa fa-heart aubergine icon-size" aria-hidden="true"></i></div>
                            </div>
                            <div class="posted_job_header">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </div>
                            <div class="preview_headtext lh_54 candy-pink">
                                Location
                            </div>
                            <div class="posted_job_header Aubergine_at_night">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
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
@include('include.footer')
@endsection