@extends('website.layouts.app',['class' => 'bg_white'])

{{-- @section('title','Cinevesture-Applicants') --}}

@section('header')
@include('website.include.header')
@endsection
@php
use Illuminate\Support\Facades\DB;
@endphp
@section('content')
<div class="hide-me animation for_authtoast">
    @include('website.include.flash_message')
</div>
<!-- Applications of the job -->
<section class="guide_profile_section">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('website.include.profile_sidebar')
            </div>
            <div class="col-md-9">
            <div class="content_wraper">
                        <div class="guide_profile_subsection">
                            <div class="profile_text">
                                <h1>{{empty($jobTitle)?'Job Title':ucwords($jobTitle)}}</h1>
                            </div>
                        </div>
                        <div class="guide_profile_subsection">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex">
                                        <div class="user_profile_container">
                                            @if (empty($applicant->profile_image))                                            
                                                <img src="{{ asset('images/asset/user-profile.png') }}" class="w-100 br_100">
                                            @else
                                                <img src="{{Storage::url($applicant->profile_image)}}" class="w-100 br_100 " alt="product-image" style="height:100%;width:100%;">
                                            @endif
                                        </div>
                                        <div class="mx-4">
                                        <div class="guide_profile_main_text pt-3">{{$applicant->first_name.' '.$applicant->last_name}}</div>
                                       <div>
                                        <span class="associate_text deep-pink"><a href="{{route('profile-public-show',['id'=>$applicant->id])}}" class="">View Profile</a></span>
                                        {{-- <span class="associate_text deep-pink mx-3"><a href="" class="">Contact</a></span> --}}
                                        <span ><button class=" cover_page_contact deep-pink mx-3" data-toggle="modal" data-target="#contactModal">Contact </button></span>

                                        <!-- Contact modal  -->
                                        @include('website.modal.contact', [                                         
                                            'image' => (!empty($applicant->profile_image)?$applicant->profile_image:asset('images/asset/user-profile.png')),
                                            'name' => empty($applicant->first_name)?'Name':ucfirst($applicant->first_name).' '.ucfirst($applicant->last_name),
                                            'title' =>empty($applicant->job_title)?'Job Title':ucfirst($applicant->job_title), 
                                            'email' =>empty($applicant->email)?'Email':$applicant->email, 
                                        ])
                                       </div>
                                    </div>
                                            </div>
                                    <div class="pt-3">
                                        <i class="fa {{$isLiked ? 'fa-heart' : 'fa-heart-o'}} icon-size Aubergine" aria-hidden="true"></i>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="guide_profile_subsection">
                            <div class="guide_profile_main_text">Cover Letter</div>
                            <div class="posted_job_header">{{empty($coverLetter->cover_letter)?'-':ucFirst($coverLetter->cover_letter) }}</div>
                        </div>

                        <div class="guide_profile_subsection">
                            <div class="guide_profile_main_text">Resume</div>

                            <div class="row">
                                <div class="col-lg-4 col-sm-6 mt-sm-2 mt-2">
                                    <div class="d-flex doc_container docsPreview" docs-url="{{asset('storage/'.$coverLetter->resume)}}">
                                        <div class="icon">
                                            <img src="{{ asset('images/asset/pdf-icon.png') }}">
                                        </div>
                                        <a class="public-subheading-text mx-2">
                                            <div class="resume-download-txt break_all">{{empty($coverLetter->resume_original_name)?'-':$coverLetter->resume_original_name }}</div>
                                            <div class="resume-download-txt">{{empty($coverLetter->resume_size)?'-':$coverLetter->resume_size }}</div>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="guide_profile_subsection">
                            <div class="">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="guide_profile_main_text deep-pink font_18">
                                            <h1 class="">About</h1>
                                        </div>
                                        <div class="guide_profile_main_subtext Aubergine_at_night mt-2">
                                            <p>
                                               {{empty($applicant->about)?'-':ucFirst($applicant->about) }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                    <div class="col-md-5 ">
                                        <div class="playVideoWrap" video-url="{{$applicant->intro_video_link}}">
                                            <img src="{{$applicant->intro_video_thumbnail}}" alt="" width="100%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="guide_profile_subsection">
                            <div class="">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="guide_profile_main_text deep-pink font_18">Portfolio</div>
                                        @if (count($portfolio)>0)
                                            <div class="portfolio owl-carousel">
                                                @foreach ($portfolio as $k=>$v)
                                                @php
                                                $v = $v->toArray();
                                                $img = '';
                                                if (!empty($v['get_portfolio'][0]['file_link'])) {
                                                    $img = Storage::url($v['get_portfolio'][0]['file_link']);
                                                } else {
                                                $img = asset('images/asset/user-profile.png');
                                                }
                                                @endphp
                                                <div class="item portfolio_item" onclick="portfolio_model({{$v['id']}})">
                                                    <div class="portfolio_item_image" style="width:280px">
                                                        <img src="<?php echo $img ?>" class="portfolio_img" width="100%">
                                                    </div>
                                                    <div class="d-flex justify-content-between mt-2">
                                                        <div class="organisation_cmn_text">{{$v['portfolio_title']}}</div>
                                                        <!-- <div class="icon_container"> <a href="{{ route('portfolio-edit', ['id'=>$v['id']]) }}"><i class="fa fa-pencil deep-pink pointer font_12" aria-hidden="true"></i></a></div> -->
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                            <div class="clearfix"></div>
                                        @else
                                            <span><b>-</b></span>
                                        @endif
                                        <!-- modal  -->
                                        <div>
                                            <div class="modal fade" id="portfolioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content croper_modal">
                                                        <div class="modal-body">
                                                            <div class="float-end">
                                                                <button type="button" class="close normal_btn" data-dismiss="modal" aria-label="Close">
                                                                    <img src="{{ asset('images/asset/cros-modal-Icon.svg') }}" />
                                                                </button>
                                                            </div>
                                                            <div class="modal_content">
            
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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



@include('website.include.profilefavscript')
@push('scripts')
<script>
$(".portfolio.owl-carousel").owlCarousel({
    center: true,
    autoPlay: 1000,
    autoplay: true,
    // loop: true,
    nav: true,
    margin: 20,
    center: false,
    items: 1,
    responsive: {
        480: {
            items: 1
        },
        768: {
            items: 2
        },
        1024: {
            items: 3
        }
    },
});
function portfolio_model(id) {
        $("#portfolioModal .modal_content").html('');
        $.ajax({
            url: "{{ route('portfolio-modal') }}",
            type: 'POST',
            dataType: 'json',
            data: {
                portfolioId: id,
                "_token": "{{ csrf_token() }}"
            },
            success: function(response) {
                console.log(response)
                $("#portfolioModal .modal_content").html(response);
                // toastMessage(response.status, response.msg);
                $('#portfolioModal').modal('show');
                // $('.modal-backdrop').remove();
            },
            error: function(response, status, error) {
                console.log(response);
                console.log(status);
                console.log(error);
            }
        });
    }
</script>
@endpush