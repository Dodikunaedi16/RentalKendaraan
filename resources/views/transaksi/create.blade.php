<div class="container-fluid pt-4 px-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="bg-white rounded shadow-lg p-4 border border-light">
                <h4 class="mb-4 text-primary fw-bold">
                    <i class="bi bi-car-front-fill me-2"></i> Tambah Transaksi
                </h4>

                <form wire:submit.prevent="store">
                    <div class="mb-4">
                        <label for="nama" class="form-label fw-bold">Nama Pemesan</label>
                        <input type="text" class="form-control shadow-sm" wire:model="nama" id="nama" placeholder="Masukkan nama pemesan">
                        @error('nama')
                            <div class="text-danger mt-1"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="ponsel" class="form-label fw-bold">Nomor Ponsel Pemesan</label>
                        <input type="text" class="form-control shadow-sm" wire:model="ponsel" id="ponsel" placeholder="Masukkan nomor ponsel">
                        @error('ponsel')
                            <div class="text-danger mt-1"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="alamat" class="form-label fw-bold">Alamat Pemesan</label>
                        <input type="text" class="form-control shadow-sm" wire:model="alamat" id="alamat" placeholder="Masukkan alamat pemesan">
                        @error('alamat')
                            <div class="text-danger mt-1"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="lama" class="form-label fw-bold">Lama Pemesan (hari)</label>
                        <input type="number" class="form-control shadow-sm" wire:change="hitung" wire:model="lama" id="lama" min="1" placeholder="Jumlah hari">
                        @error('lama')
                            <div class="text-danger mt-1"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="tanggal" class="form-label fw-bold">Tanggal Pemesan</label>
                        <input type="date" class="form-control shadow-sm" wire:change="hitung" wire:model="tanggal" id="tanggal">
                        @error('tanggal')
                            <div class="text-danger mt-1"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4 p-3 bg-light rounded text-center">
                        <h5 class="text-success fw-bold"><i class="bi bi-cash me-2"></i> Total: @rupiah($total)</h5>
                    </div>

                    <button type="submit" class="btn btn-success w-100 fw-bold shadow-sm">
                        <i class="bi bi-plus-circle me-2"></i> Tambah Transaksi
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
