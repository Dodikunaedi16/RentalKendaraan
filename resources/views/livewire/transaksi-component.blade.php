<div class="container-fluid pt-4 px-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="bg-white rounded shadow-lg p-4 border border-light">
                <!-- Alert Sukses & Error -->
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show mb-4 d-flex align-items-center" role="alert">
                        <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show mb-4 d-flex align-items-center" role="alert">
                        <i class="bi bi-x-circle me-2"></i> {{ session('error') }}
                    </div>
                @endif

                <h4 class="mb-4 text-primary fw-bold">
                    <i class="bi bi-car-front-fill me-2"></i> Daftar Mobil
                </h4>

                <div class="row g-4">
                    @foreach ($mobil as $data)
                        <div class="col-md-4">
                            <div class="card shadow-lg border-0 rounded-lg overflow-hidden">
                                <div class="position-relative">
                                    <img src="{{ asset('storage/mobil/' . $data->foto) }}" class="card-img-top" style="height: 220px; object-fit: cover;" alt="Foto Mobil">
                                    <div class="position-absolute top-0 end-0 mt-2 me-2">
                                        <span class="badge bg-dark text-light p-2">{{ ucfirst($data->jenis) }}</span>
                                    </div>
                                </div>
                                <div class="card-body text-center">
                                    <h5 class="card-title text-primary fw-bold">{{ $data->merk }}</h5>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><i class="bi bi-card-list me-2"></i> No Polisi: <strong>{{ $data->nopolisi }}</strong></li>
                                    <li class="list-group-item"><i class="bi bi-tags me-2"></i> Harga: <strong class="text-success">@rupiah($data->harga)</strong></li>
                                    <li class="list-group-item"><i class="bi bi-people me-2"></i> Kapasitas: <span class="badge bg-info text-dark">{{ $data->kapasitas }}</span></li>
                                </ul>
                                <div class="card-body text-center">
                                    <button wire:click="create({{ $data->id }},{{$data->harga}})" class="btn btn-success w-100 fw-bold shadow-sm">
                                        <i class="bi bi-check-circle me-1"></i> Pilih Mobil
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="d-flex justify-content-center mt-4">
                    {{ $mobil->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>

    @if ($addPage)
        @include('transaksi.create')
    @endif
</div>
