@extends('layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-organisation')

@section('header')
@include('include.header')
@endsection

@section('content')
<section class="">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="d-flex align-items-center justify-content-center mt-5">
                    <div class="flow_container">1</div>
                    <hr class="flow_hr">
                    <div class="flow_container opacity-50">2</div>
                    <hr class="flow_hr">
                    <div class="flow_container opacity-50">3</div>
                    <hr class="flow_hr">
                    <div class="flow_container opacity-50">4</div>
                    <hr class="flow_hr">
                    <div class="flow_container opacity-50">5</div>
                    <hr class="flow_hr">
                    <div class="flow_container opacity-50">6</div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Overview section -->
<section>
    <div class="container profile_wraper profile_wraper_padding mt-4">
        <div class="row">
            <div class="col-md-12">
                <p class="flow_step_text"> Overview</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="profile_input">
                    <label>Project Name *</label>
                    <input type="text" class="form-control" name="" placeholder="Project Name" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="profile_input">
                    <label>Type of Project *</label>
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
                    <label>Who are you listing this project as? *</label>
                    <div class="d-flex">
                        <div class="checkbox_btn d-flex">
                            <input type="radio" class="checkbox_btn" name="" aria-label="">
                            <div class="verified-text mx-2"> Individual</div>
                        </div>
                        <div class="checkbox_btn d-flex mx-3">
                            <input type="radio" aria-label="">
                            <div class="verified-text mx-2"> Organization</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="profile_input">
                    <label>Select Country *</label>
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
            <div class="col-md-6">
                <div class="profile_input">
                    <label>Select Language *</label>
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
            <div class="col-md-6">
                <div class="profile_input">
                    <label>Locations (Optional)</label>
                    <input type="text" class="form-control" name="" placeholder="Locations (Optional)" aria-label="Username" aria-describedby="basic-addon1">
                    <label>Please specify where you intend to create and complete the project </label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-end mt-4">
                    <button class="cancel_btn mx-3">Discard</button>
                    <button class="guide_profile_btn">Save & Next</button>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Detail section  -->
<section>
    <div class="container profile_wraper profile_wraper_padding mt-4">
        <div class="row">
            <div class="col-md-12">
                <p class="flow_step_text"> Details</p>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6">
                <div class="profile_input">
                    <label>Category (Optional)</label>
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
            <div class="col-md-6">
                <div class="profile_input">
                    <label>Genre *</label>
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
                    <label>Duration (Optional)</label>
                    <input type="text" class="form-control" name="" placeholder="hr:min" aria-describedby="basic-addon1">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="profile_input">
                    <label>Total Budget (USD) *</label>
                    <input type="text" class="form-control" name="" placeholder="Empty input">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="profile_input">
                    <label>Financing Secured (USD) *</label>
                    <input type="text" class="form-control" name="" placeholder="Empty input">
                </div>
            </div>
        </div>
        <div class="associate_text mt-4">Associated with the project (Optional)</div>
        <div class="row">
            <div class="col-md-3">
                <div class="profile_input">
                    <label>Title</label>
                    <input type="text" class="form-control" name="" placeholder="Title" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="col-md-3">
                <div class="profile_input">
                    <label>Name</label>
                    <input type="text" class="form-control" name="" placeholder="Locations (Optional)" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="col-md-3  d-flex align-items-end pb-2 mt-2 mt-md-0">
                <i class="fa fa-times-circle deep-pink icon-size" aria-hidden="true"></i>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="profile_input">
                    <label>Title</label>
                    <input type="text" class="form-control" name="" placeholder="Title" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="col-md-3">
                <div class="profile_input">
                    <label>Name</label>
                    <input type="text" class="form-control" name="" placeholder="Locations (Optional)" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="col-md-3 d-flex align-items-end mt-2 mt-md-0">
                <div>
                    <button class="save_add_btn">Add another</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-end mt-5 pt-5 pb-md-0">
                    <button class="cancel_btn mx-3">Go back</button>
                    <button class="guide_profile_btn">Save & Next</button>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Description section -->
<section>
    <div class="container profile_wraper profile_wraper_padding mt-4">
        <div class="row">
            <div class="col-md-12">
                <p class="flow_step_text pb-0"> Description</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="profile_input">
                    <label>Logline *</label>
                    <input type="text" class="form-control" name="" placeholder="Logline">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="profile_input">
                    <label>Synopsis/Brief Description *</label>
                    <textarea class="form-control" aria-label="With textarea"></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="profile_input">
                    <label>Director/Creator/Founder’s Statement *</label>
                </div>
                <textarea class="form-control" style="border: 1px solid #4D0D8A;" id="textAreaExample3" rows="1"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-end mt-5 pt-0 pt-md-5">
                    <button class="cancel_btn mx-3">Go back</button>
                    <button class="guide_profile_btn">Save & Next</button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Gallery section -->
