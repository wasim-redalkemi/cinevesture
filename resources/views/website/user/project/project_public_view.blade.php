@extends('website.layouts.app')

{{-- @section('title','Cinevesture-index') --}}

@section('header')
@include('website.include.header')
@endsection

{{-- @section('nav')
@include('website.include.nav')
@endsection --}}

@section('content')
<section class="public-head-section">
    <div class="hide-me animation for_authtoast">
        @include('website.include.flash_message')
    </div>
    <div class="main-slider-container">
        <div class="project_image_wraper">            
            @if (isset($projectData[0]['banner_image']))
                <img src="{{ Storage::url($projectData[0]['banner_image']) }}" class="" alt="image">
            @else
                <img src="{{ asset('images/asset/publicview-head-img.png') }}" class="" alt="image">
            @endif
            <div class="public-head-image-shadow"></div>
        </div>
        <div>
            <div class="public-head-container">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 text-center text-lg-start">
                            <div class="verified-text-area">
                                <div class="public-head-text">
                                    @if (!empty(($UserProject->project_name)))
                                    <span class="blackTextShadow">    {{ ucfirst($UserProject->project_name) }}</span>
                                    @else
                                    <span><b>-</b></span>
                                    @endif
                                </div>
                                {{-- <button class="verified-btn mx-3"> <img src="{{ asset('images/asset/verified-badge.svg') }}" width=100% alt="Image"> VERIFIED</button> --}}
                                @if ($UserProject->project_verified==1)
                                <button class="verified-btn mx-3"> <img src="{{ asset('images/asset/verified-badge.svg') }}" width=100% alt="Image"> VERIFIED</button>
                                @endif
                            </div>
                            <div class="public-head-res-subtext text-start">
                                @if (isset($UserProject->logline))
                                <span class="blackTextShadow">    @php echo $UserProject->logline @endphp
                                </span>
                                @else
                                <span><b>-</b></span>
                                @endif
                            </div>
                            <div class="hours-category my-md-4 blackTextShadow text-start">
                                @if (!empty(($UserProject->duration)))
                                    {{$UserProject->duration.' min'}}
                                {{-- <?php echo ((intdiv($UserProject->duration, 60)>0)?sprintf(intdiv($UserProject->duration, 60).' hr'):'') .' '. ((($UserProject->duration % 60)>0)?( sprintf($UserProject->duration % 60).' min'):'');?> --}}
                                @else
                                {{'Duration'}}                                    
                                @endif 

                                @if (!empty($projectData[0]['project_languages']))
                                    |@php $temp_all_data = [] @endphp
                                    @foreach ($projectData[0]['project_languages'] as $k => $v)
                                        @php $temp_all_data[] = $v['name'] @endphp
                                    @endforeach
                                    {{implode(', ',$temp_all_data)}}
                                @else
                                    <span><b>'Empty Project Language'</b></span>
                                @endif

                                @if (!empty($projectData[0]['project_countries']))
                                    |@php $temp_all_data = [] @endphp
                                    @foreach ($projectData[0]['project_countries'] as $k => $v)
                                        @php $temp_all_data[] = $v['name'] @endphp
                                    @endforeach
                                    {{implode(', ',$temp_all_data)}}
                                @else
                                    <span><b>'Empty Project country'</b></span>
                                @endif

                                <br>
                                @if (!empty($projectData[0]['genres']))
                                    @php $temp_all_data = [] @endphp
                                    @foreach ($projectData[0]['genres'] as $k => $v)
                                        @php $temp_all_data[] = $v['name'] @endphp
                                    @endforeach
                                    {{implode(', ',$temp_all_data)}}
                                @else
                                    <span><b>'Empty genres'</b></span>
                                @endif

                                @if (!empty($projectData[0]['project_category']))
                                    |@php $temp_all_data = [] @endphp
                                    @foreach ($projectData[0]['project_category'] as $k => $v)
                                        @php $temp_all_data[] = $v['name'] @endphp
                                    @endforeach
                                    {{implode(', ',$temp_all_data)}}
                                @else
                                    <span><b>'Empty Project Category'</b></span>
                                @endif
                            </div>
                            <table class="table mt-1 table_width">
                                <tbody class="search-table-body white">
                                    <tr>
                                        <td class="public-head-subtext white blackTextShadow text-start">Type</td>
                                        <td class="contact-page-subtext white blackTextShadow text-end text-md-start">
                                            @if (!empty($projectData[0]['project_type']['name']))
                                            {{$projectData[0]['project_type']['name']}}
                                            @else
                                            <span><b>-</b></span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="public-head-subtext white blackTextShadow text-start">Created By</td>
                                        <td class="aubergine contact-page-subtext candy-pink blackTextShadow text-end text-md-start">
                                            @if (!empty($projectData[0]['user']['name']))
                                                @if($show == true)
                                                    {{config('constants.HIDE_SOME_INFO')}}
                                                @else
                                                    <a href="{{route('profile-public-show',['id'=>$projectData[0]['user']['id']])}}" class="text_decor_none">{{ ucwords($projectData[0]['user']['name'])}}</a>
                                                @endif
                                            @else
                                            <span><b>-</b></span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="public-head-subtext white blackTextShadow text-start">Total Budget</td>
                                        <td class="contact-page-subtext white blackTextShadow text-end text-md-start">
                                            @if (!empty($UserProject->total_budget))
                                            {{-- $ {{ $UserProject->total_budget}} --}}
                                            ${{ number_format($UserProject->total_budget, 0,'.',',') }}

                                            @else
                                            <span><b>-</b></span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="public-head-subtext white blackTextShadow text-start">Financing Secured</td>
                                        <td class="contact-page-subtext white blackTextShadow text-end text-md-start">
                                            @if (!empty($UserProject->financing_secured))
                                            ${{ number_format($UserProject->financing_secured, 0,'.',',')}}
                                            @else
                                            <span><b>-</b></span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="public-head-subtext white blackTextShadow text-start">Project Stage</td>
                                        <td class="contact-page-subtext white blackTextShadow text-end text-md-start">
                                            @if (!empty($projectData[0]['project_stage']['name']))
                                            {{$projectData[0]['project_stage']['name']}}
                                            @else
                                            <span><b>-</b></span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="public-head-subtext white blackTextShadow text-start">Locations</td>
                                        <td class="contact-page-subtext white blackTextShadow text-end text-md-start">
                                            @if (!empty($UserProject->location))
                                            {{ ucFirst($UserProject->location)}}
                                            @else
                                            <span><b>-</b></span>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-1 col-md-0"></div>
                        <div class="col-lg-5 col-md-12 px-3">
                            <div class="public-head-subimage">
                                <div class="playVideoWrapForheader playVideoWrap br_4 mt-3" video-url="@if(!empty($projectData[0]['project_mark_video'][0]['file_link'])){{ $projectData[0]['project_mark_video'][0]['file_link'] }}@endif">
                                    @if (isset($projectData[0]['project_mark_video'][0]['thumbnail_label']))
                                        <img src="{{$projectData[0]['project_mark_video'][0]['thumbnail_label']}}" alt="{{$projectData[0]['project_mark_video'][0]['thumbnail_label']}}" class="br_4 w-100">
                                    @endif
                                </div>
                            </div>
                          {{-- {{$show}} --}}
                            @if ($show== true)
                               
                            @else
                            <div class="d-flex my-4 align-items-center  justify-content-between ">
                                <div class="d-flex align-items-center">
                                    @if ($projectData[0]['user']['id'] != auth()->user()->id && (auth()->user()->parent_user_id != $projectData[0]['user']['id'] ))
                                        <button class="cantact-page-cmn-btn" id="contact_modal" data-toggle="modal" data-target="#contactModal">Contact Now</button>
                                    {{-- <button class="cantact-page-cmn-btn"><a href=""  class="text_decor_none">Contact Now</a></button> --}}

                                    @endif
                                    <!-- <i class="fa fa-share-alt mx-4 icon-size" aria-hidden="true"></i> -->
                                    {{-- <input type="hidden" name="" class="share_link" id="" value=""> --}}
                                    <button onclick="copyToClipboard('#urlcopy')" style="background-color: transparent" class="clipboard pointer border-0"><img src="{{ asset('images/asset/share_image.svg') }}" class="mx-3" alt="image"></button>
                                    <p id="urlcopy" class="d-none">{{route('project-public-show')}}?id={{$UserProject->id}}&data={{true}}</p>

                                    @if ($projectData[0]['user']['id'] != auth()->user()->id && (auth()->user()->parent_user_id != $projectData[0]['user']['id'] ))
                                    <div> <i class="fa <?php if(isset($UserProject->isfavouriteProjectOne)){echo'fa-heart';}else{echo'fa-heart-o';} ?> icon-size heart-color like-project" style="cursor: pointer;" data-id="{{$UserProject->id}}" aria-hidden="true"></i></div>
                                    @endif
                                </div>
                               
                            </div>
                            @endif
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="public_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="public-head-res-text"> Synopsis</h1>
                <div class="public-subheading-text mt-3 mt-md-2">
                    <p>
                        @if (!empty(($UserProject->synopsis)))
                        {{ ucFirst($UserProject->synopsis)}}
                        @else
                        <span><b>-</b></span>
                        @endif
                    </p>
                </div>
            </div>
        </div>

        <div class="public_subsection">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="public-head-res-text"> Director's Statement</h1>
                    <div class="public-subheading-text mt-3 mt-md-2">
                        <p>
                            @if (!empty(($UserProject->director_statement)))
                            @php
                               echo ucFirst($UserProject->director_statement)
                            @endphp
                            @else
                            <span><b>-</b></span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="public_subsection">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="public-head-res-text"> Gallery</h1>
                    <div class="public-head-subtext mt-3">Videos</div>
                    <div class="d-flex flex-wrap justify-content-center justify-content-md-start">
                            @if (!empty($projectData[0]['project_only_video']))
                        @foreach ($projectData[0]['project_only_video'] as $v)
                        <div class="mt-2 mr_3">
                            <div class="playVideoWrap mt-3" style="min-height: 200px;" video-url="@if(!empty($v['file_link'])){{ $v['file_link']}} @endif">
                                <img src="{{json_decode($v['media_info'])->thumbnail}}" alt="" width="100%" height="100%">
                            </div>
                        </div>
                        @endforeach
                        @else
                        <span class="text-light"><b>-</b></span>
                        @endif
                    </div>
                    <div class="public-head-subtext mt-3">Banner Photo</div>
                    <div class="row">
                        @if (!empty($projectData[0]['banner_image']))
                        <div class="col-md-3 mt-3">
                           <div class="d-flex justify-content-center justify-content-md-start">
                           <div class="project_public_img_wrap image_responsive_wrap image_in_full_view">
                                    <img src="{{ Storage::url($projectData[0]['banner_image']) }}" class="" width=100% alt="image">
                            </div>
                           </div>
                        </div>
                        @else
                        <span class="text-light"><b>-</b></span>
                        @endif
                    </div>

                    <div class="public-head-subtext mt-3">Photos</div>
                    <div class="d-flex flex-wrap justify-content-center justify-content-md-start">
                        @if (!empty($projectData[0]['project_only_image']))
                        @foreach ($projectData[0]['project_only_image'] as $v)
                        <div class="mt-3 mr_3">
                            <div class="project_public_img_wrap image_responsive_wrap image_in_full_view">
                                    <img src="{{ Storage::url($v['file_link']) }}" class="" width=100% alt="image">
                            </div>
                        </div>
                        @endforeach
                        @else
                        <span class="text-light"><b>-</b></span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    <div class="public_subsection">
        <div class="row">
            <div class="col-md-12">
                <div class="public-head-subtext mt-3">Documents</div>
                <div class="row">
                    @if (!empty($projectData[0]['project_only_doc']))
                    @foreach ($projectData[0]['project_only_doc'] as $v)
                    <div class="col-md-3 col-8 mt-3">
                        <div class="document_pdf document_pdf_project docsPreview" docs-url="{{Storage::url($v['file_link'])}}">
                            <div class="upload_loader">
                                <img src="{{ asset('images/asset/pdf_image.svg') }}" alt="image">
                            </div>
                            <div class="mx-3">
                                <div class="public_view_main_subtext">{{ json_decode($v['media_info'])->name }}</div>
                                <div class="proctect_by_capta_text">{{ json_decode($v['media_info'])->size_label }}</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <span class="text-light"><b>-</b></span>
                    @endif
                </div>
            </div>
        </div>

        <div class="public_subsection">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="public-head-res-text">Requirements & Milestones</h1>
                    <div class="col-md-9">
                        <table class="table mt-1 require_table_width">
                            <tbody class="search-table-body white">
                                <tr>
                                    <td class="public-head-subtext white">Looking for</td>
                                    <td class="public-sub-res-text white d-flex flex-wrap w-100">
                                        @if (!empty($projectData[0]['project_looking_for']))
                                        @foreach ($projectData[0]['project_looking_for'] as $k => $v)
                                        <button class="curv_cmn_btn lookingTag">{{ $v['name'] }}</button>
                                        @endforeach
                                        @else
                                        <span><b>-</b></span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="public-head-subtext white">Start Up Funding Stage</td>
                                    <td class="aubergine public-sub-res-text white w-100">
                                        @if (!empty($projectData[0]['project_stage_of_funding']['name']))
                                        {{$projectData[0]['project_stage_of_funding']['name']}}
                                        @else
                                        <span><b>-</b></span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="public-head-subtext white">Crowdfunding link</td>
                                    <td class="crowdfund_text w-100">
                                        @if (!empty($UserProject->crowdfund_link))
                                        <a href="{{ $UserProject->crowdfund_link}}" class="white">{{ $UserProject->crowdfund_link}}</a>
                                        @else
                                        <span class="text-light"><b>-</b></span>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="conatiner">

                        <div class="row">
                            <div class="col-md-11">
                                <div class="mt-4">
                                    <table class="table">
                                        <tbody class="search-table-body white">
                                            <tr class="requirement-table-header">
                                                <th style="width: 39%;">Milestone Description</th>
                                                <th style="width: 39%;">Milestone Budget (USD)</th>
                                                <th style="width: 39%;">Target Date</th>
                                            </tr>
                                            <tr>
                                                <td class="public-head-subtext candy-pink mt-1">Completed Milestones</td>
                                            </tr>
                                            @php $isEmpty = true;@endphp
                                            @if (!empty($projectData[0]['project_milestone']))
                                            @foreach ($projectData[0]['project_milestone'] as $k => $v)
                                            @if ($v['complete'] == 1 )
                                            @php $isEmpty = false;@endphp
                                            <tr>
                                                <td class="public-head-subtext white">{{ ucFirst($v['description']) }}</td>
                                                <td class="aubergine public-sub-res-text white">{{ '$'.number_format($v['budget'], 0,'.',',') }}</td>
                                                <td class="aubergine public-sub-res-text white">{{ strtoupper(date('jS F Y',strtotime($v['target_date']))) }}</td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
    
                                            @if ($isEmpty == true)
                                            <tr>
                                                <td colspan="3">
                                                    <span class="text-white"><b>-</b></span>
                                                </td>
                                            </tr>
                                            @endif
    
                                            <tr>
                                                <td class="candy-pink public-head-subtext mt-1">Upcoming Milestones</td>
                                            </tr>
                                            @php $isEmpty = true;@endphp
                                            @if (!empty($projectData[0]['project_milestone']))
                                            @foreach ($projectData[0]['project_milestone'] as $k => $v)
                                            @if ($v['complete'] ==0 )
                                            @php $isEmpty = false;@endphp
                                            <tr>
                                                <td class="public-head-subtext white">{{ ucFirst($v['description']) }}</td>
                                                <td class="aubergine public-sub-res-text white">{{ '$'.number_format($v['budget'], 0,'.',',') }}</td>
                                                <td class="aubergine public-sub-res-text white ">{{ strtoupper(date('jS F Y',strtotime($v['target_date']))) }}</td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
    
                                            @if ($isEmpty == true)
                                            <tr>
                                                <td colspan="3">
                                                    <span class="text-white"><b>-</b></span>
                                                </td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
        <div class="public_subsection">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="public-head-res-text"> Associated With The Project</h1>
                    <div class="">
                        <table class="table mt-2 table_width">
                            <tbody class="search-table-body white">
                                <tr>
                                    <td class="public-head-subtext candy-pink">Title</td>
                                    <td class="public-head-subtext candy-pink">
                                        Name
                                    </td>
                                </tr>
                                @if (!empty($projectData[0]['project_association']))
                                @foreach ($projectData[0]['project_association'] as $v)
                                @if ($show== true)
                                <tr>
                                    <td class="public-head-subtext white">
                                        {{config('constants.HIDE_SOME_INFO')}}
                                    </td>
                                    <td class="aubergine public-sub-res-text white">
                                        {{config('constants.HIDE_SOME_INFO')}}
                                    </td>
                                </tr>
                               @else
                               <tr>
                                    <td class="public-head-subtext white">{{ucwords($v['project_associate_title'])}}</td>
                                    <td class="aubergine public-sub-res-text white">{{ucwords($v['project_associate_name'])}}</td>
                                </tr>
                               @endif
                                
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="2">
                                        <span class="text-white"><b>-</b></span>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
       

        <div class="guide_profile_subsection">
            <div class="">
                <div class="row">
                    <div class="col-md-12">
                        {{-- <div class="guide_profile_main_text deep-pink font_18">Related Project</div> --}}
                      
                        @if (count($recomProject)>0)
                        
                        <div class="project owl-carousel owl-theme">
                            @foreach($recomProject as $k=>$v)                                
                            <div class="item">
                                <div style="color: azure">{{!empty($v->project_name)?$v->project_name: '-' }}</div>
                                {{-- <a href = "{{route('public-view',['id'=>$v->id])}}"> --}}
                                <img src="@php echo (!empty($v->projectImage->file_link)?asset('storage/'.$v->projectImage->file_link): asset('images/asset/ba947a848086b8f90238636dcf7efdb5 1 (1).png')) @endphp" width="100%" height="100%"  />
                                {{-- <div class="guide_profile_main_subtext">@php echo (!empty($v->project_name)?$v->project_name
                                
                                : '-') @endphp</div> --}}
                                {{-- </a> --}}
                            </div>                                
                            @endforeach
                        </div>
                        @else
                        <span><b>-</b></span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
       @if ($show==true)
           
       @else
        <div class="public_subsection">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="public-head-res-text mb-2"> Related</h1>
                    
                    <div class="related owl-carousel owl-theme">
                        @if(count($recomProject)>0)
                            @foreach ($recomProject as $value)
                            <div class="home_img_wrap">
                            
                                <div class="slider">
                                <a href="{{route('public-view',['id'=>$value->id])}}">
                                
                                    {{-- {{$value->projectOnlyImage[0]->file_link}} --}}
                                    <div class="img-container gradient"> 
                                        @if (!empty($value->projectOnlyImage[0]->file_link))
                                        <img src="{{ Storage::url($value->projectOnlyImage[0]->file_link) }}" alt="image"> 
                                        @else
                                        <img src="{{ asset('images/asset/ba947a848086b8f90238636dcf7efdb5 1.png') }}" alt="image">    
                                        @endif
                                    </div>
                                    <div class="secondry-card-top-container w-100">
                                        <div>{{$value->project_name}}</div>
                                    </div>
                                </a> 
                                    <div class="like_btn_wrapper">
                                        <div> <i class="fa <?php if(isset($value->isfavouriteProjectOne)){echo'fa-heart';}else{echo'fa-heart-o';} ?> icon-size text-white like-project" style="cursor: pointer;" data-id="{{$value->id}}" aria-hidden="true"></i></div>
                                    </div>  
                                </div>                            
                                
                            </div> 
                            @endforeach 
                        @else
                            <span class="text-white"><b>-</b></span>
                        @endif 
                    </div>
                    
                </div>
            </div>
        </div>
        @endif
        <!-- Contact modal  -->
        @include('website.modal.contact', [                                         
            'image' => (!empty($projectData[0]['user']['profile_image'])?$projectData[0]['user']['profile_image']:asset('images/asset/user-profile.png')),
            'name' => empty($projectData[0]['user']['first_name'])?'Name':ucfirst($projectData[0]['user']['first_name']).' '.ucfirst($projectData[0]['user']['last_name']),
            'title' =>empty($projectData[0]['user']['job_title'])?'Job Title':ucfirst($projectData[0]['user']['job_title']), 
            'email' =>empty($projectData[0]['user']['email'])?'Email':$projectData[0]['user']['email'], 
        ])
    </div>
