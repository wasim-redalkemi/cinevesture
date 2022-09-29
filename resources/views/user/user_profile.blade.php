
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
                            <div class="col-md-12">
                                <div class="d-flex justify-content-between">
                                    <div class="search-head-text Aubergine_at_night">Profile</div>
                                    <div><button class="guide_profile_btn mt-2">Edit</button></div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="user_profile_container">
                                    <img src="{{ asset('public/images/asset/user-profile.png') }}" />
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="guide_profile_main_text pt-3">Name</div>
                                <div class="guide_profile_main_subtext font_12 aubergine mt__3"> <span class="style_ilatian"> Age</span> | <span class="style_ilatian">Gender</span> | <span class="style_ilatian"> Gender Pronouns</span></div>
                                <div class="guide_profile_main_subtext mt-1">Job Title | Located In</div>
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
                                    <p> Skils</p>
                                </div>

                                <div>
                                    <div class="skill_container">
                                        <button class="curv_cmn_btn">Skills 1</button>
                                    </div>
                                    <div class="skill_container">
                                        <button class="curv_cmn_btn">Skill 1</button>
                                    </div>
                                    <div class="skill_container">
                                        <button class="curv_cmn_btn">Skills 1</button>
                                    </div>
                                    <div class="skill_container">
                                        <button class="curv_cmn_btn">Skill 1</button>
                                    </div>
                                    <div class="skill_container">
                                        <button class="curv_cmn_btn">Skills 1</button>
                                    </div>
                                    <div class="skill_container">
                                        <button class="curv_cmn_btn">Skills 1</button>
                                    </div>
                                    <div class="skill_container">
                                        <button class="curv_cmn_btn">Skill 1</button>
                                    </div>
                                    <div class="skill_container">
                                        <button class="curv_cmn_btn">Skills 1</button>
                                    </div>
                                    <div class="clearfix"></div>
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
                            <div class="col-md-5">
                                <div class="contact-page-text deep-pink">
                                    About
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
                            <div class="col-md-2"></div>
                            <div class="col-md-5 ">
                                <div class="guide_profile_main_text mb-2">Meet Name</div>
                                <div>
                                    <iframe width=100% height="300" src="https://www.youtube.com/embed/EXv5zovts9E" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
                                    <div class="mx-3 icon_container"><a href=""><i class="fa fa-plus deep-pink pointer font_12" aria-hidden="true"></i></a></div>
                                </div>
                                <div class="portfolio owl-carousel owl-theme">
                                    <div class="item">
                                        <img src="{{ asset('public/images/asset/photo-1595152452543-e5fc28ebc2b8 2.png') }}">
                                        <div class="d-flex justify-content-between mt-2">
                                            <div class="organisation_cmn_text">Title</div>
                                            <div class="icon_container"> <a href=""><i class="fa fa-pencil deep-pink pointer font_12" aria-hidden="true"></i></a></div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img src="{{ asset('public/images/asset/67a6c213a22d2ba4c3982a55d828b5c7 1.png') }}">
                                        <div class="d-flex justify-content-between mt-2">
                                            <div class="organisation_cmn_text">Title</div>
                                            <div class="icon_container"><a href=""><i class="fa fa-pencil deep-pink pointer font_12" aria-hidden="true"></i></a></div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img src="{{ asset('public/images/asset/photo-1595152452543-e5fc28ebc2b8 2.png') }}">
                                        <div class="d-flex justify-content-between mt-2">
                                            <div class="organisation_cmn_text">Title</div>
                                            <div class="icon_container"><a href=""><i class="fa fa-pencil deep-pink pointer font_12" aria-hidden="true"></i></a></div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img src="{{ asset('public/images/asset/67a6c213a22d2ba4c3982a55d828b5c7 1.png') }}">
                                        <div class="d-flex justify-content-between mt-2">
                                            <div class="organisation_cmn_text">Title</div>
                                            <div class="icon_container"><a href=""><i class="fa fa-pencil deep-pink pointer font_12" aria-hidden="true"></i></a></div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img src="{{ asset('public/images/asset/photo-1595152452543-e5fc28ebc2b8 2.png') }}">
                                        <div class="d-flex justify-content-between mt-2">
                                            <div class="organisation_cmn_text">Title</div>
                                            <div class="icon_container"><a href=""><i class="fa fa-pencil deep-pink pointer font_12" aria-hidden="true"></i></a></div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img src="{{ asset('public/images/asset/photo-1595152452543-e5fc28ebc2b8 2.png') }}">
                                        <div class="d-flex justify-content-between mt-2">
                                            <div class="organisation_cmn_text">Title</div>
                                            <div class="icon_container"><a href=""><i class="fa fa-pencil deep-pink pointer font_12" aria-hidden="true"></i></a></div>
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
                                    <div class="mx-3 icon_container"><a href=""><i class="fa fa-plus deep-pink pointer font_12" aria-hidden="true"></i></a></div>
                                </div>
                                <div class="d-flex align-items-end">
                                    <div class="tile_text mt-1">This is Tile</div>
                                    <div class="icon_container mx-3"><a href=""><i class="fa fa-pencil deep-pink pointer font_12" aria-hidden="true"></i></a></div>
                                </div>
                                <div class="guide_profile_main_subtext candy-pink mt-2">
                                    Location | Start Date | End Date <br>
                                    Company | Employment Type
                                </div>
                                <div class="guide_profile_main_subtext Aubergine_at_night mt-2">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut
                                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                        ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </p>
                                </div>
                                <div class="d-flex align-items-end">
                                    <div class="tile_text mt-3">This is Tile</div>
                                    <div class="icon_container mx-3"><a href=""><i class="fa fa-pencil deep-pink pointer font_12" aria-hidden="true"></i></a></div>
                                </div>
                                <div class="guide_profile_main_subtext candy-pink mt-2">
                                    Location | Start Date | End Date <br>
                                    Company | Employment Type
                                </div>
                                <div class="guide_profile_main_subtext Aubergine_at_night mt-2">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut
                                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                        ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </p>
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
                                        Qualifications
                                    </div>
                                    <div class="mx-3 icon_container"><a href=""><i class="fa fa-plus deep-pink pointer font_12" aria-hidden="true"></i></a></div>
                                </div>

                                <div class="d-flex align-items-end">
                                    <div class="tile_text mt-1">This is Tile</div>
                                    <div class="icon_container mx-3"><a href=""><i class="fa fa-pencil deep-pink pointer font_12" aria-hidden="true"></i></a></div>
                                </div>

                                <div class="guide_profile_main_subtext candy-pink mt-2">
                                    Degree | Field of Study | Start | End
                                </div>
                                <div class="guide_profile_main_subtext Aubergine_at_night mt-2">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut
                                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                        ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </p>
                                </div>
                                <div class="d-flex align-items-end">
                                    <div class="tile_text mt-3">This is Tile</div>
                                    <div class="icon_container mx-3"><a href=""><i class="fa fa-pencil deep-pink pointer font_12 font_12" aria-hidden="true"></i></a></div>
                                </div>
                                <div class="guide_profile_main_subtext candy-pink mt-2">
                                    Degree | Field of Study | Start | End
                                </div>
                                <div class="guide_profile_main_subtext Aubergine_at_night mt-2">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut
                                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                        ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </p>
                                </div>
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
</section>
@endsection

@section('footer')
@include('include.footer')
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
</script>
@endsection
