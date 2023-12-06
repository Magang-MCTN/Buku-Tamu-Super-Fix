<?php

namespace App\Http\Controllers;

use App\Models\Surat2BukuTamu;
use Illuminate\Http\Request;

class AdminPkuController extends Controller
{
    public function index()
    {
        // Lokasi yang ingin Anda tampilkan (misalnya, lokasi dengan ID 3)
        $locationId = 2;

        // Mengambil data pengajuan barang, ditolak, diajukan, dan disetujui
        $pengajuan = Surat2BukuTamu::with(['surat1', 'statusSurat'])
            ->whereHas('surat1', function ($query) use ($locationId) {
                $query->where('id_lokasi', $locationId);
            })
            ->get();
        $pengajuanBarang = $pengajuan->where(
            'surat1.id_lokasi',
            2
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
                $query->where('id_lokasi', 2);
            })
            ->get();

        return view('dashboard.adminpku.index', compact('suratToApprove', 'pengajuanBarang', 'pengajuanDitolak', 'pengajuanDiajukan', 'pengajuanDisetujui', 'jumlahPengajuanBarang', 'jumlahPengajuanDitolak', 'jumlahPengajuanDiajukan', 'jumlahPengajuanDisetujui'));
    }
    public function persetujuanadminpku()
    {
        $surat1 = Surat2BukuTamu::with(['surat1', 'statusSurat'])
            ->where(function ($query) {
                $query->where('id_status_surat', 6);
            })
            ->whereHas('surat1', function ($query) {
                $query->where('id_lokasi', 2);
            })
            ->get();


        return view('dashboard.adminpku.persetujuan', compact('surat1'));
    }
    public function historyadminpku()
    {
        $surat1 = Surat2BukuTamu::with(['surat1', 'statusSurat'])
            ->where(function ($query) {
                $query->where('id_status_surat', 2, 3);
            })
            ->whereHas('surat1', function ($query) {
                $query->where('id_lokasi', 2);
            })
            ->get();


        return view('dashboard.adminpku.history', compact('surat1'));
    }
    public function show($id_surat_2)
    {
        $surat2 = Surat2BukuTamu::with([
            'surat1', 'statusSurat', 'surat1.periode',
            'surat1.lokasi',
            'surat1.tamu',
        ])->find($id_surat_2);

        return view('dashboard.adminpku.show', compact('surat2'));
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
        $surat2->id_status_surat = 3; // Misalnya, id_status_surat yang sesuai untuk status "rejected"
        $surat2->alasan_surat2 = $request->input('alasan_surat2');
        $surat2->save();

        // Redirect ke halaman sebelumnya atau ke halaman lain
        return redirect()->back()->with('success', 'Surat 2 telah ditolak');
    }
}
