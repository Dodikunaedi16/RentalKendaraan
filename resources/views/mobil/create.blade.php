<div class="container-fluid pt-4 px-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-lg p-4">
                <h4 class="mb-4 text-primary fw-bold">
                    <i class="bi bi-car-front-fill me-2"></i> Tambah Mobil
                </h4>

                <form wire:submit.prevent="store">
                    <div class="mb-3">
                        <label for="nopolisi" class="form-label fw-bold">No Polisi</label>
                        <input type="text" class="form-control" wire:model="nopolisi" id="nopolisi" placeholder="Masukkan No Polisi">
                        @error('nopolisi')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="merk" class="form-label fw-bold">Merk</label>
                        <input type="text" class="form-control" wire:model="merk" id="merk" placeholder="Masukkan Merk Mobil">
                        @error('merk')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="jenis" class="form-label fw-bold">Jenis Mobil</label>
                        <select class="form-select" wire:model="jenis">
                            <option value="">-- Pilih Jenis Mobil --</option>
                            <option value="sedan">Sedan</option>
                            <option value="MPV">MPV</option>
                            <option value="SUV">SUV</option>
                        </select>
                        @error('jenis')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="kapasitas" class="form-label fw-bold">Kapasitas Mobil</label>
                                <input type="number" class="form-control" wire:model="kapasitas" id="kapasitas" placeholder="Masukkan Kapasitas">
                                @error('kapasitas')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="harga" class="form-label fw-bold">Harga</label>
                                <input type="number" class="form-control" wire:model="harga" id="harga" placeholder="Masukkan Harga">
                                @error('harga')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="foto" class="form-label fw-bold">Foto Mobil</label>
                        <input type="file" class="form-control" wire:model="foto" id="foto">
                        @if ($foto)
                            <div class="mt-3">
                                <img src="{{ $foto->temporaryUrl() }}" class="rounded shadow-sm border" width="200">
                            </div>
                        @endif
                        @error('foto')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mt-3">
                        <i class="bi bi-plus-circle"></i> Tambah Mobil
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
