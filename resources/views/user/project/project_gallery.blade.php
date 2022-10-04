@extends('layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-organisation')

@section('header')
@include('include.header')
@endsection

@section('content')
@include('user.project.project_pagination')


<!-- Gallery section -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="profile_wraper profile_wraper_padding mt-4">
                    <form role="form" method="POST" enctype="multipart/form-data" action="{{route('project-gallery-store',['id' => $user->id ])}}">
                        @csrf
                        <p class="flow_step_text pb-0">Gallery</p>
                        <div class="guide_profile_main_text Aubergine_at_night mt-2">Videos</div>
                        <div class="add_video_wrap">
                            <div class="row col_wrap">
                                <div class="col-md-3">
                                    {{-- <input type="text" name="project_video_link_1" placeholder="video link 1">
                                    <input type="text" name="project_video_link_2" placeholder="video link 2">
                                    <input type="text" name="project_video_link_3" placeholder="video link 3"> --}}
                                    <div class="img-container h_66">
                                        <img src="{{ asset('public/images/asset/ba947a848086b8f90238636dcf7efdb5 1.png') }}" class="width_inheritence" alt="image">
                                        <div class="project_card_data w-100 h-100">
                                            <div>
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="profile_input">
                                        {{-- <input type="text" class="form-control" name="project_video_link_1" placeholder="Video Title"> --}}
                                    </div>
                                    <div class="d-flex mt-5 mt-md-3">
                                        <div> <input type="radio" class="checkbox_btn" name="" aria-label=""></div>
                                        <div class="verified-text mx-2"> Make Feature Vedio</div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="profile_upload_container h_66 mt-3 mt-md-0">
                                        <div class="text-center">
                                            <img src="" id="previewVid" onclick="document.getElementById('vidInp').click();">
                                            <div for="file-input" class="d-none">
                                                {{-- <input type="video" onchange="uploadVideoFile(this)" name="project_video_link_1" accept="" id="vidInp"> --}}
                                            </div>
                                            <div onclick="document.getElementById('vidInp').click();">
                                                <i class="fa fa-plus-circle deep-pink icon-size" aria-hidden="true"></i>
                                            </div>
                                            <div class="mt-3 movie_name_text">Upload file</div>
                                        </div>
                                    </div>
                                    <div class="profile_input">
                                        <input type="text" class="form-control" name="project_video_link_1" placeholder="Paste Link Here">
                                    </div>
                                </div>

                                <div class="col-md-3 add_video_btn d-flex align-items-end">
                                    <div class=" mb-5">
                                        <button class="add_video_field save_add_btn">Add another</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="guide_profile_main_text Aubergine_at_night mt-2">Photos</div>
                        <div class="">
                            <div class="row col_wrap">
                                <div class="col-md-3">
                                    
                                    {{-- <input type="file" name="project_image_1" placeholder="video link 1">
                                    <input type="file" name="project_image_2" placeholder="video link 2">
                                    <input type="file" name="project_image_3" placeholder="video link 3"> --}}
                                    <div class="img-container h_66">
                                        <img src="{{ asset('public/images/asset/ba947a848086b8f90238636dcf7efdb5 1.png') }}" class="width_inheritence" alt="image">
                                        <div class="project_card_data w-100 h-100">
                                            <div>
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="profile_input">
                                        <input type="text" class="form-control" name="" placeholder="Photo Title">
                                    </div>
                                    <div class="d-flex mt-3">
                                        <input type="radio" class="checkbox_btn" name="" aria-label="">
                                        <div class="verified-text mx-2">Make thumbnail Image</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    
                                    <div class="profile_upload_container h_66 mt-3 mt-md-0">
                                        <img src="" id="previewImg">                                    
                                        <div for="file-input input_wrap" class="d-none">
                                            <input type="file" onchange="uploadImageFile(this)" class="imgInp" id="456" name="project_image_1" accept=".jpg,.jpeg,.png" >
                                        </div>
                                        <div class="text-center">
                                            <div>
                                                <i class="fa fa-plus-circle deep-pink icon-size" aria-hidden="true"></i>
                                            </div>
                                            <div class="mt-3 movie_name_text">Upload file</div>
                                        </div>
                                    </div>
                                    
                                    <div class="profile_upload_text">Upload JPG or PNG, 1600x900 PX, max size 4MB</div>
                                </div>
                                <div class="col-md-2 add_image_btn d-flex align-items-end">
                                    <div class="add_img_field mb-5">
                                        <button class="save_add_btn">Add another</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="guide_profile_main_text Aubergine_at_night mt-3 mb-2">Documents</div>
                        <div class="row col_wrap">
                            <div class="col-md-3">
                                
                                {{-- <input type="file" name="project_docs_1" placeholder="video link 1">
                                <input type="file" name="project_docs_2" placeholder="video link 2">
                                <input type="file" name="project_docs_3" placeholder="video link 3"> --}}
                                <div class="document_pdf">
                                    <div class="upload_loder">
                                        <i class="fa fa-file-text deep-pink icon-size" aria-hidden="true"></i>
                                    </div>
                                    <div>
                                        <div class="guide_profile_main_subtext Aubergine_at_night">Lorem ipsum.pdf</div>
                                        <div class="proctect_by_capta_text Aubergine_at_night">64.32 KB</div>
                                    </div>
                                    <div><i class="fa fa-times" aria-hidden="true"></i></div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="profile_upload_container h_69 mt-3 mt-md-0 d-flx">
                                    {{-- <input class="d-none" id="previewPdf" type="file" name="project_docs_1" /> --}}
                                    <div for="file-input" class="d-none">
                                        <input type="file" onchange="uploadPdfFile(this)" name="project_docs_1" id="pdfInp" accept="application/pdf,application/vnd.ms-excel">
                                    </div>
                                    <div onclick="document.getElementById('pdfInp').click();">
                                        <i class="fa fa-plus-circle deep-pink icon-size" aria-hidden="true"></i>
                                    </div>
                                    <div onclick="document.getElementById('pdfInp').click();" class=" movie_name_text mx-3 mt-0">Upload file</div>
                                </div>
                                <div class="profile_upload_text">Upload PDF only</div>
                            </div>

                            <div class="col-md-3 add_pdf_btn d-flex align-items-end">
                                <div class="add_video_field mb-3">
                                    <button class="save_add_btn">Add another</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-end mt-5">
                                    <button class="cancel_btn mx-3">Go back</button>
                                    <button class="guide_profile_btn" type="submit">Save & Next</button>
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

