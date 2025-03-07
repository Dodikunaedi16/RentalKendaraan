<?php

namespace App\Livewire;

use App\Models\Transaksi;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class LihatTransaksi extends Component
{
    use WithPagination, WithoutUrlPagination;
    #[On('lihat-transaksi')]
    public function render()
    {
        $data['transaksi']=Transaksi::paginate(5);
        return view('livewire.lihat-transaksi',$data);
    }

    public function proses($id)
    {
    $transaksi = Transaksi::find($id);
    if (!$transaksi) {
        session()->flash('error', 'Transaksi tidak ditemukan!');
        return;
    }
    $transaksi->update(['status' => 'PROSES']);
    session()->flash('success', 'Transaksi diproses!');
    }

    public function selesai($id)
    {
    $transaksi = Transaksi::find($id);
    if (!$transaksi) {
        session()->flash('error', 'Transaksi tidak ditemukan!');
        return;
    }
    $transaksi->update(['status' => 'SELESAI']);
    session()->flash('success', 'Transaksi selesai!');
    }

}
