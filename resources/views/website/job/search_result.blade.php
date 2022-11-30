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
                @foreach($jobs as $job)
                <div class="profile_wraper profile_wraper_padding">
                    <div class="d-flex justify-content-between">
                        <div class="guide_profile_main_text">
                            {{$job->title}}
                        </div>
                        <div class="pointer fav-icon">
                            <i data-id="{{$job->id}}" class="fa {{is_null($job->favorite) ? 'fa-heart-o' : 'fa-heart'}} aubergine icon-size" aria-hidden="true"></i>
                        </div>
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
                            @if(is_null($job->applied))
                            <a href="{{route('showApplyJob',['jobId'=>$job->id])}}" class="guide_profile_btn">Apply now</a>
                            @else
                            <button disabled class="guide_profile_btn">Applied</button>
                            @endif
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

<script>
    $(".fav-icon .aubergine").on('click', function() {

        try {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var jobId = $(this).attr('data-id')
            var classList = $(this).attr('class').split(/\s+/);
            var $elem = $(this);
            $.ajax({
                type: 'post',
                data: {
                    'job_id': jobId
                },
                url: "{{route('addJobToFavList')}}",
                success: function(resp) {
                    if (resp.status) {
                        $elem.toggleClass("fa-heart-o fa-heart");
                        toastMessage(1, resp.message);
                    } else {
                        toastMessage("error", resp.message);
                    }
                },
                error: function(error) {
                    toastMessage("error", "something went wrong, please try again.");
                }
            });
        } catch (error) {
            toastMessage("error", "something went wrong, please try again.");
        }

    });
</script>

@endpush