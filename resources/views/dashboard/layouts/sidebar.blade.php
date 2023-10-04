<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-3">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('table_a*') ? 'active' : '' }}" aria-current="page" href="/table_a">
          <span data-feather="file-text"></span>
          Table A
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('table_b*') ? 'active' : '' }}" href="/table_b">
          <span data-feather="file-text"></span>
          Table B
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('table_c*') ? 'active' : '' }}" href="/table_c">
          <span data-feather="file-text"></span>
          Table C
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('table_d*') ? 'active' : '' }}" href="/table_d">
          <span data-feather="file-text"></span>
          Table D
        </a>
      </li>
    </ul>

    @can('admin')
    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>Administrator</span>
    </h6>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">
          <span data-feather="grid"></span>
          Post Categories
        </a>
      </li>
    </ul>
    @endcan

  </div>
</nav>