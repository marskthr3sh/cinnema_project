<div class="nav-container primary-menu">
    <div class="mobile-topbar-header">
        <div>
            <img src="/assets_admin/images/logo-icon.png" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Rukada</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <nav class="navbar navbar-expand-xl w-100">
        <ul class="navbar-nav justify-content-start flex-grow-1 gap-1">
            <li class="nav-item dropdown">
                <a href="javascript:;" class="nav-link dropdown-toggle dropdown-toggle-nocaret"
                    data-bs-toggle="dropdown">
                    <div class="parent-icon"><i class='bx bx-home-circle'></i>
                    </div>
                    <div class="menu-title">Dashboard</div>
                </a>
                <ul class="dropdown-menu">
                    <li> <a class="dropdown-item" href="/admin"><i class="bx bx-right-arrow-alt"></i>Trang Chủ</a>
                    </li>
                </ul>
            </li>
            <a class="nav-link" href="/admin/thong-ke">
                <div class="parent-icon"><i class="fa-solid fa-chart-column"></i>
                </div>
                <div class="menu-title">Thống Kê</div>
            </a>
            <a class="nav-link" href="/admin/phong-chieu/vue">
                <div class="parent-icon"><i class="fa-brands fa-chromecast"></i>
                </div>
                <div class="menu-title">Phòng Chiếu</div>
            </a>

            <a class="nav-link" href="/admin/don-vi">
                <div class="parent-icon"><i class="fa-solid fa-thermometer"></i>
                </div>
                <div class="menu-title">Đơn Vị</div>
            </a>
            <a class="nav-link" href="/admin/phim">
                <div class="parent-icon"><i class="fa-solid fa-film"></i>
                </div>
                <div class="menu-title">Phim</div>
            </a>
            {{-- <a class="nav-link" href="/admin/danh-sach-tai-khoan/vue">
                <div class="parent-icon"><i class="fa-regular fa-address-book"></i>
                </div>
                <div class="menu-title">Danh Sách Tài Khoản</div>
            </a> --}}
            {{-- <a class="nav-link" href="/admin/">
                <div class="parent-icon"><i class="fa-solid fa-user"></i>
                </div>
                <div class="menu-title">Admin</div>
            </a> --}}
            <a class="nav-link" href="/admin/ghe-chieu/vue">
                <div class="parent-icon"><i class="fa-solid fa-couch"></i>
                </div>
                <div class="menu-title">Ghế Chiếu</div>
            </a>
            <a class="nav-link" href="/admin/service/">
                <div class="parent-icon"><i class="fa-brands fa-servicestack"></i>
                </div>
                <div class="menu-title">Service</div>
            </a>
            <a class="nav-link" href="/admin/lich-chieu/">
                <div class="parent-icon"><i class="fa-regular fa-calendar-days"></i>
                </div>
                <div class="menu-title">Lịch Chiếu</div>
            </a>
        </ul>
    </nav>

</div>
