@extends('dashboard.app')

@section('content')
<div class="main-panel">
    <div class="container py-3 px-4">
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <h3 class="fw-bold">IZIN MASUK PT MCTN - KANTOR JAKARTA</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <td>{{ $surat2->id_surat_2 }}</td>
                            </tr>
                            <tr>
                                <th>Nomor Surat</th>
                                <td>{{ $surat2->kode_unik }}</td>
                            </tr>
                            <tr>
                                <th>Asal Perusahaan</th>
                                <td>{{ $surat2->surat1->asal_perusahaan }}</td>
                            </tr>
                            <tr>
                                <th>Periode</th>
                                <td>{{ $surat2->surat1->periode->tanggal_masuk->format('d-m-Y') }} s.d. {{ $surat2->surat1->periode->tanggal_keluar->format('d-m-Y') }}</td>
                            </tr>
                            <tr>
                                <th>Jam Kedatangan</th>
                                <td>{{ explode(' ', $surat2->surat1->periode->jam_kedatangan)[1]  }}</td>
                            </tr>
                            <tr>
                                <th>Tujuan</th>
                                <td>{{ $surat2->surat1->tujuan_keperluan}}</td>
                            </tr>
                            <tr></tr>

                        </table>
                    </div>

                    <!-- Tampilkan detail lainnya sesuai kebutuhan -->
                    <div class="table-responsive my-4">
                        <h3 class="my-4 fw-bold">Data Diri Tamu</h3>
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
                    </div>

                    <div class="d-flex">
                        @if($surat2->id_status_surat === 6)
                            <form action="{{ route('admin.approve', $surat2->id_surat_2) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success me-2" id="btn-approve">Setuju</button>
                            </form>
                        @endif

                        @if($surat2->id_status_surat === 6)
                            <form action="{{ route('admin.reject', $surat2->id_surat_2) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger" id="btn-reject">Tolak</button>
                            </form>
                        @endif
                    </div>

                    <div class="d-flex">
                        <div id="alasan-form" style="display: none;">
                            <form action="{{ route('admin.approve', $surat2->id_surat_2) }}" method="POST">
                                @csrf
                                <div class="form-group my-3 me-3">
                                    <label for="alasan_surat2">Alasan Setuju:</label><br>
                                    <textarea name="alasan_surat2" id="alasan_surat2" cols="40" rows="5" style="border-radius: 5px" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-success">Setuju</button>
                            </form>
                        </div>

                        <div id="alasan-tolak-form" style="display: none;">
                            <form action="{{ route('admin.reject', $surat2->id_surat_2) }}" method="POST">
                                @csrf
                                <div class="form-group my-3 me-3">
                                    <label for="alasan_surat2">Alasan Tolak:</label><br>
                                    <textarea name="alasan_surat2" id="alasan_surat2" cols="40" rows="5" style="border-radius: 5px" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-danger">Tolak</button>
                            </form>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between my-4">
                        <div><a href="{{ route('adminjkt.history') }}" class="btn btn-primary">Kembali</a></div>
                        <div><a href="/cetak-suratjkt/{{$surat2->id_surat_2}}" class="btn btn-primary">Cetak Dokumen</a></div>
                    </div>
                    <!-- <div class="d-flex justify-content-between">
                    </div> -->
                </div>
            </div>
        </div>
    </div>
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
