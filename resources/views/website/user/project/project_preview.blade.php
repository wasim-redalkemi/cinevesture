@extends('website.layouts.app',['class' => 'bg_white'])

{{-- @section('title','Cinevesture-organisation') --}}

@section('header')
@include('website.include.header')
@endsection

@section('content')
<div class="hide-me animation for_authtoast">
    @include('website.include.flash_message')
</div>
@include('website.user.project.project_pagination',['page_bg' => '6'])


<!-- Preview section  -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class=" profile_wraper profile_wraper_padding  mt-4 mb-0">
                    <p class="flow_step_text"> Overview</p>
                <div class="preview_headtext mt-4">Project Name</div>
                <div class="preview_subtext">@if (!empty($projectData[0]['project_name'])) {{ucFirst($projectData[0]['project_name'])}} @else <span><b>-</b></span> @endif</div>
                <div class="preview_headtext">Types of projects</div>
                <div class="preview_subtext">@if (!empty($projectData[0]['project_type']['name'])) {{ $projectData[0]['project_type']['name'] }} @else <span><b>-</b></span> @endif</div>
                <div class="preview_headtext">Who are you listing this project as</div>
                <div class="preview_subtext">@if (!empty($projectData[0]['listing_project_as'])) {{ ucFirst($projectData[0]['listing_project_as']) }} @else <span><b>-</b></span> @endif</div>
                <div class="preview_headtext">Language</div>
                @if (!empty($projectData[0]['project_languages']))
                    @foreach ($projectData[0]['project_languages'] as $v)
                        <div class="preview_subtext">{{$v['name']}}</div>
                    @endforeach                    
                @else
                    <span><b>-</b></span>
                @endif
                <div class="preview_headtext">Country</div>
                @if (!empty($projectData[0]['project_countries']))
                    @foreach ($projectData[0]['project_countries'] as $v)
                        <div class="preview_subtext">{{$v['name']}}</div>
                    @endforeach                    
                @else
                    <span><b>-</b></span>
                @endif                
                <div class="preview_headtext">Locations</div>
                <div class="preview_subtext pb-3">@if (!empty($projectData[0]['location'])) {{ucFirst($projectData[0]['location'])}} @else <span><b>-</b></span> @endif</div>
                <div class="row">
                    <div class="com-md-12">
                        <div class="justify-content-end"><button class="save_add_btn float-end"><a class="ancor-link-style" href="{{ route('project-overview') }}?id={{$_REQUEST['id']}}">Edit</a></button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="profile_wraper profile_wraper_padding mt-4 mb-0">
                <div>
                    <p class="flow_step_text"> Details</p>
                </div>
                <div class="preview_headtext mt-4">Category</div>
                @if (!empty($projectData[0]['project_category']))
                    @foreach ($projectData[0]['project_category'] as $v)
                        <div class="preview_subtext">{{$v['name']}}</div>
                    @endforeach                    
                @else
                    <span><b>-</b></span>
                @endif  
                <div class="preview_headtext">Genre</div>
                <div class="mt-2 d-flex flex-wrap">
                    @if (!empty($projectData[0]['genres']))
                    @foreach ($projectData[0]['genres'] as $v)
                        <button class="curv_cmn_btn darkbtn mx-1">{{$v['name']}}</button>
                    @endforeach                    
                @else
                    <span><b>-</b></span>
                @endif 
                </div>
                <div class="preview_headtext">Duration</div>
                <div class="preview_subtext">@if (!empty($projectData[0]['duration'])) <?php echo sprintf(intdiv($projectData[0]['duration'], 60).' hr') .' '. ( sprintf($projectData[0]['duration'] % 60).' min');?>@else <span><b>-</b></span> @endif</div>
                <div class="preview_headtext">Total Budget (USD)</div>
                <div class="preview_subtext">@if (!empty($projectData[0]['total_budget'])) {{'$'.number_format($projectData[0]['total_budget'], 0,'.',',')}} @else <span><b>-</b></span> @endif</div>
                <div class="preview_headtext">Financing Secured (USD)</div>
                <div class="preview_subtext">@if (!empty($projectData[0]['financing_secured'])) {{'$'.number_format($projectData[0]['financing_secured'], 0,'.',',')}} @else <span><b>-</b></span> @endif</div>
                <div class="preview_headtext">Creator/Founder Name</div>
                <div class="preview_subtext">@if (!empty($projectData[0]['user']['name'])) {{ucFirst($projectData[0]['user']['name'])}} @else <span><b>-</b></span> @endif</div>
                <div class="preview_headtext">Associated with the Project</div>
                <div class="preview_subtext">
                    @if (!empty($projectData[0]['project_association']))
                    @foreach ($projectData[0]['project_association'] as $v)
                        <div> {{ucFirst($v['project_associate_title'])}} - {{ucFirst($v['project_associate_name'])}}</div>
                    @endforeach                    
                    @else
                        <span><b>-</b></span>
                    @endif
                </div>
                <div class="row">
                    <div class="com-md-12">
                        <div class="justify-content-end"><button class="save_add_btn float-end"><a class="ancor-link-style" href="{{ route('project-details') }}?id={{$_REQUEST['id']}}">Edit</a></button></div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="profile_wraper profile_wraper_padding mt-4 mb-0">
                <div>
                    <p class="flow_step_text"> Description</p>
                </div>
                <div class="preview_headtext mt-4">Logline</div>
                <div class="preview_subtext pr_5">@if (!empty($projectData[0]['logline'])) {{ucFirst($projectData[0]['logline'])}} @else <span><b>-</b></span> @endif</div>
                <div class="preview_headtext">Synopsis/Brief Description</div>
                <div class="preview_subtext pr_5">@if (!empty($projectData[0]['synopsis'])) {{ucFirst($projectData[0]['synopsis'])}} @else <span><b>-</b></span> @endif</div>
                <div class="preview_headtext">Creator/Founder’s Statement</div>
                <div class="preview_subtext pr_5">@if (!empty($projectData[0]['director_statement'])) {{ucFirst($projectData[0]['director_statement'])}} @else <span><b>-</b></span> @endif</div>
                <div class="row">
                    <div class="com-md-12">
                        <div class="justify-content-end mt-3 mt-md-0"><button class="save_add_btn float-end"><a class="ancor-link-style" href="{{ route('project-description') }}?id={{$_REQUEST['id']}}">Edit</a></button></div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="profile_wraper profile_wraper_padding mt-4 mb-0">
                    <div>
                        <p class="flow_step_text"> Gallery</p>
                    </div>
        
                    <div class="preview_headtext mb-3">Video</div>
                    <div class="video_slider owl-carousel">
                    @if (!empty($projectData[0]['project_only_video']))
                        @foreach ($projectData[0]['project_only_video'] as $v)
                            <div class="item">
                                {{-- <div> 
                                    <img src="{{ json_decode($v['media_info'])->thumbnail }}" class="" width=100% alt="image">
                                </div> --}}
                                <div class="playVideoWrap mt-3" video-url="{{$v['file_link']}}">
                                    <img src="{{json_decode($v['media_info'])->thumbnail}}" alt="">
                                </div>
                                
                                <div class="d-flex align-items-initial mt-2">
                                    <div class="movie_name_text mt-0">{{json_decode($v['media_info'])->title}} </div>
                                    <?php
                                        if($v['is_default_marked'])
                                        {
                                            ?>
                                                <button class="verified_cmn_btn mt-2 mx-3">FEATURED</button>
                                            <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        @endforeach                    
                        @else
                        <span><b>-</b></span>                    
                        @endif
                    </div>

               
                    <div class="preview_headtext mb-3">Photos</div>
                    <div class="video_slider owl-carousel">
                        @if (!empty($projectData[0]['project_only_image']))
                        @foreach ($projectData[0]['project_only_image'] as $v)
                        <div class="item">
                            <div class="home_img_wrap"> <img src="{{ Storage::url($v['file_link']) }}" alt="image"></div>
                            <div class="d-flex align-items-initial mt-2">
                                <div class="movie_name_text mt-0">{{ json_decode($v['media_info'])->title }}</div>
                                <?php
                                if($v['is_default_marked'])
                                {
                                    ?>
                                        <button class="verified_cmn_btn mt-2 mx-3">FEATURED</button>
                                    <?php
                                }
                            ?>
                            </div>
                        </div>
                            @endforeach                    
                        @else
                        <span><b>-</b></span>                    
                        @endif
                    </div>

                
                    <div class="preview_headtext mb-3">Pdf</div>
                    <div class="row">
                        @if (!empty($projectData[0]['project_only_doc']))
                        @foreach ($projectData[0]['project_only_doc'] as $v)
                        <div class="col-md-3 col-10 mt-3 mt-md-0">
                            <div class="document_pdf">
                                <div class="upload_loader">
                                    <i class="fa fa-file-text deep-pink icon-size" aria-hidden="true"></i>
                                </div>
                                <div class="mx-3">
                                    <div class="guide_profile_main_subtext Aubergine_at_night px-2">{{ json_decode($v['media_info'])->name }}</div>
                                    <div class="proctect_by_capta_text Aubergine_at_night">{{ json_decode($v['media_info'])->size_label }}</div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <span><b>-</b></span>                    
                        @endif
                    </div>
                    <div class="row">
                        <div class="com-md-12">
                            <div class="justify-content-end mt-3 mt-md-0"><button class="save_add_btn float-end"><a class="ancor-link-style" href="{{ route('project-gallery') }}?id={{$_REQUEST['id']}}">Edit</a></button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="profile_wraper profile_wraper_padding mt-4 mb-4">
                <div>
                    <p class="flow_step_text"> Requirements & Milestones</p>
                </div>
                <div class="preview_headtext mt-4">Project Stage</div>
                <div class="preview_subtext">@if (!empty($projectData[0]['project_stage']['name'])) {{$projectData[0]['project_stage']['name']}}@else <span><b>-</b></span> @endif</div>
                <div class="preview_headtext">Looking For</div>
                <div class="mt-2">
                    @if (!empty($projectData[0]['project_looking_for']))
                    @foreach ($projectData[0]['project_looking_for'] as $v)
                        <button class="curv_cmn_btn mx-1">{{$v['name']}}</button>
                    @endforeach                    
                    @else
                    <span><b>-</b></span>                    
                    @endif
                </div>
                <div class="preview_headtext mb-1">Crowdfunding Link</div>
                <div class="">
                    @if (!empty($projectData[0]['crowdfund_link']))
                        <a href="{{$projectData[0]['crowdfund_link']}}" class="crowdfund_text" target="_blank">{{$projectData[0]['crowdfund_link']}}</a>
                    @else
                    <span><b>-</b></span>                    
                    @endif
                </div>

                <div class="row mt-3">
                    <div class="col-4 col-md-3 preview_headtext">Milestone Description</div>
                    <div class="col-4 col-md-3 preview_headtext">Milestone Budget (USD)</div>
                    <div class="col-4 col-md-3 preview_headtext">Target Date</div>
                </div>
                @if (!empty($projectData[0]['project_milestone']))
                @foreach ($projectData[0]['project_milestone'] as $v)
                <div class="row mt-2">
                    <div class="col-4 col-md-3 preview_subtext">@if (!empty($v['description'])) {{ucFirst($v['description'])}}@else <span><b>-</b></span> @endif</div>
                    <div class="col-4 col-md-3 preview_subtext">@if (!empty($v['budget'])) {{'$'.number_format($v['budget'], 0,'.',',')}}@else <span><b>-</b></span> @endif</div>
                    <div class="col-4 col-md-3 preview_subtext">@if (!empty($v['target_date'])) {{strtoupper(date('jS F Y',strtotime($v['target_date'])))}}@else <span><b>-</b></span> @endif</div>
                </div>
                @endforeach                    
                @else
                <div class="row">
                    <div class="col-md-3 text-left">
                        <span><b>-</b></span>
                    </div>
                    <div class="col-md-3 text-left">
                        <span><b>-</b></span>
                    </div>
                    <div class="col-md-3 text-left">
                        <span><b>-</b></span>
                    </div>
                </div>                    
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-between mt-2">
                            <div></div>
                            <div class="tooltips">
                            <span data-toggle="tooltip" class="child_tooltip" data-placement="bottom" title="Verified projects are reviewed by cinevesture team and you'll get a verified badge.This increases the chances of your project performing better"> <i class="fa fa-info-circle" aria-hidden="true"></i></span>
                            </div>
                            
                        <div class="justify-content-end mt-3 mt-md-0"><button class="save_add_btn float-end"><a class="ancor-link-style" href="{{ route('project-milestone') }}?id={{$_REQUEST['id']}}">Edit</a></button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="text-center my-5">
            <a href="{{ route('project-status') }}?id={{$_REQUEST['id']}}&user_status=draft"><button class="cancel_btn">Save as draft</button></a>
            <a href="{{ route('project-status') }}?id={{$_REQUEST['id']}}&user_status=published"><button class="guide_profile_btn">Save & Publish</button></a>
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
    $(".video_slider.owl-carousel").owlCarousel({
      autoPlay: 3000,
      autoplay: true,
    //   loop: true,
      nav: true,
    //   center: true,
      margin: 10,
      items: 1.5,
      responsive: {
        480: { items: 1 },
        768: { items: 1 },
        1024: {
          items: 4
        }
      },
    });
</script>
@endpush