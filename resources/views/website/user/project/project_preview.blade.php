@extends('website.layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-organisation')

@section('header')
@include('website.include.header')
@endsection

@section('content')
<div class="hide-me animation for_authtoast">
    @include('website.include.flash_message')
</div>
@include('website.user.project.project_pagination')


<!-- Preview section  -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class=" profile_wraper profile_wraper_padding  mt-4">
                    <p class="flow_step_text"> Overview</p>
               @foreach ($UserProject as $k=>$v)
                <div class="preview_headtext">Project Name</div>
                <div class="preview_subtext">{{$v->project_name}}</div>
                <div class="preview_headtext">Types of projects</div>
                <div class="preview_subtext">{{ $v->project_type_id }}</div>
                <div class="preview_headtext">Who are you listning this project as</div>
                <div class="preview_subtext">{{ $v->listing_project_as }}</div>
                <div class="preview_headtext">Language</div>
                <div class="preview_subtext">English</div>
                <div class="preview_headtext">Country</div>
                <div class="preview_subtext">{{ $v->location }}</div>
                <div class="preview_headtext">Locations</div>
                <div class="preview_subtext pb-3">{{ $v->location }}</div>
               @endforeach
                <div class="row">
                    <div class="com-md-12">
                        <div class="justify-content-end"><button class="save_add_btn float-end">Edit</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="profile_wraper profile_wraper_padding  mt-4">
                <div>
                    <p class="flow_step_text"> Details</p>
                </div>
                <div class="preview_headtext">Category</div>
                <div class="preview_subtext">Feature</div>
                <div class="preview_headtext">Genre</div>
                <div class="d-flex mt-2">
                    <button class="curv_cmn_btn">Adventure</button>
                    <button class="curv_cmn_btn mx-3">Biography</button>
                </div>
                <div class="preview_headtext">Duration</div>
                <div class="preview_subtext">1 hr 39 min 38 sec</div>
                <div class="preview_headtext">Total Budget (USD)</div>
                <div class="preview_subtext">10,000,000.00</div>
                <div class="preview_headtext">Financing Secured (USD)</div>
                <div class="preview_subtext">5,000,000.00</div>
                <div class="preview_headtext">Creator/Founder Name</div>
                <div class="preview_subtext">Riyah P Ghuman</div>
                <div class="preview_headtext">Associated with the Project</div>
                <div class="preview_subtext">
                    <div>Cinematographer - Name</div>
                    <div> Editor - Name</div>
                    <div> Actor - Name</div>
                </div>
                <div class="row">
                    <div class="com-md-12">
                        <div class="justify-content-end"><button class="save_add_btn float-end">Edit</button></div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="profile_wraper profile_wraper_padding  mt-4">
                <div>
                    <p class="flow_step_text"> Description</p>
                </div>
                <div class="preview_headtext">Logline</div>
                <div class="preview_subtext">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                <div class="preview_headtext">Synopsis/Brief Description</div>
                <div class="preview_subtext">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    <br> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </div>
                <div class="preview_headtext">Creator/Founder’s Statement</div>
                <div class="preview_subtext">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    <br> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </div>
                <div class="row">
                    <div class="com-md-12">
                        <div class="justify-content-end"><button class="save_add_btn float-end">Edit</button></div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="profile_wraper profile_wraper_padding  mt-4">
                <div>
                    <p class="flow_step_text"> Description</p>
                </div>
        
        <div class="preview_headtext mb-3">Video</div>
        <div class="row">
            <div class="col-md-3">
                <div> <img src="{{ asset('public/images/asset/ba947a848086b8f90238636dcf7efdb5 1.png') }}" class="" width=100% alt="image"></div>
                <div class="d-flex align-items-center">
                    <div class="movie_name_text">Movie Title </div>
                    <button class="verified_cmn_btn mt-1 mx-3">Featured</button>
                </div>
            </div>
            <div class="col-md-3">
                <div> <img src="{{ asset('public/images/asset/ba947a848086b8f90238636dcf7efdb5 1.png') }}" class="" width=100% alt="image"></div>
                <div class="d-flex align-items-center">
                    <div class="movie_name_text">Movie Title </div>
                </div>
            </div>
        </div>
        <div class="preview_headtext mb-3">Photos</div>
        <div class="row">
            <div class="col-md-3">
                <div> <img src="{{ asset('public/images/asset/Rectangle 57.png') }}" class="" width=100% alt="image"></div>
                <div class="d-flex align-items-center">
                    <div class="movie_name_text">Photo Title </div>
                    <button class="verified_cmn_btn mt-1 mx-3">Featured</button>
                </div>
            </div>
            <div class="col-md-3">
                <div> <img src="{{ asset('public/images/asset/Rectangle 57.png') }}" class="" width=100% alt="image"></div>
                <div class="d-flex align-items-center">
                    <div class="movie_name_text">Photo Title </div>
                </div>
            </div>
            <div class="col-md-3">
                <div> <img src="{{ asset('public/images/asset/Rectangle 57.png') }}" width=100% alt="image"></div>
                <div class="d-flex align-items-center">
                    <div class="movie_name_text">Photo Title </div>
                </div>
            </div>
        </div>
        <div class="preview_headtext mb-3">pdf</div>
        <div class="row">
            <div class="col-md-3">
                <div class="document_pdf">
                    <div class="upload_loader">
                        <i class="fa fa-file-text deep-pink icon-size" aria-hidden="true"></i>
                    </div>
                    <div>
                        <div class="guide_profile_main_subtext Aubergine_at_night">Lorem ipsum.pdf</div>
                        <div class="proctect_by_capta_text Aubergine_at_night">64.32 KB</div>
                    </div>
                    <div><i class="fa fa-times" aria-hidden="true"></i></div>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="profile_wraper profile_wraper_padding  mt-4">
                <div>
                    <p class="flow_step_text"> Requirements & Milestones</p>
                </div>
                <div class="preview_headtext">Project Stage</div>
                <div class="preview_subtext">Pre-Production</div>
                <div class="preview_headtext">Looking For</div>
                <div class="preview_subtext">Talent/Crew/Organisation</div>
                <div class="preview_headtext">Crowdfunding Link</div>
                <div class="preview_subtext">https://samplelink/sample.com</div>

                <div class="row mt-3">
                    <div class="col-4 col-md-3 preview_headtext">Milestone Description</div>
                    <div class="col-4 col-md-3 preview_headtext">Milestone Budget (USD)</div>
                    <div class="col-4 col-md-3 preview_headtext">Target Date</div>
                </div>
                <div class="row mt-2">
                    <div class="col-4 col-md-3 preview_subtext">Lorem ipsum dolor sit amet.</div>
                    <div class="col-4 col-md-3 preview_subtext">2,000,000.00</div>
                    <div class="col-4 col-md-3 preview_subtext">2,000,000.00</div>
                </div>
                <div class="row mt-2">
                    <div class="col-4 col-md-3 preview_subtext">Lorem ipsum dolor sit amet.</div>
                    <div class="col-4 col-md-3 preview_subtext">2,000,000.00</div>
                    <div class="col-4 col-md-3 preview_subtext">2,000,000.00</div>
                </div>
                <div class="row mt-2">
                    <div class="col-4 col-md-3 preview_subtext">Lorem ipsum dolor sit amet.</div>
                    <div class="col-4 col-md-3 preview_subtext">2,000,000.00</div>
                    <div class="col-4 col-md-3 preview_subtext">2,000,000.00</div>
                </div>
                <div class="row">
                    <div class="com-md-12">
                        <div class="justify-content-end"><button class="save_add_btn float-end">Edit</button></div>
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

@push('scripts')
<script>
    $(document).ready(function(){
        $("#error-toast").toast("show");
        $("#success-toast").toast("show");
    });
</script>
@endpush