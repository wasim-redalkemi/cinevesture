@extends('website.layouts.app',['class' => 'bg_white'])

{{-- @section('title','Cinevesture-organisation') --}}

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
                            <div class="posted_job_header"><a href="{{ route('posted-job',['id'=>auth()->user()->id]) }}" class="posted_job_header_link pe-3 <?php if($status =='published' ){echo 'active_job_page';}?>"> Published</a></div>
                            <div class="posted_job_header"><a href="{{ route('posted-job',['id'=>auth()->user()->id,'status'=>'draft']) }}" class="posted_job_header_link px-3 <?php if($status =='draft' ){echo 'active_job_page';}?>">Draft</a></div>
                            <div class="posted_job_header"><a href="{{ route('posted-job',['id'=>auth()->user()->id,'status'=>'unpublished']) }}" class="posted_job_header_link px-3 <?php if($status =='unpublished' ){echo 'active_job_page';}?>">Unpublished</a></div>
                        </div>
                    </div>
                    @php
                        $is_data = false;
                    @endphp
                    @if (count($jobs['data'])>0)
                        @php
                            $is_data = true;
                        @endphp

                        @foreach ($jobs['data'] as $k=>$v)
                            <div class="profile_wraper_padding border_top">
                                <div class="d-flex justify-content-between">
                                    <div class="guide_profile_main_text">
                                        <a href="{{ route('posted-job-single-view',['job_id'=>$v['id']]) }}">@if (!empty($v['title'])) {{ucFirst($v['title'])}} @endif</a>
                                    </div>
                                    <div class="dropdown dropstart search-page">
                                        <div class="" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <!-- <i class="fa fa-ellipsis-h aubergine icon-size" aria-hidden="true"></i> -->
                                            <span class="dot"></span>
                                            <span class="dot"></span>
                                            <span class="dot"></span>
                                        </div>
                                        <ul class="dropdown-menu profile_dropdown_menu p-2 menu_position">
                                            
                                            <input type="hidden" name="job_id" value="{{ !empty($v['id']) ? $v['id'] : 'no' }}" id="job_id">
                                            <li>
                                            <a href="{{route('job-create-page',['job_id'=>$v['id']])}}">  Edit Job</a>
                                            </li>
                                            <li>
                                            {{-- <a href="{{route('promotion-job',['id'=>$v['id']])}}">  Promote Job</a> --}}
                                            <a href="#" data-toggle="modal" data-target="#publish_job_modal">  Promote Job</a>
                                            </li>
                                            <li>
                                            <?php $status;  if($v['save_type']=='published'){  $status= "unpublished"; } else {$status="published";}?>
                                            <a class="<?php if($status =='unpublished' ){echo 'jobUnpublishedAction';} else {echo 'jobpublishedAction';}?>" href="{{route('unpublish-job',['job_id'=>$v['id'],'status'=>$status])}}">  <?php if($v['save_type']=='published'){  echo "Unpublish Job"; } else { echo "Publish Job";}?></a>
                                            </li>
                                            <li>
                                                <a class="confirmAction" href="{{route('delete-job',['job_id'=>$v['id']])}}"> Delete Job </a>
                                            </li>
                                        </ul>
                                    </div>
                                    
                                </div>
                                <div class="preview_headtext lh_54 candy-pink">
                                    @if (!empty($v['company_name'])) {{ucFirst($v['company_name'])}} @endif 
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
                                    @if (!empty($v['description'])) {{ucFirst($v['description'])}} @endif
                                </div>
                                <div class="d-flex justify-content-between mt-4">
                                    <div class="d-flex flex-wrap w_75">
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
                        <div>
                            {{-- {!! $userJob->links() !!} --}}
                            {!! $userJob->onEachSide(0)->links() !!}

                        </div>
                    @endif
                </div>
                <?php
                    if($is_data == false)
                    {
                        ?>
                            <div class="col col-md-12">
                                <div class="mt-3">
                                    {!! config('constants.NO_DATA_FAVOURITE') !!}
                                </div>
                            </div>
                        <?php
                    }
                ?>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="publish_job_modal"   tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
         <div class="d-flex justify-content-end m-2">
             <button type="button" class="simple_cross_btn" data-bs-dismiss="modal" aria-label="Close"> <img src="{{ asset('images/asset/cross_Icon.svg') }}" /></button>
         </div>
            <div class="modal-body" style="padding: 0px;">
                <section>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="modal_container">

                                    <div class="icon_container done">
                                        <i class="fa fa-check icon_style" aria-hidden="true"></i>
                                    </div>
                                    <div class="head_text mt-4">Congratulations!</div>
                                    <div class="successfullPublish_text sub_text mt-4">
                                        Do you want to promote your job?
                                        <span data-toggle="tooltip" data-placement="bottom" title="Promote your job for a small fee. Our team will get in touch with you when you submit a job promotion"> <i class="fa fa-info-circle" aria-hidden="true"></i></span>
                                    </div>
                                    <div class="mb-5">
                                <a href="#" class="text-decoration-none"><button class="submit_btn text-light mt-4">Submit your job for promotion</button></a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
@include('website.include.footer')
@endsection
@push('scripts')
   <script>
    var job_id  = $('#job_id').val();
    $(document).ready(function() {
    $('.submit_btn').click(function(e) {  
    let $btn = $(this);
    e.preventDefault();
    e.stopPropagation();
    $btn.text("Submitting..");
    $btn.prop('disabled',true);
    $.ajax(
    {
        url:"{{route('promotion-job')}}",
        type:'GET',
        dataType:'json',
        data:{'id': job_id},
        success:function(response)
        {  
            // console.log(response);
            $btn.text("Send Mail");
            $btn.prop('disabled',false);
            if (response.status == 'success') {                                
                toastMessage(response.status, response.msg);
            }
            $('.modal').hide();
            $('.modal-backdrop').remove();
            $('body').removeAttr('style');
        },
        error:function(response,status,error)
        {     $btn.text("Send Mail");
        toastMessage(response.status, response.msg);
            $btn.prop('disabled',false);
            // console.log(response);
            // console.log(status);
            // console.log(error);
        } 
    });
});
});
    </script> 
    @endpush
