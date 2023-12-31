@extends('website.layouts.app',['class' => 'bg_white'])

{{-- @section('title','Cinevesture-organisation') --}}

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
                        <div class="">
                            <div class="d-flex justify-content-between align-items-center">
                                @php
                                $Job_data = $Job_data->toArray();
                                @endphp
                                <div class="contact-page-text deep-aubergine">@if (!empty($Job_data['title'])) {{ucFirst($Job_data['title'])}} @endif</div>
                                                             
                                <!-- <div class="contact-page-text deep-aubergine"> <span onclick="history.back()"><i class="fa fa-arrow-left" aria-hidden="true"></i></span> @if (!empty($Job_data['title'])) {{$Job_data['title']}} @endif</div> -->
                                @if($Job_data['user_id']!=auth()->user()->id && $Job_data['user_id']!=auth()->user()->parent_user_id)
                                    <div class="d-block d-md-flex align-items-center">
                                        <div class="d-flex align-items-center">
                                        <div class="associate_text aubergine ml_10">@if (!empty($Job_data['favorite']['job_id'])){{'Job saved'}}@else{{'Save job'}} @endif</div>
                                        <div class="pointer fav-icon mx-3">
                                            <i data-id="@if (!empty($Job_data['id'])){{$Job_data['id']}} @endif" class="fa {{is_null($Job_data['favorite']) ? 'fa-heart-o' : 'fa-heart'}} aubergine icon-size" aria-hidden="true"></i>
                                        </div>
                                        </div>
                                        
                                        @if(!isset($Job_data['single_job_applied']) || !empty($Job_data['single_job_applied']))
                                        <div class="d-none d-md-block">
                                            <button disabled class="guide_profile_btn">Applied</button>
                                            {{-- @if(is_null($Job_data['single_job_applied']))
                                            <button class="guide_profile_btn"><a href="{{route('showApplyJob',['jobId'=>$Job_data['id']])}}" class=""> Apply now</a></button>
                                            @else
                                            <button disabled class="guide_profile_btn">Applied</button>
                                            @endif --}}
                                        </div>
                                        @else
                                        <button class="guide_profile_btn"><a href="{{route('showApplyJob',['jobId'=>$Job_data['id']])}}" class=""> Apply now</a></button>
                                        @endif  
                                    </div>

                                @endif  


                                
                            </div>
                            @if(!isset($Job_data['single_job_applied']) || !empty($Job_data['single_job_applied']))
                                    <div class="d-block d-md-none mt-2">
                                        @if(is_null($Job_data['single_job_applied']))
                                        <button class="guide_profile_btn"><a href="{{route('showApplyJob',['jobId'=>$Job_data['id']])}}" class=""> Apply now</a></button>
                                        @else
                                        <button disabled class="guide_profile_btn">Applied</button>
                                        @endif
                                    </div>      
                                    @endif 
                            <!-- <div class="d-flex justify-content-between">
                                @php
                               
                                @endphp
                                <div class="contact-page-text deep-aubergine">@if (!empty($Job_data['title'])) {{ucFirst($Job_data['title'])}} @endif</div>
                                                             
                                <div class="contact-page-text deep-aubergine"> <span onclick="history.back()"><i class="fa fa-arrow-left" aria-hidden="true"></i></span> @if (!empty($Job_data['title'])) {{$Job_data['title']}} @endif</div>
                                @if($Job_data['user_id']!=auth()->user()->id)
                                    <div class="d-block d-md-flex align-items-center">
                                        <div class="d-flex align-items-center">
                                        <div class="associate_text aubergine ml_10">@if (!empty($Job_data['favorite']['job_id'])){{'Job saved'}}@else{{'Save job'}} @endif</div>
                                        <div class="pointer fav-icon mx-3">
                                            <i data-id="@if (!empty($Job_data['id'])){{$Job_data['id']}} @endif" class="fa {{is_null($Job_data['favorite']) ? 'fa-heart-o' : 'fa-heart'}} aubergine icon-size" aria-hidden="true"></i>
                                        </div>
                                        </div>
                                        @if(!isset($Job_data['single_job_applied']) || !empty($Job_data['single_job_applied']))
                                        <div>
                                            @if(is_null($Job_data['single_job_applied']))
                                            <button class="guide_profile_btn"><a href="{{route('showApplyJob',['jobId'=>$Job_data['id']])}}" class=""> Apply now</a></button>
                                            @else
                                            <button disabled class="guide_profile_btn">Applied</button>
                                            @endif
                                        </div>      
                                        @endif  
                                    </div>
                                @endif  
                            </div> -->
                        </div>
                    </div>
                    <div class="guide_profile_subsection">
                            <div class="row">
                                <div class="col-6 col-sm-3">
                                    <div class="preview_headtext lh_54 candy-pink">Company Name</div>
                                    <div class="profile_upload_text Aubergine_at_night mt-2">@if (!empty($Job_data['company_name'])) {{$Job_data['company_name']}} @endif</div>
                                </div>
                                <div class="col-6 col-sm-3">
                                    <div class="preview_headtext lh_54 candy-pink">Location</div>
                                    @if (!empty($Job_data['job_location']))                                        
                                        <div class="profile_upload_text Aubergine_at_night mt-2">{{$Job_data['job_location']['name']}}</div>
                                    @else
                                        <span><b>-</b></span>
                                    @endif
                                </div>
                                <div class="col-6 col-sm-3">
                                    <div class="preview_headtext lh_54 candy-pink"> Employment Type</div>
                                    @if (count($Job_data['job_employements'])>0)
                                    @foreach ($Job_data['job_employements'] as $k=>$v)
                                        <div class="profile_upload_text Aubergine_at_night mt-2">{{$v['name']}}</div>
                                    @endforeach
                                    @else
                                        <span><b>-</b></span>                    
                                    @endif
                                </div>
                                <div class=" col-6 col-sm-3">
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
                    <div class="guide_profile_subsection">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="guide_profile_main_text">Description</div>
                                    <div class="posted_job_header">
                                        @if (!empty($Job_data['description'])) {{$Job_data['description']}} @endif
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="guide_profile_subsection">
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
                       
                        {{-- <div class="d-flex justify-content-center mt-5 mb-4">
                            <button class="cancel_btn mx-5 action" data-id="save" onclick="history.back()">Back</button>
                            @if($Job_data['user_id']==auth()->id())
                            <button class="guide_profile_btn action" data-id="publish">View Applicants</button>
                            @endif
                        </div> --}}
                    </div>
                    <div class="guide_profile_subsection">
                        <span class="tile_text">Job Posted By</span>
                        <div class="d-flex mt-3">
                            <div class="tile_text deep-pink">@if (!empty($Job_data['user']['name'])) {{ucFirst($Job_data['user']['name'])}} @else {{'-'}} @endif</div>
                            <div class="mx-4 px-3">
                            
                               <div class="organisation_cmn_text">@if (!empty($Job_data['title'])) {{ucFirst($Job_data['title'])}} @else {{'-'}} @endif</div>
                               {{-- <div class="published_text">10th July 2021</div>  --}}
                               <div class="published_text">
                                @if (!empty($Job_data['created_at']))
                                {{strtoupper(date('jS F Y',strtotime($Job_data['created_at'])))}}
                                @else
                                    <span><b>-</b></span>
                                @endif
                                
                                </div> 
                               <div class="organisation_cmn_text mt-2">@if (!empty($Job_data['company_name'])) {{ucFirst($Job_data['company_name'])}} @else {{'-'}} @endif</div> 
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
@include('website.include.footer')
@endsection

@include('website.job.favscript')

