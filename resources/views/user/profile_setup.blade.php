@extends('layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-setup')

@section('header')
@include('include.header')
@endsection

@section('content')
<section class="profile-section">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('include.profile_sidebar')
            </div>
            <div class="col-md-9">
                <div class="profile_wraper profile_wraper_padding mt-md-0 mt-4">
                    <div class="profile_text">
                        <h1>Profile</h1>
                    </div>
                    <div class="d-flex">

                        <div class="upload_img_container">
                            <img src="" id="previewImg" onclick="document.getElementById('imgInp').click();">
                            <div for="file-input" class="d-none">
                                <input type="file" onchange="uploadProfileImage(this)" name="image" accept=".jpg,.jpeg,.png" id="imgInp">
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
                        <div class="col-md-3">
                            <div class="profile_input">
                                <label>First Name</label>
                                <input type="text" class="form-control" placeholder="First Name" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="profile_input">
                                <label>Last Name</label>
                                <input type="text" class="form-control" placeholder="Last Name" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="profile_input">
                                <label>Job Title</label>
                                <input type="text" class="form-control" placeholder="Job Title" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="profile_input">
                                <label for="lang">Age</label>
                                <select name="Age" id="Age">
                                    <option value="18 - 24">18 - 24</option>
                                    <option value="25 - 29">25 - 29</option>
                                    <option value="30 - 34">30 - 34</option>
                                    <option value="35 - 39">35 - 39</option>
                                    <option value="40 - 44">40 - 44</option>
                                    <option value="45 - 49">45 - 49</option>
                                    <option value="50 - 54">50 - 54</option>
                                    <option value="55 - 59">55 - 59</option>
                                    <option value="30 - 34">60+</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="profile_input">
                                <label for="Gender">Gender</label>
                                <select name="Gender" id="Gender">
                                    <option value="Man">Man</option>
                                    <option value="Woman">Woman</option>
                                    <option value="Non Binary">Non Binary</option>
                                    <option value="Transgender">Transgender</option>
                                    <option value="Gender Non-conforming ">Gender Non-conforming </option>
                                    <option value="Prefer Not To Say">Prefer Not To Say</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="profile_input">
                                <label for="lang">Gender Pronouns</label>
                                <select name="Gender Pronounce" id="Gender Pronounce">
                                    <option value="He/Him/His">He/Him/His</option>
                                    <option value="She/Her/Hers">She/Her/Hers</option>
                                    <option value="They/Them/Theirs">They/Them/Theirs</option>
                                    <option value="Ze/Hir/Hirs">Ze/Hir/Hirs</option>
                                    <option value="Prefer not to say">Prefer not to say</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="profile_input">
                                <label for="lang">Located in</label>
                                <select name="languages" id="lang">
                                    <option value="test1">test 1</option>
                                    <option value="test2">test 2</option>
                                    <option value="test3">test 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="profile_input">
                                <label for="lang">Availabe to work in</label>
                                <select name="languages" id="lang">
                                    <option value="test1">test 1</option>
                                    <option value="test2">test 2</option>
                                    <option value="test3">test 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="profile_input">
                                <label for="lang">Languse Spoken</label>
                                <select name="languages" id="lang">
                                    <option value="test1">test 1</option>
                                    <option value="test2">test 2</option>
                                    <option value="test3">test 3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="profile_input">
                                <label for="lang">State</label>
                                <select name="languages" id="lang">
                                    <option value="test1">test 1</option>
                                    <option value="test2">test 2</option>
                                    <option value="test3">test 3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile_input">
                                <label>About</label>
                                <textarea class="form-control" name="" aria-label="With textarea"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile_input">
                                <label for="lang">Skills</label>
                                <select name="languages" id="lang">
                                    <option value="test1">test 1</option>
                                    <option value="test2">test 2</option>
                                    <option value="test3">test 3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="profile_input">
                                <label>IMDB Profile</label>
                                <input type="text" class="form-control" placeholder="IMDB Profile" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="profile_input">
                                <label>LinkedIn Profile</label>
                                <input type="text" class="form-control" placeholder="LinkedIn Profile" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="profile_input">
                                <label>Website</label>
                                <input type="text" class="form-control" placeholder="Website" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="profile_input">
                                <label>Introduction Video</label>
                                <input type="text" class="form-control" placeholder="Paste link here" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-end mt-md-0 mt-4">
                                <button class="cancel_btn">Cancel</button>
                                <button class="guide_profile_btn mx-3">Save</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
</section>
@endsection

<script>
    function uploadProfileImage(e) {
        // debugger
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('previewImg');
            output.src = reader.result;
        };
        reader.readAsDataURL(e.files[0]);
    }
</script>

@section('footer')
@include('include.footer')
@endsection