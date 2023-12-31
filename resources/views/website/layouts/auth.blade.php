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
    <!-- JS for Recapcha -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    @yield('css')
</head>

<body>
    <div id="app">
        @yield('header')
        <main class="main_content">
            @yield('content')
        </main>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
    <script>
        $(document).ready(function() {
            $("#error-toast").toast("show");
            $("#success-toast").toast("show");
            $('form').submit(function() {
                var submit_elem = $(this).find(':submit');
                submit_elem.text('Please wait...').attr('type', 'button');
            });
        });
    </script>
     @stack('script')
</body>
@include('website.include.validator-scripts')

</html>