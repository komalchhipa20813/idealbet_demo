<nav class="navbar">
  <a href="#" class="sidebar-toggler">
    <i data-feather="menu"></i>
  </a>
  <div class="navbar-content">
    <form class="search-form">
      <div class="input-group">
        <div class="input-group-text">
          <i data-feather="search"></i>
        </div>
        <input type="text" class="form-control" id="navbarForm" placeholder="Search here...">
      </div>
    </form>
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
      @php
          $profile=asset('images/users/profile/admin_logo.png');
      @endphp
      @if(isset($profile))
        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img class="wd-30 ht-30 rounded-circle" src="{{ $profile }}" alt="profile">
        </a>
        @endif
        <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
          <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
            <div class="mb-3">
            <img class="wd-80 ht-80 rounded-circle" src="{{ $profile }}" alt="">
            </div>
            <div class="text-center">
              <p class="tx-16 fw-bolder">{{ Auth::user()->name . ' ' . Auth::user()->last_name }}</p>
              <p class="tx-12 text-muted">{{ Auth::user()->email }}</p>
            </div>
          </div>
          <ul class="list-unstyled p-1">
            <li class="dropdown-item py-2">
              <a href="{{ route('change-password.index')}}" class="text-body ms-0">
                <i class="me-2 icon-md" data-feather="user"></i>
                <span>Change Password</span>
              </a>
            </li>
           
            <li class="dropdown-item py-2">
              <a href="{{ route('logout')}}" class="text-body ms-0">
                <i class="me-2 icon-md" data-feather="log-out"></i>
                <span>Log Out</span>
              </a>
            </li>
          </ul>
        </div>
      </li>
    </ul>
  </div>
</nav>