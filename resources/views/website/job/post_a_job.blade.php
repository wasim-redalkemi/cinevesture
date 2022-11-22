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
                    <form class="" id="post_job">
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
                                        <label>Title Of The Job</label>
                                        <input type="text" class="form-control @error('job_title') is-invalid @enderror" required name="job_title" value="{{request('job_title')}}" placeholder="Title" aria-label="Username" aria-describedby="basic-addon1">

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
                                        <label>Employment Type</label>
                                        <div class="dropdown profile_dropdown_btn">
                                            <select class="work-select2 @error('countries') is-invalid @enderror" required id="emplyements" name="emplyements[]" multiple="multiple">
                                                @foreach($emplyements as $emp)

                                                @if(isset(request('emplyements')[0]) && in_array($emp->id, request('emplyements')))
                                                <option value="{{$emp->id}}" data-badge="" selected>{{$emp->name}}</option>
                                                @else
                                                <option value="{{$emp->id}}" data-badge="">{{$emp->name}}</option>
                                                @endif

                                                @endforeach
                                            </select>

                                            @error('emplyements')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-3">
                                    <div class="profile_input">
                                        <label>Workspace Type</label>
                                        <select class="emp-select2 @error('workspaces') is-invalid @enderror" required id="workspaces" name="workspaces[]" multiple="multiple">
                                            @foreach($workspaces as $work)

                                            @if(isset(request('workspaces')[0]) && in_array($emp->id, request('workspaces')))
                                            <option value="{{$work->id}}" data-badge="" selected>{{$work->name}}</option>
                                            @else
                                            <option value="{{$work->id}}" data-badge="">{{$work->name}}</option>
                                            @endif

                                            @endforeach
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
                                        <label>Company Name</label>
                                        <input type="text" class="form-control @error('company_name') is-invalid @enderror" required name="company_name" value="{{request('company_name')}}" placeholder="Company Name" aria-describedby="basic-addon1">

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
                                            <option value="{{$country->id}}">{{$country->name}}</option>
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
                            <div class="guide_profile_main_text mt-3">Job Description</div>
                            <div class="profile_input">
                                <textarea class="form-control controlTextLength" text-length="200" name="description" required aria-label="With textarea" placeholder="Your answer here"></textarea>
                            </div>
                        </div>
                        <div class="guide_profile_subsection">
                            <div class="guide_profile_main_text mt-3">Skills Required</div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="profile_input">
                                        <label>Skills (You can add upto 10 skills)</label>
                                        <select name="skills[]" class="outline is-invalid-remove js-select2" required id="lang" multiple>
                                            @foreach ($skills as $k=>$v)
                                            @if(isset(request('skills')[0]) && in_array($v->id,request('skills')))
                                            <option value="{{ $v->id }}" selected>{{ $v->name }}</option>
                                            @else
                                            <option value="{{ $v->id }}">{{ $v->name }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                        @error('skills')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <!-- <div class="search-head-subtext mt-3">Suggested Skills</div>
                        <div class="d-flex my-2">
                            <button class="curv_cmn_btn">Lorem ipsim +</button>
                            <button class="curv_cmn_btn mx-3">Lorem ipsim +</button>
                        </div> -->
                                </div>
                                <div class="d-flex justify-content-center mt-5 mb-4">
                                    <button class="cancel_btn mx-5 action" data-id="save">Save as Draft</button>
                                    <button class="guide_profile_btn action" data-id="publish" type="submit">Publish</button>
                                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal for Confirmation for account deactivate -->
<div class="modal fade" id="publish_job_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">

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

    });
    $(".action").on('click', function(e) {

        var button = $(this).attr('data-id');
        if (button == 'save') {
            $('#save_type').val('save')
        } else {
            $('#save_type').val('publish')

        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        $.ajax({
            type: 'post',
            data: $('#post_job').serialize(),
            url: "{{ route('job-store') }}",
            success: function(resp) {

                if (resp.status == true) {
                    if (button == "save") {
                        $('#post_job')[0].reset();
                        $(".emp-select2").val(null).trigger('change');
                        $(".work-select2").val(null).trigger('change');
                        $('.js-select2').val(null).trigger('change');

                        toastMessage(1, resp.msg);
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
                    toastMessage(0, resp.msg);

                }
            },
            error: function(error) {

            }
        });

    });
</script>
@endpush