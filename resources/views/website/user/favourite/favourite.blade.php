@extends('website.layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-organisation')

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
                <div>
                    @php
                        $user_projects_data = $user_projects->toArray();
                                                    
                    @endphp
                    @if (isset($user_projects_data['data']) && count($user_projects_data['data'])>0)
                    @foreach ($user_projects_data['data'] as $k => $v)
                    <div class="col-md-4">
                        @if (!empty($v['projects']['project_image']))
                            <a href="{{route('public-view',['id'=>$v['projects']['id']])}}" style="outline: none; text-decoration:none">
                                {{-- <div class="movie_name_text">{{ !empty($v['projects']['project_name'])? $v['projects']['project_name'] : '-' }} </div> --}}
                                <div class="favourite_img_card"><img src="{{ Storage::url($v['projects']['project_image']['file_link']) }}" width=100% alt="image"></div>
                            </a>
                        @else
                            {{-- <div class="favourite_img_card"><img src="{{ asset('images/asset/100_no_img.jpg') }}" alt="image""></div> --}}
                         <div class="favourite_img_card">   <img src="{{ asset('images/asset/100_no_img.jpg') }}" class="root_img" /></div>

                        @endif
                        <div class="d-flex align-items-center justify-content-between">
                            <a href="{{route('public-view',['id'=>$v['projects']['id']])}}" style="outline: none; text-decoration:none">
                                <div class="movie_name_text">{{ !empty($v['projects']['project_name'])? $v['projects']['project_name'] : '-' }} </div>
                            </a>
                            <div>
                                <i class="fa <?php if(isset($v['projects']['id'])){echo'fa-heart';}else{echo'fa-heart-o';} ?> icon-size Aubergine like-project" style="cursor: pointer;" data-id="<?php if(isset($v['projects']['id'])){echo $v['projects']['id'];} ?>" aria-hidden="true"></i>
                            </div>
                        </div>                                       
                    </div>   
                </div>                 
                    @endforeach
                    @else
                    <div class="profile_wraper mt-1">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="not-found-text">
                                    <p>No Data Found</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div>
                        {!! $user_projects->links() !!}
                    </div>
                </div>

                

                <div class="guide_profile_main_text deep-pink mt-5 mb-1">Profiles</div>
                @php
                    $user_profiles_data = $user_profiles->toArray();
                @endphp
                @if (isset($user_profiles_data['data']) && count($user_profiles_data['data'])>0)
                @foreach ($user_profiles_data['data'] as $k => $v)               
                <div class="profile_wraper profile_wraper_padding mt-1">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex">
                            <div class="">
                                <div class="user_profile_container">                                
                                    @if (!empty($v['profiles']['profile_image']))
                                        <img src="{{ Storage::url($v['profiles']['profile_image']) }}"  class="" width=100% alt="image">
                                    @else
                                    <img src="{{ asset('images/asset/100_no_img.jpg') }}" />
                                    @endif
                                </div>
                            </div>
                            <div class="mx-4 px-1">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <a href="{{route('profile-public-show',['id'=>$v['profiles']['id']])}}" style="outline: none; text-decoration:none">
                                            <span class="guide_profile_main_text"> {{ !empty($v['profiles']['name'])? ucFirst($v['profiles']['name']) : '-' }}</span>
                                        </a>
                                        <?php
                                        $show_verified_btn = true;
                                        if (isset($user_endorsement) && count($user_endorsement)<15) {
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
                                    {{ !empty($v['profiles']['job_title'])? ucFirst($v['profiles']['job_title']) : '-' }}
                                </div>
                                <div class="preview_headtext lh_54 candy-pink">
                                    {{ !empty($v['profile_country']['country']['name'])? ucFirst($v['profile_country']['country']['name']) : '-' }}
                                </div>
                                <div class="posted_job_header Aubergine_at_night">
                                    {{ !empty($v['profiles']['about'])? $v['profiles']['about'] : '-' }}
                                </div>
                                <div class="mt-3">
                                    @foreach ($v['profile_skills'] as $k1=>$v1)                           
                                        <button class="curv_cmn_btn skill_container">{{ !empty($v1['get_skills']['name'])? $v1['get_skills']['name'] : '-' }}</button>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        
                        <div> <i class="fa <?php if(isset($v['profiles']['id'])){echo'fa-heart';}else{echo'fa-heart-o';} ?> icon-size Aubergine like-profile" style="cursor: pointer;" data-id="{{$v['profiles']['id']}}" aria-hidden="true"></i></div>
                    </div>
                </div>            
                @endforeach
                @else
                    <div class="profile_wraper mt-1">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="not-found-text">
                                    <p>No Data Found</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <div>
                    {!! $user_profiles->links() !!}
                </div>
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
