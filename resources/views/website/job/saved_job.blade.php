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
                <div class="profile_wraper profile_wraper_padding mt-md-0 mt-4">
                    <div class="profile_text">
                        <h1>Saved Jobs</h1>
                    </div>
                </div>
                <div class="profile_wraper profile_wraper_padding">
                    <div class="d-flex justify-content-between">
                        <div class="guide_profile_main_text">
                            Title Of The Job
                        </div>
                        <div class="pointer"><i class="fa fa-heart aubergine icon-size" aria-hidden="true"></i></div>
                    </div>
                    <div class="posted_job_header">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </div>
                    <div class="preview_headtext lh_54 candy-pink">
                        Company Name - Location Company Name - Location
                    </div>
                    <div class="posted_job_header Aubergine_at_night">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </div>
                    <div class="d-flex justify-content-between mt-4">
                        <div class="d-flex flex-wrap">
                            <button class="curv_cmn_btn skill_container">Skills 1</button>
                            <button class="curv_cmn_btn skill_container">Skills 2</button>
                            <button class="curv_cmn_btn skill_container">Skills 3</button>
                            <button class="curv_cmn_btn skill_container">Skills 4</button>
                        </div>
                        <div>
                            <button class="guide_profile_btn ">Apply now</button>
                        </div>
                    </div>
                </div>

                <div class="profile_wraper profile_wraper_padding">
                    <div class="d-flex justify-content-between">
                        <div class="guide_profile_main_text">
                            Title Of The Job
                        </div>
                        <div class="pointer"><i class="fa fa-heart aubergine icon-size" aria-hidden="true"></i></div>
                    </div>
                    <div class="posted_job_header">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </div>
                    <div class="preview_headtext lh_54 candy-pink">
                        Company Name - Location Company Name - Location
                    </div>
                    <div class="posted_job_header Aubergine_at_night">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </div>
                    <div class="d-flex justify-content-between mt-4">
                        <div class="d-flex flex-wrap">
                            <button class="curv_cmn_btn skill_container">Skills 1</button>
                            <button class="curv_cmn_btn skill_container">Skills 2</button>
                            <button class="curv_cmn_btn skill_container">Skills 3</button>
                            <button class="curv_cmn_btn skill_container">Skills 4</button>
                            <button class="curv_cmn_btn skill_container">Skills 4</button>
                        </div>
                        <div>
                            <button class="guide_profile_btn">Apply now</button>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
        <div class="public_section mb-4">
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
</section>

@endsection

@section('footer')
@include('website.include.footer')
@endsection

@section('scripts')

<script type="text/javascript">
    $(".portfolio.owl-carousel").owlCarousel({
        center: true,
        autoPlay: 3000,
        autoplay: true,
        loop: true,
        nav: true,
        center: true,
        margin: 10,
        items: 5,
        responsive: {
            480: {
                items: 3
            },
            768: {
                items: 4
            },
            1024: {
                items: 5
            }
        },
    });
    $(".project.owl-carousel").owlCarousel({
        center: true,
        autoPlay: 3000,
        autoplay: true,
        loop: true,
        nav: true,
        center: true,
        margin: 10,
        items: 3,
        responsive: {
            480: {
                items: 1
            },
            768: {
                items: 2
            },
            1024: {
                items: 3
            }
        },
    });
</script>
@endsection