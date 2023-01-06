@extends('website.layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-organisation')

@section('header')
@include('website.include.header')
@endsection

@section('content')

<section class="guide_profile_section my-4">
    <div class="container">
        <div class="row">
            {{-- <div class="col-md-12" id="err-container">
                @if ($errors->any())

                @foreach ($errors->all() as $error)

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Warning!</strong> {{ $error }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endforeach
                @endif
            </div> --}}
            <div class="col-md-12 mt-sm-0">
                <div class="content_wraper">
                    <div class="guide_profile_subsection">
                        <div class="contact-page-text deep-aubergine">Apply For {{ucFirst($jobTitle)}}</div>
                    </div>


                    <form class="validateBeforeSubmit" id="apply_job_form" action="{{route('storeApplyJob',['jobId'=>request('jobId')])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="guide_profile_subsection" id="Documents">
                            <div class="guide_profile_main_text mt-3">Resume/CV<em class="text-danger mx-1">*</em></div>
                            <div class="preview_subtext deep_aubergine mt-3">Please Attach Your Resume</div>
                            <div id="Documents" class="add_content_wraper">
                                <label for="upload-doc-inp" class="d-block">
                                    <div class="d-flex align-items-center mt-3">
                                        <div><i class="fa fa-paperclip aubergine icon-size" aria-hidden="true"></i></div>
                                        <div class="upload_resume_text mx-2">Upload Your Resume/CV</div>
                                        <input type="file" accept="application/pdf,application/msword" name="resume" class="form-control @error('resume') is-invalid @enderror docInp d-none" id="upload-doc-inp" autofocus required>
                                        @error('resume')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-3">
                                        <div class="document_pdf mt-2">
                                            <div class="upload_loader">
                                                <img src="{{ asset('images/asset/pdf_image.svg') }}" alt="image">
                                            </div>
                                            <div class="mx-2">
                                                <div class="uploadedPdf mx-2"></div>
                                            </div>
                                        </div>
                                    </div>

                                </label>
                            </div>
                        </div>
                        <div class="guide_profile_subsection">
                            <div class="guide_profile_main_text">Cover Letter <em class="text-danger">*</em></div>
                            <div class="profile_input form_elem">
                                <textarea name="cover_letter" class="form-control @error('cover_letter') is-invalid @enderror controlTextLength" text-length="1500" maxlength="1500" id="cover_letter" aria-label="With textarea" placeholder="Your answer here" required></textarea>
                                @error('cover_letter')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                            </div>
                            <div class="d-flex justify-content-center mt-5 mb-4">
                                <button type="button" class="cancel_btn mx-5"><a href="{{route('showJobSearchResults')}}">Back</a></button>
                                <button class="guide_profile_btn">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- Modal for Confirmation for account deactivate -->
<div class="modal fade" id="job_apply_success_modal" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
         <div class="d-flex justify-content-end m-2">
             <button type="button" class="simple_cross_btn" data-bs-dismiss="modal" aria-label="Close">X</button>
         </div>
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
                                        You have successfuly applied for this job.
                                    </div>
                                    <div class="pb-4">
                                        <a href="{{route('showJobSearchResults')}}" class="submit_btn mt-4 text-decoration-none text-light">Apply More</a>
                                    </div>
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
    $(".document_pdf").fadeOut(100)
    $("#apply_job_form").change(function(e) {
        $(".uploadedPdf").text("")
        let resume = $("#upload-doc-inp")[0].files[0]
        $(".document_pdf").fadeIn(100)
        $(".uploadedPdf").text(resume.name)
    })
    $("#apply_job_form").on("submit", function(e) {
        e.preventDefault();
        e.stopPropagation();
        let $submitBtn = $(".guide_profile_btn");
        $submitBtn.prop("disabled", true);
        $submitBtn.text("Submitting...");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
        let formData = new FormData();
        let resume = $("#upload-doc-inp")[0].files[0];
        let cover_letter = $("#cover_letter").val();
        formData.append("resume", resume)
        formData.append("cover_letter", cover_letter);
        console.log(resume, "cover_letter");
        let apiUrl = $(this).attr('action');
        $.ajax({
            type: 'post',
            data: formData,
            url: apiUrl,
            processData: false,
            contentType: false,
            success: function(resp) {
                $submitBtn.prop("disabled", false);
                $submitBtn.text("Submit");
                if (resp.status) {
                    $("#job_apply_success_modal").modal("show");
                } else {
                    let err_content = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Warning!</strong> ${resp.message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>`;
                    $("#err-container").html(err_content);
                }
            },
            error: function(error) {
                $submitBtn.prop("disabled", false);
                $submitBtn.text("Submit");
            }
        });
    });
</script>

@endpush