<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Sekawan'S</title>

  {{-- Bootstrap 4 CSS --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  {{-- Font Awesome CDN --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- AdminLTE Style -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

  <!-- overlayScrollbars -->
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.13.3/css/OverlayScrollbars.min.css"
    integrity="sha512-Xd88BFhCPQY5aAt2W3F5FmTVKkubVsAZDJBo7aXPRc5mwIPTEJvNeqbvBWfNKd4IEu3v9ots+nTdsTzVynlaOw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  {{-- summernote bs4 --}}
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

  {{-- DataTables --}}
  <link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-html5-2.3.3/b-print-2.3.3/r-2.4.0/datatables.min.css" />


  @yield('css')

  <!-- PWA  -->
  <meta name="theme-color" content="#343a40" />
  <link rel="apple-touch-icon" href="{{ asset('img/logo-sekawans.png') }}">
  <link rel="manifest" href="{{ asset('/manifest.json') }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
  <div class="wrapper">
    <x-admin-nav />

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      @yield('admin-content')
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <strong>&copy; 2022 Sekawans TB Jember</strong>
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

  <!-- Bootstrap 4 Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
  </script>

  <!-- AdminLTE -->
  <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

  <!-- overlayScrollbars -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.13.3/js/jquery.overlayScrollbars.min.js"
    integrity="sha512-PviP63d43OXLyLjCv3TawK1Rw4LQQsnH6yschHgK63LBvLpd1U1+7LM/OESlV/cSze5lFI3+f7JwKFEBEWNp1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  {{-- summernote bs4 --}}
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

  {{-- DataTables --}}
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script type="text/javascript"
    src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-html5-2.3.3/b-print-2.3.3/r-2.4.0/datatables.min.js">
  </script>

  <script>
    function reset() {
    document.querySelector('.img-preview').src = "";
    document.querySelector('input').reset();
    document.querySelector('textarea').reset();
  }
  </script>

  <script src="{{ asset('sw.js') }}"></script>
  <script>
    if (!navigator.serviceWorker.controller) {
      navigator.serviceWorker.register("/sw.js").then(function (reg) {
        console.log("Service worker has been registered for scope: " + reg.scope);
      });
    }
  </script>

  {{-- Logout --}}
  <script type="text/javascript">
    $('#btn_logout').click(function (e){
        e.preventDefault();
        $('#logout-form').trigger('submit');
      })
  </script>
  @yield('js')
</body>

</html>