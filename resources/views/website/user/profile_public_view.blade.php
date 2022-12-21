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
    <section class="guide_profile_section container">
        {{-- <div class="mb-3"> <i class="fa fa-arrow-left" aria-hidden="true"></i> <span class="back_btn_profile"> Back</span></div> --}}
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
                                    <img src="{{ asset('images/asset/user-profile.png') }}" />
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
                            <div class="guide_profile_main_text pt-3">{{empty($user->first_name)?'Name':ucfirst($user->first_name).' '.ucfirst($user->last_name);}}</div>
                            <div class="guide_profile_main_subtext">{{empty($user->job_title)?'Job Title':ucfirst($user->job_title);}}</div>
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
                                                                    {{-- <div><img src="{{ asset('images/asset/photo-1595152452543-e5fc28ebc2b8 2.png') }}" class="w-100 br_100"></div> --}}
                                                                    <?php
                                                                    if (empty($user->profile_image)) {
                                                                    ?>
                                                                        <img src="{{ asset('images/asset/user-profile.png') }}" class="w-100 br_100">
                                                                    <?php
                                                                    } else {
                                                                    ?>
                                                                        <img src="{{Storage::url($user->profile_image)}}" class="w-100 br_100 " alt="product-image" style="height:100%;width:100%;">
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="tile_text text_fff">{{empty($user->first_name)?'Name':ucfirst($user->first_name).' '.ucfirst($user->last_name);}}</div>
                                                                    <div class="organisation_cmn_text text_fff">{{empty($user->job_title)?'Job Title':ucfirst($user->job_title);}}</div>
                                                                </div>
                                                            </div>
                                                            <div class="mt-3"><input type="text" id="subject" name="subject" value="" placeholder="Subject" class="modal_input"></div>
                                                            <div class="mt-3">
                                                                <textarea name="message" id="message" cols="25" rows="6" class="w-100 modal_input controlTextLength" placeholder="Message" text-length = "1200" maxlength="1200" aria-label="With textarea"></textarea>

                                                            </div>

                                                            <div class="form-check mt-3">
                                                                <input class="form-check-input modal_check_input" type="checkbox" id="checkbox_cc">
                                                                <label class="modal_btm_text mx-1">Send a copy to me</label>
                                                            </div>

                                                            <div class="mt-4">
                                                                <input type="hidden" name="email_1" id="email_1" class="modal_input" value="@if (!empty($user->email)){{$user->email}}@endif">
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

                        </div>
                        <div class="col-md-2 d-flex pt-3 justify-content-lg-end">
                            @if($_REQUEST['id'] != auth()->user()->id )
                            <div> <i class="fa fa-heart-o icon-size Aubergine like-profile" style="cursor: pointer;" data-id="{{$user->id}}" aria-hidden="true"></i></div>

                            @endif
                            <?php
                            $show_verified_btn = true;
                            if (count($user_endorsement)<15) {
                                $show_verified_btn = false;
                            }
                            
                            if($show_verified_btn)
                            {
                                ?>
                                    <div>
                                        <button class="verified_cmn_btn mx-3"> <i class="fa fa-check-circle hot-pink mx-1" aria-hidden="true"></i> VERIFIED</button>
                                    </div>
                                <?php
                            }
                            ?>
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
                                <p> Skills</p>
                            </div>
                            <div class="">
                                @if (count($user_skills)>0)
                                @foreach ($user_skills as $k=>$v)
                                <button class="curv_cmn_btn skill_container">
                                    {{ $v['get_skills']['name'] }}
                                </button>

                                @endforeach
                                <div class="clearfix"></div>
                                @else
                                <span><b>-</b></span>
                                @endif
                            </div>
                            <div class="guide_profile_main_text mt-3">Available to Work In</div>
                            <div class="guide_profile_main_subtext Aubergine_at_night mt-2">{{ (!empty($user->available_to_work_in))?$user->available_to_work_in:'-'; }}</div>
                            <div class="guide_profile_main_text mt-3">Languages Spoken</div>
                            @if (count($user_languages)>0)
                                    @foreach ($user_languages as $k=>$v)
                                        <div class="guide_profile_main_subtext Aubergine_at_night mt-2">{{ $v['get_languages']['name'] }}</div> 
                                    @endforeach                                        
                            @else
                                <span><b>-</b></span>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <div class="guide_profile_main_text mt-3">
                                <p> Social Profile</p>
                            </div>
                            <div class="guide_profile_main_subtext mt-3">IMDB Profile</div>
                            <div class="guide_profile_main_subtext deep-pink mt-1 pointer">
                                @if (isset($user->imdb_profile))
                                    <a href="{{ $user->imdb_profile }}" class="link-style" target="_blank" >{{ $user->imdb_profile }}</a>                                      
                                @else
                                <span><b>-</b></span>
                                @endif
                            </div>
                            <div class="guide_profile_main_subtext mt-3">LinkedIn Profile</div>
                            <div class="guide_profile_main_subtext deep-pink pointer">
                                @if (isset($user->linkedin_profile))
                                    <a href="{{ $user->linkedin_profile }}" class="link-style" target="_blank">{{ $user->linkedin_profile }}</a>                                         
                                @else
                                    <span><b>-</b></span>
                                @endif
                            </div>
                            <div class="guide_profile_main_subtext mt-3">Website</div>
                            <div class="guide_profile_main_subtext deep-pink pointer">
                                @if (isset($user->website))
                                    <a href="{{ $user->website }}" class="link-style" target="_blank">{{ $user->website }}</a>                                         
                                @else
                                    <span><b>-</b></span>
                                @endif
                            </div>
                            
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
                                    @if (!empty($user->about))
                                    {{ $user->about }}
                                    @else
                                    <span><b>-</b></span>
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
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
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="guide_profile_main_text deep-pink font_18">Portfolio</div>
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
                                            <div class="organisation_cmn_text">{{$v['project_title']}}</div>
                                            <div class="icon_container"> <a href="{{ route('portfolio-edit', ['id'=>$v['id']]) }}"><i class="fa fa-pencil deep-pink pointer font_12" aria-hidden="true"></i></a></div>
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
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="guide_profile_main_text deep-pink font_18">Project</div>
                            @if (count($UserProject))
                            <div class="project owl-carousel owl-theme">
                                @foreach($UserProject as $k=>$v)                                
                                <div class="item">
                                    <a href = "{{route('public-view',['id'=>$v->id])}}">
                                    <img src="@php echo (!empty($v->projectImage->file_link)?asset('storage/'.$v->projectImage->file_link): asset('images/asset/ba947a848086b8f90238636dcf7efdb5 1 (1).png')) @endphp" width="100%" height="100%"  />
                                    <div class="guide_profile_main_subtext">@php echo (!empty($v->project_name)?$v->project_name: '-') @endphp</div>
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
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="guide_profile_main_text deep-pink font_18">
                                <h1>Experiences</h1>
                            </div>
                            @if (count($experience)>0)
                                @foreach ($experience as $k=>$v)
                                <div class="d-flex align-items-end">
                                    <div class="guide_profile_main_subtext mt-1">{{ $v->job_title }}</div>
                                </div>
                                <div class="guide_profile_main_subtext candy-pink mt-2">
                                    {{$v->country_id}} | {{date('d-m-Y',strtotime($v->start_date))}} | {{date('d-m-Y',strtotime($v->end_date))}} <br>
                                    {{$v->company}} | {{$v->employement_type_id}}
                                </div>
                                <div class="guide_profile_main_subtext Aubergine_at_night mt-2">
                                    <p>{{$v->description}}</p>
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
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="guide_profile_main_text deep-pink font_18">
                                <h1>Qualifications</h1>
                            </div>
                            @if (count($qualification)>0)
                                @foreach ($qualification as $k=>$v)
                                <div class="d-flex align-items-end">
                                    <div class="guide_profile_main_subtext mt-1">{{$v->institue_name}}</div>
                                </div>
                                <div class="guide_profile_main_subtext candy-pink mt-2">
                                    {{$v->degree_name}} | {{$v->field_of_study}} | {{$v->start_year}} | {{$v->end_year}}
                                </div>
                                <div class="guide_profile_main_subtext Aubergine_at_night mt-2">
                                    <p>{{$v->description}}</p>
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
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-between">
                            <div class="guide_profile_main_text deep-pink font_18">
                                <h1>Endorsements</h1>
                            </div>
                            <?php
                                $show_endorsement_btn = true;
                                if($_REQUEST['id'] == auth()->user()->id)
                                {
                                    $show_endorsement_btn = false;
                                }
                                if($show_endorsement_btn)
                                {
                                    foreach($user_endorsement->toArray() as $k=>$v)
                                    {
                                        if($v['from'] == auth()->user()->id)
                                        {
                                            $show_endorsement_btn = false;
                                        }                                
                                    }
                                }
                                if($show_endorsement_btn)
                                {
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
                                            <section class="p-3">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="signup-text mb-2 mt-5"> Write Endorsement </div>
                                                            <div class="guide_profile_main_subtext text-center">
                                                                <span class="disable-resend">Help identify relevant opportunities and content for {{$user->name}} on Cinevesture</span>
                                                            </div>

                                                            <div class="mt-5">
                                                                <textarea name="endorse_message" id="endorse_message" cols="25" rows="6" class="controlTextLength w-100" placeholder="Message" text-length="600" maxlength="600" name="about" aria-label="With textarea"></textarea>
                                                            </div>

                                                            <div class="mt-4">
                                                                <input type="hidden" name="endorse_email" id="endorse_email" value="@if (!empty($user->email)){{$user->email}}@endif">
                                                                <input type="hidden" name="endorse_to_id" id="endorse_to_id" value="@if (!empty($user->id)){{$user->id}}@endif">
                                                                <button type="button" id="endorse_btn" class="invite_btn">Submit</button>
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
                    @if(!empty($user_endorsement))
                    @foreach($user_endorsement as $edm)
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <div class="guide_profile_main_text deep-pink">{{$edm['endorsementCreater']->name}}</div>
                            <div class="guide_profile_main_subtext Aubergine_at_night">{{$edm['endorsementCreater']->job_title?$edm['endorsementCreater']->job_title:"-"}}</div>
                            <div class="guide_profile_main_subtext Aubergine_at_night">{{date('d F Y',strtotime($edm->created_at))}}</div>
                        </div>
                        <div class="col-md-9">
                            <div class="guide_profile_main_subtext Aubergine_at_night">
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
    </section>



    @endsection

    @section('footer')
    @include('website.include.footer')
    @endsection



    @push('scripts')
        <script type="text/javascript">
        $(document).ready(function()
        {
            $('#contact_btn').click(function(e)
            {
                var subject = $('#subject').val();
                var email_1 = $('#email_1').val();
                var message = $('#message').val();
                var checkbox_cc = ($("#checkbox_cc").prop("checked") == true ? '1' : '0');
                let $btn = $(this);
                e.preventDefault();
                e.stopPropagation();

                $btn.text("Sending..");
                $btn.prop('disabled',true);
                
                $.ajax(
                {
                    url:"{{ route('contact-user-mail-store') }}",
                    type:'POST',
                    dataType:'json',
                    data:{subject:subject,email_1:email_1,message:message,checkbox_cc:checkbox_cc,"_token": "{{ csrf_token() }}"},
                    success:function(response)
                    {   $('#subject').val("");
                        $('#message').val("");
                        $btn.text("Send Mail");
                        $btn.prop('disabled',false);
                        toastMessage(response.status, response.msg);
                        $('.modal').hide();
                        $('.modal-backdrop').remove();
                    },
                    error:function(response,status,error)
                    {     $btn.text("Send Mail");
                          $btn.prop('disabled',false);
                        console.log(response);
                        console.log(status);
                        console.log(error);
                    } 
                });
            });
            
            $('#endorse_btn').click(function()
            {
                var endorse_email = $('#endorse_email').val();
                var endorse_message = $('#endorse_message').val();
                var endorse_to_id = $('#endorse_to_id').val();
                
                $.ajax(
                {
                    url:"{{ route('endorse-user-mail-store') }}",
                    type:'POST',
                    dataType:'json',
                    data:{endorse_to_id:endorse_to_id,endorse_email:endorse_email,endorse_message:endorse_message,"_token": "{{ csrf_token() }}"},
                    success:function(response)
                    {
                        console.log(response)
                        console.log('endorse done')
                        toastMessage(response.status, response.msg);
                        $('.modal').hide();
                        $('.modal-backdrop').remove();
                        location.reload();
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
            data: {'id':profile_id},
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
                        if(classList[i] == 'fa-heart')
                        {
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
        nav: true,
        margin: 20,
        center: false,
        // items: 4,
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