<?php

namespace App\Livewire;

use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class LaporanComponent extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $tanggal1 = null, $tanggal2 = null;

    #[On('lihat-laporan')]
    public function updateLaporan()
    {
        $this->resetPage(); // Reset pagination saat event dipanggil
    }

    public function render()
    {
        // Query transaksi yang telah selesai
        $query = Transaksi::where('status', 'SELESAI')->latest('tgl_pesan');

        if (!empty($this->tanggal1) && !empty($this->tanggal2)) {
            $query->whereBetween('tgl_pesan', [$this->tanggal1, $this->tanggal2]);
        }

        return view('livewire.laporan-component', [
            'transaksi' => $query->paginate(10),
        ]);
    }

    public function cari()
    {
        $this->resetPage();
        $this->dispatch('lihat-laporan');
    }

    public function exportpdf()
    {
        // Ambil data transaksi berdasarkan filter tanggal
        $query = Transaksi::where('status', 'SELESAI');

        if (!empty($this->tanggal1) && !empty($this->tanggal2)) {
            $query->whereBetween('tgl_pesan', [$this->tanggal1, $this->tanggal2]);
        }

        $data['transaksi'] = $query->get();

        // Generate PDF
        $pdf = Pdf::loadView('laporan.export', $data);
        $filename = $this->tanggal1 && $this->tanggal2
            ? "laporan-transaksi-{$this->tanggal1}_sd_{$this->tanggal2}.pdf"
            : "laporan-transaksi-keseluruhan.pdf";

        return response()->streamDownload(fn () => print($pdf->output()), $filename);
    }
}
