@extends('layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-organisation')

@section('header')
@include('include.header')
@endsection

@section('content')
<section class="">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="d-flex align-items-center justify-content-center mt-5">
                    <div class="flow_container">1</div>
                    <hr class="flow_hr">
                    <div class="flow_container opacity-50">2</div>
                    <hr class="flow_hr">
                    <div class="flow_container opacity-50">3</div>
                    <hr class="flow_hr">
                    <div class="flow_container opacity-50">4</div>
                    <hr class="flow_hr">
                    <div class="flow_container opacity-50">5</div>
                    <hr class="flow_hr">
                    <div class="flow_container opacity-50">6</div>
                </div>
                <!-- <div class=" mt-2">
                <div class="d-flex align-items-center">
                    <div class="w_14">Overview</div>
                    <div class="w_14">Details</div>
                    <div class="w_14">Description</div>
                    <div class="w_14">Gallery</div>
                    <div class="w_14">Requirements & Milestones</div>
                    <div class="w_14">Preview</div>
                </div>
                </div> -->


            </div>
        </div>
    </div>
</section>


<!-- Requirements section -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="profile_wraper profile_wraper_padding mt-4">
                    <p class="flow_step_text pb-0">Requirements</p>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="profile_input">
                                <label>Project Stage *</label>
                                    <select name="gender_pronouns" id="lang">
                                        <option value="test1">test1</option>
                                        <option value="test1">test1</option>
                                    </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="profile_input">
                                <label>Looking for *</label>
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
                                <label>If Startup, What stage of funding are you at?</label>
                                <select name="gender_pronouns" id="lang">
                                        <option value="test1">test1</option>
                                        <option value="test1">test1</option>
                                    </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="profile_input">
                                <label>Crowdfunding Link (Optional)</label>
                                <input type="text" class="form-control" name="" placeholder="Title" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div>
                    <div class="flow_step_text mt-3">Milestones</div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="profile_input">
                                <label>Milestone Description</label>
                                <input type="text" class="form-control" name="" placeholder="Milestone Description">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="profile_input">
                                <label>Milestone Budget (USD)</label>
                                <input type="text" class="form-control" name="" placeholder="Milestone Budget (USD)">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="profile_input">
                                <label>Target Date</label>
                                <input type="text" class="form-control" name="" placeholder="Target Date">
                            </div>
                        </div>
                        <div class="col-md-2 d-flex align-items-end">
                            <div class="d-flex">
                                <input type="radio" class="checkbox_btn" name="" aria-label="">
                                <div class="verified-text deep-pink mx-2"> Make Complete</div>
                            </div>
                        </div>
                    </div>
                    <div><button class="save_add_btn mt-5">Add another Milestone</button></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-end mt-5 pt-5 pb-md-0">
                                <button class="cancel_btn mx-3">Go back</button>
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