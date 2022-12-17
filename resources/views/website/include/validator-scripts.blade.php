<script>
        var project_id = null;
        var validateUrl = function (url) {
            let urlReg = /^(?:(?:(?:https?|ftp):)?\/\/)(?:\S+(?::\S*)?@)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z0-9\u00a1-\uffff][a-z0-9\u00a1-\uffff_-]{0,62})?[a-z0-9\u00a1-\uffff]\.)+(?:[a-z\u00a1-\uffff]{2,}\.?))(?::\d{2,5})?(?:[/?#]\S*)?$/i;
            return urlReg.test(url);
        }

        $(document).ready(function(){
            //For albhabates
            $(".alphabets-only").on("input",function(){
                $(this).val($(this).val().replace(/[^A-z ]/g,''));
            });

            // First name
            $(".name-only").on("input",function(){
                $e = $(this);
                var form = $e[0].form;
                var submitBtn = $(form).find('button[type="submit"]');
                if(!$(this).val()){
                    $e.css("border", "2px solid #4D0D8A");
                    submitBtn.attr('disabled', 'disabled');
                    if ($e.parent().find('span').length == 0) {
                        if($(this).attr("name") == 'first_name'){
                            $(`<span class="e-err" style="color: #DD45B3; font-weight:600 ;margin:0px;">Please enter first name</span>`).insertAfter($e);
                        }else{
                            $(`<span class="e-err" style="color: #DD45B3; font-weight:600 ;margin:0px;">Please enter last name</span>`).insertAfter($e);
                        }
                        
                    }  
                }else{
                    $e.css("border", "");
                     submitBtn.removeAttr('disabled');
                    $e.parent().find('span').remove();
                }
                
                
            });
            
            //For emails only
            $(".email-only").on("keyup",function(){
                var EMAIL_REGEXP = /^[_a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+(\.[_a-z0-9]+)*@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9]+)*(\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)$/;
                var $el = $(this);
                var form = $el[0].form;
                var sdgfsj = $el.val();
                var submitBtn = $(form).find('button[type="submit"]');
                var isMatchRegex = EMAIL_REGEXP.test($el.val());                
                if (isMatchRegex || $el.val() == '') {
                    $el.css("border", "");
                     submitBtn.removeAttr('disabled');
                    $el.parent().find('span').remove();
                } else if (isMatchRegex == false) {
                    $el.css("border", "2px solid #4D0D8A");
                    submitBtn.attr('disabled', 'disabled');
                    if ($el.parent().find('span').length == 0) {
                        $(`<span class="e-err" style="color: #DD45B3; font-weight:600 ;margin:0px;">Please provide a valid E-Mail Address.</span>`).insertAfter($el);
                        // $el.parent().append('<p class="e-err" style="color: red;">Please provide a valid email id.</p>')
                    }
                }
            });

            // password 8 chr

               $(".password-only").on("keyup",function(){
                var EMAIL_REGEXP = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/;
                var $el = $(this);
                var form = $el[0].form;
                var sdgfsj = $el.val();
                var submitBtn = $(form).find('button[type="submit"]');
                var isMatchRegex = EMAIL_REGEXP.test($el.val());                
                if (isMatchRegex || $el.val() == '') {
                    $el.css("border", "");
                     submitBtn.removeAttr('disabled');
                    $el.parent().find('span').remove();
                } else if (isMatchRegex == false) {
                    $el.css("border", "2px solid #4D0D8A");
                    submitBtn.attr('disabled', 'disabled');
                    if ($el.parent().find('span').length == 0) {
                        if($(this).attr("name") == 'password_confirmation'){
                            if($(this).val() != $('#password').val()){
                                $(`<span class="e-err" style="color: #DD45B3; font-weight:600 ;;margin:0px;">The passwords you entered do not match. Please re-enter your password</span>`).insertAfter($el);
                            }
                        }else{
                           $(`<span class="e-err" style="color: #DD45B3; font-weight:600 ;;margin:0px;">Use 8 or more characters with a mix of letters, numbers & symbols</span>`).insertAfter($el);
                        }
                        
                        // $el.parent().append('<p class="e-err" style="color: red;">Please provide a valid email id.</p>')
                    }
                }
            });

            // is_check
        
            $(".is-invalid-remove").on("input",function(){
                $(this).next().remove(".invalid-feedback");
            });
            


            //For Numbers only
            $(".numbers-only").on("input",function(){
                $(this).val($(this).val().replace(/[^0-9]/g,''));
            });

            //For float only
            $(".float").on("input",function(){
                $(this).val($(this).val().replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1'));
            });

            //For alpha numeric with special chars(- _.,'") only
            $(".alpha-numeric-sc").on("input",function(){
                $(this).val($(this).val().replace(/[^A-z0-9- _.,'"]/g,''));
            });

            //For alpha chars with special chars(- _.,'") only
            $(".alpha-sc").on("input",function(){
                $(this).val($(this).val().replace(/[^A-z- _.,'"]/g,''));
            });

            //For alpha numeric with - only
            $(".alpha-numeric-dash").on("input",function(){
                $(this).val($(this).val().replace(/[^A-z0-9-]/g,''));
            });

            //For alpha numeric
            $(".alpha-numeric").on("input",function(){
                $(this).val($(this).val().replace(/[^A-z0-9]/g,''));
            });

            $('[data-toggle="tooltip"]').tooltip();

        });
        // gallary page script
        var Videos = function () {
            var project_id = null;
            var parentElemId = "#Videos";
            var currentVideos = [];
            var lastVidId = 0;
            var currentVideoCount = 0;

            let init = function(id){
                project_id = id;
                doAjax('project/get-project-media/'+project_id+'?type=video',{},"GET",getVideosCallback);
                //doAjax('/ajax/get-media/1',{},"GET",updateVideoCallback)
            }

            let getVideosCallback = function (req, resp) {
                let respArr = JSON.parse(resp);
                currentVideos = respArr.payload;
                currentVideoCount = currentVideos.length;
                if(currentVideoCount > 0){
                    lastVidId = currentVideos[currentVideoCount-1]['id'];
                    console.log("lastVidId = "+lastVidId);
                }
                loadCurrentVideos();
                bindActions();
            }

            let doAjax = function(url,reqData,method,callback) {
                $.ajax({
                    url: BaseUrl+url,
                    type: method,
                    data: reqData,
                    success: function(result){
                        //alert(result);
                        callback(reqData,result);
                    }
                });
            }

            let bindActions = function (){
                $(parentElemId+" .add_video_field").off("click").on("click",(e)=>{
                    let fieldElems = $(parentElemId+" input.video-link");
                    let isEmptyField = false;
                    fieldElems.each(function(){
                        let inputVal = $(this).val();
                        isEmptyField = (inputVal == "" || !validateUrl(inputVal));
                    });
                    console.log("isEmptyField = ",isEmptyField);
                    if(!isEmptyField){
                        addVideoElem();
                    } else if ($(".video-link.add").val() != "" ) {
                        createToast("Please enter a valid video url.","E");
                    } else {
                        createToast("Please enter a video url.","E");
                    }
                });

                $(parentElemId+" .video-link.add").off("blur").on("blur",(e)=>{
                    let link = e.target.value;
                    if(link && validateUrl(link)){
                        if(isValidVimeoUrl(link)){
                            //let reqData = {'vidUrl': "https://vimeo.com/336812686"};
                            let reqData = {'vidUrl': link};
                            doAjax("ajax/get-video-details",reqData,"POST",getVimeoData);
                        } else if(isValidYoutubeUrl(link)) {
                            //let reqData = {'vidUrl': "https://www.youtube.com/watch?v=ZdbQ_FvNBZA&t=915s&ab_channel=ScaleupAlly"};
                            let reqData = {'vidUrl':link};
                            doAjax("ajax/get-video-details",reqData,"POST",getYouTubeData);
                        } else {
                            createToast("Invalid video url. Only Vimeo and Youtube links are allowed 1.","E");
                            $(parentElemId+" .video-link.add").val("");
                        }
                    } else if (link != ''){
                        createToast("Please enter a valid video your.<br>Only Vimeo and Youtube links are allowed.","E");
                    }
                });

                $(parentElemId+" input.feature_ved").off("click").on("click",(e)=>{
                    let defVid = $(parentElemId+" input.feature_ved:checked").val();
                    let vdrec = $.each(currentVideos,(i,rec)=>{
                        if(rec.id == defVid){
                            rec.is_default_marked = 1;
                        } else {
                            rec.is_default_marked = 0;
                        }
                    });
                    doAjax('ajax/update-media/'+defVid,{'id':defVid,'is_default_marked':'1','type':'video'},"POST",updateVideoCallback);
                });
                $(parentElemId+" .delete-media").off("click").on("click",(e)=>{
                    let mediaId = $(e.target).attr('data-id');
                    setModal("","","Yes, Delete","");
                    $(".deactivate_btn").click();
                    // $(".modal-body button.cancel_btn").off("click").click((e)=>{
                    //     console.log("cancel modal");
                    // });
                    $(".modal-body button.delete_btn").off("click").click((e)=>{
                        doAjax("ajax/delete-media/"+mediaId,{"mediaId":mediaId},"POST",deleteVideoCallback);
                    });
                });
            }

            let isValidYoutubeUrl = function (link) {
                let domain = (new URL(link));
                let hostname = domain.hostname.replaceAll(".","");
                return (hostname.indexOf("youtube") > -1) ? true : false;
            }

            let isValidVimeoUrl = function (link) {
                let domain = (new URL(link));
                let hostname = domain.hostname.replaceAll(".","");
                return (hostname.indexOf("vimeo") > -1) ? true : false;
            }

            let deleteVideoCallback = function (req,resp) {
                let respArr = JSON.parse(resp);
                if(respArr.status == 1){
                    currentVideos = currentVideos.filter((item)=>{
                        console.log(item.id,item.id != req.mediaId);
                        return item.id != req.mediaId;
                    });
                    currentVideoCount = currentVideos.length;
                    if(currentVideoCount > 0){
                        lastVidId = currentVideos[currentVideoCount-1]['id'];
                    }
                    $("#vid-"+req.mediaId).remove();
                    createToast("Video deleted successfully.","S");
                } else {
                    createToast(respArr.error_msg,"E");
                }
            }

            let updateVideoCallback = function (req,resp) {
                let respArr = JSON.parse(resp);
                if(respArr.status == 1){
                    createToast("Video updated successfully.","S");
                } else {
                    createToast(respArr.error_msg,"E");
                }
            }

            let getVimeoData = function(reqData,vimeoResp) {
                //https://vimeo.com/336812686
                //let vimeoResp = '[{"id":336812686,"title":"Direct Links To Video Files","description":"Hi there! Need help? Go to http:\/\/vimeo.com\/help","url":"https:\/\/vimeo.com\/336812686","upload_date":"2019-05-17 09:32:53","thumbnail_small":"https:\/\/i.vimeocdn.com\/video\/783757833-369ed61d5dd1e7a6a095543c901a1c4a656e6bc1e0471c1629d03f7fdd36d436-d_100x75","thumbnail_medium":"https:\/\/i.vimeocdn.com\/video\/783757833-369ed61d5dd1e7a6a095543c901a1c4a656e6bc1e0471c1629d03f7fdd36d436-d_200x150","thumbnail_large":"https:\/\/i.vimeocdn.com\/video\/783757833-369ed61d5dd1e7a6a095543c901a1c4a656e6bc1e0471c1629d03f7fdd36d436-d_640","user_id":90564994,"user_name":"Vimeo Support","user_url":"https:\/\/vimeo.com\/vimeosupport","user_portrait_small":"https:\/\/i.vimeocdn.com\/portrait\/27986607_30x30","user_portrait_medium":"https:\/\/i.vimeocdn.com\/portrait\/27986607_75x75","user_portrait_large":"https:\/\/i.vimeocdn.com\/portrait\/27986607_100x100","user_portrait_huge":"https:\/\/i.vimeocdn.com\/portrait\/27986607_300x300","duration":41,"width":1920,"height":1080,"tags":"","embed_privacy":"anywhere"}]';
                let respArr = JSON.parse(vimeoResp);
                if(respArr.status == 1){
                    let vimeo = respArr.payload;
                    let newVideo = {};
                    newVideo['project_id'] = project_id;
                    newVideo['id'] = lastVidId+1;
                    newVideo['title'] = vimeo.title;
                    newVideo['thumbnail'] = vimeo.thumbnail_medium;
                    newVideo['url'] = vimeo.url;
                    newVideo['is_default_marked'] = 0;
                    newVideo['src'] = 'vimeo';
                    doAjax('ajax/add-video',newVideo,"POST",addVideoCallback);
                } else {
                    createToast(respArr.error_msg,"E");
                }
            }

            let getYouTubeData = function(reqData,youtubeResp) {
                //"https://www.youtube.com/watch?v=ZdbQ_FvNBZA&t=915s&ab_channel=ScaleupAlly";
                // let youtubeResp = '{"kind":"youtube#videoListResponse","etag":"NY12d6Sa3mhyYdxx62iuVh0ta50","items":[{"kind":"youtube#video","etag":"BlL66Tqwd6vcpb_0fuUt4YHRBlA","id":"ZdbQ_FvNBZA","snippet":{"publishedAt":"2021-10-03T07:14:26Z","channelId":"UCyzKMNskJwgVy7j_lQ5aP-Q","title":"Session 5: What is Postman? and How to use it? by Suprabhat Sen","description":"Postman is one of the most important tools for any kind of Web and App Development. Learn how Postman works and helps make the job easier for any Software Developer","thumbnails":{"default":{"url":"https://i.ytimg.com/vi/ZdbQ_FvNBZA/default.jpg","width":120,"height":90},"medium":{"url":"https://i.ytimg.com/vi/ZdbQ_FvNBZA/mqdefault.jpg","width":320,"height":180},"high":{"url":"https://i.ytimg.com/vi/ZdbQ_FvNBZA/hqdefault.jpg","width":480,"height":360},"standard":{"url":"https://i.ytimg.com/vi/ZdbQ_FvNBZA/sddefault.jpg","width":640,"height":480},"maxres":{"url":"https://i.ytimg.com/vi/ZdbQ_FvNBZA/maxresdefault.jpg","width":1280,"height":720}},"channelTitle":"ScaleupAlly","categoryId":"28","liveBroadcastContent":"none","localized":{"title":"Session 5: What is Postman? and How to use it? by Suprabhat Sen","description":"Postman is one of the most important tools for any kind of Web and App Development. Learn how Postman works and helps make the job easier for any Software Developer"}}}],"pageInfo":{"totalResults":1,"resultsPerPage":1}}';
                let respArr = JSON.parse(youtubeResp);
                if(respArr.status == 1){
                    let youtube = respArr.payload;
                    let newVideo = {};
                    newVideo['project_id'] = project_id;
                    newVideo['title'] = youtube['items'][0]['snippet']['title'];
                    newVideo['thumbnail'] = youtube['items'][0]['snippet']['thumbnails']['high']['url'];
                    newVideo['url'] = "https://www.youtube.com/embed/"+youtube['items'][0]['id'];
                    newVideo['is_default_marked'] = 0;
                    newVideo['src'] = 'youtube';
                    newVideo['type'] = 'videourl';
                    doAjax('ajax/add-video',newVideo,"POST",addVideoCallback);
                } else {
                    createToast(respArr.error_msg,"E");
                }
            }

            let addVideoCallback = function(req,resp){
                //console.log("in here addVideoCallback",resp);
                let respArr = JSON.parse(resp);
                if(respArr.status == 1){
                    createToast("Video added successfully.","S");
                    let newVideo = respArr.payload;
                    currentVideos.push(newVideo);
                    currentVideoCount = currentVideos.length;
                    loadCurrentVideos();
                    lastVidId = currentVideos[currentVideos.length-1]['id'];
                } else {
                    createToast(respArr.error_msg,"E");
                }
            }

            let loadCurrentVideos = function() {
                let str = '';
                if(currentVideos.length > 0) {
                    $.each(currentVideos, (i,v) => {
                        //console.log("v = ",v);
                        str += '<div id="vid-'+v.id+'" class="col-md-3">';
                            str += '<div class="img-container h_66">';
                            str += '<img src="'+v.media_info.thumbnail+'" class="width_inheritence" alt="image">';
                            str += '<div class="title project_card_data w-100 h-100">';
                                str += '<p>'+v.media_info.title+'</p>';
                            str += '</div>';
                            str += '<div class="delete-icon project_card_data w-100 h-100">';
                                str += '<div>';
                                    str += '<i class="fa fa-trash-o delete-media" data-id="'+v.id+'" aria-hidden="true"></i>';
                                str += '</div>';
                            str += '</div>';
                            str += '</div>';
                        str += '<div class="profile_input">';
                        str += '<input type="text" class="form-control video-link" name="project_video_link_'+v.id+'" placeholder="Video url" value="'+v.file_link+'">';
                        str += '</div>';
                        str += '<div class="d-flex mt-5 mt-md-2">';
                        str += '<div>';
                        if(parseInt(v.is_default_marked))
                            str += '<input type="radio" class="checkbox_btn feature_ved" name="is_feature_ved" aria-label="" checked="checked" value="'+v.id+'">';
                        else
                            str += '<input type="radio" class="checkbox_btn feature_ved" name="is_feature_ved" aria-label="" value="'+v.id+'">';
                        str += '</div>';
                        str += '<div class="mk-feature mx-2">Make feature video</div>';
                        str += '</div>';
                        str += '</div>';
                    });
                } else {
                    str += getAddElemHtml();
                }
                str += '<div id="add-video-btn-div" class="col-md-3 add-another-item add_video_btn d-flex align-items-end">';
                str += '<div>';
                str += '<button class="add_video_field save_add_btn">Add another</button>';
                str += '</div>';
                str += '</div>';
                $(parentElemId+" .video-list").html(str);
                bindActions();
            }

            let addVideoElem = function() {
                let str = getAddElemHtml();
                if(currentVideoCount == 0){
                    $(str).insertBefore(parentElemId+" .video-list #add-video-btn-div");
                } else {
                    console.log("in addVideoElem lastVidId = "+lastVidId)
                    $(str).insertAfter(parentElemId+" .video-list #vid-"+lastVidId);
                }
                bindActions();
            }

            let getAddElemHtml = function () {
                let str = '<div class="col-md-3">';
                    str += '<div class="img-container h_66 mt-3 mt-md-0">';
                        str += '<img src="'+BaseUrl+'/images/asset/default-video-thumbnail.jpg" class="width_inheritence" alt="image">';
                    str += '</div>';    
                    str += '<div class="profile_input">';
                    str += '<input type="text" class="form-control video-link add" name="project_video_link_'+(lastVidId+1)+'" placeholder="Paste Link Here">';
                    str += '</div>';
                    str += '<div class="d-flex mt-5 mt-md-2">';
                        str += '<div>';
                        str += '<input type="radio" class="checkbox_btn" name="is_feature_ved" aria-label="" value="" disabled>';
                        str += '</div>';
                        str += '<div class="mk-feature mx-2">Make feature video</div>';
                    str += '</div>';
                str += '</div>';
                return str;
            }

            return {
                init
            }
        }();

        // Photo gallary page script
        var Photos = function () {
            var project_id = null;
            var parentElemId = "#Photos";
            var currentMediaList = [];
            var lastVidId = 0;
            var currentMediaCount = 0;
            var uploadedFile = null;
            var croppedImg = null;

            let init = function(id){
                project_id = id;
                if(!id){
                    return;
                }
                console.log("currentMediaList - ",currentMediaList);
                currentMediaCount = currentMediaList.length;
                if(currentMediaCount > 0){
                    lastVidId = currentMediaList[currentMediaCount-1]['id'];
                    console.log("lastVidId = "+lastVidId);
                }

                doAjax('project/get-project-media/'+project_id+'?type=image',{},"GET",getPhotosCallback);
                //doAjax('/ajax/get-media/1',{},"GET",updateVideoCallback)
            }

            let doAjax = function(url,reqData,method,callback) {
                //show loader
                $.ajax({
                    url: BaseUrl+url,
                    type: method,
                    data: reqData,
                    success: function(result){
                        //alert(result);
                        //hide loader
                        //JSON.parse(result);
                        callback(reqData,result);
                    }
                });
            }

            let getPhotosCallback = function (req, resp) {
                let respArr = JSON.parse(resp);
                currentMediaList = respArr.payload;
                currentMediaCount = currentMediaList.length;
                if(currentMediaCount > 0){
                    lastVidId = currentMediaList[currentMediaCount-1]['id'];
                }
                loadcurrentMediaList();
            }

            let bindActions = function (){

                $(parentElemId+" input#upload-img-inp").off("change").on("change",function uploadImageFile(e) {
                    //console.log("e = ",this.files);
                    const [file] = this.files
                    uploadedFile = this.files[0];
                    if (file) {
                        let ret = ImageCropper.init(uploadedFile);
                        console.log("ret = "+ret);
                        //let base64data = $("#previewImg").attr("src");
                        //console.log("base64data",base64data);
                        // alert("croper will start from here")
                        // $("#previewImg").attr("src",URL.createObjectURL(file)).show();
                        $(parentElemId+" .open_file_explorer label").hide();
                        $(parentElemId+" .profile_upload_text").hide();
                        $(parentElemId+" .profile_input.add-new-image").show();
                        $(parentElemId+" .cancel-img-upload").show();
                    }
                });

                $(parentElemId+" input[name=image_title]").off("blur").on("blur",(e)=>{
                    var croppedImg = ImageCropper.getCropperFile();
                    console.log("croppedImg",croppedImg);
                    var formData = new FormData();
                    formData.append("file", croppedImg, uploadedFile.name);
                    formData.append("title", e.target.value);
                    formData.append("project_id", project_id);
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
                            // your callback here
                            console.log("success data ",JSON.parse(data));
                            uploadedFile = null;
                            addPhotoCallback(data);
                        },
                        error: function (error) {
                            // handle error
                        },
                        async: true,
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        timeout: 60000
                    });
                });

                $(parentElemId+" .add_img_field").off("click").on("click",(e)=>{
                    addMediaElem();
                });

                $(parentElemId+" input.feature_ved").off("click").on("click",(e)=>{
                    let defVid = $(parentElemId+" input.feature_ved:checked").val();
                    let vdrec = $.each(currentMediaList,(i,rec)=>{
                        if(rec.id == defVid){
                            rec.is_default_marked = 1;
                        } else {
                            rec.is_default_marked = 0;
                        }
                    });
                    doAjax('ajax/update-media/'+defVid,{'id':defVid,'is_default_marked':'1','type':'video'},"POST",updateMediaCallback);
                });

                $(parentElemId+" .delete-media").off("click").on("click",(e)=>{
                    //alert("Add delete confirmation here");
                    let mediaId = $(e.target).attr('data-id');
                    setModal("","","Yes, Delete","");
                    $(".deactivate_btn").click();
                    // $(".modal-body button.cancel_btn").off("click").click((e)=>{
                    //     console.log("cancel modal");
                    // });
                    $(".modal-body button.delete_btn").off("click").click((e)=>{
                        console.log("delete confirm modal");
                        // $("#staticBackdrop").hide();
                        // $(".modal-backdrop").hide();
                        doAjax("ajax/delete-media/"+mediaId,{"mediaId":mediaId},"POST",deletePhotoCallback);
                    });
                    //doAjax("ajax/delete-media/"+mediaId,{"mediaId":mediaId},"POST",deletePhotoCallback);
                });

                $(parentElemId+" #cancel-img-upload").off("click").on("click",(e)=>{
                    $("#previewImg").attr("src","").hide();
                    $(parentElemId+" .open_file_explorer label").show();
                    $(parentElemId+" .profile_upload_text").show();
                    $(parentElemId+" .profile_input.add-new-image").hide();
                    $(parentElemId+" .cancel-img-upload").hide();
                    uploadedFile = null;
                });
            }

            let progressHandling = function (event){
                $(parentElemId+" .progress-bar").show();
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
                console.log("percent complete = "+percent);
            }

            let deletePhotoCallback = function (req,resp) {
                let respArr = JSON.parse(resp);
                if(respArr.status == 1){
                    createToast("Image deleted successfully.","S");
                    $("#img-"+req.mediaId).remove();
                    currentMediaList = currentMediaList.filter((item)=>{
                        console.log(item.id,item.id != req.mediaId);
                        return item.id != req.mediaId;
                    });
                    currentMediaCount = currentMediaList.length;
                    if(currentMediaCount > 0){
                        lastVidId = currentMediaList[currentMediaCount-1]['id'];
                    }
                    loadcurrentMediaList();
                } else {
                    createToast(respArr.error_msg,"E");
                }
            }

            let updateMediaCallback = function (req,resp) {
                let respArr = JSON.parse(resp);
                if(respArr.status == 1){
                    createToast("Image updated successfully.","S");
                } else {
                    createToast(respArr.error_msg,"E");
                }
            }

            let addPhotoCallback = function(resp){
                let respArr = JSON.parse(resp);
                if(respArr.status == 1){
                    let newImage = respArr.payload;
                    currentMediaList.push(newImage);
                    currentMediaCount = currentMediaList.length;
                    loadcurrentMediaList();
                    lastVidId = currentMediaList[currentMediaList.length-1]['id'];
                    createToast("Image updated successfully.","S");
                } else {
                    createToast(respArr.error_msg,"E");
                }
            }

            let loadcurrentMediaList = function() {
                let str = '';
                if(currentMediaList.length > 0) {
                    $.each(currentMediaList, (i,v) => {
                        //console.log("v = ",v);
                        str += '<div id="img-'+v.id+'" class="img-item col-md-3">';
                            str += '<div class="img-container h_66">';
                            str += '<img src="'+v.file_link+'" class="width_inheritence" alt="image">';
                            str += '<div class="title project_card_data w-100 h-100">';
                                str += '<p>'+v.media_info.title+'</p>';
                            str += '</div>';
                            str += '<div class="delete-icon project_card_data w-100 h-100">';
                                str += '<div>';
                                    str += '<i class="fa fa-trash-o delete-media" data-id="'+v.id+'" aria-hidden="true"></i>';
                                str += '</div>';
                            str += '</div>';
                            str += '</div>';
                        str += '<div class="profile_input">';
                        str += '<input type="text" class="form-control image_title" name="project_image_title_'+v.id+'" placeholder="Add image title" value="'+v.media_info.title+'">';
                        str += '</div>';
                        str += '<div class="d-flex mt-5 mt-md-2">';
                        str += '<div>';
                        if(parseInt(v.is_default_marked))
                            str += '<input type="radio" class="checkbox_btn feature_ved" name="is_feature_image" aria-label="" checked="checked" value="'+v.id+'">';
                        else
                            str += '<input type="radio" class="checkbox_btn feature_ved" name="is_feature_image" aria-label="" value="'+v.id+'">';
                        str += '</div>';
                        str += '<div class="mk-feature mx-2">Make feature image</div>';
                        str += '</div>';
                        str += '</div>';
                    });
                } else {
                    str += getAddElemHtml();
                }
                str += '<div id="add-img-btn-div" class="col-md-3 add-another-item add_video_btn d-flex align-items-end">';
                str += '<div>';
                str += '<button class="add_img_field save_add_btn">Add another</button>';
                str += '</div>';
                str += '</div>';
                $(parentElemId+" .photo-list").html(str);
                bindActions();
            }

            let addMediaElem = function() {
                let str = getAddElemHtml();
                if(currentMediaCount == 0){
                    $(str).insertBefore(parentElemId+" .photo-list #add-image-btn-div");
                } else {
                    $(str).insertAfter(parentElemId+" .photo-list #img-"+lastVidId);
                }
                bindActions();
            }

            let getAddElemHtml = function () {
                let str = '<div class="col-md-3 img-item">';
                    str += '<div class="open_file_explorer profile_upload_container h_66">';
                        str += '<img src="" id="previewImg" class="croperImg">';
                        str += '<div id="cancel-img-upload" class="cancel-img-upload"><i class="fa fa-times" aria-hidden="true"></i></div>';
                        str += '<div class="progress-bar"><div class="fill-progress"></div></div>';
                        str += '<div for="file-input input_wrap" class="d-none">';
                            str += '<input type="file" class="imgInp" id="upload-img-inp" name="project_image_1" accept=".jpg,.jpeg,.png">';
                        str += '</div>';
                        str += '<label for="upload-img-inp">';
                            str += '<div class="text-center">';
                                str += '<div>';
                                    str += '<i class="fa fa-plus-circle deep-pink icon-size" aria-hidden="true"></i>';
                                str += '</div>';
                                str += '<div class="mt-3 movie_name_text">Upload file</div>';
                            str += '</div>';
                        str += '</label>';
                    str += '</div>';
                    str += '<div class="profile_input add-new-image">';
                        str += '<input type="text" class="form-control" name="image_title" placeholder="Photo Title">';
                    str += '</div>';
                    str += '<div class="profile_upload_text">Upload JPG or PNG, 1600x900 PX, max size 4MB</div>';
                str += '</div>';
                return str;
            }

            return {
                init
            }
        }();

        var Docs = function(){
            var project_id = null;
            var parentElemId = "#Documents";
            var currentMediaList = [];
            var lastVidId = 0;
            var currentMediaCount = 0;
            var uploadedFile = null;

            let init = function(id){
                project_id = id;
                if(!id){
                    return;
                }
                currentMediaCount = currentMediaList.length;
                if(currentMediaCount > 0){
                    lastVidId = currentMediaList[currentMediaCount-1]['id'];
                    console.log("lastVidId = "+lastVidId);
                }

                doAjax('project/get-project-media/'+project_id+'?type=doc',{},"GET",getDocCallback);
                //doAjax('/ajax/get-media/1',{},"GET",updateVideoCallback)
            }

            let doAjax = function(url,reqData,method,callback) {
                //show loader
                $.ajax({
                    url: BaseUrl+url,
                    type: method,
                    data: reqData,
                    success: function(result){
                        //alert(result);
                        //hide loader
                        callback(reqData,result);
                    }
                });
            }

            let bindActions = function (){

                $(parentElemId+" .add_new_doc_btn").off("click").on("click",(e)=>{
                    addMediaElem();
                });

                $(parentElemId+" input#upload-doc-inp").off("change").on("change",function uploadDocFile(e) {
                    console.log("e = ",this.files);
                    const [file] = this.files
                    uploadedFile = this.files[0];
                    uploadDoc();
                });

                $(parentElemId+" .delete-doc").off("click").on("click",(e)=>{
                    console.log("deleting doc ",e.target);
                    let mediaId = $(e.target).attr('data-id');
                    setModal("","","Yes, Delete","");
                    // $(".modal-body button.cancel_btn").off("click").click((e)=>{
                    //     console.log("cancel modal");
                    // });
                    $(".modal-body button.delete_btn").off("click").click((e)=>{
                        // $("#staticBackdrop").hide();
                        // $(".modal-backdrop").hide();
                        doAjax("ajax/delete-media/"+mediaId,{"mediaId":mediaId},"POST",deleteDocCallback);
                    });
                    $(".deactivate_btn").click();
                });
            }

            let uploadDoc = function () {
                var formData = new FormData();
                formData.append("file", uploadedFile, uploadedFile.name);
                formData.append("project_id", project_id);
                formData.append("file_type", project_id);
                $.ajax({
                    type: "POST",
                    url: BaseUrl+"ajax/upload-doc",
                    xhr: function () {
                        var myXhr = $.ajaxSettings.xhr();
                        if (myXhr.upload) {
                            myXhr.upload.addEventListener('progress', progressHandling, false);
                        }
                        return myXhr;
                    },
                    success: function (data) {
                        // your callback here
                        console.log("success data ",JSON.parse(data));
                        uploadedFile = null;
                        uploadDocCallback(null,data);
                    },
                    error: function (error) {
                        // handle error
                    },
                    async: true,
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    timeout: 60000
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

            let uploadDocCallback = function (req, resp) {
                let respArr = JSON.parse(resp);
                if(respArr.status == 1){
                    console.log("in uploadDocCallback",resp);
                    currentMediaList.push(respArr.payload);
                    currentMediaCount = currentMediaList.length;
                    console.log("current Doc List - ",currentMediaList);
                    if(currentMediaCount > 0){
                        lastVidId = currentMediaList[currentMediaCount-1]['id'];
                    }
                    loadcurrentMediaList();
                    bindActions();
                } else {
                    createToast(respArr.error_msg,"E");
                }
            }

            let getDocCallback = function (req, resp) {
                let respArr = JSON.parse(resp);
                currentMediaList = respArr.payload;
                currentMediaCount = currentMediaList.length;
                if(currentMediaCount > 0){
                    lastVidId = currentMediaList[currentMediaCount-1]['id'];
                }
                loadcurrentMediaList();
                bindActions();
            }

            let loadcurrentMediaList = function(){
                let str = '';
                if(currentMediaList.length > 0) {
                    $.each(currentMediaList, (i,v) => {
                        //console.log("v = ",v);
                        str += '<div class="col-md-3" id="doc-'+v.id+'">';
                        str += '<div class="doc_container">';
                        str += '<div class="upload_loader">';
                        str += '<i class="fa fa-file-text -pink icon-size" aria-hidden="true"></i>';
                        str += '</div>';
                        str += '<div class="mid-col">';
                        str += '<div class="guide_profile_main_subtext Aubergine_at_night">'+v.media_info.name+'</div>';
                        str += '<div class="proctect_by_capta_text Aubergine_at_night">'+v.media_info.size_label+'</div>';
                        str += '</div>';
                        str += '<div>';
                        str += '<i class="fa fa-times delete-doc" aria-hidden="true" data-id="'+v.id+'"></i>';
                        str += '</div>';
                        str += '</div>';
                        str += '</div>';
                    });
                } else {
                    str += getAddElemHtml();
                }
                str += '<div id="add-doc-btn-div" class="col-md-2 add_image_btn d-flex align-items-end">';
                str += '<button class="add_new_doc_btn save_add_btn">Add another</button>';
                str += '</div>';
                $(parentElemId+" .doc-list").html(str);
                bindActions();
            }

            let deleteDocCallback = function(req, resp){
                let respArr = JSON.parse(resp);
                if(respArr.status == 1){
                    $("#doc-"+req.mediaId).remove();
                    createToast("Document removed successfully.","S");
                } else {
                    createToast(respArr.error_msg,"E");
                }
            }

            let addMediaElem = function() {
                let str = getAddElemHtml();
                if(currentMediaCount == 0){
                    $(str).insertBefore(parentElemId+" .doc-list #add-doc-btn-div");
                } else {
                    $(str).insertAfter(parentElemId+" .doc-list #doc-"+lastVidId);
                }
                bindActions();
            }

            let getAddElemHtml = function () {
                let str = '<div class="col-md-3">';
                str += '<div class="upload_doc" style="position:relative">';
                    str += '<div class="profile_upload_container h_69 w-100 mt-3 mt-md-0 -flx">';
                        str += '<div for="file-input input_wrap" class="d-none">';
                            str += '<input type="file" name="project_doc_1" class="docInp" id="upload-doc-inp" accept=".docx,.doc,.pdf,.jpg,.jpeg">';
                        str += '</div>';
                        str += '<div style="display:flex;justify-content:center">';
                            str += '<label for="upload-doc-inp">';
                                str += '<i class="fa fa-plus-circle deep-pink icon-size" aria-hidden="true" style="float:left;margin:7px 0px"></i>';
                            str += '<div class="movie_name_text mx-3 mt-0" style="float:left">Upload file</div>';
                            str += '</label>';
                    str += '</div>';
                str += '</div>';
                str += '<div class="progress-bar"><div class="fill-progress"></div></div>';
                str += '<div class="profile_upload_text">Upload .doc and .pdf only</div>';
                str += '</div>';
                str += '</div>';
                str += '</div>';
                return str;
            }

            return {
                init
            }

        }();

        function createToast(message, type) {
            let toastHtml = '';
            //$('.for_authtoast').html(toastHtml);
            if(type == "S") {
                toastHtml += '<div class="toast align-items-end text-white bg-success border-0 justify-content-end" id="success-toast" class="toast" data-animation="true" data-autohide="true" data-delay="5000" role="alert" aria-live="assertive" aria-atomic="true">';
                toastHtml += '<div class="d-flex">';
                toastHtml += '<div class="toast-body">';
                toastHtml += 'Success: '+message;
                toastHtml += '</div>';
                toastHtml += '<button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>';
                toastHtml += '</div>';
                toastHtml += '</div>';
            } else if (type == "E") {
                toastHtml += '<div class="toast align-items-end text-white bg-danger border-0 animation" id="error-toast" role="alert" aria-live="assertive" aria-atomic="true">';
                toastHtml += '<div class="d-flex">';
                toastHtml += '<div class="toast-body">';
                toastHtml += 'Error: '+message;
                toastHtml += '</div>';
                toastHtml += '<button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>';
                toastHtml += '</div>';
                toastHtml += '</div>';
            }
            $('.for_authtoast').html(toastHtml);
            $("#error-toast").toast("show");
            $("#success-toast").toast("show");
        }

    function setModal(head_text, sub_text, confirm_btn_text, cancel_btn_text) {
        console.log(head_text, sub_text, confirm_btn_text, cancel_btn_text);
        if(head_text == ""){
            head_text = "Are you sure?";
        }
        $("#staticBackdrop .modal_container .head_text").html(head_text);
        if(sub_text == ""){
            sub_text = "Do you really want to delete the item?<br>This process cannot be undone.";
        }
        $("#staticBackdrop .modal_container .sub_text").html(sub_text);
        if(confirm_btn_text == ""){
            confirm_btn_text = "Yes, Delete"
        }
        $("#staticBackdrop .modal_container .confirm_btn_text").html(confirm_btn_text);
        if(cancel_btn_text == ""){
            cancel_btn_text = "Cancel";
        }
        $("#staticBackdrop .modal_container .cancel_btn_text").html(cancel_btn_text);
    }

</script>
