<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Surat1BukuTamu extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'surat_1_buku_tamu';

    protected $primaryKey = 'id_surat_1';

    protected $fillable = [
        'id_lokasi',
        'id_periode',
        'id_status_surat',
        'id_user',
        'nama_tamu',
        'asal_perusahaan',
        'email_tamu',
        'no_hp_tamu',
        'tujuan_keperluan',
        'nama_pic',
        'email_pic',
        'pengawalan',
    ];

    public function lokasi()
    {
        return $this->belongsTo(LokasiTujuan::class, 'id_lokasi', 'id_lokasi');
    }

    public function periode()
    {
        return $this->belongsTo(PeriodeTamu::class, 'id_periode', 'id_periode');
    }

    public function statusSurat()
    {
        return $this->belongsTo(StatusSurat::class, 'id_status_surat', 'id_status_surat');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
    public function tamu()
    {
        return $this->hasMany(DataDiriBukuTamu::class, 'id_surat_1', 'id_surat_1');
    }
    public function kendaraan()
    {
        return $this->hasMany(KendaraanBukuTamu::class, 'id_surat_1', 'id_surat_1');
    }
    public function files()
    {
        return $this->hasMany(DataDiriBukuTamu::class, 'id_surat_1', 'id_surat_1');
    }
    public function scopeGetStatusCounts($query, $email)
    {
        return $query
            ->where('email_pic', $email)
            ->selectRaw('
                SUM(CASE WHEN id_status_surat = 2 THEN 1 ELSE 0 END) as disetujui_count,
                SUM(CASE WHEN id_status_surat = 3 THEN 1 ELSE 0 END) as ditolak_count,
                SUM(CASE WHEN id_status_surat = 1 THEN 1 ELSE 0 END) as dalam_proses_count
            ')
            ->first();
    }
    public function scopeGetAllPengajuan($query, $email)
    {
        return $query
            ->where(function ($query) use ($email) {
                $query->where('email_pic', $email);
            })
            ->get();
    }
    // DataDiriBukuTamu.php


}
