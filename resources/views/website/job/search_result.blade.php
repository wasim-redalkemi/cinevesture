@extends('website.layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-organisation')

@section('header')
@include('website.include.header')
@endsection

@section('content')

<section>
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-3 side-bar-cmn-part">
                <form method="post" action="{{ route('showJobSearchResults') }}">
                    @csrf 
                    <div class ="search-box-container">
                        <div class="search-container">
                        <input type="search" class="w-100 search-box" value="{{request('search')}}" placeholder="Search...">
                        <button class="search-btn"></button>
                        </div>                        
                    </div>
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
                    <div class="mt-4">
                        <input type="submit" class="filter-button watch-now-btn mt-4" Value="Apply">
                        <a href="{{route('showJobSearchResults')}}"><input type="button" class="clear-filter watch-now-btn mt-4" Value="Clear"></a>
                    </div>
                </form>
            </div>
            <div class="col-md-9">
                @foreach($jobs as $job)
                <div class="profile_wraper profile_wraper_padding">
                    <div class="d-flex justify-content-between">
                        <div class="guide_profile_main_text">
                           {{$job->title}}
                        </div>
                        <div class="pointer"><i class="fa fa-heart-o aubergine icon-size" aria-hidden="true"></i></div>
                    </div>
                  
                    <div class="preview_headtext lh_54 candy-pink">
                       {{$job->company_name}}-{{$job->jobLocation->name}}
                    </div>
                    <div class="posted_job_header Aubergine_at_night">
                    {{$job->description}}
                    </div>
                    <div class="d-flex justify-content-between mt-4">
                        <div class="d-flex">
                            @foreach($job->jobSkills as $skill)
                            <button class="curv_cmn_btn">{{$skill->name}}</button>
                            @endforeach
                        </div>
                        <div>
                            <button class="guide_profile_btn">Apply now</button>
                        </div>
                    </div>
                </div>
                @endforeach


                @if(blank($jobs))

                <div class="text-center">
                    <h1>No jobs found, please modify your search</h1>
                </div>

                @endif

                {{$jobs->links()}}
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

@push('scripts')
$(document).ready(function(){
    
});
@endpush