<section>
    <div class="container profile_wraper profile_wraper_padding mt-4">
        <div class="row">
            <div class="col-md-12">
                <p class="flow_step_text pb-0">Gallery</p>
            </div>
        </div>
        <div class="guide_profile_main_text Aubergine_at_night mt-2">Videos</div>
        <div class="row">
            <div class="col-md-3">
                <div class="img-container">
                    <img src="{{ asset('public/images/asset/ba947a848086b8f90238636dcf7efdb5 1.png') }}" class="width_inheritence" alt="image">
                    <div class="project_card_data w-100 h-100">
                        <div>
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
                <div class="profile_input">
                    <input type="text" class="form-control" name="" placeholder="Video Title">
                </div>
            </div>
            <div class="col-md-3">
                <div class="profile_upload_container h_78 mt-3 mt-md-0">
                    <div class="text-center">
                        <div>
                            <i class="fa fa-plus-circle deep-pink icon-size" aria-hidden="true"></i>
                        </div>
                        <div class="mt-3 movie_name_text">Upload file</div>
                    </div>
                </div>
                <div class="profile_input">
                    <input type="text" class="form-control" name="" placeholder="Paste Link Here">
                </div>
            </div>
            <div class="d-flex mt-5 mt-md-3">
                <div> <input type="radio" class="checkbox_btn" name="" aria-label=""></div>
                <div class="verified-text mx-2"> Make Feature Vedio</div>
            </div>
        </div>
        <div class="guide_profile_main_text Aubergine_at_night mt-2">Photos</div>
        <div class="row">
            <div class="col-md-3">
                <div class="img-container">
                    <img src="{{ asset('public/images/asset/ba947a848086b8f90238636dcf7efdb5 1.png') }}" class="width_inheritence" alt="image">
                    <div class="project_card_data w-100 h-100">
                        <div>
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
                <div class="profile_input">
                    <input type="text" class="form-control" name="" placeholder="Photo Title">
                </div>
            </div>
            <div class="col-md-3">
                <div class="profile_upload_container h_78 mt-3 mt-md-0">
                    <div class="text-center">
                        <div>
                            <i class="fa fa-plus-circle deep-pink icon-size" aria-hidden="true"></i>
                        </div>
                        <div class="mt-3 movie_name_text">Upload file</div>
                    </div>
                </div>
                <div class="profile_upload_text">Upload JPG or PNG, 1600x900 PX, max size 4MB</div>
            </div>
            <div class="d-flex mt-3">
                <input type="radio" class="checkbox_btn" name="" aria-label="">
                <div class="verified-text mx-2"> Make Feature Vedio</div>
            </div>
        </div>
        <div class="guide_profile_main_text Aubergine_at_night mt-3 mb-2">Documents</div>
        <div class="row">
            <div class="col-md-3">
                <div class="document_pdf">
                    <div class="upload_loder">
                        <i class="fa fa-file-text deep-pink icon-size" aria-hidden="true"></i>
                    </div>
                    <div>
                        <div class="guide_profile_main_subtext Aubergine_at_night">Lorem ipsum.pdf</div>
                        <div class="proctect_by_capta_text Aubergine_at_night">64.32 KB</div>
                    </div>
                    <div><i class="fa fa-times" aria-hidden="true"></i></div>
                </div>
                <div class="profile_input">
                    <input type="text" class="form-control" name="" placeholder="PDF title">
                </div>
            </div>
            <div class="col-md-3">
                <div class="profile_upload_container h_69 mt-3 mt-md-0 d-flx">
                    <div>
                        <i class="fa fa-plus-circle deep-pink icon-size" aria-hidden="true"></i>
                    </div>
                    <div class=" movie_name_text mx-3 mt-0">Upload file</div>
                </div>
                <div class="profile_upload_text">Upload PDF only</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-end mt-5">
                    <button class="cancel_btn mx-3">Go back</button>
                    <button class="guide_profile_btn">Save & Next</button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Requirements section -->
<section>
    <div class="container profile_wraper profile_wraper_padding mt-4">
        <div class="row">
            <div class="col-md-12">
                <p class="flow_step_text pb-0">Requirements</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="profile_input">
                    <label>Project Stage *</label>
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
            <div class="col-md-4">
                <div class="profile_input">
                    <label>Looking for *</label>
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
            <div class="col-md-4">
                <div class="profile_input">
                    <label>If Startup, What stage of funding are you at?</label>
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
            <div class="col-md-4">
                <div class="profile_input">
                    <label>Crowdfunding Link (Optional)</label>
                    <input type="text" class="form-control" name="" placeholder="Title" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>
        </div>
        <div class="flow_step_text mt-3">Milestones</div>
        <div class="row">
            <div class="col-md-5">
                <div class="profile_input">
                    <label>Milestone Description</label>
                    <input type="text" class="form-control" name="" placeholder="Milestone Description">
                </div>
            </div>
            <div class="col-md-2">
                <div class="profile_input">
                    <label>Milestone Budget (USD)</label>
                    <input type="text" class="form-control" name="" placeholder="Milestone Budget (USD)">
                </div>
            </div>
            <div class="col-md-2">
                <div class="profile_input">
                    <label>Target Date</label>
                    <input type="text" class="form-control" name="" placeholder="Target Date">
                </div>
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <div class="d-flex">
                    <input type="radio" class="checkbox_btn" name="" aria-label="">
                    <div class="verified-text deep-pink mx-2"> Make Complete</div>
                </div>
            </div>
        </div>
        <div><button class="save_add_btn mt-5">Add another Milestone</button></div>
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-end mt-5 pt-5 pb-md-0">
                    <button class="cancel_btn mx-3">Go back</button>
                    <button class="guide_profile_btn">Save & Next</button>
                </div>
            </div>
        </div>


    </div>
</section>


@endsection

@section('footer')
@include('include.footer')
@endsection

@section('scripts')
@endsection