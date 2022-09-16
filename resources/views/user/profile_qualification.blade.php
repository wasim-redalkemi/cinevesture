@extends('layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-qualification')

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
                        <div class="profile_cmn_head_text">Add Qualification</div>
                        <div><i class="fa fa-trash-o  deep-pink icon-size" aria-hidden="true"></i></div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="profile_input">
                                    <label> Institute</label>
                                    <input type="text" class="form-control" placeholder="Institute"
                                        aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="profile_input">
                                    <label>Degree</label>
                                    <input type="text" class="form-control" placeholder="Company" aria-label="Username"
                                        aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="profile_input">
                                    <label>Field of Study</label>
                                    <input type="text" class="form-control" placeholder="Location" aria-label="Username"
                                        aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="profile_input">
                                    <label>Start Date</label>
                                    <input type="text" class="form-control" placeholder="DD/MM/YY" aria-label="Username"
                                        aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="profile_input">
                                    <label>End Date</label>
                                    <input type="text" class="form-control" placeholder="DD/MM/YY" aria-label="Username"
                                        aria-describedby="basic-addon1">
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
                                    <textarea class="form-control" aria-label="With textarea"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-end mt-4">
                                    <button class="save_add_btn">Add another</button>
                                    <button class="cancel_btn mx-3">Cancel</button>
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