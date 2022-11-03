@extends('website.layouts.app',['class' => 'bg_white'])

@section('title','Project-overview')

@section('header')
@include('website.include.header')
@endsection

@section('content')
<div class="hide-me animation for_authtoast">
    @include('website.include.flash_message')
</div>
@include('website.user.project.project_pagination')


<!-- Overview section -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="profile_wraper profile_wraper_padding mt-4">
                    <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('project-overview-store') }}">
                        @csrf
                        <div>
                            <p class="flow_step_text"> Overview</p>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="profile_input">
                                    <label>Project Name *</label>
                                    <input type="text" class="form-control" name="project_name" placeholder="Project Name" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="profile_input">
                                    <label>Type of Project *</label>
                                        <select name="project_type_id" id="lang">
                                            <option value="test1">test1</option>
                                            <option value="test1">test1</option>
                                        </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="profile_input">
                                    <label>Who are you listing this project as? *</label>
                                    <div class="d-flex">
                                        <div class="checkbox_btn d-flex">
                                            <input type="radio" class="checkbox_btn" name="listing_project_as" value="Individual" aria-label="">
                                            <div class="verified-text mx-2"> Individual</div>
                                        </div>
                                        <div class="checkbox_btn d-flex mx-3">
                                            <input type="radio" class="checkbox_btn" name="listing_project_as" value="Organization" aria-label="">
                                            <div class="verified-text mx-2"> Organization</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="mt_16">
                                    <label>Select Country *</label>
                                    <select class="js-select2" name="countries[]" multiple="multiple">
                                        @foreach ($country as $k=>$v)
                                            <option value="{{ $v->id }}">{{  $v->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mt_16">
                                    <label>Select Language *</label>
                                    <select class="js-select2" name="languages[]" multiple="multiple">
                                        @foreach ($languages as $k=>$v)
                                            <option value="{{ $v->id }}">{{  $v->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="profile_input">
                                    <label>Locations (Optional)</label>
                                    <input type="text" class="form-control" name="location" placeholder="Locations (Optional)" aria-label="Username" aria-describedby="basic-addon1">
                                    <label>Please specify where you intend to create and complete the project </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-end mt-4">
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
      placeholder: "Placeholder",
      allowClear: true,
      tags: true
  });
</script>
@endpush

{{-- @section('scripts')
<script>
      $(".js-select2").select2({
        closeOnSelect: false,
        placeholder: "Placeholder",
        allowClear: true,
        tags: true
    });
</script>
@endsection --}}