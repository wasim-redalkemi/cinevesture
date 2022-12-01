@extends('website.layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-portfolio')

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
                            <div class="profile_cmn_head_text">Edit Portfolio</div>
                            <div>
                                <a href="{{route('protfolio-delete',['id'=>$UserPortfolioEdit[0]['id']])}}">
                                    <i class="fa fa-trash-o  deep-pink icon-size" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>                        
                        <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('portfolio-edit-store',['id'=>$UserPortfolioEdit[0]['id']]) }}">
                            @csrf
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="profile_input">
                                        <label>Project Title</label>
                                        <input type="text" class="form-control @error('project_title') is-invalid @enderror" placeholder="Project Title" name="project_title" value="<?php if(isset($UserPortfolioEdit[0]->project_title)){ echo($UserPortfolioEdit[0]->project_title); }?>" aria-label="Username" aria-describedby="basic-addon1">
                                        @error('project_title')
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
                                    <textarea class="form-control controlTextLength @error('description') is-invalid @enderror" text-length = "600" maxlength="600" name="description" aria-label="With textarea"><?php if(isset($UserPortfolioEdit[0]->description)){ echo($UserPortfolioEdit[0]->description); }?></textarea>
                                    @error('description')
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
                                    <label for="lang">Project specific Skills</label>
                                    <select name="project_specific_skills_id" class="outline js-select2 @error('project_specific_skills_id') is-invalid @enderror" id="lang" multiple>
                                        @foreach ($skills as $k=>$v)
                                            <option
                                                @php
                                                if (count($user_portfolio_skill)) {
                                                    foreach ($user_portfolio_skill as $key => $value) {
                                                        if ($value['project_specific_skills_id'] == $v->id) {
                                                            echo 'selected';
                                                        }
                                                    }
                                                }
                                                @endphp
                                                value="{{ $v->id }}">{{  $v->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('project_specific_skills_id')
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
                                        <label for="lang">Project Location (Where it took place)</label>
                                        <select name="project_country_id[]" class="outline js-select2 @error('project_country_id') is-invalid @enderror" id="lang" multiple>
                                        @foreach ($country as $k=>$v)
                                            <option
                                                @php
                                                if (count($user_portfolio_location)) {
                                                    foreach ($user_portfolio_location as $key => $value) {
                                                        if ($value['location_id'] == $v->id) {
                                                            echo 'selected';
                                                        }
                                                    }
                                                }
                                                @endphp
                                            value="{{ $v->id }}">{{  $v->name }}</option>
                                        @endforeach
                                        </select>
                                        @error('project_country_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>                            
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="profile_input">
                                        <label>Completion Date</label>
                                        <input id="date" type="date" class="form-control @error('completion_date') is-invalid @enderror" name="completion_date" value="{{ date("Y-m-d",strtotime($UserPortfolioEdit[0]->completion_date)) }}"
                                        aria-label="" aria-describedby="basic-addon1">
                                        @error('completion_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="profile_input">
                                        <div><label>Project Files</label></div>
                                        <label class="mt-3">Video Link</label>
                                        <input type="url" class="form-control @error('video') is-invalid @enderror" placeholder="Paste link here" name="video" value="<?php if(isset($UserPortfolioEdit[0]->video)){ echo($UserPortfolioEdit[0]->video); }?>" aria-label="Username" aria-describedby="basic-addon1">
                                        @error('video')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3 d-flex align-items-end">
                                    <button class="save_add_btn">Add another</button>
                                </div>                                                
                            </div>
                            {{-- <div class="row">
                                <div class="col-md-5">
                                <div class="profile_upload_container ">
                                    <div>
                                        <div class="text-center"> <i class="fa fa-plus-circle mx-2 profile_icon deep-pink"
                                                aria-hidden="true"></i></div>
                                        <div>Upload</div>
                                    </div>
                                    </div>
                                    <div class="profile_upload_text"> Upload JPG or PNG, 1600*900 PX, max size 4MB</div>
                                </div>
                            </div>                         --}}
                            <div>
                                <input type="file" name="project_image_1" value="">
                                <input type="file" name="project_image_2" value="">
                                <input type="file" name="project_image_3" value="">
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex justify-content-end mt-4">
                                    <button class="cancel_btn mx-3">Cancel</button>
                                    {{-- <button class="save_add_btn">Save & add another</button> --}}
                                    <button type="button" name="saveAndAnother" value="false" class="portfolio_save_btn save_add_btn">Save & add another</button>
                                    <input type="hidden" id="save_btn_value" name="saveButtonType" value="">

                                    <input type="hidden" name="portfolio_id" value="{{ $UserPortfolioEdit[0]['id']  }}">
                                    {{-- <button type="submit" class="guide_profile_btn mx-3">Save & next</button> --}}
                                    <button type="button" name="saveAndNext" value="false" class="portfolio_save_btn guide_profile_btn mx-3">Save & next</button>

                                    {{-- <button type="button" name="saveAndAnother" value="false" class="portfolio_save_btn save_add_btn">Save & add another</button>
                                    <input type="hidden" id="save_btn_value" name="saveButtonType" value="">
                                    <input type="hidden" name="flag" value="<?=request('flag')?>">
                                    <button type="button" name="saveAndNext" value="false" class="portfolio_save_btn guide_profile_btn mx-3">Save & next</button> --}}
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
        tags: false
    });

    $(".portfolio_save_btn").on("click", function () {
        $("#save_btn_value").attr("value", $(this).attr("name"))
        $(this).parents('form').submit();
    });
</script>
@endpush

