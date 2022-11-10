<!DOCTYPE html>
<html lang="en">


<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Cinevesture</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('admin/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('admin/css/vendor.bundle.addons.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('admin/css/style.css')}} ">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <!-- endinject -->
  <link rel="shortcut icon" href="admin/images/favicon.png" />
</head>
<body>
  <div class="container-scroller">
    @include('admin.include.nav')
    <div class="container-fluid page-body-wrapper">
      @include('admin.include.right-sidebar')
      @include('admin.include.sidebar')
      <div class="main-panel">
        @yield('content')
        @include('admin.include.footer')
      </div>
    </div>
            <!-- page-body-wrapper ends -->
  </div>
  <script src="{{ asset('admin/js/vendor.bundle.base.js') }}"></script>
  <script src="{{ asset('admin/js/vendor.bundle.addons.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{ asset('admin/js/off-canvas.js') }}"></script>
  <script src="{{ asset('admin/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('admin/js/template.js') }}"></script>
  <script src="{{ asset('admin/js/settings.js') }}"></script>
  <script src="{{ asset('admin/js/todolist.js') }}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('admin/js/dashboard.js') }}"></script>
  <!-- End custom js for this page-->
  @stack('scripts')
  <script>
    $('.order-listing').DataTable({
      "aLengthMenu": [
        [5, 10, 20, 50, 100, -1],
        [5, 10, 20, 50, 100, "All"]
      ],
      "iDisplayLength": 10,
      "language": {
        search: "Search"
      }
    });
    </script>
</body>
<!-- Mirrored from www.bootstrapdash.com/demo/serein/template/demo/vertical-default-light/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 12 Sep 2022 07:16:29 GMT -->
</html>
