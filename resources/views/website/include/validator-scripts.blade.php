<script>
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
            var parentElemId = "#Videos";
            var currentVideos = [];
            var lastVidId = 0;

            let init = function(params){
                currentVideos = params;
                var currentVideoCount = currentVideos.length;
                if(currentVideoCount > 0)
                    lastVidId = currentVideos[currentVideoCount-1]['id'];

                loadCurrentVideos();
                bindActions();
            }

            let bindActions = function (){
                $(parentElemId+" .add_video_field").off("click").on("click",(e)=>{
                    let fieldElems = $(parentElemId+" input.video-link");
                    console.log("fieldElems = ",fieldElems);
                    let isEmptyField = false;
                    fieldElems.each(function(){
                        console.log("elem",$(this).val());
                        isEmptyField = ($(this).val() == "");
                    });
                    if(!isEmptyField)
                        addVideoElem();
                    else
                        alert("Please enter a video url.");
                });
                $(parentElemId+" .video-link.add").off("blur").on("blur",(e)=>{
                    let link = e.target.value;
                    if(link){
                        console.log("link blurred - "+link);
                        if(link.indexOf("vimeo.com") > -1){
                            vimeoData = getVimeoData(link);
                            //console.log(vimeoData);
                        } else if(link.indexOf("youtube.com") > -1) {
                            getYouTubeData(link);
                        } else {
                            //show error
                            alert("Invalid video url. Only Vimeo and Youtube links are allowed.");
                            console.log("Invalid video url. Only Vimeo and Youtube links are allowed.");
                        }
                    }
                });
                $(parentElemId+" input.feature_ved").off("click").on("click",(e)=>{
                    let defVid = $(parentElemId+" input.feature_ved:checked").val();
                    let vdrec = $.each(currentVideos,(i,rec)=>{
                        console.log("rec = ",rec);
                        if(rec.id == defVid){
                            rec.isFeature = 1;
                        } else {
                            rec.isFeature = 0;
                        }
                    });
                    //update DB through Ajax here
                    console.log("currentVideos",currentVideos);
                });
            }

            let getVimeoData = function(link) {
                //https://vimeo.com/336812686
                let vidId = link.split("https://vimeo.com/");
                vidId = vidId[1].split("/")[0];
                let vimeoResp = '[{"id":336812686,"title":"Direct Links To Video Files","description":"Hi there! Need help? Go to http:\/\/vimeo.com\/help","url":"https:\/\/vimeo.com\/336812686","upload_date":"2019-05-17 09:32:53","thumbnail_small":"https:\/\/i.vimeocdn.com\/video\/783757833-369ed61d5dd1e7a6a095543c901a1c4a656e6bc1e0471c1629d03f7fdd36d436-d_100x75","thumbnail_medium":"https:\/\/i.vimeocdn.com\/video\/783757833-369ed61d5dd1e7a6a095543c901a1c4a656e6bc1e0471c1629d03f7fdd36d436-d_200x150","thumbnail_large":"https:\/\/i.vimeocdn.com\/video\/783757833-369ed61d5dd1e7a6a095543c901a1c4a656e6bc1e0471c1629d03f7fdd36d436-d_640","user_id":90564994,"user_name":"Vimeo Support","user_url":"https:\/\/vimeo.com\/vimeosupport","user_portrait_small":"https:\/\/i.vimeocdn.com\/portrait\/27986607_30x30","user_portrait_medium":"https:\/\/i.vimeocdn.com\/portrait\/27986607_75x75","user_portrait_large":"https:\/\/i.vimeocdn.com\/portrait\/27986607_100x100","user_portrait_huge":"https:\/\/i.vimeocdn.com\/portrait\/27986607_300x300","duration":41,"width":1920,"height":1080,"tags":"","embed_privacy":"anywhere"}]';
                let vimeo = JSON.parse(vimeoResp)[0];
                let newVideo = {};
                newVideo['id'] = lastVidId+1;
                newVideo['title'] = vimeo.title;
                newVideo['thumbnail_medium'] = vimeo.thumbnail_medium;
                newVideo['url'] = vimeo.url;
                currentVideos.push(newVideo);
                currentVideoCount = currentVideos.length;
                loadCurrentVideos();
                lastVidId = currentVideos[currentVideos.length-1]['id'];
            }

            let getYouTubeData = function(link) {
                //"https://www.youtube.com/watch?v=ZdbQ_FvNBZA&t=915s&ab_channel=ScaleupAlly";
                let vidId = link.split("?");
                vidId = vidId[1].split("&")[0].split("=")[1];
                let youtubeResp = '{"kind":"youtube#videoListResponse","etag":"NY12d6Sa3mhyYdxx62iuVh0ta50","items":[{"kind":"youtube#video","etag":"BlL66Tqwd6vcpb_0fuUt4YHRBlA","id":"ZdbQ_FvNBZA","snippet":{"publishedAt":"2021-10-03T07:14:26Z","channelId":"UCyzKMNskJwgVy7j_lQ5aP-Q","title":"Session 5: What is Postman? and How to use it? by Suprabhat Sen","description":"Postman is one of the most important tools for any kind of Web and App Development. Learn how Postman works and helps make the job easier for any Software Developer","thumbnails":{"default":{"url":"https://i.ytimg.com/vi/ZdbQ_FvNBZA/default.jpg","width":120,"height":90},"medium":{"url":"https://i.ytimg.com/vi/ZdbQ_FvNBZA/mqdefault.jpg","width":320,"height":180},"high":{"url":"https://i.ytimg.com/vi/ZdbQ_FvNBZA/hqdefault.jpg","width":480,"height":360},"standard":{"url":"https://i.ytimg.com/vi/ZdbQ_FvNBZA/sddefault.jpg","width":640,"height":480},"maxres":{"url":"https://i.ytimg.com/vi/ZdbQ_FvNBZA/maxresdefault.jpg","width":1280,"height":720}},"channelTitle":"ScaleupAlly","categoryId":"28","liveBroadcastContent":"none","localized":{"title":"Session 5: What is Postman? and How to use it? by Suprabhat Sen","description":"Postman is one of the most important tools for any kind of Web and App Development. Learn how Postman works and helps make the job easier for any Software Developer"}}}],"pageInfo":{"totalResults":1,"resultsPerPage":1}}';
                let vimeo = JSON.parse(youtubeResp);
                let newVideo = {};
                newVideo['title'] = vimeo['items'][0]['snippet']['title'];
                newVideo['thumbnail_medium'] = vimeo['items'][0]['snippet']['thumbnails']['high']['url'];
                newVideo['url'] = link;
                newVideo['isFeature'] = 0;
                newVideo['type'] = 'videourl';
                //ajaxcall to update server
                //id will be returned from server
                newVideo['id'] = lastVidId+1;
                currentVideos.push(newVideo);
                currentVideoCount = currentVideos.length;
                lastVidId = currentVideos[currentVideos.length-1]['id'];
                loadCurrentVideos();
            }

            let loadCurrentVideos = function() {
                let str = '';
                if(currentVideos.length > 0) {
                $.each(currentVideos, (i,v) => {
                    str += '<div id="vid-'+v.id+'" class="col-md-3">';
                        str += '<div class="img-container h_66">';
                        str += '<img src="'+v.thumbnail_medium+'" class="width_inheritence" alt="image">';
                        str += '<div class="project_card_data w-100 h-100">';
                            str += '<div>';
                                str += '<i class="fa fa-trash-o" aria-hidden="true"></i>';
                            str += '</div>';
                        str += '</div>';
                        str += '<div class="title project_card_data w-100 h-100">';
                            str += '<p>'+v.title+'</p>';
                        str += '</div>';
                        str += '</div>';
                    str += '<div class="profile_input">';
                    str += '<input type="text" class="form-control video-link" name="project_video_link_'+v.id+'" placeholder="Video url" value="'+v.url+'">';
                    str += '</div>';
                    str += '<div class="d-flex mt-5 mt-md-3">';
                    str += '<div>';
                    if(v.isFeature)
                        str += '<input type="radio" class="checkbox_btn feature_ved" name="is_feature_ved" aria-label="" checked="checked" value="'+v.id+'">';
                    else
                        str += '<input type="radio" class="checkbox_btn feature_ved" name="is_feature_ved" aria-label="" value="'+v.id+'">';
                    str += '</div>';
                    str += '<div class="mk-feature mx-2">Make Feature Video</div>';
                    str += '</div>';
                    str += '</div>';
                });
                }
                str += '<div class="col-md-3 add-another-item add_video_btn d-flex align-items-end">';
                str += '<div>';
                str += '<button class="add_video_field save_add_btn">Add another</button>';
                str += '</div>';
                str += '</div>';
                $(parentElemId+" .video-list").html(str);
                bindActions();
            }

            let addVideoElem = function() {
                let str = '<div class="col-md-3">';
                    // str += '<div class="profile_upload_container h_66 mt-3 mt-md-0">';
                    //     str += '<div class="text-center">';
                    //     str += '<img src="" id="previewVid" onclick="document.getElementById(\'vidInp\').click();">';
                    //         str += '<div for="file-input" class="d-none">';
                    //         str += '<input type="video" onchange="uploadVideoFile(this)" name="project_video_link_1" accept="" id="vidInp">';
                    //         str += '</div>';
                    //         str += '<div onclick="document.getElementById(\'vidInp\').click();">';
                    //         str += '<i class="fa fa-plus-circle deep-pink icon-size" aria-hidden="true"></i>';
                    //         str += '</div>';
                    //         str += '<div class="mt-3 movie_name_text">Upload file';
                    //         str += '</div>';
                    //     str += '</div>';
                    // str += '</div>';
                    str += '<div class="img-container h_66 mt-3 mt-md-0">';
                        str += '<img src="https://i.vimeocdn.com/video/783757833-369ed61d5dd1e7a6a095543c901a1c4a656e6bc1e0471c1629d03f7fdd36d436-d_200x150" class="width_inheritence" alt="image">';
                    str += '</div>';    
                    str += '<div class="profile_input">';
                    str += '<input type="text" class="form-control video-link add" name="project_video_link_'+(lastVidId+1)+'" placeholder="Paste Link Here">';
                    str += '</div>';
                    str += '<div class="d-flex mt-5 mt-md-3">';
                        str += '<div>';
                        str += '<input type="radio" class="checkbox_btn" name="is_feature_ved" aria-label="" value="" disabled>';
                        str += '</div>';
                        str += '<div class="mk-feature mx-2">Make Feature Video</div>';
                    str += '</div>';
                str += '</div>';
                $(str).insertAfter(parentElemId+" .video-list #vid-"+lastVidId);
                bindActions();
            }

            return {
                init
            }
        }();
        // get the current video list from backend and load into the Gallary class.
        let currentVideos = [{'id':1,'title':'Direct Links To Video Files','thumbnail_medium':'https://i.vimeocdn.com/video/783757833-369ed61d5dd1e7a6a095543c901a1c4a656e6bc1e0471c1629d03f7fdd36d436-d_200x150',
                'url':'https://vimeo.com/336812686','isFeature':1}];
        Videos.init(currentVideos);

</script>
