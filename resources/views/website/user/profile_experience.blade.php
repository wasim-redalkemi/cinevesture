@extends('website.layouts.app',['class' => 'bg_white'])

{{-- @section('title','Cinevesture-experience') --}}

@section('header')
    @include('website.include.header')
@endsection

@section('content')

    <section class="profile-section">
        <div class="hide-me animation for_authtoast">
            @include('website.include.flash_message')
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include('website.include.profile_sidebar')
                </div>
                <div class="col-md-9">
                    @if(isset($prevExperience) && count($prevExperience)>0)
                        @include('website.user.include.previously_added_experience',['prevData'=>$prevExperience])
                    @endif
                    <div class="profile_wraper profile_wraper_padding mt-md-0 mt-4">
                        <div class="d-flex ">
                            <div class="profile_cmn_head_text">Add Experience</div>
                            <div>
                                <span data-toggle='tooltip' title='Employees gain work experience in a job, field, or profession. Record companies and job titles.'>
                                    <span class="dot">
                                        <i class="fa fa-info p-9" aria-hidden="true"></i>
                                    </span>
                                </span>
                            </div>
                        </div>
                        <form role="form" class="validateBeforeSubmit" method="POST" enctype="multipart/form-data" action="{{ route('experience-store') }}">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="profile_input">
                                        <label>Job Title <span class = "steric_sign_design">*</span></label>  
                                        <input type="text" class="form-control @error('job_title') is-invalid @enderror" name="job_title" placeholder="Job Title"  aria-label="Username" aria-describedby="basic-addon1" maxlength="100"  required>                                    
                                        @error('job_title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                      
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="profile_input">
                                        <label>Company <span class = "steric_sign_design">*</span></label>
                                        <input type="text" class="form-control @error('company') is-invalid @enderror" placeholder="Company" name="company" aria-label="Username" aria-describedby="basic-addon1"  required>
                                        @error('company')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="profile_input">
                                        <label>Location <span class = "steric_sign_design">*</span></label>
                                        <input type="text" class="form-control @error('country_id') is-invalid @enderror" placeholder="Location" name="country_id" aria-label="Username" aria-describedby="basic-addon1"  required>
                                        @error('country_id')
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
                                        <label>Start Date <span class = "steric_sign_design">*</span></label>
                                        <input type="date" id="startDate" class="form-control @error('start_date') is-invalid @enderror" placeholder="DD/MM/YY" name="start_date" aria-label="Username" aria-describedby="basic-addon1"  required>
                                        @error('start_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="profile_input">
                                        <label>End Date <span class = "steric_sign_design">*</span></label>
                                        <input type="date" id="endDate" class="form-control @error('end_date') is-invalid @enderror" placeholder="DD/MM/YY" name="end_date" aria-label="Username" aria-describedby="basic-addon1"  required>
                                        @error('end_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="profile_input">
                                        <label for="lang">Employment Type <span class = "steric_sign_design">*</span></label>
                                        <select name="employement_type_id" class="@error('employement_type_id') is-invalid @enderror" id="lang"  required>
                                        <option value="">Select</option>
                                            <option value="Full-time">Full-time</option>
                                            <option value="Contract">Contract</option>
                                            <option value="Internship">Internship</option>
                                            <option value="Part-time">Part-time</option>
                                        </select>
                                        @error('employement_type_id')
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
                                        <label>Description <span class = "steric_sign_design">*</span></label>
                                        
                                        <div class="form_elem">
                                        <textarea class="form-control text_editor controlTextLength @error('description') is-invalid @enderror" text-length = "2000" maxlength="2000" name="description" aria-label="With textarea" required ></textarea>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex justify-content-between justify-content-md-end flex-wrap mt-4">
                                    <a href="{{route('portfolio-create')}}"class="cancel_btn mx-0 mx-md-3" style="text-decoration:none">Cancel</a>
                                        {{-- <button class="save_add_btn">Save & add another</button> --}}
                                        <button type="submit" name="saveAndAnother" value="false" class="portfolio_save_btn save_add_btn">Save & add another</button>
                                        <input type="hidden" id="save_btn_value" name="saveButtonType" value="">
                                        {{-- <button type="submit" class="guide_profile_btn mx-0 mx-md-3">Save & next</button> --}}
                                    
                                        <button type="submit" name="saveAndNext" value="false" class="portfolio_save_btn_next guide_profile_btn mx-0 mx-md-3">Save & next</button>
                                        <input type="hidden" id="save_btn_next" name="flag" value="">
                                    
                                        <a href="{{route('experience-skip')}}"class="cancel_btn mx-0 mx-md-3" style="text-decoration:none">Skip</a>
                                        
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

@section('scripts')
    <script>
        $(function() {

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
@endsection



@section('footer')
    @include('website.include.footer')
@endsection

@push('scripts')
<script>
   $(document).ready(function(){
        $("#error-toast").toast("show");
        $("#success-toast").toast("show");
    });
    
    $(".portfolio_save_btn").on("click", function () {
        $("#save_btn_value").attr("value", $(this).attr("name"))
        $(this).parents('form').submit();
    });
    $(".portfolio_save_btn_next").on("click", function () {
        $("#save_btn_next").attr("value", $(this).attr("name"))
        $(this).parents('form').submit();
    });

    $( function() {
    var todaydt = new Date();
        $("#startDate").datepicker({
    
            autoclose: true,
                dateFormat: "dd/mm/yy",
                endDate: todaydt,
            onSelect: function (date) {
            //Get selected date 
                var date2 = $('#startDate').datepicker('getDate');
                //sets minDate to txt_date_to
                $('#endDate').datepicker('option', 'minDate', date2);
            }
        });
        $('#endDate').datepicker({
            dateFormat: "dd/mm/yy",
            
        });
    });
</script>
@endpush
