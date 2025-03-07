<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-white rounded-lg shadow-lg p-4 border border-light">
                <!-- Alert Sukses -->
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <h5 class="mb-4 text-primary fw-bold"><i class="bi bi-file-text-fill me-2"></i>Data Laporan Transaksi</h5>

                <!-- Filter Form -->
                <div class="row mb-4 align-items-center">
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Dari Tanggal</label>
                        <input type="date" wire:model="tanggal1" class="form-control form-control-lg">
                    </div>
                    <div class="col-md-1 text-center">
                        <span class="fw-bold">S/D</span>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Sampai Tanggal</label>
                        <input type="date" wire:model="tanggal2" class="form-control form-control-lg">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label d-block">&nbsp;</label>
                        <button class="btn btn-lg btn-primary w-100 d-flex align-items-center justify-content-center" wire:click="cari">
                            <i class="bi bi-search me-2"></i> Filter
                        </button>
                    </div>
                </div>

                <!-- Table -->
                <div class="table-responsive">
                    <table class="table table-hover text-center align-middle border">
                        <thead class="table-primary text-dark">
                            <tr>
                                <th>No</th>
                                <th>No Polisi</th>
                                <th>Kapasitas Mobil</th>
                                <th>Nama Pemesan</th>
                                <th>Alamat</th>
                                <th>Lama</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($transaksi as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->mobil->nopolisi }}</td>
                                    <td>{{ $data->mobil->kapasitas }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->alamat }}</td>
                                    <td>{{ $data->lama }} hari</td>
                                    <td>{{ $data->tgl_pesan }}</td>
                                    <td class="fw-bold text-success">@rupiah($data->total)</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted fw-bold py-3">Data laporan belum tersedia.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination & Export PDF -->
                @if ($transaksi->count())
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <div>{{ $transaksi->links() }}</div>
                        <button class="btn btn-success btn-lg d-flex align-items-center" wire:click="exportpdf">
                            <i class="bi bi-file-earmark-pdf me-2"></i> Export PDF
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
