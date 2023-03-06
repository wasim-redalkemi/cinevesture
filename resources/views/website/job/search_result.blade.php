@extends('website.layouts.app',['class' => 'bg_white'])

{{-- @section('title','Cinevesture-organisation') --}}

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
            <div class="col-md-3">
                <div class="side-bar-cmn-part">
                <form method="post" class="mb-0 mb-md-5" action="{{ route('showJobSearchResults') }}">
                    @csrf
                    <div class="search-box-container">
                        <div class="search-container w-100">
                            <input type="search" class="w-100 search-box" name="search" value="{{request('search')}}" placeholder="Search...">
                            <button class="search-btn"><i class="fa fa-search"></i></button>
                        </div>
                        <div class="d-block d-md-none for_drop_img" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            <img src="{{ asset('images/asset/dropdown-sidebar.svg') }}" />
                        </div>
                    </div>
                    <div class="sidebar_collapse collapse dont-collapse-sm prevent_hide" id="collapseExample">
                        <div class="sidebar_data_mobile">
                            {{-- <div class="dropend search-page search_page_filters_wrap mt-0 mt-md-3">
                                <button class="btn dropdown-toggle w-100" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Category
                                </button>
                                
                                <div class="dropdown-menu filter_modal_wrap">
                                    <div class="filter_option_wrap">
                                        <div class="container no-padding">
                                            <div class="d-flex flex-wrap">
                                                @foreach($categories as $cat)
                                                @php
                                                    $is_elem_ex = false;
                                                    if(in_array('categories',array_keys($prevDataReturn)) && !empty($prevDataReturn['categories']) && in_array($cat->id,$prevDataReturn['categories'])){
                                                        $is_elem_ex = true;
                                                    }
                                                @endphp
                                                <div class="mx-2 for_active">
                                                    <label class="d-flex align-items-center search_page_filters_data @if($is_elem_ex) search_page_filters_data_active @endif">
                                                        <input class="form-check-input me-1 d-none" type="checkbox" name="categories[]" @if($is_elem_ex) checked @endif value="{{$cat->id}}">
                                                        {{$cat->name}}
                                                    </label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="dropend search-page search_page_filters_wrap">
                                <button class="btn dropdown-toggle w-100" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Employments
                                </button>
                                <div class="dropdown-menu filter_modal_wrap">
                                    <div class="filter_option_wrap">
                                        <div class="container no-padding">
                                            <div class="d-flex flex-wrap">
                                                @foreach($employments as $employment)
                                                @php
                                                    $is_elem_ex = false;
                                                    if(in_array('employments',array_keys($prevDataReturn)) && !empty($prevDataReturn['employments']) && in_array($employment->id,$prevDataReturn['employments'])){
                                                        $is_elem_ex = true;
                                                    }
                                                @endphp
                                                <div class="mx-2 for_active">
                                                    <label class="d-flex align-items-center search_page_filters_data  @if($is_elem_ex) search_page_filters_data_active @endif">
                                                        <input class="form-check-input me-1 d-none" type="checkbox" @if($is_elem_ex) checked @endif name="employments[]" value="{{$employment->id}}">
                                                        {{$employment->name}}
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
                                    Location
                                </button>
                                <div class="dropdown-menu filter_modal_wrap">
                                    <div class="filter_option_wrap">
                                        <div class="container no-padding">
                                            <div class="d-flex flex-wrap">
                                                @foreach($countries as $country)
                                                @php
                                                    $is_elem_ex = false;
                                                    if (in_array('countries',array_keys($prevDataReturn)) && !empty($prevDataReturn['countries']) && in_array($country->id,$prevDataReturn['countries'])) {
                                                        $is_elem_ex = true;
                                                    }
                                                @endphp
                                                <div class="mx-2 for_active">
                                                    <label class="d-flex align-items-center search_page_filters_data 
                                                    @if($is_elem_ex)search_page_filters_data_active @endif">
                                                        <input class="form-check-input me-1 d-none" type="checkbox"
                                                         name="countries[]" @if ($is_elem_ex) checked @endif
                                                          value="{{$country->id}}">
                                                        {{$country->name}}
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
                                    Workspace Type
                                </button>
                                <div class="dropdown-menu filter_modal_wrap">
                                    <div class="filter_option_wrap">
                                        <div class="container no-padding">
                                            <div class="d-flex flex-wrap">
                                                @foreach($workspaces as $workspace)
                                                @php
                                                    $is_elem_ex = false;
                                                    if (in_array('workspaces',array_keys($prevDataReturn)) && !empty($prevDataReturn['workspaces']) && in_array($workspace->id,$prevDataReturn['workspaces'])) {
                                                        $is_elem_ex = true;
                                                    }
                                                @endphp
                                                <div class="mx-2 for_active">
                                                    <label class="d-flex align-items-center search_page_filters_data @if($is_elem_ex)search_page_filters_data_active @endif">
                                                        <input class="form-check-input me-1 d-none" type="checkbox" @if ($is_elem_ex) checked @endif name="workspaces[]" value="{{$workspace->id}}">
                                                        {{$workspace->name}}
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
                                                @php
                                                    $is_elem_ex = false;
                                                    if (in_array('skills',array_keys($prevDataReturn)) && !empty($prevDataReturn['skills']) && in_array($skill->id,$prevDataReturn['skills'])) {
                                                        $is_elem_ex = true;
                                                    }
                                                @endphp
                                                <div class="mx-2 for_active">
                                                    <label class="d-flex align-items-center search_page_filters_data @if($is_elem_ex)search_page_filters_data_active @endif">
                                                        <input class="form-check-input me-1 d-none" type="checkbox" @if ($is_elem_ex) checked @endif name="skills[]" value="{{$skill->id}}">
                                                        {{$skill->name}}
                                                    </label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-check  mt-3 mt-md-4">
                                <input class="form-check-input " type="checkbox" name="promoted_jobs" value="1"  id="flexCheckDefault" @if($promoteCheck)checked @endif>
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
            </div>
            <div class="col-md-9">
                @include('website.components.search_jobtile')
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
