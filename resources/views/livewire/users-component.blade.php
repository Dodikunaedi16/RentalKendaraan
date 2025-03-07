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
                    <i class="bi bi-people-fill me-2"></i> Data User
                </h5>

                @if ($user->isNotEmpty())
                    <div class="table-responsive">
                        <table class="table table-hover text-center align-middle border">
                            <thead class="table-primary text-dark">
                                <tr>
                                    <th>No</th>
                                    <th><i class="bi bi-person-circle me-1"></i> Nama</th>
                                    <th><i class="bi bi-envelope me-1"></i> Email</th>
                                    <th><i class="bi bi-shield-lock me-1"></i> Role</th>
                                    <th><i class="bi bi-gear me-1"></i> Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="fw-bold">{{ $data->name }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>
                                            <span class="badge bg-info text-dark">{{ ucfirst($data->role) }}</span>
                                        </td>
                                        <td class="d-flex justify-content-center gap-2">
                                            <button class="btn btn-sm btn-info d-flex align-items-center" wire:click="edit({{ $data->id }})">
                                                <i class="bi bi-pencil-square me-1"></i> Edit
                                            </button>
                                            <button class="btn btn-sm btn-danger d-flex align-items-center"
                                                wire:click="destroy({{ $data->id }})"
                                                onclick="confirm('Apakah Anda yakin ingin menghapus data ini?') || event.stopImmediatePropagation()">
                                                <i class="bi bi-trash me-1"></i> Delete
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <div>{{ $user->links() }}</div>
                    </div>
                @else
                    <p class="text-center text-muted fw-bold py-3">
                        <i class="bi bi-exclamation-circle me-2"></i> Tidak ada data pengguna.
                    </p>
                @endif

                <!-- Tombol Tambah User -->
                <button wire:click="create" class="btn btn-primary mt-3">
                    <i class="bi bi-plus-circle"></i> Tambah User
                </button>
            </div>
        </div>
    </div>

    <!-- Include Form Tambah & Edit -->
    @if ($addPage)
        @include('users.create')
    @endif

    @if ($editPage)
        @include('users.edit')
    @endif
</div>
