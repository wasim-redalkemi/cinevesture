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
                <div class="profile_wraper profile_wraper_padding mt-md-0 mt-4">

                    <div class="profile_text">
                        <h1>Organisation</h1>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex align-items-center mt-4">
                                <div class="upload_logo_container"></div>
                                <div class="mx-4">
                                    <div class="organisation_cmn_text">Upload Logo</div>
                                    <div class="organisation_cmn_text deep-pink mt-1">Delete</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="profile_input">
                                <label>Name</label>
                                <input type="text" class="form-control" placeholder="Project Title" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="profile_input">
                                <label>Organisation Type</label>
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
                        <div class="col-md-12">
                            <div class="profile_input">
                                <label>About</label>
                                <textarea class="form-control" aria-label="With textarea"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="profile_input">
                                <label>Services</label>
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
                                <label>Located In</label>
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
                        <div class="col-md-3">
                            <div class="profile_input">
                                <label>Available To Work In</label>
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
                        <div class="col-md-3">
                            <div class="profile_input">
                                <label>Languages Spoken</label>
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
                                <label>IMDB Profile</label>
                                <input type="text" class="form-control" placeholder="IMDB Profile" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="profile_input">
                                <label>LinkedIn Profile</label>
                                <input type="text" class="form-control" placeholder="LinkedIn Profile" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="profile_input">
                                <label>Website</label>
                                <input type="text" class="form-control" placeholder="Website" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="profile_input">
                                <label>Introduction Video</label>
                                <input type="text" class="form-control" placeholder="Please link here" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-md-3 d-flex align-items-end">
                            <div>
                                <button class="save_add_btn">Add another</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="profile_input">
                                <label>Team size</label>
                                <input type="text" class="form-control" placeholder="Team size" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 d-flex my-2 align-items-center">
                            <div class="organisation_cmn_text deep-pink">
                                <h6>Team members</h6>
                            </div>
                            <div class="mx-5 icon_container"><i class="fa fa-plus icon-size deep-pink" aria-hidden="true"></i></div>
                        </div>
                        <div class="col-md-3">
                            <div><img src="{{ asset('public/images/asset/photo-1595152452543-e5fc28ebc2b8 2.png') }}" class="w-100"></div>
                            <div class="d-flex justify-content-between mt-3">
                                <div class="organisation_cmn_text">Title</div>
                                <div class="icon_container"><i class="fa fa-times-circle icon-size deep-pink" aria-hidden="true"></i></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div><img src="{{ asset('public/images/asset/67a6c213a22d2ba4c3982a55d828b5c7 1.png') }}" class="w-100"></div>
                            <div class="d-flex justify-content-between mt-3">
                                <div class="organisation_cmn_text">Title</div>
                                <div class="icon_container"><i class="fa fa-times-circle icon-size deep-pink" aria-hidden="true"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-end mt-4">
                                <button class="cancel_btn mx-3">Discard</button>
                                <button class="guide_profile_btn mx-3">Save</button>
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
  @include('include.footer')      
@endsection