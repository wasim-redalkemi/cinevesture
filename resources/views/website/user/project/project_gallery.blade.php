@extends('website.layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-organisation')

@section('header')
@include('website.include.header')
@endsection

@section('content')
<div class="hide-me animation for_authtoast">
    @include('website.include.flash_message')
</div>
@include('website.user.project.project_pagination')


<!-- Gallery section -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="profile_wraper profile_wraper_padding mt-4">
                    <p class="flow_step_text pb-0">Gallery</p>
                    <div class="add_content_wraper">
                        <div class="guide_profile_main_text Aubergine_at_night mt-2">Videos</div>
                        <div class="row col_wrap">
                            <div class="col-md-3">
                                <div class="img-container h_66">
                                    <img src="{{ asset('images/asset/ba947a848086b8f90238636dcf7efdb5 1.png') }}" class="width_inheritence" alt="image">
                                    <div class="project_card_data w-100 h-100">
                                        <div>
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="profile_input">
                                        <input type="text" class="form-control" name="project_video_link_1" placeholder="Video Title">
                                    </div>
                                    <div class="d-flex checkbox_btn mt-5 mt-md-3">
                                         <input type="radio" class="checkbox_btn" name="" aria-label="">
                                        <div class="verified-text mx-2"> Make Feature Vedio</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="profile_upload_container h_66 mt-3 mt-md-0">
                                    <div class="text-center">
                                        <img src="" id="previewVid" onclick="document.getElementById('vidInp').click();">
                                        <div for="file-input" class="d-none">
                                            <input type="video" onchange="uploadVideoFile(this)" name="project_video_link_1" accept="" id="vidInp">
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
                    <div class="add_content_wraper">
                        <div class="guide_profile_main_text Aubergine_at_night mt-2">Photos</div>
                        <div class="row col_wrap">
                            <div class="col-md-3">
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
                                <div class="d-flex checkbox_btn mt-3">
                                    <input type="radio" class="checkbox_btn" name="" aria-label="">
                                    <div class="verified-text mx-2">Make thumbnail Image</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="profile_upload_container h_66 mt-3 mt-md-0">
                                    <img src="" id="previewImg">
                                    <div for="file-input input_wrap" class="d-none">
                                        <input type="file" onchange="uploadImageFile(this)" class="imgInp" id="456" name="project_image_1" accept=".jpg,.jpeg,.png">
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

                    <div class="add_content_wraper">
                        <div class="guide_profile_main_text Aubergine_at_night mt-3 mb-2">Documents</div>

                        <div class="row col_wrap">
                            <div class="col-md-3 add_new_doc_btn_wrap">
                                <div class="add_video_field mb-3">
                                    <button class="add_new_doc_btn save_add_btn">Add another</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-end mt-5">
                                <button class="cancel_btn mx-3">Go back</button>
                                <button class="guide_profile_btn">Save & Next</button>
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
@include('website.include.footer')
@endsection

@section('scripts')
<script>

    $(document).ready(function(){
        $("#error-toast").toast("show");
        $("#success-toast").toast("show");
    });
    
    $(document).ready(function() {
        $('.doc_container').hide();
        $('.open_file_explorer').click(function(e) {
            $(this).parents('.custom_file_explorer').find('.file_element').click();
        });

        $('.file_element').change(function() {
            var output = $(this).parents('.custom_file_explorer').find('.upload_preview');
            const file = this.files;
            var reader = new FileReader();
            reader.onload = function() {
                output.attr('src', reader.result);
            };
            reader.readAsDataURL(file[0]);
        });
    });



    // for doc
    function uploadDocFile(e) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('previewDoc');
            output.src = reader.result;
            console.log(output.src, "output.srcoutput.srcoutput.srcoutput.src")
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


    $(".doc_container").hide();
    $('.profile_upload_container').on("change", function(e) {
        // console.log(this.id);
        $("upload_doc").hide();
        $("doc_container").show();
    });





    $('.profile_upload_container .imgInp').on('click', function(e) {
        e.stopPropagation();
    });

    $(document).ready(function() {

        var new_doc_structure = '<div class="col-md-3"> <div class="doc_container" id=""><div class="upload_loader"><i class="fa fa-file-text -pink icon-size" aria-hidden="true"></i></div><div><div class="guide_profile_main_subtext Aubergine_at_night">Lorem ipsum.doc</div><div class="proctect_by_capta_text Aubergine_at_night">64.32 KB</div></div><div><i class="fa fa-times" aria-hidden="true"></i></div></div><div class="upload_doc"> <div class="profile_upload_container h_69 w-100 mt-3 mt-md-0 -flx"><div for="file-input" class="d-none"><input type="file" onchange="uploadDocFile(this)" name=""></div><div ><i class="fa fa-plus-circle deep-pink icon-size" aria-hidden="true"></i></div><div class="movie_name_text mx-3 mt-0">Upload file</div></div><div class="profile_upload_text">Upload PDF only</div></div></div></div>';

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
                $('<div class="add_new col-md-3"><div class=""><div class="profile_upload_container h_66 mt-3 mt-md-0"><div class="text-center"><div><i class="fa fa-plus-circle deep-pink icon-size" aria-hidden="true"></i></div><div class="mt-3 movie_name_text">Upload file</div></div></div><div class="profile_input"><input type="text" class="form-control" name="" placeholder="Paste Link Here"></div><div class="d-flex mt-5 mt-md-3"><div class="checkbox_btn"> <input type="radio" class="checkbox_btn" name="" aria-label=""></div><div class="verified-text mx-2"> Make Feature Vedio</div></div></div> </div>').insertBefore('.add_video_btn');
            }
        });
        $(add_img_button).click(function(e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $('<div class="add_new col-md-3"><div class=""><div class="profile_upload_container h_66 mt-3 mt-md-0">  <div class="text-center"><div><i class="fa fa-plus-circle deep-pink icon-size" aria-hidden="true"></i></div><div class="mt-3 movie_name_text">Upload file</div></div></div><div class="profile_input"><input type="text" class="form-control" name="" placeholder="Photo Title"></div><div class="d-flex mt-5 mt-md-3"><div class="checkbox_btn"> <input type="radio" class="checkbox_btn" name="" aria-label=""></div><div class="verified-text mx-2"> Make thumbnail image</div></div></div> </div>').insertBefore('.add_image_btn');
            }
        });
        $(add_button).click(function(e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                
            }
        });

        $('.add_new_doc_btn').on('click',function()
        {
            $(new_doc_structure).insertBefore('.add_new_doc_btn_wrap');
            // $(".doc_container").hide();
        });

        $('.doc_container').on('click',function()
        {
            alert('test');
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