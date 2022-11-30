@extends('website.layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-portfolio')

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
                    <div id="user-profile-div" class="profile_wraper profile_wraper_padding my-md-0 my-4">
                        <div class="d-flex justify-content-between">
                            <div class="profile_cmn_head_text">Add Portfolio</div>
                          <div class="icon_container">
                          <img src="{{ asset('public/images/asset/delete-icon.svg') }}"/>
                          </div> 
                        </div>                        
                        <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('portfolio-store') }}">
                            <input type="hidden" name="portfolio_id" value ="<?php if(isset($portfolio)){ echo($portfolio->id); }?>">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="profile_input">
                                        <label>Project Title</label>
                                        <input type="text" class="form-control @error('project_title') is-invalid @enderror" placeholder="Project Title" name="project_title" value="<?php if(isset($portfolio)){ echo($portfolio->project_title); }?>" aria-label="Username" aria-describedby="basic-addon1">
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
                                        <label>Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" aria-label="With textarea"><?php if(isset($portfolio)){ echo($portfolio->description); }?></textarea>
                                    @error('description')
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
                                    <label for="lang">Project specific Skills</label>
                                    <select name="project_specific_skills_id" class="outline @error('project_specific_skills_id') is-invalid @enderror" id="lang">
                                      <option value="">Select</option>
                                        @foreach ($skills as $k=>$v)
                                                <option value="{{ $v->id }}" <?php if(isset($portfolio->getPortfolioSkill) && $portfolio->getPortfolioSkill->project_specific_skills_id == $v->id)
                                                  {echo'selected';} ?>>{{  $v->name }}</option>
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
                                        <label for="lang">Project Location (Where it took place)</label>
                                        <select name="project_country_id" class="@error('project_country_id') is-invalid @enderror" id="lang">
                                        <option value="">Select</option> 
                                        @foreach ($country as $k=>$v)
                                            <option value="{{ $v->id}}">{{  $v->name }}</option>
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
                                        <label>Completion Date</label>
                                        <input type="date" class="form-control @error('completion_date') is-invalid @enderror" placeholder="First Name" name="completion_date" value="<?php if(isset($portfolio)){ echo($portfolio->completion_date); }?>" aria-label="Username" aria-describedby="basic-addon1">
                                        @error('completion_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="mt-3">Video URL</label>
                                <div class="col-md-4">
                                    <div id="portfolio-video" class="profile_input">
                                        <!-- <div><label>Project Files</label></div> -->
                                        <div class="img-container h_66 mt-3 mt-md-0">
                                            <img src="{{asset('images/asset/default-video-thumbnail.jpg')}}" class="width_inheritence" alt="image">
                                        </div>
                                        <input type="text" class="outline is-invalid-remove form-control @error('video') is-invalid @enderror" placeholder="Paste link here" name="video_url" value="<?php if(isset($portfolio)){ echo($portfolio->video); }?>" aria-label="Video URL" aria-describedby="basic-addon1">
                                        <input type="hidden" class="" name="video_thumbnail" value="" aria-label="Video Thumbnail" aria-describedby="basic-addon1">
                                        @error('video')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!--                                                  -->
                            </div>
                            <div class="row portfolio-images">
                            <label class="mt-3">Pictures</label>
                                <div id="portfolio-img-new-1" class="col-md-4 img-item">
                                    <div class="open_file_explorer profile_upload_container h_66">
                                        <img src="" id="previewImg">
                                        <div class="cancel-img-upload">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </div>
                                        <div class="progress-bar">
                                            <div class="fill-progress"></div>
                                        </div>
                                        <div for="file-input input_wrap" class="d-none"><input type="file" class="imgInp" id="upload-img-inp-1" name="portfolio-image-1" accept=".jpg,.jpeg,.png">
                                    </div>
                                    <label for="upload-img-inp-1">
                                        <div class="text-center">
                                            <div><i class="fa fa-plus-circle deep-pink icon-size" aria-hidden="true"></i></div>
                                            <div class="mt-3 movie_name_text">Upload Image</div>
                                        </div>
                                    </label>
                                    </div>
                                    <div class="profile_upload_text">Upload JPG or PNG, 1600x900 PX, max size 4MB</div>
                                </div>
                                <div class="col-md-3 d-flex align-items-end">
                                    <div class="save_add_btn">Add another</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex justify-content-end mt-4">
                                    <a href="{{route('profile-create')}}"class="cancel_btn mx-3" style="text-decoration:none">Cancel</a>
                                    <button class="save_add_btn">Save & add another</button>
                                    <input type="hidden" name="flag" value="<?=request('flag')?>">
                                    <button type="submit" class="guide_profile_btn mx-3">Save & next</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- modal -->
            
        </div>
    </section>
@endsection

@section('footer')
    @include('website.include.footer')
@endsection

@push('scripts')
<script>

    var portfolio = [];
    $(document).ready(function(){
        portfolioData = JSON.parse('<?php echo str_replace("'","\'",json_encode($portfolio));?>');
        Portfolio.init(portfolioData);
        $("#error-toast").toast("show");
        $("#success-toast").toast("show");
    });

    var Portfolio = function(){
        var user_id = null;
        var parentElemId = "#user-profile-div";
        var imageCnt = 1;
        var maxImgCnt = 15;

        let init = function(portfolioData){
            console.log("portfolioData = ",portfolioData);
            user_id = portfolioData.id;
            console.log("Portfolio link ",portfolioData.intro_video_link);
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
                    } else if(link.indexOf("youtube.com") > -1) {
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
                console.log("changed ",this);
                let imgId = "#"+$(e.target).parents('.img-item').attr('id'); 
                console.log("e = ",this.files,imgId);
                const [file] = this.files
                uploadedFile = this.files[0];
                if (file) {
                    $(imgId+" #previewImg").attr("src",URL.createObjectURL(file)).show();
                    $(parentElemId+" "+imgId+" .open_file_explorer label").hide();
                    $(parentElemId+" "+imgId+" .profile_upload_text").hide();
                    //$(parentElemId+" .profile_input.add-new-image").show();
                    $(parentElemId+" "+imgId+" .cancel-img-upload").show();
                    addImgUploadElem();
                }
            });

            $(parentElemId+" .cancel-img-upload").off("click").on("click",function cancelImgUpload(e) {
                let imgId = "#"+$(e.target).parents('.img-item').attr('id');
                console.log("changed ",imgId);
                $(imgId).remove();
                //console.log("ok",$(parentElemId+" .portfolio-images").html());
            });

            $(parentElemId+" .portfolio-images .save_add_btn").off("click").on("click",()=>{
                console.log("adding elem");
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
            console.log("current imageCnt = "+imageCnt);
            let newcnt = imageCnt+1;
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
            $(html).insertAfter(parentElemId+" #portfolio-img-new-"+imageCnt);
            imageCnt++;
            bindActions();
            console.log("new imageCnt = "+imageCnt);
        }

        return {
            init
        }
    }();


</script>
@endpush
