<?php

namespace App\Http\Controllers;

use App\Models\Surat2BukuTamuDuri;
use Illuminate\Http\Request;

class AdminDuriController extends Controller
{
    public function index()
    {
        $suratToApprove = Surat2BukuTamuDuri::with(['surat1', 'statusSurat'])
            ->where(function ($query) {
                $query->where('id_status_surat', 6)
                    ->orWhere('id_status_surat', 2);
            })
            ->whereHas('surat1', function ($query) {
                $query->where('id_lokasi', 3);
            })
            ->get();

        return view('dashboard.admin_duri.index', compact('suratToApprove'));
    }
    public function persetujuanadminduri()
    {
        $surat1 = Surat2BukuTamuDuri::with(['surat1', 'statusSurat'])
            ->where(function ($query) {
                $query->where('id_status_surat', 6);
            })
            ->whereHas('surat1', function ($query) {
                $query->where('id_lokasi', 3);
            })
            ->get();


        return view('dashboard.admin_duri.persetujuan', compact('surat1'));
    }
    public function historyadminduri()
    {
        $surat1 = Surat2BukuTamuDuri::with(['surat1', 'statusSurat'])
            ->where(function ($query) {
                $query->where('id_status_surat', 2, 3);
            })
            ->whereHas('surat1', function ($query) {
                $query->where('id_lokasi', 3);
            })
            ->get();


        return view('dashboard.admin_duri.history', compact('surat1'));
    }
    public function show($id_surat_2_duri)
    {
        $surat2 = Surat2BukuTamuDuri::with(['surat1', 'statusSurat'])->find($id_surat_2_duri);

        return view('dashboard.admin_duri.show', compact('surat2'));
    }

    public function approve(Request $request, $id)
    {
        // Set status surat menjadi "approved" sesuai dengan kode status yang sesuai
        $surat2 = Surat2BukuTamuDuri::findOrFail($id);
        $surat2->id_status_surat = 2; // Misalnya, id_status_surat yang sesuai untuk status "approved"
        $surat2->alasan_surat2 = $request->input('alasan');
        $surat2->save();

        // Redirect ke halaman sebelumnya atau ke halaman lain
        return redirect()->back()->with('success', 'Surat 2 telah disetujui');
    }

    public function reject(Request $request, $id)
    {
        // Set status surat menjadi "rejected" sesuai dengan kode status yang sesuai
        $surat2 = Surat2BukuTamuDuri::findOrFail($id);
        $surat2->id_status_surat = 3; // Misalnya, id_status_surat yang sesuai untuk status "rejected"
        $surat2->alasan_surat2 = $request->input('alasan');
        $surat2->save();

        // Redirect ke halaman sebelumnya atau ke halaman lain
        return redirect()->back()->with('success', 'Surat 2 telah ditolak');
    }
}
