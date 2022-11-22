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
                    <div class="guide_profile_subsection">
                        <div class="contact-page-text deep-aubergine">Apply For Job Name</div>
                    </div>
                    <div class="guide_profile_subsection" id="Documents">
                        <div class="guide_profile_main_text mt-3">Resume/CV</div>
                        <div class="guide_profile_main_subtext mt-3">Please Attach Your Resume</div>
                        <div id="Documents" class="add_content_wraper">
                            <label for="upload-doc-inp">
                                <div class="d-flex align-items-center mt-3">
                                    <div><i class="fa fa-paperclip aubergine icon-size" aria-hidden="true"></i></div>
                                    <div class="upload_resume_text mx-2">Upload Your Resume/CV</div>
                                    <input type="file" name="project_doc_1" class="docInp" id="upload-doc-inp" accept=".docx,.doc,.pdf,.jpg,.jpeg">
                                </div>
                            </label>
                        </div>
                    </div>
                    <div class="guide_profile_subsection">
                        <div class="guide_profile_main_text">Cover Letter</div>
                        <div class="profile_input">
                            <textarea class="form-control controlTextLength" text-length="1500" maxlength="1500" aria-label="With textarea" placeholder="Your answer here"></textarea>
                        </div>
                        <div class="d-flex justify-content-center mt-5 mb-4">
                            <button class="cancel_btn mx-5">Back</button>
                            <button class="guide_profile_btn">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('footer')
@include('website.include.footer')
@endsection