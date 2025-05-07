<nav class="navbar navbar-expand navbar-light topbar mb-4 static-top">
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i style="font-size:20px" class="fa fa-bars"></i>
    </button>
    <div>
        <h5 class="m-0">
        @if(isset($title)) 
            {{ $title }}
        @else
            Admin Page
        @endif
        </h5>
    </div>
    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown no-arrow mx-1 rata-tengah">
            <label class="switch switch-3d switch-secondary m-0">
                <input id="boxid" type="checkbox" class="switch-input" checked>
                <span class="switch-label"></span>
                <span class="switch-handle"></span>
            </label>
        </li>
        <div class="topbar-divider d-none d-sm-block"></div>
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <p class="mr-2 m-0 d-none d-lg-inline">Selamat Pagi.. <b>{{Auth::user()->name}}</b></p>
                <div class='img-profile rounded-circle' style='background:url({{ asset('admin/img/undraw_profile.svg') }}) center no-repeat; background-size:cover'></div>  
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu bg-gray-100 dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <h6 class="dropdown-header">akun</h6>
                <a class="dropdown-item" href="#">
                {{-- <a class="dropdown-item" href="{{ route('private.user.show', ['user' => Auth::user()->id]) }}"> --}}
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    profil akun
                </a>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>
    </ul>
</nav>