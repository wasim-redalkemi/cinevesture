@extends('website.layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-organisation')

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
                <div class="profile_wraper mt-md-0 mt-4">
            @php                
            $jobs = $userJob->toArray();
            @endphp
                <div class="profile_wraper_padding pb-0">
                    <div class="contact-page-text deep-aubergine">
                        Posted Jobs
                    </div>
                    <div class="d-flex mt-2">
                        <div class="posted_job_header"><a href="{{ route('posted-job',['id'=>auth()->user()->id]) }}" class="posted_job_header_link px-3 <?php if($status =='published' ){echo 'active_job_page';}?>"> Published Jobs</a></div>
                        <div class="posted_job_header"><a href="{{ route('posted-job',['id'=>auth()->user()->id,'status'=>'draft']) }}" class="posted_job_header_link px-3 <?php if($status =='draft' ){echo 'active_job_page';}?>">Draft Job</a></div>
                        <div class="posted_job_header"><a href="{{ route('posted-job',['id'=>auth()->user()->id,'status'=>'unpublished']) }}" class="posted_job_header_link px-3 <?php if($status =='unpublished' ){echo 'active_job_page';}?>">Unpublished Jobs</a></div>
                    </div>
                </div>
                @if (count($jobs['data'])>0)
                @foreach ($jobs['data'] as $k=>$v)

                <div class="profile_wraper_padding border_top">
                    <div class="d-flex justify-content-between">
                        <div class="guide_profile_main_text">
                            <a href="{{ route('posted-job-single-view',['job_id'=>$v['id']]) }}">@if (!empty($v['title'])) {{$v['title']}} @endif</a>
                        </div>
                        <div class="dropdown dropstart search-page">
                            <div class="" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <!-- <i class="fa fa-ellipsis-h aubergine icon-size" aria-hidden="true"></i> -->
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot"></span>
                            </div>
                            <ul class="dropdown-menu profile_dropdown_menu p-2 menu_position">
                                <li>
                                <a href="{{route('job-create-page',['job_id'=>$v['id']])}}">  Edit Job</a>
                                </li>
                                <li>
                                <a href="{{route('promotion-job')}}">  Promote Job</a>
                                </li>
                                <li>
                                <?php $status;  if($v['save_type']=='published'){  $status= "unpublished"; } else {$status="published";}?>
                                <a href="{{route('unpublish-job',['job_id'=>$v['id'],'status'=>$status])}}">  <?php if($v['save_type']=='published'){  echo "Unpublish Job"; } else { echo "Publish Job";}?></a>
                                </li>
                                <li>
                                <a href="{{route('delete-job',['job_id'=>$v['id']])}}">  Delete Job </a>
                                </li>
                            </ul>
                        </div>
                      
                    </div>
                    <div class="preview_headtext lh_54 candy-pink">
                        @if (!empty($v['company_name'])) {{$v['company_name']}} @endif 
                        - 
                        
                        @if (!empty($v['job_location'])>0)
                            {{$v['job_location']['name']}}
                        @else
                            <span><b>-</b></span>                    
                        @endif
                        -
                        @if (count($v['job_employements'])>0)
                            @foreach ($v['job_employements'] as $k1=>$v1)
                            {{$v1['name']}}
                            @endforeach
                        @else
                            <span><b>-</b></span>                    
                        @endif    
                    </div>
                    <div class="posted_job_header Aubergine_at_night">
                        @if (!empty($v['description'])) {{$v['description']}} @endif
                    </div>
                    <div class="d-flex justify-content-between mt-4">
                        <div class="d-flex flex-wrap w-75
                        ">
                            @if (count($v['job_skills'])>0)
                            @foreach ($v['job_skills'] as $k1=>$v1)
                                <button class="curv_cmn_btn skill_container"> {{$v1['name']}}</button>                               
                            @endforeach
                            @else
                                <span><b>-</b></span>                    
                            @endif
                        </div>
                        <div>                            
                          <button class="guide_profile_btn">  <a href="{{route('showJobApplicants',['jobId'=>$v['id']])}}" class="guide_profile_btn w_150">View Applicants</a></button>
                        </div>
                    </div>
                    
                </div>
                @endforeach

            @else
                <div class="not-found-text border-top">
                    <p>No Data Found</p>
                </div>
            @endif
            <div>
                {!! $userJob->links() !!}
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
