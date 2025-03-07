<div class="container-fluid pt-4 px-4">
    <div class="row">
        <div class="col-12">
            <div class="bg-white rounded-lg shadow-lg p-4 border border-light">
                <!-- Alert Sukses -->
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
                        <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <h5 class="mb-4 text-primary fw-bold">
                    <i class="bi bi-car-front-fill me-2"></i> Data Mobil
                </h5>

                <!-- Container Grid -->
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    @forelse ($mobil as $data)
                        <div class="col">
                            <div class="card shadow-sm border-0 h-100">
                                <div class="row g-0">
                                    <div class="col-md-5 d-flex align-items-center overflow-hidden" style="height: 200px;">
                                        @if (!empty($data->foto) && file_exists(public_path('storage/mobil/' . $data->foto)))
                                            <img src="{{ asset('storage/mobil/' . $data->foto) }}" class="img-fluid rounded-start w-100 h-100 object-fit-cover" alt="{{ $data->merk }}">
                                        @else
                                            <div class="d-flex align-items-center justify-content-center bg-light text-muted w-100 h-100">
                                                <i class="bi bi-image" style="font-size: 2rem;"></i>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-md-7">
                                        <div class="card-body">
                                            <h5 class="card-title fw-bold">{{ $data->merk }}</h5>
                                            <p class="card-text text-muted mb-2"><i class="bi bi-tag me-1"></i> {{ $data->jenis }}</p>
                                            <p class="card-text mb-1"><i class="bi bi-person-fill me-1"></i> Kapasitas: <span class="badge bg-info text-dark">{{ $data->kapasitas }} Orang</span></p>
                                            <p class="card-text text-success fw-bold"><i class="bi bi-cash me-1"></i> @rupiah($data->harga)</p>

                                            <!-- Tombol Aksi -->
                                            <div class="d-flex gap-2">
                                                <button class="btn btn-sm btn-info" wire:click="edit({{ $data->id }})">
                                                    <i class="bi bi-pencil-square me-1"></i> Edit
                                                </button>
                                                <button class="btn btn-sm btn-danger" wire:click="destroy({{ $data->id }})"
                                                    onclick="confirm('Apakah Anda yakin ingin menghapus data ini?') || event.stopImmediatePropagation()">
                                                    <i class="bi bi-trash me-1"></i> Delete
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center text-muted fw-bold py-3">
                            <i class="bi bi-exclamation-circle me-2"></i> Data mobil belum tersedia.
                        </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                @if ($mobil->count())
                    <div class="d-flex justify-content-center mt-3">
                        {{ $mobil->links() }}
                    </div>
                @endif

                <!-- Tombol Tambah Mobil -->
                <button wire:click="create" class="btn btn-primary mt-3">
                    <i class="bi bi-plus-circle"></i> Tambah Mobil
                </button>
            </div>
        </div>
    </div>

    <!-- Include Form Tambah dan Edit -->
    @if ($addPage)
        @include('mobil.create')
    @endif

    @if ($editPage)
        @include('mobil.edit')
    @endif
</div>
