@extends('website.layouts.app',['class' => ''])

{{-- @section('title','Cinevesture-organisation') --}}

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
            <div class="col-md-3">
                <div class="side-bar-cmn-part h-auto">
                <form class="pb-0 pb-md-5" method="Get" action="{{ route('get-project-filter') }}">
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
                    <div class="sidebar_collapse collapse dont-collapse-sm prevent_hide" id="collapseExample">
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
                                                @php
                                                $is_elem_ex = false;
                                                if(in_array('geners',array_keys($prevDataReturn)) && !empty($prevDataReturn['geners']) && in_array($gen->id,$prevDataReturn['geners'])){
                                                    $is_elem_ex = true;
                                                }
                                                @endphp
                                                <div class="mx-2">
                                                    <label class="d-flex align-items-center search_page_filters_data @if($is_elem_ex) search_page_filters_data_active @endif">
                                                        <input class="form-check-input me-1 d-none" type="checkbox" name="geners[]"  @if($is_elem_ex) checked @endif value="{{$gen->id}}">
                                                        {{$gen->name}}
                                                        
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
                                                @php
                                                $is_elem_ex = false;
                                                if(in_array('looking_for',array_keys($prevDataReturn)) && !empty($prevDataReturn['looking_for']) && in_array($lok->id,$prevDataReturn['looking_for'])){
                                                    $is_elem_ex = true;
                                                }
                                                @endphp
                                                <div class="mx-2">
                                                    <label class="d-flex align-items-center search_page_filters_data @if($is_elem_ex) search_page_filters_data_active @endif">
                                                        <input class="form-check-input me-1 d-none" type="checkbox" name="looking_for[]" @if($is_elem_ex) checked @endif value="{{$lok->id}}">
                                                        {{$lok->name}}
                                                     
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
                                                @php
                                                $is_elem_ex = false;
                                                if(in_array('project_stages',array_keys($prevDataReturn)) && !empty($prevDataReturn['project_stages']) && in_array($stage->id,$prevDataReturn['project_stages'])){
                                                    $is_elem_ex = true;
                                                }
                                                @endphp
                                                <div class="mx-2">
                                                    <label class="d-flex align-items-center search_page_filters_data @if($is_elem_ex) search_page_filters_data_active @endif">
                                                        <input class="form-check-input me-1 d-none" type="checkbox" name="project_stages[]" @if($is_elem_ex) checked @endif value="{{$stage->id}}">
                                                        {{$stage->name}}
                                                       
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
                                <div class="dropdown-menu filter_modal_wrap">
                                    <div class="filter_option_wrap">
                                        <div class="container no-padding">
                                            <div class="d-flex flex-wrap">
                                                @foreach($countries as $count)
                                                @php
                                                $is_elem_ex = false;
                                                if(in_array('countries',array_keys($prevDataReturn)) && !empty($prevDataReturn['countries']) && in_array($count->id,$prevDataReturn['countries'])){
                                                    $is_elem_ex = true;
                                                }
                                                @endphp
                                                <div class="mx-2">
                                                    <label class="d-flex align-items-center search_page_filters_data @if($is_elem_ex) search_page_filters_data_active @endif">
                                                        <input class="form-check-input me-1 d-none" type="checkbox" name="countries[]" @if($is_elem_ex) checked @endif value="{{$count->id}}">
                                                        {{$count->name}}
                                                     
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
                                                @php
                                                $is_elem_ex = false;
                                                if(in_array('languages',array_keys($prevDataReturn)) && !empty($prevDataReturn['languages']) && in_array($lang->id,$prevDataReturn['languages'])){
                                                    $is_elem_ex = true;
                                                }
                                                @endphp 
                                                <div class="mx-2">
                                                    <label class="d-flex align-items-center search_page_filters_data @if($is_elem_ex) search_page_filters_data_active @endif">
                                                        <input class="form-check-input me-1 d-none" type="checkbox" name="languages[]" @if($is_elem_ex) checked @endif value="{{$lang->id}}">
                                                        {{$lang->name}}
                                                   
                                                    </label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-check mt-4">
                                <input class="form-check-input" <?php if (request('project_verified') == '1') {
                                                                    echo 'checked';
                                                                } ?> style="border-radius: 0px;" type="checkbox" value="1" name="project_verified" id="flexCheckDefault">
                                <label class="verified-text mx-2" for="flexCheckDefault">
                                    Verified Projects
                                </label>
                            </div>
                            <div class="mt-4 d-flex justify-content-between align-items-center">
                                <input type="submit" class="filter-button watch-now-btn mt-4" Value="Apply">
                                <a href="{{route('get-project-filter')}}"><input type="button" class="clear-filter-btn mt-4" Value="Clear"></a>
                            </div>
                        </div>
                    </div>
                </form>
                <span class="search-head-text"> </span>
                </div>
            </div>
            <div class="col-md-9 mb_3">
                <div class="white mb-2 mt-2 mt-md-0">{{($projects->total())}} Results Founds</div>
                @if(count($projects) >= 1)
                @foreach($projects as $project)
                <a href="{{route('public-view',['id'=>$project->id])}}" style="outline:none;text-decoration:none">
                    <div class="search-result-card my-2 my-md-0">
                        <div class="row">
                            <div class="col-md-5">
                                @if(isset($project->projectImage))
                                <div class="project_img_wrap mx_w_100 w-auto"><img src="{{Storage::url($project->projectImage->file_link)}}" style="z-index: 0;" class="Other_root_img"></div>
                                @else
                                <div class="project_img_wrap mx_w_100 w-auto"><img src="{{asset('images/asset/image 3 (1).png')}}" style="z-index: 0;" class="Other_root_img"></div>
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
                                <div class="search-head-subtext">@if (isset($small_logline))@php
                                    echo ucFirst($small_logline)
                                @endphp  @endif</div>
                                <table class="table mt-1 lookingfor_table_width">
                                    <tbody class="search-table-body">
                                        <tr>
                                            <td>Looking For</td>
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
                                        @if (!empty($project->total_budget))
                                        <tr>
                                            <td>Total Budget</td>
                                            <td class="aubergine">@if (!empty($project->total_budget)){{'$'.number_format($project->total_budget, 0,'.',',')}} @endif</td>
                                        </tr>
                                        @endif
                                       
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
                                            <td>Created By</td>
                                            @if (isset($project->organisation) && !empty($project->organisation))
                                                <td class="aubergine">{{ucwords($project->organisation->name)}}</td>
                                            @else
                                            <td class="aubergine">@if (!empty($project->user->name)){{ucwords($project->user->name)}} @endif</td>
                                                
                                            @endif
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
                @else
                {!! config('constants.NO_DATA_SEARCH') !!}
                @endif
                <div>
                    {!! $projects->onEachSide(0)->links() !!}
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