@extends('layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-portfolio')

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
                        <div class="hide-me">
                            @include('include.flash_message')
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="profile_cmn_head_text">Add Portfolio</div>
                            <div><i class="fa fa-trash-o  deep-pink icon-size" aria-hidden="true"></i></div>
                        </div>                        
                        <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('portfolio-store') }}">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="profile_input">
                                        <label>Project Title</label>
                                        <input type="text" class="form-control @error('project_title') is-invalid @enderror" placeholder="Project Title" name="project_title" value="{{ $portfolio->project_title }}" aria-label="Username" aria-describedby="basic-addon1">
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
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" aria-label="With textarea">{{ $portfolio->description }}</textarea>
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
                                    <select name="project_specific_skills_id" class="@error('project_specific_skills_id') is-invalid @enderror" id="lang">
                                        @foreach ($skills as $k=>$v)
                                                <option value="{{ $v->id }}">{{  $v->name }}</option>
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
                                        <select name="project_country_id" class="@error('project_country_id') is-invalid @enderror" id="lang">
                                        @foreach ($country as $k=>$v)
                                            <option value="{{ $v->id }}">{{  $v->name }}</option>
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
                                        <input type="date" class="form-control @error('completion_date') is-invalid @enderror" placeholder="First Name" name="completion_date" value="{{ $portfolio->completion_date }}" aria-label="Username" aria-describedby="basic-addon1">
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
                                        <input type="text" class="form-control @error('video') is-invalid @enderror" placeholder="Paste link here" name="video" value="{{ $portfolio->description }}"
                                        aria-label="Username" aria-describedby="basic-addon1">
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
                                <input type="file" name="project_image_1">
                                <input type="file" name="project_image_2">
                                <input type="file" name="project_image_3">
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex justify-content-end mt-4">
                                    <button class="cancel_btn mx-3">Cancel</button>
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

@section('footer')
    @include('include.footer')
@endsection
