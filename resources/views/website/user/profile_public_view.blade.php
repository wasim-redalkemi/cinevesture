@extends('website.layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-portfolio')

@section('header')
@include('website.include.header')
@endsection

@section('content')
<div class="hide-me animation for_authtoast">
    @include('website.include.flash_message')
</div>

<body class="bg_white">
    <section class="guide_profile_section">
        <div class="mb-3"> <i class="fa fa-arrow-left" aria-hidden="true"></i> <span class="back_btn_profile"> Back</span></div>
        <div class="content_wraper">
            <div class="guide_profile_subsection">
                <div class="container">
                    <div class="hide-me">
                        @include('website.include.flash_message')
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="user_profile_container">
                                <?php
                                if (empty($user->profile_image)) {
                                ?>
                                    <img src="{{ asset('public/images/asset/user-profile.png') }}" />
                                <?php
                                } else {
                                ?>
                                    <img src="{{Storage::url($user->profile_image)}}" class="prod-img" alt="product-image" style="height:100%;width:100%;">
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="guide_profile_main_text pt-3">{{empty($user->first_name)?'Name':$user->first_name.' '.$user->last_name;}}</div>
                            <div class="guide_profile_main_subtext">Lorem ipsum dolor sit amet, consectetur adipiscing
                                elit.</div>
                            <div><button class="guide_profile_btn mt-2" data-toggle="modal" data-target="#contactModal">Contact </button></div>

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
                                                                    <div><img src="{{ asset('public/images/asset/photo-1595152452543-e5fc28ebc2b8 2.png') }}" class="w-100 br_100"></div>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="tile_text text_fff">Name</div>
                                                                    <div class="organisation_cmn_text text_fff">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                                                                </div>
                                                            </div>
                                                            <div class="mt-3"><input type="text" id="subject" name="subject" value="" placeholder="Subject" class="modal_input"></div>
                                                            <div class="mt-3">
                                                                <textarea name="message" id="message" cols="25" rows="6" class="w-100 modal_input" placeholder="Message"></textarea>
                                                            </div>

                                                            <div class="form-check mt-3">
                                                                <input class="form-check-input modal_check_input" type="checkbox" id="check1" name="option1" value="something" checked>
                                                                <label class="modal_btm_text mx-1">Send a copy to me</label>
                                                            </div>

                                                            <div class="mt-4">
                                                                {{-- <input type="text" id="subject" name="e" value="" placeholder="Subject" class="modal_input"> --}}
                                                                <input type="hidden" name="email_1" id="email_1" class="modal_input" value="@if (!empty($user->email)){{$user->email}}@endif">
                                                                <button type="button" class="invite_btn">Send Mail</button>
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

                        </div>
                        <div class="col-md-2 d-flex pt-3 justify-content-lg-end">
                            <i class="fa fa-heart icon-size Aubergine" aria-hidden="true"></i>
                            <button class="verified_cmn_btn mx-3"> <i class="fa fa-check-circle hot-pink mx-1" aria-hidden="true"></i> VERIFIED</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="guide_profile_subsection">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 guide_profile_main_text deep-pink font_24">
                            <h1>Overview</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="guide_profile_main_text mt-3">
                                <p> Skils</p>
                            </div>
                            <div class="d-flex mt-3">
                                <button class="curv_cmn_btn">Skills 1</button>
                                <button class="curv_cmn_btn mx-2">Skills 1</button>
                                <button class="curv_cmn_btn">Skills 1</button>
                                <button class="curv_cmn_btn mx-2">Skills 1</button>
                            </div>
                            <div class="guide_profile_main_text mt-3">Available to Work In</div>
                            <div class="guide_profile_main_subtext Aubergine_at_night mt-2">{{ empty($user->available_to_work_in)?'Available_to_work_in':$user->available_to_work_in; }}</div>
                            <div class="guide_profile_main_text mt-3">Languages Spoken</div>
                            <div class="guide_profile_main_subtext Aubergine_at_night mt-2">Hindi</div>
                            <div class="guide_profile_main_subtext Aubergine_at_night mt-1">English</div>
                        </div>
                        <div class="col-md-6">
                            <div class="guide_profile_main_text mt-3">
                                <p> Social Profile</p>
                            </div>
                            <div class="guide_profile_main_subtext mt-3">IMDB Profile</div>
                            <div class="guide_profile_main_subtext deep-pink mt-1">{{ $user->imdb_profile }}</div>
                            <div class="guide_profile_main_subtext mt-3">LinkedIn Profile</div>
                            <div class="guide_profile_main_subtext deep-pink">{{ $user->linkedin_profile }}</div>
                            <div class="guide_profile_main_subtext mt-3">Website</div>
                            <div class="guide_profile_main_subtext deep-pink mt-1">{{ $user->website }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="guide_profile_subsection">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="guide_profile_main_text deep-pink font_18">
                                <h1 class="">About</h1>
                            </div>
                            <div class="guide_profile_main_subtext Aubergine_at_night mt-2">
                                <p>
                                    {{ $user->about }}
                                </p>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-5 ">
                            <div class="guide_profile_main_text mb-2">Meet Name</div>
                            <div>
                                <iframe width=100% height="300" src="{{$user->intro_video_link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="guide_profile_subsection">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="guide_profile_main_text mb-2">Portfolio</div>
                            <div class="portfolio owl-carousel owl-theme">
                                @foreach ($portfolio as $k=>$v)
                                <div class="item">
                                    <img src="{{ asset('public/images/asset/photo-1595152452543-e5fc28ebc2b8 2.png') }}">
                                    <div class="guide_profile_main_subtext">{{$v->project_title}}</div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="guide_profile_subsection">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="guide_profile_main_text mb-2">Project</div>
                            <div class="project owl-carousel owl-theme">
                                <div class="item">
                                    <img src="{{ asset('public/images/asset/download (3) 7.png') }}">
                                    <div class="guide_profile_main_subtext">Title</div>
                                </div>
                                <div class="item">
                                    <img src="{{ asset('public/images/asset/download (3) 7.png') }}">
                                    <div class="guide_profile_main_subtext">Title</div>
                                </div>
                                <div class="item">
                                    <img src="{{ asset('public/images/asset/download (3) 7.png') }}">
                                    <div class="guide_profile_main_subtext">Title</div>
                                </div>
                                <div class="item">
                                    <img src="{{ asset('public/images/asset/download (3) 7.png') }}">
                                    <div class="guide_profile_main_subtext">Title</div>
                                </div>
                                <div class="item">
                                    <img src="{{ asset('public/images/asset/download (3) 7.png') }}">
                                    <div class="guide_profile_main_subtext">Title</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="guide_profile_subsection">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="guide_profile_main_text deep-pink font_18">
                                <h1>Experiences</h1>
                            </div>
                            @foreach ($experience as $k=>$v)
                            <div class="guide_profile_main_subtext mt-4">{{ $v->job_title}}</div>
                            <div class="guide_profile_main_subtext candy-pink mt-2">
                                {{$v->country_id}} | {{date('d-m-Y',strtotime($v->start_date))}} | {{date('d-m-Y',strtotime($v->end_date))}} <br>
                                {{$v->company}} | {{$v->employement_type_id}}
                            </div>
                            <div class="guide_profile_main_subtext Aubergine_at_night mt-2">
                                <p>{{$v->description}}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="guide_profile_subsection">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="guide_profile_main_text deep-pink font_18">
                                <h1>Qualifications</h1>
                            </div>
                            @foreach ($qualification as $k=>$v)
                            <div class="guide_profile_main_subtext mt-4">{{$v->institue_name}}</div>
                            <div class="guide_profile_main_subtext candy-pink mt-2">
                                {{$v->degree_name}} | {{$v->feild_of_study}} | {{$v->start_year}} | {{$v->end_year}}
                            </div>
                            <div class="guide_profile_main_subtext Aubergine_at_night mt-2">
                                <p>{{$v->description}}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="guide_profile_subsection">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-between">
                            <div class="guide_profile_main_text deep-pink font_18">
                                <h1>Endorsements</h1>
                            </div>
                            <div>
                                <button class="guide_profile_btn" data-toggle="modal" data-target="#endorseModal">Endorse</button>
                            </div>
                            <!-- Endorse modal  -->
                            <div class="modal fade" id="endorseModal" tabindex="-1" role="dialog" aria-labelledby="endorseModalLabel" aria-hidden="true">
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
                                                            <div class="signup-text mb-2 mt-5"> Write Endorsement </div>
                                                            <div class="guide_profile_main_subtext text-center">
                                                                <span class="disable-resend">Help identify relevant opportunities and content for John on Cinevesture</span>
                                                            </div>

                                                            <div class="mt-5">
                                                                <textarea name="" id="" cols="25" rows="6" class="controlTextLength w-100" placeholder="Message" text-length="250" maxlength="250" name="about" aria-label="With textarea"></textarea>
                                                            </div>

                                                            <div class="mt-4">
                                                                <button type="button" class="invite_btn">Submit</button>
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
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <div class="guide_profile_main_text deep-pink">John doe</div>
                            <div class="guide_profile_main_subtext Aubergine_at_night">Chief Officer</div>
                            <div class="guide_profile_main_subtext Aubergine_at_night">10TH JULY 2021</div>
                        </div>
                        <div class="col-md-9">
                            <div class="guide_profile_main_subtext Aubergine_at_night">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation.
                                </p>
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

    @section('scripts')

    <script type="text/javascript">
        $(".portfolio.owl-carousel").owlCarousel({
            center: true,
            autoPlay: 3000,
            autoplay: true,
            loop: true,
            nav: true,
            center: true,
            margin: 10,
            items: 5,
            responsive: {
                480: {
                    items: 3
                },
                768: {
                    items: 4
                },
                1024: {
                    items: 5
                }
            },
        });
        $(".project.owl-carousel").owlCarousel({
            center: true,
            autoPlay: 3000,
            autoplay: true,
            loop: true,
            nav: true,
            center: true,
            margin: 10,
            items: 3,
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
    </script>
    @endsection

    @push('scripts')
        <script type="text/javascript">
        $(document).ready(function()
        {
            $('.invite_btn').click(function()
            {
                var subject = $('#subject').val();
                var email_1 = $('#email_1').val();
                var message = $('#message').val();
                console.log(subject);
                console.log(email_1);
                console.log(message);
                
                
                $.ajax(
                {
                    url:"{{ route('contact-user-mail-store') }}",
                    type:'POST',
                    dataType:'json',
                    data:{subject:subject,email_1:email_1,message:message,"_token": "{{ csrf_token() }}"},
                    success:function(response)
                    {
                        console.log(response)
                        toastMessage(response.status, response.msg);
                        $('.modal').hide();
                        $('.modal-backdrop').remove();
                    },
                    error:function(response,status,error)
                    {   
                        console.log(response);
                        console.log(status);
                        console.log(error);
                    } 
                });
            }); 
        });
        </script>
    @endpush