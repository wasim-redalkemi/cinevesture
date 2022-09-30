@extends('layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-organisation')

@section('header')
@include('include.header')
@endsection

@section('content')
@include('user.project.project_pagination')


<!-- Detail section  -->
<section>
    <div class="container profile_wraper profile_wraper_padding mt-4">
        <div class="row">
            <div class="col-md-12">
                <p class="flow_step_text"> Details</p>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6">
                <div class="profile_input">
                    <label>Category (Optional)</label>
                    <div class="dropdown profile_dropdown_btn">
                        <button class="btn dropdown-toggle d-flex align-items-center profile_dropdown_btn" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
            <div class="col-md-6">
                <div class="profile_input">
                    <label>Genre *</label>
                    <div class="dropdown profile_dropdown_btn">
                        <button class="btn dropdown-toggle d-flex align-items-center profile_dropdown_btn" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                    <label>Duration (Optional)</label>
                    <input type="text" class="form-control" name="" placeholder="hr:min" aria-describedby="basic-addon1">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="profile_input">
                    <label>Total Budget (USD) *</label>
                    <input type="text" class="form-control" name="" placeholder="Empty input">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="profile_input">
                    <label>Financing Secured (USD) *</label>
                    <input type="text" class="form-control" name="" placeholder="Empty input">
                </div>
            </div>
        </div>
        <div class="associate_text mt-4">Associated with the project (Optional)</div>
        <div class="row">
            <div class="col-md-3">
                <div class="profile_input">
                    <label>Title</label>
                    <input type="text" class="form-control" name="" placeholder="Title" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="col-md-3">
                <div class="profile_input">
                    <label>Name</label>
                    <input type="text" class="form-control" name="" placeholder="Locations (Optional)" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="col-md-3  d-flex align-items-end pb-2 mt-2 mt-md-0">
                <i class="fa fa-times-circle deep-pink icon-size" aria-hidden="true"></i>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="profile_input">
                    <label>Title</label>
                    <input type="text" class="form-control" name="" placeholder="Title" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="col-md-3">
                <div class="profile_input">
                    <label>Name</label>
                    <input type="text" class="form-control" name="" placeholder="Locations (Optional)" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="col-md-3 d-flex align-items-end mt-2 mt-md-0">
                <div>
                    <button class="save_add_btn">Add another</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-end mt-5 pt-5 pb-md-0">
                    <button class="cancel_btn mx-3">Go back</button>
                    <button class="guide_profile_btn">Save & Next</button>
                </div>
            </div>
        </div>

    </div>
</section>



@endsection

@section('footer')
@include('include.footer')
@endsection

@section('scripts')
@endsection