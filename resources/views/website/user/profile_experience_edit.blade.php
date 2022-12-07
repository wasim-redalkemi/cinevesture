@extends('website.layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-experience')

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
                        <div class="d-flex justify-content-between">
                            <div class="profile_cmn_head_text">Edit Experience</div>
                            <div>
                                <a class="confirmAction" href="{{route('experience-delete',['id'=>$UserExperienceData->id])}}">
                                    <img src="{{ asset('images/asset/delete-icon.svg') }}"/>
                                    {{-- <i class="fa fa-trash-o  deep-pink icon-size" aria-hidden="true"></i> --}}
                                </a>
                            </div>
                        </div>
                        <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('experience-edit-store',['id'=>$UserExperienceData->id]) }}">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="profile_input">
                                        <label>Job Title</label>
                                        <input type="text" class="form-control @error('job_title') is-invalid @enderror" placeholder="Job Title" name="job_title" value="<?php if(isset($UserExperienceData->job_title)){ echo($UserExperienceData->job_title); }?>"
                                            aria-label="Username" aria-describedby="basic-addon1">
                                        @error('job_title')
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
                                        <input type="text" class="form-control @error('comapny') is-invalid @enderror" placeholder="Company" name="comapny" value="<?php if(isset($UserExperienceData->comapny)){ echo($UserExperienceData->comapny); }?>" aria-label="Username" aria-describedby="basic-addon1">
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
                                        <input type="text" class="form-control @error('country_id') is-invalid @enderror" placeholder="Location" name="country_id" value="<?php if(isset($UserExperienceData->country_id)){ echo($UserExperienceData->country_id); }?>" aria-label="Username" aria-describedby="basic-addon1">
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
                                        <input type="date" class="form-control @error('start_date') is-invalid @enderror" placeholder="DD/MM/YY" name="start_date" value="{{ date("Y-m-d",strtotime($UserExperienceData->start_date)) }}" aria-label="Username" aria-describedby="basic-addon1">
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
                                        <input type="date" class="form-control @error('end_date') is-invalid @enderror" placeholder="DD/MM/YY" name="end_date" value="{{ date("Y-m-d",strtotime($UserExperienceData->end_date)) }}" aria-label="Username" aria-describedby="basic-addon1">
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
                                            <option 
                                            @php
                                            if ($UserExperienceData == $UserExperienceData->employement_type_id) {
                                                echo 'selected';
                                            }
                                            @endphp
                                             value="Full-time">Full-time</option>
                                            <option
                                            @php
                                            if ($UserExperienceData == $UserExperienceData->employement_type_id) {
                                                echo 'selected';
                                            }
                                            @endphp
                                             value="Contract">Contract</option>
                                            <option
                                            @php
                                            if ($UserExperienceData == $UserExperienceData->employement_type_id) {
                                                echo 'selected';
                                            }
                                            @endphp
                                             value="Internship">Internship</option>
                                            <option
                                            @php
                                            if ($UserExperienceData == $UserExperienceData->employement_type_id) {
                                                echo 'selected';
                                            }
                                            @endphp
                                             value="Part-time">Part-time</option>
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
                                        <textarea class="form-control controlTextLength @error('description') is-invalid @enderror" text-length = "600" maxlength="600" name="description" aria-label="With textarea"><?php if(isset($UserExperienceData->description)){ echo($UserExperienceData->description); }?></textarea>
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
                                        <button class="cancel_btn mx-3">Cancel</button>
                                        <button type="button" name="saveAndAnother" value="false" class="portfolio_save_btn save_add_btn">Save & add another</button>
                                        <input type="hidden" id="save_btn_value" name="saveButtonType" value="">
                                        <input type="hidden" name="experience_id" value="{{ $UserExperienceData->id }}">
                                        <button type="button" name="saveAndNext" value="false" class="portfolio_save_btn guide_profile_btn mx-3">Save & next</button>
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

    $(".portfolio_save_btn").on("click", function () {
        $("#save_btn_value").attr("value", $(this).attr("name"))
        $(this).parents('form').submit();
    });
</script>
@endpush