<script>
        var project_id = null;
        var validateUrl = function (url) {
            let urlReg = /^(?:(?:(?:https?|ftp):)?\/\/)(?:\S+(?::\S*)?@)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z0-9\u00a1-\uffff][a-z0-9\u00a1-\uffff_-]{0,62})?[a-z0-9\u00a1-\uffff]\.)+(?:[a-z\u00a1-\uffff]{2,}\.?))(?::\d{2,5})?(?:[/?#]\S*)?$/i;
            return urlReg.test(url);
        }

        $(document).ready(function(){
            
            project_id = $("input[name=project_id]").val();
            console.log("project_id "+project_id);
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
                console.log("currentVideos - ",currentVideos);
                currentVideoCount = currentVideos.length;
                if(currentVideoCount > 0){
                    lastVidId = currentVideos[currentVideoCount-1]['id'];
                    console.log("lastVidId = "+lastVidId);
                }

                doAjax('project/get-project-media/'+project_id+'?type=video',{},"GET",getVideosCallback);
                //doAjax('/ajax/get-media/1',{},"GET",updateVideoCallback)
            }

            let getVideosCallback = function (req, resp) {
                currentVideos = JSON.parse(resp);
                currentVideoCount = currentVideos.length;
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
                    console.log("in ");
                    let fieldElems = $(parentElemId+" input.video-link");
                    let isEmptyField = false;
                    fieldElems.each(function(){
                        let inputVal = $(this).val();
                        console.log("elem",inputVal);
                        isEmptyField = (inputVal == "" || !validateUrl(inputVal));
                    });
                    console.log("isEmptyField = ",isEmptyField);
                    if(!isEmptyField)
                        addVideoElem();
                    else
                        alert("Please enter a valid video url.");
                });

                $(parentElemId+" .video-link.add").off("blur").on("blur",(e)=>{
                    let link = e.target.value;
                    if(link && validateUrl(link)){
                        console.log("link blurred - "+link);
                        if(link.indexOf("vimeo.com") > -1){
                            //let reqData = {'vidUrl': "https://vimeo.com/336812686"};
                            let reqData = {'vidUrl': link};
                            doAjax("ajax/get-video-details",reqData,"POST",getVimeoData);
                        } else if(link.indexOf("youtube.com") > -1) {
                            //let reqData = {'vidUrl': "https://www.youtube.com/watch?v=ZdbQ_FvNBZA&t=915s&ab_channel=ScaleupAlly"};
                            let reqData = {'vidUrl':link};
                            doAjax("ajax/get-video-details",reqData,"POST",getYouTubeData);
                        } else {
                            //show error
                            alert("Invalid video url. Only Vimeo and Youtube links are allowed.");
                            console.log("Invalid video url. Only Vimeo and Youtube links are allowed.");
                        }
                    } else {
                        alert("Please enter a valid video url.");
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
                    alert("Add delete confirmation here");
                    let mediaId = $(e.target).attr('data-id');
                    doAjax("ajax/delete-media/"+mediaId,{"mediaId":mediaId},"POST",deleteMediaCallback);
                });
            }

            let deleteMediaCallback = function (req,resp) {
                $("#vid-"+req.mediaId).remove();
            }

            let updateVideoCallback = function (req,resp) {
                console.log("Video updated successfully.");
                //alert(resp);
            }

            let getVimeoData = function(reqData,vimeoResp) {
                //https://vimeo.com/336812686
                // let vidId = link.split("https://vimeo.com/");
                // vidId = vidId[1].split("/")[0];
                //let vimeoResp = '[{"id":336812686,"title":"Direct Links To Video Files","description":"Hi there! Need help? Go to http:\/\/vimeo.com\/help","url":"https:\/\/vimeo.com\/336812686","upload_date":"2019-05-17 09:32:53","thumbnail_small":"https:\/\/i.vimeocdn.com\/video\/783757833-369ed61d5dd1e7a6a095543c901a1c4a656e6bc1e0471c1629d03f7fdd36d436-d_100x75","thumbnail_medium":"https:\/\/i.vimeocdn.com\/video\/783757833-369ed61d5dd1e7a6a095543c901a1c4a656e6bc1e0471c1629d03f7fdd36d436-d_200x150","thumbnail_large":"https:\/\/i.vimeocdn.com\/video\/783757833-369ed61d5dd1e7a6a095543c901a1c4a656e6bc1e0471c1629d03f7fdd36d436-d_640","user_id":90564994,"user_name":"Vimeo Support","user_url":"https:\/\/vimeo.com\/vimeosupport","user_portrait_small":"https:\/\/i.vimeocdn.com\/portrait\/27986607_30x30","user_portrait_medium":"https:\/\/i.vimeocdn.com\/portrait\/27986607_75x75","user_portrait_large":"https:\/\/i.vimeocdn.com\/portrait\/27986607_100x100","user_portrait_huge":"https:\/\/i.vimeocdn.com\/portrait\/27986607_300x300","duration":41,"width":1920,"height":1080,"tags":"","embed_privacy":"anywhere"}]';
                let vimeo = JSON.parse(vimeoResp)[0];
                let newVideo = {};
                newVideo['project_id'] = project_id;
                newVideo['id'] = lastVidId+1;
                newVideo['title'] = vimeo.title;
                newVideo['thumbnail'] = vimeo.thumbnail_medium;
                newVideo['url'] = vimeo.url;
                newVideo['is_default_marked'] = 0;
                doAjax('ajax/add-video',newVideo,"POST",addVideoCallback);
            }

            let getYouTubeData = function(reqData,youtubeResp) {
                //"https://www.youtube.com/watch?v=ZdbQ_FvNBZA&t=915s&ab_channel=ScaleupAlly";
                // let youtubeResp = '{"kind":"youtube#videoListResponse","etag":"NY12d6Sa3mhyYdxx62iuVh0ta50","items":[{"kind":"youtube#video","etag":"BlL66Tqwd6vcpb_0fuUt4YHRBlA","id":"ZdbQ_FvNBZA","snippet":{"publishedAt":"2021-10-03T07:14:26Z","channelId":"UCyzKMNskJwgVy7j_lQ5aP-Q","title":"Session 5: What is Postman? and How to use it? by Suprabhat Sen","description":"Postman is one of the most important tools for any kind of Web and App Development. Learn how Postman works and helps make the job easier for any Software Developer","thumbnails":{"default":{"url":"https://i.ytimg.com/vi/ZdbQ_FvNBZA/default.jpg","width":120,"height":90},"medium":{"url":"https://i.ytimg.com/vi/ZdbQ_FvNBZA/mqdefault.jpg","width":320,"height":180},"high":{"url":"https://i.ytimg.com/vi/ZdbQ_FvNBZA/hqdefault.jpg","width":480,"height":360},"standard":{"url":"https://i.ytimg.com/vi/ZdbQ_FvNBZA/sddefault.jpg","width":640,"height":480},"maxres":{"url":"https://i.ytimg.com/vi/ZdbQ_FvNBZA/maxresdefault.jpg","width":1280,"height":720}},"channelTitle":"ScaleupAlly","categoryId":"28","liveBroadcastContent":"none","localized":{"title":"Session 5: What is Postman? and How to use it? by Suprabhat Sen","description":"Postman is one of the most important tools for any kind of Web and App Development. Learn how Postman works and helps make the job easier for any Software Developer"}}}],"pageInfo":{"totalResults":1,"resultsPerPage":1}}';
                let vimeo = JSON.parse(youtubeResp);
                let newVideo = {};
                newVideo['project_id'] = project_id;
                newVideo['title'] = vimeo['items'][0]['snippet']['title'];
                newVideo['thumbnail'] = vimeo['items'][0]['snippet']['thumbnails']['high']['url'];
                newVideo['url'] = reqData.vidUrl;
                newVideo['is_default_marked'] = 0;
                newVideo['type'] = 'videourl';
                doAjax('ajax/add-video',newVideo,"POST",addVideoCallback);
            }

            let addVideoCallback = function(req,resp){
                //console.log("in here addVideoCallback",resp);
                let newVideo = JSON.parse(resp);
                currentVideos.push(newVideo);
                currentVideoCount = currentVideos.length;
                loadCurrentVideos();
                lastVidId = currentVideos[currentVideos.length-1]['id'];
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
                        str += '<div class="d-flex mt-5 mt-md-3">';
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
                    str += '<div class="d-flex mt-5 mt-md-3">';
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

        project_id = $("input[name=project_id]").val();
        console.log("project_id "+project_id);
        // get the current video list from backend and load into the Gallary class.
        Videos.init(project_id);

        // Photo gallary page script
        var Photos = function () {
            var project_id = null;
            var parentElemId = "#Photos";
            var currentMediaList = [];
            var lastVidId = 0;
            var currentMediaCount = 0;
            var uploadedFile = null;

            let init = function(id){
                project_id = id;
                console.log("currentMediaList - ",currentMediaList);
                currentMediaCount = currentMediaList.length;
                if(currentMediaCount > 0){
                    lastVidId = currentMediaList[currentMediaCount-1]['id'];
                    console.log("lastVidId = "+lastVidId);
                }

                doAjax('project/get-project-media/'+project_id+'?type=image',{},"GET",getMediaCallback);
                //doAjax('/ajax/get-media/1',{},"GET",updateVideoCallback)
            }

            let progressHandling = function (event) {
                var percent = 0;
                var position = event.loaded || event.position;
                var total = event.total;
                var progress_bar_id = "#progress-wrp";
                if (event.lengthComputable) {
                    percent = Math.ceil(position / total * 100);
                }
                // update progressbars classes so it fits your code
                $(progress_bar_id + " .progress-bar").css("width", +percent + "%");
                $(progress_bar_id + " .status").text(percent + "%");
                console.log("percent complete = "+percent);
            };

            let getMediaCallback = function (req, resp) {
                //console.log("getMediaCallback",resp);
                currentMediaList = JSON.parse(resp);
                currentMediaCount = currentMediaList.length;
                if(currentMediaCount > 0){
                    lastVidId = currentMediaList[currentMediaCount-1]['id'];
                    //console.log("lastVidId = "+lastVidId);
                }
                loadcurrentMediaList();
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

                $(parentElemId+" input#upload-img-inp").off("change").on("change",function uploadImageFile(e) {
                    //console.log("e = ",this.files);
                    const [file] = this.files
                    uploadedFile = this.files[0];
                    if (file) {
                        $("#previewImg").attr("src",URL.createObjectURL(file));
                    }
                    $(parentElemId+" .profile_upload_text").hide();
                    $(parentElemId+" .profile_input.add-new-image").show();
                    $("#cancel-img-upload").show();
                });

                $(parentElemId+" input[name=image_title]").on("blur",(e)=>{
                    //console.log("blur ",e.target.value,uploadedFile);
                    var formData = new FormData();
                    formData.append("file", uploadedFile, uploadedFile.name);
                    formData.append("title", e.target.value);
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
                            addMediaCallback(data);
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
                    console.log("in here");
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
                    doAjax("ajax/delete-media/"+mediaId,{"mediaId":mediaId},"POST",deleteMediaCallback);
                });

                $(parentElemId+" #cancel-img-upload").off("click").on("click",(e)=>{
                    $("#previewImg").attr("src","");
                    $(parentElemId+" .profile_upload_text").show();
                    $(parentElemId+" .profile_input.add-new-image").hide();
                    $("#cancel-img-upload").hide();
                    uploadedFile = null;
                });
            }

            let deleteMediaCallback = function (req,resp) {
                $("#img-"+req.mediaId).remove();
                console.log("bfore remove ",currentMediaList,req.mediaId);
                currentMediaList = currentMediaList.filter((item)=>{
                    console.log(item.id,item.id != req.mediaId);
                    return item.id != req.mediaId;
                });
                console.log("after remove ",currentMediaList)
                lastVidId = currentMediaList[currentMediaCount-1]['id'];
                loadcurrentMediaList();
            }

            let updateMediaCallback = function (req,resp) {
                console.log("Image updated successfully.");
                //alert(resp);
            }

            let addMediaCallback = function(resp){
                //console.log("in here addVideoCallback",resp);
                let newVideo = JSON.parse(resp);
                currentMediaList.push(newVideo);
                currentMediaCount = currentMediaList.length;
                loadcurrentMediaList();
                lastVidId = currentMediaList[currentMediaList.length-1]['id'];
            }

            let loadcurrentMediaList = function() {
                let str = '';
                if(currentMediaList.length > 0) {
                    $.each(currentMediaList, (i,v) => {
                        //console.log("v = ",v);
                        str += '<div id="img-'+v.id+'" class="col-md-3">';
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
                        str += '<div class="d-flex mt-5 mt-md-3">';
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
                let str = '<div class="col-md-3">';
                    str += '<div class="open_file_explorer profile_upload_container h_66">';
                        str += '<img src="" id="previewImg">';
                        str += '<div id="cancel-img-upload" style="display:none;curson:pointer;position:absolute;background:red;width:20px;height:20px;top:0;right:0"></div>';
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

        Photos.init(project_id);
</script>
