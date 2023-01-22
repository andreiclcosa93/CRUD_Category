<div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">

  </div>
  <ul class="nav">
    <li class="nav-item profile">
      <div class="profile-desc">
        <div class="profile-pic">
          <div class="count-indicator">
            <img class="img-xs rounded-circle " src="{{ asset('admin/assets/images/faces/face15.jpg')}}" alt="">
            <span class="count bg-success"></span>
          </div>
          <div class="profile-name">
            <h5 class="mb-0 font-weight-normal">{{ auth()->user()->name }} - <span style="color: red;">Role: {{ auth()->user()->role }}</span>  </h5>

          </div>
        </div>
        <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
        <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                    <a class="dropdown-item preview-item"  onclick="event.preventDefault();
                            this.closest('form').submit();">
                        <div class="preview-thumbnail">
                        <div class="preview-icon bg-dark rounded-circle">
                            <i class="mdi mdi-logout text-danger"></i>
                        </div>
                        </div>
                        <div class="preview-item-content">
                        <p class="preview-subject mb-1">Log out</p>
                        </div>
                    </a>

              </form>
          <div class="dropdown-divider"></div>

        </div>
      </div>
    </li>
    <li class="nav-item nav-category">
      <span class="nav-link">Navigation</span>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="{{ route('dashboard') }}">
        <span class="menu-icon">
          <i class="mdi mdi-speedometer"></i>
        </span>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

    @if(auth()->user()->role=='admin')
        <li class="nav-item menu-items">
        <a class="nav-link" href="{{ route('users') }}">
            <span class="menu-icon">
                <i class="fas fa-users" style="color: yellow;"></i>
            </span>
            <span class="menu-title">Users</span>
        </a>
        </li>
    @endif


    <li class="nav-item menu-items">
        <a class="nav-link" href="{{ route('admin.categories') }}">
          <span class="menu-icon">
            <i class="mdi mdi-speedometer"></i>
          </span>
          <span class="menu-title">Categories</span>
        </a>
    </li>

  </ul>
