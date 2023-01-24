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
                            <div class="profile_cmn_head_text">Edit Portfolio</div>
                            <div>
                                <a class="confirmAction" href="{{route('portfolio-delete',['id'=>$UserPortfolioEdit[0]['id']])}}">
                                    <img src="{{ asset('images/asset/delete-icon.svg') }}"/>
                                    {{-- <i class="fa fa-trash-o  deep-pink icon-size" aria-hidden="true"></i> --}}
                                </a>
                            </div>
                        </div>                        
                        <form role="form" class="validateBeforeSubmit" method="POST" enctype="multipart/form-data" action="{{ route('portfolio-edit-store',['id'=>$UserPortfolioEdit[0]['id']]) }}">
                            @csrf
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="profile_input mb-1">
                                        <label>Project Title <span class = "steric_sign_design">*</span></label>
                                        <input type="text" class="form-control @error('project_title') is-invalid @enderror" placeholder="Project Title" name="project_title" value="<?php if(isset($UserPortfolioEdit[0]->project_title)){ echo($UserPortfolioEdit[0]->project_title); }?>" aria-label="Username" aria-describedby="basic-addon1">
                                        @error('project_title')
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
                                    <label for="lang">Project specific Skills <span class = "steric_sign_design">*</span></label>
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
                                        <label for="lang">Project Location (Where it took place) <span class = "steric_sign_design">*</span></label>
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
                                            <img src="{{asset($UserPortfolioEdit[0]->video['video_thumbnail'])}}" class="width_inheritence" alt="image">
                                        </div>
                                        <input type="url" class="form-control @error('video') is-invalid @enderror" placeholder="Paste link here" name="video_url" value="<?php if(isset($UserPortfolioEdit[0]->video['video_url'])){ echo($UserPortfolioEdit[0]->video['video_url']); }?>" aria-label="Username" aria-describedby="basic-addon1">
                                        <input type="hidden" class="{{asset($UserPortfolioEdit[0]->video['video_thumbnail'])}}" name="video_thumbnail" value="" aria-label="Video Thumbnail" aria-describedby="basic-addon1">
                                        @error('video')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                @else
                                <div class="col-md-4">
                                    <div id="portfolio-video" class="profile_input">
                                        <div class="img-container h_66 mt-3 mt-md-0">
                                            <img src="{{asset('images/asset/default-video-thumbnail.jpg')}}" class="width_inheritence" alt="image">
                                        </div>
                                        <input type="url" class="form-control @error('video') is-invalid @enderror" placeholder="Paste link here" name="video_url" value="<?php if(isset($UserPortfolioEdit[0]->video['video_url'])){ echo($UserPortfolioEdit[0]->video['video_url']); }?>" aria-label="Username" aria-describedby="basic-addon1">
                                        <input type="hidden" class="" name="video_thumbnail" value="" aria-label="Video Thumbnail" aria-describedby="basic-addon1">
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
                                            <input type="file" class="imgInp" id="upload-img-inp-new-{{count($UserPortfolioImages)+1}}" name="portfolio-image-{{count($UserPortfolioImages)+1}}" accept=".jpg,.jpeg,.png"  autofocus required>
                                        </div>
                                        <label for="upload-img-inp-new-{{count($UserPortfolioImages)+1}}">
                                            <div class="text-center">
                                                <div><i class="fa fa-plus-circle deep-pink icon-size" aria-hidden="true"></i></div>
                                                <div class="mt-3 movie_name_text">Upload Image</div>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="profile_upload_text">Upload JPG or PNG, 1600x900 PX, max size 4MB</div>
                                </div>
                                <input type="hidden" value="" class="portfolio_images_count @error('portfolio_images_count') is-invalid @enderror" name="portfolio_images_count"/>
                                @error('portfolio_images_count')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                {{-- <div class="col-md-3 d-flex align-items-end">
                                    <div class="save_add_btn">Add another</div>
                                </div> --}}
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex justify-content-end mt-4">
                                    <button class="cancel_btn mx-3">Cancel</button>
                                    {{-- <button class="save_add_btn">Save & add another</button> --}}
                                    {{-- <button type="button" name="saveAndAnother" value="false" class="portfolio_save_btn save_add_btn">Save & add another</button> --}}
                                    <input type="hidden" id="save_btn_value" name="saveButtonType" value="">

                                    <input type="hidden" name="portfolio_id" value="{{ $UserPortfolioEdit[0]['id']  }}">
                                    {{-- <button type="submit" class="guide_profile_btn mx-3">Save & next</button> --}}
                                    <button type="button" name="saveAndNext" value="false" class="portfolio_save_btn guide_profile_btn mx-3">Save</button>

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
            console.log("portfolioData - ",portfolioData);
            user_id = portfolioData.user_id;
            portfolio_id = portfolioData.id;
            bindActions();
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
                console.log("link = "+link);
                if(link && validateUrl(link)){
                    console.log("link blurred - "+link);
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
                        alert("Invalid video url. Only Vimeo and Youtube links are allowed.");
                        console.log("Invalid video url. Only Vimeo and Youtube links are allowed.");
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


                console.log("changed ",this);
                let imgId = "#"+$(e.target).parents('.img-item').attr('id'); 
                console.log("e = ",this.files,imgId);
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
                    } else {
                        console.log("cropper cancelled");
                    }
                });
                let ret = ImageCropperObj.init();
            });

            $(parentElemId+" .cancel-img-upload.cancel").off("click").on("click",function cancelImgUpload(e) {
                let imgId = "#"+$(e.target).parents('.img-item').attr('id');
                console.log("cancelling ",imgId,parentElemId+" "+imgId+" .open_file_explorer label");
                $(imgId).remove();
                // //console.log("ok",$(parentElemId+" .portfolio-images").html());
                // $(parentElemId+" "+imgId+" #previewImg").attr("src","").hide();
                // $(parentElemId+" "+imgId+" .open_file_explorer label").show();
                // $(parentElemId+" "+imgId+" .profile_upload_text").show();
                // $(parentElemId+" "+imgId+" .cancel-img-upload").hide();
                // uploadedFile = null;
                //addImgUploadElem();
            });

            $(parentElemId+" .cancel-img-upload.delete").off("click").on("click",function cancelImgUpload(e) {
                let imgId = "#"+$(e.target).parents('.img-item').attr('id');
                imgId = imgId.split("-")[2];
                //console.log("deleting ",imgId);
                setModal("","","Yes, Delete","");
                $(".deactivate_btn").click();
                $(".modal-body button.delete_btn").off("click").click((e)=>{
                    doAjax("ajax/delete-portfolio-img/"+imgId,{"imgId":imgId},"DELETE",(req,resp)=>{
                        if(resp.status == 1){
                            createToast("Image deleted successfully.","S");
                            $(parentElemId+" #portfolio-img-"+imgId).remove();
                        } else {
                            createToast(resp.error_msg,"E");
                        }
                    });
                });
            });

            $(parentElemId+" .portfolio-images .save_add_btn").off("click").on("click",()=>{
                console.log("adding elem");
                addImgUploadElem();
            });
        }
        

        let imageCnt = $(parentElemId+" .portfolio-images").children('.img-item').length;
        $('.portfolio_images_count').val(imageCnt);

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
            let imageCnt = $(parentElemId+" .portfolio-images").children('.img-item').length;
            $('.portfolio_images_count').val(imageCnt);
            let lastid = $(parentElemId+" .portfolio-images").children('.img-item').last().attr('id').split("-")[3];
            let newcnt = lastid+1;
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
                    html += '<div for="file-input input_wrap" class="d-none"><input type="file" class="imgInp" id="upload-img-inp-'+newcnt+'" name="portfolio-image-'+newcnt+'" accept=".jpg,.jpeg,.png">';
                html += '</div>';
                html += '<label for="upload-img-inp-'+newcnt+'">';
                    html += '<div class="text-center">';
                        html += '<div><i class="fa fa-plus-circle deep-pink icon-size" aria-hidden="true"></i></div>';
                        html += '<div class="mt-3 movie_name_text">Upload Image</div>';
                    html += '</div>';
                html += '</label>';
                html += '</div>';
                html += '<div class="profile_upload_text">Upload JPG or PNG, 1600x900 PX, max size 4MB</div>';
            html += '</div>';
            $(html).insertAfter(parentElemId+" #portfolio-img-new-"+lastid);
            bindActions();
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


    $(".portfolio_save_btn").on("click", function () {
        $("#save_btn_value").attr("value", $(this).attr("name"))
        $(this).parents('form').submit();
    });

    // croper 

    $modal.on('shown.bs.modal', function() {

        cropper = new Cropper(image, {
        cropBoxMovable: true,
        cropBoxResizable: true,
        toggleDragModeOnDblclick: false,
        viewMode:1,
        data:{ //define cropbox size
        width: 300,
        height:  300,
        },
        });
}).on('hidden.bs.modal', function() {
   cropper.destroy();
   cropper = null;
});

