<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add User</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset("assets1/vendors/feather/feather.css") }}">
    <link rel="stylesheet" href="{{ asset("assets1/vendors/ti-icons/css/themify-icons.css") }}">
    <link rel="stylesheet" href="{{ asset("assets1/vendors/css/vendor.bundle.base.css") }}">
    <link rel="stylesheet" href="{{ asset("assets1/vendors/font-awesome/css/font-awesome.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets1/vendors/mdi/css/materialdesignicons.min.css") }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- <link rel="stylesheet" href="assets1/vendors/datatables.net-bs4/dataTables.bootstrap4.css"> -->
    <link rel="stylesheet" href="{{ asset("assets1/vendors/datatables.net-bs5/dataTables.bootstrap5.css") }}">
    <link rel="stylesheet" href="{{ asset("assets1/vendors/ti-icons/css/themify-icons.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("assets1/js/select.dataTables.min.css") }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset("assets1/css/style.css") }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset("assets1/images/favicon.png") }}" />
  </head>
  <body>
    <div class="container-scroller">

      <!-- partial:partials/_navbar.html -->
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <a class="navbar-brand brand-logo me-5" href="{{ route('dashboard') }}"><img src="{{ asset("assets1/images/long.jpeg") }}" class="me-2" alt="logo" />Long Life Care</a>
        <a class="navbar-brand brand-logo-mini" href="{{ route('dashboard') }}"><img src="{{ asset("assets1/images/long.jpeg") }}" alt="logo" /></a>
      </div>
  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
    <ul class="navbar-nav navbar-nav-right">
        <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
              <img src="{{ asset("assets1/images/faces/face28.jpg") }}" alt="profile" />
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">

              <a class="dropdown-item">
                <i class="ti-power-off text-primary"></i> Logout </a>
            </div>
          </li>
    </ul>

    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="icon-menu"></span>
    </button>
  </div>
</nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        @include('includes.sidebar1')

        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
           <!-- resources/views/admin/users.blade.php -->


           <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
            <h2>Add New User</h2>
            <form action="{{ route('dashboard.store') }}" method="POST">
                @csrf
               <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name">Name <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="name" name="name"  required>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="mobile_number">Mobile Number <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="mobile_number" name="mobile_number"  required>
                    </div>
                </div>
               </div>
               <div class="row">
                <div class="col-lg-6">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" >
                </div></div>
                <div class="col-lg-6">
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" >
                </div></div>
               </div>

               <div class="row">
                <div class="col-lg-6">
                <div class="form-group">
                    <label for="date_of_birth">Date of Birth:</label>
                    <input type="date" class="form-control" id="date_of_birth" name="date_of_birth">
                </div></div>
                <div class="col-lg-6">
                <div class="form-group">
                    <label for="gender">Gender:</label>
                    <select class="form-control" id="gender" name="gender">
                        <option value="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div></div>
               </div>
               <div class="row">
                <div class="col-lg-6">
                <div class="form-group">
                    <label for="height">Height:</label>
                    <input type="number" step="0.01" class="form-control" id="height" name="height" >
                </div></div>
                <div class="col-lg-6">
                <div class="form-group">
                    <label for="weight">Weight:</label>
                    <input type="number" step="0.01" class="form-control" id="weight" name="weight" >
                </div></div>
               </div>
                <button type="submit" class="btn btn-primary">Add User</button>
            </form>


      </div>
            </div>

          </div>

            </div>
           </div>





          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset("assets1/vendors/js/vendor.bundle.base.js") }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset("assets1/vendors/chart.js/chart.umd.js") }}"></script>
    <script src="{{ asset("assets1/vendors/datatables.net/jquery.dataTables.js") }}"></script>
    <!-- <script src="assets1/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script> -->
    <script src="{{ asset("assets1/vendors/datatables.net-bs5/dataTables.bootstrap5.js") }}"></script>
    <script src="{{ asset("assets1/js/dataTables.select.min.js") }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset("assets1/js/off-canvas.js") }}"></script>
    <script src="{{ asset("assets1/js/template.js") }}"></script>
    <script src="{{ asset("assets1/js/settings.js") }}"></script>
    <script src="{{ asset("assets1/js/todolist.js") }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset("assets1/js/jquery.cookie.js") }}" type="text/javascript"></script>
    <script src="{{ asset("assets1/js/dashboard.js") }}"></script>
    <!-- <script src="assets1/js/Chart.roundedBarCharts.js"></script> -->
    <!-- End custom js for this page-->

  </body>
</html>
