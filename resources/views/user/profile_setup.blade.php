@extends('layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-setup')

@section('header')
@include('include.header')
@endsection
UllYCuOShcMrS2lSzm

@section('content')
<section class="profile-section">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('include.profile_sidebar')
            </div>
            <div class="col-md-9">
                <div class="hide-me">
                    @include('include.flash_message')
                </div>
                <div class="profile_wraper profile_wraper_padding mt-md-0 mt-4">
                    <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('profile-store') }}">
                        @csrf

                        <div class="profile_text">
                            <h1>Profile</h1>
                        </div>

                        <div class="d-flex">
                            <div class="upload_img_container">
                                <img src="" id="previewImg" onclick="document.getElementById('imgInp').click();">
                                <div for="file-input" class="d-none">
                                    <input type="file" onchange="uploadProfileImage(this)" name="profile_image" accept=".jpg,.jpeg,.png" id="imgInp">
                                </div>
                                <div onclick="document.getElementById('imgInp').click();" class="pointer">
                                    <div class="text-center"> <i class="fa fa-plus-circle mx-2 profile_icon deep-pink pointer" aria-hidden="true"></i></div>
                                    <div>Upload</div>
                                </div>
                            </div>
                            <div class="mx-4 d-flex align-items-center">
                                <div>
                                    <div class="search-head-subtext Aubergine_at_night">
                                        Upload Profile Picture
                                    </div>
                                    <div class="search-head-subtext deep-pink">
                                        Delete
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="profile_upload_text"> Upload JPG or PNG, 400x400 PX</div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="profile_input">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" placeholder="{{ __('First Name') }}" name="first_name" value="{{ $user->first_name }}" aria-label="Username" aria-describedby="basic-addon1" required autofocus>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="profile_input">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" placeholder="{{ __('Last Name') }}" name="last_name" value="{{ $user->last_name }}" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="profile_input">
                                    <label>Job Title</label>
                                    <input type="text" class="form-control" placeholder="Job Title" name="job_title" {{ $user->job_title }} value="{{ $user->job_title }}" aria-label="Username" aria-describedby="basic-addon1" required autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="profile_input" style="max-height:300px;overflow:auto;">
                                    <label for="lang">Age</label>
                                    <select name="age" id="lang">
                                        <?php
                                        for ($i = 18; $i <= 100; $i++) {
                                        ?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="profile_input">
                                        <label for="lang">Located in</label>
                                        <select name="Located_in" id="lang">
                                            @foreach ($country as $k=>$v)
                                                <option value="{{ $v->id }}">{{  $v->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="profile_input">
                                    <label for="lang">Gender Pronouns</label>
                                    <select name="gender_pronouns" id="lang">
                                        <option value="he/him/his">he/him/his</option>
                                        <option value="she/her/hers">she/her/hers</option>
                                        <option value="they/them/theirs">they/them/theirs</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="profile_input">
                                        <label for="lang">Languse Spoken</label>
                                        <select name="languages[]" id="lang" multiple>
                                            @foreach ($languages as $k=>$v)
                                                <option value="{{ $v->id }}">{{  $v->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="profile_input">
                                        <label for="lang">State</label>
                                        <select name="state" id="lang">
                                            @foreach ($state as $k=>$v)
                                                <option value="{{ $v->id }}">{{  $v->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="profile_input">
                                    <label for="lang">Languse Spoken</label>
                                    <select class="js-select2" multiple="multiple">
                                        <option value="Hindi" data-badge="">Hindi</option>
                                        <option value="English" data-badge="">English</option>
                                        <option value="Spanish" data-badge="">Spanish</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="profile_input">
                                        <label for="lang">Skills</label>
                                        <select name="skills[]" id="lang" multiple>
                                            @foreach ($skills as $k=>$v)
                                                <option value="{{ $v->id }}">{{  $v->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="profile_input">
                                    <label>About</label>
                                    <textarea class="form-control" name="about" aria-label="With textarea">{{ $user->about }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="profile_input">
                                    <label for="lang">Skills</label>
                                    <select class="js-select2" multiple="multiple">
                                        <option value="O1" data-badge="">Option1</option>
                                        <option value="O2" data-badge="">Option2</option>
                                        <option value="O3" data-badge="">Option3</option>
                                        <option value="O4" data-badge="">Option4</option>
                                        <option value="O5" data-badge="">Option5</option>
                                        <option value="O6" data-badge="">Option6</option>
                                        <option value="O7" data-badge="">Option7</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="profile_input">
                                    <label>IMDB Profile</label>
                                    <input type="text" class="form-control" placeholder="IMDB Profile" name="imdb_profile" value="{{ $user->imdb_profile }}" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="profile_input">
                                    <label>LinkedIn Profile</label>
                                    <input type="text" class="form-control" placeholder="LinkedIn Profile" name="linkedin_profile" value="{{ $user->linkedin_profile }}" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="profile_input">
                                    <label>Website</label>
                                    <input type="text" class="form-control" placeholder="Website" aria-label="Username" name="website" value="{{ $user->website }}" aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="profile_input">
                                    <label>Introduction Video</label>
                                    <input type="text" class="form-control" placeholder="Paste link here" name="intro_video_link" value="{{ $user->intro_video_link }}" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-end mt-md-0 mt-4">
                                    <button class="cancel_btn">Cancel</button>
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
@include('include.footer')
@endsection
@push('scripts')
<script type="text/javascript">
    function uploadProfileImage(e) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('previewImg');
            output.src = reader.result;
        };
        reader.readAsDataURL(e.files[0]);
    }

    $(".js-select2").select2({
        closeOnSelect: false,
        placeholder: "Placeholder",
        allowClear: true,
        tags: true
    });
</script>
@endpush

