@extends('website.layouts.app',['class' => 'bg_white'])

{{-- @section('title','Cinevesture-organisation') --}}

@section('header')
@include('website.include.header')
@endsection

@section('content')
<div class="hide-me animation for_authtoast">
    @include('website.include.flash_message')
</div>
@include('website.user.project.project_pagination',['page_bg' => '4'])

<!-- Gallery section -->
<section id="gallery">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="profile_wraper profile_wraper_padding mt-4 mb_100">
                    <p class="plain_header pb-0">Gallery</p>
                    <div id="Videos" class="add_content_wraper">
                        <div class="row video-sec">
                            <div class="guide_profile_main_text Aubergine_at_night mt-2 mb-0 mb-md-2">Videos</div>
                                <div class="video-list row col_wrap">
                                    <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
                                    <!-- <div class="col-md-3">
                                        <div class="img-container h_66">
                                            <img src="{{ asset('images/asset/ba947a848086b8f90238636dcf7efdb5 1.png') }}" class="width_inheritence" alt="image">
                                            <div class="project_card_data w-100 h-100">
                                                <div>
                                                    <i class="fa fa-trash-o delete-media" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                            <div class="profile_input">
                                                <input type="text" class="form-control" name="project_video_link_1" placeholder="Video Title">
                                            </div>
                                            <div class="d-flex mt-5 mt-md-3">
                                                <div>
                                                    <input type="radio" class="checkbox_btn" name="" aria-label="">
                                                </div>
                                                <div class="mk-feature mx-2">Make Feature Video</div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- <div class="col-md-3">
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
                                        <div class="d-flex mt-5 mt-md-3">
                                            <div> <input type="radio" class="checkbox_btn" name="" aria-label=""></div>
                                            <div class="mk-feature mx-2">Make Feature Video</div>
                                        </div>
                                    </div>
                                    <div id="add-video-btn-div" class="col-md-3 add-another-item add_video_btn d-flex align-items-end">
                                        <div>
                                            <button class="add_video_field save_add_btn">Add another</button>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <div id="BannerPhoto" class="add_content_wraper">
                            <div class="row photo-sec">
                                <div class="guide_profile_main_text Aubergine_at_night mt-2">Banner Photo</div>
                                <!-- <div class="photo-list row col_wrap">
                                    <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
                                </div> -->
                                    <div class="col-md-3 mt-2 current-banner-div" style="display:none">
                                    <div class="img-container h_66">
                                        <img src="{{$projectgallery[0]->banner_image}}" class="" alt="image">
                                        <div class="title project_card_data w-100 h-100">
                                            <p>Banner</p>
                                        </div>
                                        <div class="delete-icon project_card_data w-100 h-100">
                                            <div>
                                                <i class="fa fa-trash-o delete-media" data-id="'+v.id+'" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mt-2 new-banner-div">
                                    <div class="open_file_explorer profile_upload_container h_66">
                                        <img src="" id="previewImg">
                                        <div id="cancel-img-upload" class="cancel-img-upload">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </div>
                                        <div class="progress-bar"><div class="fill-progress"></div></div>
                                        <div for="file-input input_wrap" class="d-none">
                                            <input type="file" class="imgInp" id="upload-banner-inp" name="project_image_1" accept=".jpg,.jpeg,.png">
                                        </div>
                                        <label for="upload-banner-inp">
                                            <div class="text-center">
                                                <div>
                                                    <i class="fa fa-plus-circle deep-pink plus-icon-size" aria-hidden="true"></i>
                                                </div>
                                                <div class="mt-3 movie_name_text">Upload file</div>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="profile_upload_text">Upload JPG or PNG, 1600x900 PX, max size 10MB</div>
                                </div>
                                <div class="col-md-2 mt-2 d-flex align-items-end">
                                    <div class="save_add_btn" style="display:none">Save</div>
                                </div>
                            </div>
                        </div>
                        <div id="Photos" class="add_content_wraper">
                            <div class="row photo-sec">
                                <div class="guide_profile_main_text Aubergine_at_night mt-2">Photos</div>
                                <div class="photo-list row col_wrap">
                                    <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
                                    <!-- <div class="col-md-3">
                                        <div class="img-container h_66">
                                            <img src="{{ asset('images/asset/ba947a848086b8f90238636dcf7efdb5 1.png') }}" class="width_inheritence" alt="image">
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
                                            <div class="verified-text mk-feature mx-2">Make thumbnail Image</div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="open_file_explorer profile_upload_container h_66">
                                            <img src="" id="previewImg">
                                            <div for="file-input input_wrap" class="d-none">
                                                <input type="file" class="imgInp" id="upload-img-inp" name="project_image_1" accept=".jpg,.jpeg,.png">
                                            </div>
                                            <label for="upload-img-inp">
                                                <div class="text-center">
                                                    <div>
                                                        <i class="fa fa-plus-circle deep-pink icon-size" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="mt-3 movie_name_text">Upload file</div>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="profile_input add-new-image">
                                            <input type="text" class="form-control" name="image_title" placeholder="Photo Title">
                                        </div>
                                        <div class="profile_upload_text">Upload JPG or PNG, 1600x900 PX, max size 10MB</div>
                                    </div>
                                    <div id="add-photo-btn-div" class="col-md-2 add_image_btn d-flex align-items-end">
                                        <div class="add_img_field mb-5">
                                            <button class="save_add_btn">Add another</button>
                                        </div>
                                    </div> -->
                                </div>
                        </div>
                    </div>
                    <div id="Documents" class="add_content_wraper">
                        <div class="guide_profile_main_text Aubergine_at_night mt-3 mb-2">Documents</div>
                        <div class="doc-list row col_wrap">
                            <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
                            <!-- <div class="col-md-3">
                                <div class="doc_container" id="">
                                    <div class="upload_loader">
                                        <i class="fa fa-file-text -pink icon-size" aria-hidden="true"></i>
                                    </div>
                                    <div>
                                        <div class="guide_profile_main_subtext Aubergine_at_night">Lorem ipsum.doc</div>
                                        <div class="proctect_by_capta_text Aubergine_at_night">64.32 KB</div>
                                    </div>
                                    <div>
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="upload_doc">
                                    <div class="profile_upload_container h_69 w-100 mt-3 mt-md-0 -flx">
                                        <div for="file-input" class="d-none">
                                            <input type="file" onchange="uploadDocFile(this)" name="" accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf">
                                        </div>
                                        <div>
                                            <i class="fa fa-plus-circle deep-pink icon-size" aria-hidden="true"></i>
                                        </div>
                                        <div class="movie_name_text mx-3 mt-0">Upload file</div>
                                    </div>
                                    <div class="profile_upload_text">Upload PDF only</div>
                                </div>
                            </div>
                            <div id="add-doc-btn-div" class="row col_wrap">
                                <div class="col-md-3 add_new_doc_btn_wrap">
                                    <div class="add_video_field mb-3">
                                        <button class="add_new_doc_btn save_add_btn">Add another</button>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-end mt-2 mt-md-5">
                                <button class="cancel_btn mx-3"><a class="" href="{{ route('project-description') }}?id={{$_REQUEST['id']}}">Go back</a></button>
                                <input type="hidden" name="project_id" value="<?php if(isset($_REQUEST['id'])) {echo $_REQUEST['id'];}?>">
                                {{-- <button type="submit" class="guide_profile_btn"><a class="ancor-link-style" href="{{ route('project-milestone') }}?id={{$_REQUEST['id']}}">Save & Next</a></button> --}}

                                <a href="{{ route('project-milestone') }}?id={{$_REQUEST['id']}}"><button  class="guide_gallery_btn">Save & Next</button></a>

                            </div>
                        </div>
                    </div>
                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
  </div>
    <div class="col-md-5 mt-2 mt-md-0">             
        <button type="button" class="deactivate_btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="display:none">Deactivate account</button>
            <!-- Modal for Confirmation for account deactivate -->
        <div class="modal fade" id="staticBackdrop"   tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body" style="padding: 0px;">
                        <div class="container"style="padding: 0px;" >
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="modal_container">
                                        <div class="icon_container warning">
                                            <i class="fa fa-times icon_style" aria-hidden="true"></i>
                                        </div>
                                        <div class="head_text mt-4">Are you sure?</div>
                                        <div class="sub_text mt-4">Do you really want to delete the item?<br>This process cannot be undone.</div>
                                        <div class="d-flex justify-content-center mt-4">
                                            <button type="button" class="cancel_btn_modal cancel_btn_text mx-3" data-bs-dismiss="modal">Cancel</button>
                                            <button class="delete_btn confirm_btn_text mx-3" type="button" data-bs-dismiss="modal">Confirm</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- cropper  -->                            
    <div class="modal fade" id="ImageCropperModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content croper_modal">
                                        <div class="modal-header py-1">
                                            <h6 class="modal-title tile_text" id="modalLabel"> Image Cropper</h6>
                                            <div class="d-flex jutify-content-center">
                                                <button type="button" class="mx-2 btn-danger" id="crop-cancel" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
                                                <button type="button" class="btn-success" id="crop"><i class="fa fa-check" aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                        <div class="modal-body overflow-auto">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="cropperWrap">
                                                            <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
    <script>
        $(document).ready(function(){
            project_id = $("input[name=project_id]").val();
            // get the current video list from backend and load into the Gallary class.
            Videos.init(project_id);
            BannerImage.init(project_id);
            Photos.init(project_id);
            Docs.init(project_id);
        });
    </script>
    <script src="{{ asset('js/cropper.js') }}"></script>
    <script>
        // Banner Phot page script 
        var BannerImage = function () {
            var project_id = null;
            var parentElemId = "#BannerPhoto";
            var currentBanner = '{{$projectgallery[0]->banner_image}}';
            var uploadedFile = null;
            var ImageCropperObj = null;

            let init = function(id){
                if(currentBanner){
                    $(parentElemId+" .new-banner-div").hide();
                    $(parentElemId+" .current-banner-div").show();
                }
                project_id = id;
                if(!id){
                    return;
                }
                bindActions();
            }

            let bindActions = function (){
                $(parentElemId+" input#upload-banner-inp").off("change").on("change",function uploadImageFile(e) {
                    uploadedFile = this.files[0];
                    if (uploadedFile) {
                        ImageCropperObj = new ImageCropper(uploadedFile,parentElemId+" #previewImg");
                        ImageCropperObj.setCropBoxSize({'width':6*300,height:2*300});
                        ImageCropperObj.setAspectRatio(3/1);
                        ImageCropperObj.setAfterCrop(function(){
                            console.log("after crop called");
                            if(ImageCropperObj.getBase64()){
                                $(parentElemId+" .open_file_explorer label").hide();
                                $(parentElemId+" .profile_upload_text").hide();
                                $(parentElemId+" .profile_input.add-new-image").show();
                                $(parentElemId+" .cancel-img-upload").show();
                                $(parentElemId+" .save_add_btn").show();
                            } else {
                                console.log("cropper cancelled");
                            }
                        });
                        let ret = ImageCropperObj.init();
                        // ImageCropperObj.setAfterCrop(AfterCropCallback);
                        // $("#previewImg").attr("src",URL.createObjectURL(file)).show();
                    }
                });

                $(parentElemId+ " .save_add_btn").off("click").on("click",function(){
                    uploadImage();
                });

                $(parentElemId+" .delete-media").off("click").on("click",(e)=>{
                    //alert("Add delete confirmation here");
                    $(parentElemId+" .new-banner-div").show();
                    //$(parentElemId+" .current-banner-div .img-container img").attr('src',resp.payload.url)
                    $(parentElemId+" .current-banner-div").hide();
                    $(parentElemId+" .save_add_btn").hide();
                });

                $(parentElemId+" #cancel-img-upload").off("click").on("click",(e)=>{
                    $(parentElemId+" input#upload-banner-inp").val("")
                    $(parentElemId+" #previewImg").attr("src","").hide();
                    $(parentElemId+" .open_file_explorer label").show();
                    $(parentElemId+" .profile_upload_text").show();
                    $(parentElemId+" .profile_input.add-new-image").hide();
                    $(parentElemId+" .cancel-img-upload").hide();
                    $(parentElemId+" .save_add_btn").hide();
                    uploadedFile = null;
                });
            }

            let progressHandling = function (event){
                var percent = 0;
                var position = event.loaded || event.position;
                var total = event.total;
                if (event.lengthComputable) {
                    percent = Math.ceil(position / total * 100);
                }
                // update progressbars classes so it fits your code
                $(parentElemId + " .progress-bar").show();
                $(parentElemId + " .progress-bar .fill-progress").css("width", +percent + "%");
                $(parentElemId + " .status").text(percent + "%");
            }

            let AfterCropCallback = function(){
                console.log("after cropper callback called");
                //uploadImage();
            }

            let uploadImage = function(){
                console.log("uploading file");
                var croppedImg = ImageCropperObj.getCropperFile();
                console.log("croppedImg = "+BaseUrl+"ajax/upload-image",croppedImg);
                var formData = new FormData();
                formData.append("file", croppedImg, uploadedFile.name);
                formData.append("project_id", project_id);
                formData.append("isBanner", 1);
                $.ajax({
                    type: "POST",
                    url: BaseUrl+"ajax/upload-image",
                    xhr: function () {
                        var myXhr = $.ajaxSettings.xhr();
                        if (myXhr.upload) {
                            myXhr.upload.addEventListener('progress', progressHandling, false);
                        }
                        return myXhr;
                    },
                    success: function (data) {
                        let resp = JSON.parse(data);
                        console.log("success data ",resp);
                        uploadedFile = null;
                        addPhotoCallback(resp);
                    },
                    error: function (error) {
                        // handle error
                        console.log("AJAX error ",error);
                        createToast("Something went wrong","E");
                    },
                    async: true,
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    timeout: 60000
                });
            };

            let addPhotoCallback = function(resp){
                if(resp.status == 1){
                    // createToast("Banner added","S");
                    toastMessage("success", "Banner image add successfully");
                    $(parentElemId+" .new-banner-div").hide();
                    $(parentElemId+" .current-banner-div .img-container img").attr('src',resp.payload.url)
                    $(parentElemId+" .current-banner-div").show();
                    $(parentElemId+" .save_add_btn").hide();
                } else {
                    toastMessage("error", "Something went wrong");
                }
            }

            return {
                init
            }

        }();


    </script>
@endpush

@section('footer')
@include('website.include.footer')
@endsection
