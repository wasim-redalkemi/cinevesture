@extends('website.layouts.app',['class' => 'bg_white'])

{{-- @section('title','Cinevesture-organisation') --}}

@section('header')
@include('website.include.header')
@endsection

@section('content')

<section>
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-3">
                <div class="side-bar-cmn-part">
                <form class="pb-5" method="Get" action="{{ route('guide-view') }}">
                    @csrf
                    <div class="search-box-container">
                        <div class="search-container w-100">
                            <input type="search" name="search" value="{{request('search')}}" class="w-100 search-box" placeholder="Search...">
                            <button class="search-btn"><i class="fa fa-search"></i></button>
                        </div>
                        <div class="d-block d-md-none for_drop_img" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            <img src="{{ asset('images/asset/dropdown-sidebar.svg') }}" />
                        </div>
                    </div>
                    <div class="sidebar_collapse collapse dont-collapse-sm" id="collapseExample">
                        <div class="dropdown search-page sidebar_data_mobile">
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
                            <!-- Modal for Confirmation for account deactivate -->
                            <div class="dropend search-page search_page_filters_wrap">
                                <button class="btn dropdown-toggle w-100" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Talent Type
                                </button>
                                <div class="dropdown-menu filter_modal_wrap">
                                    <div class="filter_option_wrap">
                                        <div class="container no-padding">
                                            <div class="d-flex flex-wrap">
                                                @foreach($talent_type as $talent)
                                                <div class="mx-2 for_active">
                                                    <label class="d-flex align-items-center search_page_filters_data">
                                                        @if(isset(request('talentType')[0]) && in_array($talent->job_title, request('talentType')))
                                                        <input class="form-check-input me-1" type="checkbox" checked name="talentType[]" value="{{$talent->job_title}}">
                                                        {{$talent->job_title}}
                                                        @else
                                                        <input class="form-check-input me-1 d-none" type="checkbox" name="talentType[]" value="{{$talent->job_title}}">
                                                        {{$talent->job_title}}
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
                            <div class="form-check mt-4">
                                <input class="form-check-input" <?php if (request('verified') == '1') {
                                                                    echo 'checked';
                                                                } ?> style="border-radius: 0px;" type="checkbox" value="1" name="verified" id="flexCheckDefault">
                                <label class="verified-text mx-2" for="flexCheckDefault">
                                    Recommended Profile
                                </label>
                            </div>
                            <div class="mt-4 d-flex">
                                <input type="submit" class="filter-button watch-now-btn mt-4" Value="Apply">
                                <a href="{{route('guide-view')}}"><input type="button" class="clear-filter watch-now-btn mt-4" Value="Clear"></a>
                            </div>

                        </div>
                    </div>
                </form>
                </div>
            </div>
            <div class="col-md-9">
                <div class="profile_wraper mb-5">
                @if(count($users) >= 1)
                @foreach($users as $user)
                <div class="border_btm profile_wraper_padding my-3 my-md-0">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex">
                        <div class="">
                            <div class="user_profile_container wh_66">
                                <!-- <img src="{{ asset('images/asset/user-profile.png') }}" /> -->
                                @if(isset($user->profile_image))
                                <img src="{{Storage::url($user->profile_image)}}" width="100%"/>
                                @else
                                <img src="{{ asset('images/asset/user-profile.png') }}" width="100%" height="100%" />
                                @endif
                            </div>

                        </div>
                        <div class="mx-3">
                            <div class="d-flex align-items-center">
                                <div class="guide_profile_main_text">
                                    <a href="{{route('profile-public-show',['id'=>$user->id])}}" class="btn-link text_user_name">{{empty($user->first_name)?'Name':ucfirst($user->first_name).' '.ucfirst($user->last_name);}}</a>
                                </div>
                                @if($user->is_profile_verified == '1')<span><button class="verified_cmn_btn mx-3">
                                        <img src="{{ asset('images/asset/verified_icon.svg') }}" alt="image"> VERIFIED</button></span>@endif

                            </div>

                            <div class="posted_job_header">
                                @if(isset($user->job_title))
                                {{$user->job_title}}
                                @else
                                -
                                @endif
                            </div>
                            <div class="preview_headtext lh_54 candy-pink">
                                @if(isset($user->country))
                                {{$user->country->name}}
                                @else
                                -
                                @endif
                            </div>
                            <div class="posted_job_header Aubergine_at_night">
                                @if(isset($user->about))
                                {{$user->about}}
                                @else
                                -
                                @endif
                            </div>
                            <div class="d-flex justify-content-between mt-4">
                                <div class="">
                                    @if(isset($user->skill[0]))
                                    @foreach($user->skill as $skill)
                                    <button class="curv_cmn_btn">{{$skill->name}}</button>
                                    @endforeach
                                    @else
                                    -
                                    @endif
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="">
                            <div> <i class="fa <?php if(isset($user->isfavouriteProfile)){echo'fa-heart';}else{echo'fa-heart-o';} ?> icon-size Aubergine like-profile" style="cursor: pointer;" data-id="{{$user->id}}" aria-hidden="true"></i></div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                </div>
                {!! config('constants.NO_DATA_SEARCH') !!}
                @endif
                <div>
                    {!! $users->links() !!}
                </div>

            </div>
        </div>
</section>

@endsection

@section('footer')
@include('website.include.footer')
@endsection

@include('website.include.profilefavscript')

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