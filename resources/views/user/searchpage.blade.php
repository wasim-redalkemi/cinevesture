@extends('layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-profile-view')

@section('header')
    @include('include.header')
@endsection

@section('content')
<section class="main-body">
    <div class="container">
        <div class="row">
            <div class="col-12 result-text">
                <section>
                    96 Results found for <span class="candy-pink">"Loren Ipsem"</span>
                </section>

            </div>
        </div>
            <div class="row mt-4">
                <div class="col-md-3 side-bar-cmn-part">
                    <div class="search-box-container">
                        <form>
                            <input type="search" class="w-100 search-box" placeholder="Search...">
                            <button class="search-btn"></button>
                        </form>
                    </div>
                    <div class="dropdown search-page mt-3">
                        <button class="btn dropdown-toggle w-100" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Genres
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item active" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                    <div class="dropdown search-page">
                        <button class="btn dropdown-toggle w-100" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Catagory
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item active" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                    <div class="dropdown search-page">
                        <button class="btn dropdown-toggle w-100" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Looking for
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item active" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                    <div class="dropdown search-page">
                        <button class="btn dropdown-toggle w-100" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Project Stage
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item active" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                    <div class="dropdown search-page">
                        <button class="btn dropdown-toggle w-100" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Country
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item active" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                    <div class="dropdown search-page">
                        <button class="btn dropdown-toggle w-100" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Language
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item active" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                    <div class="form-check d-flex align-items-center mt-4">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="verified-text mx-2" for="flexCheckDefault">
                            Verified Projects
                        </label>
                    </div>
                    <span class="search-head-text"> </span>
                </div>
                <div class="col-md-9">
                    <div class="search-result-card">
                        <div class="row">
                            <div class="col-md-5">
                                <img src="{{ asset('public/images/asset/indy 7.png') }}" class=100% width=100%>
                            </div>
                            <div class="col-md-7">
                                <div class="search-head-text">Into the world</div>
                                <div class="search-head-subtext">Lorem ipsum dolor sit amet, consectetur adipiscing
                                    elit.</div>
                                <table class="table mt-1">
                                    <tbody class="search-table-body">
                                        <tr>
                                            <td>Looking for</td>
                                            <td class="d-flex">
                                                <button class="curv_cmn_btn">Talent/Crew</button>
                                                <button class="curv_cmn_btn mx-2">Organization</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Total Budget</td>
                                            <td class="aubergine">$10,000,000</td>
                                        </tr>
                                        <tr>
                                            <td>Type</td>
                                            <td class="aubergine">Start Up</td>
                                        </tr>
                                        <tr>
                                            <td>Locations</td>
                                            <td class="aubergine">Lorem ipsum</td>
                                        </tr>
                                        <tr>
                                            <td>Created by</td>
                                            <td class="aubergine">Tya6i</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="search-result-card">
                        <div class="row">
                            <div class="col-md-5">
                                <img src="{{ asset('public/images/asset/download (3) 7.png') }}" class=100% width=100%>
                            </div>
                            <div class="col-md-7">
                                <div class="search-head-text">Into the world</div>
                                <div class="search-head-subtext">Lorem ipsum dolor sit amet, consectetur adipiscing
                                    elit.</div>
                                <table class="table mt-1">
                                    <tbody class="search-table-body">
                                        <tr>
                                            <td>Looking for</td>
                                            <td class="d-flex">
                                                <button class="curv_cmn_btn">Talent/Crew</button>
                                                <button class="curv_cmn_btn mx-2">Organization</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Total Budget</td>
                                            <td class="aubergine">$10,000,000</td>
                                        </tr>
                                        <tr>
                                            <td>Type</td>
                                            <td class="aubergine">Start Up</td>
                                        </tr>
                                        <tr>
                                            <td>Locations</td>
                                            <td class="aubergine">Lorem ipsum</td>
                                        </tr>
                                        <tr>
                                            <td>Created by</td>
                                            <td class="aubergine">Tya6i</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="search-result-card">
                        <div class="row">
                            <div class="col-md-5">
                                <img src="{{ asset('public/images/asset/43710-posts 5.png') }}" class=100% width=100%>
                            </div>
                            <div class="col-md-7">
                                <div class="search-head-text">Into the world</div>
                                <div class="search-head-subtext">Lorem ipsum dolor sit amet, consectetur adipiscing
                                    elit.</div>
                                <table class="table search-card mt-1">
                                    <tbody class="search-table-body">
                                        <tr>
                                            <td>Looking for</td>
                                            <td class="d-flex">
                                                <button class="curv_cmn_btn">Talent/Crew</button>
                                                <button class="curv_cmn_btn mx-2">Organization</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Total Budget</td>
                                            <td class="aubergine">$10,000,000</td>
                                        </tr>
                                        <tr>
                                            <td>Type</td>
                                            <td class="aubergine">Start Up</td>
                                        </tr>
                                        <tr>
                                            <td>Locations</td>
                                            <td class="aubergine">Lorem ipsum</td>
                                        </tr>
                                        <tr>
                                            <td>Created by</td>
                                            <td class="aubergine">Tya6i</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="search-result-card">
                        <div class="row">
                            <div class="col-md-5">
                                <img src="{{ asset('public/images/asset/ba947a848086b8f90238636dcf7efdb5 1 (1).png') }}" class=100%
                                    width=100%>
                            </div>
                            <div class="col-md-7">
                                <div class="search-head-text">Into the world</div>
                                <div class="search-head-subtext">Lorem ipsum dolor sit amet, consectetur adipiscing
                                    elit.</div>
                                <table class="table mt-1">
                                    <tbody class="search-table-body">
                                        <tr>
                                            <td>Looking for</td>
                                            <td class="d-flex">
                                                <button class="curv_cmn_btn">Talent/Crew</button>
                                                <button class="curv_cmn_btn mx-2">Organization</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Total Budget</td>
                                            <td class="aubergine">$10,000,000</td>
                                        </tr>
                                        <tr>
                                            <td>Type</td>
                                            <td class="aubergine">Start Up</td>
                                        </tr>
                                        <tr>
                                            <td>Locations</td>
                                            <td class="aubergine">Lorem ipsum</td>
                                        </tr>
                                        <tr>
                                            <td>Created by</td>
                                            <td class="aubergine">Tya6i</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="search-result-card">
                        <div class="row">
                            <div class="col-md-5">
                                <img src="{{ asset('public/images/asset/download (3) 1.png') }}" class=100% width=100%>
                            </div>
                            <div class="col-md-7">
                                <div class="search-head-text">Into the world</div>
                                <div class="search-head-subtext">Lorem ipsum dolor sit amet, consectetur adipiscing
                                    elit.</div>
                                <table class="table mt-1">
                                    <tbody class="search-table-body">
                                        <tr>
                                            <td>Looking for</td>
                                            <td class="d-flex">
                                                <button class="curv_cmn_btn">Talent/Crew</button>
                                                <button class="curv_cmn_btn mx-2">Organization</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Total Budget</td>
                                            <td class="aubergine">$10,000,000</td>
                                        </tr>
                                        <tr>
                                            <td>Type</td>
                                            <td class="aubergine">Start Up</td>
                                        </tr>
                                        <tr>
                                            <td>Locations</td>
                                            <td class="aubergine">Lorem ipsum</td>
                                        </tr>
                                        <tr>
                                            <td>Created by</td>
                                            <td class="aubergine">Tya6i</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="public_section">
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
    @include('include.footer')
@endsection