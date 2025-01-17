<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav me-auto"> <!-- Add me-auto for spacing -->
      <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button">
              <i class="fas fa-bars"></i>
          </a>
      </li>
  </ul>
  
  @guest
  <ul class="navbar-nav me-auto"> <!-- Add me-auto for spacing -->
      <li class="nav-item">
          <a class="nav-link bg-info" href="/login">
              Login
          </a>
      </li>
  </ul>  
  @endguest
  @auth
    <ul class="navbar-nav ms-auto">
        <li class="nav-item bg-danger">
            <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
  @endauth
  
</nav>
