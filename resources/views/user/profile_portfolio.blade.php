@extends('layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-portfolio')

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
                            <div class="profile_cmn_head_text">Add Portfolio</div>
                            <div><i class="fa fa-trash-o  deep-pink icon-size" aria-hidden="true"></i></div>
                            </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="profile_input">
                                    <label>Project Title</label>
                                    <input type="text" class="form-control" placeholder="Project Title"
                                        aria-label="Username" aria-describedby="basic-addon1">
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
                            <div class="col-md-6">
                                <div class="profile_input">
                                    <label>Project specific Skills</label>
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
                            <div class="col-md-6">
                                <div class="profile_input">
                                    <label>Project specific Skills</label>
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
                            <div class="col-md-6">
                                <div class="profile_input">
                                    <label>Project Location (Where it took place)</label>
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
                            <div class="col-md-3">
                                <div class="profile_input">
                                    <label>Completion Date</label>
                                    <input type="text" class="form-control" placeholder="First Name"
                                    aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="profile_input">
                                  <div>  <label>Project Files</label></div>
                                    <label class="mt-3">Video Link</label>
                                    <input type="text" class="form-control" placeholder="First Name"
                                    aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-md-3 d-flex align-items-end">
                             <div>
                             <button class="save_add_btn">Add another</button>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                            <div class="profile_upload_container ">
                                <div>
                                    <div class="text-center"> <i class="fa fa-plus-circle mx-2 profile_icon deep-pink"
                                            aria-hidden="true"></i></div>
                                    <div>Upload</div>
                                </div>
                                </div>
                                <div class="profile_upload_text"> Upload JPG or PNG, 400x400 PX</div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-end mt-4">
                                <button class="cancel_btn mx-3">Cancel</button>
                                <button class="save_add_btn">Save & add another</button>
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