<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat2BukuTamuDuri extends Model
{
    use HasFactory;
    protected $table = 'surat_2_buku_tamu_duri';

    protected $primaryKey = 'id_surat_2_duri';

    protected $fillable = [
        'id_surat_1',
        'id_kendaraan',
        'id_tamu',
        'id_phr',
        'id_ga_duri',
        'id_status_surat',
        'id_lokasi',
        'id_periode',
        'kode_unik',
        'alasan_sura2'
    ];

    // Definisi relasi dengan Surat1BukuTamu
    public function surat1()
    {
        return $this->belongsTo(Surat1BukuTamu::class, 'id_surat_1', 'id_surat_1');
    }

    // Definisi relasi dengan KendaraanBukuTamu
    public function kendaraan()
    {
        return $this->belongsTo(KendaraanBukuTamu::class, 'id_kendaraan', 'id_kendaraan');
    }

    // Definisi relasi dengan DataDiriBukuTamu
    // public function tamu()
    // {
    //     return $this->belongsTo(DataDiriBukuTamu::class, 'id_tamu', 'id_tamu');
    // }

    // Definisi relasi dengan User (PHR)
    public function phr()
    {
        return $this->belongsTo(User::class, 'id_phr', 'id_user');
    }

    // Definisi relasi dengan User (GA Duri)
    public function gaDuri()
    {
        return $this->belongsTo(User::class, 'id_ga_duri', 'id_user');
    }

    // Definisi relasi dengan StatusSurat
    public function statusSurat()
    {
        return $this->belongsTo(StatusSurat::class, 'id_status_surat', 'id_status_surat');
    }

    // Definisi relasi dengan LokasiTujuan
    public function LokasiTujuan()
    {
        return $this->belongsTo(LokasiTujuan::class, 'id_lokasi', 'id_lokasi');
    }

    // Definisi relasi dengan PeriodeTamu
    public function periodeTamu()
    {
        return $this->belongsTo(PeriodeTamu::class, 'id_periode', 'id_periode');
    }

    public function periode()
    {
        return $this->belongsTo(Periode::class, 'id_surat_1', 'id_surat_1');
    }
}
