<?php

namespace App\Http\Controllers;

use App\Models\Surat2BukuTamu;
use Illuminate\Http\Request;

class AdminJKTController extends Controller
{
    public function index()
    {
        // Lokasi yang ingin Anda tampilkan (misalnya, lokasi dengan ID 3)
        $locationId = 1;

        // Mengambil data pengajuan barang, ditolak, diajukan, dan disetujui
        $pengajuan = Surat2BukuTamu::with(['surat1', 'statusSurat'])
            ->whereHas('surat1', function ($query) use ($locationId) {
                $query->where('id_lokasi', $locationId);
            })
            ->get();

        $pengajuanBarang = $pengajuan->where(
            'surat1.id_lokasi',
            1
        );
        $pengajuanDitolak = $pengajuan->where('id_status_surat', 7);
        $pengajuanDiajukan = $pengajuan->where('id_status_surat', 6);
        $pengajuanDisetujui = $pengajuan->where('id_status_surat', 2);

        // Menghitung jumlah data untuk setiap kategori
        $jumlahPengajuanBarang = $pengajuanBarang->count();
        $jumlahPengajuanDitolak = $pengajuanDitolak->count();
        $jumlahPengajuanDiajukan = $pengajuanDiajukan->count();
        $jumlahPengajuanDisetujui = $pengajuanDisetujui->count();

        $suratToApprove = Surat2BukuTamu::with(['surat1', 'statusSurat'])
            ->where(function ($query) {
                $query->where('id_status_surat', 6);
            })
            ->whereHas('surat1', function ($query) {
                $query->where('id_lokasi', 1);
            })
            ->paginate(5);

        return view('dashboard.admin.index', compact('suratToApprove', 'pengajuanBarang', 'pengajuanDitolak', 'pengajuanDiajukan', 'pengajuanDisetujui', 'jumlahPengajuanBarang', 'jumlahPengajuanDitolak', 'jumlahPengajuanDiajukan', 'jumlahPengajuanDisetujui'));
    }
    public function persetujuanadminjkt()
    {
        $surat1 = Surat2BukuTamu::with(['surat1', 'statusSurat'])
            ->where(function ($query) {
                $query->where('id_status_surat', 6);
            })
            ->whereHas('surat1', function ($query) {
                $query->where('id_lokasi', 1);
            })
            ->paginate(5);


        return view('dashboard.admin.persetujuan', compact('surat1'));
    }
    public function cari(Request $request)
    {
        $namaTamu = $request->input('search');

        $surat1 = Surat2BukuTamu::with(['surat1', 'statusSurat'])
            ->whereHas('surat1', function ($query) use ($namaTamu) {
                $query->where('nama_tamu', 'like', '%' . $namaTamu . '%');
            })
            ->paginate(5);

        return view('dashboard.admin.persetujuan', compact('surat1', 'namaTamu'));
    }
    public function historyadminjkt()
    {
        $statusSurat = null;
        $surat1 = Surat2BukuTamu::with(['surat1', 'statusSurat'])
            ->where(function ($query) {
                $query->whereIn('id_status_surat', [2, 7]);
            })
            ->whereHas('surat1', function ($query) {
                $query->where('id_lokasi', 1);
            })
            ->paginate(5);


        return view('dashboard.admin.history', compact('surat1', 'statusSurat'));
    }
    public function filterHistory(Request $request)
    {
        $statusSurat = $request->input('status_surat', null);
        $namaTamu = $request->input('search', null);

        $query = Surat2BukuTamu::with(['surat1', 'statusSurat'])
            ->whereIn('id_status_surat', [2, 7])
            ->whereHas('surat1', function ($query) use ($statusSurat, $namaTamu) {
                $query->where('id_lokasi', 1);
                if ($statusSurat !== null) {
                    $query->where('id_status_surat', $statusSurat);
                }
                if ($namaTamu !== null) {
                    $query->where('nama_tamu', 'like', '%' . $namaTamu . '%');
                }
            });

        $surat1 = $query->paginate(5);

        return view('dashboard.admin.history', compact('surat1', 'statusSurat', 'namaTamu'));
    }
    public function lihathistory2($id_surat_2)
    {
        $surat2 = Surat2BukuTamu::with([
            'surat1', 'statusSurat', 'surat1.periode',
            'surat1.lokasi',
            'surat1.tamu',
        ])->find($id_surat_2);

        return view('dashboard.admin.lihathistory', compact('surat2'));
    }

    public function show($id_surat_2)
    {
        $surat2 = Surat2BukuTamu::with([
            'surat1', 'statusSurat', 'surat1.periode',
            'surat1.lokasi',
            'surat1.tamu',
        ])->find($id_surat_2);

        return view('dashboard.admin.show', compact('surat2'));
    }

    public function approve(Request $request, $id)
    {
        // Set status surat menjadi "approved" sesuai dengan kode status yang sesuai
        $surat2 = Surat2BukuTamu::findOrFail($id);
        $surat2->id_status_surat = 2; // Misalnya, id_status_surat yang sesuai untuk status "approved"
        $surat2->alasan_surat2 = $request->input('alasan_surat2');
        $surat2->save();

        // Redirect ke halaman sebelumnya atau ke halaman lain
        return redirect()->back()->with('success', 'Surat 2 telah disetujui');
    }

    public function reject(Request $request, $id)
    {
        // Set status surat menjadi "rejected" sesuai dengan kode status yang sesuai
        $surat2 = Surat2BukuTamu::findOrFail($id);
        $surat2->id_status_surat = 7; // Misalnya, id_status_surat yang sesuai untuk status "rejected"
        $surat2->alasan_surat2 = $request->input('alasan_surat2');
        $surat2->save();

        // Redirect ke halaman sebelumnya atau ke halaman lain
        return redirect()->back()->with('success', 'Surat 2 telah ditolak');
    }
}
