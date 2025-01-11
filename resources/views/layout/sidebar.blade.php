<div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('images/1735974416.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        @auth
          <div class="info">
            <a href="#" class="d-block">Hello, {{ Auth::user()->name }} ({{ Auth::user()->profile->age }})</a>
          </div>
          @endauth
        @guest
          <div class="info">
            <a href="#" class="d-block">Hello, guest</a>
          </div>
        @endguest
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
                <span class="right badge badge-success">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Page
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/inputData" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Input Data</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/dataTable" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Table</p>
                </a>
              </li>
            </ul>
          </li>
          @auth
          <li class="nav-item">
            <a href="/category" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Categories
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/profile" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Profile
              </p>
            </a>
          </li>
          @endauth
          <li class="nav-item">
            <a href="/post" class="nav-link">
              <i class="nav-icon fas fa-house-chimney"></i>
              <p>
                Berita
                <span class="right badge badge-danger">HOTS</span>
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>