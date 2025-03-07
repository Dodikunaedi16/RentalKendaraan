 <!-- Sale & Revenue Start -->
 <div class="container-fluid pt-4 px-4">
    <div class="row g-4">
      <!-- Total Transaksi -->
      <div class="col-sm-6 col-xl-4">
        <div class="card shadow-sm">
          <div class="card-body d-flex align-items-center">
            <div class="me-3">
              <i class="fa fa-dollar-sign fa-3x text-success"></i>
            </div>
            <div>
              <p class="mb-1 text-muted">Total Transaksi</p>
              <h5 class="mb-0">@rupiah($transaksi)</h5>
            </div>
          </div>
        </div>
      </div>
      <!-- Mobil -->
      <div class="col-sm-6 col-xl-4">
        <div class="card shadow-sm">
          <div class="card-body d-flex align-items-center">
            <div class="me-3">
              <i class="fa fa-car fa-3x text-warning"></i>
            </div>
            <div>
              <p class="mb-1 text-muted">Mobil</p>
              <h5 class="mb-0">{{$mobil}}</h5>
            </div>
          </div>
        </div>
      </div>
      <!-- User -->
      <div class="col-sm-6 col-xl-4">
        <div class="card shadow-sm">
          <div class="card-body d-flex align-items-center">
            <div class="me-3">
              <i class="fa fa-users fa-3x text-danger"></i>
            </div>
            <div>
              <p class="mb-1 text-muted">User</p>
              <h5 class="mb-0">{{$user}}</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Sale & Revenue End -->
