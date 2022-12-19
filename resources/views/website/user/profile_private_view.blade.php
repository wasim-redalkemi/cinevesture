@extends('website.layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-private-view')

@section('header')
@include('website.include.header')
@endsection

@section('content')
<section class="guide_profile_section">
    <div class="container">
        <div class="hide-me animation for_authtoast">
            @include('website.include.flash_message')
        </div>
        <div class="row">
            <div class="col-md-3">
                @include('website.include.profile_sidebar')
            </div>
            <div class="col-md-9 mt-3 mt-sm-0">
                <div class="content_wraper">
                    <div class="guide_profile_subsection">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex justify-content-between">
                                        <div class="search-head-text Aubergine_at_night mx-3 mx-md-0">Profile</div>
                                        <div class="d-none d-md-block">
                                            <a href="{{ route('profile-create')}}">
                                                <button class="guide_profile_btn mt-2">EDIT </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="user_profile_container">
                                        @if (empty($user->profile_image))
                                        <img src="{{ asset('images/asset/100_no_img.jpg') }}" />
                                        @else
                                        <img src="{{ Storage::url($user->profile_image) }}" class="prod-img" alt="product-image" style="height:100%;width:100%;object-fit: cover;">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="guide_profile_main_text pt-3">
                                        {{ (!empty($user->first_name))?ucfirst($user->first_name).' '.ucfirst($user->last_name):'Name'; }}
                                    </div>
                                    <div class="guide_profile_main_subtext aubergine">
                                        <i>{{empty($user_age->range)?'Age':$user_age->range;}} </i>
                                        | <i>{{empty($user_gender->gender)?'Gender':$user_gender->gender;}}  </i>
                                        | <i>{{empty($user_gender_pronouns->gender_pronouns)?'Gender Pronouns':$user_gender_pronouns->gender_pronouns;}}</i>
                                    </div>
                                    <div class="guide_profile_main_subtext">
                                        {{ (!empty($user->job_title))?$user->job_title:'Job Title'; }}
                                        |
                                        {{ (!empty($user_country->name))?$user_country->name:'Country'; }}
                                    </div>
                                    <div class="d-block d-md-none">
                                        <a href="{{ route('profile-create')}}">
                                            <button class="guide_profile_btn mt-2">Edit </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="guide_profile_subsection">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 contact-page-text deep-pink">
                                    Overview
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="guide_profile_main_text mt-3">
                                        <p> Skills</p>
                                    </div>
                                    <div>
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
                                    @if (!empty($user->imdb_profile))
                                        <a href="{{ $user->imdb_profile }}" class="link-style"  >{{ $user->imdb_profile }}</a>                                      
                                    @else
                                    <span><b>-</b></span>
                                    @endif
                                </div>
                                <div class="guide_profile_main_subtext mt-3">LinkedIn Profile</div>
                                <div class="guide_profile_main_subtext deep-pink pointer">
                                    @if (!empty($user->linkedin_profile))
                                        <a href="{{ $user->linkedin_profile }}" class="link-style" >{{ $user->linkedin_profile }}</a>                                         
                                    @else
                                        <span><b>-</b></span>
                                    @endif
                                </div>
                                <div class="guide_profile_main_subtext mt-3">Website</div>
                                <div class="guide_profile_main_subtext deep-pink mt-1 pointer">
                                    @if (!empty($user->website))     
                                        <a href="{{ $user->website }}" class="link-style" >{{ $user->website }}</a>                                 
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
                                    <div class="contact-page-text deep-pink">
                                        About
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
                                    <div class="guide_profile_main_text mb-2">Meet Name</div>
                                    <div class="playVideoWrap" video-url="{{$user->intro_video_link}}">
                                        <img src="{{$user->intro_video_thumbnail}}" width="100%" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="guide_profile_subsection">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex">
                                        <div class="contact-page-text deep-pink mb-2">Portfolio</div>
                                        <div class="mx-3 icon_container"><a href="{{ route('portfolio-create',['flag'=>'privateView']) }}"><i class="fa fa-plus deep-pink pointer font_12" aria-hidden="true"></i></a></div>
                                    </div>
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
                                                                <!-- <span aria-hidden="true">x</span> -->
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
                                    <div class="d-flex">
                                        <div class="contact-page-text deep-pink font_18">
                                            Experiences
                                        </div>
                                        <div class="mx-3 icon_container"><a href="{{ route('experience-create',['flag'=>'privateView']) }}"><i class="fa fa-plus deep-pink pointer font_12" aria-hidden="true"></i></a></div>
                                    </div>
                                    @if (count($experience)>0)
                                    @foreach ($experience as $k=>$v)

                                    <div class="d-flex align-items-end">
                                        <div class="guide_profile_main_subtext mt-1">{{ $v->job_title }}</div>
                                        <div class="icon_container mx-3"><a href="{{ route('experience-edit', ['id'=>$v->id]) }}"><i class="fa fa-pencil deep-pink pointer font_12" aria-hidden="true"></i></a></div>
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
                                    <div class="d-flex">
                                        <div class="contact-page-text deep-pink font_18">
                                            Qualifications
                                        </div>
                                        <div class="mx-3 icon_container"><a href="{{ route('qualification-create',['flag'=>'privateView']) }}"><i class="fa fa-plus deep-pink pointer font_12" aria-hidden="true"></i></a></div>
                                    </div>
                                    @if (count($qualification)>0)
                                    @foreach ($qualification as $k=>$v)
                                    <div class="d-flex align-items-end">
                                        <div class="guide_profile_main_subtext mt-1">{{$v->institue_name}}</div>
                                        <div class="icon_container mx-3"><a href="{{ route('qualification-edit', ['id'=>$v->id]) }}"><i class="fa fa-pencil deep-pink pointer font_12" aria-hidden="true"></i></a></div>
                                    </div>
                                    <div class="guide_profile_main_subtext candy-pink mt-2">
                                        {{$v->degree_name}} | {{$v->feild_of_study}} | {{$v->start_year}} | {{$v->end_year}}
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
                                <div class="contact-page-text deep-pink font_18">
                                    Endorsements
                                </div>
                            </div>
                            @if(!empty($user_endorsement))
                            @foreach($user_endorsement as $edm)
                            <div class="row mt-3">
                                <div class="col-md-3">
                                    <div class="guide_profile_main_text deep-pink">{{$edm['endorsementCreater']->name}}</div>
                                    <div class="guide_profile_main_subtext Aubergine_at_night">{{$edm['endorsementCreater']->job_title?$edm['endorsementCreater']->job_title:"-"}}</div>
                                    <div class="guide_profile_main_subtext Aubergine_at_night">{{$edm->created_at}}</div>
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
        $("#error-toast").toast("show");
        $("#success-toast").toast("show");
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
            url: "{{ route('protfolio-modal') }}",
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
