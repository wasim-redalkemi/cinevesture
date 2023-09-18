
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title',config('app.name', 'Cinevesture'))</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/asset/Logo-fav-icon-color.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-css/1.4.6/select2-bootstrap.min.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css" integrity="sha256-jKV9n9bkk/CTP8zbtEtnKaKf+ehRovOYeKoyfthwbC8=" crossorigin="anonymous" />
    {{-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> --}}



    @yield('css')
</head>

<body class="{{ $class ?? '' }}">
     <div id="app">

        <main class="">
        <div class="hide-me animation for_authtoast">
              @include('website.include.flash_message')
        </div>
            @yield('header')
            @if(!empty(auth()->user()) && auth()->user()->user_type !== 'A') 
                @yield('nav')
            @endif
            @stack('add_css')
            <div class="main_content">
                @yield('content')
            </div>

            <div class="project_loader">
            <div class="page_loader_wrap">
            <lottie-player src="https://assets5.lottiefiles.com/packages/lf20_41zJLwFKz5.json"  background="transparent"  speed="0.4"   loop  autoplay></lottie-player>
            <!-- <lottie-player src="{{ asset('public\images\asset\loader.json') }}"  background="transparent"  speed="0.4"   loop  autoplay></lottie-player> -->
            </div>
            </div>
            
            @if(isset($_REQUEST['src']) && ($_REQUEST['src'] == 'app'))
            @else
                @yield('footer')
            @endif

            <!-- Modal for Confirmation for account deactivate -->
            @include('website.include.delete_confirmation_modal')
            @include('website.include.job_unpublished_modal')
            @include('website.include.job_published_modal')

            

            @include('website.include.video_modal')
            @include('website.include.image_in_full_view_modal')
            @include('website.include.docs_preview_modal')
            @include('website.include.free_trial_modal')
            @include('website.modal.update_billing_detail')
        </main>
    </div>
    

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js" integrity="sha256-CgvH7sz3tHhkiVKh05kSUgG97YtzYNnWt6OXcmYzqHY=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> --}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>


    <script>
        var from_plan_page = undefined;
        $(document).ready(function() {
			toastr.options = {
                
				'closeButton': true,
				'debug': false,
				'newestOnTop': false,
				'progressBar': true,
				'positionClass': 'toast-top-right',
				'preventDuplicates': false,
				'showDuration': '1000',
				'hideDuration': '5000',
				'timeOut': '5000',
				'extendedTimeOut': '1000',
				'showEasing': 'swing',
				'hideEasing': 'linear',
				'showMethod': 'fadeIn',
				'hideMethod': 'fadeOut',
			}
		});

    // $('.project_loader').show()

        var BaseUrl = '{{config('app.url')}}';
        var CSRFToken = '{{ csrf_token() }}';
        $('select').change(function(){
            if ($(this).val()!='') {
                $(this).next('.error').hide();
            }
        })
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //front-end validation
        $(".validateBeforeSubmit button[type='submit']").on('click', function(e) { 
            e.preventDefault();       
            if($(this).parents('form').valid()) {
                $(this).parents('form').submit();
            }
        });


        $('.controlTextLength').keyup(function ()
        {
            var max = $(this).attr('text-length');
            var len = $(this).val().length;
            if (len >= max) {
                $(this).parents('.form_elem').find('.textlength').text(' You have reached the limit').css('color', 'red', 'text-align', 'end');
                // $(this).next('.textlength').css('color', 'red', 'text-align', 'end');
            } else {
                var char = len;
                $(this).parents('.form_elem').find('.textlength').text(char + ' / '+max); 
                $(this).parents('.form_elem').find('.textlength').css({"color":"#787885", "text-align":"end"});
            }
        });

        // $('.collapse_hide').collapse('hide');
        $(document).click(function (e) {
            var container = $(".profile_side_bar");
            if (!container.is(e.target) && container.has(e.target).length === 0) 
            {
                container.find('.sidebar_collapse').collapse('hide');
            }
            var container = $(".Header_main_container");
            if (!container.is(e.target) && container.has(e.target).length === 0) 
            {
                container.find('.navbar_sm').collapse('hide');
            }
            var container = $(".side-bar-cmn-part");
            
            if (!container.is(e.target) && container.has(e.target).length === 0) 
            {
                container.find('.sidebar_collapse').collapse('hide');
            }
            
            var container = $(".image_in_full_view_modal .imgSubWrap");
            if ($(e.target).parents('.image_in_full_view_modal').length && container.has(e.target).length === 0) 
            {
                container.parents('.image_in_full_view_modal').fadeOut(500);
            } 

            $('.modal .normal_btn').click(function()
            {
                $(this).parents('.modal').modal('hide');
            });

            // for stop hide collapse on click inside its data 
            if($(window).width()<=480)
            {
                $(".prevent_hide").on('click', function(){
                    event.stopPropagation()
                })
            }
            // $('.dropdown-toggle').click(function()
            // {
            //     $('.collapse_hide').not(this).collapse('hide');
            //     $(this).parents('.search_page_filters_wrap').find('.collapse_hide').collapse('show');
            // });

            // var search_container = $(".search_page_filters_wrap");
            // if (!search_container.is(e.target) && search_container.has(e.target).length === 0) 
            // {
            //     search_container.find('.collapse_hide').collapse('hide');
            // }
           
            $(".filter_modal_wrap").click(function(e){
                e.stopPropagation();
            })
            $(".nav-drop").click(function(e){
                e.stopPropagation();
            })


        });
        $('.confirmAction').click(function(e)
        {
            e.preventDefault();
            $('#confirmActionModal .confirmActionModalLink').attr('href',$(this).attr('href'));
            $('#confirmActionModal').modal('show');
        });

        $('.jobUnpublishedAction').click(function(e)
        {
            e.preventDefault();
            $('#jobUnpublishedActionModal .jobUnpublishedActionModalLink').attr('href',$(this).attr('href'));
            $('#jobUnpublishedActionModal').modal('show');
        });

        $('.jobpublishedAction').click(function(e)
        {
            e.preventDefault();
            $('#jobpublishedActionModal .jobpublishedActionModalLink').attr('href',$(this).attr('href'));
            $('#jobpublishedActionModal').modal('show');
        });
        
        $('.playVideoWrap').click(function()
        {
            $('#playVideoModal .playVideoModalContent iframe').attr('src',$(this).attr('video-url'));
            $('#playVideoModal').modal('show');
        });

        $('#playVideoModal').click(function () {
            $('#playVideoModal .playVideoModalContent iframe').removeAttr('src',$(this).attr('video-url'));
        })

        $('.docsPreview').click(function()
        {
            var doc_url = $(this).attr('docs-url');
            if($(window).width()>480)
            {
                $('#docsPreviewModal .docsPreviewModalContent iframe').attr('src',doc_url);
                $('#docsPreviewModal').modal('show');
            }
            else
            {
                window.location.href=doc_url;
            }
        });
        

        $('.image_in_full_view').click(function()
        {
            $('#ImageInFullViewModal .ImageInFullViewModalContent img').attr('src',$(this).find('img').attr('src'));
            $('#ImageInFullViewModal').fadeIn(500);
        });
        $('.static_content_elem').click(function()
        {
            var elem = $(this).attr('modal_name');
            $('#'+elem).modal('show');
        });
  </script>
    
