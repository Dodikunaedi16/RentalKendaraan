<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
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
                    <i class="bi bi-clipboard-data me-2"></i> Data Transaksi
                </h5>

                <div class="table-responsive">
                    <table class="table table-hover text-center align-middle border">
                        <thead class="table-primary text-dark">
                            <tr>
                                <th>No</th>
                                <th>No Polisi</th>
                                <th>Merk</th>
                                <th>Nama</th>
                                <th>Ponsel</th>
                                <th>Alamat</th>
                                <th>Tanggal Pesan</th>
                                <th>Total</th>
                                <th>Lama</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($transaksi as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ optional($data->mobil)->nopolisi ?? 'N/A' }}</td>
                                    <td>{{ optional($data->mobil)->merk ?? 'N/A' }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->ponsel }}</td>
                                    <td>{{ $data->alamat }}</td>
                                    <td>{{ $data->tgl_pesan }}</td>
                                    <td class="fw-bold text-success">@rupiah($data->total)</td>
                                    <td>{{ $data->lama }} hari</td>
                                    <td>
                                        <span class="badge
                                            {{ $data->status == 'WAIT' ? 'bg-warning' : '' }}
                                            {{ $data->status == 'PROSES' ? 'bg-primary' : '' }}
                                            {{ $data->status == 'SELESAI' ? 'bg-success' : '' }}
                                        ">
                                            {{ strtoupper($data->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        @if ($data->status == 'WAIT')
                                            <button class="btn btn-sm btn-success d-flex align-items-center" wire:click="proses({{ $data->id }})">
                                                <i class="bi bi-arrow-right-circle me-1"></i> PROSES
                                            </button>
                                        @endif
                                        @if ($data->status == 'PROSES')
                                            <button class="btn btn-sm btn-success d-flex align-items-center" wire:click="selesai({{ $data->id }})">
                                                <i class="bi bi-check-circle me-1"></i> SELESAI
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="11" class="text-center text-muted fw-bold py-3">
                                        <i class="bi bi-exclamation-circle me-2"></i> Data transaksi belum tersedia.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div>{{ $transaksi->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
