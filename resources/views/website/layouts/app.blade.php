
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title',config('app.name', 'Cinevesture'))</title>

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
            @yield('footer')

            <!-- Modal for Confirmation for account deactivate -->
            @include('website.include.delete_confirmation_modal')
            

            <!-- Modal for Confirmation for account deactivate -->
            @include('website.include.video_modal')
            
        </main>
    </div>
    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js" integrity="sha256-CgvH7sz3tHhkiVKh05kSUgG97YtzYNnWt6OXcmYzqHY=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script>

        var BaseUrl = '{{config('app.url')}}';
        var CSRFToken = '{{ csrf_token() }}';

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

        $('.controlTextLength').each(function(){
            $(this).after("<div class=textlength for_alert text-end>"+ $(this).val().length +" / "+$(this).attr('text-length')+"</div>");
            // $('.controlTextLength').after("<div class=textlength for_alert text-end>"+ $(this).val().length +" / "+$(this).attr('text-length')+"</div>");
            $('.textlength').css({"color":"#787885", "text-align":"end"})
        });

        $('.controlTextLength').keyup(function ()
        {
            var max = $(this).attr('text-length');
            var len = $(this).val().length;
            if (len >= max) {
                $(this).next('.textlength').text(' You have reached the limit');
                $('.textlength').css('color', 'red', 'text-align', 'end');
            } else {
                var char = len;
                $(this).next('.textlength').text(char + ' / '+max);
                $('.textlength').css({"color":"#787885", "text-align":"end"});
            }
        });
        $(document).click(function (e) {
            var container = $(".profile_side_bar");
            // if the target of the click isn't the container nor a descendant of the container
            if (!container.is(e.target) && container.has(e.target).length === 0) 
            {
                container.find('.sidebar_collapse').collapse('hide');
            }
            var container = $(".Header_main_container");
            // if the target of the click isn't the container nor a descendant of the container
            if (!container.is(e.target) && container.has(e.target).length === 0) 
            {
                container.find('.navbar_sm').collapse('hide');
            }
            var container = $(".side-bar-cmn-part");
            if (!container.is(e.target) && container.has(e.target).length === 0) 
            {
                container.find('.sidebar_collapse').collapse('hide');
            }
            var search_container = $(".search_page_filters_wrap");
            // if the target of the click isn't the container nor a descendant of the container
            if (!search_container.is(e.target) && search_container.has(e.target).length === 0) 
            {
                search_container.find('.collapse_hide').collapse('hide');
            }

        });
        $('.confirmAction').click(function(e)
        {
            e.preventDefault();
            $('#confirmActionModal .confirmActionModalLink').attr('href',$(this).attr('href'));
            $('#confirmActionModal').modal('show');
        });
        
        $('.playVideoWrap').click(function()
        {
            $('#playVideoModal .playVideoModalContent iframe').attr('src',$(this).attr('video-url'));
            $('#playVideoModal').modal('show');
        });
    </script>

    @yield('scripts')
    @stack('scripts')
</body>
@include('website.include.validator-scripts')
</html>

