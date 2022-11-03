@extends('website.layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-experience')

@section('header')
    @include('website.include.header')
@endsection

@section('content')

    <section class="profile-section">
    <div class="hide-me animation for_authtoast">
                @include('website.include.flash_message')
            </div>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include('website.include.profile_sidebar')
                </div>
                <div class="col-md-9">
                    <div class="profile_wraper profile_wraper_padding mt-md-0 mt-4">
                        <div class="d-flex justify-content-between">
                            <div class="profile_cmn_head_text">Add Experience</div>
                            <div class="icon_container">
                          <img src="{{ asset('public/images/asset/delete-icon.svg') }}"/>
                          </div> 
                        </div>
                        <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('experience-store') }}">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="profile_input">
                                        <label>Job Title</label>
                                        <input type="text" class="form-control @error('intro_video_link') is-invalid @enderror" placeholder="Job Title" name="job_title" value="<?php if(isset($experience)){ echo($experience->job_title); }?>"
                                            aria-label="Username" aria-describedby="basic-addon1">
                                        @error('intro_video_link')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                      
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="profile_input">
                                        <label>Company</label>
                                        <input type="text" class="form-control @error('comapny') is-invalid @enderror" placeholder="Company" name="comapny" value="<?php if(isset($experience)){ echo($experience->comapny); }?>" aria-label="Username" aria-describedby="basic-addon1">
                                        @error('comapny')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="profile_input">
                                        <label>Location</label>
                                        <input type="text" class="form-control @error('country_id') is-invalid @enderror" placeholder="Location" name="country_id" value="<?php if(isset($experience)){ echo($experience->country_id); }?>" aria-label="Username" aria-describedby="basic-addon1">
                                        @error('country_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="profile_input">
                                        <label>Start Date</label>
                                        <input type="date" class="form-control @error('start_date') is-invalid @enderror" placeholder="DD/MM/YY" name="start_date" value="<?php if(isset($experience)){ echo($experience->start_date); }?>" aria-label="Username" aria-describedby="basic-addon1">
                                        @error('start_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="profile_input">
                                        <label>End Date</label>
                                        <input type="date" class="form-control @error('end_date') is-invalid @enderror" placeholder="DD/MM/YY" name="end_date" value="<?php if(isset($experience)){ echo($experience->end_date); }?>" aria-label="Username" aria-describedby="basic-addon1">
                                        @error('end_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="profile_input">
                                        <label for="lang">Employment Type</label>
                                        <select name="employement_type_id" class="@error('employement_type_id') is-invalid @enderror" id="lang">
                                        <option value="">Select</option>
                                            <option value="Full-time">Full-time</option>
                                            <option value="Contract">Contract</option>
                                            <option value="Internship">Internship</option>
                                            <option value="Part-time">Part-time</option>
                                        </select>
                                        @error('employement_type_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="profile_input">
                                        <label>Description</label>
                                        <textarea class="form-control controlTextLength @error('description') is-invalid @enderror" text-length = "200" maxlength="200" name="description" aria-label="With textarea"><?php if(isset($experience)){ echo($experience->description); }?></textarea>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex justify-content-end mt-4">
                                    <a href="{{route('portfolio-create')}}"class="cancel_btn mx-3" style="text-decoration:none">Cancel</a>
                                        <button class="save_add_btn">Save & add another</button>
                                        <input type="hidden" name="flag" value="<?=request('flag')?>">
                                        <button type="submit" class="guide_profile_btn mx-3">Save & next</button>
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

@section('scripts')
    <script>
        $(function() {

            let datePicker = document.getElementById('datePicker');
            let picker = new Litepicker({
                element: datePicker,
                format: 'DD MMMM YYYY'
            });

            let dateRangePicker = document.getElementById('dateRangePicker');
            let pickerRange = new Litepicker({
                element: dateRangePicker,
                format: 'DD MMMM YYYY',
                singleMode: false,
            });
        });
    </script>
@endsection



@section('footer')
    @include('website.include.footer')
@endsection

@push('scripts')
<script>
    $(document).ready(function(){
        $("#error-toast").toast("show");
        $("#success-toast").toast("show");
    });
</script>
@endpush