</section>
@endsection

@section('footer')
@include('website.include.footer')
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // $("#error-toast").toast("show");
        // $("#success-toast").toast("show");

        var $temp = $("<input>");
        var $url = $(location).attr('href');

        // $('.clipboard').on('click', function() {
                                         
        //                 toastMessage(response.status, response.msg);
                   
        // $("body").append($temp);
        // toastMessage("success",'copy successfully');
        // toastr.success('Success'."copy");
        // toastr.success('Click Button','done');

        // toastMessage("1", 'URL copied')
        // $temp.val($url).select();
        // document.execCommand("copy");
        // $temp.remove();
        // $("p").text("URL copied!");
       
        // $(".forCopy").text("URL copied!");
        // })
        // $('#forCopy').click(function() {
        //    toastr.success('Click Button');
        // });
    });
    $("#contact_modal").on("click", function() {
                    $("#subject").val("");
                    $("#message").val("");
                 });
   

    // $('#contact_btn').click(function(e)
    //         {
    //             var subject = $('#subject').val();
    //             var email_1 = $('#email_1').val();
    //             var message = $('#message').val();
    //             var checkbox_cc = ($("#checkbox_cc").prop("checked") == true ? '1' : '0');
    //             let $btn = $(this);
    //             e.preventDefault();
    //             e.stopPropagation();

    //             $btn.text("Sending..");
    //             $btn.prop('disabled',true);
                
    //             $.ajax(
    //             {
    //                 url:"{{ route('contact-user-mail-store') }}",
    //                 type:'POST',
    //                 dataType:'json',
    //                 data:{subject:subject,email_1:email_1,message:message,checkbox_cc:checkbox_cc,"_token": "{{ csrf_token() }}"},
    //                 success:function(response)
    //                 {   $('#subject').val("");
    //                     $('#message').val("");
    //                     $btn.text("Send Mail");
    //                     $btn.prop('disabled',false);
    //                     toastMessage(response.status, response.msg);
    //                     $('.modal').hide();
    //                     $('.modal-backdrop').remove();
    //                 },
    //                 error:function(response,status,error)
    //                 {     $btn.text("Send Mail");
    //                       $btn.prop('disabled',false);
    //                     console.log(response);
    //                     console.log(status);
    //                     console.log(error);
    //                 } 
    //             });
    //         });

    $('.like-project').on('click', function(e) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var project_id = $(this).attr('data-id');
        var classList = $(this).attr('class').split(/\s+/);
        var element = $(this);
        $.ajax({
            type: 'post',
            data: {
                'id': project_id
            },
            url: "{{route('project-like')}}",
            success: function(resp) {
                if (resp.status) {
                    for (var i = 0; i < classList.length; i++) {
                        if (classList[i] == 'fa-heart-o') {
                            element.removeClass('fa-heart-o');
                            element.addClass('fa-heart')
                            toastMessage("success", resp.msg);
                            break;
                        }
                        if (classList[i] == 'fa-heart') {
                            element.removeClass('fa-heart');
                            element.addClass('fa-heart-o');
                            toastMessage("success", resp.msg);

                            break;
                        }
                    }
                } else {

                }
            },
            error: function(error) {

            }
        });

    });

    $(".related.owl-carousel").owlCarousel({
        //   center: true,
        autoPlay: 1000,
        // autoplay: true,
        //   loop: true,
        margin: 20,
      center: false,
      items: 1,
      autoplayHoverPause: true,
      stagePadding: 0,
      responsive: {
        480: { items: 1 },
        768: { items: 2 },
        1080: {
          items: 3
        },
        1225: {
          items: 3
        },
        1400: {
          items: 4
        },
        1925: {
          items: 5.5
        }
      },
    });
</script>
<script>

//     $(".for_copy_url").click( function (e) {
        
//         let dataForCopy = $('.share_link').attr('src')

//         const copyContent = async () => {
//     try {
//       await navigator.clipboard.writeText(dataForCopy);
//       console.log('Content copied to clipboard');
//     } catch (err) {
//       console.error('Failed to copy: ', err);
//     }
//   }
  
//   copyContent()
//     } )
function copyToClipboard(element) {
 
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();
  new toastMessage("Success",'URL copied')
//   toastr.success('URL copied','Success');
// toastr.success('Project Update successfull!','success');
//   toastMessage("1", 'URL copied')
}
</script>
@endpush
