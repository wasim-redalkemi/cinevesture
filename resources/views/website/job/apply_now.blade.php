@extends('website.layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-organisation')

@section('header')
@include('website.include.header')
@endsection

@section('content')

<section class="guide_profile_section my-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            @if ($errors->any())

            @foreach ($errors->all() as $error)
                
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Warning!</strong> {{ $error }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
            @endforeach
@endif
            </div>
            <div class="col-md-12 mt-sm-0">
                <div class="content_wraper">
                    <div class="guide_profile_subsection">
                        <div class="contact-page-text deep-aubergine">Apply For Job Name</div>
                    </div>

                    
                    <form action="{{route('storeApplyJob',['jobId'=>request('jobId')])}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="guide_profile_subsection" id="Documents">
                        <div class="guide_profile_main_text mt-3">Resume/CV</div>
                        <div class="guide_profile_main_subtext mt-3">Please Attach Your Resume</div>
                        <div id="Documents" class="add_content_wraper">
                            <label for="upload-doc-inp">
                                <div class="d-flex align-items-center mt-3">
                                    <div><i class="fa fa-paperclip aubergine icon-size" aria-hidden="true"></i></div>
                                    <div class="upload_resume_text mx-2">Upload Your Resume/CV <em class="text-danger">*</em></div>
                                    <input type="file" name="resume" class="docInp d-none" id="upload-doc-inp" required>
                                </div>
                            </label>
                        </div>
                    </div>
                    <div class="guide_profile_subsection">
                        <div class="guide_profile_main_text">Cover Letter <em class="text-danger">*</em></div>
                        <div class="profile_input">
                            <textarea name="cover_letter" class="form-control controlTextLength" text-length="1500" maxlength="1500" aria-label="With textarea" placeholder="Your answer here" required></textarea>
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

@endsection

@section('footer')
@include('website.include.footer')
@endsection