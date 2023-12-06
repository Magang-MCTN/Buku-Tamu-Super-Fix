@extends('dashboard/app')

@section('content')
<div class="main-panel">
    <div class="container py-3 px-4">
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <h3 class=fw-bold>Detail Surat</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <td>{{ $surat1->id_surat_1 }}</td>
                            </tr>
                            <tr>
                                <th>Nama Tamu</th>
                                <td>{{ $surat1->nama_tamu }}</td>
                            </tr>
                            <tr>
                                <th>Email Tamu</th>
                                <td>{{ $surat1->email_tamu }}</td>
                            </tr>
                            <tr>
                                <th>No HP Tamu</th>
                                <td>{{ $surat1->no_hp_tamu }}</td>
                            </tr>
                            <tr>
                                <th>Asal Perusahaan</th>
                                <td>{{ $surat1->asal_perusahaan }}</td>
                            </tr>
                            <tr>
                                <th>Periode</th>
                                <td>{{ $surat1->periode->tanggal_masuk->format('d-m-Y') }} s.d. {{ $surat1->periode->tanggal_keluar->format('d-m-Y') }}</td>
                            </tr>
                            <tr>
                                <th>Jam Kedatangan</th>
                                <td>{{ $surat1->periode->jam_kedatangan }}</td>
                            </tr>
                            <tr>
                                <th>Keperluan</th>
                                <td>{{ $surat1->tujuan_keperluan }}</td>
                            </tr>
                            <tr>
                                <th>Daerah Kunjungan</th>
                                <td>{{ $surat1->lokasi->nama_lokasi }}</td>
                            </tr>
                            <tr>
                                <th>Alasan</th>
                                <td>{{ $surat1->alasan_surat1 }}</td>
                            </tr>
                            <tr></tr>
                        </table>
                    </div>
                    <!-- Tampilkan detail lainnya sesuai kebutuhan -->



                    <a href="javascript:history.back()" class="btn btn-primary my-4">Kembali</a>

                <!-- Tampilkan tombol setuju dan tolak jika status pengajuan adalah diajukan -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
