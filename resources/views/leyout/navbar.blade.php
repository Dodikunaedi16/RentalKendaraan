<!-- Navbar Start -->
<nav class="navbar navbar-expand bg-white navbar-light sticky-top px-4 py-2 shadow-sm border-bottom">
    <!-- Logo untuk layar kecil -->
    <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
        <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
    </a>

    <!-- Tombol Toggle Sidebar -->
    <a href="#" class="sidebar-toggler flex-shrink-0 text-primary">
        <i class="fa fa-bars fs-4"></i>
    </a>

    <!-- Search Bar -->
    <form class="d-none d-md-flex ms-4">
        <input class="form-control border-light shadow-sm rounded-pill px-3" type="search" placeholder="Search...">
    </form>

    <div class="navbar-nav align-items-center ms-auto">
        <!-- Profile Dropdown -->
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
                <img class="rounded-circle border border-2 border-primary shadow-sm me-lg-2"
                     src="{{ asset('assets/img/user.jpg') }}"
                     alt="User"
                     style="width: 40px; height: 40px;">
                <span class="d-none d-lg-inline-flex text-dark fw-bold">{{ auth()->user()->name }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-white border-0 shadow-lg rounded-3 mt-2">
                <div class="dropdown-divider"></div>
                <a href="{{ route('login.keluar') }}" class="dropdown-item text-danger py-2">
                    <i class="fa fa-sign-out-alt me-2"></i> Log Out
                </a>
            </div>
        </div>
    </div>
</nav>
<!-- Navbar End -->
