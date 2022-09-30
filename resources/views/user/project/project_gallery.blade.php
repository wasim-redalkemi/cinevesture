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
                <!-- <div class=" mt-2">
                <div class="d-flex align-items-center">
                    <div class="w_14">Overview</div>
                    <div class="w_14">Details</div>
                    <div class="w_14">Description</div>
                    <div class="w_14">Gallery</div>
                    <div class="w_14">Requirements & Milestones</div>
                    <div class="w_14">Preview</div>
                </div>
                </div> -->


            </div>
        </div>
    </div>
</section>


<!-- Gallery section -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="profile_wraper profile_wraper_padding mt-4">
                    <p class="flow_step_text pb-0">Gallery</p>
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