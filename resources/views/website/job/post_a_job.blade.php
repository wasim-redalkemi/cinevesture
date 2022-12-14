@extends('website.layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-organisation')

@section('header')
@include('website.include.header')
@endsection

@section('content')
<section class="guide_profile_section my-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-sm-0">
                <div class="content_wraper">
                    <form class="validateBeforeSubmit" id="post_job" onsubmit="return false;">
                        @csrf
                        <input type="hidden" id="save_type" value="" name="save_type">
                        <div class="guide_profile_subsection">
                            <div class="contact-page-text deep-aubergine">Post a job</div>
                        </div>
                        <div class="guide_profile_subsection">
                            <div class="guide_profile_main_text mt-3">Basic Information</div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="profile_input">
                                        <label>Title Of The Job  <span style = "color:red">*</span></label>
                                        <input type="text" class="form-control @error('job_title') is-invalid @enderror" required name="job_title" value="@if (!empty($userJobData['title'])) {{$userJobData['title']}} @endif" placeholder="Title" aria-label="Username" aria-describedby="basic-addon1">

                                        @error('job_title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-3">
                                    <div class="profile_input">
                                        <label>Employment Type  <span style = "color:red">*</span></label>
                                            <select class="work-select2 @error('countries') is-invalid @enderror" required id="employments" name="employments[]" multiple="multiple">
                                                @if (!empty($employments))                                                    
                                                @foreach($employments as $emp)
                                                    <option value="{{$emp->id}}" @if(!empty($userJobData['job_employements']) && in_array($emp->id, $userJobData['job_employements']))selected @endif>{{$emp->name}}</option>
                                                @endforeach
                                                @endif
                                            </select>

                                            @error('employments')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-3">
                                    <div class="profile_input">
                                        <label>Workspace Type  <span style = "color:red">*</span></label>
                                        <select class="emp-select2 @error('workspaces') is-invalid @enderror" required id="workspaces" name="workspaces[]" multiple="multiple">
                                            @if (!empty($workspaces))
                                            @foreach($workspaces as $work)
                                                <option value="{{$work->id}}" @if(!empty($userJobData['job_work_spaces']) && in_array($work->id, $userJobData['job_work_spaces']))selected @endif>{{$work->name}}</option>
                                            @endforeach
                                            @endif
                                        </select>

                                        @error('workspaces')
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
                                        <label>Company Name  <span style = "color:red">*</span></label>
                                        <input type="text" class="form-control @error('company_name') is-invalid @enderror" required name="company_name" value="@if (!empty($userJobData['company_name'])) {{$userJobData['company_name']}} @endif" placeholder="Company Name" aria-describedby="basic-addon1">

                                        @error('company_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-3">
                                    <div class="profile_input">
                                        <label>Location</label>
                                        <select name="countries" class="@error('countries') is-invalid @enderror" required id="lang">
                                            <option value="">Location</option>
                                            @foreach($countries as $country)
                                            <option @if(!empty($userJobData['job_location']))
                                                @if ($userJobData['job_location']['id']==$country->id) {
                                                {{'selected'}}
                                                @endif    
                                                @endif  value="{{$country->id}}">{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('countries')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="guide_profile_subsection">
                            <div class="guide_profile_main_text mt-3">Job Description </div>
                            <div class="profile_input">
                                <textarea class="form-control controlTextLength" text-length="1500" maxlength="1500" name="description" required aria-label="With textarea" placeholder="Your answer here">@if (!empty($userJobData['description'])) {{$userJobData['description']}} @endif</textarea>
                            </div>
                        </div>
                        <div class="guide_profile_subsection">
                            <div class="guide_profile_main_text mt-3">Skills Required</div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="select2forError">
                                    <div class="profile_input">
                                        <label>Skills (You can add upto 10 skills)  <span style = "color:red">*</span></label>
                                        <select name="skills[]" class="select_limit outline is-invalid-remove js-select2" required id="lang" multiple data-maximum-selection-length="10">
                                            @foreach ($skills as $k=>$v)
                                            <option value="{{ $v->id }}" @if(!empty($userJobData['job_skills']) && in_array($v->id, $userJobData['job_skills']))selected @endif>{{ $v->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('skills')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center mt-5 mb-4">
                                    <input type="hidden" name="job_id" value="<?php if(isset($_REQUEST['job_id'])) {echo $_REQUEST['job_id'];}?>">

                                    <button class="cancel_btn mx-5 action" data-id="save" type="button">Save as Draft</button>
                                    <button class="guide_profile_btn action" data-id="publish" type="button">Publish</button>
                                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal for Confirmation for account deactivate -->
<div class="modal fade" id="publish_job_modal"   tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-body" style="padding: 0px;">
                <section>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="modal_container">

                                    <div class="icon_container done">
                                        <i class="fa fa-check icon_style" aria-hidden="true"></i>
                                    </div>
                                    <div class="head_text mt-4">Congratulations!</div>
                                    <div class="successfullPublish_text sub_text mt-4">
                                        You have successfuly published a Job. Do you want to promote your job?
                                        <span data-toggle="tooltip" data-placement="bottom" title="Promote your job for a small small fee. Our team will get in touch with you when you submit a job promotion"> <i class="fa fa-info-circle" aria-hidden="true"></i></span>
                                    </div>
                                    <div>
                                        <button class="submit_btn mt-4">Submit your job for promotion</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
</div>
<!-- End for Modal  -->
@endsection

@section('footer')
@include('website.include.footer')
@endsection

@push('scripts')

<script>
// just for the demos, avoids form submit
jQuery.validator.setDefaults({
  debug: true,
  success: "valid"
});


$("#post_job").validate({
  errorPlacement: function(error, element) {  
    error.insertAfter( element.closest('.profile_input') );   
   }
});

limit =10
var last_valid_selection = null;
$('.select_limit').change(function(event) {
    if ($(this).val().length > limit) {
        $(this).val(last_valid_selection);
    } 
    else 
    {
      last_valid_selection = $(this).val();
    }
});

</script>

<script>
    $(".emp-select2").select2({
        closeOnSelect: false,
        placeholder: "Please Select",
        allowClear: true,
        tags: false,

    });


    $(".work-select2").select2({
        closeOnSelect: false,
        placeholder: "Please Select",
        allowClear: true,
        tags: false,

    });
    $(".js-select2").select2({
        closeOnSelect: false,
        placeholder: "Skills",
        allowClear: true,
        tags: false,
       // maximumSelectionSize: 1
    });
    $(".action").on('click', function(e) {        
        let isFormValid = $( "#post_job" ).valid();        
        if (!isFormValid) {
            return false;
        }
        let $btn = $(this);
        e.preventDefault();
        e.stopPropagation();

        $btn.text("Submitting");
        $btn.prop('disabled',true);

        var button = $(this).attr('data-id');
        if (button == 'save') {
            $('#save_type').val('save');           
        } else {
            $('#save_type').val('publish')

        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
       try {
        $.ajax({
            type: 'post',
            data: $('#post_job').serialize(),
            url: "{{ route('validate-job') }}",
            success: function(resp) {
                $btn.text("Publish");
                $btn.prop('disabled',false);

                if (resp.status == true) {
                    if (button == "save") {
                        $('#post_job')[0].reset();
                        $(".emp-select2").val(null).trigger('change');
                        $(".work-select2").val(null).trigger('change');
                        $('.js-select2').val(null).trigger('change');
                        toastMessage(1, resp.message);
                    } else {
                        // modal
                        $('.toast').hide()
                        $('#post_job')[0].reset();
                        $(".emp-select2").val(null).trigger('change');
                        $(".work-select2").val(null).trigger('change');
                        $('.js-select2').val(null).trigger('change');
                        $('#publish_job_modal').modal('show');
                    }
                } else {
                    toastMessage(0, resp.message);
                }
            },
            error: function(error) {                
                console.log(error);
                $btn.text("Publish");
                $btn.prop('disabled',false);
                if (error.status==422) {
            let errors = error.responseJSON.errors
            // errors.Obj.forEach(element => {            
            //     toastMessage(0, element);
            // });          
        }else{
            toastMessage(0, "Server Error");
        }
            }
        });
       } catch (error) {           
        $btn.text("Publish");
        $btn.prop('disabled',false);
        
        console.log(error);
       }
        

    });
</script>
@endpush
