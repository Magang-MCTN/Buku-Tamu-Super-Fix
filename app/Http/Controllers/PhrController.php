<?php

namespace App\Http\Controllers;

use App\Mail\NotifEmailAdmin;
use App\Mail\NotifEmailAdminDuri;
use App\Mail\Send;
use App\Models\Surat2BukuTamuDuri;
use Illuminate\Http\Request;
use App\Models\PeriodeTamu;
use App\Models\Surat1BukuTamu;
use App\Models\Surat2BukuTamu;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PhrController extends Controller
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
        $pengajuanDitolak = $pengajuan->where('id_status_surat', 5);
        $pengajuanDiajukan = $pengajuan->where('id_status_surat', 4);
        $pengajuanDisetujui = $pengajuan->where('id_status_surat', 6);

        // Menghitung jumlah data untuk setiap kategori
        $jumlahPengajuanBarang = $pengajuanBarang->count();
        $jumlahPengajuanDitolak = $pengajuanDitolak->count();
        $jumlahPengajuanDiajukan = $pengajuanDiajukan->count();
        $jumlahPengajuanDisetujui = $pengajuanDisetujui->count();

        $suratToApprove = Surat2BukuTamuDuri::with(['surat1', 'statusSurat'])
            ->where(function ($query) {
                $query->where('id_status_surat', 4);
            })
            ->whereHas('surat1', function ($query) {
                $query->where('id_lokasi', 3);
            })
            ->paginate(5);

        return view('dashboard.phr.index', compact('suratToApprove', 'pengajuanBarang', 'pengajuanDitolak', 'pengajuanDiajukan', 'pengajuanDisetujui', 'jumlahPengajuanBarang', 'jumlahPengajuanDitolak', 'jumlahPengajuanDiajukan', 'jumlahPengajuanDisetujui'));
    }
    public function persetujuanphr()
    {
        $surat1 = Surat2BukuTamuDuri::with(['surat1', 'statusSurat'])
            ->where(function ($query) {
                $query->where('id_status_surat', 4);
            })            // ->whereHas('surat1', function ($query) {
            //     $query->where('id_lokasi', 3);

            ->paginate(5);


        return view('dashboard.phr.persetujuan', compact('surat1'));
    }
    public function cari(Request $request)
    {
        $namaTamu = $request->input('search');

        $surat1 = Surat2BukuTamuDuri::with(['surat1', 'statusSurat'])
            ->whereHas('surat1', function ($query) use ($namaTamu) {
                $query->where('nama_tamu', 'like', '%' . $namaTamu . '%');
            })
            ->where('id_status_surat', 4) // Menambahkan kondisi untuk id_status_surat
            ->paginate(5);

        return view('dashboard.phr.persetujuan', compact('surat1', 'namaTamu'));
    }
    public function historyphr()
    {
        $statusSurat = null;
        $surat1 = Surat2BukuTamuDuri::with(['surat1',])
            ->where(function ($query) {
                $query->whereIn('id_status_surat', [2, 5, 6, 7]);
            })
            ->whereHas('surat1', function ($query) {
                $query->where('id_lokasi', 3);
            })
            ->paginate(5);


        return view('dashboard.phr.history', compact('surat1', 'statusSurat'));
    }
    public function filterHistory(Request $request)
    {
        $statusSurat = $request->input('status_surat', null);
        $namaTamu = $request->input('search', null);

        $query = Surat2BukuTamuDuri::with(['surat1', 'statusSurat'])
            ->whereIn('id_status_surat', [2, 5, 6, 7,])
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

        return view('dashboard.phr.history', compact('surat1', 'statusSurat', 'namaTamu'));
    }
    public function lihathistory2($id_surat_2_duri)
    {
        $surat2 = Surat2BukuTamuDuri::with([
            'surat1', 'statusSurat', 'surat1.periode',
            'surat1.lokasi',
            'surat1.tamu',
        ])->find($id_surat_2_duri);

        return view('dashboard.phr.lihathistory', compact('surat2'));
    }

    public function approve(Request $request, $id_surat_2_duri)
    {
        // Set status surat menjadi "approved" (sesuaikan dengan kode status yang sesuai)
        $surat2 = Surat2BukuTamuDuri::findOrFail($id_surat_2_duri);
        $surat2->id_status_surat = 6; // Misalnya, id_status_surat yang sesuai untuk status "approved"
        $surat2->alasan_surat2 = $request->input('alasan');
        $surat2->id_phr = Auth::user()->id_user;
        $surat2->save();
        $users = User::where('id_role', 5)->get();
        $emails = $users->pluck('email')->toArray();
        Mail::to($emails)->send(new NotifEmailAdminDuri($surat2));




        // Redirect ke halaman sebelumnya atau ke halaman lain
        return redirect()->back()->with('success', 'Surat 2 telah disetujui');
    }

    public function reject(Request $request, $id_surat_2_duri)
    {
        // Set status surat menjadi "rejected" (sesuaikan dengan kode status yang sesuai)
        $surat2 = Surat2BukuTamuDuri::findOrFail($id_surat_2_duri);
        $surat2->id_status_surat = 5; // Misalnya, id_status_surat yang sesuai untuk status "rejected"
        $surat2->alasan_surat2 = $request->input('alasan');
        $surat2->id_phr = Auth::user()->id_user;
        $surat2->save();
        $surat2->id_surat_1 = $id_surat_1;
        $surat1 = Surat1BukuTamu::findOrFail($id_surat_1);
        $emailtamu = $surat1->email_tamu;
        Mail::to($emailtamu)->send(new Send($surat1, $surat2));



        // Redirect ke halaman sebelumnya atau ke halaman lain
        return redirect()->back()->with('success', 'Surat 2 telah ditolak');
    }
    public function show($id_surat_2)
    {
        $surat2 = Surat2BukuTamuDuri::with([
            'surat1', 'statusSurat', 'surat1.periode',
            'surat1.lokasi',
            'surat1.tamu',
        ])->find($id_surat_2);

        return view('dashboard.phr.show', compact('surat2'));
    }
}
