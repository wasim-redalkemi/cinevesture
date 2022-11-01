@extends('website.layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-organisation')

@section('header')
@include('website.include.header')
@endsection

@section('content')

<section class="guide_profile_section my-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-sm-0">
                <div class="content_wraper">
                    <div class="guide_profile_subsection">
                        <div class="contact-page-text deep-aubergine">Post a job</div>
                    </div>
                    <div class="guide_profile_subsection">
                        <div class="guide_profile_main_text mt-3">Basic Information</div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="profile_input">
                                    <label>Title Of The Job</label>
                                    <input type="text" class="form-control" name="" placeholder="Title" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-3">
                                <div class="profile_input">
                                    <label>Title Of The Job</label>
                                    <div class="dropdown profile_dropdown_btn">
                                        <button class="btn dropdown-toggle d-flex align-items-center profile_dropdown_btn" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Genres
                                        </button>
                                        <ul class="dropdown-menu w-100 profile_dropdown_menu">
                                            <li>
                                                Features
                                            </li>
                                            <li>
                                                Animation
                                            </li>
                                            <li>
                                                Biography
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-3">
                                <div class="profile_input">
                                    <label>Title Of The Job</label>
                                    <div class="dropdown profile_dropdown_btn">
                                        <button class="btn dropdown-toggle d-flex align-items-center profile_dropdown_btn" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Genres
                                        </button>
                                        <ul class="dropdown-menu w-100 profile_dropdown_menu">
                                            <li>
                                                Features
                                            </li>
                                            <li>
                                                Animation
                                            </li>
                                            <li>
                                                Biography
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="profile_input">
                                    <label>Company Name</label>
                                    <input type="text" class="form-control" name="" placeholder="Company Name" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-3">
                                <div class="profile_input">
                                    <label>Location</label>
                                    <input type="text" class="form-control" name="" placeholder="Location" aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="guide_profile_subsection">
                        <div class="guide_profile_main_text mt-3">Job Description</div>
                        <div class="profile_input">
                            <textarea class="form-control" aria-label="With textarea" placeholder="Your answer here"></textarea>
                        </div>
                    </div>
                    <div class="guide_profile_subsection">
                        <div class="guide_profile_main_text mt-3">Skills Required</div>
                        <div class="profile_input">
                            <label>Skills (You can add upto 10 skills)</label>
                            <input type="text" class="form-control" name="" placeholder="Skills" aria-describedby="basic-addon1">
                        </div>
                        <div class="search-head-subtext mt-3">Suggested Skills</div>
                        <div class="d-flex my-2">
                            <button class="curv_cmn_btn">Lorem ipsim +</button>
                            <button class="curv_cmn_btn mx-3">Lorem ipsim +</button>
                        </div>
                        <div class="d-flex justify-content-center mt-5 mb-4">
                            <button class="cancel_btn mx-5">Save as Draft</button>
                            <button class="guide_profile_btn">Publish</button>
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