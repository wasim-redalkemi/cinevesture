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
                <form class="pb-0 pb-md-5" method="Get" action="{{ route('guide-view') }}">
                    @csrf
                    <div class="toggle_container">
                        <div class="switches-container-profile br-4 mb-4">
                            <input type="radio" id="switchMonthly" <?php if($userType=='profile') {echo'checked';} ?> name="type" value="Profile"  />

                            <input type="radio" id="switchYearly" <?php if($userType=='organisation') {echo'checked';}?>  name="type" value="organisation" />
                            <label for="switchMonthly" class="p-12" >Profile</label>
                            <label for="switchYearly" class="m-0">Organisation</label>
                            <div class="switch-wrapper">
                            <div class="switch-toggle">
                                <div>Profile</div>
                                <div>Organisation</div>
                            </div>
                            </div>
                        </div>

                    </div>
                   
                    <div class="search-box-container">
                        <div class="search-container w-100">
                            <input type="search" name="search" value="{{request('search')}}" class="w-100 search-box" placeholder="Search">
                            <button class="search-btn"><i  class="fa fa-search"></i></button>
                        </div>
                        <div class="d-block d-md-none for_drop_img" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            <img src="{{ asset('images/asset/dropdown-sidebar.svg') }}" />
                        </div>
                    </div>
                    <div class="sidebar_collapse collapse dont-collapse-sm prevent_hide" id="collapseExample">
                        <div class="dropdown search-page sidebar_data_mobile ">
                        <div class="dropend search-page search_page_filters_wrap mt-2"> 
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
                                                    if(in_array('countries',array_keys($prevDataReturn)) && !empty($prevDataReturn['countries']) && in_array($country->id,$prevDataReturn['countries'])){
                                                        $is_elem_ex = true;
                                                    }
                                            @endphp
                                            <div class="mx-2 for_active">
                                                    <label class="d-flex align-items-center search_page_filters_data @if($is_elem_ex) search_page_filters_data_active @endif">
                                                        <input class="form-check-input me-1 d-none " type="checkbox" name="countries[]" @if($is_elem_ex) checked @endif  value="{{$country->id}}">
                                                        {{$country->name}}
                                                        
                                                    </label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal for Confirmation for account deactivate -->
                            @if ($userType=='profile')
                            <div class="dropend search-page search_page_filters_wrap">
                                <button class="btn dropdown-toggle w-100" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Talent Type
                                </button>
                                <div class="dropdown-menu filter_modal_wrap">
                                    <div class="filter_option_wrap">
                                        <div class="container no-padding">
                                            <div class="d-flex flex-wrap">
                                                @foreach($talent_type as $talent)
                                                @php
                                                    $is_elem_ex = false;
                                                    if(in_array('talentType',array_keys($prevDataReturn)) && !empty($prevDataReturn['talentType']) && in_array($talent->job_title,$prevDataReturn['talentType'])){
                                                        $is_elem_ex = true;
                                                    }
                                                @endphp
                                                <div class="mx-2 for_active">
                                                    <label class="d-flex align-items-center search_page_filters_data @if($is_elem_ex) search_page_filters_data_active @endif">
                                                        <input class="form-check-input me-1 d-none" type="checkbox" @if($is_elem_ex) checked @endif name="talentType[]" value="{{$talent->job_title}}">
                                                        {{$talent->job_title}}
                                                       
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
                                                    if(in_array('skills',array_keys($prevDataReturn)) && !empty($prevDataReturn['skills']) && in_array($skill->id,$prevDataReturn['skills'])){
                                                        $is_elem_ex = true;
                                                    }
                                                @endphp
                                                <div class="mx-2 for_active">
                                                    <label class="d-flex align-items-center search_page_filters_data @if($is_elem_ex) search_page_filters_data_active @endif ">
                                                        <input class="form-check-input me-1 d-none" type="checkbox" @if($is_elem_ex) checked @endif name="skills[]" value="{{$skill->id}}">
                                                        {{$skill->name}}
                                                    </label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @endif
                           @if ($userType!='profile')
                               
                           
                            <div class="dropend search-page search_page_filters_wrap">
                                <button class="btn dropdown-toggle w-100" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Service
                                </button>
                                <!-- Modal for Category List -->

                                <div class="dropdown-menu filter_modal_wrap">
                                    <div class="filter_option_wrap">
                                        <div class="container no-padding">
                                            <div class="d-flex flex-wrap">
                                                @foreach($services as $service)
                                                @php
                                                    $is_elem_ex = false;
                                                    if(in_array('services',array_keys($prevDataReturn)) && !empty($prevDataReturn['services']) && in_array($service->id,$prevDataReturn['services'])){
                                                        $is_elem_ex = true;
                                                                                                            }
                                                @endphp
                                                                                                <div class="mx-2 for_active">
                                                    <label class="d-flex align-items-center search_page_filters_data @if($is_elem_ex) search_page_filters_data_active @endif ">
                                                        <input class="form-check-input me-1 d-none" type="checkbox" @if($is_elem_ex) checked @endif name="services[]" value="{{$service->id}}">
                                                        {{$service->name}}
                                                                                                            </label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                           
                            @if ($userType=='profile')
                                
                            
                            <div class="form-check mt-4">
                                <input class="form-check-input" <?php if (request('verified') == '1') {
                                                                    echo 'checked';
                                                                } ?> style="border-radius: 0px;" type="checkbox" value="1" name="verified" id="flexCheckDefault">
                                <label class="verified-text mx-2" for="flexCheckDefault">
                                    Recommended Profile
                                </label>
                            </div>
                            @endif
                            <div class="mt-4 d-flex justify-content-between">
                                <input type="submit" class="filter-button watch-now-btn mt-4" Value="Apply">
                                <a href="{{route('guide-view')}}?type={{$userType}}"><input type="button" class="clear-filter watch-now-btn mt-4 w-100" Value="Clear"></a>
                            </div>

                        </div>
                    </div>
                </form>
                </div>
            </div>
            @if ($userType=='profile')
            <div class="col-md-9">
                <div class="mb_2 mt-2 mt-md-0">{{($users->total())}} Results Found</div>
                <div class="profile_wraper mb-5">
                @if(count($users) >= 1)
                @foreach($users as $user)
                <div class="border_btm profile_wraper_padding my-3 my-md-0">
                    <div class="d-flex justify-content-between">
                        <div class="d-block d-md-flex">
                        <div class="">
                            <div class="user_profile_container wh_66">
                                <!-- <img src="{{ asset('images/asset/user-profile.png') }}" /> -->
                                @if(isset($user->profile_image))
                                <img src="{{Storage::url($user->profile_image)}}" width="100%"/>
                                @else
                                <img src="{{ asset('images/asset/profilepic.png') }}" width="100%" height="100%" />
                                {{-- <i class="fa fa-user-circle profile_icon me-2" width="100%" height="100%"></i> --}}
                                @endif
                            </div>

                        </div>
                        <div class="mx-2 mx-md-3 mt-2 mt-md-0">
                            <div class="d-flex align-items-center">
                                <div class="guide_profile_main_text">
                                    <a href="{{route('profile-public-show',['id'=>$user->id])}}" class="btn-link text_user_name">{{empty($user->first_name)?'Name':ucfirst($user->first_name).' '.ucfirst($user->last_name);}}</a>
                                </div>
                                @if($user->is_profile_verified == '1')<span><button class="verified_cmn_btn mx-3">
                                    <img src="{{ asset('images/asset/verified-badge.svg') }}" width="13px"  alt="image"><span class="mx-1"> VERIFIED</span></button></span>
                                @endif
                                

                            </div>

                            <div class="posted_job_header">
                                @if(isset($user->job_title))
                                {{$user->job_title}}
                                @else
                                -
                                @endif
                            </div>
                            <div class="preview_headtext mt-1 lh_54 candy-pink">
                                @if(isset($user->country))
                                {{$user->country->name}}
                                @else
                                -
                                @endif
                            </div>
                            <div class="posted_job_header Aubergine_at_night">
                                @if(isset($user->about))
                                @php
                                    echo $user->about
                                @endphp
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
                    {{-- {!! $users->links() !!} --}}
                    {!! $users->onEachSide(0)->links() !!}

                </div>

            </div>
            @else
            <div class="col-md-9">
                <div class="mb_2 mt-2 mt-md-0">{{($organisations->total())}} Results Found</div>
                <div class="profile_wraper mb-5">
                @if(count($organisations) >= 1)
                @foreach($organisations as $organisation)
                                <div class="border_btm profile_wraper_padding my-3 my-md-0">
                    <div class="d-flex justify-content-between">
                        <div class="d-block d-md-flex">
                        <div class="">
                            <div class="user_profile_container wh_66">
                                @if(!empty($organisation->logo))
                                <img src="{{ Storage::url($organisation->logo) }}" width="100%"/>
                                @else
                                <img src="{{ asset('images/asset/profilepic.png') }}" width="100%" height="100%" />
                                @endif
                            </div>

                        </div>
                        <div class="mx-2 mx-md-3 mt-2 mt-md-0">
                            <div class="d-flex align-items-center">
                                <div class="guide_profile_main_text">
                                    <a href="{{route('organisation-public-view',['id'=>$organisation->id])}}" class="btn-link text_user_name">{{empty($organisation->name)?'Name':ucfirst($organisation->name);}}</a>
                                </div>
                                {{-- @if($user->is_profile_verified == '1')<span><button class="verified_cmn_btn mx-3">
                                    <img src="{{ asset('images/asset/verified-badge.svg') }}" width="13px"  alt="image"><span class="mx-1"> VERIFIED</span></button></span>
                                @endif --}}
                                

                            </div>

                            {{-- <div class="posted_job_header">
                                @if(isset($organisation->organizationType))
                                    {{ucfirst($organisation->organizationType->name)}}
                                @else
                                -
                                @endif
                            </div> --}}
                            <div class="preview_headtext mt-1 lh_54 candy-pink">
                                @if(isset($organisation->location_in))
                                    {{$organisation->country->name}}
                                @else
                                -
                                @endif
                            </div>
                            <div class="posted_job_header Aubergine_at_night">
                                @if(isset($organisation->about))
                                @php
                                  echo  $organisation->about
                                @endphp
                                @else
                                -
                                @endif
                            </div>
                            <div class="d-flex justify-content-between mt-1">
                                <div class="">
                                    @if(isset($organisation->services[0]))
                                    @foreach($organisation->services as $service)
                                    <button class="curv_cmn_btn">{{$service->name}}</button>
                                    @endforeach
                                    @else
                                    -
                                    @endif
                                </div>
                            </div>
                        </div>
                        </div>
                        {{-- <div class="">
                            <div> <i class="fa <?php if(isset($user->isfavouriteProfile)){echo'fa-heart';}else{echo'fa-heart-o';} ?> icon-size Aubergine like-profile" style="cursor: pointer;" data-id="{{$user->id}}" aria-hidden="true"></i></div>
                        </div> --}}
                    </div>
                </div>
                @endforeach
                @else
                </div>
                {!! config('constants.NO_DATA_SEARCH') !!}
                @endif
                <div>
                    {{-- {!! $organisations->links() !!} --}}
                    {!! $organisations->appends(['type' => 'organisation'])->onEachSide(0)->links() !!}

                </div>

            </div>
            @endif
           
            
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

    // $('#currency').change(function() { 
    //     plan = $(this).val();
    //     console.log(plan);
    //     currency = 'organ';
    //     link = "{{route('show-guide')}}";
    //       if(this.checked) { 
    //         currency = 'organ';
    //         params = '?currency='+currency
    //         window.location.href = link+params;
    //       } else{
    //         currency = 'profile';
    //         params = '?currency='+currency
    //         window.location.href = link+params;
    //       }
    // });

    $('#switchYearly,#switchMonthly').change(function() { 
        plan = $(this).val();
        link = "{{route('show-guide')}}";
          if(this.checked) { 
            // currency = 'profile';
            params = '?type='+plan
            window.location.href = link+params;
          } else{
            // currency = 'organisation';
            params = '?type='+plan
            window.location.href = link+params;
          }
    });
    
//     $(document).click(function(e) {
// 	if (!$(e.target).is('.for_test')) {
//         console.log("called");
//     	$('.collapse').collapse('show');	    
//     }
// });

   
</script>
@endpush
