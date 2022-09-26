@extends('layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-experience')

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
                        <div class="d-flex justify-content-between">
                            <div class="profile_cmn_head_text">Add Experience</div>
                            <div><i class="fa fa-trash-o  deep-pink icon-size" aria-hidden="true"></i></div>
                            </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="profile_input">
                                    <label>Job Title</label>
                                    <input type="text" class="form-control" placeholder="Job Title"
                                        aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="profile_input">
                                    <label>Company</label>
                                    <input type="text" class="form-control" placeholder="Company" aria-label="Username"
                                        aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="profile_input">
                                    <label>Location</label>
                                    <input type="text" class="form-control" placeholder="Location" aria-label="Username"
                                        aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="profile_input">
                                    <label>Start Date</label>
                                    <input type = "date" name = "date">  
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="profile_input">
                                    <label>End Date</label>
                                    <input type = "date" name = "date"> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="profile_input">
                                <label for="lang">Employment Type</label>
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
                                    <label>Description</label>
                                    <textarea class="form-control" aria-label="With textarea"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-end mt-4">
                                    <button class="cancel_btn mx-3">Cancel</button>
                                    <button class="save_add_btn">Save & add another</button>
                                    <button class="guide_profile_btn mx-3">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<script>
$(function(){
        
        let datePicker = document.getElementById('datePicker');
        let picker = new Litepicker({
            element: datePicker,
            format: 'DD MMMM YYYY'
        });
        
        let dateRangePicker = document.getElementById('dateRangePicker');
        let pickerRange = new Litepicker({
            element: dateRangePicker,
            format: 'DD MMMM YYYY',
            singleMode: false,
        });
    });
</script>

@section('footer')
    @include('include.footer')
@endsection