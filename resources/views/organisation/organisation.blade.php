@extends('layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-portfolio')

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
                            <div class="com-md-12 d-flex justify-content-between align-items-center">
                                <div class="profile_text">
                                    <h1>
                                        Organisation
                                    </h1>
                                </div>
                                <div><button class="guide_profile_btn">Edit</button></div>
                            </div>
                            <div class="col-md-2">
                                <div class="user_profile_container">
                                    <img src="{{ asset('public/images/asset/photo-1500648767791-00dcc994a43e 1.png') }}" />
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="preview_headtext">Name</div>
                                <div class="guide_profile_main_subtext">Organization type</div>
                                <div class="guide_profile_main_subtext">Located in</div>
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
                                <div class="guide_profile_main_subtext Aubergine_at_night mt-2">Sample Location</div>
                                <div class="guide_profile_main_text mt-3">Languages Spoken</div>
                                <div class="guide_profile_main_subtext Aubergine_at_night mt-2">Language 1</div>
                                <div class="guide_profile_main_subtext Aubergine_at_night mt-1">Language 2</div>
                            </div>
                            <div class="col-md-6">
                                <div class="guide_profile_main_text mt-3">
                                    <p> Social Profile</p>
                                </div>
                                <div class="guide_profile_main_subtext mt-3">IMDB Profile</div>
                                <div class="guide_profile_main_subtext deep-pink mt-1">https://www.cinevesture.com</div>
                                <div class="guide_profile_main_subtext mt-3">LinkedIn Profile</div>
                                <div class="guide_profile_main_subtext deep-pink">https://www.cinevesture.com</div>
                                <div class="guide_profile_main_subtext mt-3">Website</div>
                                <div class="guide_profile_main_subtext deep-pink mt-1">https://www.cinevesture.com</div>
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
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                        exercitation
                                        ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="guide_profile_main_text deep-pink mb-2">Introduction Video</div>
                                <div><img src="{{ asset('public/images/asset/67a6c213a22d2ba4c3982a55d828b5c7 1.png') }}" class="w-100"></div>
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
                                <div class="preview_headtext">Email</div>
                                <div class="movie_name_text ">www.www.com</div>
                                <div class="preview_headtext">Website</div>
                                <div class="movie_name_text ">www.www.com</div>
                                <div class="preview_headtext">Services</div>
                                <div class="d-flex mt-3">
                                    <div> <button class="curv_cmn_btn">Special 1</button></div>
                                    <div> <button class="curv_cmn_btn mx-3">Special 1</button></div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="preview_headtext">Team size</div>
                                    <div class="associate_text mt-3 mx-3">20</div>
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
