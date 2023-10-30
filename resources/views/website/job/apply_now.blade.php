@extends('website.layouts.app',['class' => 'bg_white'])

{{-- @section('title','Cinevesture-organisation') --}}

@section('header')
@include('website.include.header')
@endsection

@section('content')

<section class="guide_profile_section my-4">
    <div class="container">
        <div class="row">
            {{-- <div class="col-md-12" id="err-container">
                @if ($errors->any())

                @foreach ($errors->all() as $error)

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Warning!</strong> {{ $error }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endforeach
                @endif
            </div> --}}
            <div class="col-md-12 mt-sm-0">
                <div class="content_wraper">
                    <div class="guide_profile_subsection">
                        <div class="contact-page-text deep-aubergine">Apply For {{ucFirst($jobTitle->title)}}</div>
                    </div>
                    <form class="validateBeforeSubmit" id="apply_job_form" action="{{route('storeApplyJob',['jobId'=>request('jobId')])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="guide_profile_subsection" id="Documents">
                            <div class="guide_profile_main_text mt-2 mt-md-3">Resume/CV<em class="text-danger mx-1">*</em></div>
                            <div class="preview_subtext deep_aubergine mt-2 mt-md-3">Please Attach Your Resume</div>
                            <div class="row">
                                <div class="col-10 col-md-3">
                                    <div id="Documents" class="add_content_wraper">
                                        <label for="upload-doc-inp" class="d-block" id="resume_job">
                                            <div class="d-flex align-items-center mt-3">
                                                <div><i class="fa fa-paperclip aubergine icon-size" aria-hidden="true"></i></div>
                                                <div class="upload_resume_text mx-2">Upload Your Resume/CV</div>
                                                <input type="file"  accept="application/pdf,application/msword" name="resume" class="form-control @error('resume') is-invalid @enderror docInp d-none" id="upload-doc-inp">
                                                @error('resume')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
        
                                        </label>
                                            <div class="">
                                                <div class="document_pdf mt-2 justify-content-between">
                                                    <div class="upload_loader">
                                                        <img src="{{ asset('images/asset/pdf_image.svg') }}" alt="image">
                                                    </div>
                                                    <div class="mx-2">
                                                        <div class="uploadedPdf mx-2 forWordBreak"></div>
                                                    </div>
                                                    <div class="delete_file"><i class="fa fa-times pointer" aria-hidden="true"></i></div>
                                                </div>
                                            </div>
        
                                    </div>
                                    <div class="resumeFile for_error_msg" style="display:none">
                                        <strong>Your resume file must be less then 10 MB.</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="guide_profile_subsection">
                            <div class="guide_profile_main_text">Cover Letter <em class="text-danger">*</em></div>
                            <div class="profile_input form_elem">
                                <textarea name="cover_letter" class="form-control controlTextLength text_editor5 @error('cover_letter') is-invalid @enderror " text-length="500" id="text_editor5" id="cover_letter" aria-label="With textarea" placeholder="Your answer here" required></textarea>
                                @error('cover_letter')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                            </div>
                            <div class="d-flex justify-content-end justify-content-md-center mt-5 mb-4">
                                <button type="button" class="cancel_btn mx-2 mx-md-5" ><a href="{{route('showJobSearchResults')}}">Back</a></button>
                                <button type="submit" class="guide_profile_btn">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- Modal for Confirmation for account deactivate -->
<div class="modal fade" id="job_apply_success_modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
         <div class="d-flex justify-content-end m-2">
             {{-- <button type="button" class="simple_cross_btn" data-bs-dismiss="modal" aria-label="Close">  <img src="{{ asset('images/asset/cross_Icon.svg') }}" /> </button> --}}
         </div>
            <div class="modal-body" style="padding: 0px;">
                <section>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="modal_container">
                                    <div class="icon_container done">
                                        <i class="fa fa-check icon_style" aria-hidden="true"></i>
                                    </div>
                                    <div class="head_text mt-4">Congratulations!</div>
                                    <div class="successfullPublish_text sub_text mt-4">
                                        You have successfully applied for this job.
                                    </div>
                                    <div class="pb-4">
                                        <a href="{{route('showJobSearchResults')}}" class="submit_btn mt-4 text-decoration-none text-light" style="width: 40%;">Apply More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
<!-- End for Modal  -->

@endsection

@section('footer')
@include('website.include.footer')
@endsection


@push('scripts')
<script>
    $(".document_pdf").fadeOut(100)
     
    // console.log($('.apply_job_form').attr('src'));
    // if ( $('.apply_job_form').attr('src') != '') {
    //     $(".document_pdf").fadeIn(100)
    // }
    $("#upload-doc-inp").change(function(e) {
        // console.log($(".uploadedPdf").text(""));
        // $("#upload-doc-inp").val("");
        $(".uploadedPdf").text("")
        let resume = $("#upload-doc-inp")[0].files[0]
        $(".document_pdf").fadeIn(100)
        $(".uploadedPdf").text(resume.name)
        $('.e-err').hide()
    })
    $(".delete_file").click(function () {
        $(".uploadedPdf").text("")
        $("#upload-doc-inp").val("")
         $(".document_pdf").fadeOut(100)
    })
    $("#apply_job_form").on("submit", function(e) {
        e.preventDefault();
        e.stopPropagation();
        
        if(!$("#upload-doc-inp").val()){
            $("#resume_job").parent().find('span').remove();
            if ($("#resume_job").parent().find('span').length == 0) {
                $(`<span class="e-err" style="color: #DD45B3; font-weight:600 ;margin:0px;">Please select resume</span>`).insertAfter($("#resume_job"));    
             }  
            return false;
        }
        var resumeKb = $("#upload-doc-inp")[0].files[0].size;
        var resumeMb = (resumeKb/(1024*1024)).toFixed(2);
        if (resumeMb>10) {
            $(".resumeFile").show();
            $(window).scrollTop(0);
            return false;
        }
        $("#job_apply_success_modal").modal({
        show: false,
        backdrop: 'static'
        });
      
        let $submitBtn = $(".guide_profile_btn");
        $submitBtn.prop("disabled", true);
        $submitBtn.text("Submitting...");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
        let formData = new FormData();
        let resume = $("#upload-doc-inp")[0].files[0];
        let cover_letter = $("#cover_letter").val();
        formData.append("resume", resume)
        formData.append("cover_letter", cover_letter);
        console.log(resume, "cover_letter");
        let apiUrl = $(this).attr('action');
        $.ajax({
            type: 'post',
            data: formData,
            url: apiUrl,
            processData: false,
            contentType: false,
            success: function(resp) {
                $submitBtn.prop("disabled", false);
                $submitBtn.text("Submit");
                if (resp.status) {
                    $("#job_apply_success_modal").modal("show");
                } else {
                    let err_content = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Warning!</strong> ${resp.message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>`;
                    $("#err-container").html(err_content);
                }
            },
            error: function(error) {
                $submitBtn.prop("disabled", false);
                $submitBtn.text("Submit");
            }
        });
    });
</script>
<script>
    $(document).ready(function()
    {
        $('.text_editor').click();
    });
    function apply_text_editor(select_elem)
    {
        var numChars; 
        // var select_elem = '.text_editor';
        tinymce.init({
        selector: select_elem,
        toolbar: '',
        plugins: ' anchor pagebreak visualchars wordcount paste',
        paste_as_text:true,
        menubar: false,
        branding: false,
        setup: function(editor) {
            var text_elem = $(select_elem).parents('.form_elem').find('.textlength');
                 var max = $(select_elem).attr('text-length');
            function updateCharacterCount(numChars) {
                text_elem.text(numChars + '/' + max);
                if (numChars >= max) {
                    text_elem.text(' You have reached the limit').css('color', 'red');
                } else {
                    text_elem.css('color', 'black'); // Reset color if characters are within limit
                }
            }
            editor.on('init', function () {
                // var numChars = editor.plugins.wordcount.body.getCharacterCount();
                var numChars = tinymce.activeEditor.plugins.wordcount.body.getWordCount();
                console.log(numChars);

                updateCharacterCount(numChars);
                editor.on('KeyDown', function(event) {
                    // var numChars = editor.plugins.wordcount.body.getCharacterCount();
                    var numChars = tinymce.activeEditor.plugins.wordcount.body.getWordCount();
                    
                    if (numChars == max ) {
                        if(event.keyCode === 8 || event.keyCode === 37 || event.keyCode === 38|| event.keyCode === 39|| event.keyCode === 40 || event.keyCode === 116)
                        {
                        }
                        else
                        {
                            event.preventDefault();
                            return false;
                        }
                    }
                    updateCharacterCount(numChars);
                });
                editor.on('KeyUp', function(event) {
                    // var numChars = editor.plugins.wordcount.body.getCharacterCount();
                var numChars = tinymce.activeEditor.plugins.wordcount.body.getWordCount();

                    if (numChars > max ) {
                        if(event.keyCode === 8 || event.keyCode === 37|| event.keyCode === 38|| event.keyCode === 39|| event.keyCode === 40 || event.keyCode === 116)
                        {
                        }
                        else
                        {
                            event.preventDefault();
                            return false;
                        }
                    }
                    updateCharacterCount(numChars);
                });
            })
        },
                    paste_preprocess: function(plugin, args) {
            var clipboard_data = args.content;
            // var max = $('.text_editor').attr('text-length');
            var max = $(select_elem).attr('text-length');
            var counts=(clipboard_data).length;
            // var numChars = tinymce.activeEditor.plugins.wordcount.body.getCharacterCount();
            var numChars = tinymce.activeEditor.plugins.wordcount.body.getWordCount();

            if (counts+numChars>max) {
                var extraChar=counts+numChars-max;
                var fillVal=counts-extraChar;
                let result = clipboard_data.substring(0, fillVal);
                args.content = result;
                $(select_elem).text(' You have reached the limit').css('color', 'red');
            } 
        }
    });
    }
    $('.controlTextLength').each(function(){
       var text_editor=$(this).attr("no-text-editor");
        if (text_editor==undefined) {
            var thclass=  $(this).prop('class').split(' ')[2];
            apply_text_editor('.'+thclass);   
        }
        //             $(this).after("<span class=textlength for_alert text-end>"+ $(this).val().length +" / "+$(this).attr('text-length')+"</span>");
        // $('.textlength').css({"color":"#787885", "text-align":"end", "float":"end"})
    });
</script>

@endpush
