@extends('website.layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-organisation')

@section('header')
@include('website.include.header')
@endsection

@section('content')

<section class="profile-section">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('website.include.profile_sidebar')
            </div>
            <div class="col-md-9">
                <div class="profile_wraper profile_wraper_padding mt-md-0 mt-4">
                    <div class="profile_text">
                        <h1>Posted Jobs</h1>
                    </div>
                    <div class="d-flex">
                        <div class="posted_job_header"><a href="" class="posted_job_header_link px-3"> Published Jobs</a></div>
                        <div class="posted_job_header"><a href="" class="posted_job_header_link px-3">Draft Job</a></div>
                        <div class="posted_job_header"><a href="" class="posted_job_header_link px-3">Unpublished Jobs</a></div>
                    </div>
                </div>
                <div class="profile_wraper profile_wraper_padding">
                    <div class="d-flex justify-content-between">
                        <div class="guide_profile_main_text">
                            Title Of The Job
                        </div>
                        <div class="dropdown  search-page">
                            <div class="" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-ellipsis-h aubergine icon-size" aria-hidden="true"></i>
                            </div>
                            <ul class="dropdown-menu profile_dropdown_menu p-2">
                                <li>
                                  <a href="">  Edit Job</a>
                                </li>
                                <li>
                                  <a href="">  Promote Job</a>
                                </li>
                                <li>
                                 <a href="">   Unpublish Job</a>
                                </li>
                                <li>
                                  <a href="">  Delete Job </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="posted_job_header">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </div>
                    <div class="preview_headtext lh_54 candy-pink">
                        Company Name - Location Company Name - Location
                    </div>
                    <div class="posted_job_header Aubergine_at_night">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </div>
                    <div class="d-flex justify-content-between mt-4">
                        <div class="d-flex flex-wrap">
                            <button class="curv_cmn_btn skill_container">Skills 1</button>
                            <button class="curv_cmn_btn skill_container">Skills 2</button>
                            <button class="curv_cmn_btn skill_container">Skills 3</button>
                            <button class="curv_cmn_btn skill_container">Skills 4</button>
                            <button class="curv_cmn_btn skill_container">Skills 3</button>
                            <button class="curv_cmn_btn skill_container">Skills 4</button>
                            <button class="curv_cmn_btn skill_container">Skills 3</button>
                            <button class="curv_cmn_btn skill_container">Skills 4</button>
                            <button class="curv_cmn_btn skill_container">Skills 3</button>
                            <button class="curv_cmn_btn skill_container">Skills 4</button>
                            <button class="curv_cmn_btn skill_container">Skills 3</button>
                            <button class="curv_cmn_btn skill_container">Skills 4</button>
                            
                        </div>
                        <div>
                            <button class="guide_profile_btn w_150">View Applications</button>
                        </div>
                    </div>
                </div>

                <div class="profile_wraper profile_wraper_padding">
                    <div class="d-flex justify-content-between">
                        <div class="guide_profile_main_text">
                            Title Of The Job
                        </div>
                        <div class="pointer"><i class="fa fa-ellipsis-h aubergine icon-size" aria-hidden="true"></i></div>
                    </div>
                    <div class="posted_job_header">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </div>
                    <div class="preview_headtext lh_54 candy-pink">
                        Company Name - Location Company Name - Location
                    </div>
                    <div class="posted_job_header Aubergine_at_night">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </div>
                    <div class="d-flex justify-content-between mt-4">
                        <div class="d-flex flex-wrap">
                            <button class="curv_cmn_btn skill_container">Skills 1</button>
                            <button class="curv_cmn_btn skill_container">Skills 2</button>
                            <button class="curv_cmn_btn skill_container">Skills 3</button>
                            <button class="curv_cmn_btn skill_container">Skills 4</button>
                        </div>
                        <div>
                            <button class="guide_profile_btn w_150">View Applications</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Saved Job section -->
            <section>
                <div class="col-md-9">
                    <div class="profile_wraper profile_wraper_padding mt-md-0 mt-4">
                        <div class="profile_text">
                            <h1>Saved Jobs</h1>
                        </div>
                    </div>
                    <div class="profile_wraper profile_wraper_padding">
                        <div class="d-flex justify-content-between">
                            <div class="guide_profile_main_text">
                                Title Of The Job
                            </div>
                            <div class="pointer"><i class="fa fa-heart aubergine icon-size" aria-hidden="true"></i></div>
                        </div>
                        <div class="posted_job_header">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        </div>
                        <div class="preview_headtext lh_54 candy-pink">
                            Company Name - Location Company Name - Location
                        </div>
                        <div class="posted_job_header Aubergine_at_night">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </div>
                        <div class="d-flex justify-content-between mt-4">
                            <div class="d-flex flex-wrap">
                                <button class="curv_cmn_btn skill_container">Skills 1</button>
                                <button class="curv_cmn_btn skill_container">Skills 2</button>
                                <button class="curv_cmn_btn skill_container">Skills 3</button>
                                <button class="curv_cmn_btn skill_container">Skills 4</button>
                            </div>
                            <div>
                                <button class="guide_profile_btn ">Apply now</button>
                            </div>
                        </div>
                    </div>

                    <div class="profile_wraper profile_wraper_padding">
                        <div class="d-flex justify-content-between">
                            <div class="guide_profile_main_text">
                                Title Of The Job
                            </div>
                            <div class="pointer"><i class="fa fa-heart aubergine icon-size" aria-hidden="true"></i></div>
                        </div>
                        <div class="posted_job_header">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        </div>
                        <div class="preview_headtext lh_54 candy-pink">
                            Company Name - Location Company Name - Location
                        </div>
                        <div class="posted_job_header Aubergine_at_night">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </div>
                        <div class="d-flex justify-content-between mt-4">
                            <div class="d-flex flex-wrap">
                                <button class="curv_cmn_btn skill_container">Skills 1</button>
                                <button class="curv_cmn_btn skill_container">Skills 2</button>
                                <button class="curv_cmn_btn skill_container">Skills 3</button>
                                <button class="curv_cmn_btn skill_container">Skills 4</button>
                                <button class="curv_cmn_btn skill_container">Skills 4</button>
                            </div>
                            <div>
                                <button class="guide_profile_btn">Apply now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Applied Job section -->
            <section>
                <div class="col-md-9">
                    <div class="profile_wraper profile_wraper_padding mt-md-0 mt-4">
                        <div class="profile_text">
                            <h1>Applied Jobs</h1>
                        </div>
                    </div>
                    <div class="profile_wraper profile_wraper_padding">
                        <div class="d-flex justify-content-between">
                            <div class="guide_profile_main_text">
                                Title Of The Job
                            </div>
                            <div class="pointer"><i class="fa fa fa-heart-o aubergine icon-size" aria-hidden="true"></i></div>
                        </div>
                        <div class="posted_job_header">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        </div>
                        <div class="preview_headtext lh_54 candy-pink">
                            Company Name - Location Company Name - Location
                        </div>
                        <div class="posted_job_header Aubergine_at_night">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </div>
                        <div class="d-flex flex-wrap mt-4">
                            <button class="curv_cmn_btn skill_container">Skills 1</button>
                            <button class="curv_cmn_btn skill_container">Skills 2</button>
                            <button class="curv_cmn_btn skill_container">Skills 3</button>
                            <button class="curv_cmn_btn skill_container">Skills 4</button>
                        </div>
                    </div>

                    <div class="profile_wraper profile_wraper_padding">
                        <div class="d-flex justify-content-between">
                            <div class="guide_profile_main_text">
                                Title Of The Job
                            </div>
                            <div class="pointer"><i class="fa fa fa-heart-o aubergine icon-size" aria-hidden="true"></i></div>
                        </div>
                        <div class="posted_job_header">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        </div>
                        <div class="preview_headtext lh_54 candy-pink">
                            Company Name - Location Company Name - Location
                        </div>
                        <div class="posted_job_header Aubergine_at_night">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </div>
                        <div class="d-flex justify-content-between mt-4">
                            <div class="d-flex flex-wrap">
                                <button class="curv_cmn_btn skill_container">Skills 1</button>
                                <button class="curv_cmn_btn skill_container">Skills 2</button>
                                <button class="curv_cmn_btn skill_container">Skills 3</button>
                                <button class="curv_cmn_btn skill_container">Skills 4</button>
                            </div>
                            <div>
                                <!-- <button class="guide_profile_btn">View Applications</button> -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Title of the job Modal-->
            <section>
                <div class="col-md-9">
                    <div class="profile_wraper profile_wraper_padding mt-md-0 mt-4">

                        <div class="d-flex justify-content-between">
                            <div class="profile_text">
                                <h1>Title Of The Job</h1>
                            </div>
                            <div class="d-flex align-items-center">
                                <!-- <i class="fa fa-ellipsis-h aubergine icon-size" aria-hidden="true"></i> -->
                                <div class="pointer mx-3"><i class="fa fa fa-heart aubergine icon-size" aria-hidden="true"></i></div>
                                <button class="guide_profile_btn">Apply now</button>
                            </div>
                        </div>
                    </div>
                    <div class="profile_wraper profile_wraper_padding">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="preview_headtext lh_54 candy-pink">Company Name</div>
                                <div class="profile_upload_text Aubergine_at_night mt-2">ABCD Pvt limited</div>
                            </div>
                            <div class="col-sm-3">
                                <div class="preview_headtext lh_54 candy-pink">Location</div>
                                <div class="profile_upload_text Aubergine_at_night mt-2">Lorem ipsom</div>
                            </div>
                            <div class="col-sm-3">
                                <div class="preview_headtext lh_54 candy-pink"> Employement type</div>
                                <div class="profile_upload_text Aubergine_at_night mt-2">Lorem ipsom</div>
                            </div>
                            <div class="col-sm-3">
                                <div class="preview_headtext lh_54 candy-pink">Work space type</div>
                                <div class="profile_upload_text Aubergine_at_night mt-2">Lorem ipsom</div>
                            </div>
                        </div>


                    </div>
                    <div class="profile_wraper profile_wraper_padding">
                        <div class="guide_profile_main_text">Description</div>
                        <div class="posted_job_header">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut nullam elementum amet, neque, molestie iaculis tincidunt rhoncus eget. Viverra est suspendisse quis dui. In
                            egestas nunc massa viverra integer semper. Dui, nibh ultricies pretium aliquet diam. Ut ac in dignissim non
                            nam lorem congue sed. Sed pulvinar risus, tellus semper fermentum tellus. Tristique urna curabitur euismod ridiculus sit integer sem eget orci. Sit sed pulvinar vel lorem.
                            Semper et habitant accumsan et nibh. Consectetur euismod semper sapien a elit vitae metus platea feugiat. Eu enim, sed mi lectus. Mattis elit neque amet pellentesque.
                            Pretium massa maecenas integer orci, nunc. Euismod consectetur felis ullamcorper diam donec malesuada sed. Vel tristique eu venenatis amet, volutpat tristique arcu. Eu enim,
                            sed mi lectus. Mattis elit neque amet pellentesque. Pretium massa maecenas integer orci, nunc. Euismod consectetur felis ullamcorper diam donec malesuada sed. Vel tristique eu venenatis amet,
                            volutpat tristique arcu. Eu enim, sed mi lectus. Mattis elit neque amet pellentesque. Pretium massa maecenas integer orci, nuncEu enim, sed
                        </div>
                    </div>
                    <div class="profile_wraper profile_wraper_padding">
                        <div class="guide_profile_main_text">Skills Required</div>
                        <div class="d-flex flex-wrap mt-3">
                            <button class="curv_cmn_btn skill_container">Skills 1</button>
                            <button class="curv_cmn_btn skill_container">Skills 2</button>
                            <button class="curv_cmn_btn skill_container">Skills 3</button>
                            <button class="curv_cmn_btn skill_container">Skills 4</button>
                        </div>
                    </div>
                    <div class="profile_wraper profile_wraper_padding">
                        <!-- <div class="container"> -->
                        <div class="guide_profile_main_text mb-2">Job Posted By</div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="guide_profile_main_text deep-pink">John Doe</div>
                            </div>
                            <div class="col-md-3">
                                <div class="guide_profile_main_subtext Aubergine_at_night">Chief Officer</div>
                                <div class="profile_upload_text fw_300 Aubergine_at_night">10TH July 2021</div>
                                <div class="guide_profile_main_subtext Aubergine_at_night">Abc Private Limited</div>
                            </div>
                        </div>
                        <!-- </div> -->
                    </div>

                </div>
            </section>

            <!-- Applications of the job -->
            <section>
                <div class="col-md-9">
                    <div class="profile_wraper profile_wraper_padding mt-md-0 mt-4">

                        <div class="search-head-text deep-aubergine">
                            Applicants for “Title of job”
                        </div>
                    </div>
                    <div class="profile_wraper profile_wraper_padding">

                        <div class="row">
                            <div class="col-md-2">
                                <div class="user_profile_container">
                                    <img src="{{ asset('public/images/asset/user-profile.png') }}" />
                                </div>
                            </div>
                            <div class="col-md-10">

                                <div class="d-flex justify-content-between">
                                    <div class="guide_profile_main_text">
                                        Lorem Ipsum
                                    </div>
                                    <div class="pointer"><i class="fa fa fa-heart-o aubergine icon-size" aria-hidden="true"></i></div>
                                </div>
                                <div class="posted_job_header">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </div>
                                <div class="preview_headtext lh_54 candy-pink">
                                    Company Name - Location Company Name - Location
                                </div>
                                <div class="posted_job_header Aubergine_at_night">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </div>
                                <div class="d-flex flex-wrap mt-3">
                                    <button class="curv_cmn_btn skill_container">Skills 1</button>
                                    <button class="curv_cmn_btn skill_container">Skills 2</button>
                                    <button class="curv_cmn_btn skill_container">Skills 3</button>
                                    <button class="curv_cmn_btn skill_container">Skills 4</button>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="profile_wraper profile_wraper_padding">

                        <div class="row">
                            <div class="col-md-2">
                                <div class="user_profile_container">
                                    <img src="{{ asset('public/images/asset/user-profile.png') }}" />
                                </div>
                            </div>
                            <div class="col-md-10">

                                <div class="d-flex justify-content-between">
                                    <div class="guide_profile_main_text">
                                        Lorem Ipsum
                                    </div>
                                    <div class="pointer"><i class="fa fa fa-heart-o aubergine icon-size" aria-hidden="true"></i></div>
                                </div>
                                <div class="posted_job_header">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </div>
                                <div class="preview_headtext lh_54 candy-pink">
                                    Company Name - Location Company Name - Location
                                </div>
                                <div class="posted_job_header Aubergine_at_night">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </div>
                                <div class="d-flex flex-wrap mt-3">
                                    <button class="curv_cmn_btn skill_container">Skills 1</button>
                                    <button class="curv_cmn_btn skill_container">Skills 2</button>
                                    <button class="curv_cmn_btn skill_container">Skills 3</button>
                                    <button class="curv_cmn_btn skill_container">Skills 4</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <!-- Title of the job & summery -->

            <section class="guide_profile_section p-0">

                <div class="col-md-9 mt-3 mt-sm-0">
                    <div class="content_wraper">
                        <div class="guide_profile_subsection">
                            <div class="profile_text">
                                <h1>Title Of The Job</h1>
                            </div>
                        </div>
                        <div class="guide_profile_subsection">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="user_profile_container">
                                            <img src="{{ asset('public/images/asset/user-profile.png') }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="guide_profile_main_text pt-3">Lorem ipsum</div>
                                        <div class="guide_profile_main_subtext">Lorem ipsum dolor sit amet, consectetur adipiscing
                                            elit.</div>
                                        <div class="deep-pink">Veiw Profile Contact</div>
                                    </div>
                                    <div class="col-md-2 d-flex pt-3 justify-content-lg-end">
                                        <i class="fa fa-heart icon-size Aubergine" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="guide_profile_subsection">
                            <div class="guide_profile_main_text">Cover Letter</div>
                            <div class="posted_job_header">Erat neque risus volutpat vivamus pretium purus.</div>
                            <div class="posted_job_header">Erat neque risus volutpat vivamus pretium purus. Amet, accumsan, sed eget enim et neque. Amet turpis faucibus aenean id auctor a massa diam nisi.
                                Lectus non consequat, nulla lorem ultrices ultrices commodo leo. In at feugiat tellus
                                consectetur arcu condimentum bibendum id risus. Praesent quisque purus ante vulputate. Aliquet turpis tempus eget eget ac facilisi dui vestibulum.</div>
                        </div>

                        <div class="guide_profile_subsection">
                            <div class="guide_profile_main_text">Resume</div>

                            <div class="row">
                                <div class="col-lg-3 col-sm-6 mt-sm-2 mt-2">
                                    <div class="d-flex doc_container">
                                        <div class="icon">
                                            <img src="{{ asset('public/images/asset/pdf-icon.png') }}">
                                        </div>
                                        <div class="public-subheading-text mx-2">
                                            <div>Lorem ipson pdf </div>
                                            <div>64.42 KB</div>
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
                    </div>
                </div>
            </section>
        </div>
        <div class="public_section mb-4">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
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