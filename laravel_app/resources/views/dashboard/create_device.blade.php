<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Create Device</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset("assets/vendors/mdi/css/materialdesignicons.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/vendors/css/vendor.bundle.base.css") }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset("assets/vendors/jvectormap/jquery-jvectormap.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/vendors/flag-icon-css/css/flag-icon.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/vendors/owl-carousel-2/owl.carousel.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/vendors/owl-carousel-2/owl.theme.default.min.css") }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset("assets/css/style.css") }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset("assets/images/favicon.png") }}" />
  </head>
  <body>
    <div class="container-scroller">

        @include('includes.sidebar')

      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
              <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{ asset("") }}assets/images/logo-mini.svg" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
              <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="mdi mdi-menu"></span>
              </button>

              <ul class="navbar-nav navbar-nav-right">

                <li class="nav-item dropdown">
                  <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown">
                    <div class="navbar-profile">
                      <img class="img-xs rounded-circle" src="{{ asset("") }}assets/images/faces/face15.jpg" alt="">
                      <p class="mb-0 d-none d-sm-block navbar-profile-name">Henry Klein</p>
                      <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                    </div>
                  </a>

                </li>
              </ul>
              <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="mdi mdi-format-line-spacing"></span>
              </button>
            </div>
          </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">


            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">




<div class="card">
    <div class="card-body">
        <h2>Assign a Device</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('store.device') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="device_name">Device Name</label>
                <input type="text" name="device_name" id="device_name" class="form-control" style="color: white;" required>
            </div>
            <div class="form-group">
                <label for="device_id">Device ID</label>
                <select name="device_id" id="device_id" class="form-control" required>
                    <option value="">Select Device ID</option>
                    @foreach($deviceNames as $id => $deviceId)
                        <option value="{{ $deviceId }}" style="color: white;">{{ $deviceId }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="mobile_number">Mobile Number</label>
                <input type="text" name="mobile_number" id="mobile_number" class="form-control" style="color: white;" required>
            </div>
            <button type="submit" class="btn btn-primary">Assign Device</button>
        </form>

    </div>
</div>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->

        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset("assets/vendors/js/vendor.bundle.base.js") }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset("assets/vendors/chart.js/Chart.min.js") }}"></script>
    <script src="{{ asset("assets/vendors/progressbar.js/progressbar.min.js") }}"></script>
    <script src="{{ asset("assets/vendors/jvectormap/jquery-jvectormap.min.js") }}"></script>
    <script src="{{ asset("assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js") }}"></script>
    <script src="{{ asset("assets/vendors/owl-carousel-2/owl.carousel.min.js") }}"></script>
    <script src="{{ asset("assets/js/jquery.cookie.js") }}" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset("assets/js/off-canvas.js") }}"></script>
    <script src="{{ asset("assets/js/hoverable-collapse.js") }}"></script>
    <script src="{{ asset("assets/js/misc.js") }}"></script>
    <script src="{{ asset("assets/js/settings.js") }}"></script>
    <script src="{{ asset("assets/js/todolist.js") }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset("assets/js/dashboard.js") }}"></script>
    <!-- End custom js for this page -->
  </body>
</html>
