<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminJKTController extends Controller
{
    public function index()
    {
        $suratToApprove = Surat2BukuTamuDuri::with(['surat1', 'statusSurat'])
            ->where('id_status_surat', 6)
            ->get();

        return view('dashboard.admin_duri.index', compact('suratToApprove'));
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