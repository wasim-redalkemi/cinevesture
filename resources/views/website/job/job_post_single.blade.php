@extends('website.layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-organisation')

@section('header')
@include('website.include.header')
@endsection

@section('content')

<section class="guide_profile_section my-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-sm-0">
                <div class="content_wraper">
                    <div class="guide_profile_subsection">
                        <div class="container">
                            @php
                                // echo "<pre>";
                                //     print_r($Job_data);
                                //     die;
                                    // $Job_data = $Job_data->toArray();

                            @endphp
                            <div class="d-flex justify-content-between">
                                <div class="contact-page-text deep-aubergine"> @if (!empty($Job_data->title)) {{$Job_data->title}} @endif</div>
                                <div class="d-flex align-items-center">
                                    {{-- <div class="mx-3"> <button class="cancel_btn">Saved Job <i class="fa fa-heart-o aubergine icon-size mx-2" aria-hidden="true"></i></button></div> --}}
                                    {{-- <div><button class="guide_profile_btn">Apply now</button></div> --}}
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
                            </div>
                        </div>
                    </div>
                    <div class="guide_profile_subsection">
                        <div class="container">

                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="preview_headtext lh_54 candy-pink">Company Name</div>
                                    <div class="profile_upload_text Aubergine_at_night mt-2">@if (!empty($Job_data->company_name)) {{$Job_data->company_name}} @endif</div>
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
                    </div>
                    <div class="guide_profile_subsection">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="guide_profile_main_text">Discription</div>
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
                            </div>
                        </div>
                    </div>
                    <div class="guide_profile_subsection">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="guide_profile_main_text">Skills Required</div>
                                    <div class="d-flex mt-3">
                                        <button class="curv_cmn_btn">Skills 1</button>
                                        <button class="curv_cmn_btn mx-4">Skills 2</button>
                                        <button class="curv_cmn_btn">Skills 3</button>
                                        <button class="curv_cmn_btn mx-4">Skills 4</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="cancel_btn">Saved Job</button>
                        <button class="guide_profile_btn">View Applicants</button>
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