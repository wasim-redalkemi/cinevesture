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
                            <button class="search-btn"><i class="fa fa-search"></i></button>
                        </div>
                        <div class="d-block d-md-none m-2" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            <img src="{{ asset('images/asset/dropdown-sidebar.svg') }}" />
                        </div>
                    </div>
                    <div class="sidebar_collapse collapse dont-collapse-sm" id="collapseExample">
                        <div class="sidebar_data_mobile">
                            <div class="dropend search-page search_page_filters_wrap mt-2">
                                <button class="btn dropdown-toggle w-100" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Category
                                </button>
                                <div class="dropdown-menu filter_modal_wrap">
                                    <div class="filter_option_wrap">
                                        <div class="container no-padding">
                                            <div class="d-flex flex-wrap">
                                                @foreach($categories as $cat)
                                                <div class="mx-2 for_active">
                                                    <label class="d-flex align-items-center search_page_filters_data">
                                                        @if(isset(request('categories')[0]) && in_array($cat->id, request('categories')))
                                                        <input class="form-check-input me-1 d-none" type="checkbox" name="categories[]" checked value="{{$cat->id}}">
                                                        {{$cat->name}}
                                                        @else
                                                        <input class="form-check-input me-1 d-none" type="checkbox" name="categories[]" value="{{$cat->id}}">
                                                        {{$cat->name}}
                                                        @endif
                                                    </label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="dropend search-page search_page_filters_wrap mt-2">
                                <button class="btn dropdown-toggle w-100" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Employments
                                </button>
                                <div class="dropdown-menu filter_modal_wrap">
                                    <div class="filter_option_wrap">
                                        <div class="container no-padding">
                                            <div class="d-flex flex-wrap">
                                                @foreach($employments as $employment)

                                                <div class="mx-2 for_active">
                                                    <label class="d-flex align-items-center search_page_filters_data">

                                                        @if(isset(request('employments')[0]) && in_array($employment->id, request('employments')))
                                                        <input class="form-check-input me-1 d-none" type="checkbox" checked name="employments[]" value="{{$employment->id}}">
                                                        {{$employment->name}}
                                                        @else
                                                        <input class="form-check-input me-1 d-none" type="checkbox" name="employments[]" value="{{$employment->id}}">
                                                        {{$employment->name}}
                                                        @endif
                                                    </label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="dropend search-page search_page_filters_wrap mt-2">
                                <button class="btn dropdown-toggle w-100" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Location
                                </button>
                                <div class="dropdown-menu filter_modal_wrap">
                                    <div class="filter_option_wrap">
                                        <div class="container no-padding">
                                            <div class="d-flex flex-wrap">
                                                @foreach($countries as $country)
                                                <div class="mx-2 for_active">
                                                    <label class="d-flex align-items-center search_page_filters_data">
                                                        @if(isset(request('countries')[0]) && in_array($country->id, request('countries')))
                                                        <input class="form-check-input me-1 d-none" type="checkbox" name="countries[]" checked value="{{$country->id}}">
                                                        {{$country->name}}
                                                        @else
                                                        <input class="form-check-input me-1 d-none" type="checkbox" name="countries[]" value="{{$country->id}}">
                                                        {{$country->name}}
                                                        @endif
                                                    </label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="dropend search-page search_page_filters_wrap mt-2">
                                <button class="btn dropdown-toggle w-100" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Workspace Type
                                </button>
                                <div class="dropdown-menu filter_modal_wrap">
                                    <div class="filter_option_wrap">
                                        <div class="container no-padding">
                                            <div class="d-flex flex-wrap">
                                                @foreach($workspaces as $workspace)

                                                <div class="mx-2 for_active">
                                                    <label class="d-flex align-items-center search_page_filters_data">

                                                        @if(isset(request('workspaces')[0]) && in_array($workspace->id, request('workspaces')))
                                                        <input class="form-check-input me-1 d-none" type="checkbox" checked name="workspaces[]" value="{{$workspace->id}}">
                                                        {{$workspace->name}}
                                                        @else
                                                        <input class="form-check-input me-1 d-none" type="checkbox" name="workspaces[]" value="{{$workspace->id}}">
                                                        {{$workspace->name}}
                                                        @endif
                                                    </label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="dropend search-page search_page_filters_wrap">
                                <button class="btn dropdown-toggle w-100" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Skills
                                </button>
                                <!-- Modal for Category List -->

                                <div class="dropdown-menu filter_modal_wrap">
                                    <div class="filter_option_wrap">
                                        <div class="container no-padding">
                                            <div class="d-flex flex-wrap">
                                                @foreach($skills as $skill)

                                                <div class="mx-2 for_active">
                                                    <label class="d-flex align-items-center search_page_filters_data">

                                                        @if(isset(request('skills')[0]) && in_array($skill->id, request('skills')))
                                                        <input class="form-check-input me-1 d-none" type="checkbox" checked name="skills[]" value="{{$skill->id}}">
                                                        {{$skill->name}}
                                                        @else
                                                        <input class="form-check-input me-1 d-none" type="checkbox" name="skills[]" value="{{$skill->id}}">
                                                        {{$skill->name}}
                                                        @endif
                                                    </label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-check d-flex align-items-center mt-4">
                                <input class="form-check-input" type="checkbox" name="promoted_jobs" value="1"  id="flexCheckDefault">
                                <label class="verified-text mx-2" for="flexCheckDefault">
                                    Promoted Jobs
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


    </div>
</section>

@endsection

@section('footer')
@include('website.include.footer')
@endsection

@include('website.job.favscript')

@push('scripts')
<script>
    $('.form-check-input').change(function() {
        if ($(this).is(":checked")) {
            $(this).parents('label').addClass('search_page_filters_data_active');
        } else {
            $(this).parents('label').removeClass('search_page_filters_data_active');
        }
    });

    $(".side-bar-cmn-part").collapse("hide");
</script>
@endpush
