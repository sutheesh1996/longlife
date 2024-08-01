<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit User</title>
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
                    <h4 class="card-title" style="text-align: center;color:rgb(235, 35, 158)">Edit User</h4>
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}"  required>
                        </div>

                        <div class="form-group">
                            <label for="mobile_number">Mobile Number</label>
                            <input type="text" class="form-control" id="mobile_number" name="mobile_number" value="{{ old('mobile_number', $user->mobile_number) }}"  required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" >
                        </div>

                        <div class="form-group">
                            <label for="date_of_birth">Date of Birth</label>
                            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth', $user->date_of_birth) }}" >
                        </div>

                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control" id="gender" name="gender" >
                                <option value="male" @if(old('gender', $user->gender) == 'male') selected @endif>Male</option>
                                <option value="female" @if(old('gender', $user->gender) == 'female') selected @endif>Female</option>
                                <option value="other" @if(old('gender', $user->gender) == 'other') selected @endif>Other</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="height">Height (cm)</label>
                            <input type="number" class="form-control" id="height" name="height" value="{{ old('height', $user->height) }}" >
                        </div>

                        <div class="form-group">
                            <label for="weight">Weight (kg)</label>
                            <input type="number" class="form-control" id="weight" name="weight" value="{{ old('weight', $user->weight) }}" >
                        </div>
                        <div class="form-group">
                            <label for="subscription_period">Subscription Period </label>
                            <input type="number" class="form-control" id="subscription_period" name="subscription_period" value="{{ old('subscription_period', $user->subscription_period) }}" >
                        </div>


                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Cancel</a>
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
