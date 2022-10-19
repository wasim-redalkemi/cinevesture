@extends('layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-private-view')

@section('header')
@include('include.header')
@endsection

@section('content')
<section class="guide_profile_section">
    <div class="container">
        <div class="hide-me animation for_authtoast">
            @include('include.flash_message')
        </div>
    <div class="row">
        <div class="col-md-3">
            @include('include.profile_sidebar')
        </div>
        <div class="col-md-9 mt-3 mt-sm-0">
            <div class="content_wraper">
                <div class="guide_profile_subsection">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-between">
                                    <div class="search-head-text Aubergine_at_night">Profile</div>
                                    <div class="col-md-2 d-flex pt-3 justify-content-lg-end">
                                        <a href="{{ route('profile-create')}}">
                                            <button class="guide_profile_btn mt-2">Edit </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="user_profile_container">
                                    @if (empty($user->profile_image))
                                        <img src="{{ asset('public/images/asset/100_no_img.jpg') }}" />
                                    @else
                                        <img src="{{ Storage::url($user->profile_image) }}"  class = "prod-img" alt="product-image" style="max-height:100px;width:100%;">
                                    @endif                                    
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="guide_profile_main_text pt-3">
                                    {{ (isset($user->job_title))?ucfirst($user->first_name).' '.ucfirst($user->last_name):'Name'; }}
                                </div>
                                <div class="guide_profile_main_subtext aubergine">
                                    <i>{{empty($user->age)?'Age':$user->age;}} </i>
                                    | <i>{{empty($user->gender)?'Gender':$user->gender;}} </i>
                                    | <i>{{empty($user->gender_pronouns)?'Gender-pronouns':$user->gender_pronouns;}}</i>
                                </div>
                                <div class="guide_profile_main_subtext">
                                    {{ (isset($user->job_title))?$user->job_title:'Job Title'; }}
                                    |
                                    {{ (isset($user_country->name))?$user_country->name:'Country'; }}
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
                                <div class="guide_profile_main_subtext Aubergine_at_night mt-2">{{ (isset($user->available_to_work_in))?$user->available_to_work_in:'-'; }}</div>
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
                                <div class="guide_profile_main_subtext deep-pink mt-1">
                                    @if (isset($user->imdb_profile))
                                        {{ $user->imdb_profile }}                                        
                                    @else
                                        <span><b>-</b></span>
                                    @endif
                                </div>
                                <div class="guide_profile_main_subtext mt-3">LinkedIn Profile</div>
                                <div class="guide_profile_main_subtext deep-pink">
                                    @if (isset($user->linkedin_profile))
                                        {{ $user->linkedin_profile }}                                        
                                    @else
                                        <span><b>-</b></span>
                                    @endif
                                </div>
                                <div class="guide_profile_main_subtext mt-3">Website</div>
                                <div class="guide_profile_main_subtext deep-pink mt-1">
                                    @if (isset($user->website))
                                        {{ $user->website }}                                        
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
                                        @if (isset($user->about))
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
                                <div>
                                    <iframe width=100% height="300" src="{{isset($user->intro_video_link)?$user->intro_video_link:'https://www.youtube.com/embed/bDMwlH1FTpk'}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
                                    <div class="contact-page-text deep-pink mb-2">Portfolio </div>
                                    <div class="mx-3 icon_container"><a href="{{ route('portfolio-create',['flag'=>'privateView']) }}"><i class="fa fa-plus deep-pink pointer font_12" aria-hidden="true"></i></a></div>
                                </div>
                                <div class="portfolio owl-theme">
                                    @if (count($portfolio)>0)
                                        @foreach ($portfolio as $k=>$v)
                                        @php
                                            $img  = '';
                                            if(isset($v['get_portfolio'][0]['file_link']))
                                            {
                                                $img = Storage::url($v['get_portfolio'][0]['file_link']);
                                            }
                                        @endphp                                            
                                        <div class="item">                                                
                                            <img src="<?php echo $img?>">
                                            <div class="d-flex justify-content-between mt-2">
                                                <div class="organisation_cmn_text">{{$v['project_title']}}</div>
                                                <div class="icon_container"> <a href="{{ route('portfolio-edit', ['id'=>$v['id']]) }}"><i class="fa fa-pencil deep-pink pointer font_12" aria-hidden="true"></i></a></div>
                                            </div>
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
        </div>
    </div>
</div>
</section>
@endsection

@section('footer')
@include('include.footer')
@endsection

@section('scripts')

<script type="text/javascript">

    $(document).ready(function(){
        $("#error-toast").toast("show");
        $("#success-toast").toast("show");
    });

    $(".owl-carousel").owlCarousel({
        center: true,
        autoPlay: 3000,
        autoplay: true,
        // loop: true,
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


    $(".portfolio.owl-carousel").owlCarousel({
      center: true,
      autoPlay: 1000,
      autoplay: true,
      loop: true,
      nav: true,
      margin: 20,
      center: true,
      items: 4,
      responsive: {
        480: { items: 1 },
        768: { items: 2 },
        1024: {
          items: 4
        }
      },
    });
</script>
@endsection
