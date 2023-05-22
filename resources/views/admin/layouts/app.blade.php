<!DOCTYPE html>
<html lang="en">


<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Cinevesture</title>
  <title> @yield('title',config('app.name', 'Cinevesture'))</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('images/asset/Logo-fav-icon-color.png') }}">
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('admin/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('admin/css/vendor.bundle.addons.css')}}">
  <link rel="stylesheet" href="{{asset('admin/css/custom.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('admin/css/style.css')}} ">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">
  
  <!-- endinject -->
  <link rel="shortcut icon" href="admin/images/favicon.png" />
</head>
<body>
  <div class="container-scroller">
    @include('admin.include.nav')
    <div class="container-fluid page-body-wrapper">
      @include('admin.include.right-sidebar')
      @include('admin.include.sidebar')
      @include('admin.include.deletemodal')
      <div class="main-panel">
        @include('admin.include.response')
        @yield('content')
        @include('admin.include.footer')
      </div>
    </div>
            <!-- page-body-wrapper ends -->
  </div>


 

  <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
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
  <script src="{{ asset('admin/js/script.js') }}"></script>
  <script src="{{ asset('admin/js/select2.js') }}"></script>

  {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>

  <script src="{{ asset('admin/js/export.js') }}"></script>

  <!-- End custom js for this page-->
  @stack('scripts')
  <script>
      $(document).ready(function()
      {
        $('.confirmAction').click(function(e)
        {
            e.preventDefault();
            $('#confirmActionModal .confirmActionModalLink').attr('href',$(this).attr('href'));
            $('#confirmActionModal').modal('show');
        });
        $(".sidebar .nav-item").not('.active').find('.collapse.show').removeClass('show');
      })
    </script>
</body>
</html>
