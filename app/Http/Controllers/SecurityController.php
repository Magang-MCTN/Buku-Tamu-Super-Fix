<?php

namespace App\Http\Controllers;

use App\Models\Surat2BukuTamuDuri;
use Illuminate\Http\Request;

class SecurityController extends Controller
{
    public function index()
    {
        // Lokasi yang ingin Anda tampilkan (misalnya, lokasi dengan ID 3)
        $locationId = 3;

        // Mengambil data pengajuan barang, ditolak, diajukan, dan disetujui
        $pengajuan = Surat2BukuTamuDuri::with(['surat1', 'statusSurat'])
            ->whereHas('surat1', function ($query) use ($locationId) {
                $query->where('id_lokasi', $locationId);
            })
            ->get();

        $pengajuanBarang = $pengajuan->where(
            'surat1.id_lokasi',
            3
        );
        $pengajuanDitolak = $pengajuan->where('id_status_surat', 7);
        $pengajuanDiajukan = $pengajuan->where('id_status_surat', 6);
        $pengajuanDisetujui = $pengajuan->where('id_status_surat', 2);

        // Menghitung jumlah data untuk setiap kategori
        $jumlahPengajuanBarang = $pengajuanBarang->count();
        $jumlahPengajuanDitolak = $pengajuanDitolak->count();
        $jumlahPengajuanDiajukan = $pengajuanDiajukan->count();
        $jumlahPengajuanDisetujui = $pengajuanDisetujui->count();

        $suratToApprove = Surat2BukuTamuDuri::with(['surat1', 'statusSurat'])
            ->where(function ($query) {
                $query->where('id_status_surat', 2);
            })
            ->whereHas('surat1', function ($query) {
                $query->where('id_lokasi', 3);
            })
            ->paginate(5);

        return view('dashboard.security.index2', compact('suratToApprove', 'pengajuanBarang', 'pengajuanDitolak', 'pengajuanDiajukan', 'pengajuanDisetujui', 'jumlahPengajuanBarang', 'jumlahPengajuanDitolak', 'jumlahPengajuanDiajukan', 'jumlahPengajuanDisetujui'));
    }

    public function show($id_surat_2_duri)
    {
        $surat2 = Surat2BukuTamuDuri::with([
            'surat1.periode',
            'surat1.lokasi',
            'surat1.tamu',
            'surat1.kendaraan'
        ])->find($id_surat_2_duri);

        return view('dashboard.security.show', compact('surat2'));
    }
    public function historysecurity()
    {
        $statusSurat = null;
        $surat1 = Surat2BukuTamuDuri::with(['surat1', 'statusSurat'])
            ->where(function ($query) {
                $query->whereIn('id_status_surat', [2]);
            })
            ->whereHas('surat1', function ($query) {
                $query->where('id_lokasi', 3);
            })
            ->paginate(5);


        return view('dashboard.security.history', compact('surat1', 'statusSurat'));
    }
    public function lihathistory2($id_surat_2_duri)
    {
        $surat2 = Surat2BukuTamuDuri::with([
            'surat1', 'statusSurat', 'surat1.periode',
            'surat1.lokasi',
            'surat1.tamu',
        ])->find($id_surat_2_duri);

        return view('dashboard.security.lihathistory', compact('surat2'));
    }
    public function filterHistory2(Request $request)
    {
        $statusSurat = $request->input('status_surat', null);
        $namaTamu = $request->input('search', null);

        $query = Surat2BukuTamuDuri::with(['surat1', 'statusSurat'])
            ->whereIn('id_status_surat', [2])
            ->whereHas('surat1', function ($query) use ($statusSurat, $namaTamu) {
                $query->where('id_lokasi', 3);
                if ($statusSurat !== null) {
                    $query->where('id_status_surat', $statusSurat);
                }
                if ($namaTamu !== null) {
                    $query->where('nama_tamu', 'like', '%' . $namaTamu . '%');
                }
            });

        $surat1 = $query->paginate(5);

        return view('dashboard.security.history', compact('surat1', 'statusSurat', 'namaTamu'));
    }
}
