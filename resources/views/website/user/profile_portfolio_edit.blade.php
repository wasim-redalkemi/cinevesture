@extends('website.layouts.app',['class' => 'bg_white'])

{{-- @section('title','Cinevesture-portfolio') --}}

@section('header')
    @include('website.include.header')
@endsection

@section('content')
    <section class="profile-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3">                
                    @include('website.include.profile_sidebar')
                </div>
                <div class="col-md-9">
                    @if(isset($prevPortfolio) && count($prevPortfolio)>0)
                        @include('website.user.include.previously_added_portfolio',['prevData'=>$prevPortfolio])
                    @endif
                    <div id="edit-portfolio-div" class="profile_wraper profile_wraper_padding mt-md-0 mt-4">
                        <div class="d-flex justify-content-between">
                            <div class="profile_cmn_head_text">Edit Portfolio
                                    <span data-toggle='tooltip' title='A portfolio showcases your skills and abilities through completed projects and samples.'>
                                        <span class="dot">
                                            <i class="fa fa-info p-9" aria-hidden="true"></i>
                                        </span>
                                    </span>
                            </div>
                            
                            <div>
                                <a class="confirmAction" href="{{route('portfolio-delete',['id'=>$UserPortfolioEdit[0]['id']])}}">
                                    <img src="{{ asset('images/asset/delete-icon.svg') }}"/>
                                    {{-- <i class="fa fa-trash-o  deep-pink icon-size" aria-hidden="true"></i> --}}
                                </a>
                            </div>
                        </div>                        
                        <form role="form" class="validateBeforeSubmit" method="POST" onsubmit="return imgFormValitation()" enctype="multipart/form-data" action="{{ route('portfolio-edit-store',['id'=>$UserPortfolioEdit[0]['id']]) }}">
                            @csrf
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="profile_input mb-1">
                                        <label>Portfolio Title <span class = "steric_sign_design">*</span></label>
                                        <input type="text" class="form-control @error('portfolio_title') is-invalid @enderror" placeholder="Portfolio Title" name="portfolio_title" value="<?php if(isset($UserPortfolioEdit[0]->portfolio_title)){ echo($UserPortfolioEdit[0]->portfolio_title); }?>" aria-label="Username" aria-describedby="basic-addon1">
                                        @error('portfolio_title')
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
                                    <textarea class="form-control controlTextLength @error('description') is-invalid @enderror" text-length = "600" maxlength="600" name="description" aria-label="With textarea"><?php if(isset($UserPortfolioEdit[0]->description)){ echo($UserPortfolioEdit[0]->description); }?></textarea>
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
                                <div class="col-md-6">
                                <div class="profile_input">
                                    <label for="lang">Portfolio specific Skills <span class = "steric_sign_design">*</span></label>
                                    <select name="project_specific_skills_id[]" class="outline js-select2 @error('project_specific_skills_id') is-invalid @enderror" id="lang" multiple>
                                        @foreach ($skills as $k=>$v)
                                            <option
                                                @php
                                                if (count($user_portfolio_skill)) {
                                                    foreach ($user_portfolio_skill as $key => $value) {
                                                        if ($value['project_specific_skills_id'] == $v->id) {
                                                            echo 'selected';
                                                        }
                                                    }
                                                }
                                                @endphp
                                                value="{{ $v->id }}">{{  $v->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('project_specific_skills_id')
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
                                        <label for="lang">Portfolio Location (Where it took place) <span class = "steric_sign_design">*</span></label>
                                        <select name="project_country_id[]" class="outline js-select2 @error('project_country_id') is-invalid @enderror" id="lang" multiple>
                                        @foreach ($country as $k=>$v)
                                            <option
                                                @php
                                                if (count($user_portfolio_location)) {
                                                    foreach ($user_portfolio_location as $key => $value) {
                                                        if ($value['location_id'] == $v->id) {
                                                            echo 'selected';
                                                        }
                                                    }
                                                }
                                                @endphp
                                            value="{{ $v->id }}">{{  $v->name }}</option>
                                        @endforeach
                                        </select>
                                        @error('project_country_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>                            
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="profile_input">
                                        <label>Completion Date <span class = "steric_sign_design">*</span></label>
                                        <input id="date" type="date" class="form-control @error('completion_date') is-invalid @enderror" name="completion_date" value="{{ date("Y-m-d",strtotime($UserPortfolioEdit[0]->completion_date)) }}"
                                        aria-label="" aria-describedby="basic-addon1">
                                        @error('completion_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="mt-3">Video Link <span class = "steric_sign_design">*</span></label>
                                @if($UserPortfolioEdit[0]->video)
                                <div class="col-md-4">
                                    <div id="portfolio-video" class="profile_input">
                                        <div class="img-container h_66 mt-3 mt-md-0">
                                            @if (is_null($UserPortfolioEdit[0]->video['video_thumbnail']))
                                            <img src="{{asset('images/asset/default-video-thumbnail.jpg')}}" class="width_inheritence" alt="image">
                                            @endif
                                            <img src="{{asset($UserPortfolioEdit[0]->video['video_thumbnail'])}}" class="width_inheritence" alt="image">
                                        </div>
                                        <input type="url"   id="videoFormValid" class="form-control @error('video') is-invalid @enderror" placeholder="Paste link here" name="video_url" value="<?php if(isset($UserPortfolioEdit[0]->video['video_url'])){ echo($UserPortfolioEdit[0]->video['video_url']); }?>" aria-label="Username" aria-describedby="basic-addon1">
                                        <input type="hidden" class="" name="video_thumbnail" value="{{asset($UserPortfolioEdit[0]->video['video_thumbnail'])}}" aria-label="Video Thumbnail" aria-describedby="basic-addon1">
                                        @error('video')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="intro-video for_error_msg" style="display:none">
                                            <strong>Only youtube and vimeo URLs are allowed.</strong>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <div class="col-md-4">
                                    <div id="portfolio-video" class="profile_input">
                                        <div class="img-container h_66 mt-3 mt-md-0">
                                            <img src="{{asset('images/asset/default-video-thumbnail.jpg')}}" class="width_inheritence" alt="image">
                                        </div>
                                        <input type="url" class="form-control  @error('video') is-invalid @enderror" placeholder="Paste link here" name="video_url" value="<?php if(isset($UserPortfolioEdit[0]->video['video_url'])){ echo($UserPortfolioEdit[0]->video['video_url']); }?>" aria-label="Username" aria-describedby="basic-addon1">
                                        <input type="hidden" class=""  name="video_thumbnail" value="" aria-label="Video Thumbnail" aria-describedby="basic-addon1">
                                        @error('video')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                @endif                                              
                            </div>
                            <div class="row portfolio-images">
                                <label class="mt-3">Pictures <span class = "steric_sign_design">*</span></label>
                                @foreach($UserPortfolioImages as $pfimg)
                                <div id="portfolio-img-{{$pfimg->id}}" class="col-md-4 img-item">
                                    <div class="open_file_explorer profile_upload_container h_66">
                                        <img src="{{asset('storage/'.$pfimg->file_link)}}" id="previewImg" style="display:block">
                                        <div class="cancel-img-upload delete" style="display:block">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <div id="portfolio-img-new-{{count($UserPortfolioImages)+1}}" class="col-md-4 img-item">
                                    <div class="open_file_explorer profile_upload_container h_66">
                                        <img src="" id="previewImg">
                                        <div class="cancel-img-upload cancel">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </div>
                                        <div class="progress-bar">
                                            <div class="fill-progress"></div>
                                        </div>
                                        <div for="file-input input_wrap" class="d-none">
                                            <input type="file" class="imgInp" id="upload-img-inp-new-{{count($UserPortfolioImages)+1}}" name="portfolio-image-{{count($UserPortfolioImages)+1}}" accept=".jpg,.jpeg,.png"   required>
                                            <input type="hidden" class="imgInp" id="cropped-upload-img-inp-new-{{count($UserPortfolioImages)+1}}" name="cropped-portfolio-image-{{count($UserPortfolioImages)+1}}">
                                        </div>
                                        <label for="upload-img-inp-new-{{count($UserPortfolioImages)+1}}">
                                            <div class="text-center">
                                                <div><i class="fa fa-plus-circle deep-pink icon-size" aria-hidden="true"></i></div>
                                                <div class="mt-3 movie_name_text">Upload Image</div>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="profile_upload_text">Upload JPG or PNG, 1600x900 PX, max size 10 MB</div>
                                    
                                </div>
                                <div class="intro-img for_error_msg" style="display:none">
                                    <strong>This field is required.</strong>
                                </div>
                                <input type="hidden" value="" class="portfolio_images_count @error('portfolio_images_count') is-invalid @enderror" name="portfolio_images_count"/>
                                @error('portfolio_images_count')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex flex-wrap justify-content-start justify-content-md-end mt-4">
                                    <button class="cancel_btn mx-0 mx-md-3">Cancel</button>
                                    {{-- <button class="save_add_btn">Save & add another</button> --}}
                                    {{-- <button type="button" name="saveAndAnother" value="false" class="portfolio_save_btn save_add_btn">Save & add another</button> --}}
                                    <input type="hidden" id="save_btn_value" name="saveButtonType" value="">

                                    <input type="hidden" name="portfolio_id" value="{{ $UserPortfolioEdit[0]['id']  }}">
                                    {{-- <button type="submit" class="guide_profile_btn mx-0 mx-md-3">Save & next</button> --}}
                                    <button type="button" name="saveAndNext" value="false" class="portfolio_save_btn guide_profile_btn mx-0 mx-md-3">Save</button>

                                    </div>
                                </div>
                            </div>
                        </form>
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
                                                <!-- <div class="col-md-1"></div> -->
                                                <div class="col-md-12">
                                                    <div class="cropperWrap">
                                                        <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                                                    </div>
                                                </div>
                                                <!-- <div class="col-md-1"></div> -->
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
    </section>
</section>
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

    var portfolio = [];
    $(document).ready(function(){
        portfolioData = JSON.parse('<?php echo str_replace("'","\'",json_encode($UserPortfolioEdit));?>');
        portfolioData[0]['images'] = JSON.parse('<?php echo str_replace("'","\'",json_encode($UserPortfolioImages));?>');
        Portfolio.init(portfolioData);
        $("#error-toast").toast("show");
        $("#success-toast").toast("show");
    });

    var Portfolio = function(){
        var portfolio_id = null;
        var user_id = null;
        var parentElemId = "#edit-portfolio-div";
        var maxImgCnt = 15;

        let init = function(portfolioData){
            user_id = portfolioData.user_id;
            portfolio_id = portfolioData.id;
            bindActions();
            updateImageUploadCount();
            setError();
        }

        let setError = function (){
            if($("span.invalid-feedback").length > 0){
                $('html, body').animate({
                    scrollTop: ($("span.invalid-feedback")[0].offsetTop - 400)
                }, 100);
            }
            let error = $(parentElemId+" .portfolio-images span.invalid-feedback").length;
            if($(parentElemId+" .portfolio-images span.invalid-feedback").length > 0){
                $(parentElemId+" .portfolio-images .profile_upload_container").addClass('error-img-border');
            }
        }

        let unsetError = function (){
            $(parentElemId+" .portfolio-images .profile_upload_container").removeClass('error-img-border');
        }

        let doAjax = function(url,reqData,method,callback) {
            $.ajax({
                url: BaseUrl+url,
                type: method,
                data: reqData,
                success: function(result){
                    //alert(result);
                    callback(reqData,JSON.parse(result));
                },
                error: function(result){
                    let errorsHtml = "";
                    $.each(result.responseJSON.errors,(i,n)=>{
                        errorsHtml += n+"<br>";
                    });
                    createToast(errorsHtml,"E");
                }
            });
        }

        let isValidYoutubeUrl = function (link) {
            let domain = (new URL(link));
            let hostname = domain.hostname.replaceAll(".","");
            return (hostname.indexOf("youtube") > -1) ? true : false;
        }

        let bindActions = function (){
            $(parentElemId + " #portfolio-video input[name='video_url']").off('blur').on('blur',(e)=>{
                let link = e.target.value;
                if(link && validateUrl(link)){
                    // console.log("link blurred - "+link);
                    if(link.indexOf("vimeo.com") > -1){
                        //let reqData = {'vidUrl': "https://vimeo.com/336812686"};
                        let reqData = {'vidUrl': link};
                        doAjax("ajax/get-video-details",reqData,"POST",getVideoDataCallback);
                    } else if(isValidYoutubeUrl(link)) {
                        //let reqData = {'vidUrl': "https://www.youtube.com/watch?v=ZdbQ_FvNBZA&t=915s&ab_channel=ScaleupAlly"};
                        let reqData = {'vidUrl':link};
                        doAjax("ajax/get-video-details",reqData,"POST",getVideoDataCallback);
                    } else {
                        //show error
                        // alert("Invalid video url. Only Vimeo and Youtube links are allowed.");
                        // console.log("Invalid video url. Only Vimeo and Youtube links are allowed.");
                    }
                } else if (link != ''){
                    createToast("Please enter a valid video your.<br>Only Vimeo and Youtube links are allowed.","E");
                }
            });

            $(parentElemId+" input.imgInp").off("change").on("change",function uploadImageFile(e) {
                var done = function(url) {
                    image.src = url;
                    $modal.modal('show');
                };
                unsetError();
                $(parentElemId+" .portfolio-images span.invalid-feedback").remove();
                let imgId = "#"+$(e.target).parents('.img-item').attr('id'); 
                let croppedImgContainerId = imgId.replace("#portfolio-img","#cropped-upload-img-inp");
                const [file] = this.files
                uploadedFile = this.files[0];
                var ImageCropperObj = new ImageCropper(uploadedFile, imgId+" #previewImg");
                ImageCropperObj.setCropBoxSize({'width':300*2,height:200*2});
                ImageCropperObj.setAspectRatio(3/2);
                ImageCropperObj.setAfterCrop(function(){
                    if(ImageCropperObj.getBase64()){
                        $(parentElemId + " " + imgId + " .open_file_explorer label").hide();
                        $(parentElemId + " " + imgId + " .profile_upload_text").hide();
                        $(parentElemId + " " + imgId + " .cancel-img-upload").show();
                        addImgUploadElem();
                        $(parentElemId+" "+croppedImgContainerId).val(ImageCropperObj.getBase64());
                    } else {
                        // console.log("cropper cancelled");
                    }
                });
                let ret = ImageCropperObj.init();
            });

            $(parentElemId+" .cancel-img-upload.cancel").off("click").on("click",function cancelImgUpload(e) {
                let imgId = "#"+$(e.target).parents('.img-item').attr('id');
                $(imgId).remove();
            });

            $(parentElemId+" .cancel-img-upload.delete").off("click").on("click",function deleteImgUpload(e) {
                let imgId = "#"+$(e.target).parents('.img-item').attr('id');
                imgId = imgId.split("-")[2];
                setModal("","","Yes, Delete","");
                $(".deactivate_btn").click();
                $(".modal-body button.delete_btn").off("click").click((e)=>{
                    doAjax("ajax/delete-portfolio-img/"+imgId,{"imgId":imgId},"DELETE",(req,resp)=>{
                        if(resp.status == 1){
                            // createToast("Image deleted successfully.","S");
                            toastMessage("success","Image deleted successfully");
                            $(parentElemId+" #portfolio-img-"+imgId).remove();
                            updateImageUploadCount();
                        } else {
                            createToast(resp.error_msg,"E");
                        }
                    });
                });
            });

            $(parentElemId+" .portfolio-images .save_add_btn").off("click").on("click",()=>{
                addImgUploadElem();
            });
        }

        let getVideoDataCallback = function(req,resp){
            if(resp.status == 1){
                if(resp.payload.src == 'vimeo'){
                    $(parentElemId + " #portfolio-video .img-container img").attr('src',resp.payload.thumbnail_medium);
                    $(parentElemId + " #portfolio-video input[name='video_thumbnail']").val(resp.payload.thumbnail_medium);
                } else if (resp.payload.src == 'youtube'){
                    let thumbnail_url = resp.payload['items'][0]['snippet']['thumbnails']['high']['url'];
                    $(parentElemId + " #portfolio-video .img-container img").attr('src',thumbnail_url);
                    $(parentElemId + " #portfolio-video input[name='video_thumbnail']").val(thumbnail_url);
                }
            } else {
                createToast(resp.error_msg,"E");
            }
        }

        let addImgUploadElem = function(){
            let imageCnt = updateImageUploadCount();
            let lastid = $(parentElemId+" .portfolio-images").children('.img-item').last().attr('id').split("-")[3];
            let newcnt = lastid*1+1;
            if(maxImgCnt == imageCnt){
                createToast("You can upload only upto "+maxImgCnt+" images.","E");
                return;
            }
            let html = '';
            html += '<div id="portfolio-img-new-'+newcnt+'" class="col-md-4 img-item">';
                html += '<div class="open_file_explorer profile_upload_container h_66">';
                    html += '<img src="" id="previewImg">';
                    html += '<div id="cancel-img-upload" class="cancel-img-upload">';
                        html += '<i class="fa fa-times" aria-hidden="true"></i>';
                    html += '</div>';
                    html += '<div class="progress-bar">';
                        html += '<div class="fill-progress"></div>';
                    html += '</div>';
                    html += '<div for="file-input input_wrap" class="d-none">';
                        html += '<input type="file" class="imgInp" id="upload-img-inp-'+newcnt+'" name="portfolio-image-'+newcnt+'" accept=".jpg,.jpeg,.png">';
                        html += '<input type="hidden" class="imgInp" id="cropped-upload-img-inp-new-'+newcnt+'" name="cropped-portfolio-image-'+newcnt+'">';
                html += '</div>';
                html += '<label for="upload-img-inp-'+newcnt+'">';
                    html += '<div class="text-center">';
                        html += '<div><i class="fa fa-plus-circle deep-pink icon-size" aria-hidden="true"></i></div>';
                        html += '<div class="mt-3 movie_name_text">Upload Image</div>';
                    html += '</div>';
                html += '</label>';
                html += '</div>';
                html += '<div class="profile_upload_text">Upload JPG or PNG, 1600x900 PX, max size 10 MB</div>';
            html += '</div>';
            $(html).insertAfter(parentElemId+" #portfolio-img-new-"+lastid);
            bindActions();
        }

        let updateImageUploadCount = function(){
            let imageCnt = $(parentElemId+" .portfolio-images").children('.img-item').length;
            if(imageCnt == 1 && $(parentElemId+" .portfolio-images #previewImg").attr('src') == ""){
                $('.portfolio_images_count').val(imageCnt - 1);
            } else {
                $('.portfolio_images_count').val(imageCnt);
            }
            return imageCnt;
        }

        return {
            init
        }
    }();

    $(".js-select2").select2({
        closeOnSelect: false,
        placeholder: "Select",
        allowClear: true,
        language: {
        noResults: function() {
            return '<button class="no_results_btn">No Result Found</a>';
        },
    },
    escapeMarkup: function(markup) {
        return markup;
    },  
    })
                .on('select2:selecting', e => $(e.currentTarget).data('scrolltop', $('.select2-results__options').scrollTop()))
                .on('select2:select', e => $('.select2-results__options').scrollTop($(e.currentTarget).data('scrolltop')))
                .on('select2:unselecting', e => $(e.currentTarget).data('scrolltop', $('.select2-results__options').scrollTop()))
                .on('select2:unselect', e => $('.select2-results__options').scrollTop($(e.currentTarget).data('scrolltop')));

    $('.js-select2').on('select2:select', function (e) {
    $('.select2-search__field').val('').trigger('change');
    });


    $(".portfolio_save_btn").on("click", function () {
        $("#save_btn_value").attr("value", $(this).attr("name"))
        $(this).parents('form').submit();
    });
    function validateYouTubeUrl(url) {
     var pattern = /^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/;
     return url.match(pattern) ? RegExp.$1 : false;
        }
        // $(".portfolio_save_btn ").click(function()
        // {
            function imgFormValitation() {
                // var url="<?php if(isset($UserPortfolioEdit[0]->video['video_url'])){ echo($UserPortfolioEdit[0]->video['video_url']); }?>";
                var url=$('#videoFormValid').val()
                var youtubeValid=validateYouTubeUrl(url);
                if (youtubeValid==false) {
                    $('.intro-video').show();
                    return false;
                }
                $('.intro-video').hide();
                var imgLength = $('.img-item').length;
                // console.log(imgLength);
                if (imgLength<=1) {
                    $('.intro-img').show();
                    return false;
                }else{
                    $('.intro-img').hide();
                }
            }
        // });
</script>
<script src="{{ asset('js/cropper.js') }}"></script>
@endpush
