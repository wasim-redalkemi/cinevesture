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
                        <div class="col-md-2">
                            <div class="user_profile_container">
                                <img src="{{ asset('public/images/asset/user-profile.png') }}" />
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="guide_profile_main_text pt-3">{{$user->name}}</div>
                            <div class="guide_profile_main_subtext">Lorem ipsum dolor sit amet, consectetur adipiscing
                                elit.</div>
                            <div><button class="guide_profile_btn mt-2">Contact </button></div>
                        </div>
                        {{-- <div class="col-md-2 d-flex pt-3 justify-content-lg-end">
                            <i class="fa fa-heart icon-size Aubergine" aria-hidden="true"></i>
                            <button class="verified_cmn_btn mx-3"> <i class="fa fa-check-circle hot-pink mx-1"
                                    aria-hidden="true"></i> VERIFIED</button>
                        </div> --}}
                        <div class="col-md-2 d-flex pt-3 justify-content-lg-end">
                            <a href="{{ route('profile-create')}}">
                                <button class="guide_profile_btn mt-2">Edit </button>
                            </a>
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
                            <div class="guide_profile_main_subtext Aubergine_at_night mt-2">{{ $user->available_to_work_in }}</div>
                            <div class="guide_profile_main_text mt-3">Languages Spoken</div>
                            <div class="guide_profile_main_subtext Aubergine_at_night mt-2">Language 1</div>
                            <div class="guide_profile_main_subtext Aubergine_at_night mt-1">Language 2</div>
                        </div>
                        <div class="col-md-6">
                            <div class="guide_profile_main_text mt-3"><p> Social Profile</p></div>
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
                    <div class="guide_profile_main_text mb-2">Portfolio</div>
                    <div class="portfolio owl-carousel owl-theme">
                        <div class="item">
                            <img src="{{ asset('public/images/asset/photo-1595152452543-e5fc28ebc2b8 2.png') }}">
                          <div class="guide_profile_main_subtext">Title</div>
                        </div>
                        <div class="item">
                            <img src="{{ asset('public/images/asset/67a6c213a22d2ba4c3982a55d828b5c7 1.png') }}">
                           <div class="guide_profile_main_subtext">Title</div>
                        </div>
                        <div class="item">
                            <img src="{{ asset('public/images/asset/photo-1595152452543-e5fc28ebc2b8 2.png') }}">
                            <div class="guide_profile_main_subtext">Title</div>
                        </div>
                        <div class="item">
                            <img src="{{ asset('public/images/asset/67a6c213a22d2ba4c3982a55d828b5c7 1.png') }}">
                            <div class="guide_profile_main_subtext">Title</div>
                        </div>
                        <div class="item">
                            <img src="{{ asset('public/images/asset/photo-1595152452543-e5fc28ebc2b8 2.png') }}">
                            <div class="guide_profile_main_subtext">Title</div>
                        </div>
                        <div class="item">
                            <img src="{{ asset('public/images/asset/photo-1595152452543-e5fc28ebc2b8 2.png') }}">
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
                    <div class="guide_profile_main_text mb-2">Project</div>
                    <div class="project owl-carousel owl-theme">
                        <div class="item">
                            <img src="{{ asset('public/images/asset/download (3) 1.png') }}">
                            <div class="guide_profile_main_subtext">Title</div>
                        </div>
                        <div class="item">
                            <img src="{{ asset('public/images/asset/ba947a848086b8f90238636dcf7efdb5 1 (1).png') }}">
                            <div class="guide_profile_main_subtext">Title</div>
                        </div>
                        <div class="item">
                            <img src="{{ asset('public/images/asset/download (3) 7.png') }}">
                            <div class="guide_profile_main_subtext">Title</div>
                        </div>
                        <div class="item">
                            <img src="{{ asset('public/images/asset/ba947a848086b8f90238636dcf7efdb5 1 (1).png') }}">
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
                            <div class="guide_profile_main_subtext mt-4">This is Tile</div>
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
                            <div class="guide_profile_main_subtext mt-4">This is Tile</div>
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
                            <div class="guide_profile_main_text deep-pink font_18">
                                <h1>Qualifications</h1>
                            </div>
                            <div class="guide_profile_main_subtext mt-4">School</div>
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
                            <div class="guide_profile_main_subtext mt-4">School</div>
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
                        <div class="col-md-12 d-flex justify-content-between">
                            <div class="guide_profile_main_text deep-pink font_18">
                                <h1>Endorsements</h1>
                            </div>
                            <div>
                                <button class="guide_profile_btn">Endorse</button>
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
                            <div class="guide_profile_main_subtext Aubergine_at_night"> <p>
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
                480: { items: 3 },
                768: { items: 4 },
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
                480: { items: 1 },
                768: { items: 2 },
                1024: {
                    items: 3
                }
            },
        });
    </script>
@endsection