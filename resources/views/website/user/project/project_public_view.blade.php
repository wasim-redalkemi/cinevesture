@extends('website.layouts.app')

@section('title','Cinevesture-index')

@section('header')
@include('website.include.header')
@endsection

@section('nav')
@include('website.include.nav')
@endsection

@section('content')

<section class="public-head-section">

    <div class="main-slider-container">
        <div class="project_image_wraper">
            <img src="{{ asset('images/asset/publicview-head-img.png') }}" class="" alt="image">
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
                                    {{ ucfirst($UserProject->project_name) }}
                                    @else
                                    <span><b>-</b></span>
                                    @endif
                                </div>
                                {{-- <button class="verified-btn mx-3"> <img src="{{ asset('images/asset/verified-badge.svg') }}" width=100% alt="Image"> VERIFIED</button> --}}
                                @if ($UserProject->project_verified==1)
                                <button class="verified-btn mx-3"> <img src="{{ asset('images/asset/verified-badge.svg') }}" width=100% alt="Image"> VERIFIED</button>
                                @endif
                            </div>
                            <div class="public-head-subtext">
                                @if (isset($UserProject->logline))
                                {{ $UserProject->logline}}
                                @else
                                <span><b>-</b></span>
                                @endif
                            </div>
                            <div class="hours-category my-md-4">
                                {{ !empty(($UserProject->duration))?$UserProject->duration:'Duration'}}
                                | @if (!empty($projectData[0]['project_languages']))
                                @foreach ($projectData[0]['project_languages'] as $k => $v)
                                {{$v['name']}}
                                @endforeach
                                @else
                                <span><b>'Empty Project Language'</b></span>
                                @endif
                                | @if (!empty($projectData[0]['project_countries']))
                                @foreach ($projectData[0]['project_countries'] as $k => $v)
                                {{$v['name']}}
                                @endforeach
                                @else
                                <span><b>'Empty Project country'</b></span>
                                @endif
                                <br>
                                @if (!empty($projectData[0]['genres']))
                                @foreach ($projectData[0]['genres'] as $k => $v)
                                {{$v['name']}}
                                @endforeach
                                @else
                                <span><b>'Empty genres'</b></span>
                                @endif
                                | @if (!empty($projectData[0]['project_category']))
                                @foreach ($projectData[0]['project_category'] as $k => $v)
                                {{$v['name']}}
                                @endforeach
                                @else
                                <span><b>'Empty Project Category'</b></span>
                                @endif
                            </div>
                            <table class="table mt-1 table_width">
                                <tbody class="search-table-body white">
                                    <tr>
                                        <td class="public-head-subtext white">Type</td>
                                        <td class="project-sub-text white">
                                            @if (!empty($projectData[0]['project_type']['name']))
                                            {{$projectData[0]['project_type']['name']}}
                                            @else
                                            <span><b>-</b></span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="public-head-subtext white">Created By</td>
                                        <td class="aubergine contact-page-subtext candy-pink">
                                            @if (!empty($projectData[0]['user']['name']))
                                            <a href="{{route('profile-public-show',['id'=>$projectData[0]['user']['id']])}}" class="text_decor_none">{{$projectData[0]['user']['name']}}</a>
                                            @else
                                            <span><b>-</b></span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="public-head-subtext white">Total Budget</td>
                                        <td class="contact-page-subtext white">
                                            @if (!empty($UserProject->total_budget))
                                            $ {{ $UserProject->total_budget}}
                                            @else
                                            <span><b>-</b></span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="public-head-subtext white">Financing Secured</td>
                                        <td class="contact-page-subtext white">
                                            @if (!empty($UserProject->financing_secured))
                                            $ {{ $UserProject->financing_secured}}
                                            @else
                                            <span><b>-</b></span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="public-head-subtext white">Project Stage</td>
                                        <td class="contact-page-subtext white">
                                            @if (!empty($projectData[0]['project_stage']['name']))
                                            {{$projectData[0]['project_stage']['name']}}
                                            @else
                                            <span><b>-</b></span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="public-head-subtext white">Locations</td>
                                        <td class="contact-page-subtext white">
                                            @if (!empty($UserProject->location))
                                            {{ $UserProject->location}}
                                            @else
                                            <span><b>-</b></span>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-6 col-md-12 px-3">
                            <div class="public-head-subimage">
                                <div class="playVideoWrap br_4 mt-3" video-url="@if(!empty($projectData[0]['project_only_video'][0]['file_link'])){{ $projectData[0]['project_only_video'][0]['file_link'] }}@endif">
                                    <img src="@if (isset($projectData[0]['project_only_video'][0]['media_info'])){{json_decode($projectData[0]['project_only_video'][0]['media_info'])->thumbnail}}@endif" alt="">
                                </div>
                                {{-- <iframe width="" height="" src="{{empty($projectData[0]['project_only_video'][0]['file_link'])?'https://www.youtube.com/embed/oYWAwwy5EbQ':$projectData[0]['project_only_video'][0]['file_link'];}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}
                                <!-- <img src="{{ asset('images/asset/download (3) 7.png') }}" width=100% alt="Image"> -->

                            </div>
                            <div class="d-flex my-4 align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    @if ($projectData[0]['user']['id'] != auth()->user()->id)
                                    <button class="cantact-page-cmn-btn mt-2" data-toggle="modal" data-target="#contactModal">Contact Now </button>
                                    {{-- <button class="cantact-page-cmn-btn"><a href=""  class="text_decor_none">Contact Now</a></button> --}}



                                    <!-- Contact modal  -->
                                    <div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="ContactModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content bg_3308">
                                                <div class="modal-body p-0">
                                                    <div class="p-3 float-end">
                                                        <i class="fa fa-times text_fff font_24 pointer" data-dismiss="modal" aria-label="Close"></i>
                                                    </div>
                                                    <section class="p-3">
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="signup-text  mb-4 mt-5"> Contact </div>
                                                                    <div class="row">
                                                                        <div class="col-md-3">
                                                                            {{-- <div><img src="{{ asset('images/asset/photo-1595152452543-e5fc28ebc2b8 2.png') }}" class="w-100 br_100">
                                                                        </div> --}}
                                                                        <?php
                                                                        if (empty($projectData[0]['user']['profile_image'])) {
                                                                        ?>
                                                                            <img src="{{ asset('images/asset/user-profile.png') }}" class="w-100 br_100">
                                                                        <?php
                                                                        } else {
                                                                        ?>
                                                                            <img src="{{Storage::url($projectData[0]['user']['profile_image'])}}" class="w-100 br_100 " alt="product-image" style="height:100%;width:100%;">
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                    <div class="col-md-9">
                                                                        <div class="tile_text text_fff">{{empty($projectData[0]['user']['first_name'])?'Name':ucfirst($projectData[0]['user']['first_name']).' '.ucfirst($projectData[0]['user']['last_name']);}}</div>
                                                                        <div class="organisation_cmn_text text_fff">{{empty($projectData[0]['user']['job_title'])?'Job Title':ucfirst($projectData[0]['user']['job_title']);}}</div>
                                                                    </div>
                                                                </div>
                                                                <div class="mt-3"><input type="text" id="subject" name="subject" value="" placeholder="Subject" class="modal_input"></div>
                                                                <div class="mt-3">
                                                                    <textarea name="message" id="message" cols="25" rows="6" class="w-100 modal_input controlTextLength" placeholder="Message" text-length="1200" maxlength="1200" aria-label="With textarea"></textarea>

                                                                </div>

                                                                <div class="form-check mt-3">
                                                                    <input class="form-check-input modal_check_input" type="checkbox" id="checkbox_cc">
                                                                    <label class="modal_btm_text mx-1">Send a copy to me</label>
                                                                </div>

                                                                <div class="mt-4">
                                                                    <input type="hidden" name="email_1" id="email_1" class="modal_input" value="@if (!empty($projectData[0]['user']['email'])){{$projectData[0]['user']['email']}}@endif">
                                                                    <button type="button" id="contact_btn" class="invite_btn">Send Mail</button>
                                                                </div>
                                                                <div class="modal_btm_text mt-4 mb-5">
                                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Bibendum vel cras vitae morbi varius vitae.
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
            </section>
            </div>
            </div>
            </div>
            </div>
            @endif
            <i class="fa fa-share-alt mx-4 icon-size" aria-hidden="true"></i>
            @if ($projectData[0]['user']['id'] != auth()->user()->id)

            <div> <i class="fa <?php if (isset($UserProject->isfavouriteProject)) {
                                    echo 'fa-heart';
                                } else {
                                    echo 'fa-heart-o';
                                } ?> icon-size heart-color like-project" style="cursor: pointer;" data-id="{{$UserProject->id}}" aria-hidden="true"></i></div>
            @endif
            </div>
            {{-- <div class="d-flex">
                                                <span class="mx-3 white">Report Project</span>
                                                <i class="fa fa-flag icon-size" aria-hidden="true"></i>
                                            </div> --}}
            </div>
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
                <h1 class="public-heading-text"> Synopsis</h1>
                <div class="public-subheading-text mt-2">
                    <p>
                        @if (!empty(($UserProject->synopsis)))
                        {{ $UserProject->synopsis}}
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
                    <h1 class="public-heading-text"> Director Statement</h1>
                    <div class="public-subheading-text mt-2">
                        <p>
                            @if (!empty(($UserProject->director_statement)))
                            {{ $UserProject->director_statement}}
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
                    <h1 class="public-heading-text"> Gallery</h1>
                    <div class="public-head-subtext mt-3">Videos</div>
                    <div class="row">
                        @if (!empty($projectData[0]['project_only_video']))
                        @foreach ($projectData[0]['project_only_video'] as $v)
                        <div class="col-md-3">
                            <div class="playVideoWrap mt-3" video-url="@if(!empty($projectData[0]['project_only_video'][0]['file_link'])){{ $projectData[0]['project_only_video'][0]['file_link']}} @endif">
                                <img src="{{json_decode($projectData[0]['project_only_video'][0]['media_info'])->thumbnail}}" alt="" width="100%">
                            </div>
                        </div>
                        @endforeach
                        @else
                        <span><b>-</b></span>
                        @endif
                    </div>
                    <div class="public-head-subtext mt-3">Photos</div>
                    <div class="row">
                        @if (!empty($projectData[0]['project_only_image']))
                        @foreach ($projectData[0]['project_only_image'] as $v)
                        <div class="col-md-3 mt-3">
                            <div class="project_public_img_wrap image_responsive_wrap">
                                <img src="{{ Storage::url($v['file_link']) }}" class="" width=100% alt="image">
                            </div>
                        </div>
                        @endforeach
                        @else
                        <span><b>-</b></span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="public-head-subtext mt-3">Documents</div>
                <div class="row">
                    @if (!empty($projectData[0]['project_only_doc']))
                    @foreach ($projectData[0]['project_only_doc'] as $v)
                    <div class="col-md-3">
                        <div class="document_pdf document_pdf_project">
                            <div class="upload_loader">
                                <img src="{{ asset('images/asset/pdf_image.svg') }}" alt="image">
                            </div>
                            <div class="mx-3">
                                <div class="public_view_main_subtext">{{ json_decode($v['media_info'])->name }}</div>
                                <div class="proctect_by_capta_text">{{ json_decode($v['media_info'])->size_label }}</div>
                            </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <span><b>-</b></span>
                    @endif
                </div>
            </div>
        </div>

        <div class="public_subsection">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="public-heading-text">Requirements & Milestones</h1>
                    <div class="col-md-9">
                        <table class="table mt-1 require_table_width">
                            <tbody class="search-table-body white">
                                <tr>
                                    <td class="public-head-subtext white">Looking for</td>
                                    <td class="project-sub-text white d-flex flex-wrap w-100">
                                        @if (!empty($projectData[0]['project_looking_for']))
                                        @foreach ($projectData[0]['project_looking_for'] as $k => $v)
                                        <button class="curv_cmn_btn darkbtn">{{ $v['name'] }}</button>
                                        @endforeach
                                        @else
                                        <span><b>-</b></span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="public-head-subtext white">Start Up Funding Stage</td>
                                    <td class="aubergine project-sub-text white w-100">
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
                                        <span><b>-</b></span>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-11">
                            <div class="mt-4">
                                <table class="table">
                                    <tbody class="search-table-body white">
                                        <tr class="requirement-table-header">
                                            <th>Milestone Description</th>
                                            <th>Milestone Budget (USD)</th>
                                            <th>Target Date</th>
                                        </tr>
                                        <tr>
                                            <td class="public-head-subtext candy-pink mt-1">Completed Milstones</td>
                                        </tr>
                                        @php $isEmpty = true;@endphp
                                        @if (!empty($projectData[0]['project_milestone']))
                                        @foreach ($projectData[0]['project_milestone'] as $k => $v)
                                        @if ($v['complete'] == 1 )
                                        @php $isEmpty = false;@endphp
                                        <tr>
                                            <td class="public-head-subtext white">{{ $v['description'] }}</td>
                                            <td class="aubergine project-sub-text white">{{ $v['budget'] }}</td>
                                            <td class="aubergine project-sub-text white">{{ $v['target_date'] }}</td>
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
                                            <td class="candy-pink public-head-subtext mt-1">Upcoming Milstones</td>
                                        </tr>
                                        @php $isEmpty = true;@endphp
                                        @if (!empty($projectData[0]['project_milestone']))
                                        @foreach ($projectData[0]['project_milestone'] as $k => $v)
                                        @if ($v['complete'] ==0 )
                                        @php $isEmpty = false;@endphp
                                        <tr>
                                            <td class="public-head-subtext white">{{ $v['description'] }}</td>
                                            <td class="aubergine project-sub-text white">{{ $v['budget'] }}</td>
                                            <td class="aubergine project-sub-text white ">{{ $v['target_date'] }}</td>
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

        <div class="public_subsection">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="public-heading-text"> Associated With The Project</h1>
                    <div class="col-6">
                        <table class="table mt-2 table_width">
                            <tbody class="search-table-body white">
                                <tr>
                                    <td class="public-head-subtext candy-pink">Title</td>
                                    <td class="project-sub-text candy-pink">
                                        Name
                                    </td>
                                </tr>
                                @if (!empty($projectData[0]['project_association']))
                                @foreach ($projectData[0]['project_association'] as $v)
                                <tr>
                                    <td class="public-head-subtext white">{{$v['project_associate_title']}}</td>
                                    <td class="aubergine project-sub-text white">{{$v['project_associate_name']}}</td>
                                </tr>
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
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="guide_profile_main_text deep-pink font_18">Related Project</div>
                        {{-- @php
                       foreach ($recomProject as $key => $value) {
                        # code...
                            echo '<pre>';
                            print_r($value->project_name);
                        }
                        die;
                        @endphp --}}
                        @if (count($recomProject)>0)
                        
                        <div class="project owl-carousel owl-theme">
                            @foreach($recomProject as $k=>$v)                                
                            <div class="item">
                                <div style="color: azure">{{!empty($v->project_name)?$v->project_name: '-' }}</div>
                                {{-- <a href = "{{route('public-view',['id'=>$v->id])}}"> --}}
                                {{-- <img src="@php echo (!empty($v->projectImage->file_link)?asset('storage/'.$v->projectImage->file_link): asset('images/asset/ba947a848086b8f90238636dcf7efdb5 1 (1).png')) @endphp" width="100%" height="100%"  /> --}}
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

        <div class="public_subsection">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="public-heading-text mb-2"> Related</h1>

                    <div class="test owl-carousel owl-theme">
                        <div class="home_img_wrap">
                            <div class="slider">
                                <div class="img-container">
                                    <img src="{{ asset('images/asset/ba947a848086b8f90238636dcf7efdb5 1.png') }}" alt="image">
                                </div>
                                <div class="secondry-card-top-container w-100">
                                    <div>Movie Title</div>
                                    <div>
                                        <i class="fa fa-heart" style="color: white;" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="home_img_wrap">
                            <img src="{{ asset('images/asset/publicview-head-img.png') }}" alt="image">
                        </div>
                        <div class="home_img_wrap">
                            <img src="{{ asset('images/asset/43710-posts 2.png') }}" alt="image">
                        </div>
                        <div class="home_img_wrap">
                            <img src="{{ asset('images/asset/download (3) 2.png') }}" alt="image">
                        </div>
                        <div class="home_img_wrap">
                            <img src="{{ asset('images/asset/43710-posts 2.png') }}" alt="image">
                        </div>
                        <div class="home_img_wrap">
                            <img src="{{ asset('images/asset/ba947a848086b8f90238636dcf7efdb5 1.png') }}" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
        $("#error-toast").toast("show");
        $("#success-toast").toast("show");
    });

    $('#contact_btn').click(function(e) {
        var subject = $('#subject').val();
        var email_1 = $('#email_1').val();
        var message = $('#message').val();
        var checkbox_cc = ($("#checkbox_cc").prop("checked") == true ? '1' : '0');
        let $btn = $(this);
        e.preventDefault();
        e.stopPropagation();

        $btn.text("Sending..");
        $btn.prop('disabled', true);

        $.ajax({
            url: "{{ route('contact-user-mail-store') }}",
            type: 'POST',
            dataType: 'json',
            data: {
                subject: subject,
                email_1: email_1,
                message: message,
                checkbox_cc: checkbox_cc,
                "_token": "{{ csrf_token() }}"
            },
            success: function(response) {
                $('#subject').val("");
                $('#message').val("");
                $btn.text("Send Mail");
                $btn.prop('disabled', false);
                toastMessage(response.status, response.msg);
                $('.modal').hide();
                $('.modal-backdrop').remove();
            },
            error: function(response, status, error) {
                $btn.text("Send Mail");
                $btn.prop('disabled', false);
                console.log(response);
                console.log(status);
                console.log(error);
            }
        });
    });

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
                            toastMessage("success", response.msg);
                            break;
                        }
                        if (classList[i] == 'fa-heart') {
                            element.removeClass('fa-heart');
                            element.addClass('fa-heart-o');
                            toastMessage("error", response.msg);

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
    $(".test.owl-carousel").owlCarousel({
        //   center: true,
        autoPlay: 1000,
        autoplay: true,
        //   loop: true,
        nav: true,
        margin: 10,
        //   center: true,
        items: 1,
        stagePadding: 0,
        responsive: {
            480: {
                items: 1
            },
            768: {
                items: 2
            },
            1024: {
                items: 4
            }
        },
    });
</script>
@endpush