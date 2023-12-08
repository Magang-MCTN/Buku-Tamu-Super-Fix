<?php

namespace App\Http\Controllers;

use App\Mail\aprovedpic;
use App\Mail\aprovejkt;
use App\Mail\Izin_Masuk_MCTN;
use App\Mail\Izin_masuk_MCTN_DURI;
use App\Mail\Izin_Masuk_Tamu;
use App\Mail\IzinMasukTamu;
use App\Mail\IzinMasukTamuDuri;
use App\Mail\Send;
use App\Models\LokasiTujuan;
use App\Models\PeriodeTamu;
use App\Models\StatusSurat;
use App\Models\Surat1BukuTamu;
use App\Notifications\Approve;
use App\Notifications\MyNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TuanRumahController extends Controller
{
    public function index(Request $request)
    {
        $emailTuanRumah = auth()->user()->email;
        $statusCounts = Surat1BukuTamu::GetStatusCounts($emailTuanRumah);
        $tanggalMulai = $request->input('tanggal_masuk');
        $tanggalSelesai = $request->input('tanggal_keluar');
        // Menggunakan model scope untuk mendapatkan semua pengajuan sesuai dengan email PIC atau email tamu yang sedang login
        $allPengajuan = Surat1BukuTamu::GetAllPengajuan($emailTuanRumah);
        $surat1 = Surat1BukuTamu::with(['lokasi', 'periode', 'statusSurat'])
            ->where('email_pic', $emailTuanRumah)
            ->where('id_status_surat', 1)
            ->select('id_surat_1', 'id_lokasi', 'id_periode', 'id_status_surat', 'nama_tamu', 'asal_perusahaan', 'email_tamu', 'no_hp_tamu', 'tujuan_keperluan')
            ->paginate(5);

        $totalPengajuan = $allPengajuan->count();
        if ($tanggalMulai && $tanggalSelesai) {
            $allPengajuan = $allPengajuan
                ->whereBetween('tanggal_masuk', [$tanggalMulai, $tanggalSelesai]);
        }
        return view('dashboard.home',  compact('statusCounts', 'totalPengajuan', 'surat1'));
    }
    public function persetujuan()
    {
        $emailTuanRumah = auth()->user()->email;
        $surat1 = Surat1BukuTamu::with(['lokasi', 'periode', 'statusSurat'])
            ->select('id_surat_1', 'id_lokasi', 'id_periode', 'id_status_surat', 'nama_tamu', 'asal_perusahaan', 'email_tamu', 'no_hp_tamu', 'tujuan_keperluan')
            ->where('id_status_surat', 1)
            ->where('email_pic', $emailTuanRumah)
            ->paginate(5);

        return view('dashboard.persetujuan', ['surat1' => $surat1]);
    }
    public function cari(Request $request)
    {
        $search = $request->input('search');
        $statusSurat = $request->input('status_surat');
        $emailTuanRumah = auth()->user()->email;

        $surat1 = Surat1BukuTamu::with(['lokasi', 'periode', 'statusSurat'])
            ->select('id_surat_1', 'id_lokasi', 'id_periode', 'id_status_surat', 'nama_tamu', 'asal_perusahaan', 'email_tamu', 'no_hp_tamu', 'tujuan_keperluan')
            ->where('id_status_surat', 1)
            ->when($search, function ($query) use ($search) {
                $query->where('nama_tamu', 'like', '%' . $search . '%');
            })
            ->where('email_pic', $emailTuanRumah)
            ->paginate(5);

        return view('dashboard.persetujuan', ['surat1' => $surat1]);
    }
    public function history()
    {
        $statusSurat = null;
        $emailTuanRumah = auth()->user()->email;
        $surat1 = Surat1BukuTamu::with(['lokasi', 'periode', 'statusSurat'])
            ->select('id_surat_1', 'id_lokasi', 'id_periode', 'id_status_surat', 'nama_tamu', 'asal_perusahaan', 'email_tamu', 'no_hp_tamu', 'tujuan_keperluan')
            ->whereIn('id_status_surat', [2, 3])
            ->where('email_pic', $emailTuanRumah)
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('dashboard.history', compact('surat1', 'statusSurat'));
    }

    public function carihistory(Request $request, $filter = null)
    {
        $search = $request->input('search');
        $statusSurat = $request->input('status_surat');
        $emailTuanRumah = auth()->user()->email;

        $surat1 = Surat1BukuTamu::with(['lokasi', 'periode', 'statusSurat'])
            ->select('id_surat_1', 'id_lokasi', 'id_periode', 'id_status_surat', 'nama_tamu', 'asal_perusahaan', 'email_tamu', 'no_hp_tamu', 'tujuan_keperluan')
            ->where(function ($query) use ($statusSurat) {
                if ($statusSurat) {
                    $query->where('id_status_surat', $statusSurat);
                }
            })
            ->where('nama_tamu', 'like', '%' . $search . '%')
            ->where('email_pic', $emailTuanRumah) // Tambahkan kondisi ini
            ->orderBy('created_at', 'desc')
            ->get();

        return view('dashboard.history2', compact('surat1', 'statusSurat'));
    }
    public function show($id)
    {
        // Ambil data Surat1BukuTamu berdasarkan $id
        $surat1 = Surat1BukuTamu::findOrFail($id);

        // Kembalikan view untuk menampilkan detail Surat1BukuTamu
        return view('dashboard.tuanrumah.show', compact('surat1'));
    }
    public function lihathistori($id)
    {
        // Ambil data Surat1BukuTamu berdasarkan $id
        $surat1 = Surat1BukuTamu::findOrFail($id);

        // Kembalikan view untuk menampilkan detail Surat1BukuTamu
        return view('dashboard.tuanrumah.lihathistory', compact('surat1'));
    }

    public function delete($id)
    {
        // Hapus data Surat1BukuTamu berdasarkan $id
        $surat1 = Surat1BukuTamu::findOrFail($id);
        $surat1->delete();

        // Redirect ke halaman sebelumnya atau ke halaman lain
        return redirect()->back()->with('success', 'Data Surat 1 telah dihapus');
    }
    public function test()
    {

        Mail::to('rifqiakmal2001@gmail.com')->send(new Send);
        return 'Berhasil';
        // $user = Surat1BukuTamu::where('email_tamu', 'rifqiakmal2001@gmail.com')->first();

        // if ($user) {
        //     $user->notify(new MyNotification());
        //     return 'Test email notification sent.';
        // }

        // return 'User not found.';
    }
    public function approve(Request $request, $id)
    {
        // Set status surat menjadi "approved" (sesuaikan dengan kode status yang sesuai)
        $surat1 = Surat1BukuTamu::findOrFail($id);
        $surat1->id_status_surat = 2; // Misalnya, id_status_surat yang sesuai untuk status "approved"
        $surat1->alasan_surat1 = $request->input('alasan');
        $surat1->id_user = auth()->user()->id;
        $surat1->save();

        // Ambil alamat email tamu dari Surat 1
        $emailTamu = $surat1->email_tamu;
        $surat1_id = $id;

        // Tambahkan kondisi untuk menentukan jenis notifikasi berdasarkan $surat1->id_lokasi
        if ($surat1->id_lokasi == 1 || $surat1->id_lokasi == 2) {
            // Kirim notifikasi ke alamat email tamu dengan tipe aprovedpicjkt
            Mail::to($emailTamu)->send(new IzinMasukTamu($surat1_id));
        } elseif ($surat1->id_lokasi == 3) {
            // Kirim notifikasi ke alamat email tamu dengan tipe aprovedpic
            Mail::to($emailTamu)->send(new IzinMasukTamuDuri($surat1_id));
        }

        // Redirect ke halaman sebelumnya atau ke halaman lain
        return redirect()->back()->with('success', 'Surat 1 telah disetujui');
    }

    public function reject(Request $request, $id)
    {
        // Set status surat menjadi "rejected" (sesuaikan dengan kode status yang sesuai)
        $surat1 = Surat1BukuTamu::findOrFail($id);
        $surat1->id_status_surat = 3; // Misalnya, id_status_surat yang sesuai untuk status "rejected"
        $surat1->alasan_surat1 = $request->input('alasan');
        $surat1->save();
        $emailTamu = $surat1->email_tamu;

        // Kirim notifikasi ke alamat email tamu
        Mail::to($emailTamu)->send(new Send($surat1));

        // Redirect ke halaman sebelumnya atau ke halaman lain
        return redirect()->back()->with('success', 'Surat 1 telah ditolak');
    }
}
