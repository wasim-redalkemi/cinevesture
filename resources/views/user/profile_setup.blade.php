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
                    <div class="hide-me float-left">
                            @include('include.flash_message')
                        </div>
                        <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('profile-store') }}">
                            @csrf
                            <div class="profile_wraper profile_wraper_padding mt-md-0 mt-4">
                                <div class="profile_text">
                                    <h1>Profile</h1>
                                </div>
                                <div class="d-flex">
                                    <div class="upload_img_container">
                                        <div>
                                            <div class="text-center"> <i class="fa fa-plus-circle mx-2 profile_icon deep-pink"
                                                    aria-hidden="true"></i></div>
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
                                            <input type="text" class="form-control" placeholder="{{ __('First Name') }}" name="first_name" value="{{ $user->first_name }}"
                                                aria-label="Username" aria-describedby="basic-addon1" required autofocus>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="profile_input">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" placeholder="{{ __('Last Name') }}" name="last_name" value="{{ $user->last_name }}"
                                                aria-label="Username" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="profile_input">
                                            <label>Job Title</label>
                                            <input type="text" class="form-control" placeholder="Job Title" name="job_title" {{ $user->job_title }} value="{{ $user->job_title }}"
                                                aria-label="Username" aria-describedby="basic-addon1" required autofocus>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="profile_input">
                                            <label>Age</label>
                                            <input type="number" class="form-control" placeholder="Age" name="age" aria-label="Username" value="{{ $user->age }}"
                                                aria-describedby="basic-addon1" required autofocus>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="profile_input">
                                            <label>Gender</label>
                                            <div class="dropdown profile_dropdown_btn">
                                                <button
                                                    class="btn dropdown-toggle d-flex align-items-center profile_dropdown_btn"
                                                    href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Gender
                                                </button>
                                                <ul class="dropdown-menu profile_dropdown_menu w-100">
                                                    <li>
                                                        Features
                                                    </li>
                                                    <li>
                                                        Animation
                                                    </li>
                                                    <li>
                                                        Biography
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="profile_input">
                                            <label>Gender Pronounce</label>
                                            <div class="dropdown profile_dropdown_btn">
                                                <button
                                                    class="btn dropdown-toggle d-flex align-items-center profile_dropdown_btn"
                                                    href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Genres
                                                </button>
                                                <ul class="dropdown-menu w-100 profile_dropdown_menu">
                                                    <li>
                                                        Features
                                                    </li>
                                                    <li>
                                                        Animation
                                                    </li>
                                                    <li>
                                                        Biography
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="profile_input">
                                            <label>Located In</label>
                                            <div class="dropdown profile_dropdown_btn">
                                                <button
                                                    class="btn dropdown-toggle d-flex align-items-center profile_dropdown_btn"
                                                    href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Genres
                                                </button>
                                                <ul class="dropdown-menu w-100 profile_dropdown_menu">
                                                    <li>
                                                        Features
                                                    </li>
                                                    <li>
                                                        Animation
                                                    </li>
                                                    <li>
                                                        Biography
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="profile_input">
                                            <label>Available To Work In</label>
                                            <div class="dropdown profile_dropdown_btn">
                                                <button
                                                    class="btn dropdown-toggle d-flex align-items-center profile_dropdown_btn"
                                                    href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Genres
                                                </button>
                                                <ul class="dropdown-menu w-100 profile_dropdown_menu">
                                                    <li>
                                                        Features
                                                    </li>
                                                    <li>
                                                        Animation
                                                    </li>
                                                    <li>
                                                        Biography
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="profile_input">
                                            <label>Languages Spoken</label>
                                            <div class="dropdown profile_dropdown_btn">
                                                <button
                                                    class="btn dropdown-toggle d-flex align-items-center profile_dropdown_btn"
                                                    href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Genres
                                                </button>
                                                <ul class="dropdown-menu w-100 profile_dropdown_menu">
                                                    <li>
                                                        Features
                                                    </li>
                                                    <li>
                                                        Animation
                                                    </li>
                                                    <li>
                                                        Biography
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="profile_input">
                                            <label>State</label>
                                            <div class="dropdown profile_dropdown_btn">
                                                <button
                                                    class="btn dropdown-toggle d-flex align-items-center profile_dropdown_btn"
                                                    href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Genres
                                                </button>
                                                <ul class="dropdown-menu w-100 profile_dropdown_menu">
                                                    <li>
                                                        Features
                                                    </li>
                                                    <li>
                                                        Animation
                                                    </li>
                                                    <li>
                                                        Biography
                                                    </li>
                                                </ul>
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
                                            <label>Skills</label>
                                            <div class="dropdown profile_dropdown_btn">
                                                <button
                                                    class="btn dropdown-toggle d-flex align-items-center profile_dropdown_btn"
                                                    href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Genres
                                                </button>
                                                <ul class="dropdown-menu w-100 profile_dropdown_menu">
                                                    <li>
                                                        Features
                                                    </li>
                                                    <li>
                                                        Animation
                                                    </li>
                                                    <li>
                                                        Biography
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="profile_input">
                                            <label>IMDB Profile</label>
                                            <input type="text" class="form-control" placeholder="IMDB Profile" name="imdb_profile" value="{{ $user->imdb_profile }}"
                                                aria-label="Username" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="profile_input">
                                            <label>LinkedIn Profile</label>
                                            <input type="text" class="form-control" placeholder="LinkedIn Profile" name="linkedin_profile" value="{{ $user->linkedin_profile }}
                                                aria-label="Username" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="profile_input">
                                            <label>Website</label>
                                            <input type="text" class="form-control" placeholder="Website" aria-label="Username" name="website" value="{{ $user->website }}
                                                aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="profile_input">
                                            <label>Introduction Video</label>
                                            <input type="text" class="form-control" placeholder="Paste link here" name="video" value="{{ $user->video }}
                                                aria-label="Username" aria-describedby="basic-addon1">
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
                            <div for="file-input" class="d-none">
                                <input type="file" name="image[]" accept=".jpg,.jpeg,.png" id="imgInp" multiple="multiple">
                                <img src="" id="blah">
                            </div>
                            <div onclick="document.getElementById('imgInp').click();" class="pointer">
                                <div class="text-center"> <i class="fa fa-plus-circle mx-2 profile_icon deep-pink" aria-hidden="true"></i></div>
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
                                <select name="languages" id="lang">
                                    <option value="test1">test 1</option>
                                    <option value="test2">test 2</option>
                                    <option value="test3">test 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="profile_input">
                                <label for="lang">Gander</label>
                                <select name="languages" id="lang">
                                    <option value="test1">test 1</option>
                                    <option value="test2">test 2</option>
                                    <option value="test3">test 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="profile_input">
                                <label for="lang">Gender Pronouns</label>
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
                                <textarea class="form-control" aria-label="With textarea"></textarea>
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
    var imgInp = $("#imgInp");
    var blah = $("#blah");

    imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
            blah.src = URL.createObjectURL(file)
        }
    }
</script>

@section('footer')
@include('include.footer')
@endsection
