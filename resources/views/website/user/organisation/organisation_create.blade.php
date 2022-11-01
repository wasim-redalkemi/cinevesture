@extends('website.layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-organisation-create')

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
                <div class="profile_wraper profile_wraper_padding mt-md-0 mt-4">
                    <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('organisation-store') }}">
                        @csrf

                        <div class="profile_text">
                            <h1>Organisation</h1>
                        </div>
                        <div class="d-flex custom_file_explorer">
                            <div class="upload_img_container">
                                <img src="<?php if (!empty($UserOrganisation->logo)){echo Storage::url($UserOrganisation->logo); }?>" class="upload_preview">                                        

                                <div for="file-input" class="d-none">
                                    <input type="file" name="logo" class="@error('logo') is-invalid @enderror file_element" accept=".jpg,.jpeg,.png">
                                    @error('logo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror 
                                </div>
                                <div class="pointer open_file_explorer">
                                    <div class="text-center"> <i class="fa fa-plus-circle mx-2 profile_icon deep-pink pointer" aria-hidden="true"></i></div>
                                    <div>Upload</div>
                                </div>
                            </div>
                            <div class="mx-4 d-flex align-items-center">
                                <div>
                                    <div class="search-head-subtext Aubergine_at_night open_file_explorer">
                                        Upload Profile Picture
                                    </div>
                                    <div class="search-head-subtext deep-pink">
                                        Delete
                                    </div>
                                </div>
                            </div>
                        </div>                            

                        <div class="row">
                            <div class="col-md-6">
                                <div class="profile_input">
                                    <label>Name</label>
                                    <input type="text" class="outline name-only form-control @error('name') is-invalid @enderror" placeholder="{{ __('Name') }}" name="name" value="{{(isset($UserOrganisation->name))?$UserOrganisation->name:'' }}" aria-label="Username" aria-describedby="basic-addon1" required autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        {{-- @php
                            echo '<pre>';
                                print_r($organisationType);
                                die;
                        @endphp --}}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="profile_input">
                                    <label>Organisation Type</label>
                                    <select name="organisation_type" class="@error('organisation_type') is-invalid @enderror" id="" required autofocus>
                                        <option value="">Select</option>
                                        @foreach ($organisationType as $k=>$v)
                                            <option value="{{ $v->id }}">{{  $v->name }}</option>
                                        @endforeach
                                    </select>                                    
                                    @error('organisation_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="profile_input">
                                    <label>About</label>
                                    <textarea class="form-control" name="about" aria-label="With textarea" required autofocus>{{(isset($UserOrganisation->about))?$UserOrganisation->about:'' }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="profile_input">
                                    <label>Services</label>
                                    <select name="service_id[]" class="outline js-select2 @error('service_id') is-invalid @enderror" id="" multiple required autofocus>
                                        @foreach ($organisationService as $k=>$v)
                                            <option value="{{ $v->id }}">{{ $v->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('service_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="profile_input">
                                    <label>Located In</label>
                                    <select name="located_in" class="@error('located_in') is-invalid @enderror" id="" required autofocus>
                                        <option value="">Select</option>
                                        @foreach ($country as $k=>$v)                                            
                                            <option
                                            @php
                                            if(isset($UserOrganisation->location_in)){
                                                if ($UserOrganisation->location_in == $v->id) {
                                                echo 'selected';
                                            }
                                            }
                                            @endphp value="{{ $v->id }}">{{ $v->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('located_in')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $Located }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="profile_input">
                                    <label>Available To Work In</label>
                                    <select name="available_to_work_in" class="@error('available_to_work_in') is-invalid @enderror" id="" required autofocus>
                                        <option value="">Select</option>
                                        <option @if(isset($UserOrganisation->available_to_work_in))
                                            @if ("virtually" == $UserOrganisation->available_to_work_in) {
                                                {{'selected'}}
                                            @endif
                                            
                                        @endif value="virtually">Virtually</option>
                                        <option 
                                        @if(isset($UserOrganisation->available_to_work_in)){
                                            @if ("physically" == $UserOrganisation->available_to_work_in) {
                                                {{'selected'}}
                                            
                                            @endif
                                        @endif value="physically">Physically</option>
                                    </select>
                                    @error('available_to_work_in')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="profile_input">
                                    <label> Languages Spoken</label>
                                    <select name="language_id[]" class="outline js-select2 @error('language_id') is-invalid @enderror" id="lang" multiple required autofocus>
                                        @foreach ($languages as $k=>$v)
                                            <option value="{{ $v->id }}"<?php if(isset($user->country) && $user->country->id == $v->id){echo('selected');} ?>>{{  $v->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('language_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="profile_input">
                                    <label>IMDB Profile</label>
                                    <input type="text" class="foutline orm-control @error('imdb_profile') is-invalid @enderror" placeholder="IMDB Profile" name="imdb_profile" value="{{(isset($UserOrganisation->imdb_profile))?$UserOrganisation->imdb_profile:'' }}" aria-label="Username" aria-describedby="basic-addon1" required autofocus>
                                    @error('imdb_profile')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="profile_input">
                                    <label>LinkedIn Profile</label>
                                    <input type="text" class="outline form-control @error('linkedin_profile') is-invalid @enderror" placeholder="LinkedIn Profile" name="linkedin_profile" value="{{(isset($UserOrganisation->linkedin_profile))?$UserOrganisation->linkedin_profile:'' }}" aria-label="Username" aria-describedby="basic-addon1" required autofocus>
                                    @error('linkedin_profile')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="profile_input">
                                    <label>Website</label>
                                    <input type="text" class="outline form-control @error('website') is-invalid @enderror" placeholder="Website" aria-label="Username" name="website" value="{{(isset($UserOrganisation->website))?$UserOrganisation->website:'' }}" aria-describedby="basic-addon1" required autofocus>
                                    @error('website')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="profile_input">
                                    <label>Introduction Video</label>
                                    <input type="text" class="outline form-control @error('intro_video_link') is-invalid @enderror" placeholder="Paste link here" name="intro_video_link" value="{{(isset($UserOrganisation->intro_video_link))?$UserOrganisation->intro_video_link:'' }}" aria-label="Username" aria-describedby="basic-addon1" required autofocus>
                                    @error('intro_video_link')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3 d-flex align-items-end">
                                <div>
                                    <button class="save_add_btn">Add another</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="profile_input">
                                    <label>Team size</label>
                                    <input type="number" class="form-control" name="team_size" value="{{(isset($UserOrganisation->team_size))?$UserOrganisation->team_size:'' }}" placeholder="Team size" aria-label="Username" aria-describedby="basic-addon1">
                                    @error('team_size')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        {{-- <div class="row">
                            <div class="col-md-12 d-flex my-3 align-items-center">
                                <div class="organisation_cmn_text deep-pink">
                                    <h6>Team members</h6>
                                </div>
                                <!-- <div class="mx-5 icon_container"><i class="fa fa-plus icon-size deep-pink" aria-hidden="true"></i></div> -->
                                <div class="mx-5 icon_container"> <span class="icon-size deep-pink">+</span></div>
                            </div>
                            <div class="col-md-3">
                                <div><img src="{{ asset('public/images/asset/photo-1595152452543-e5fc28ebc2b8 2.png') }}" class="w-100"></div>
                                <div class="d-flex justify-content-between mt-3">
                                    <div class="organisation_cmn_text">Title</div>
                                    <div class="icon_container"><i class="fa fa-times-circle icon-size deep-pink" aria-hidden="true"></i></div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div><img src="{{ asset('public/images/asset/67a6c213a22d2ba4c3982a55d828b5c7 1.png') }}" class="w-100"></div>
                                <div class="d-flex justify-content-between mt-3">
                                    <div class="organisation_cmn_text">Title</div>
                                    <div class="icon_container"><i class="fa fa-times-circle icon-size deep-pink" aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-end mt-4">
                                    <button class="cancel_btn mx-3">Discard</button>
                                    <button type="submit" class="guide_profile_btn mx-3">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
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

    // $(document).ready(function(){
    //     $("#error-toast").toast("show");
    //     $("#success-toast").toast("show");
    // });

    $(document).ready(function()
    {   
        $('.open_file_explorer').click(function(e) 
        {
            $(this).parents('.custom_file_explorer').find('.file_element').click();
        });

        $('.file_element').change(function()
        {
            var output = $(this).parents('.custom_file_explorer').find('.upload_preview');
            const file = this.files;
            var reader = new FileReader();
            reader.onload = function() {
                output.attr('src',reader.result);
            };
            reader.readAsDataURL(file[0]);
        });
    });

    $(".js-select2").select2({
        closeOnSelect: false,
        placeholder: "Select",
        allowClear: true,
        tags: false
    });

    // $("#located_in").on('change', function() {
    //     if($("#located_in option:selected").text().trim() == "India"){
    //         $("#state-show").show();
    //     }else{
    //         $("#state-show").hide();
    //         $("option:selected", $("#state")).prop("selected", false);
            
    //     }
    // });
</script>
@endpush