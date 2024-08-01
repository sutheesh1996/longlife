<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Devices</title>
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
    <style>
          .popup {
            display: none;
            background-color: rgba(0, 0, 0, 0.7);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .popup-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
            text-align: center;
            color: black;
        }

        .popup-button {
            background-color: rgb(17, 56, 17);
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }
    </style>
  </head>
  <body>
    @if(session('success'))
    <div class="popup" id="confirmationPopup">
        <div class="popup-content">
            <p>{{ session('success') }}</p>
            <button class="popup-button" onclick="closePopup()">Close</button>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("confirmationPopup").style.display = "flex";
        });
        function closePopup() {
            document.getElementById("confirmationPopup").style.display = "none";
        }
    </script>
    @endif

    @if ($errors->any())
    <div class="popup" id="errorPopup">
        <div class="popup-content">
            <p>
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </p>
            <button class="popup-button" onclick="closeErrorPopup()">Close</button>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("errorPopup").style.display = "flex";
        });
        function closeErrorPopup() {
            document.getElementById("errorPopup").style.display = "none";
        }
    </script>
    @endif
    <div class="container-scroller">

        @include('includes.sidebar')

      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
              <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{ asset("") }}assets/images/logo-mini.svg" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
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
                <span class="mdi mdi-format-line-spacing"></span>
              </button>
            </div>
          </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card corona-gradient-card">
                  <div class="card-body py-0 px-0 px-sm-3">
                    {{-- <h2 style="text-align: center;">Dashboard</h2> --}}
                    <!-- <div class="row align-items-center">
                      <div class="col-4 col-sm-3 col-xl-2">
                        <img src="{{ asset("") }}assets/images/dashboard/Group126@2x.png" class="gradient-corona-img img-fluid" alt="">
                      </div>
                      <div class="col-5 col-sm-7 col-xl-8 p-0">
                        <h4 class="mb-1 mb-sm-0">Want even more features?</h4>
                        <p class="mb-0 font-weight-normal d-none d-sm-block">Check out our Pro version with 5 unique layouts!</p>
                      </div>
                      <div class="col-3 col-sm-2 col-xl-2 ps-0 text-center">
                        <span>
                          <a href="https://www.bootstrapdash.com/product/corona-admin-template/" target="_blank" class="btn btn-outline-light btn-rounded get-started-btn">Upgrade to PRO</a>
                        </span>
                      </div>
                    </div> -->
                  </div>
                </div>
              </div>
            </div>

            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">

                    <div class="table-responsive">
                        <h2 style="text-align: center;">Device List</h2><br>
                        @if ($devices->count())
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Device Name</th>
                                    <th>Device ID</th>
                                    <th>Mobile Number</th>
                                    <th>Actions</th> <!-- Added Actions column -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($devices as $device)
                                    <tr>
                                        <td>{{ $device->id }}</td>
                                        <td>{{ $device->device_name }}</td>
                                        <td>{{ $device->device_id }}</td>
                                        <td>{{ $device->mobile_number }}</td>
                                        <td>
                                            <a href="{{ route('device.edit', $device->id) }}" class="btn btn-primary">Edit</a> <!-- Edit button -->
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $devices->links() }} <!-- Pagination links -->
                    @else
                        <p>No devices found.</p>
                    @endif


                        <!-- Pagination Links -->


                        <br>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                @if ($devices->onFirstPage())
                                    <li class="page-item disabled"><span class="page-link">Previous</span></li>
                                @else
                                    <li class="page-item"><a class="page-link" href="{{ $devices->previousPageUrl() }}">Previous</a></li>
                                @endif

                                @for ($i = 1; $i <= $devices->lastPage(); $i++)
                                    <li class="page-item {{ ($devices->currentPage() == $i) ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $devices->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                @if ($devices->hasMorePages())
                                    <li class="page-item"><a class="page-link" href="{{ $devices->nextPageUrl() }}">Next</a></li>
                                @else
                                    <li class="page-item disabled"><span class="page-link">Next</span></li>
                                @endif
                            </ul>
                        </nav>
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
