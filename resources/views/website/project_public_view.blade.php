@extends('website.layouts.app')

@section('title','Cinevesture-index')

@section('header')
@include('website.include.header')
@endsection

@section('nav')
@include('website.include.nav')
@endsection

@section('content')

<section class="public-head-section">
    <div class="img-container">
        <img src="{{ asset('images/asset/download (3) 7.png') }}" class="project_image_wraper" style="" alt="image">
        
    

        <div class="public-head-image-shadow" style=";">
            <!-- </div> -->
            <div class="public-head-container">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 text-center  text-lg-start">
                            <div class="verified-text-area">
                                <div class="public-head-text">Into the wild</div>
                                <button class="verified-btn mx-3"> <i class="fa fa-check-circle icon-size" aria-hidden="true"></i> VERIFIED</button>
                            </div>
                            <div class="public-head-subtext">Lorem ipsum dolor sit amet.</div>
                            <div class="hours-category my-md-4">
                                2hr 28min | English | Country <br>
                                Genre | Category
                            </div>
                            <table class="table mt-1">
                                <tbody class="search-table-body white">
                                    <tr>
                                        <td class="public-head-subtext white">Type</td>
                                        <td class="project-sub-text white">
                                            Start Up
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="public-head-subtext white">Created By</td>
                                        <td class="aubergine project-sub-text candy-pink">Sean Tyagi</td>
                                    </tr>
                                    <tr>
                                        <td class="public-head-subtext white">Total Budget</td>
                                        <td class="project-sub-text white">$10,000,000</td>
                                    </tr>
                                    <tr>
                                        <td class="public-head-subtext white">Financing Secured</td>
                                        <td class="project-sub-text white">$10,000,000</td>
                                    </tr>
                                    <tr>
                                        <td class="public-head-subtext white">Project Stage</td>
                                        <td class="project-sub-text white">Pre-Production</td>
                                    </tr>
                                    <tr>
                                        <td class="public-head-subtext white">Locations</td>
                                        <td class="project-sub-text white">Lorem ipsum</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-6 col-md-12 px-3">
                            <div class="public-head-subimage">
                                <iframe width="100%" height="350" src="https://www.youtube.com/embed/oYWAwwy5EbQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <!-- <img src="{{ asset('images/asset/download (3) 7.png') }}" width=100% alt="Image"> -->

                            </div>
                            <div class="d-flex my-4 align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <button class="cantact-page-cmn-btn">Contact Now</button>
                                    <i class="fa fa-share-alt mx-4 icon-size" aria-hidden="true"></i>
                                    <i class="fa fa-heart-o icon-size heart-color" aria-hidden="true"></i>
                                </div>
                                <div class="d-flex">
                                    <span class="mx-3 white">Report Project</span>
                                    <i class="fa fa-flag icon-size" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="public_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="public-heading-text"> Sypons</h1>
                <div class="public-subheading-text mt-2">
                    <p>
                        Based on a true story. After graduating from Emory University, Christopher McCandless
                        abandoned his possessions,
                        gave his entire savings account to charity, and hitchhiked to Alaska to live in the
                        wilderness. Along the way, Christopher encounters a series of characters who shape his
                        life.—Lisa Kelley.
                    </p>
                </div>
            </div>
        </div>

        <div class="public_subsection">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="public-heading-text"> Director Statement</h1>
                    <div class="public-subheading-text mt-2">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Faucibus odio quisque mollis
                            iaculis facilisi lobortis. Vulputate est tempus amet netus sed tellus integer. Netus leo
                            libero eu diam risus,
                            maecenas viverra fermentum. Interdum risus in mi tellus.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="public_subsection">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="public-heading-text"> Gallery</h1>
                    <div class="public-head-subtext mt-3">Videos</div>
                    <div class="row">
                        <div class="col-lg-3 col-sm-4 mt-sm-2 mt-3"><img src="{{ asset('images/asset/download (3) 7.png') }}" alt="image" width=100%></div>
                        <div class="col-lg-3 col-sm-4 mt-sm-2 mt-3"><img src="{{ asset('images/asset/download (3) 7.png') }}" alt="image" width=100%></div>
                        <div class="col-lg-3 col-sm-4 mt-sm-2 mt-3"><img src="{{ asset('images/asset/download (3) 7.png') }}" alt="image" width=100%></div>
                    </div>
                    <div class="public-head-subtext mt-3">Photos</div>
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 mt-sm-2 mt-3"><img src="{{ asset('images/asset/download (3) 7.png') }}" alt="image" width=100%></div>
                        <div class="col-lg-3 col-sm-6 mt-sm-2 mt-3"><img src="{{ asset('images/asset/download (3) 7.png') }}" alt="image" width=100%></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="public-head-subtext mt-3">Documents</div>
                <div class="row">
                    <div class="col-lg-3 col-sm-6 mt-sm-2 mt-2">
                        <div class="d-flex pdf-container">
                            <div class="icon">
                                <img src="./assets/images/pdf-icon.png">
                            </div>
                            <div class="public-subheading-text mx-2">
                                <div>Lorem ipson pdf </div>
                                <div>64.42 KB</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mt-sm-2 mt-2">
                        <div class="d-flex pdf-container">
                            <div class="icon">
                                <img src="./assets/images/pdf-icon.png">
                            </div>
                            <div class="public-subheading-text mx-2">
                                <div>Lorem ipson pdf </div>
                                <div>64.42 KB</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="public_subsection">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="public-heading-text">Requirements & Milestones</h1>
                    <div class="col-6">
                        <table class="table mt-1">
                            <tbody class="search-table-body white">
                                <tr>
                                    <td class="public-head-subtext white">Looking for</td>
                                    <td class="project-sub-text white d-flex">

                                        <button class="looking-btn">Talent/Crew</button>
                                        <button class="looking-btn mx-2">Organization</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="public-head-subtext white">Start Up Funding Stage</td>
                                    <td class="aubergine project-sub-text white">Pre - Seed</td>
                                </tr>
                                <tr>
                                    <td class="public-head-subtext white">Crowdfunding link</td>
                                    <td class="project-sub-text white">https://samplelink/sample.com</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div>
                        <table class="table mt-1">
                            <tbody class="search-table-body white">
                                <tr class="requirement-table-header">
                                    <th>Milestone Description</th>
                                    <th>Milestone Budget (USD)</th>
                                    <th>Target Date</th>
                                </tr>
                                <tr>
                                    <td class="public-head-subtext candy-pink mt-1">Completed Milstones</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="public-head-subtext white">Lorem ipsum dolor sit amet.</td>
                                    <td class="aubergine project-sub-text white">$2,000,000.00</td>
                                    <td class="aubergine project-sub-text white">15/04/2022</td>
                                </tr>
                                <tr>
                                    <td class="public-head-subtext white">Lorem ipsum dolor sit amet.</td>
                                    <td class="aubergine project-sub-text white">$2,000,000.00</td>
                                    <td class="aubergine project-sub-text white">15/04/2022</td>
                                </tr>
                                <tr>
                                    <td class="candy-pink public-head-subtext mt-1">Completed Milstones</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="public-head-subtext white">Lorem ipsum dolor sit amet.</td>
                                    <td class="aubergine project-sub-text white">$2,000,000.00</td>
                                    <td class="aubergine project-sub-text white">15/04/2022</td>
                                </tr>
                                <tr>
                                    <td class="public-head-subtext white">Lorem ipsum dolor sit amet.</td>
                                    <td class="aubergine project-sub-text white">$2,000,000.00</td>
                                    <td class="aubergine project-sub-text white">15/04/2022</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

        <div class="public_subsection">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="public-heading-text"> Associated With The Project</h1>
                    <div class="col-6">
                        <table class="table mt-1">
                            <tbody class="search-table-body white">
                                <tr>
                                    <td class="public-head-subtext candy-pink">Title</td>
                                    <td class="project-sub-text candy-pink">
                                        Name
                                    </td>
                                </tr>
                                <tr>
                                    <td class="public-head-subtext white">Lorem ipsum</td>
                                    <td class="aubergine project-sub-text white">Marvin mckn</td>
                                </tr>
                                <tr>
                                    <td class="public-head-subtext white">Lorem ipsum</td>
                                    <td class="aubergine project-sub-text white">Marvin mckn</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="public_subsection">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="public-heading-text mb-2"> Related</h1>
                    <div class="row">
                        <div class="col-4">
                            <div class="item">
                                <img src="{{ asset('images/asset/download (3) 7.png') }}" width=100% height=100% alt="image">
                            </div>
                            <!-- <div class="item">
                                    <div class="rltv_image_wraper">
                                        <div class="img-container">
                                            <img src="{{ asset('images/asset/download (3) 7.png') }}" width=100%
                                                height=100% alt="image">
                                        </div>
                                        <div class="secondry-card-top-container w-100">
                                            <div>Movie Title</div>
                                            <div>
                                                <i class="fa fa-heart" style="color: white;" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <div class="secondry-card-bottom-container">
                                            Duration / Language / Genre
                                        </div>
                                    </div>
                                </div> -->
                        </div>
                        <div class="col-4">
                            <div class="item">
                                <img src="{{ asset('images/asset/download (3) 7.png') }}" width=100% height=100% alt="image">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="item">
                                <img src="{{ asset('images/asset/download (3) 7.png') }}" width=100% height=100% alt="image">
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
    $(document).ready(function() {
        $("#error-toast").toast("show");
        $("#success-toast").toast("show");
    });
</script>
@endpush