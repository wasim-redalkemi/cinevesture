@extends('layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-experience')

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
                        <div class="d-flex justify-content-between">
                            <div class="profile_cmn_head_text">Add Experience</div>
                            <div><i class="fa fa-trash-o  deep-pink icon-size" aria-hidden="true"></i></div>
                        </div>
                        <div class="hide-me float-left">
                            @include('include.flash_message')
                        </div>
                        <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('experience-store') }}">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="profile_input">
                                        <label>Job Title</label>
                                        <input type="text" class="form-control" placeholder="Job Title" name="job_title" value="{{ $experience->job_title }}"
                                            aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="profile_input">
                                        <label>Company</label>
                                        <input type="text" class="form-control" placeholder="Company" name="comapny" value="{{ $experience->comapny }}" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="profile_input">
                                        <label>Location</label>
                                        <input type="text" class="form-control" placeholder="Location" name="country_id" value="{{ $experience->country_id }}" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="profile_input">
                                        <label>Start Date</label>
                                        <input type="date" class="form-control" placeholder="DD/MM/YY" name="start_date" value="{{ $experience->start_date }}" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="profile_input">
                                        <label>End Date</label>
                                        <input type="date" class="form-control" placeholder="DD/MM/YY" name="end_date" value="{{ $experience->end_date }}" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="profile_input">
                                        <label>Employment Type</label>
                                        <div class="dropdown profile_dropdown_btn">
                                            <button
                                                class="btn dropdown-toggle d-flex align-items-center profile_dropdown_btn"
                                                href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                                        <label>Description</label>
                                        <textarea class="form-control" name="description" aria-label="With textarea">{{ $experience->description }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex justify-content-end mt-4">
                                        <button class="cancel_btn mx-3">Cancel</button>
                                        <button class="save_add_btn">Save & add another</button>
                                        <button type="submit" class="guide_profile_btn mx-3">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer')
    @include('include.footer')
@endsection