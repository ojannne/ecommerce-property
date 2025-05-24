  <header class='mb-3'>
      <nav class="navbar navbar-expand navbar-light ">
          <div class="container-fluid">
              <a href="#" class="burger-btn d-block">
                  <i class="bi bi-justify fs-3"></i>
              </a>

              <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                  data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                  aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                      <li class="nav-item dropdown me-1">
                          <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                              aria-expanded="false">
                              <i class='bi bi-envelope bi-sub fs-4 text-gray-600'></i>
                          </a>
                          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                              <li>
                                  <h6 class="dropdown-header">Mail</h6>
                              </li>
                              <li><a class="dropdown-item" href="#">No new mail</a></li>
                          </ul>
                      </li>
                      <li class="nav-item dropdown me-3">
                          <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                              aria-expanded="false">
                              <i class='bi bi-bell bi-sub fs-4 text-gray-600'></i>
                          </a>
                          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                              <li>
                                  <h6 class="dropdown-header">Notifications</h6>
                              </li>
                              <li><a class="dropdown-item">No notification available</a></li>
                          </ul>
                      </li>
                  </ul>
                  <div class="dropdown">
                      <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                          <div class="user-menu d-flex">
                              <div class="user-name text-end me-3">
                                  <h6 class="mb-0 text-gray-600">{{ Auth::user()->name }}</h6>
                                  <p class="mb-0 text-sm text-gray-600">Pengguna</p>
                              </div>
                              <div class="user-img d-flex align-items-center">
                                  <div class="avatar avatar-md">
                                      <img src="{{ asset('assets/images/faces/1.jpg') }}">
                                  </div>
                              </div>
                          </div>
                      </a>
                      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                          <li>
                              <h6 class="dropdown-header">Hello, {{ Auth::user()->name }}!</h6>
                          </li>
                          {{-- <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-person me-2"></i> My
                                  Profile</a></li>
                          <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-gear me-2"></i>
                                  Settings</a></li>
                          <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-wallet me-2"></i>
                                  Wallet</a></li> --}}
                          <li>
                              <hr class="dropdown-divider">
                          </li>
                          <li><a class="dropdown-item" href=""
                                  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                  <i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
                      </ul>
                  </div>
              </div>
          </div>
      </nav>
  </header>

  <div id="sidebar" class="active">
      <div class="sidebar-wrapper active">
          <div class="sidebar-header">
              <div class="d-flex justify-content-between">
                  <div class="logo d-flex align-items-center">
                      <img class="img-fluid me-2" src="{{ asset('frontside/img/icon/logo-green.svg') }}" alt="Icon"
                          style="width: 50px; height: 50px" />
                      <h4 class="m-0 text-black">Dabelyuland</h4>
                  </div>
                  <div class="toggler">
                      <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                  </div>
              </div>
          </div>
          <div class="sidebar-menu">
              <ul class="menu">
                  <li class="sidebar-title">Menu</li>

                  {{-- <li class="sidebar-item @if (Request::is('Pengguna')) active @endif">
                      <a href="{{ route('user.index') }}" class='sidebar-link'>
                          <i class="bi bi-grid-fill"></i>
                          <span>Dashboard</span>
                      </a>
                  </li> --}}

                  {{-- <li class="sidebar-item @if (Route::is('user.buildings.index')) active @endif">
                      <a href="{{ route('user.buildings.index') }}" class='sidebar-link'>
                          <i class="bi bi-building"></i>
                          <span>Property</span>
                      </a>
                  </li> --}}

                  <li class="sidebar-item has-sub">
                      <a href="#" class='sidebar-link'>
                          <i class="bi bi-building"></i>
                          <span>Konten Anda</span>
                      </a>
                      <ul
                          class="submenu collapse {{ Route::is(['user.buildings.index', 'user.lands.index']) ? 'show' : '' }}">
                          <li class="submenu-item @if (Route::is('user.buildings.index')) active @endif">
                              <a href="{{ route('user.buildings.index') }}">
                                  <span>Bangunan</span>
                              </a>
                          </li>
                          <li class="submenu-item @if (Route::is('user.lands.index')) active @endif">
                              <a href="{{ route('user.lands.index') }}">
                                  <span>Tanah</span>
                              </a>
                          </li>
                      </ul>
                  </li>
                  {{-- <li class="sidebar-item ">
                      <a href="#" class='sidebar-link'>
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                              class="bi bi-clipboard-check-fill" viewBox="0 0 16 16">
                              <path
                                  d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z" />
                              <path
                                  d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5zm6.854 7.354-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708" />
                          </svg>
                          <span>Report</span>
                      </a>

                  </li> --}}


                  <li class="sidebar-item">
                      <a href="#" class='sidebar-link'
                          onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                              class="bi bi-door-open-fill" viewBox="0 0 16 16">
                              <path
                                  d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15zM11 2h.5a.5.5 0 0 1 .5.5V15h-1zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1" />
                          </svg>
                          <span>Log out</span>
                      </a>

                      <!-- Form Logout -->
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                  </li>
              </ul>
          </div>
          <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
      </div>
  </div>
