@extends('dashboard.app')

@section('content')
<div class="container">
    <h3><strong> IZIN MASUK PT MCTN - KANTOR JAKARTA</h3></strong>
    <p>ID: {{ $surat2->id_surat_2 }}</p>
    <p>Kode Unik: {{ $surat2->kode_unik}}</p>
    <p>Asal Perusahaan: {{ $surat2->surat1->asal_perusahaan }}</p>
    <p>Tujuan: {{ $surat2->surat1->tujuan_keperluan }}</p>
    <p>Periode: {{ $surat2->surat1->periode->tanggal_masuk }} - {{ $surat2->surat1->periode->tanggal_keluar }}</p>
    <p>Jam Kedatangan: {{ $surat2->surat1->periode->jam_kedatangan }}</p>
    <!-- Tampilkan detail lainnya sesuai kebutuhan -->
    <h2 class="my-4">Data Diri Tamu</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>

                <th>Jabatan</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($surat2->surat1->tamu as $tamu)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $tamu->nama_tamu }}</td>

                <td>{{ $tamu->jabatan }}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex">
        @if($surat2->id_status_surat === 6)
            <form action="{{ route('adminpku.approve', $surat2->id_surat_2) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success me-2" id="btn-approve">Setuju</button>
            </form>
        @endif

        @if($surat2->id_status_surat === 6)
            <form action="{{ route('adminpku.reject', $surat2->id_surat_2) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger" id="btn-reject">Tolak</button>
            </form>
        @endif
    </div>

    <div class="d-flex">
        <div id="alasan-form" style="display: none;">
            <form action="{{ route('adminpku.approve', $surat2->id_surat_2) }}" method="POST">
                @csrf
                <div class="form-group my-3 me-3">
                    <label for="alasan_surat2">Alasan Setuju:</label><br>
                    <textarea name="alasan_surat2" id="alasan_surat2" cols="40" rows="5" style="border-radius: 5px" required></textarea>
                </div>
                <button type="submit" class="btn btn-success">Setuju</button>
            </form>
        </div>

        <div id="alasan-tolak-form" style="display: none;">
            <form action="{{ route('adminpku.reject', $surat2->id_surat_2) }}" method="POST">
                @csrf
                <div class="form-group my-3 me-3">
                    <label for="alasan_surat2">Alasan Tolak:</label><br>
                    <textarea name="alasan_surat2" id="alasan_surat2" cols="40" rows="5" style="border-radius: 5px" required></textarea>
                </div>
                <button type="submit" class="btn btn-danger">Tolak</button>
            </form>
        </div>
    </div>

    <a href="{{ route('adminpku.dashboard') }}" class="btn btn-primary my-4">Kembali</a>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const btnApprove = document.getElementById('btn-approve');
        const btnReject = document.getElementById('btn-reject');
        const alasanForm = document.getElementById('alasan-form');
        const alasanTolakForm = document.getElementById('alasan-tolak-form');

        btnApprove.addEventListener('click', function(e) {
            e.preventDefault();
            if (alasanForm.style.display === 'block') {
                alasanForm.style.display = 'none'; // Sembunyikan tampilan alasan setuju jika sudah terbuka
            } else {
                alasanForm.style.display = 'block'; // Tampilkan tampilan alasan setuju jika belum terbuka
                alasanTolakForm.style.display = 'none'; // Sembunyikan tampilan alasan tolak jika terbuka
            }
        });

        btnReject.addEventListener('click', function(e) {
            e.preventDefault();
            if (alasanTolakForm.style.display === 'block') {
                alasanTolakForm.style.display = 'none'; // Sembunyikan tampilan alasan tolak jika sudah terbuka
            } else {
                alasanTolakForm.style.display = 'block'; // Tampilkan tampilan alasan tolak jika belum terbuka
                alasanForm.style.display = 'none'; // Sembunyikan tampilan alasan setuju jika terbuka
            }
        });
    });
</script>
@endsection
