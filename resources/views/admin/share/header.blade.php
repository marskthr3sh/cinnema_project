<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand">
            <div class="topbar-logo-header">
                <div class="">
                    <img src="/assets_admin/images/logo-icon.png" class="logo-icon" alt="logo icon">
                </div>
                <div class="">
                    <h4 class="logo-text">Marsk/Admin</h4>
                </div>
            </div>
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i></div>
            <div class="search-bar flex-grow-1 mb-3">
                <div class="position-relative search-bar-box ">

                </div>
            </div>
            <div>
            <div class="user-box dropdown text-end">
                <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                    role="button" data-bs-toggle="dropdown" aria-expanded="false">

                    <div class="user-info ps-3">
                        @if (Auth::check())
                            <button class="btn btn-light">
                                <p class="user-name mb-1"><i class="fa-regular fa-user"></i> {{ Auth::user()->name }}</p>

                                <ul class="dropdown-menu dropdown-menu-end"></ul>
                                <p class="designattion mb-0">Web Designer</p>
                            </button>
                        @else
                            <button class="btn btn-light">
                            <a href="{{route('login')}}"> <p  class="user-name mb-0"><i class="fa-solid fa-user"></i> Login</p></a>
                            </button>
                        @endif

                    </div>
                </a>

                <ul class="dropdown-menu dropdown-menu-end">
                    {{-- href="{{ route('profile')}}" --}}

                    <li>
                        <a class="dropdown-item" href="{{ route('admin.logout')}}"><i class="fa-solid fa-right-from-bracket"></i><span>Log out</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
