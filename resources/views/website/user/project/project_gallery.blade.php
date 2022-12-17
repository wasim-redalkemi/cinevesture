@extends('website.layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-organisation')

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
                <div class="profile_wraper profile_wraper_padding my-4">
                    <p class="flow_step_text pb-0">Gallery</p>
                    <div id="Videos" class="add_content_wraper">
                        <div class="row video-sec">
                            <div class="guide_profile_main_text Aubergine_at_night mt-2 mb-2">Videos</div>
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
                                        <div class="profile_upload_text">Upload JPG or PNG, 1600x900 PX, max size 4MB</div>
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
                            <div class="d-flex justify-content-end mt-5">
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
                                            <button type="button" class="cancel_btn cancel_btn_text mx-3" data-bs-dismiss="modal">Cancel</button>
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
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
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
            console.log("project_id "+project_id);
            // get the current video list from backend and load into the Gallary class.
            Videos.init(project_id);
            Photos.init(project_id);
            Docs.init(project_id);
        });
    </script>
    <script src="{{ asset('js/cropper.js') }}"></script>
@endpush

@section('footer')
@include('website.include.footer')
@endsection