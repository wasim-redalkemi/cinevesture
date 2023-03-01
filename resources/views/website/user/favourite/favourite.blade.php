@extends('website.layouts.app',['class' => 'bg_white'])

{{-- @section('title','Cinevesture-organisation') --}}

@section('header')
@include('website.include.header')
@endsection

@section('content')

<section class="profile-section">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('website.include.profile_sidebar')
            </div>
            <div class="col-md-9">
                <div class="profile_text">
                    <h1>Favourites</h1>
                </div>
                <div class="guide_profile_main_text deep-pink mb-1">Projects</div>
                <div class="row">
                    @php
                        $user_projects_data = $user_projects->toArray();
                    @endphp
                    @if (isset($user_projects_data['data']) && count($user_projects_data['data'])>0)
                    @foreach ($user_projects_data['data'] as $k => $v)
                    <div class="col-md-4">
                        @if (!empty($v['projects']['project_image']))
                            <a href="{{route('public-view',['id'=>$v['projects']['id']])}}" style="outline: none; text-decoration:none">
                                {{-- <div class="movie_name_text">{{ !empty($v['projects']['project_name'])? $v['projects']['project_name'] : '-' }} </div> --}}
                                <div class="favourite_img_card"><img src="{{ Storage::url($v['projects']['project_image']['file_link']) }}" width=100% height="100%" alt="image"></div>
                            </a>
                        @else
                            {{-- <div class="favourite_img_card"><img src="{{ asset('images/asset/100_no_img.jpg') }}" alt="image""></div> --}}
                         <div class="project_img_wrap mx_w_100 w-auto"><img src="{{asset('images/asset/image 3 (1).png')}}" style="z-index: 0;" class="Other_root_img"></div>


                        @endif
                        <div class="d-flex align-items-center justify-content-between" style="max-width: 300px;">
                            <a href="{{route('public-view',['id'=>$v['projects']['id']])}}" style="outline: none; text-decoration:none">
                                <div class="movie_name_text">{{ !empty($v['projects']['project_name'])? $v['projects']['project_name'] : '-' }} </div>
                            </a>
                            <div>
                                <i class="fa <?php if(isset($v['projects']['id'])){echo'fa-heart';}else{echo'fa-heart-o';} ?> icon-size Aubergine like-project" style="cursor: pointer;" data-id="<?php if(isset($v['projects']['id'])){echo $v['projects']['id'];} ?>" aria-hidden="true"></i>
                            </div>
                        </div>                                       
                    </div>   
                    @endforeach
                    <div class="col col-md-12">
                        {{-- {!! $user_projects->links() !!} --}}
                        {!! $user_projects->onEachSide(-1)->links() !!}

                    </div>
                    @else
                    <div class="col col-md-12">
                        {!! config('constants.NO_DATA_FAVOURITE') !!}
                    </div>
                    @endif
                </div>
                <div class="guide_profile_main_text deep-pink mt-5 mb-1">Profiles</div>
                {{-- @php
                    $user_profiles_data = $user_profiles->toArray();
                @endphp --}}
                
                @if (isset($user_profiles) && count($user_profiles)>0)               
                    @foreach ($user_profiles as $k => $v) 
                   
                        
                       
                    <div class="profile_wraper profile_wraper_padding mt-1">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex">
                                <div class="">
                                    <div class="user_profile_container width_in_small"> 
                                        {{-- @foreach ($v->profiles as $item) --}}
                                            
                                        
                                        {{-- @endforeach --}}
                                        @if (!empty($v->profiles->profile_image))
                                            <img src="{{ Storage::url($v->profiles->profile_image) }}"  class="" width=100% alt="image">
                                        @else
                                        <img src="{{ asset('images/asset/photo-1595152452543-e5fc28ebc2b8 2.png') }}" />
                                        @endif
                                    </div>
                                </div>
                                <div class="mx-1 mx-md-4 px-1">
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex align-items-center">
                                            @if (!empty($v->profiles->id))
                                            <a href="{{route('profile-public-show',['id'=>$v->profiles->id])}}" style="outline: none; text-decoration:none">
                                                <span class="guide_profile_main_text"> {{ !empty($v->profiles->name)? ucFirst($v->profiles->name) : '-' }}</span>
                                            </a>
                                                
                                            @endif
                                            <?php
                                            $show_verified_btn = true;
                                            if (isset($user_endorsement) && count($user_endorsement)<config('constants.PROFILE_VERIFIED_ON_ENDORSE_COUNT')) {
                                                $show_verified_btn = false;
                                            }
                                            
                                            if($show_verified_btn)
                                            {
                                                ?>
                                                    <div>
                                                        <button class="verified_cmn_btn mx-3"> <i class="fa fa-check-circle hot-pink mx-1" aria-hidden="true"></i> VERIFIED</button>
                                                    </div>
                                                <?php
                                            }
                                            ?>
                                            {{-- <button class="verified_cmn_btn mx-3"> <i class="fa fa-check-circle hot-pink mx-1" aria-hidden="true"></i> VERIFIED</button> --}}
                                        </div>
                                    </div>
                                    <div class="posted_job_header">
                                        {{ !empty($v->profiles->job_title)? ucFirst($v->profiles->job_title) : '-' }}
                                    </div>
                                    
                                    
                                    <div class="preview_headtext lh_54 candy-pink">
                                        @if (!empty($v->profileCountry))
                                        {{ !empty($v->profileCountry->country->name)? ucFirst($v->profileCountry->country->name) : '-' }}
                                        @endif
                                      
                                       
                                    </div>
                                    <div class="posted_job_header Aubergine_at_night">
                                        {{ !empty($v['profiles']['about'])? $v['profiles']['about'] : '-' }}
                                    </div>
                                    <div class="mt-3">
                                        @foreach ($v->profileSkills as $k=>$value)
                                            <button class="curv_cmn_btn skill_container">{{ !empty($value->getSkills->name)? $value->getSkills->name : '-' }}</button>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @if(!empty($v->profiles->id))
                            <div> <i class="fa <?php if(!empty($v->profiles->id)){echo'fa-heart';}else{echo'fa-heart-o';} ?> icon-size Aubergine like-profile" style="cursor: pointer;" data-id="{{$v->profiles->id}}" aria-hidden="true"></i></div>
                        
                            @endif
                        </div>
                    </div>            
                    @endforeach
                    <div class="col col-md-12">
                        {{-- {!! $user_profiles->links() !!} --}}
                        {!! $user_profiles->onEachSide(-1)->links() !!}

                    </div>
                @else
                <div class="col col-md-12">
                    {!! config('constants.NO_DATA_FAVOURITE') !!}
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

@endsection

@section('footer')
@include('website.include.footer')
@endsection

@push('scripts')
        <script type="text/javascript">
        // $(document).ready(function()
        // {
            $('.like-profile').on('click', function(e) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var profile_id = $(this).attr('data-id');
                var classList = $(this).attr('class').split(/\s+/);
                var element = $(this);
                $.ajax({
                    type: 'post',
                    data: {'id':profile_id},
                    url: "{{route('favourite-update')}}",
                    success: function(resp) {
                        if (resp.status) {
                            for (var i = 0; i < classList.length; i++) {
                                if (classList[i] == 'fa-heart-o') {
                                    element.removeClass('fa-heart-o');
                                    element.addClass('fa-heart')
                                    // toastMessage("success", resp.msg);
                                    break;
                                }
                                if(classList[i] == 'fa-heart')
                                {
                                    element.removeClass('fa-heart');
                                    element.addClass('fa-heart-o');
                                    // toastMessage("error", resp.msg);

                                    break;
                                }
                            }
                        } else {

                        }
                    },
                    error: function(error) {
                        
                    }
                });
            });

            $('.like-project').on('click', function(e) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var project_id = $(this).attr('data-id');
                var classList = $(this).attr('class').split(/\s+/);
                var element = $(this);
                $.ajax({
                    type: 'post',
                    data: {'id':project_id},
                    url: "{{route('project-like')}}",
                    success: function(resp) {
                        if (resp.status) {
                            for (var i = 0; i < classList.length; i++) {
                                if (classList[i] == 'fa-heart-o') {
                                    element.removeClass('fa-heart-o');
                                    element.addClass('fa-heart')
                                    toastMessage("success", resp.msg);
                                    break;
                                }
                                if(classList[i] == 'fa-heart')
                                {
                                    element.removeClass('fa-heart');
                                    element.addClass('fa-heart-o');
                                    toastMessage("error", resp.msg);

                                    break;
                                }

                            }
                        } else {

                        }
                    },
                    error: function(error) {
                        
                    }
                });
            });
        // });
        </script>
    @endpush
