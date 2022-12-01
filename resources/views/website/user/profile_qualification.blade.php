@extends('website.layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-qualification')

@section('header')
    @include('website.include.header')
@endsection

@section('content')
<div class="hide-me animation for_authtoast">
    @include('website.include.flash_message')
</div>
    <section class="profile-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include('website.include.profile_sidebar')
                </div>
                <div class="col-md-9">
                    <div class="profile_wraper profile_wraper_padding mt-md-0 mt-4">
                        <div class="d-flex justify-content-between">
                            <div class="profile_cmn_head_text">Add Qualification</div>
                            {{-- <div class="icon_container">
                          <img src="{{ asset('public/images/asset/delete-icon.svg') }}"/>
                          </div>  --}}
                        </div>                       
                        <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('qualification-store') }}">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="profile_input">
                                        <label> Institute</label>
                                        <input type="text" class="form-control @error('institue_name') is-invalid @enderror" placeholder="Institute" name="institue_name"  value="{{ $qualification->institue_name}}" aria-label="Username" aria-describedby="basic-addon1">
                                        @error('institue_name')
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
                                        <label>Degree</label>
                                        <input type="text" class="form-control @error('degree_name') is-invalid @enderror" placeholder="Degree" aria-label="" name="degree_name" value="{{ $qualification->degree_name}}" aria-describedby="basic-addon1">
                                        @error('degree_name')
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
                                        <label>Field of Study</label>
                                        <input type="text" class="form-control @error('feild_of_study') is-invalid @enderror" placeholder="Field of Study" aria-label="Username" name="feild_of_study" value="{{ $qualification->feild_of_study}}" aria-describedby="basic-addon1">
                                        @error('feild_of_study')
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
                                        <label>Start Year</label>
                                        <input type="number" class="form-control @error('start_year') is-invalid @enderror" placeholder="YYYY" name="start_year" min="<?php echo date('Y',strtotime('-100year'));?>" max="<?php echo date('Y',strtotime('+100year'));?>" step="1" value="<?php echo date('Y');?>" aria-label="Username" aria-describedby="basic-addon1"0>
                                        @error('start_year')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="profile_input">
                                        <label>End Year</label>
                                        <input type="number" class="form-control @error('end_year') is-invalid @enderror" placeholder="YYYY" name="end_year" min="<?php echo date('Y',strtotime('-100year'));?>" max="<?php echo date('Y',strtotime('+100year'));?>" step="1" value="<?php echo date('Y');?>" aria-label="Username" aria-describedby="basic-addon1">
                                        @error('end_year')
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
                                        <textarea class="form-control controlTextLength @error('description') is-invalid @enderror" text-length = "600" maxlength="600" name="description" aria-label="With textarea">{{ $qualification->description }}</textarea>
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
                                        <button type="button" name="saveAndAnother" value="false" class="portfolio_save_btn save_add_btn">Save & add another</button>
                                        <input type="hidden" id="save_btn_value" name="saveButtonType" value="">
                                        <a href="{{route('experience-create')}}"class="cancel_btn mx-3" style="text-decoration:none">Cancel</a>
                                        <input type="hidden" name="flag" value="<?=request('flag')?>">
                                        <button type="button" name="saveAndNext" value="false" class="portfolio_save_btn guide_profile_btn mx-3">Save</button>
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

    $(".portfolio_save_btn").on("click", function () {
        $("#save_btn_value").attr("value", $(this).attr("name"))
        $(this).parents('form').submit();
    });
</script>
@endpush