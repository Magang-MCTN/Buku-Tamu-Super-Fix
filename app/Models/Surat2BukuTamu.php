<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat2BukuTamu extends Model
{
    use HasFactory;
    protected $table = 'surat_2_buku_tamu';
    protected $primaryKey = 'id_surat_2';
    protected $fillable = [
        'id_surat_1',
        'id_kendaraan',
        'id_tamu',

        'id_ga',
        'id_status_surat2',
        'id_lokasi',
        'id_periode',
        'kode_unik',
        'alasan_sura2'
    ];
    public function surat1()
    {
        return $this->belongsTo(Surat1BukuTamu::class, 'id_surat_1', 'id_surat_1');
    }

    public function tamu()
    {
        return $this->belongsTo(DataDiriBukuTamu::class, 'id_tamu', 'id_tamu');
    }

    public function ga()
    {
        return $this->belongsTo(User::class, 'id_ga', 'id_user');
    }

    public function statusSurat()
    {
        return $this->belongsTo(StatusSurat::class, 'id_status_surat2', 'id_status_surat');
    }

    public function lokasi()
    {
        return $this->belongsTo(LokasiTujuan::class, 'id_lokasi', 'id_lokasi');
    }

    public function periode()
    {
        return $this->belongsTo(PeriodeTamu::class, 'id_periode', 'id_periode');
    }
    public function scopeGetStatusCountsByLocation($query, $locationId)
    {
        return $query
            ->whereHas('surat1', function ($query) use ($locationId) {
                $query->where('id_lokasi', $locationId);
            })
            ->selectRaw('
                SUM(CASE WHEN id_status_surat = 2 THEN 1 ELSE 0 END) as disetujui_count,
                SUM(CASE WHEN id_status_surat = 3 THEN 1 ELSE 0 END) as ditolak_count,
                SUM(CASE WHEN id_status_surat = 1 THEN 1 ELSE 0 END) as dalam_proses_count
            ')
            ->first();
    }

    public function scopeGetAllPengajuanByLocation($query, $locationId)
    {
        return $query
            ->whereHas('surat1', function ($query) use ($locationId) {
                $query->where('id_lokasi', $locationId);
            })
            ->get();
    }
}
