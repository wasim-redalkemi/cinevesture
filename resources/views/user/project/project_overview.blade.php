@extends('layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-organisation')

@section('header')
@include('include.header')
@endsection

@section('content')
@include('user.project.project_pagination')


<!-- Overview section -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="profile_wraper profile_wraper_padding mt-4">
                    <div>
                        <p class="flow_step_text"> Overview</p>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="profile_input">
                                <label>Project Name *</label>
                                <input type="text" class="form-control" name="" placeholder="Project Name" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="profile_input">
                                <label>Type of Project *</label>
                                    <select name="gender_pronouns" id="lang">
                                        <option value="test1">test1</option>
                                        <option value="test1">test1</option>
                                    </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="profile_input">
                                <label>Who are you listing this project as? *</label>
                                <div class="d-flex">
                                    <div class="checkbox_btn d-flex">
                                        <input type="radio" class="checkbox_btn" name="" aria-label="">
                                        <div class="verified-text mx-2"> Individual</div>
                                    </div>
                                    <div class="checkbox_btn d-flex mx-3">
                                        <input type="radio" aria-label="">
                                        <div class="verified-text mx-2"> Organization</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="profile_input">
                                <label>Select Country *</label>
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
                        <div class="col-md-6">
                            <div class="profile_input">
                                <label>Select Language *</label>
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
                        <div class="col-md-6">
                            <div class="profile_input">
                                <label>Locations (Optional)</label>
                                <input type="text" class="form-control" name="" placeholder="Locations (Optional)" aria-label="Username" aria-describedby="basic-addon1">
                                <label>Please specify where you intend to create and complete the project </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-end mt-4">
                                <button class="cancel_btn mx-3">Discard</button>
                                <button class="guide_profile_btn">Save & Next</button>
                            </div>
                        </div>
                    </div>
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
<script>
      $(".js-select2").select2({
        closeOnSelect: false,
        placeholder: "Placeholder",
        allowClear: true,
        tags: true
    });
</script>
@endsection