@extends('layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-organisation')

@section('header')
@include('include.header')
@endsection

@section('content')

<section>
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-3 side-bar-cmn-part">
                <div class="search-box-container">
                    <form>
                        <input type="search" class="w-100 search-box" placeholder="Search...">
                        <button class="search-btn"></button>
                    </form>
                </div>
                <div class="dropdown search-page mt-3">
                    <button class="btn dropdown-toggle w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Genres
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item active" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </div>
                <div class="dropdown search-page">
                    <button class="btn dropdown-toggle w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categories
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item active" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </div>
                <div class="dropdown search-page">
                    <button class="btn dropdown-toggle w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Location
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item active" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </div>
                <div class="dropdown search-page">
                    <button class="btn dropdown-toggle w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Workspace Type
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item active" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </div>
                <div class="dropdown search-page">
                    <button class="btn dropdown-toggle w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Skills
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item active" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </div>
                <div class="form-check d-flex align-items-center mt-4">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="verified-text mx-2" for="flexCheckDefault">
                        Verified Projects
                    </label>
                </div>
            </div>
            <div class="col-md-9">
                <div class="profile_wraper profile_wraper_padding">
                    <div class="d-flex justify-content-between">
                        <div class="guide_profile_main_text">
                            Title Of The Job
                        </div>
                        <div class="pointer"><i class="fa fa-heart-o aubergine icon-size" aria-hidden="true"></i></div>
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
                        <div class="d-flex">
                            <button class="curv_cmn_btn">Skills 1</button>
                            <button class="curv_cmn_btn mx-4">Skills 2</button>
                            <button class="curv_cmn_btn">Skills 3</button>
                            <button class="curv_cmn_btn mx-4">Skills 4</button>
                        </div>
                        <div>
                            <button class="guide_profile_btn">Apply now</button>
                        </div>
                    </div>
                </div>
                <div class="profile_wraper profile_wraper_padding">
                    <div class="d-flex justify-content-between">
                        <div class="guide_profile_main_text">
                            Title Of The Job
                        </div>
                        <div class="pointer"><i class="fa fa-heart-o aubergine icon-size" aria-hidden="true"></i></div>
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
                        <div class="d-flex">
                            <button class="curv_cmn_btn">Skills 1</button>
                            <button class="curv_cmn_btn mx-4">Skills 2</button>
                            <button class="curv_cmn_btn">Skills 3</button>
                            <button class="curv_cmn_btn mx-4">Skills 4</button>
                        </div>
                        <div>
                            <button class="guide_profile_btn">Apply now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="public_section mb-5">
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
@include('include.footer')
@endsection