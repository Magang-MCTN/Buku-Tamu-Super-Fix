<!DOCTYPE html>
<html>

<head>
    <title>Pesan Email Notifikasi</title>
</head>

<body>
    <p>Halo, Ada Pengajuan Berkunjung Menemui Anda:</p>

    {{-- <ul>
        <li><strong>Nama Tamu:</strong> {{ $surat1->nama_tamu }}</li>
    <li><strong>Email Tamu:</strong> {{ $surat1->email_tamu }}</li>
    <li><strong>No HP Tamu:</strong> {{ $surat1->no_hp_tamu }}</li>
    <li><strong>Asal Perusahaan:</strong> {{ $surat1->asal_perusahaan }}</li>
    <li><strong>Periode:</strong> {{ $surat1->periode->tanggal_masuk }} - {{ $surat1->periode->tanggal_keluar }}</li>
    <li><strong>Jam Kedatangan:</strong> {{ $surat1->periode->jam_kedatangan }}</li>
    <li><strong>Keperluan:</strong> {{ $surat1->tujuan_keperluan }}</li>
    <li><strong>Daerah Kunjungan:</strong> Ladang Minyak Duri - MCTN</li>
    <li><strong>Alasan:</strong> {{ $surat1->alasan }}</li>
    </ul> --}}

    <a href="http://127.0.0.1:8000/tuanrumah/show/{{ $idsurat1 }}">LIhat Pengajuan</a>

</body>

</html>