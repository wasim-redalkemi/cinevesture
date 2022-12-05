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
        <section>
            <div class="row mt-4">
                <div class="col-md-3 side-bar-cmn-part">
                    <form class="" method="Get" action="{{ route('get-project-filter') }}">
                        <div class="d-flex">
                    <div class="search-box-container w-100">
                        @csrf
                            <input type="search" value="{{request('search')}}" class="w-100 search-box" name="search" placeholder="Search...">
                            <button class="search-btn"></button>
                        </div>
                        <div data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><img src="{{ asset('public/images/asset/dropdown-sidebar.svg') }}" class="d-block d-md-none mt-1" /></div>
                </div>
                <div class="sidebar_collapse collapse dont-collapse-sm" id="collapseExample">
                   <div class=" sidebar_data_mobile">
                    <div class="dropdown search-page mt-3">
                        <button class="btn dropdown-toggle w-100" type="button" data-bs-toggle="modal" data-bs-target="#gener-list"
                            aria-expanded="false">
                            Genres
                        </button>

                    <!-- Modal for Geners List -->
                    <div class="modal fade" id="gener-list" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered filter_modal_wrap">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <section class="filter_option_wrap">
                                        <div class="container no-padding">
                                            <div class="row">
                                                @foreach($geners as $gen)
                                                <div class="col-md-4 filter_options">
                                                    <label class="list-group-item">
                                                        @if(isset(request('geners')[0]) && in_array($gen->id, request('geners')))
                                                        <input class="form-check-input me-1" type="checkbox" name="geners[]" checked value="{{$gen->id}}">
                                                        {{$gen->name}}
                                                        @else
                                                        <input class="form-check-input me-1" type="checkbox" name="geners[]" value="{{$gen->id}}">
                                                        {{$gen->name}}
                                                        @endif
                                                    </label>
                                                </div>
                                                @endforeach
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <button type="button" class="btn btn-sm modal-close-filter" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal for Geners end -->

                    </div>
                    <div class="dropdown search-page">
                        <button class="btn dropdown-toggle w-100" type="button" data-bs-toggle="modal" data-bs-target="#category-list"
                            aria-expanded="false">
                            Catagory
                        </button>

                    <!-- Modal for Category List -->
                    <div class="modal fade" id="category-list" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered filter_modal_wrap">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <section class="filter_option_wrap">
                                        <div class="container no-padding">
                                            <div class="row">
                                                @foreach($categories as $cat)
                                                <div class="col-md-4 filter_options">
                                                    <label class="list-group-item">
                                                        @if(isset(request('categories')[0]) && in_array($cat->id, request('categories')))
                                                        <input class="form-check-input me-1" type="checkbox" name="categories[]" checked value="{{$cat->id}}">
                                                        {{$cat->name}}
                                                        @else
                                                        <input class="form-check-input me-1" type="checkbox" name="categories[]" value="{{$cat->id}}">
                                                        {{$cat->name}}
                                                        @endif
                                                    </label>
                                                </div>
                                                @endforeach
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <button type="button" class="btn btn-sm modal-close-filter" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal for category end -->
                    </div>
                    <div class="dropdown search-page">
                        <button class="btn dropdown-toggle w-100" type="button" data-bs-toggle="modal" data-bs-target="#lookingfor-list"
                            aria-expanded="false">
                            Looking for
                        </button>

                    <!-- Modal for Category List -->
                    <div class="modal fade" id="lookingfor-list" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered filter_modal_wrap">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <section class="filter_option_wrap">
                                        <div class="container no-padding">
                                            <div class="row">
                                                @foreach($looking_for as $lok)
                                                <div class="col-md-4 filter_options">
                                                    <label class="list-group-item">
                                                        @if(isset(request('looking_for')[0]) && in_array($lok->id, request('looking_for')))
                                                        <input class="form-check-input me-1" type="checkbox" name="looking_for[]" checked value="{{$lok->id}}">
                                                        {{$lok->name}}
                                                        @else
                                                        <input class="form-check-input me-1" type="checkbox" name="looking_for[]" value="{{$lok->id}}">
                                                        {{$lok->name}}
                                                        @endif
                                                    </label>
                                                </div>
                                                @endforeach
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <button type="button" class="btn btn-sm modal-close-filter" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal for category end -->
                    </div>
                    <div class="dropdown search-page">

                        <button class="btn dropdown-toggle w-100" type="button" data-bs-toggle="modal" data-bs-target="#stage-list"
                            aria-expanded="false">
                            Project Stage
                        </button>

                    <!-- Modal for Category List -->
                    <div class="modal fade" id="stage-list" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered filter_modal_wrap">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <section class="filter_option_wrap">
                                        <div class="container no-padding">
                                            <div class="row">
                                                @foreach($project_stages as $stage)
                                                <div class="col-md-4 filter_options">
                                                    <label class="list-group-item">
                                                        @if(isset(request('project_stages')[0]) && in_array($stage->id, request('project_stages')))
                                                        <input class="form-check-input me-1" type="checkbox" name="project_stages[]" checked value="{{$stage->id}}">
                                                        {{$stage->name}}
                                                        @else
                                                        <input class="form-check-input me-1" type="checkbox" name="project_stages[]" value="{{$stage->id}}">
                                                        {{$stage->name}}
                                                        @endif
                                                    </label>
                                                </div>
                                                @endforeach
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <button type="button" class="btn btn-sm modal-close-filter" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal for category end -->
                    </div>
                    <div class="dropdown search-page">
                        <button class="btn dropdown-toggle w-100" type="button" data-bs-toggle="modal" data-bs-target="#country-list"
                            aria-expanded="false">
                            Country
                        </button>

                    <!-- Modal for Category List -->
                    <div class="modal fade" id="country-list" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered filter_modal_wrap">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <section class="filter_option_wrap">
                                        <div class="container no-padding">
                                            <div class="row">
                                                @foreach($countries as $count)
                                                <div class="col-md-4 filter_options">
                                                    <label class="list-group-item">
                                                        @if(isset(request('countries')[0]) && in_array($count->id, request('countries')))
                                                        <input class="form-check-input me-1" type="checkbox" name="countries[]" checked value="{{$count->id}}">
                                                        {{$count->name}}
                                                        @else
                                                        <input class="form-check-input me-1" type="checkbox" name="countries[]" value="{{$count->id}}">
                                                        {{$count->name}}
                                                        @endif
                                                    </label>
                                                </div>
                                                @endforeach
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <button type="button" class="btn btn-sm modal-close-filter" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal for category end -->
                    </div>
                    <div class="dropdown search-page">
                        <button class="btn dropdown-toggle w-100" type="button" data-bs-toggle="modal" data-bs-target="#language-list"
                            aria-expanded="false">
                            Language
                        </button>

                    <!-- Modal for Category List -->
                    <div class="modal fade" id="language-list" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered filter_modal_wrap">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <section class="filter_option_wrap">
                                        <div class="container no-padding">
                                            <div class="row">
                                                @foreach($languages as $lang)
                                                <div class="col-md-4 filter_options">
                                                    <label class="list-group-item">
                                                        @if(isset(request('languages')[0]) && in_array($lang->id, request('languages')))
                                                        <input class="form-check-input me-1" type="checkbox" name="languages[]" checked value="{{$lang->id}}">
                                                        {{$lang->name}}
                                                        @else
                                                        <input class="form-check-input me-1" type="checkbox" name="languages[]" value="{{$lang->id}}">
                                                        {{$lang->name}}
                                                        @endif
                                                    </label>
                                                </div>
                                                @endforeach
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <button type="button" class="btn btn-sm modal-close-filter" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal for category end -->
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
                <div class="col-md-9">
                @if(count($projects) >= 1)
                @foreach($projects as $project)
                <a href ="{{route('public-view',['id'=>$project->id])}}" style="outline:none;text-decoration:none">
                    <div class="search-result-card">
                        <div class="row">
                            <div class="col-md-5">
                                @if(isset($project->projectImage))
                                <img src="{{Storage::url($project->projectImage->file_link)}}" class=100% width=100%>
                                @else
                                <img src="{{asset('images/asset/indy 7.png')}}" class=100% width=100%>
                                @endif
                            </div>
                            <div class="col-md-7">
                                <div class="search-head-text">{{$project->project_name}}</div>
                                <div class="search-head-subtext">{{$project->synopsis}}</div>
                                <table class="table mt-1">
                                    <tbody class="search-table-body">
                                        <tr>
                                            <td>Looking for</td>
                                            <td>
                                                <div style="width: 100%">
                                                    @if(isset($project->projectLookingFor[0]))
                                                        @foreach($project->projectLookingFor as $look)
                                                            <button class="curv_cmn_btn">{{$look->name}}</button>
                                                        @endforeach
                                                    @else
                                                        -
                                                    @endif
                                                </div>                                       
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Total Budget</td>
                                            <td class="aubergine">{{$project->total_budget}}</td>
                                        </tr>
                                        <tr>
                                            <td>Type</td>
                                            <td class="aubergine">{{$project->projectType->name}}</td>
                                        </tr>
                                        <tr>
                                            <td>Locations</td>
                                            <td class="aubergine">
                                            @if(isset($project->projectCountries[0]))
                                                    @foreach($project->projectCountries as $country)
                                                    <button class="curv_cmn_btn">{{$country->name}}</button>
                                                    @endforeach
                                                 @else
                                                 -
                                                
                                                 @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Created by</td>
                                            <td class="aubergine">{{$project->user->name}}</td>
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
                    {!! $projects   ->links() !!}
                </div>
                
        </section>
    </div>
@endsection

@section('footer')
@include('website.include.footer')
@endsection