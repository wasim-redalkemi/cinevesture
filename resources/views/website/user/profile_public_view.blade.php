@extends('website.layouts.app',['class' => 'bg_white'])

{{-- @section('title','Cinevesture-portfolio') --}}

@section('header')
@include('website.include.header')
@endsection

@section('content')
<div class="hide-me animation for_authtoast">
    @include('website.include.flash_message')
</div>

<body class="bg_white">
    <section class="guide_profile_section container">
        {{-- <div class="mb-3"> <i class="fa fa-arrow-left" aria-hidden="true"></i> <span class="back_btn_profile"> Back</span></div> --}}

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content_wraper">
                        <div class="guide_profile_subsection">
                            <div class="container px-0">
                                <div class="hide-me">
                                    @include('website.include.flash_message')
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-block d-md-flex">
                                                <div class="user_profile_container">
                                                    <?php
                                                    if (empty($user->profile_image)) {
                                                    ?>
                                                        <img src="{{ asset('images/asset/user-profile.png') }}" />
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <img src="{{Storage::url($user->profile_image)}}" class="prod-img" alt="product-image" style="height:100%;width:100%;">
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                                <div class="mx-2 mx-md-4">
                                                    <div class="guide_profile_main_text pt-3">{{empty($user->first_name)?'Name':ucfirst($user->first_name).' '.ucfirst($user->last_name);}}</div>
                                                    <div class="preview_subtext deep_aubergine mt-0">{{empty($user->job_title)?'Job Title':ucfirst($user->job_title);}}</div>
                                                    <div><button class="guide_profile_btn mt-2" data-toggle="modal" data-target="#contactModal">Contact </button></div>
                                                    <div class="social_profile_icon_wraper">
                                                        @if (!empty($user->imdb_profile))
                                                            <a href="{{ $user->imdb_profile }}" target="_blank" class="fs_italian inp_data">
                                                                <span class=" social_icon ">
                                                                    <i class="fa fa-imdb imdb_color" aria-hidden="true"></i>
                                                                </span>
                                                            </a>                                      
                                                        @endif
                                                        @if (!empty($user->linkedin_profile))
                                                            <a href="{{ $user->linkedin_profile }}" target="_blank" class="fs_italian inp_data" >
                                                                <span class="social_icon"> 
                                                                    <i class=" fa fa-linkedin" style="font-size:20px"></i>
                                                                </span>
                                                            </a>                                         
                                                        @endif
                                                        @if (!empty($user->website))     
                                                            <a href="{{ $user->website }}" target="_blank" class="fs_italian inp_data" >
                                                                <span class="social_icon">
                                                                    <i class="fa fa-globe" aria-hidden="true" style="font-size:20px"></i>
                                                                </span>
                                                            </a>                                 
                                                        @endif
                                                    </div>
                                                    <!-- Contact modal  -->
                                                    @include('website.modal.contact', [
                                                    'image' => (!empty($user->profile_image)?$user->profile_image:''),
                                                    'name' => empty($user->first_name)?'Name':ucfirst($user->first_name).' '.ucfirst($user->last_name),
                                                    'title' =>empty($user->job_title)?'Job Title':ucfirst($user->job_title),
                                                    'email' =>empty($user->email)?'Email':$user->email,
                                                    ])


                                                </div>
                                                
                                            </div>
                                            
                                            <div class="d-flex pt-3 justify-content-lg-end">
                                                @if($_REQUEST['id'] != auth()->user()->id )
                                                <div class="mx-3"> <i class="fa <?php if (isset($user->isfavouriteProfile)) {
                                                                        echo 'fa-heart';
                                                                    } else {
                                                                        echo 'fa-heart-o';
                                                                    } ?> icon-size Aubergine like-profile" style="cursor: pointer;" data-id="{{$user->id}}" aria-hidden="true"></i></div>

                                                @endif
                                                
                                               
                                                @if($user->is_profile_verified == '1')<span><button class="verified_cmn_btn">
                                                    <img src="{{ asset('images/asset/verified-badge.svg') }}" width="13px"  alt="image"><span class="mx-1"> VERIFIED</span></button></span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="guide_profile_subsection">
                            <div class="container px-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <span class="contact-page-text deep-pink">Overview</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="guide_profile_main_text mt-3 mb-2">
                                            Skills
                                        </div>
                                        <div class="pr_10">
                                            @if (count($user_skills)>0)
                                            @foreach ($user_skills as $k=>$v)
                                            <button class="curv_cmn_btn skill_container">
                                                {{ $v['get_skills']['name']}}
                                            </button>

                                            @endforeach
                                            <div class="clearfix"></div>
                                            @else
                                            <span><b>-</b></span>
                                            @endif
                                        </div>
                                        <div class="guide_profile_main_text mt-3 mb-2">Available to Work In</div>
                                        <div class="inp_data Aubergine_at_night">{{ (!empty($user->available_to_work_in))?ucfirst($user->available_to_work_in):'-'; }}</div>
                                        <div class="guide_profile_main_text mt-3 mb-2">Languages Spoken</div>

                                        <div class="pr_10">
                                            @if (count($user_languages)>0)
                                            @foreach ($user_languages as $k=>$v)
                                            @if (!empty($v['get_languages']['name']))
                                                
                                                <button class="curv_cmn_btn darkbtn skill_container">
                                                    {{ $v['get_languages']['name'] }}
                                                </button>
                                            @endif
                                            @endforeach
                                            @else
                                            <span><b>-</b></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-5 ">
                                        <div class="guide_profile_main_text mb-2">Introduction Video</div>
                                        <div class="playVideoWrap" video-url="{{$user->intro_video_link}}">
                                            <img src="{{$user->intro_video_thumbnail}}" alt="" width="100%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="guide_profile_subsection">
                            <div class="container px-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="guide_profile_main_text deep-pink font_18">
                                            About
                                        </div>
                                        <div class="inp_data Aubergine_at_night mt-2">
                                            <p>
                                                @if (!empty($user->about))
                                                @php
                                                   echo $user->about 
                                                @endphp
                                                @else
                                                <span><b>-</b></span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="guide_profile_subsection">
                            <div class="container px-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="guide_profile_main_text deep-pink font_18 mb-2">Portfolio</div>
                                        @if (count($portfolio)>0)
                                        <div class="portfolio owl-carousel">
                                            @foreach ($portfolio as $k=>$v)
                                            @php
                                            $img = '';
                                            if (!empty($v['get_portfolio'][0]['file_link'])) {
                                            $img = Storage::url($v['get_portfolio'][0]['file_link']);
                                            } else {
                                            $img = asset('images/asset/user-profile.png');
                                            }
                                            @endphp
                                            <div class="item portfolio_item" onclick="portfolio_model({{$v['id']}})">
                                                <div class="portfolio_item_image">
                                                    <img src="<?php echo $img ?>" class="portfolio_img" width="100%">
                                                </div>
                                                <div class="d-flex justify-content-between mt-2">
                                                    <div class="organisation_cmn_text">{{$v['portfolio_title']}}</div>
                                                    {{-- <div class="icon_container"> <a href="{{ route('portfolio-edino-text-editor="true"t', ['id'=>$v['id']]) }}"><i class="fa fa-pencil deep-pink pointer font_12" aria-hidden="true"></i></a></div> --}}
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


                        <div class="guide_profile_subsection">
                            <div class="container px-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="guide_profile_main_text deep-pink font_18">Project</div>
                                        @if (count($UserProject))
                                        <div class="project owl-carousel owl-theme mt-2">
                                            @foreach($UserProject as $k=>$v)
                                            <div class="item">
                                                <a href="{{route('public-view',['id'=>$v->id])}}">
                                                    <img src="@php echo (!empty($v->projectImage->file_link)?asset('storage/'.$v->projectImage->file_link): asset('images/asset/ba947a848086b8f90238636dcf7efdb5 1 (1).png')) @endphp" width="100%" height="100%" />
                                                    <div class="guide_profile_main_subtext mt-2">@php echo (!empty($v->project_name)?$v->project_name: '-') @endphp</div>
                                                </a>
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

                        <div class="guide_profile_subsection">
                            <div class="container px-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="guide_profile_main_text deep-pink">
                                            Experiences
                                        </div>
                                        @if (count($experience)>0)
                                        @foreach ($experience as $k=>$v)
                                        <div class="d-flex align-items-end">
                                            <div class="duration-lang-text Aubergine_at_night mt-1">{{ $v->job_title }}</div>
                                        </div>
                                        <div class="preview_subtext candy-pink mt-1">
                                            {{$v->country_id}} | {{date('d-m-Y',strtotime($v->start_date))}} | {{date('d-m-Y',strtotime($v->end_date))}} <br>
                                            {{$v->company}} | {{$v->employement_type_id}}
                                        </div>
                                        <div class="preview_subtext Aubergine_at_night mt-1">
                                            <p>@php
                                                echo $v->description
                                            @endphp</p>
                                        </div>
                                        @endforeach
                                        <div class="clearfix"></div>
                                        @else
                                        <span><b>-</b></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="guide_profile_subsection">
                            <div class="container px-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="guide_profile_main_text deep-pink">
                                            Qualifications
                                        </div>
                                        @if (count($qualification)>0)
                                        @foreach ($qualification as $k=>$v)
                                        <div class="d-flex align-items-end">
                                            <div class="duration-lang-text Aubergine_at_night mt-1">{{$v->institue_name}}</div>
                                        </div>
                                        <div class="preview_subtext candy-pink mt-2">
                                            {{$v->degree_name}} | {{$v->field_of_study}} | {{$v->start_year}} | {{$v->end_year}}
                                        </div>
                                        <div class="inp_data Aubergine_at_night mt-2">
                                            <p>@php
                                                echo $v->description
                                            @endphp</p>
                                        </div>
                                        @endforeach
                                        <div class="clearfix"></div>
                                        @else
                                        <span><b>-</b></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="guide_profile_subsection">
                            <div class="container px-0">
                                <div class="row">
                                    <div class="col-md-12 d-flex justify-content-between">
                                        <div class="guide_profile_main_text deep-pink font_18">
                                            Endorsements
                                        </div>
                                        <?php
                                        $show_endorsement_btn = true;
                                        if ($_REQUEST['id'] == auth()->user()->id) {
                                            $show_endorsement_btn = false;
                                        }
                                        if ($show_endorsement_btn) {
                                            foreach ($user_endorsement->toArray() as $k => $v) {
                                                if ($v['from'] == auth()->user()->id) {
                                                    $show_endorsement_btn = false;
                                                }
                                            }
                                        }
                                        if ($show_endorsement_btn) {
                                        ?>
                                            <div>
                                                <button class="guide_profile_btn" data-toggle="modal" data-target="#endorseModal">Endorse</button>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                        <!-- Endorse modal  -->
                                        <div class="modal fade" id="endorseModal" tabindex="-1" role="dialog" aria-labelledby="endorseModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content bg_3308">
                                                    <div class="modal-body p-0">
                                                        <div class="p-3 float-end">
                                                            <i class="fa fa-times text_fff font_24 pointer" data-dismiss="modal" aria-label="Close"></i>
                                                        </div>
                                                        <section class="p-0 p-md-3">
                                                            <div class="container">
                                                                <div class="row">
                                                                    <div class="col-md-12 px-0 px-md-3">
                                                                        <div class="signup-text mb-2 mt-5"> Write Endorsement </div>
                                                                        <div class="guide_profile_main_subtext text-center">
                                                                            <span class="disable-resend">Help identify relevant opportunities and content for {{$user->name}} on Cinevesture</span>
                                                                        </div>

                                                                        <div class="form_elem mt-5">
                                                                            <textarea name="endorse_message" id="endorse_message" cols="25" rows="6" class="controlTextLength w-100 text_editor no_text_editor" no-text-editor="true" placeholder="Message" text-length="600" maxlength="600" name="about" aria-label="With textarea"></textarea>
                                                                        </div>

                                                                        <div class="my-5">
                                                                            <input type="hidden" name="endorse_email" id="endorse_email" value="@if (!empty($user->email)){{$user->email}}@endif">
                                                                            <input type="hidden" name="endorse_to_id" id="endorse_to_id" value="@if (!empty($user->id)){{$user->id}}@endif">
                                                                            <button type="button" id="endorse_btn" class="invite_btn">Submit</button>
                                                                        </div>
                                                                        <!-- <div class="modal_btm_text mt-4 mb-5">
                                                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Bibendum vel cras vitae morbi varius vitae.
                                                                        </div> -->
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
                                @if(!empty($user_endorsement))
                                    @foreach($user_endorsement as $edm)
                                            <div class="row mt-3">
                                                <div class="col-md-3">
                                                    <div class="endorse_person_name">{{!empty($edm->endorsementCreater->name)?$edm->endorsementCreater->name:'-'}}</div>
                                                    <div class="inp_data Aubergine_at_night">{{!empty($edm->endorsementCreater->job_title)?$edm->endorsementCreater->job_title:'-'}}</div>
                                                    <div class="guide_profile_main_subtext Aubergine_at_night">{{strtoupper(date('jS F Y',strtotime($edm->created_at)))}}</div>
                                                    @if (!empty($edm['endorsementorganisation']))
                                                    <div class="inp_data Aubergine_at_night">{{$edm['endorsementorganisation']->name?$edm['endorsementorganisation']->name:"-"}}</div>
                                                        
                                                    @else
                                                        {{'-'}}
                                                    @endif
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="inp_data">
                                                        <p>
                                                            {{$edm->comment}} 
                                                        </p>
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
                </div>
            </div>
        </div>


    </section>



    @endsection

    @section('footer')
    @include('website.include.footer')
    @endsection



    @push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#endorse_btn').click(function() {
                let $btn = $(this);
        // e.preventDefault();
        // e.stopPropagation();

        $btn.text("Submitting..");
        $btn.prop('disabled',true);
                var endorse_email = $('#endorse_email').val();
                var endorse_message = $('#endorse_message').val();
                var endorse_to_id = $('#endorse_to_id').val();

                $.ajax({
                    url: "{{ route('endorse-user-mail-store') }}",
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        endorse_to_id: endorse_to_id,
                        endorse_email: endorse_email,
                        endorse_message: endorse_message,
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        // console.log(response)
                        // console.log('endorse done')
                        // alert('hje');
                       console.log('hell');
                        $('.modal').hide();
                        $('.modal-backdrop').remove();
                        // $('#list').fadeOut();}, 2000); 
                        toastMessage(response.status, response.msg);
                        setTimeout(function(){  
                            location.reload();  
                        },4000); 
                    },
                    error: function(response, status, error) {
                        // console.log(response);
                        // console.log(status);
                        // console.log(error);
                        
                        toastMessage('error', 'Upgrade your plan to user endorse');
                        $('.modal').hide();
                        $('.modal-backdrop').remove();
                    }
                });
            });
        });
        $('.like-profile').on('click', function(e) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var profile_id = $(this).attr('data-id');
            var classList = $(this).attr('class').split(/\s+/);
            var element = $(this);
            $.ajax({
                type: 'post',
                data: {
                    'id': profile_id
                },
                url: "{{route('favourite-update')}}",
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

        $(".portfolio.owl-carousel").owlCarousel({
            center: true,
            autoPlay: 1000,
            autoplay: true,
            // loop: true,
            nav: false,
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
                },
                1225: {
                    items: 3
                },
                1400: {
                    items: 3.75
                }
            },
        });

        $(".project.owl-carousel").owlCarousel({
            autoPlay: 1000,
            autoplay: true,
            loop: false,
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
                    items: 4
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
