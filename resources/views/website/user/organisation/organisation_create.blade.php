@extends('website.layouts.app',['class' => 'bg_white'])

{{-- @section('title','Cinevesture-organisation-create') --}}

@section('header')
@include('website.include.header')
@endsection

@section('content')
<div class="hide-me animation for_authtoast">
    @include('website.include.flash_message')
</div>
<section class="profile-section">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('website.include.profile_sidebar')
            </div>
            <div class="col-md-9">
                <div class="profile_wraper profile_wraper_padding mt-md-0 mt-4">
                    <form role="form" name="organizationForm" onsubmit="return validateOrganizationForm();return false;" class="validateBeforeSubmit" id="form" method="POST" enctype="multipart/form-data" action="{{ route('organisation-store') }}">
                        @csrf

                        <div class="profile_text">
                            <h1>Organisation</h1>
                        </div>
                        <div class="d-flex custom_file_explorer mt-3">
                            <div class="upload_img_container imgLogo">
                                <img src="<?php if (!empty($UserOrganisation->logo)) {
                                                echo Storage::url($UserOrganisation->logo);
                                            } ?>" class="upload_preview for_show croperImg" width="100">

                                <div for="file-input" class="d-none">
                                    <input name="croppedOrgImg" class=" @error('croppedOrgImg') is-invalid @enderror" id="croppedOrgImg" type="hidden" required>
                                    @error('croppedOrgImg')
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
                                <div class="imgLogo">
                                    <div class="search-head-subtext Aubergine_at_night open_file_explorer pointer">
                                        Upload Profile Picture <span style="color:red">*</span>
                                    </div>
                                    <div class="pointer search-head-subtext open_file_explorer deep-pink delete_image" id="delete_img">
                                        Delete
                                    </div>
                                    <input type="file" name="logo" id="logo" class="d-none @error('logo') is-invalid @enderror file_element image" accept=".jpg,.jpeg,.png" required>
                                    @error('logo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <span class="empty-image d-none" id="img-error">
                                        This field is required
                                    </span>
                                    <div class="size-img for_error_msg" style="display:none">
                                        <strong>Select file must be small then 10 MB.</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="modal fade" id="modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                            <div class="col-md-6">
                                <div class="profile_input">
                                    <label>Name <span style="color:red">*</span></label>
                                    <input type="text" class="outline form-control @error('name') is-invalid @enderror" placeholder="{{ __('Name') }}" name="name" value="{{old('name',isset($UserOrganisation->name)?$UserOrganisation->name:"")}}" aria-label="Username" aria-describedby="basic-addon1" required >
                                    @error('name')
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
                                    <label>Organisation Type <span style="color:red">*</span></label>
                                    <select name="organisation_type" class="@error('organisation_type') is-invalid @enderror" id="" required >
                                        <option value="">Select</option>
                                        @foreach ($organisationType as $k=>$v)
                                        <option @php if(isset($UserOrganisation->type)){
                                            if ($UserOrganisation->type == $v->id) {
                                            echo 'selected';
                                            }
                                            }
                                            @endphp value="{{ $v->id }}">{{ $v->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('organisation_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="profile_input text_field">
                                    <label>About <span style="color:red">*</span></label>
                                    <div class="form_elem"> <textarea class="form-control controlTextLength text_editor" text-length="500" id="" name="about"  aria-label="With textarea" required >{{old('about',isset($UserOrganisation->about)?$UserOrganisation->about:"" )}}</textarea></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="profile_input select2forError">
                                    <label>Services <span style="color:red">*</span></label>
                                    <select name="service_id[]" class="outline js-select2 @error('service_id') is-invalid @enderror" id="" multiple  required>
                                        @foreach ($organisationService as $k=>$v)
                                        <option value="{{ $v->id }}" @if(isset($UserOrganisation->organizationServices) && in_array($v->id, $UserOrganisation->organizationServices))selected @endif>{{ $v->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('service_id[]')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="profile_input select2forError">
                                    <label> Languages Spoken <span style="color:red">*</span></label>
                                    <select name="language_id[]" class="outline js-select2 @error('language_id') is-invalid @enderror" id="lang" multiple  required>
                                        @foreach ($languages as $k=>$v)
                                        <option value="{{ $v->id }}" @if(isset($UserOrganisation->organizationLanguages )&&(in_array($v->id, $UserOrganisation->organizationLanguages)))selected @endif>{{ $v->name }}</option>
                                        @endforeach

                                    </select>
                                    @error('language_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="profile_input">
                                    <label>Located In <span style="color:red">*</span></label>
                                    <select name="located_in" class="@error('located_in') is-invalid @enderror" id="" required >
                                        <option value="">Select</option>
                                        @foreach ($country as $k=>$v)
                                        <option @php if(isset($UserOrganisation->location_in[0])){
                                            if ($UserOrganisation->location_in == $v->id) {
                                            echo 'selected';
                                            }
                                            }
                                            else{
                                                if ($v->id == request('located_name')) {
                                            echo 'selected';
                                            }
                                            }
                                            @endphp value="{{ $v->id }}">{{old('located_in', $v->name) }}</option>
                                        @endforeach
                                    </select>
                                    @error('located_in')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="profile_input">
                                    <label>Available To Work In <span style="color:red">*</span></label>
                                    <select name="available_to_work_in" class="@error('available_to_work_in') is-invalid @enderror" id="" required >
                                        <option value="">Select</option>
                                        <option @if(isset($UserOrganisation->available_to_work_in))
                                            @if ("virtually" == $UserOrganisation->available_to_work_in) 
                                            {{'selected'}}
                                            @endif

                                            @endif value="virtually">Virtually
                                        </option>
                                        <option @if(isset($UserOrganisation->available_to_work_in))
                                            @if ("physically" == $UserOrganisation->available_to_work_in) 
                                            {{'selected'}}

                                            @endif
                                            @endif value="physically">Physically
                                        </option>
                                        <option @if(isset($UserOrganisation->available_to_work_in))
                                            @if ("hybrid" == $UserOrganisation->available_to_work_in) 
                                            {{'selected'}}

                                            @endif
                                            @endif value="hybrid">Hybrid
                                        </option>
                                    </select>
                                    @error('available_to_work_in')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="profile_input">
                                    <label>IMDB Profile</label>
                                    <input type="url" class="outline form-control @error('imdb_profile') is-invalid @enderror" placeholder="IMDB Profile" name="imdb_profile" value="{{old('imdb_profile',isset($UserOrganisation->imdb_profile)?$UserOrganisation->imdb_profile:'' )}}" aria-label="Username" aria-describedby="basic-addon1" >
                                    @error('imdb_profile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="profile_input">
                                    <label>LinkedIn Profile</label>
                                    <input type="url" class="outline form-control @error('linkedin_profile') is-invalid @enderror" placeholder="LinkedIn Profile" name="linkedin_profile" value="{{old('linkedin_profile',isset($UserOrganisation->linkedin_profile)?$UserOrganisation->linkedin_profile:'' )}}" aria-label="Username" aria-describedby="basic-addon1" >
                                    @error('linkedin_profile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="profile_input">
                                    <label>Website</label>
                                    <input type="url" class="outline form-control @error('website') is-invalid @enderror" placeholder="Website" aria-label="Username" name="website" value="{{old('website',isset($UserOrganisation->website)?$UserOrganisation->website:'' )}}" aria-describedby="basic-addon1" >
                                    @error('website')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="profile_input">
                                    <label>Introduction Video</label>
                                    <input type="url" id="introduction_video" class="outline form-control @error('intro_video_link') is-invalid @enderror" placeholder="Paste link here" name="intro_video_link" value="{{old('intro_video_link',isset($UserOrganisation->intro_video_link)?$UserOrganisation->intro_video_link:'' )}}" aria-label="Username" aria-describedby="basic-addon1" >
                                    @error('intro_video_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div class="intro-video for_error_msg" style="display:none">
                                        <strong>Only youtube and vimeo URLs are allowed.</strong>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-md-3 d-flex align-items-end">
                                <div>
                                    <button class="save_add_btn">Add another</button>
                                </div>
                            </div> --}}
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="profile_input">
                                    <label>Team size</label>
                                    <input type="number" class="form-control" name="team_size" value="{{old('team_size',isset($UserOrganisation->team_size)?$UserOrganisation->team_size:'' )}}" placeholder="Team size" aria-label="Username" aria-describedby="basic-addon1">
                                    @error('team_size')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 d-flex my-3 align-items-center">
                                <div class="organisation_cmn_text deep-pink">
                                    <h6>Team members</h6>
                                </div>
                                <!-- <div class="mx-5 icon_container"><i class="fa fa-plus icon-size deep-pink" aria-hidden="true"></i></div> -->
                                <div class="mx-5 icon_container pointer" data-toggle="modal" data-target="#inviteMemberModal"> <span class="icon-size deep-pink">+</span></div>

                                <!-- Invite Members modal  -->
                                <div class="modal fade" id="inviteMemberModal" tabindex="-1" role="dialog" aria-labelledby="inviteMemberModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content bg_3308">
                                            <div class="modal-body p-0">
                                                <section class="p-3">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="signup-text  mt-5 mt-md-5"> Invite Members </div>

                                                                <div class="proctect_by_capta_text mt-4 text-center">
                                                                    You can invite up to two members in your enterprise plan.
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 mt-4">
                                                                <input type="email" id="email_1" name="email_1" value="" placeholder="Email" class="modal_input" required>
                                                                @error('email_1')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                                <div class="email_contact for_error_msg" id="empty_email" style="display:none">
                                                                    <strong>This field is required.</strong>
                                                                </div>
                                                            </div>
                                                            {{-- <div class="col-md-12 mt-3">
                                                                <input type="email" id="email_2" name="email_2" value="" placeholder="Second email" class="modal_input">
                                                                @error('email_2')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div> --}}
                                                            <div class="col-md-12 py-3">
                                                                <input type="hidden" id="organization_id" name="organization_id" value="@if (!empty($UserOrganisation->id)) {{$UserOrganisation->id}} @endif">
                                                                <button type="button" class="invite_btn">Invite</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="row">
                            <div class="col-md-3">
                                <div><img src="{{ asset('images/asset/photo-1595152452543-e5fc28ebc2b8 2.png') }}" class="w-100">
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <div class="organisation_cmn_text">Title</div>
                    <div class="icon_container"><i class="fa fa-times-circle icon-size deep-pink" aria-hidden="true"></i></div>
                </div>
            </div>
            <div class="col-md-3">
                <div><img src="{{ asset('images/asset/67a6c213a22d2ba4c3982a55d828b5c7 1.png') }}" class="w-100"></div>
                <div class="d-flex justify-content-between mt-3">
                    <div class="organisation_cmn_text">Title</div>
                    <div class="icon_container"><i class="fa fa-times-circle icon-size deep-pink" aria-hidden="true"></i></div>
                </div>
            </div>
        </div> --}}
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-end mt-4">
                   <button class="cancel_btn  mx-3" onclick="discard_bth()">Discard</button>
                    <button type="submit" id="save_button" class="guide_profile_btn mx-3">Save</button>
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

function validateOrganizationForm(){
    let logo = $("#logo").val();
    let img = $('.upload_preview').attr('src');
    if (!logo && !img) {
        let errorElem = 
        $("#img-error").removeClass('d-none');
        $(window).scrollTop(0);
        return false;
    }else{
        
        var validationImage=validationImageLessthen10ma();
        if (validationImage==false) {
            return false;
        }else{
            return true;
        }
        
    }
}
function discard_bth() {
    location.reload();
}

    $(document).ready(function() {
        $('.imgLogo').on('change',function () {
            let logo = $("#logo").val();
            let img = $('.upload_preview').attr('src');
            if(logo || img){
                $("#img-error").addClass('d-none');
            }
        })

        // $('.for_hide').css('display', 'block');
        // $('.for_show').css('display', 'none');

        // $('form,#delete_img').on('submit click change',(function (){
        //     // e.preventDefault();
        //     if (($('.file_element').val())=='') {
              
        //         // $('#save_button').attr('disabled','disabled');
        //         $('#img-error').removeClass("d-none");
        //     }else{
        //         $('#img-error').addClass("d-none");
        //         $('#save_button').removeAttr('disabled');
        //     }
        // }))
        
            
        // $('form,croppedOrgImg,logo').on('submit change keyup',(function (e) {
        //     if(($('#croppedOrgImg').val()==""))
        //     {
        //         e.preventDefault();
        //         console.log('up');
        //         $('#img-error').removeClass("d-none");
        //     }
        //     else
        //     {
        //         $('#croppedOrgImg').change(function(){
        //             $('#img-error').addClass("d-none");
        //         })
        //         console.log('down');
        //         $(e).submit();
        //     }
        // }));
        $('.for_show').hide();
        if ($('.upload_preview').attr('src') != '') {
            $('.upload_preview').show();
            $('.for_hide').hide();
        }
        $('.open_file_explorer').click(function(e) {
            // $(this).parents('.custom_file_explorer').find('.file_element').click();
            $(this).parents('.custom_file_explorer').find('.file_element').val("");
            $(this).parents('.custom_file_explorer').find('.file_element').click();
        });

        // $('#lang').change(function() {
        //     $(".uploadedPdf").text(resume.name)
        // });

        // $('button[type="submit"]').removeAttr('disabled');   
    });

    croperImg = document.querySelector('.croperImg'),
        finalImage = document.querySelector('.finalImage'),

        function validateSize() {
            // const fileSize = input.files[0].size / 1024 / 1024; // in MiB
           
        }
        
    let result = document.querySelector('.result'),

        formData = new FormData()
    var base64data = null;
    var $modal = $('#modal');
    var image = document.getElementById('image');
    var cropper;

    $("body").on("change", ".image", function(e) {
        var files = e.target.files;
        var done = function(url) {
            image.src = url;
            $modal.modal('show',{
                backdrop: 'static',
        keyboard: false,
       
        });
        };
        var reader;
        var file;
        var url;

        if (files && files.length > 0) {
            file = files[0];
            // console.log(file, "file 472");

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
            cropBoxMovable: true,
            cropBoxResizable: true,
            toggleDragModeOnDblclick: false,
            viewMode:1,
            aspectRatio: 1/1,
            minCropBoxHeight: 200,
            minCropBoxWidth: 200,
            maxCropBoxHeight: 400,
            maxCropBoxWidth: 400,
            data: { //define cropbox size
                width: 300,
                height: 300,
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
                var cropped_size = parseFloat(file.size/(1024*1024)); //in MB
                // console.log(cropped_size);
                if(cropped_size>1){
                    toastMessage('error','your file size is  img greater then 10 MB you need to small cropper')
                    return false;
                }
                // base64data = mybase64data;
                croperImg.src = base64data;
                $("#croppedOrgImg").val(base64data);
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

    });

    $('.invite_btn').click(function(e) {
        var email_1 = $('#email_1').val();
        // var email_2 = $('#email_2').val();
        if (email_1=="") {
            $('#empty_email').show();
            return false;
        }
        var organization_id = $('#organization_id').val();

        let $btn = $(this);
        e.preventDefault();
        e.stopPropagation();

        $btn.text("Sending..");
        $btn.prop('disabled',true);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });

        $.ajax({
            url: "{{ route('team-email') }}",
            type: 'POST',
            dataType: 'json',
            data: {
                organization_id: organization_id,
                email_1: email_1,
                // email_2: email_2,
                // "_token": "{{ csrf_token() }}"
            },
            success: function(response) {
                $('#email_1').val("");
                // $('#email_2').val("");
                $btn.text("Send Mail");
                $btn.prop('disabled',false);
                toastMessage("error", response.msg);
                $('.modal').hide();
                $('.modal-backdrop').remove();
            },
            error: function(response, status, error) {
                $btn.text("Send Mail");
                    $btn.prop('disabled',false);
                // console.log(response);
                // console.log(status);
                // console.log(error);
            }
        });
    });
    $('.delete_image').on('click', function() {
        var image_x = document.getElementsByClassName("upload_img_container");
        $(".upload_preview").attr("src", "");
        // $("img").removeClass("croperImg");

        $('.for_hide').css('display', 'block');
        $('.for_show').css('display', 'none');

    })
    function validateYouTubeUrl(url) {
     var pattern = /^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/;
     return url.match(pattern) ? RegExp.$1 : false;
        }
    $('#introduction_video,form').on('keyup change',function() {
        $("div.intro-video").hide();
        $('button[type="submit"]').removeAttr('disabled');
        var urlLength= $('#introduction_video').val().length;
        var url = $('#introduction_video').val();
        if(url == ""){
            return true;
        }
        var videoId = validateYouTubeUrl(url);
        if(!videoId){
            $("div.intro-video").show();
            $('button[type="submit"]').attr('disabled','disabled');
        }
    });
    var img=document.forms['organizationForm']['logo'];
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
                if(parseFloat(img.files[0].size/(1024*1024))>=10) {
                    $('.size-img').show();
                    return false;
                }
            }
        }
</script>
@endpush
