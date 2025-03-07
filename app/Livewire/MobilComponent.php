<?php

namespace App\Livewire;

use App\Models\Mobil;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class MobilComponent extends Component
{
    use WithPagination, WithoutUrlPagination, WithFileUploads;

    protected $paginationTheme = 'bootstrap';
    public $addPage = false, $editPage = false;
    public $nopolisi, $merk, $jenis, $kapasitas, $harga, $foto, $id;

    public function render()
    {
        $data['mobil'] = Mobil::paginate(10);
        return view('livewire.mobil-component', $data);
    }

    public function create()
    {
        $this->reset();
        $this->addPage = true;
    }

    public function store()
    {
        $this->validate([
            'nopolisi' => 'required',
            'merk' => 'required',
            'jenis' => 'required',
            'kapasitas' => 'required|integer',
            'harga' => 'required|numeric',
            'foto' => 'required|image',
        ], [
            'nopolisi.required' => 'Nomer polisi tidak boleh kosong!',
            'merk.required' => 'Merk tidak boleh kosong!',
            'jenis.required' => 'Jenis tidak boleh kosong!',
            'kapasitas.required' => 'Kapasitas tidak boleh kosong!',
            'kapasitas.integer' => 'Kapasitas harus berupa angka!',
            'harga.required' => 'Harga tidak boleh kosong!',
            'harga.numeric' => 'Harga harus berupa angka!',
            'foto.required' => 'Foto tidak boleh kosong!',
            'foto.image' => 'Foto harus dalam format gambar!',
        ]);

        // Simpan foto ke storage/app/public/mobil
        $fotoPath = $this->foto->storeAs('mobil', $this->foto->hashName(), 'public');

        Mobil::create([
            'user_id' => auth()->user()->id,
            'nopolisi' => $this->nopolisi,
            'merk' => $this->merk,
            'jenis' => $this->jenis,
            'kapasitas' => (int) $this->kapasitas, // Pastikan kapasitas integer
            'harga' => (float) $this->harga, // Harga disimpan sebagai angka
            'foto' => $fotoPath, // Simpan path foto
        ]);


        session()->flash('success', 'Berhasil simpan data!');
        $this->reset();
    }

    public function destroy($id)
    {
        $mobil = Mobil::find($id);

        if ($mobil) {

            $fotoPath = storage_path('app/public/mobil/' . $mobil->foto);
            if (file_exists($fotoPath)) {
                unlink($fotoPath);
            }

            $mobil->delete();
            session()->flash('success', 'Berhasil dihapus!');
        }

        $this->reset();
    }

    public function edit($id)
    {
        $this->reset();
        $this->editPage = true;
        $this->id = $id;

        $mobil = Mobil::find($id);
        if ($mobil) {
            $this->nopolisi = $mobil->nopolisi;
            $this->merk = $mobil->merk;
            $this->jenis = $mobil->jenis;
            $this->kapasitas = $mobil->kapasitas;
            $this->harga = $mobil->harga;
        }
    }

    public function update()
    {
        $this->validate([
            'nopolisi' => 'required',
            'merk' => 'required',
            'jenis' => 'required',
            'kapasitas' => 'required|integer',
            'harga' => 'required|numeric',
            'foto' => 'nullable|image',
        ]);

        $mobil = Mobil::find($this->id);
        if (!$mobil) {
            session()->flash('error', 'Mobil tidak ditemukan!');
            return;
        }

        $data = [
            'user_id' => auth()->user()->id,
            'nopolisi' => $this->nopolisi,
            'merk' => $this->merk,
            'jenis' => $this->jenis,
            'kapasitas' => (int) $this->kapasitas, // Memastikan kapasitas integer
            'harga' => (float) $this->harga, // Harga juga angka
        ];

        if ($this->foto) {

            $fotoLama = storage_path('app/public/mobil/' . $mobil->foto);
            if (file_exists($fotoLama)) {
                unlink($fotoLama);
            }
            $fotoPath = $this->foto->storeAs('mobil', $this->foto->hashName(), 'public');
            $data['foto'] = $this->foto->hashName();
        }
        $mobil->update($data);

        session()->flash('success', 'Berhasil Diubah!');
        $this->reset();
    }
}
