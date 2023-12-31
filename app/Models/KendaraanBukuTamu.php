<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KendaraanBukuTamu extends Model
{
    use HasFactory;
    protected $table = 'kendaraan_buku_tamu';

    protected $primaryKey = 'id_kendaraan';

    protected $fillable = [

        'pengawalan',
        'nama_supir',
        'masa_berlaku_kir',
        'masa_berlaku_sim',
        'foto_sim',
        'foto_kendaraan',
        'tipe_mobil',
        'warna',
        'nomor_polisi',
        'masa_berlaku_stnk',
        'foto_stnk',
        'id_surat_1'
    ];

    // Definisi relasi dengan Surat2BukuTamuDuri jika diperlukan


    // Definisi relasi dengan Mobil
    public function surat1()
    {
        return $this->belongsTo(Surat1BukuTamu::class, 'id_surat_1', 'id_surat_1');
    }
}
