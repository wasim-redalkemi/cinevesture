@extends('website.layouts.app',['class' => 'bg_white'])

{{-- @section('title','Cinevesture-setup') --}}

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
                <div class="profile_wraper profile_wraper_padding mt-md-0 mt-4 mb-5 mb-md-0">
                    <form role="form" class="validateBeforeSubmit" name="validateBefore" method="POST" onsubmit="return validationImageLessthen10ma()" enctype="multipart/form-data" action="{{ route('profile-store') }}">
                        @csrf
                        <div class="profile_text">
                            <h1>Profile</h1>
                        </div>

                        <div class="d-flex custom_file_explorer">
                            <div class="upload_img_container">
                                <img src="<?php if (!empty($user->profile_image)) {
                                                // echo Storage::url($user->profile_image);
                                                echo asset('public/storage/'.$user->profile_image);
                                            } ?>" class="upload_preview for_show croperImg" width="100%" height="100%">
                                <div for="file-input" class="d-none">
                                    <input type="file" name="croperImg"  class="@error('profile_image') is-invalid @enderror file_element image" accept=".jpg,.jpeg,.png" required>
                                    <input type="hidden" id="croppedImg" id="myFile" name="croppedImg">
                                    @error('profile_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="pointer open_file_explorer for_hide">
                                    <div class="text-center"> <i class="fa fa-plus-circle mx-2 profile_icon deep-pink pointer" aria-hidden="true"></i></div>
                                    <div>Upload</div>
                                </div>
                            </div>
                            <div class="mx-4 d-flex align-items-center">
                                <div>
                                    <div class="search-head-subtext Aubergine_at_night open_file_explorer pointer">
                                        Upload Profile Picture
                                    </div>
                                    <div class="search-head-subtext deep-pink pointer delete_image">
                                        Delete
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="profile_upload_text"> Upload JPG or PNG, 400x400 PX</div>
                        {{-- <div class="intro-img for_error_msg" style="display:none">
                            <strong>Profile image should be less then 10 MB.</strong>
                        </div> --}}
                        <div class="formate-img for_error_msg" style="display:none">
                            <strong>Select file formate should be JPG or PNG.</strong>
                        </div>
                        <div class="size-img for_error_msg" style="display:none">
                            <strong>Select file must be small then 10 MB.</strong>
                        </div>

                        <!-- <input type="file" name="image" class="image d-none"> -->
                        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
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


                        <div class="row">
                            <div class="col-md-4">
                                <div class="profile_input">
                                    <label>First Name <p class="m-0" style="color: red;visibility">*</p></label>
                                    {{-- <input type="text" class="outline is-invalid-remove name-only form-control @error('first_name') is-invalid @enderror" placeholder="{{ __('First Name') }}" name="first_name" value="@if(isset($user->first_name){{ $user->first_name}} @endif" --}}
                                    <input type="text" class="outline is-invalid-remove name-only form-control @error('first_name') is-invalid @enderror" placeholder="{{ __('First Name') }}" name="first_name"
                                    value="@if (!empty($user->first_name)){{ucFirst($user->first_name)}}@endif" aria-label="Username" aria-describedby="basic-addon1" required>
                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="profile_input">
                                    <label>Last Name <p class="m-0" style="color:red">*</p></label>
                                    <input type="text" class="outline is-invalid-remove name-only form-control @error('last_name') is-invalid @enderror" placeholder="{{ __('Last Name') }}" name="last_name" value="@if (!empty($user->last_name)){{ucFirst($user->last_name)}}@endif" aria-label="Username" aria-describedby="basic-addon1" required>
                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="profile_input">
                                    <label>Job Title</label>
                                    <input type="text" class="outline is-invalid-remove form-control @error('job_title') is-invalid @enderror" placeholder="Job Title" name="job_title" value="@if (!empty($user->job_title)) {{$user->job_title}} @endif" aria-label="Username" aria-describedby="basic-addon1">
                                    @error('job_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="profile_input" style="max-height:300px;overflow:auto;">
                                    <label for="lang">Age</label>

                                    <select name="age" class="outline is-invalid-remove @error('age') is-invalid @enderror" id="lang">
                                        <option value="" >Select</option>
                                        @foreach($age as $a)
                                        <option value="{{$a->id}}"@if ($a->id == $user->age) selected @endif>{{ $a->range }}</option>
                                        @endforeach

                                    </select>
                                    @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="profile_input">
                                    <label for="lang">Gender</label>
                                    <select name="gender" class="outline is-invalid-remove @error('gender') is-invalid @enderror" id="lang">
                                        <option value="">Select</option>
                                        @foreach($gender as $k=>$v)
                                        <option value="{{$v->id}}"@if ($v->id == $user->gender) selected @endif>{{ $v->gender }}</option>
                                        @endforeach
                                    </select>                                   
                                    @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="profile_input">
                                    <label for="lang">Gender Pronouns</label>
                                    <select name="gender_pronouns" class="outline is-invalid-remove @error('gender_pronouns') is-invalid @enderror" id="lang">
                                        <option value="">Select</option>
                                        @foreach($genderPronouns as $k=>$v)
                                        <option value="{{$v->id}}"@if ($v->id == $user->gender_pronouns) selected @endif>{{ $v->gender_pronouns }}</option>
                                        @endforeach
                                    </select>
                                    @error('gender_pronouns')
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
                                    <label for="lang">Available To Work In</label>
                                    <select name="available_to_work_in" class="outline is-invalid-remove @error('available_to_work_in') is-invalid @enderror" id="lang">
                                        <option value="">Select</option>
                                        <option value="virtually" <?php if ("virtually" == $user->available_to_work_in) {
                                                                        echo ('selected');
                                                                    } ?>>Virtually</option>
                                        <option value="physically" <?php if ("physically" == $user->available_to_work_in) {
                                                                        echo ('selected');
                                                                    } ?>>Physically</option>
                                        <option value="hybrid" <?php if ("hybrid" == $user->available_to_work_in) {
                                                                        echo ('selected');
                                                                    } ?>>Hybrid</option>
                                    </select>
                                    @error('available_to_work_in')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="profile_input">
                                    <label for="lang">Located in</label>
                                    <select name="Located_in" id="located_in" class="outline is-invalid-remove @error('Located_in') is-invalid @enderror" id="lang">
                                        <option value="">Select</option>
                                        @foreach ($country as $k=>$v)
                                        <option value="{{ $v->id }}" <?php if (isset($user->country) && $user->country->id == $v->id) {
                                                                            echo ('selected');
                                                                        } ?>>{{ $v->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('Located_in')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4  display-none"  id="state-show">
                                <div class="profile_input">
                                    <label for="lang">State</label>
                                    <select name="state" id="state" class="outline is-invalid-remove @error('state') is-invalid @enderror" id="lang">
                                        <option value="">Select</option>
                                        @foreach ($state as $k=>$v)
                                        
                                        <option value="{{ $v->id }}" <?php if (isset($user->state_id) && $user->state_id == $v->id) {
                                            echo ('selected');
                                        } ?>>{{ $v->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('state')
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
                                    <label>About</label>
                                    <div class="form_elem">
                                    <textarea class="outline form-control controlTextLength  is-invalid-remove form-control text_editor @error('about') is-invalid @enderror" text-length="500" maxlength="500" name="about" aria-label="With textarea"><?php if (isset($user->about)) { echo ($user->about);} ?></textarea>
                                    @error('about')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                        <div class="col-md-12">
                                <div class="mt_16 select2forError">
                                    <label for="lang">Languages Spoken</label>
                                    <select name="languages[]" class="js-select2 @error('languages') is-invalid @enderror" id="lang" multiple>
                                        @foreach ($languages as $k=>$v)
                                        <option value="{{ $v->id }}" @if(in_array($v->id,$user->language))selected @endif>{{ $v->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('languages')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mt_16 select2forError">
                                    <label for="lang">Skills</label>
                                    <select name="skills[]" class="outline is-invalid-remove js-select2" id="lang" multiple>
                                        @foreach ($skills as $k=>$v)
                                        <option value="{{ $v->id }}" @if(in_array($v->id,$user->skill))selected @endif>{{ $v->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('skills')
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
                                    <label>IMDB Profile</label>
                                    <input type="url" class="outline is-invalid-remove form-control @error('imdb_profile') is-invalid @enderror" placeholder="IMDB Profile" name="imdb_profile" value="<?php if (isset($user->imdb_profile)) {
                                        echo ($user->imdb_profile);
                                    } ?>" aria-label="Username" aria-describedby="basic-addon1">
                                    @error('imdb_profile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="profile_input">
                                    <label>LinkedIn Profile</label>
                                    <input type="url" class="outline is-invalid-remove form-control @error('linkedin_profile') is-invalid @enderror" placeholder="LinkedIn Profile" name="linkedin_profile"
                                    value="<?php if (isset($user->linkedin_profile)) {
                                    echo ($user->linkedin_profile);
                                    } ?>" aria-label="Username" aria-describedby="basic-addon1">
                                    @error('linkedin_profile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="for_error_msg">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="profile_input">
                                    <label>Website</label>
                                    <input type="url" class="outline is-invalid-remove form-control @error('website') is-invalid @enderror" placeholder="Website" aria-label="Username" name="website" 
                                    value="<?php if (isset($user->website)) {echo ($user->website);} ?>" aria-describedby="basic-addon1">
                                    @error('website')
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
                                    <label>Introduction Video</label>
                                    <input type="url" class="outline is-invalid-remove form-control @error('intro_video_link') is-invalid @enderror" placeholder="Paste link here" name="intro_video_link" id="introduction_video"
                                    value="<?php if (isset($user->intro_video_link)) {echo ($user->intro_video_link);} ?>" aria-label="Username" aria-describedby="basic-addon1">
                                    @error('intro_video_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-end mt-md-0 mt-4">
                                    <a href="{{route('profile-private-show')}}" class="cancel_btn mx-3" style="text-decoration:none">Cancel</a>
                                    <button type="submit" class="guide_profile_btn">Save</button>
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
@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $("#error-toast").toast("show");
        $("#success-toast").toast("show");
    });
    $(document).ready(function() {
        $('.open_file_explorer').click(function(e) {
            $(this).parents('.custom_file_explorer').find('.file_element').val("");
            $(this).parents('.custom_file_explorer').find('.file_element').click();
        });

        $('.file_element').change(function() {
        // alert("onchange")
            // var output = $(this).parents('.custom_file_explorer').find('.upload_preview');
            // const file = this.files;
            // var reader = new FileReader();
            // reader.onload = function() {
            //     output.attr('src',reader.result);
            // };
            // reader.readAsDataURL(file[0]);

        });
       
        $('button[type="submit"]').removeAttr('disabled');   
        $('#introduction_video').on('change mouseup keyup',function() {
            $("div.intro-video").hide();
            $('button[type="submit"]').removeAttr('disabled');
            var urlLength= $('#introduction_video').val().length;
            var url = $('#introduction_video').val();
            // console.log(urlLength,url);
            if(url == ""){
                return true;
                
            }
            var videoId = validateYouTubeUrl(url);
            // console.log("videoId = ",videoId);
            if(!videoId){
                // console.log("true  ");
                $("div.intro-video").show();
                $('button[type="submit"]').attr('disabled','disabled');
            }
            return false;
        });
    });

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


    $("#located_in").on('change', function() {
        if ($("#located_in option:selected").text().trim() == "India") {
            $("#state-show").show();
        } else {
            $("#state-show").hide();
            $("option:selected", $("#state")).prop("selected", false);

        }
    });
    
    if($("#located_in option:selected").text() == 'India')
        {
            $("#state-show").show();
       
    };

    $('.for_show').hide();
    if($('.upload_preview').attr('src') != '')
    {
        $('.upload_preview').show();
        $('.for_hide').hide();
    }

    // croper 

    croperImg = document.querySelector('.croperImg'),
    finalImage = document.querySelector('.finalImage'),

    function validateSize(input) {
       
    }
    let result = document.querySelector('.result'),

    formData = new FormData()
    var base64data = null;
    var $modal = $('#modal');
    var image = document.getElementById('image');
    var cropper;

    $("body").on("change", ".image", function(e) {
       var  files = e.target.files;
        // alert(files)
        var done = function(url) {
            image.src = url;
            $modal.modal('show');
        };
        var reader;
        var file;
        var url;

        if (files && files.length > 0) {
            file = files[0];
            

            var file = this.files[0];
            var fileType = file["type"];
            var validImageTypes = ["image/gif", "image/jpeg", "image/png"];
            if ($.inArray(fileType, validImageTypes) < 0) {
                formData.append("document", file)
            } else {
                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
                    reader.onload = function(e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }

        }
    });

    $modal.on('shown.bs.modal', function() {


     cropper = new Cropper(image, {
        dragMode: 'move',
        cropBoxMovable: true,
        cropBoxResizable: true,
        // toggleDragModeOnDblclick: false,
        aspectRatio: 1/1,
        minCropBoxHeight: 200,
        minCropBoxWidth: 200,
        maxCropBoxHeight: 400,
        maxCropBoxWidth: 400,
        viewMode:1,
    // data:{ //define cropbox size
    //   width: 300,
    //   height:  300,
    // },
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
            
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function() {
                base64data = reader.result;
                var file = dataURLtoFile(base64data, 'profile_img.png');
                // console.log(file.size/(1024*1024));
                if (parseFloat(file.size/(1024*1024))>1) {
                    toastMessage('error','your file size is  img greater then 10 MB you need to small cropper')
                        return false;
                }
                croperImg.src = base64data;
                $("#croppedImg").val(base64data);
                image.src = file;
                formData.append("document", file)
                

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

    $('.delete_image').on('click', function() {
        var image_x = document.getElementsByClassName("upload_img_container");
        $(".croperImg").attr("src", "");
        $("img").removeClass("croperImg");

        $('.for_hide').css('display', 'block');
        $('.for_show').css('display', 'none');

    })

    

    //     var url = $('#introduction_video').val();
    //     alert(url); 
    //     var videoId = validateYouTubeUrl(url);
    //     if (videoId) {
    //     console.log("Valid YouTube URL, video ID: " + videoId);
    //     } else {
    //     console.log("Invalid YouTube URL");
    //     }
    function validateYouTubeUrl(url) {
     var pattern = /^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/;
     return url.match(pattern) ? RegExp.$1 : false;
        }
        
        var img=document.forms['validateBefore']['croperImg'];
        const formate=['jpg','png'];

        function validationImageLessthen10ma() {
            if (img.value!="") {
                var fileNum=img.value.lastIndexOf('.')+1;
                var fileFormate=img.value.substring(fileNum);
                var result= formate.includes(fileFormate);
                if(result==false){
                    $('.formate-img').show();
                    return false;
                }
                // if(parseFloat(img.files[0].size/(1024*1024))>=10) {
                //     $('.size-img').show();
                //     return false;
                // }
            }
        }
        var hasUserSubscription= "{{ Session::get('freeSubscription')}}";
    console.log(hasUserSubscription);
    if (hasUserSubscription!='free') {
      sessionStorage.setItem("freeToastMSG", "1"); 
    }
    </script>
@endpush
