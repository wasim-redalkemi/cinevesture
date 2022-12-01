@extends('website.layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-organisation')

@section('header')
@include('website.include.header')
@endsection

@section('content')

<section>
    <div class="container">      
        <div class="row mt-4">
        <!-- <div class="col-md-12"> -->
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            <!-- </div> -->
            <div class="col-md-3 side-bar-cmn-part">
                <form method="post" action="{{ route('showJobSearchResults') }}">
                    @csrf
                    <div class="search-box-container">
                        <div class="search-container w-100">
                            <input type="search" class="w-100 search-box" value="{{request('search')}}" placeholder="Search...">
                            <button class="search-btn"></button>
                        </div>
                        <div class="d-block d-md-none m-2" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            <img src="{{ asset('public/images/asset/dropdown-sidebar.svg') }}" />
                            </div> 
                    </div>
                    <div class="sidebar_collapse collapse dont-collapse-sm" id="collapseExample">
                    <div class="sidebar_data_mobile">
                    <div class="dropdown search-page">
                        <button class="btn dropdown-toggle w-100" type="button" data-bs-toggle="modal" data-bs-target="#categories-list">
                            Categories
                        </button>
                        @include('website.modal.categories')
                    </div>
                    <div class="dropdown search-page">
                        <button class="btn dropdown-toggle w-100" type="button" data-bs-toggle="modal" data-bs-target="#employments-list">
                            Employments
                        </button>
                        @include('website.modal.employments')
                    </div>
                    <div class="dropdown search-page">
                        <button class="btn dropdown-toggle w-100" type="button" data-bs-toggle="modal" data-bs-target="#locations-list">
                            Location
                        </button>
                        @include('website.modal.locations')
                    </div>
                    <div class="dropdown search-page">
                        <button class="btn dropdown-toggle w-100" type="button" data-bs-toggle="modal" data-bs-target="#workspaces-list">
                            Workspace Type
                        </button>
                        @include('website.modal.workspaces')
                    </div>
                    <div class="dropdown search-page">
                        <button class="btn dropdown-toggle w-100" type="button" data-bs-toggle="modal" data-bs-target="#skills-list">
                            Skills
                        </button>
                        @include('website.modal.skills')
                    </div>
                    <div class="form-check d-flex align-items-center mt-4">
                        <input class="form-check-input" type="checkbox" id="flexCheckDefault">
                        <label class="verified-text mx-2" for="flexCheckDefault">
                            Verified Projects
                        </label>
                    </div>
                    <div class="mt-4 d-flex">
                        <input type="submit" class="filter-button watch-now-btn mt-4" Value="Apply">
                        <a href="{{route('showJobSearchResults')}}"><input type="button" class="clear-filter watch-now-btn mt-4" Value="Clear"></a>
                    </div>
                    </div>
                    </div>
                </form>
            </div>
            <div class="col-md-9">
                @include('website.components.jobtile')                   
            </div>
        </div>


        <!-- <div class="public_section mb-5">
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
        </div> -->
    </div>
</section>

@endsection

@section('footer')
@include('website.include.footer')
@endsection

@include('website.job.favscript')