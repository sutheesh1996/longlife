<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>InActive Users</title>
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


           <div class="row ">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">InActive Users</h4>
                  <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>

                                <th>S.NO</th>
                                <th>User Name</th>
                                <th>Contact</th>
                                <th>Email Id</th>
                                <th>Date of Birth</th>
                                <th>Gender</th>
                                <th>Height</th>
                                <th>Weight</th>
                                <th>Status</th> <!-- Add this line -->
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->mobile_number }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->date_of_birth }}</td>
                                <td>{{ ucfirst($user->gender) }}</td>
                                <td>{{ $user->height }}</td>
                                <td>{{ $user->weight }}</td>
                                <td>{{ $user->payment_status == 1 ? 'Active' : 'Inactive' }}</td> <!-- Add this line -->
                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info">Edit</a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination Links -->


                    <br>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            @if ($users->onFirstPage())
                                <li class="page-item disabled"><span class="page-link">Previous</span></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $users->previousPageUrl() }}">Previous</a></li>
                            @endif

                            @for ($i = 1; $i <= $users->lastPage(); $i++)
                                <li class="page-item {{ ($users->currentPage() == $i) ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $users->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor

                            @if ($users->hasMorePages())
                                <li class="page-item"><a class="page-link" href="{{ $users->nextPageUrl() }}">Next</a></li>
                            @else
                                <li class="page-item disabled"><span class="page-link">Next</span></li>
                            @endif
                        </ul>
                    </nav>
                </div></div>
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
