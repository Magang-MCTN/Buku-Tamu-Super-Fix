<?php

namespace App\Http\Controllers;

use App\Mail\Send;
use App\Models\DataDiriBukuTamu;
use App\Models\KendaraanBukuTamu;
use App\Models\LokasiTujuan;
use App\Models\Mobil;
use App\Models\PeriodeTamu;
use App\Models\StatusSurat;
use App\Models\Surat1BukuTamu;
use App\Models\Surat2BukuTamu;
use App\Models\Surat2BukuTamuDuri;
use App\Models\User;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
// use Barryvdh\DomPDF\Facades as PDF;

class TamuController extends Controller
{
    public function create()
    {
        $lokasiOptions = LokasiTujuan::all();
        return view('pengajuan', compact('lokasiOptions'));
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'nama_tamu' => 'required',
            'asal_perusahaan' => 'required',
            'email_tamu' => 'required|email',
            'no_hp_tamu' => 'required',
            'nama_pic' => 'required',
            'email_pic' => 'required',
            'tujuan_keperluan' => 'required',
            'nama_lokasi' => 'required',
            // Tambahkan validasi dan kolom lain sesuai kebutuhan
        ]);

        $periode = new PeriodeTamu([
            'tanggal_masuk' => $request->tanggal_masuk,
            'tanggal_keluar' => $request->tanggal_keluar,
            'jam_kedatangan' => $request->jam_kedatangan,
        ]);
        $periode->save();

        // Setelah objek PeriodeTamu disimpan, dapatkan ID periode yang baru saja dibuat
        $id_periode = $periode->id_periode;

        // Kemudian, setel ID periode pada objek Surat1BukuTamu
        $surat1 = new Surat1BukuTamu([
            'id_lokasi' => $request->nama_lokasi, // ID lokasi yang sesuai
            'id_periode' => $id_periode, // ID periode yang sesuai
            'id_status_surat' => 1,
            'nama_pic' => $request->nama_pic,
            'email_pic' => $request->email_pic,
            'tujuan_keperluan' => $request->tujuan_keperluan,
            'nama_tamu' => $request->nama_tamu,
            'asal_perusahaan' => $request->asal_perusahaan,
            'email_tamu' => $request->email_tamu,
            'no_hp_tamu' => $request->no_hp_tamu,
            'tujuan_keperluan' => $request->tujuan_keperluan,
        ]);
        $surat1->save();
        $emailTamu = $surat1->email_pic;
        $idsurat1 = $surat1->id_surat_1;

        // Kirim notifikasi ke alamat email tamu
        Mail::to($emailTamu)->send(new Send($idsurat1));



        return view('terimakasih');


        // Redirect atau berikan pesan sukses
    }
    public function surat2(Request $request)
    {
        $surat1_id = $request->input('surat1_id');
        return view('pengajuan2', compact('surat1_id'));
    }
    public function surat2jkt(Request $request)
    {
        $surat1_id = $request->input('surat1_id');
        return view('pengajuanjkt', compact('surat1_id'));
    }
    public function datatamu(Request $request)
    {
        $this->validate($request, [
            'nama_tamu' => 'required',
            'nik_tamu' => 'required',
            'masa_berlaku_ktp' => 'required',
            'jabatan' => 'required',
            'foto_ktp' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('foto_ktp')) {
            $fotoKtp = $request->file('foto_ktp');
            $namaTamu = $request->nama_tamu; // Ambil nama tamu dari form
            $namaFotoKtp = $namaTamu . '_' . time() . '.' . $fotoKtp->getClientOriginalExtension();
            $fotoKtp->move(public_path('uploads'), $namaFotoKtp);
        }

        // Menggunakan $surat1_id sebagai id_surat_1
        $surat1_id = $request->input('surat1_id'); // Ambil dari permintaan HTTP

        $tamu = new DataDiriBukuTamu([
            'nama_tamu' => $request->nama_tamu,
            'nik_tamu' => $request->nik_tamu,
            'masa_berlaku_ktp' => $request->masa_berlaku_ktp,
            'jabatan' => $request->jabatan,
            'foto_ktp' => $namaFotoKtp, // Gunakan nama foto yang Anda simpan
            'id_surat_1' => $surat1_id, // Gunakan $surat1_id sebagai id_surat_1
        ]);

        $tamu->save();
        return redirect()->route('/');
    }

    public function simpanTamu(Request $request)
    {
        // Ambil data tamu dari permintaan
        $request->validate([
            'dataTamu' => 'required|array',
            'dataTamu.*.nama_tamu' => 'required|string',
            'dataTamu.*.nik_tamu' => 'required|string',
            'dataTamu.*.masa_berlaku_ktp' => 'required|string',
            'dataTamu.*.jabatan' => 'required|string',
            'dataTamu.*.foto_ktp' => 'required|file|image|mimes:jpeg,png,jpg,gif|max:2048',
            'dataTamu.*.id_surat_1' =>  'required|string',
        ]);

        $dataTersimpan = 0;

        foreach ($request->input('dataTamu', []) as $key => $tamuData) {
            $file = $request->file("dataTamu.$key.foto_ktp");
            $namaTamu = $request->nama_tamu;
            $namaFotoKtp = $namaTamu . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $namaFotoKtp);

            $tamuBaru = new DataDiriBukuTamu([
                'nama_tamu' => $tamuData['nama_tamu'],
                'nik_tamu' => $tamuData['nik_tamu'],
                'masa_berlaku_ktp' => $tamuData['masa_berlaku_ktp'],
                'jabatan' => $tamuData['jabatan'],
                'foto_ktp' => $namaFotoKtp,
                'id_surat_1' => $tamuData['id_surat_1'],
            ]);

            // Simpan data tamu ke dalam database
            if ($tamuBaru->save()) {
                $dataTersimpan++;
            }
        }


        return redirect()->route('pilih.kendaraan');
    }
    public function simpanTamukantor(Request $request)
    {
        // Ambil data tamu dari permintaan
        $request->validate([
            'dataTamu' => 'required|array',
            'dataTamu.*.nama_tamu' => 'required|string',
            'dataTamu.*.jabatan' => 'required|string',
            'dataTamu.*.id_surat_1' =>  'required|string',
        ]);

        $dataTersimpan = 0;

        foreach ($request->input('dataTamu', []) as $key => $tamuData) {
            $tamuBaru = new DataDiriBukuTamu([
                'nama_tamu' => $tamuData['nama_tamu'],
                'jabatan' => $tamuData['jabatan'],
                'id_surat_1' => $tamuData['id_surat_1'],
            ]);

            // Simpan data tamu ke dalam database
            if ($tamuBaru->save()) {
                $dataTersimpan++;
            }
        }

        try {
            // Ambil id_surat_1 dari data pertama, karena di sini diasumsikan id_surat_1 semua sama
            $surat1_id = $request->input('dataTamu.0.id_surat_1');

            // Membuat kode unik
            $kode_unik = 'MCTN' . date('Ymd') . $surat1_id;

            // Membuat baris baru di tabel surat 2
            $surat2 = new Surat2BukuTamu();
            $surat2->id_surat_1 = $surat1_id;
            $surat2->id_ga = null;
            $surat2->id_status_surat = 6;
            $surat2->kode_unik = $kode_unik;
            $surat2->save();

            return redirect('/kode-unik/' . $surat1_id);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

        return redirect()->back();
    }

    public function pilihKendaraan(Request $request)
    {

        $surat1_id = $request->input('surat1_id');

        return view('pilih-kendaraan', compact('surat1_id'));
    }
    public function pengawalan(Request $request)
    {
        $surat1_id = $request->input('surat1_id');
        $pengawalan = $request->input('pengawalan');

        // Validasi: Periksa apakah objek $surat1 ditemukan
        $surat1 = Surat1BukuTamu::where('id_surat_1', $surat1_id)->first();



        // Lakukan penyimpanan data ke database
        $surat1->pengawalan = $pengawalan;
        $surat1->save();

        // Respond dengan pesan sukses
        return redirect('/kendaraan?surat1_id=' . $surat1_id);
    }

    public function kendaraan(Request $request)
    {
        $surat1_id = $request->input('surat1_id');
        return view('kendaraan', compact('surat1_id'));
    }
    public function dijemput(Request $request)
    {
        try {
            $surat1_id = $request->input('surat1_id');

            // Ambil id_surat_1 yang sesuai dari tabel surat 1

            // Membuat kode unik
            $kode_unik = 'MCTN' . date('Ymd') . $surat1_id;

            // Membuat baris baru di tabel surat 2
            $surat2 = new Surat2BukuTamuDuri();
            $surat2->id_surat_1 = $surat1_id;
            $surat2->id_phr = null; // Misalnya null, jika diisi nanti setelah PHR approve
            $surat2->id_ga_duri = null; // Misalnya null, jika diisi nanti
            $surat2->id_status_surat = 1; // Misalnya 1 (Anda dapat menyesuaikan)
            $surat2->kode_unik = $kode_unik;
            $surat2->save();

            // $redirectUrl = '/kode-unik/' . $surat1_id;
            // return redirect('/kode-unik/'+{$surat1_id});
            return redirect('/kode-unik/' . $surat1_id);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500); // Mengirim pesan kesalahan sebagai respons JSON
        }
    }


    // } else {
    //     // Handle kasus di mana $dataTamu kosong atau tidak valid
    //     return response()->json(['error' => 'Data tamu tidak valid.']);
    // }

    public function simpanKendaraan(Request $request)
    {
        $request->validate([
            'datakendaraan' => 'required|array',
            'datakendaraan.*.id_surat_1' =>  'required|string',
            'datakendaraan.*.tipe_mobil' => 'required|string',
            'datakendaraan.*.warna' => 'required|string',
            'datakendaraan.*.nomor_polisi' => 'required|string',
            'datakendaraan.*.nama_supir' => 'required|string',
            'datakendaraan.*.masa_berlaku_stnk' => 'required|string',
            'datakendaraan.*.masa_berlaku_kir' => '',
            'datakendaraan.*.masa_berlaku_sim' => 'required|string',
            'datakendaraan.*.foto_kendaraan' => 'required|file|image|mimes:jpeg,png,jpg,gif|max:2048',
            'datakendaraan.*.foto_stnk' => 'required|file|image|mimes:jpeg,png,jpg,gif|max:2048',
            'datakendaraan.*.foto_sim' => 'required|file|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $dataTersimpan = 0;

        foreach ($request->input('datakendaraan', []) as $key => $kendaraanData) {
            $fileKendaraan = $request->file("datakendaraan.$key.foto_kendaraan");
            $fileStnk = $request->file("datakendaraan.$key.foto_stnk");
            $fileSim = $request->file("datakendaraan.$key.foto_sim");
            $nomor = $request->nomor_polisi;
            $namafotoKendaraan = $nomor . time() . '_kendaraan.' . $fileKendaraan->getClientOriginalExtension();
            $fileKendaraan->move(public_path('uploads'), $namafotoKendaraan);

            $namafotoStnk = $nomor . time() . '_stnk.' . $fileStnk->getClientOriginalExtension();
            $fileStnk->move(public_path('uploads'), $namafotoStnk);

            $namafotoSim = $nomor . time() . '_sim.' . $fileSim->getClientOriginalExtension();
            $fileSim->move(public_path('uploads'), $namafotoSim);

            $dataKendaraan = new KendaraanBukuTamu([
                'id_surat_1' => $kendaraanData['id_surat_1'],
                'tipe_mobil' => $kendaraanData['tipe_mobil'],
                'warna' => $kendaraanData['warna'],
                'nomor_polisi' => $kendaraanData['nomor_polisi'],
                'masa_berlaku_stnk' => $kendaraanData['masa_berlaku_stnk'],
                'foto_stnk' => $namafotoStnk,
                // 'pengawalan' => $kendaraanData['pengawalan'],
                'nama_supir' => $kendaraanData['nama_supir'],
                'masa_berlaku_kir' => $kendaraanData['masa_berlaku_kir'],
                'masa_berlaku_sim' => $kendaraanData['masa_berlaku_sim'],
                'foto_sim' => $namafotoSim,
                'foto_kendaraan' => $namafotoKendaraan,
            ]);

            if ($dataKendaraan->save()) {
                $dataTersimpan++;
            }
        }
        $id_surat_1 = $kendaraanData['id_surat_1']; // Ambil id_surat_1 yang sesuai dari tabel surat 1

        // Membuat kode unik
        $kode_unik = 'MCTN' . date('Ymd') . $kendaraanData['id_surat_1'];

        // Membuat baris baru di tabel surat 2
        $surat2 = new Surat2BukuTamuDuri();
        $surat2->id_surat_1 = $id_surat_1;
        $surat2->id_phr = null; // Misalnya null, jika diisi nanti setelah PHR approve
        $surat2->id_ga_duri = null; // Misalnya null, jika diisi nanti
        $surat2->id_status_surat = 1; // Misalnya 1 (Anda dapat menyesuaikan)
        $surat2->kode_unik = $kode_unik;
        $surat2->save();

        if ($dataTersimpan > 0) {
            return redirect()->route('tamu.create')->with('success', 'Data kendaraan berhasil disimpan.');
        }

        return redirect()->route('tamu.create')->with('error', 'Tidak ada data kendaraan yang disimpan.');
    }
    public function tampilKodeUnik($id)
    {
        // Mengambil kode unik dari tabel Surat 2 berdasarkan ID Surat 1

        $kodeUnik = DB::table('surat_2_buku_tamu_duri')
            ->where('id_surat_1', $id)
            ->value('kode_unik');

        $kodeUnikkantor = DB::table('surat_2_buku_tamu')
            ->where('id_surat_1', $id)
            ->value('kode_unik');

        return view('kode_unik', ['kodeUnik' => $kodeUnik], ['kodeUnikkantor' => $kodeUnikkantor]);
    }

    public function cariStatus(Request $request)
    {
        $request->validate([
            'kode_unik' => 'required',
        ]);

        $kode_unik = $request->input('kode_unik');

        // Cari status berdasarkan kode unik
        $status = Surat2BukuTamuDuri::with(['statusSurat', 'surat1.lokasi'])
            ->where('kode_unik', $kode_unik)
            ->get(); // Mengambil satu set data

        $statuss = Surat2BukuTamu::with(['statusSurat', 'surat1.lokasi'])
            ->where('kode_unik', $kode_unik)
            ->get(); // Mengambil satu set data

        return view('hasil_pencarian', compact('status', 'statuss'));
    }
    public function status()
    {
        return view('status'); // Nama view yang menampilkan form pencarian status
    }

    public function show($id_surat_2_duri)
    {
        $surat2 = Surat2BukuTamuDuri::with([
            'surat1.periode',
            'surat1.lokasi',
            'surat1.tamu',
            'surat1.kendaraan'
        ])->find($id_surat_2_duri);

        return view('lihat-surat', compact('surat2'));
    }
    public function showjkt($id_surat_2)
    {
        $surat2 = Surat2BukuTamu::with([
            'surat1.periode',
            'surat1.lokasi',
            'surat1.tamu',
            'surat1.kendaraan'
        ])->find($id_surat_2);

        return view('lihat-suratkantor', compact('surat2'));
    }
    public function showpku($id_surat_2)
    {
        $surat2 = Surat2BukuTamu::with([
            'surat1.periode',
            'surat1.lokasi',
            'surat1.tamu',
            'surat1.kendaraan'
        ])->find($id_surat_2);

        return view('lihat-suratpku', compact('surat2'));
    }

    public function cetakSurat(Request $request, $id_surat_2_duri)
    {
        $surat2 = Surat2BukuTamuDuri::find($id_surat_2_duri);

        if ($surat2) {
            $pdf = PDF::loadview('cetak-surat', compact('surat2'));


            return $pdf->stream('surat.pdf'); // Menampilkan PDF dalam browser
        } else {
            return abort(404); // Atau tindakan lain jika data tidak ditemukan
        }
    }
    public function cetakSuratjkt(Request $request, $id_surat_2)
    {
        $surat2 = Surat2BukuTamu::find($id_surat_2);

        if ($surat2) {
            $pdf = PDF::loadview('cetak-suratkantor', compact('surat2'));


            return $pdf->stream('surat.pdf'); // Menampilkan PDF dalam browser
        } else {
            return abort(404); // Atau tindakan lain jika data tidak ditemukan
        }
    }

    public function upsurat2(Request $request, $id)
    {

        $surat2 = Surat2BukuTamu::all();
        $id->id_surat_1;
        // Validasi data Surat 2
        $this->validate($request, [

            'nama_tamu' => 'required',
            'nik_tamu' => 'required',
            'masa_berlaku_ktp' => 'required',
            'jabatan' => 'required',

            'foto_ktp' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk foto KTP
            'bawa_kendaraan' => 'required|boolean',
            'tipe_mobil' => 'required_if:bawa_kendaraan,true', // Hanya validasi jika membawa kendaraan
            'warna' => 'required_if:bawa_kendaraan,true', // Hanya validasi jika membawa kendaraan
            'nomor_polisi' => 'required_if:bawa_kendaraan,true', // Hanya validasi jika membawa kendaraan
            'masa_berlaku_stnk' => 'required_if:bawa_kendaraan,true', // Hanya validasi jika membawa kendaraan
            'foto_stnk' => 'required_if:bawa_kendaraan,true', // Hanya validasi jika membawa kendaraan
            'pengawalan' => 'required_if:bawa_kendaraan,true|boolean', // Hanya validasi jika membawa kendaraan
            'nama_sopir' => 'required_if:bawa_kendaraan,true', // Hanya validasi jika membawa kendaraan
            'foto_sim' => 'required_if:bawa_kendaraan,true',
            'foto_kendaraan' => 'required_if:bawa_kendaraan,true',
            'masa_berlaku_kir' => '', // Hanya validasi jika membawa kendaraan
        ]);
        if ($request->hasFile('foto_ktp')) {
            $fotoKtp = $request->file('foto_ktp');
            $namaFotoKtp = time() . '.' . $fotoKtp->getClientOriginalExtension();
            $fotoKtp->move(public_path('uploads'), $namaFotoKtp);
        }
        if ($request->hasFile('foto_stnk')) {
            $fotostnk = $request->file('foto_stnk');
            $namaFotostnk = time() . '.' . $fotostnk->getClientOriginalExtension();
            $fotoKtp->move(public_path('uploads'), $namaFotostnk);
        }
        if ($request->hasFile('foto_sim')) {
            $fotosim = $request->file('foto_sim');
            $namaFotosim = time() . '.' . $fotosim->getClientOriginalExtension();
            $fotosim->move(public_path('uploads'), $namaFotosim);
        }
        if ($request->hasFile('foto_kendaraan')) {
            $fotokendaraan = $request->file('foto_kendaraan');
            $namaFotokendaraan = time() . '.' . $fotokendaraan->getClientOriginalExtension();
            $fotokendaraan->move(public_path('uploads'), $namaFotokendaraan);
        }

        $tamu = new DataDiriBukuTamu([

            'nama_tamu' => $request->nama_tamu,
            'nik_tamu' => $request->nik_tamu,
            'masa_berlaku_ktp' => $request->masa_berlaku_ktp,
            'jabatan' => $request->jabatan,
            'foto_ktp' => $request->namaFotoKtp,
            'id_surat_1' => $id,
        ]);
        $tamu->save();

        // Jika tamu membawa kendaraan, simpan data kendaraan
        if ($request->input('bawa_kendaraan')) {
            $mobil = new Mobil([
                'tipe_mobil' => $request->tipe_mobil,
                'warna' => $request->warna,
                'nomor_polisi' => $request->nomor_polisi,
                'masa_berlaku_stnk' => $request->masa_berlaku_stnk,
                'foto_stnk' => $request->namaFotostnk,
                'id_surat_1' => $id,
            ]);
            $mobil->save();
            $id_mobil = $mobil->id_mobil;
            $kendaraan = new KendaraanBukuTamu([
                'pengawalan' => $request->pengawalan,
                'id_mobil' => $id_mobil,
                'nama_sopir' => $request->nama_sopir,
                'masa_berlaku_kir' => $request->masa_berlaku_kir,
                'masa_berlaku_sim' => $request->masa_berlaku_sim,
                'foto_sim' => $request->namaFotosim,
                'foto_kendaraan' => $request->namaFotokendaraan,
                'id_tamu' => $tamu->id, // Gunakan ID tamu yang sudah disimpan
            ]);
            $kendaraan->save();
        }


        // Simpan Surat 2
        $surat2 = new Surat2BukuTamu;
        $surat2->id_surat_1 = $id;
        $surat2->id_kendaraan = $id;
        $surat2->id_tamu = $id;
        $surat2->id_ga_duri = null;
        $surat2->id_phr = null;
        $surat2->id_status_surat = 6;

        $randomNumber = mt_rand(1, 1000);
        $kodeUnik = "MCTN-$surat2->id_surat_2-$randomNumber";
        $surat2->kode_unik = $kodeUnik;
        $surat2->save();

        return redirect()->route('surat2.index')->with('success', 'Surat 2 berhasil disimpan.');
    }
}
