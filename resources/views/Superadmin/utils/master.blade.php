<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="{{env('APP_FAVICON')}}" type="image/x-icon">
  <title>@yield('title') | {{ env('APP_NAME') }}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/fontawesome-free/css/all.min.css">

   <!-- DataTables -->
   <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
   <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
   <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('/') }}/assets/dist/css/adminlte.min.css">
    <!-- summernote -->
   <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/summernote/summernote-bs4.min.css">

  <link rel="stylesheet" href="{{ url('/') }}/assets/website.css">
  @yield('head')

</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        {{-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ url('/') }}/assets/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
          </div> --}}

        @include('Superadmin.utils.head')
        @include('Superadmin.utils.sidebar')

         @yield('content')

    @include('Superadmin.utils.footer')
</div>
@yield('script')
<!-- jQuery -->
<script src="{{ url('/') }}/assets/plugins/jquery/jquery.min.js"></script>

<script src="{{ url('/') }}/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ url('/') }}/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ url('/') }}/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ url('/') }}/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ url('/') }}/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ url('/') }}/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ url('/') }}/assets/plugins/jszip/jszip.min.js"></script>
<script src="{{ url('/') }}/assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{ url('/') }}/assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{ url('/') }}/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ url('/') }}/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ url('/') }}/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<!-- jQuery UI 1.11.4 -->
<script src="{{ url('/') }}/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ url('/') }}/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- daterangepicker -->
<script src="{{ url('/') }}/assets/plugins/moment/moment.min.js"></script>
<script src="{{ url('/') }}/assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ url('/') }}/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- AdminLTE App -->
<script src="{{ url('/') }}/assets/dist/js/adminlte.js"></script>
<script src="{{ url('/') }}/assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
    $(function () {
      bsCustomFileInput.init();
    });
    </script>

<script>
    $("document").ready(function(){
        setTimeout(function(){
           $(".message").remove();
        }, 2000 );

        setTimeout(function(){
           $(".error").remove();
        }, 2000 );

    });
    </script>
  <!-- Summernote -->
<script src="{{ url('/') }}/assets/plugins/summernote/summernote-bs4.min.js"></script>

<!-- Page specific script -->
<script>
  $(function () {
    // Summernote
    $('.summernote').summernote({
      height: 200, // Set the height here (in pixels)
      minHeight: 200, // Set the minimum height here (in pixels)
      maxHeight: null 
    })
  })
</script>
@yield('scripts')
</body>
</html>
