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
                <form class="" method="Get" action="{{ route('guide-view') }}">
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
                        <button class="btn dropdown-toggle w-100" type="button" data-bs-toggle="modal" data-bs-target="#locations-list">
                            Location
                        </button>
                    @include('website.modal.locations')
                        <!-- Modal for Confirmation for account deactivate -->

                        <div class="dropdown search-page">
                            <button class="btn dropdown-toggle w-100" type="button" data-bs-toggle="modal" data-bs-target="#talent-type" aria-expanded="false">
                                Talent Type
                            </button>
                            <!-- Modal for Loactions List -->
                            <div class="modal fade" id="talent-type" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered filter_modal_wrap">
                                    <div class="modal-content">
                                        <div class="modal-body" style="padding: 0px;">
                                            <section>
                                                <div class="container" style="padding: 0px;">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="modal_container filter_wrap">
                                                                <div class="list-group-my" style="justify-content: center;">
                                                                    <div class="row">
                                                                        @foreach($talent_type as $talent)
                                                                        <div class="col-md-4">
                                                                            <label class="list-group-item filter_options">
                                                                                @if(isset(request('talentType')[0]) && in_array($talent->job_title, request('talentType')))
                                                                                <input class="form-check-input me-1" type="checkbox" checked name="talentType[]" value="{{$talent->job_title}}">
                                                                                {{$talent->job_title}}
                                                                                @else
                                                                                <input class="form-check-input me-1" type="checkbox" name="talentType[]" value="{{$talent->job_title}}">
                                                                                {{$talent->job_title}}
                                                                                @endif
                                                                            </label>
                                                                        </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                                <button type="button" class="btn modal-close-filter" data-bs-dismiss="modal">Close</button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="dropdown search-page">
                            <button class="btn dropdown-toggle w-100" type="button" data-bs-toggle="modal" data-bs-target="#skills" aria-expanded="false">
                                Skills
                            </button>
                            <!-- Modal for Loactions List -->
                            <div class="modal fade" id="skills" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-body" style="padding: 0px;">
                                            <section>
                                                <div class="container" style="padding: 0px;">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="modal_container">
                                                                <div class="list-group">
                                                                    @foreach($skills as $skill)
                                                                    <label class="list-group-item">

                                                                        @if(isset(request('skills')[0]) && in_array($skill->id, request('skills')))
                                                                        <input class="form-check-input me-1" type="checkbox" checked name="skills[]" value="{{$skill->id}}">
                                                                        {{$skill->name}}
                                                                        @else
                                                                        <input class="form-check-input me-1" type="checkbox" name="skills[]" value="{{$skill->id}}">
                                                                        {{$skill->name}}
                                                                        @endif
                                                                    </label>
                                                                    @endforeach

                                                                </div>
                                                                <button type="button" class="btn modal-close-filter" data-bs-dismiss="modal">Close</button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-check d-flex align-items-center mt-4">
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
            <div class="col-md-9">
                @if(count($users) >= 1)
                @foreach($users as $user)
                <div class="profile_wraper profile_wraper_padding my-3 my-md-0">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="user_profile_container wh_66">
                                <!-- <img src="{{ asset('images/asset/user-profile.png') }}" /> -->
                                @if(isset($user->profile_image))
                                <img src="{{Storage::url($user->profile_image)}}" />
                                @else
                                <img src="{{ asset('images/asset/user-profile.png') }}" width="100%" height="100%"/>
                                @endif
                            </div>

                        </div>
                        <div class="col-md-9">
                            <div class="d-flex align-items-center">
                                <div class="guide_profile_main_text">
                                    <a href="{{route('profile-public-show',['id'=>$user->id])}}" class="btn-link text_user_name">{{$user->name}}</a>
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
                                    <button class="curv_cmn_btn">{{$skill->getSkills->name}}</button>
                                    @endforeach
                                    @else
                                    -
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1">

                            <div> <i class="fa fa-heart-o icon-size Aubergine like-profile" style="cursor: pointer;" data-id="{{$user->id}}" aria-hidden="true"></i></div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="not-found-text">
                    <p>No Profile Found</p>
                </div>
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