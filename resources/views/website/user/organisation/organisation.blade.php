@extends('website.layouts.app',['class' => 'bg_white'])

{{-- @section('title','Cinevesture-organisation') --}}

@section('header')
@include('website.include.header')
@endsection

@section('content')
<section class="guide_profile_section profile-section" >
    <div class="container">
    <div class="row">
        <div class="col-md-3">
            @include('website.include.profile_sidebar')
        </div>
        <div class="col-md-9 mt-3 mt-sm-0">
            <div class="content_wraper">
                <div class="guide_profile_subsection">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 d-flex justify-content-between align-items-center">
                                <div class="profile_text">
                                    <h1>
                                        Organisation
                                    </h1>
                                </div>
                                
                                <div class="@if ($editHide>0)d-none  @endif"><button class="guide_profile_btn"><a class="btn-link text_decor_none" href="{{ route('organisation-create')}}">EDIT</a></button></div>
                                    
                               
                            </div>
                        </div>
                        <div class="d-flex mt-2">
                            <div class="">
                                <div class="user_profile_container">
                                    @if (empty($UserOrganisation->logo))
                                        <img src="{{ asset('images/asset/photo-1500648767791-00dcc994a43e 1.png') }}" />
                                    @else
                                        <img src="{{ Storage::url($UserOrganisation->logo) }}"  class = "prod-img" alt="product-image" style="max-height:100px;width:100%;">
                                    @endif  
                                </div>
                            </div>
                            <div class="mx-4">
                                <div class="preview_headtext">{{ (isset($UserOrganisation->name))?ucFirst($UserOrganisation->name):'Name'; }}</div>
                                <div class="organisation_cmn_text">{{ (!empty($UserOrganisation->organizationType->name))?$UserOrganisation->organizationType->name:'Organisation type'; }}</div>
                                <div class="organisation_cmn_text">{{ (isset($UserOrganisation['country']['name']))?$UserOrganisation['country']['name']:'Located In'; }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="guide_profile_subsection">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <span class="search-head-text deep-pink">Overview</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="guide_profile_main_text mt-3">
                                    <p> Services</p>
                                </div>
                                <div class="d-flex flex-wrap mt-3">
                                    @if (isset($UserOrganisation->organizationServices))
                                        @foreach ($UserOrganisation->organizationServices as $k => $organizationService)
                                            <button class="curv_cmn_btn skill_container">{{ (isset($organizationService->services->name))?$organizationService->services->name:'-'; }}</button>
                                        @endforeach
                                    @else
                                    <span><b>-</b></span>
                                    @endif
                                </div>
                                <div class="guide_profile_main_text mt-3">Languages Spoken</div>
                                
                                <div class="d-flex flex-wrap mt-2">
                                @if (isset($UserOrganisation->organizationLanguages))
                                    @foreach ($UserOrganisation->organizationLanguages as $k => $organizationLanguage)                                    
                                        <div class="curv_cmn_btn skill_container darkbtn mt-2">{{ (isset($organizationLanguage->languages->name))?$organizationLanguage->languages->name:'-'; }}</div>
                                    @endforeach
                                @else
                                    <span><b>-</b></span>
                                @endif
                                </div>
                                <div>
                                    
                                <div class="guide_profile_main_text mt-3">Available To Work In</div>
                                <div class="search-head-subtext Aubergine_at_night mt-2">{{ (isset($UserOrganisation->available_to_work_in))?ucFirst($UserOrganisation->available_to_work_in):'-'; }}</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="guide_profile_main_text mt-3">
                                    <p> Social Profile</p>
                                </div>
                                <div class="guide_profile_main_subtext mt-3">IMDB Profile</div>
                                <div class="guide_profile_main_subtext deep-pink mt-1">
                                @if (!empty($UserOrganisation->imdb_profile))
                                    <a href="{{$UserOrganisation->imdb_profile}}" class=" deep-pink" target="_blank"    >{{empty($UserOrganisation->imdb_profile) ? '-' : $UserOrganisation->imdb_profile  }}</a>
                               
                                @else 
                                    {{'_'}}
                                @endif
                                </div>
                                <div class="guide_profile_main_subtext mt-3">LinkedIn Profile</div>
                                <div class="guide_profile_main_subtext deep-pink">
                                @if (!empty($UserOrganisation->linkedin_profile))
                                    <a href="{{$UserOrganisation->linkedin_profile}}" class=" deep-pink" target="_blank">{{(!empty($UserOrganisation->linkedin_profile))?$UserOrganisation->linkedin_profile:'-'}}</a>
                                    @else 
                                    {{'_'}}
                                @endif
                                </div>
                                <div class="guide_profile_main_subtext mt-3">Website</div>
                                <div class="guide_profile_main_subtext deep-pink mt-1">
                                @if (!empty($UserOrganisation->website))
                                    <a href="{{$UserOrganisation->website}}" class=" deep-pink" target="_blank">{{(!empty($UserOrganisation->website))?$UserOrganisation->website:'-';}}</a>
                                    @else 
                                    {{'_'}}
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="guide_profile_subsection">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="guide_profile_main_text deep-pink">
                                    About
                                </div>
                                <div class="guide_profile_main_subtext Aubergine_at_night mt-2 pr_35">
                                    <p>
                                        @if (!empty($UserOrganisation->about))
                                        {{ucFirst($UserOrganisation->about) }}
                                        @else
                                        <span><b>-</b></span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                            {{-- <div class="col-md-2"></div> --}}
                            <div class="col-md-6">
                                <div class="guide_profile_main_text deep-pink mb-2">Introduction Video</div>
                                <div class="playVideoWrap" video-url="{{ (isset($UserOrganisation->intro_video_link))?$UserOrganisation->intro_video_link:''; }}">
                                    <img src="{{ (isset($UserOrganisation->intro_video_thumbnail))?$UserOrganisation->intro_video_thumbnail:''; }}" width="100%" alt="">
                                </div>
                            </div>
                            {{-- <div class="guide_profile_subsection">
                                <div class="container">
                                    <div class="row">
                                     
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <div class="col-md-12">
                                <div class="guide_profile_main_text deep-pink font_18">
                                    <h1 class="">About</h1>
                                </div>
                                <div class="guide_profile_main_subtext Aubergine_at_night mt-2">
                                    <p>
                                        {{ (isset($UserOrganisation->about))?$UserOrganisation->about:'-'; }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="guide_profile_main_text deep-pink mb-2">Introduction Video</div>
                                <div>
                                    <iframe width=100% height="300" src="{{!empty($UserOrganisation->intro_video_link)?$UserOrganisation->intro_video_link:''}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                                {{-- <div class="d-flex justify-content-between mt-3">
                                    <div class="organisation_cmn_text">Title</div>
                                    <div class="icon_container"><i class="fa fa-pencil deep-pink" aria-hidden="true"></i></div>
                                </div> --}}
                            {{-- </div> --}}
                        </div>
                    </div>
                </div>

                {{-- <div class="guide_profile_subsection">
                    <div class="container">
                        {{-- <div class="row">
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
                                <div class="playVideoWrap" video-url="">
                                    <img src="" width="100%" alt="">
                                </div>
                            </div>
                        </div> --}}
                    {{-- </div>
                </div> --}}

                <div class="guide_profile_subsection">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex align-items-center">
                                    <div class="preview_headtext mb-3">Team size</div>
                                    {{-- {{$UserOrganisation}} --}}
                                    <div class="associate_text my-3 mx-3">{{isset($UserOrganisation->team_size)?($UserOrganisation->team_size):'-'}}</div>
                                </div>
                                <div class="preview_headtext mb-3">Team members</div>
                                <div class="row">
                                    @if (!empty($UserOrganisation->memberUser))
                                        
                                    @foreach ($UserOrganisation->memberUser as $value)
                                    <div class="col-md-3 col-6">
                                        <a href="{{route('profile-public-show',['id'=>$value->id])}}">
                                        @if ($value->profile_image)
                                        <div class="organisation_img_warper"><img src="{{Storage::url($value->profile_image)}}" class="w-80 br_80"></div>
                                        @else
                                        {{-- <div class="organisation_img_warper"><img src="{{asset('images/asset/user-profile.png')}}" class="root_img"></div> --}}
                                        <div ><img src="{{ asset('images/asset/no_image_160.png') }}" class="w-80 br_80"></div>
                                            
                                        @endif
                                        <div class="d-flex justify-content-between mt-3">
                                            <div class="organisation_cmn_text"> {{$value->name}}</div>
                                            {{-- <div class="icon_container"><i class="fa fa-pencil  deep-pink" aria-hidden="true"></i></div> --}}
                                        </div>
                                    </a>
                                    </div>
                                    @endforeach
                                    @endif

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
