@extends('website.layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-organisation')

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
                <div class="preview_subtext">@if (!empty($projectData[0]['project_name'])) {{$projectData[0]['project_name']}} @endif</div>
                <div class="preview_headtext">Types of projects</div>
                <div class="preview_subtext">@if (!empty($projectData[0]['project_type']['name'])) {{ $projectData[0]['project_type']['name'] }} @endif</div>
                <div class="preview_headtext">Who are you listning this project as</div>
                <div class="preview_subtext">@if (!empty($projectData[0]['listing_project_as'])) {{ $projectData[0]['listing_project_as'] }} @endif</div>
                <div class="preview_headtext">Language</div>
                @if (!empty($projectData[0]['project_languages']))
                    @foreach ($projectData[0]['project_languages'] as $v)
                        <div class="preview_subtext">{{$v['name']}}</div>
                    @endforeach                    
                @endif
                <div class="preview_headtext">Country</div>
                @if (!empty($projectData[0]['project_countries']))
                    @foreach ($projectData[0]['project_countries'] as $v)
                        <div class="preview_subtext">{{$v['name']}}</div>
                    @endforeach                    
                @endif                
                <div class="preview_headtext">Locations</div>
                <div class="preview_subtext pb-3">@if (!empty($projectData[0]['location'])) {{$projectData[0]['location']}} @endif</div>
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
                @endif 
                <div class="preview_headtext">Genre</div>
                <div class="mt-2">
                    @if (!empty($projectData[0]['genres']))
                    @foreach ($projectData[0]['genres'] as $v)
                        <button class="curv_cmn_btn mx-1">{{$v['name']}}</button>
                    @endforeach                    
                    @endif
                </div>
                <div class="preview_headtext">Duration</div>
                <div class="preview_subtext">@if (!empty($projectData[0]['duration'])) {{$projectData[0]['duration']}} @endif</div>
                <div class="preview_headtext">Total Budget (USD)</div>
                <div class="preview_subtext">@if (!empty($projectData[0]['total_budget'])) {{$projectData[0]['total_budget']}} @endif</div>
                <div class="preview_headtext">Financing Secured (USD)</div>
                <div class="preview_subtext">@if (!empty($projectData[0]['financing_secured'])) {{$projectData[0]['financing_secured']}} @endif</div>
                <div class="preview_headtext">Creator/Founder Name</div>
                <div class="preview_subtext">@if (!empty($projectData[0]['user']['name'])) {{$projectData[0]['user']['name']}} @endif</div>
                <div class="preview_headtext">Associated with the Project</div>
                <div class="preview_subtext">
                    @if (!empty($projectData[0]['project_association']))
                    @foreach ($projectData[0]['project_association'] as $v)
                        <div> {{$v['project_associate_title']}} - {{$v['project_associate_name']}}</div>
                    @endforeach                    
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
                <div class="preview_subtext">@if (!empty($projectData[0]['logline'])) {{$projectData[0]['logline']}} @endif</div>
                <div class="preview_headtext">Synopsis/Brief Description</div>
                <div class="preview_subtext">@if (!empty($projectData[0]['synopsis'])) {{$projectData[0]['synopsis']}} @endif</div>
                <div class="preview_headtext">Creator/Founder’s Statement</div>
                <div class="preview_subtext">@if (!empty($projectData[0]['director_statement'])) {{$projectData[0]['director_statement']}} @endif</div>
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
                        <p class="flow_step_text"> Gallary</p>
                    </div>
        
                    <div class="preview_headtext mb-3">Video</div>


                    <div class="video_slider owl-carousel">
                    @if (!empty($projectData[0]['project_only_video']))
                        @foreach ($projectData[0]['project_only_video'] as $v)
                            <div class="item">
                                <div> 
                                    <img src="{{ json_decode($v['media_info'])->thumbnail }}" class="" width=100% alt="image">
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="movie_name_text">{{json_decode($v['media_info'])->title}} </div>
                                    <?php
                                        if($v['is_default_marked'])
                                        {
                                            ?>
                                                <button class="verified_cmn_btn mt-1 mx-3">Featured</button>
                                            <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        @endforeach                    
                        @endif
                    </div>



               
                    <div class="preview_headtext mb-3">Photos</div>



                    
                    <div class="video_slider owl-carousel">
                        @if (!empty($projectData[0]['project_only_image']))
                        @foreach ($projectData[0]['project_only_image'] as $v)
                        <div class="item">
                            <div style=""> <img src="{{ Storage::url($v['file_link']) }}" class="" width="100%" height="240" alt="image"></div>
                            <div class="d-flex align-items-center">
                                <div class="movie_name_text">{{ json_decode($v['media_info'])->title }}</div>
                                <?php
                                if($v['is_default_marked'])
                                {
                                    ?>
                                        <button class="verified_cmn_btn mt-1 mx-3">Featured</button>
                                    <?php
                                }
                            ?>
                            </div>
                        </div>
                            @endforeach                    
                        @endif
                    </div>

                
                    <div class="preview_headtext mb-3">pdf</div>
                    <div class="row">
                        @if (!empty($projectData[0]['project_only_doc']))
                        @foreach ($projectData[0]['project_only_doc'] as $v)
                        <div class="col-md-3 col-10 mt-3 mt-md-0">
                            <div class="document_pdf">
                                <div class="upload_loader">
                                    <i class="fa fa-file-text deep-pink icon-size" aria-hidden="true"></i>
                                </div>
                                <div>
                                    <div class="guide_profile_main_subtext Aubergine_at_night">{{ json_decode($v['media_info'])->name }}</div>
                                </div>
                                <div class="proctect_by_capta_text Aubergine_at_night">{{ json_decode($v['media_info'])->size_label }}</div>
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
                <div class="preview_subtext">@if (!empty($projectData[0]['project_stage']['name'])) {{$projectData[0]['project_stage']['name']}} @endif</div>
                <div class="preview_headtext">Looking For</div>
                <div class=" mt-2">
                    @if (!empty($projectData[0]['project_looking_for']))
                    @foreach ($projectData[0]['project_looking_for'] as $v)
                        <button class="curv_cmn_btn mx-1">{{$v['name']}}</button>
                    @endforeach                    
                    @endif
                </div>
                {{-- <div class="preview_subtext">Talent/Crew/Organisation</div> --}}
                <div class="preview_headtext mb-1">Crowdfunding Link</div>
                <div class="">
                    @if (!empty($projectData[0]['crowdfund_link']))
                        <a href="{{$projectData[0]['crowdfund_link']}}" class="crowdfund_text">{{$projectData[0]['crowdfund_link']}}</a>
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
                    <div class="col-4 col-md-3 preview_subtext">{{ $v['description'] }}</div>
                    <div class="col-4 col-md-3 preview_subtext">{{ $v['budget'] }}</div>
                    <div class="col-4 col-md-3 preview_subtext">{{ $v['traget_date'] }}</div>
                </div>
                @endforeach                    
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-end mt-2">
                        <div class="justify-content-end mt-3 mt-md-0"><button class="save_add_btn float-end"><a class="ancor-link-style" href="{{ route('project-milestone') }}?id={{$_REQUEST['id']}}">Edit</a></button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="text-center my-5">
            <a href="{{ route('project-status') }}?id={{$_REQUEST['id']}}&status=draft"><button class="cancel_btn">Save as draft</button></a>
            <a href="{{ route('project-status') }}?id={{$_REQUEST['id']}}&status=published"><button class="guide_profile_btn">Save & Publish</button></a>
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
      center: true,
      autoPlay: 3000,
      autoplay: true,
      loop: true,
      nav: true,
      center: true,
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