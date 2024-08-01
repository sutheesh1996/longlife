<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ route("dashboard") }}">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link" href="{{ route("users.create") }}">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title">Add Users</span>
        </a>
      </li> --}}

      <li class="nav-item">
        <a class="nav-link" href="{{ route('active_users') }}">
            <i class="mdi mdi-account-check"></i>
          <span class="menu-title" style="margin-left: 20px;">Active Users</span>
        </a>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link" href="{{ route('inactive_users') }}">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title">Inactive Users</span>
        </a>
      </li> --}}

      <li class="nav-item">
        <a class="nav-link" href="{{ route("users") }}">
            <i class="mdi mdi-newspaper"></i>

          <span class="menu-title" style="margin-left: 20px;">Add Subscription</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('users.with-devices') }}">
            <i class="icon-paper menu-icon"></i>
            <span class="menu-title">Assigned Device Details</span>
        </a>
      </li>

    </ul>
  </nav>