function dataURLtoFile(dataurl, filename) {
   var arr = dataurl.split(','),
       mime = arr[0].match(/:(.*?);/)[1],
       bstr = atob(arr[1]),
       bstr = atob(arr[1]),
       n = bstr.length,
       u8arr = new Uint8Array(n);

   while (n--) {
       u8arr[n] = bstr.charCodeAt(n);
   }

   return new File([u8arr], filename, {
       type: mime
   });
}

$("#crop").click(function() {
   canvas = cropper.getCroppedCanvas({
       width: 160,
       height: 160,
   });

   canvas.toBlob(function(blob) {
       url = URL.createObjectURL(blob);
       // console.log(url, "url");
       var reader = new FileReader();
       reader.readAsDataURL(blob);
       reader.onloadend = function() {
           base64data = reader.result;
           var file = dataURLtoFile(base64data, 'profile_img.png');
           croperImg.src = base64data;
           $("#croppedImg").val(base64data);
           image.src = file;
           formData.append("document", file)
           // console.log(formData.append("document", file), "formData.append");

           $('.for_hide').css('display', 'none');
           $('.for_show').css('display', 'block');

           $modal.modal('hide');
       }
   });
})

$('#close-cropper').on('click', function() {
   $modal.modal('hide');
})
$('#chechbox').on('click', function() {
   // $('date_of_exp').toggle();
   $modal.modal('hide');
})


$('#crop-cancel').on('click', function() {
   $modal.modal('hide');
})
</script>

<script src="{{ asset('js/cropper.js') }}"></script>
@endpush