@section('footer')
@include('include.footer')
@endsection

@section('scripts')
<script>
    // for pdf
    function uploadPdfFile(e) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('previewPdf');
            output.src = reader.result;
        };
        reader.readAsDataURL(e.files[0]);
    }
    // for image 
    function uploadImageFile(e) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('previewImg');
            output.src = reader.result;
        };
        reader.readAsDataURL(e.files[0]);
    }
    // for video 
    function uploadVideoFile(e) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('previewVid');
            output.src = reader.result;
        };
        reader.readAsDataURL(e.files[0]);
    }

    
    $('.profile_upload_container').on("click",function(e) {
        $(this).find('input[type="file"]').click();
    });
    $('.profile_upload_container .imgInp').on('click',function(e) {
        e.stopPropagation();
    });

    $(document).ready(function() {

        // $(document).ready(function() {
            $('.profile_upload_container').bind('click');
            var max_fields = 10; //maximum input boxes allowed
            var wrapper = $(".col_wrap"); //Fields wrapper
            var add_button = $(".add_video_field"); //Add button ID
            var add_img_button = $(".add_img_field");
            var imgwrapper = $(".add_img_wrap"); //Img Fields wrapper

            var x = 1; //initlal text box count
            $(add_button).click(function(e) { //on add input button click
                e.preventDefault();
                if (x < max_fields) { //max input box allowed
                    x++; //text box increment
                    $('<div class="add_new col-md-3"><div class=""><div class="profile_upload_container h_66 mt-3 mt-md-0"><div class="text-center"><div><i class="fa fa-plus-circle deep-pink icon-size" aria-hidden="true"></i></div><div class="mt-3 movie_name_text">Upload file</div></div></div><div class="profile_input"><input type="text" class="form-control" name="" placeholder="Paste Link Here"></div><div class="d-flex mt-5 mt-md-3"><div> <input type="radio" class="checkbox_btn" name="" aria-label=""></div><div class="verified-text mx-2"> Make Feature Vedio</div></div></div> </div>').insertBefore('.add_video_btn');
                }
            });
            $(add_img_button).click(function(e) { //on add input button click
                e.preventDefault();
                if (x < max_fields) { //max input box allowed
                    x++; //text box increment
                    $('<div class="add_new col-md-3"><div class=""><div class="profile_upload_container h_66 mt-3 mt-md-0">  <div class="text-center"><div><i class="fa fa-plus-circle deep-pink icon-size" aria-hidden="true"></i></div><div class="mt-3 movie_name_text">Upload file</div></div></div><div class="profile_input"><input type="text" class="form-control" name="" placeholder="Photo Title"></div><div class="d-flex mt-5 mt-md-3"><div> <input type="radio" class="checkbox_btn" name="" aria-label=""></div><div class="verified-text mx-2"> Make thumbnail image</div></div></div> </div>').insertBefore('.add_image_btn');
                }
            });
            $(add_button).click(function(e) { //on add input button click
                e.preventDefault();
                if (x < max_fields) { //max input box allowed
                    x++; //text box increment
                    $('<div class="add_new col-md-3"> <div> <div class="profile_upload_container h_69 w-100 mt-3 mt-md-0 -flx"><div id="previewPdf"></div><div for="file-input" class="d-none"><input type="file" onchange="uploadPdfFile(this)" name="" id="pdfInp"></div><div onclick="document.getElementById("pdfInp").click();"><i class="fa fa-plus-circle deep-pink icon-size" aria-hidden="true"></i></div><div onclick="document.getElementById("pdfInp").click();" class="movie_name_text mx-3 mt-0">Upload file</div></div><div class="profile_upload_text">Upload PDF only</div></div></div>').insertBefore('.add_pdf_btn');
                }
            });


            $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
                e.preventDefault();
                $(this).parents('.add_new').remove();
                x--;
            })
        // });
    });
</script>
@endsection