@extends('website.layouts.app',['class' => ''])

@section('title','Cinevesture-organisation')

@section('header')
@include('website.include.header')
@endsection

@section('content')
<div class="hide-me animation for_authtoast">
    @include('website.include.flash_message')
</div>
<div class="container">
    @if(request('search') != "")
    <div class="row">
        <div class="col-12 result-text">
            <section>
                {{$projects->total()}} Results found for <span class="candy-pink">"{{request('search')}}"</span>
            </section>
        </div>
    </div>
    @endif
    <section class="project_result_section">
        <div class="row mt-4">
            <div class="col-md-3 side-bar-cmn-part">
                <form class="" method="Get" action="{{ route('get-project-filter') }}">
                    <div class="d-flex">
                        <div class="search-box-container w-100">
                            <div class="search-container  w-100">
                                @csrf
                                <input type="search" value="{{request('search')}}" class="w-100 search-box" name="search" placeholder="Search...">
                                <button class="search-btn"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                        <div data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><img src="{{ asset('public/images/asset/dropdown-sidebar.svg') }}" class="d-block d-md-none for_drop_img" /></div>
                    </div>
                    <div class="sidebar_collapse collapse dont-collapse-sm" id="collapseExample">
                        <div class="sidebar_data_mobile">


        

                            <div class="search-page  mt-3 search_page_filters_wrap dropend">
                                <button type="button" class="btn dropdown-toggle w-100" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Genres
                                </button>
                                <div class="dropdown-menu filter_modal_wrap">
                                    <div class="filter_option_wrap">
                                        <div class="container no-padding">
                                            <div class="d-flex flex-wrap">
                                                @foreach($geners as $gen)
                                                <div class="mx-2">
                                                    <label class="d-flex align-items-center search_page_filters_data">
                                                        @if(isset(request('geners')[0]) && in_array($gen->id, request('geners')))
                                                        <input class="form-check-input me-1 d-none" type="checkbox" name="geners[]" checked value="{{$gen->id}}">
                                                        {{$gen->name}}
                                                        @else
                                                        <input class="form-check-input me-1 d-none d-none" type="checkbox" name="geners[]" value="{{$gen->id}}">
                                                        <div> {{$gen->name}}</div>
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
                                    Category
                                </button>
                                <!-- Modal for Category List -->

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

                                <!-- Modal for category end -->
                            </div>
                            <div class="dropend search-page search_page_filters_wrap">
                                <button class="btn dropdown-toggle w-100" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Looking for
                                </button>

                                <!-- Modal for looking List -->
                                <div class="dropdown-menu filter_modal_wrap" id="">
                                    <div class="filter_option_wrap">
                                        <div class="container no-padding">
                                            <div class="d-flex flex-wrap">
                                                @foreach($looking_for as $lok)
                                                <div class="mx-2">
                                                    <label class="d-flex align-items-center search_page_filters_data">
                                                        @if(isset(request('looking_for')[0]) && in_array($lok->id, request('looking_for')))
                                                        <input class="form-check-input me-1 d-none" type="checkbox" name="looking_for[]" checked value="{{$lok->id}}">
                                                        {{$lok->name}}
                                                        @else
                                                        <input class="form-check-input me-1 d-none" type="checkbox" name="looking_for[]" value="{{$lok->id}}">
                                                        {{$lok->name}}
                                                        @endif
                                                    </label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal for looking end -->
                            </div>
                            <div class="dropend search-page search_page_filters_wrap">
                                <button class="btn dropdown-toggle w-100" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Project Stage
                                </button>
                                <!-- Modal for project List -->
                                <div class="dropdown-menu filter_modal_wrap">
                                    <div class="filter_option_wrap">
                                        <div class="container no-padding">
                                            <div class="d-flex flex-wrap">
                                                @foreach($project_stages as $stage)
                                                <div class="mx-2">
                                                    <label class="d-flex align-items-center search_page_filters_data">
                                                        @if(isset(request('project_stages')[0]) && in_array($stage->id, request('project_stages')))
                                                        <input class="form-check-input me-1 d-none" type="checkbox" name="project_stages[]" checked value="{{$stage->id}}">
                                                        {{$stage->name}}
                                                        @else
                                                        <input class="form-check-input me-1 d-none" type="checkbox" name="project_stages[]" value="{{$stage->id}}">
                                                        {{$stage->name}}
                                                        @endif
                                                    </label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal for project end -->
                            </div>
                            <div class="dropend search-page search_page_filters_wrap">
                                <button class="btn dropdown-toggle w-100" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Country
                                </button>
                                <!-- Modal for counter List -->
                                <div class="dropdown-menu filter_modal_wrap" style="overflow: auto; background: #ffffff">
                                    <div class="filter_option_wrap">
                                        <div class="container no-padding">
                                            <div class="d-flex flex-wrap">
                                                @foreach($countries as $count)
                                                <div class="mx-2">
                                                    <label class="d-flex align-items-center search_page_filters_data">
                                                        @if(isset(request('countries')[0]) && in_array($count->id, request('countries')))
                                                        <input class="form-check-input me-1 d-none" type="checkbox" name="countries[]" checked value="{{$count->id}}">
                                                        {{$count->name}}
                                                        @else
                                                        <input class="form-check-input me-1 d-none" type="checkbox" name="countries[]" value="{{$count->id}}">
                                                        {{$count->name}}
                                                        @endif
                                                    </label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal for country end -->
                            </div>
                            <div class="dropend search-page search_page_filters_wrap">
                                <button class="btn dropdown-toggle w-100" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Language
                                </button>
                                <!-- Modal for language List -->
                                <div class="dropdown-menu filter_modal_wrap">
                                    <div class="filter_option_wrap">
                                        <div class="container no-padding">
                                            <div class="d-flex flex-wrap">
                                                @foreach($languages as $lang)
                                                <div class="mx-2">
                                                    <label class="d-flex align-items-center search_page_filters_data">
                                                        @if(isset(request('languages')[0]) && in_array($lang->id, request('languages')))
                                                        <input class="form-check-input me-1 d-none" type="checkbox" name="languages[]" checked value="{{$lang->id}}">
                                                        {{$lang->name}}
                                                        @else
                                                        <input class="form-check-input me-1 d-none" type="checkbox" name="languages[]" value="{{$lang->id}}">
                                                        {{$lang->name}}
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
                                <input class="form-check-input" <?php if (request('project_verified') == '1') {
                                                                    echo 'checked';
                                                                } ?> style="border-radius: 0px;" type="checkbox" value="1" name="project_verified" id="flexCheckDefault">
                                <label class="verified-text mx-2" for="flexCheckDefault">
                                    Verified Projects
                                </label>
                            </div>
                            <div class="mt-4 d-flex">
                                <input type="submit" class="filter-button watch-now-btn mt-4" Value="Apply">
                                <a href="{{route('get-project-filter')}}"><input type="button" class="clear-filter watch-now-btn mt-4" Value="Clear"></a>
                            </div>
                        </div>
                    </div>
                </form>
                <span class="search-head-text"> </span>
            </div>
            <div class="col-md-9 mb_3">
                @if(count($projects) >= 1)
                @foreach($projects as $project)
                <a href="{{route('public-view',['id'=>$project->id])}}" style="outline:none;text-decoration:none">
                    <div class="search-result-card my-4 my-md-0">
                        <div class="row">
                            <div class="col-md-5">
                                @if(isset($project->projectImage))
                                <div class="home_img_wrap mx_w_100 w-auto"><img src="{{Storage::url($project->projectImage->file_link)}}" class="root_img"></div>
                                @else
                                <div class="home_img_wrap mx_w_100 w-auto"><img src="{{asset('images/asset/image 3 (1).png')}}" class="root_img"></div>
                                @endif
                            </div>
                            <div class="col-md-7">
                                <div class="d-flex align-items-center">
                                    <div class="search-head-text">@if (!empty($project->project_name)){{ucFirst($project->project_name)}} @endif</div>
                                    @if ($project->project_verified==1)                                        
                                    <button class="verified-btn mx-3"> <img src="{{ asset('images/asset/verified-badge.svg') }}" width=100% alt="Image"> VERIFIED</button>
                                    @endif
                                </div>
                            
                            
                                @php
                                    $small_logline = '';
                                    if (!empty($project->logline) && strlen($project->logline)>100)
                                    {
                                        $small_logline = substr($project->logline, 0, 100).'.....';
                                    
                                    } else {
                                        $small_logline  = $project->logline;
                                    } 
                                @endphp
                                <div class="search-head-subtext">@if (isset($small_logline)){{ucFirst($small_logline)}} @endif</div>
                                <table class="table mt-1">
                                    <tbody class="search-table-body">
                                        <tr>
                                            <td>Looking for</td>
                                            <td>
                                                <div style="width: 100%">
                                                    @if(isset($project->projectLookingFor[0]))
                                                        <button class="curv_cmn_btn">{{$project->projectLookingFor[0]->name}}</button>
                                                    @endif

                                                    @if(isset($project->projectLookingFor[1]))
                                                        <button class="curv_cmn_btn">{{$project->projectLookingFor[1]->name}}</button>
                                                    @endif

                                                    @if(isset($project->projectLookingFor) && count($project->projectLookingFor)>2)
                                                        <button class="curv_cmn_btn"><b>+{{(count($project->projectLookingFor)-2)}}</b></button>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Total Budget</td>
                                            <td class="aubergine">@if (!empty($project->total_budget)){{ucFirst($project->total_budget)}} @endif</td>
                                        </tr>
                                        <tr>
                                            <td>Type</td>
                                            <td class="aubergine">@if (!empty($project->projectType->name)){{ucFirst($project->projectType->name)}} @endif</td>
                                        </tr>
                                        <tr>
                                            <td>Locations</td>
                                            <td class="aubergine">
                                                @if(isset($project->projectCountries[0]))
                                                <button class="curv_cmn_btn">{{$project->projectCountries[0]->name}}</button>
                                                @endif

                                                @if(isset($project->projectCountries[1]))
                                                    <button class="curv_cmn_btn">{{$project->projectCountries[1]->name}}</button>
                                                @endif

                                                @if(isset($project->projectCountries) && count($project->projectCountries)>2)
                                                    <button class="curv_cmn_btn"><b>+{{(count($project->projectCountries)-2)}}</b></button>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Created by</td>
                                            <td class="aubergine">@if (!empty($project->user->name)){{ucwords($project->user->name)}} @endif</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
                @else
                <div class="not-found-text">
                    <p>No Project Found</p>
                </div>
                @endif
                <div>
                    {!! $projects ->links() !!}
                </div>

    </section>
</div>
@endsection

@section('footer')
@include('website.include.footer')
@endsection


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