@extends('layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-organisation')

@section('header')
@include('include.header')
@endsection

@section('content')
<section class="guide_profile_section">
    <div class="row">
        <div class="col-md-3">
            @include('include.profile_sidebar')
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
                                <div><button class="guide_profile_btn"><a class="btn-link text_decor_none" href="{{ route('organisation-create')}}">Edit</a></button></div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="user_profile_container">
                                    @if (empty($UserOrganisation->logo))
                                        <img src="{{ asset('public/images/asset/100_no_img.jpg') }}" />
                                    @else
                                        <img src="{{ Storage::url($UserOrganisation->logo) }}"  class = "prod-img" alt="product-image" style="max-height:100px;width:100%;">
                                    @endif  
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="preview_headtext">{{ (isset($UserOrganisation->name))?$UserOrganisation->name:'Name'; }}</div>
                                <div class="guide_profile_main_subtext">{{ (isset($UserOrganisation->organisation_type))?$UserOrganisation->organisation_type:'Organisation type'; }}</div>
                                <div class="guide_profile_main_subtext">{{ (isset($UserOrganisation['country']['name']))?$UserOrganisation['country']['name']:'Located In'; }}</div>
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
                                    <p> Services</p>
                                </div>
                                <div class="d-flex mt-3">
                                    @if (isset($UserOrganisation->organizationServices))
                                        @foreach ($UserOrganisation->organizationServices as $k => $organizationService)
                                            <button class="curv_cmn_btn">{{ (isset($organizationService->services->name))?$organizationService->services->name:'-'; }}</button>
                                        @endforeach
                                    @else
                                    <span><b>-</b></span>
                                @endif
                                </div>
                                <div class="guide_profile_main_text mt-3">Availabe To Work In</div>
                                <div class="guide_profile_main_subtext Aubergine_at_night mt-2">{{ (isset($UserOrganisation->available_to_work_in))?$UserOrganisation->available_to_work_in:'-'; }}</div>
                                <div class="guide_profile_main_text mt-3">Languages Spoken</div>
                                @if (isset($UserOrganisation->organizationServices))
                                    @foreach ($UserOrganisation->organizationLanguages as $k => $organizationLanguage)                                    
                                        <div class="guide_profile_main_subtext Aubergine_at_night mt-2">{{ (isset($organizationLanguage->languages->name))?$organizationLanguage->languages->name:'-'; }}</div>
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
                                <div class="guide_profile_main_subtext deep-pink mt-1">{{ (isset($UserOrganisation->imdb_profile))?$UserOrganisation->imdb_profile:'-'; }}</div>
                                <div class="guide_profile_main_subtext mt-3">LinkedIn Profile</div>
                                <div class="guide_profile_main_subtext deep-pink">{{ (isset($UserOrganisation->linkedin_profile))?$UserOrganisation->linkedin_profile:'-'; }}</div>
                                <div class="guide_profile_main_subtext mt-3">Website</div>
                                <div class="guide_profile_main_subtext deep-pink mt-1">{{ (isset($UserOrganisation->website))?$UserOrganisation->website:'-'; }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="guide_profile_subsection">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
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
                                    <iframe width=100% height="300" src="{{isset($UserOrganisation->intro_video_link)?$UserOrganisation->intro_video_link:'https://www.youtube.com/embed/bDMwlH1FTpk'}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                                <div class="d-flex justify-content-between mt-3">
                                    <div class="organisation_cmn_text">Title</div>
                                    <div class="icon_container"><i class="fa fa-pencil deep-pink" aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="guide_profile_subsection">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex align-items-center">
                                    <div class="preview_headtext">Team size</div>
                                    <div class="associate_text mt-3 mx-3">{{isset($UserOrganisation->team_size)?$UserOrganisation->team_size:'-'}}</div>
                                </div>
                                <div class="preview_headtext mb-3">Team members</div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div><img src="{{ asset('public/images/asset/67a6c213a22d2ba4c3982a55d828b5c7 1.png') }}" class="w-100"></div>
                                        <div class="d-flex justify-content-between mt-3">
                                            <div class="organisation_cmn_text">Title</div>
                                            <div class="icon_container"><i class="fa fa-pencil  deep-pink" aria-hidden="true"></i></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div><img src="{{ asset('public/images/asset/photo-1595152452543-e5fc28ebc2b8 2.png') }}" class="w-100"></div>
                                        <div class="d-flex justify-content-between mt-3">
                                            <div class="organisation_cmn_text">Title</div>
                                            <div class="icon_container"><i class="fa fa-pencil deep-pink" aria-hidden="true"></i></div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div><img src="{{ asset('public/images/asset/67a6c213a22d2ba4c3982a55d828b5c7 1.png') }}" class="w-100"></div>
                                        <div class="d-flex justify-content-between mt-3">
                                            <div class="organisation_cmn_text">Title</div>
                                            <div class="icon_container"><i class="fa fa-pencil deep-pink" aria-hidden="true"></i></div>
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
@include('include.footer')
@endsection
