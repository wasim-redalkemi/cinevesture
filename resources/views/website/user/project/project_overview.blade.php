@extends('website.layouts.app',['class' => 'bg_white'])

@section('title','Project-overview')

@section('header')
@include('website.include.header')
@endsection

@section('content')
<div class="hide-me animation for_authtoast">
    @include('website.include.flash_message')
</div>
@include('website.user.project.project_pagination',['page_bg' => '1'])


<!-- Overview section -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="profile_wraper profile_wraper_padding my-4">
                    <form role="form" class="validateBeforeSubmit" method="POST" enctype="multipart/form-data" action="{{ route('validate-project-overview') }}">
                        @csrf
                        <div>
                            <p class="flow_step_text"> Overview</p>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="profile_input">
                                    <label>Project Name <span style = "color:red">*</span></label>  
                                    <input type="text" class="form-control @error('project_name') is-invalid @enderror" name="project_name" placeholder="Project Name" value="@if (!empty($projectData[0]['project_name'])){{$projectData[0]['project_name']}} @endif" aria-label="Username" aria-describedby="basic-addon1" maxlength="100" autofocus required>                                    
                                    @error('project_name')
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
                                    <label>Type of Project <span style = "color:red">*</span></label>
                                        <select name="project_type_id" id="lang" required>
                                            <option value="">Select</option>
                                            @foreach($project_types as $type)
                                            <option @if(!empty($projectData[0]['project_type'])) @if ($projectData[0]['project_type']['id'] == $type->id) {{'selected'}} @endif @endif value="{{$type->id}}">{{$type->name}}</option>
                                             @endforeach
                                        </select>
                                        @error('project_type_id')
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
                                    <label>Who are you listing this project as? <span style = "color:red">*</span></label>
                                    <div class="d-flex">
                                        <div class="checkbox_btn d-flex align-items-center">
                                            <input type="radio" class="checkbox_btn" name="listing_project_as" value="Individual" @if(isset($projectData[0]['listing_project_as']))
                                            @if ("individual" == $projectData[0]['listing_project_as']) 
                                            {{'checked'}}
                                            @endif

                                            @endif aria-label="" required>
                                            <div class="radio_btn_label"> Individual</div>
                                        </div>
                                        <div class="checkbox_btn d-flex align-items-center mx-4">
                                            <input type="radio" class="checkbox_btn" name="listing_project_as" value="Organization" @if(isset($projectData[0]['listing_project_as']))
                                            @if ("organization" == $projectData[0]['listing_project_as'])
                                            {{'checked'}}
                                            @endif
                                            @endif aria-label="">
                                            <div class="radio_btn_label"> Organization</div>
                                        </div>
                                        @error('listing_project_as')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="select2forError">
                                    <label>Select Country <span style = "color:red">*</span></label>
                                    <select class="js-select2 @error('countries') is-invalid @enderror" name="countries[]"  required multiple="multiple">
                                        @foreach ($country as $k=>$v)
                                            <option value="{{ $v->id }}"@if(!empty($projectData[0]['project_countries'] )&&(in_array($v->id, $projectData[0]['project_countries'])))selected @endif>{{  $v->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('countries')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mt_16 select2forError">
                                    <label>Select Language <span style = "color:red">*</span></label>
                                    <select class="js-select2 @error('languages') is-invalid @enderror" name="languages[]" required multiple="multiple">
                                        @foreach ($languages as $k=>$v)
                                            <option value="{{ $v->id }}"@if(!empty($projectData[0]['project_languages'] )&&(in_array($v->id, $projectData[0]['project_languages'])))selected @endif>{{  $v->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('languages')
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
                                    <label>Locations (Optional)</label>
                                    <input type="text" class="form-control @error('location') is-invalid @enderror" name="location" placeholder="Locations (Optional)" value="@if (!empty($projectData[0]['location'])) {{$projectData[0]['location']}} @endif" aria-label="Username" aria-describedby="basic-addon1" maxlength="100">
                                    @error('location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <label>Please specify where you intend to create and complete the project </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-end mt-4">
                                    <input type="hidden" name="project_id" value="<?php if(isset($_REQUEST['id'])) {echo $_REQUEST['id'];}?>">
                                    <button class="cancel_btn mx-3">Discard</button>
                                    <button type="submit" class="guide_profile_btn">Save & Next</button>
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
@include('website.include.footer')
@endsection

@push('scripts')
<script>

    $(document).ready(function(){
        $("#error-toast").toast("show");
        $("#success-toast").toast("show");
    });

    $(".js-select2").select2({
      closeOnSelect: false,
      placeholder: "Select",
      allowClear: true,
        language: {
      noResults: function() {
        return '<button class="no_results_btn">No Result Found</a>';
      },
    },
    escapeMarkup: function(markup) {
      return markup;
    },
  });
</script>
@endpush

{{-- @section('scripts')
<script>
      $(".js-select2").select2({
        closeOnSelect: false,
        placeholder: "Select",
        allowClear: true,
        language: {
      noResults: function() {
        return '<button class="no_results_btn">No Result Found</a>';
      },
    },
    escapeMarkup: function(markup) {
      return markup;
    },
    });
</script>
@endsection --}}
