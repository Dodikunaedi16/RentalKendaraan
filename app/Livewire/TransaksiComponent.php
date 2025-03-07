<?php
namespace App\Livewire;

use App\Models\Mobil;
use App\Models\Transaksi;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class TransaksiComponent extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $addPage, $editPage = false;
    public $nama, $ponsel, $alamat, $lama, $tanggal, $mobil_id, $harga, $total;

    public function render()
    {
        $data['mobil'] = Mobil::paginate(5);
        $data['transaksi'] = Transaksi::paginate(10); // Tambahkan transaksi ke view
        return view('livewire.transaksi-component', $data);
    }

    public function create($id, $harga)
    {
        $this->mobil_id = $id;
        $this->harga = $harga;
        $this->addPage = true;
    }

    public function hitung()
    {
        $this->total = $this->lama * $this->harga;
    }

    public function store()
    {
        $this->validate([
            'nama' => 'required',
            'ponsel' => 'required',
            'alamat' => 'required',
            'lama' => 'required',
            'tanggal' => 'required',
        ], [
            'nama.required' => 'Nama tidak boleh kosong!',
            'ponsel.required' => 'Nomer ponsel tidak boleh kosong!',
            'alamat.required' => 'Alamat tidak boleh kosong!', // Diperbaiki
            'lama.required' => 'Lama pesan tidak boleh kosong!',
            'tanggal.required' => 'Tanggal pesan tidak boleh kosong!',
        ]);

        $cari = Transaksi::where('mobil_id', $this->mobil_id)
            ->where('tgl_pesan', $this->tanggal)
            ->where('status', '!=', 'SELESAI')
            ->count();

        if ($cari==1) { // Diperbaiki dari $cari == null
            session()->flash('error', 'Mobil sudah dipesan terlebih dahulu!');
        } else {
            Transaksi::create([
                'user_id' => auth()->user()->id,
                'mobil_id' => $this->mobil_id,
                'nama' => $this->nama,
                'ponsel' => $this->ponsel,
                'alamat' => $this->alamat,
                'lama' => $this->lama,
                'tgl_pesan' => $this->tanggal,
                'total' => $this->total,
                'status' => 'WAIT',
            ]);
            session()->flash('success', 'Transaksi Berhasil Disimpan!');
        }

        $this->dispatch('lihat-transaksi');
        $this->reset();
    }

    public function lihat()
    {
        $data['transaksi']=Transaksi::paginate(10);
    }
}
