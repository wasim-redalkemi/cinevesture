@extends('website.layouts.app',['class' => 'bg_white'])

{{-- @section('title','Cinevesture-portfolio') --}}

@section('header')
@include('website.include.header')
@endsection

@section('content')
<section class="profile-section">
    <div class="hide-me animation for_authtoast">
        @include('website.include.flash_message')
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('website.include.profile_sidebar')
            </div>
            <div class="col-md-9">
                @if(isset($prevPortfolio) && count($prevPortfolio)>0)
                    @include('website.user.include.previously_added_portfolio',['prevData'=>$prevPortfolio])
                @endif
                <div id="user-profile-div" class="profile_wraper profile_wraper_padding mt-md-0 my-4">
                    <div class="d-flex">
                        <div class="profile_cmn_head_text">Add Portfolio</div>
                        <div>
                            <span data-toggle='tooltip' title='A portfolio showcases your skills and abilities through completed projects and samples.'>
                                <span class="dot">
                                    <i class="fa fa-info p-9" aria-hidden="true"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                    <form role="form" class="validateBeforeSubmit" name="portfolioCreate" method="POST" onsubmit="return imgFormValitation()"  enctype="multipart/form-data" action="{{ route('portfolio-store') }}">
                        <input type="hidden" name="portfolio_id">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="profile_input mb-1">
                                    <label>Portfolio Title <span class = "steric_sign_design">*</span></label>
                                    <input type="text" class="form-control @error('portfolio_title') is-invalid @enderror" placeholder="Portfolio Title" name="portfolio_title" aria-label="Username" value="{{old('portfolio_title')}}" aria-describedby="basic-addon1"  required>
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
                                    <label>Description <span class = "steric_sign_design ">*</span></label>
                                    <div class="form_elem">
                                    <textarea class="form-control controlTextLength text_editor @error('description') is-invalid @enderror" name="description"  aria-label="With textarea" text-length="250"  required>{{{ request::old('description') }}}</textarea>
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
                                <div class="select2forError">
                                    <div class="profile_input">
                                        <label for="lang">Portfolio specific Skills <span class = "steric_sign_design">*</span></label>
                                        <select name="project_specific_skills_id[]" class="outline is-invalid-remove js-select2 @error('project_specific_skills_id') is-invalid @enderror" multiple  required>
                                            @foreach ($skills as $k=>$v)
                                            <option value="{{ $v->id }}">{{ $v->name }}</option>
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
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                    <div class="profile_input select2forError">
                                        <label for="lang">Portfolio Location (Where it took place) <span style = "color:red">*</span></label>
                                        <select name="project_country_id[]" class="js-select2 @error('project_country_id') is-invalid @enderror"  multiple  required>
                                            @foreach ($country as $k=>$v)
                                            <option value="{{ $v->id}}">{{ $v->name }}</option>
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
                                    <input type="date" class="form-control @error('completion_date') is-invalid @enderror" placeholder="First Name" name="completion_date" aria-label="Username" value="{{old('completion_date')}}" aria-describedby="basic-addon1"  required>
                                    @error('completion_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div id="portfolio-video" class="profile_input">
                                    <label class="mt-3">Video URL <span class = "steric_sign_design">*</span></label>
                                    <!-- <div><label>Project Files</label></div> -->
                                    <div class="img-container h_66 mt-3 mt-md-0">
                                        <img src="{{asset('images/asset/default-video-thumbnail.jpg')}}" class="width_inheritence" alt="image">
                                    </div>
                                    <input type="text" id="youtube_video" class="outline is-invalid-remove form-control @error('video_url') is-invalid @enderror mt-3" placeholder="Paste link here" name="video_url" value="{{old('video_url')}}" aria-label="Video URL" aria-describedby="basic-addon1"  required>
                                    <input type="hidden" class="" name="video_thumbnail"  aria-label="Video Thumbnail" aria-describedby="basic-addon1">
                                    @error('video_url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="intro-video for_error_msg" style="display:none">
                                    <strong>Only youtube and vimeo URLs are allowed.</strong>
                                </div>
                            </div>
                        </div>
                        <div class="row portfolio-images">
                            <label class="mt-4">Pictures <span class = "steric_sign_design">*</span></label>
                            <div id="portfolio-img-new-1" class="col-md-4 img-item pt-0">
                                <div class="open_file_explorer profile_upload_container h_66 mb-3 mb-md-0">
                                    <img src="" id="previewImg">
                                    <div class="cancel-img-upload">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </div>
                                    <div class="progress-bar">
                                        <div class="fill-progress"></div>
                                    </div>
                                    <div for="file-input input_wrap" class="d-none">
                                        <input type="file" class="imgInp @error('video_url') is-invalid @enderror" id="upload-img-inp-1" name="portfolio-image-1" accept=".jpg,.jpeg,.png"  required>
                                        <input type="hidden" class="imgInp" id="cropped-upload-img-inp-new-1" name="cropped-portfolio-image-1">
                                        @error('video_url')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <label for="upload-img-inp-1">
                                        <div class="text-center">
                                            <div><i class="fa fa-plus-circle deep-pink icon-size" aria-hidden="true"></i></div>
                                            <div class="mt-3 movie_name_text">Upload Image</div>
                                        </div>
                                    </label>
                                </div>
                                <div class="profile_upload_text">Upload JPG or PNG, 1600x900 PX, max size 10 MB</div>
                            </div>
                            <input type="hidden" value="0" class="portfolio_images_count @error('portfolio_images_count') is-invalid @enderror" name="portfolio_images_count"/>
                            @error('portfolio_images_count')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="intro-img for_error_msg" style="display:none">
                                <strong>This field is required.</strong>
                            </div>
                            {{-- <div class="size-img for_error_msg" style="display:none">
                                <strong>Select file must be small then 10 MB.</strong>
                            </div> --}}
                            {{-- <div class="col-md-3 d-flex align-items-end">
                                    <div class="save_add_btn">Add another</div>
                                </div> --}}
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-between justify-content-md-end flex-wrap mt-4">
                                    <a href="{{route('profile-create')}}" class="cancel_btn mx-0 mx-md-3 mt-2 mt-md-0" style="text-decoration:none">Cancel</a>
                                    <button type="button" name="saveAndAnother" value="false" class="portfolio_save_btn save_add_btn mt-2 mt-md-0">Save & add another</button>
                                    <input type="hidden" id="save_btn_value" name="saveButtonType" value="">
                                    <input type="hidden" name="flag" id="save_btn_next" value="">
                                    <button type="submit" name="saveAndNext" value="false" class="portfolio_save_btn_next guide_profile_btn mx-0 mx-md-3 mt-2 mt-md-0">Save & next</button>

                                    <a href="{{route('portfolio-skip')}}"class="cancel_btn mx-0 mx-md-3 mt-2 mt-md-0" style="text-decoration:none">Skip</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
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
</section>
@endsection

@section('footer')
@include('website.include.footer')
@endsection

@push('scripts')
<script>
    var portfolio = [];
    $(document).ready(function() {
        portfolioData = JSON.parse('<?php echo str_replace("'", "\'", json_encode("test")); ?>');
        Portfolio.init(portfolioData);
        $("#error-toast").toast("show");
        $("#success-toast").toast("show");
    });

    var Portfolio = function() {
        var user_id = null;
        var parentElemId = "#user-profile-div";
        var imageCnt = 1;
        var maxImgCnt = 15;

        let init = function(portfolioData) {
            user_id = portfolioData.id;
            bindActions();
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

        let doAjax = function(url, reqData, method, callback) {
            $.ajax({
                url: BaseUrl + url,
                type: method,
                data: reqData,
                success: function(result) {
                    //alert(result);
                    callback(reqData, JSON.parse(result));
                },
                error: function(result) {
                    let errorsHtml = "";
                    $.each(result.responseJSON.errors, (i, n) => {
                        errorsHtml += n + "<br>";
                    });
                    createToast(errorsHtml, "E");
                }
            });
        }

        let isValidYoutubeUrl = function (link) {
            let domain = (new URL(link));
            let hostname = domain.hostname.replaceAll(".","");
            return (hostname.indexOf("youtube") > -1) ? true : false;
        }

        let bindActions = function() {
            $(parentElemId + " #portfolio-video input[name='video_url']").off('blur').on('blur', (e) => {
                let link = e.target.value;
                if (link && validateUrl(link)) {
                    // if (link.indexOf("vimeo.com") > -1) {
                    if (isValidYoutubeUrl(link)) {
                        //let reqData = {'vidUrl': "https://vimeo.com/336812686"};
                        let reqData = {
                            'vidUrl': link
                        };
                        doAjax("ajax/get-video-details", reqData, "POST", getVideoDataCallback);
                    } else if (link.indexOf("youtube.com") > -1) {
                        //let reqData = {'vidUrl': "https://www.youtube.com/watch?v=ZdbQ_FvNBZA&t=915s&ab_channel=ScaleupAlly"};
                        let reqData = {
                            'vidUrl': link
                        };
                        doAjax("ajax/get-video-details", reqData, "POST", getVideoDataCallback);
                    } else {
                        //show error
                        //alert("Invalid video url. Only Vimeo and Youtube links are allowed.");
                        // console.log("Invalid video url. Only Vimeo and Youtube links are allowed.");
                    }
                } else if (link != '') {
                    createToast("Please enter a valid video your.<br>Only Vimeo and Youtube links are allowed.", "E");
                }
            });

            $(parentElemId + " input.imgInp").off("change").on("change", function uploadImageFile(e) {
                $(".imgInp").attr('required',true);
                unsetError();
                $(parentElemId+" .portfolio-images span.invalid-feedback").remove();
                let imgId = "#" + $(e.target).parents('.img-item').attr('id');
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
                        $("#croppedImg").val(ImageCropperObj.getBase64());
                    } else {
                        // console.log("cropper cancelled");
                    }
                });
                let ret = ImageCropperObj.init();
                // if (file) {
                //     //$(imgId + " #previewImg").attr("src", URL.createObjectURL(file)).show();
                //     $(parentElemId + " " + imgId + " .open_file_explorer label").hide();
                //     $(parentElemId + " " + imgId + " .profile_upload_text").hide();
                //     //$(parentElemId+" .profile_input.add-new-image").show();
                //     $(parentElemId + " " + imgId + " .cancel-img-upload").show();
                //     addImgUploadElem();
                // }
            });

            $(parentElemId + " .cancel-img-upload").off("click").on("click", function cancelImgUpload(e) {
                let imgId = "#" + $(e.target).parents('.img-item').attr('id');
                $(imgId).remove();
                updateImageUploadCount();
            });

            $(parentElemId + " .portfolio-images .save_add_btn").off("click").on("click", () => {
                addImgUploadElem();
            });
        }

        let getVideoDataCallback = function(req, resp) {
            if (resp.status == 1) {
                if (resp.payload.src == 'vimeo') {
                    $(parentElemId + " #portfolio-video .img-container img").attr('src', resp.payload.thumbnail_medium);
                    $(parentElemId + " #portfolio-video input[name='video_thumbnail']").val(resp.payload.thumbnail_medium);
                } else if (resp.payload.src == 'youtube') {
                    let thumbnail_url = resp.payload['items'][0]['snippet']['thumbnails']['high']['url'];
                    $(parentElemId + " #portfolio-video .img-container img").attr('src', thumbnail_url);
                    $(parentElemId + " #portfolio-video input[name='video_thumbnail']").val(thumbnail_url);
                }
            } else {
                createToast(resp.error_msg, "E");
            }
        }

        let addImgUploadElem = function() {
            let imageCnt = updateImageUploadCount();
            lastid = $(parentElemId + " .portfolio-images").children('.img-item').last().attr('id').split("-")[3];
            let newcnt = lastid*1 + 1;
            if (maxImgCnt == imageCnt) {
                createToast("You can upload only upto " + maxImgCnt + " images.", "E");
                return;
            }
            let html = '';
            html += '<div id="portfolio-img-new-' + newcnt + '" class="col-md-4 img-item pt-0 pb-3">';
            html += '<div class="open_file_explorer profile_upload_container h_66">';
            html += '<img src="" id="previewImg">';
            html += '<div id="cancel-img-upload" class="cancel-img-upload">';
            html += '<i class="fa fa-times" aria-hidden="true"></i>';
            html += '</div>';
            html += '<div class="progress-bar">';
            html += '<div class="fill-progress"></div>';
            html += '</div>';
            html += '<div for="file-input input_wrap" class="d-none">';
                html += '<input type="file" class="imgInp" id="upload-img-inp-' + newcnt + '" name="portfolio-image-' + newcnt + '" accept=".jpg,.jpeg,.png">';
                html += '<input type="hidden" class="imgInp" id="cropped-upload-img-inp-new-'+newcnt+'" name="cropped-portfolio-image-'+newcnt+'">';
            html += '</div>';
            html += '<label for="upload-img-inp-' + newcnt + '">';
            html += '<div class="text-center">';
            html += '<div><i class="fa fa-plus-circle deep-pink icon-size" aria-hidden="true"></i></div>';
            html += '<div class="mt-3 movie_name_text">Upload Image</div>';
            html += '</div>';
            html += '</label>';
            html += '</div>';
            html += '<div class="profile_upload_text">Upload JPG or PNG, 1600x900 PX, max size 10 MB</div>';
            html += '</div>';
            $(html).insertAfter(parentElemId + " #portfolio-img-new-" + lastid);
            imageCnt = updateImageUploadCount();
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


    $(".portfolio_save_btn").on("click", function() {
        $("#save_btn_value").attr("value", $(this).attr("name"))
        $(this).parents('form').submit();
    });
    $(".portfolio_save_btn_next").on("click", function() {
        $("#save_btn_value").attr("value", $(this).attr("name"))
        $(this).parents('form').submit();
    });

    function validateYouTubeUrl(url) {
     var pattern = /^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/;
     return url.match(pattern) ? RegExp.$1 : false;
        }
    $('#youtube_video').on('submit change',function() {
        $("div.intro-video").hide();
        $('button[type="submit"]').removeAttr('disabled');
        var urlLength= $('#youtube_video').val().length;
        var url = $('#youtube_video').val();
        var videoId = validateYouTubeUrl(url);
        // console.log(videoId);
        if(!videoId){
            $("div.intro-video").show();
            $('button[type="submit"]').attr('disabled','disabled');
        }
       
    });
    function imgFormValitation() {
        var imgLength = $('.img-item').length;
                // console.log(imgLength);
                if (imgLength<=1) {
                    $('.intro-img').show();
                    return false;
                }else{
                    $('.intro-img').hide();
                }
    }
    
    $('.portfolio-images').click(function() {
        var imgLength = $('.img-item').length;
                if (imgLength>1) {
                    $('.intro-img').hide();
                }
    })
    
    // var img=document.forms['portfolioCreate']['portfolio-image-1'];
    //     const formate=['jpg','png'];
        
    //     function validationImageLessthen10mb() {
    //         // alert(img.value);
    //         debugger
    //         // console.log(img.file[]);

    //         if (img.value!="") {

    //             var fileNum=img.value.lastIndexOf('.')+1;
    //             console.log(fileNum);
    //             var fileFormate=img.value.substring(fileNum);
    //             var result= formate.includes(fileFormate);
    //             if(result==false){
    //                 $('.formate-img').show();
    //                 return false;
    //             }
    //             if(parseFloat(img.files[0].size/(1024*1024))>=10) {
    //                 $('.size-img').show();
    //                 return false;
    //             }
    //         }
    //     }
</script>
<script src="{{ asset('js/cropper.js') }}"></script>
@endpush