<script>
    $(document).ready(function(){ 
        $('.project_loader').hide()
    })
</script>
    @yield('scripts')
    @stack('scripts')
    @include('website.include.validator-scripts')
    <script>
        $('document').ready(function () 
        {
            let freesubtrial="{{ Session::get('freeSubscription')}}";
            if (freesubtrial=="free") {
                let setsessionfree=sessionStorage.getItem("freeToastMSG")
                if (setsessionfree==undefined) {
                    sessionStorage.setItem("freeToastMSG", "0"); 
                }
                setsessionfree=sessionStorage.getItem("freeToastMSG");
                if(typeof(isPlanPage) != "undefined")
                {
                    setsessionfree = 1;
                }
                var backendPlansession='{{session()->get('freeSubscription')}}'
                console.log(backendPlansession);
                if ((setsessionfree!=undefined) && (setsessionfree==0) && backendPlansession== 'free') {
                    $(".free_trial_msg").show();
                }
            }
            /*
            is_plan_page var is to control the modal of billing address to make it mandatory for a paid-subscribed user
            but not show the that modal in plan page-
            */
            var is_plan_page = (from_plan_page != undefined) ? true : false;
            var plan_type = "{{session()->get('freeSubscription')}}";
            var billingAddress='{{auth()->user()->billing_address??""}}';
            if (((plan_type == 'paid')) && (billingAddress == '') && is_plan_page == false) {
                $("#updateBillingAddressModal").modal({
                    backdrop: 'static',
                    keyboard: false
                });
                $('#updateBillingAddressModal').modal('show');
            }
        })
    </script>
    <script src="https://cdn.tiny.cloud/1/pd5jow5xgpemmx81h7x21gg7ge06vdk0b9fgtuiqxjorhlx0/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

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
            toolbar: 'undo redo styleselect bold italic alignleft aligncenter alignright bullist',
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
                    var numChars = editor.plugins.wordcount.body.getCharacterCount();

                    updateCharacterCount(numChars);
                    editor.on('KeyDown', function(event) {
                        var numChars = editor.plugins.wordcount.body.getCharacterCount();
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
                        var numChars = editor.plugins.wordcount.body.getCharacterCount();
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
                var numChars = tinymce.activeEditor.plugins.wordcount.body.getCharacterCount();

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
            $(this).after("<span class=textlength for_alert text-end>"+ $(this).val().length +" / "+$(this).attr('text-length')+"</span>");
            $('.textlength').css({"color":"#787885", "text-align":"end", "float":"end"})
        });
    </script>
</body>
</html>

