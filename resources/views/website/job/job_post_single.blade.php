@extends('website.layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-organisation')

@section('header')
@include('website.include.header')
@endsection

@section('content')

<section class="guide_profile_section my-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-sm-0">
                <div class="content_wraper">
                    <div class="guide_profile_subsection">
                        <div class="container">
                            @php
                                $Job_data = $Job_data->toArray();
                            @endphp
                            <div class="d-flex justify-content-between">
                                
                                <div class="contact-page-text deep-aubergine"> <span onclick="history.back()"><i class="fa fa-arrow-left" aria-hidden="true"></i></span> @if (!empty($Job_data['title'])) {{$Job_data['title']}} @endif</div>
                                <div class="d-flex align-items-center">
                                    <div class="dropdown  search-page">
                                        <div class="" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-ellipsis-h aubergine icon-size" aria-hidden="true"></i>
                                        </div>
                                        <ul class="dropdown-menu profile_dropdown_menu p-2">
                                            <li>
                                            <a href="">  Edit Job</a>
                                            </li>
                                            <li>
                                            <a href="">  Promote Job</a>
                                            </li>
                                            <li>
                                            <a href="">   Unpublish Job</a>
                                            </li>
                                            <li>
                                            <a href="">  Delete Job </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="guide_profile_subsection">
                        <div class="container">

                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="preview_headtext lh_54 candy-pink">Company Name</div>
                                    <div class="profile_upload_text Aubergine_at_night mt-2">@if (!empty($Job_data['company_name'])) {{$Job_data['company_name']}} @endif</div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="preview_headtext lh_54 candy-pink">Location</div>
                                    @if (!empty($Job_data['job_location']))                                        
                                        <div class="profile_upload_text Aubergine_at_night mt-2">{{$Job_data['job_location']['name']}}</div>
                                    @else
                                        <span><b>-</b></span>
                                    @endif
                                </div>
                                <div class="col-sm-3">
                                    <div class="preview_headtext lh_54 candy-pink"> Employement type</div>
                                    @if (count($Job_data['job_employements'])>0)
                                    @foreach ($Job_data['job_employements'] as $k=>$v)
                                        <div class="profile_upload_text Aubergine_at_night mt-2">{{$v['name']}}</div>
                                    @endforeach
                                    @else
                                        <span><b>-</b></span>                    
                                    @endif
                                </div>
                                <div class="col-sm-3">
                                    <div class="preview_headtext lh_54 candy-pink">Work space type</div>
                                    @if (count($Job_data['job_work_spaces'])>0)
                                    @foreach ($Job_data['job_work_spaces'] as $k=>$v)
                                        <div class="profile_upload_text Aubergine_at_night mt-2">{{$v['name']}}</div>
                                    @endforeach
                                    @else
                                        <span><b>-</b></span>                    
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="guide_profile_subsection">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="guide_profile_main_text">Description</div>
                                    <div class="posted_job_header">
                                        @if (!empty($Job_data['description'])) {{$Job_data['description']}} @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="guide_profile_subsection">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="guide_profile_main_text">Skills Required</div>
                                    @if (count($Job_data['job_skills'])>0)
                                    @foreach ($Job_data['job_skills'] as $k=>$v)
                                        <button class="curv_cmn_btn ">{{$v['name']}}</button>
                                    @endforeach
                                    @else
                                        <span><b>-</b></span>                    
                                    @endif                                    
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-5 mb-4">
                            <button class="cancel_btn mx-5 action" data-id="save" onclick="history.back()">Back</button>
                            <button class="guide_profile_btn action" data-id="publish">View Applicants</button>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

@section('footer')
@include('website.include.footer')
@endsection