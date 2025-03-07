<!-- Sidebar Start -->
<div class="sidebar bg-white shadow-lg rounded-end pe-4 pb-3">
    <nav class="navbar navbar-light">
        <a href="index.html" class="navbar-brand mx-4 mb-3 d-flex align-items-center">
            <h3 class="text-primary fw-bold"><i class="fa fa-hashtag me-2"></i>RENT CAR</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle border border-2 border-primary shadow-sm"
                     src="{{ asset ('assets/img/user.jpg') }}"
                     alt="User"
                     style="width: 45px; height: 45px;">
                <div class="bg-success rounded-circle border border-white position-absolute end-0 bottom-0 p-2"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0 fw-bold">{{ auth()->user()->name }}</h6>
                <span class="text-muted small">{{ auth()->user()->role }}</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{route('home')}}" class="nav-item nav-link active">
                <i class="fa fa-tachometer-alt me-2"></i> Dashboard
            </a>
            <a href="{{route('transaksi')}}" class="nav-item nav-link">
                <i class="fa fa-shopping-cart me-2"></i> Transaksi
            </a>
            <a href="{{route('dataTransaksi')}}" class="nav-item nav-link">
                <i class="fa fa-th me-2"></i> Data Transaksi
            </a>
            <a href="{{route('laporan')}}" class="nav-item nav-link">
                <i class="fa fa-file me-2"></i> Laporan
            </a>
            <a href="{{route('mobil')}}" class="nav-item nav-link">
                <i class="fa fa-car me-2"></i> Mobil
            </a>
            <a href="{{ route('users') }}" class="nav-item nav-link">
                <i class="fa fa-users me-2"></i> User
            </a>
        </div>
    </nav>
</div>
<!-- Sidebar End -->
