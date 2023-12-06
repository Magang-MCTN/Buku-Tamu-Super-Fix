@extends('dashboard/app')

@section('content')

<div class="container">
    <div class="card m-3">
        <div class="card-body m-4">
            <div class="container">
                <h3 class="mb-4 fw-bold">FORM IZIN MASUK PT MCTN</h3>
                <p class="my-2"><strong>Asal Perusahaan:</strong> {{ $surat2->surat1->asal_perusahaan }}</p>
                <p class="my-2"><strong>Tujuan:</strong> {{ $surat2->surat1->tujuan_keperluan }}</p>
                <p class="my-2"><strong>Periode:</strong> {{ $surat2->surat1->periode->tanggal_masuk->format('d-m-Y') }} s.d. {{ $surat2->surat1->periode->tanggal_keluar->format('d-m-Y') }}</p>
                <p class="my-2"><strong>Jam Kedatangan:</strong>{{ explode(' ', $surat2->surat1->periode->jam_kedatangan)[1] }}</p>
                <p class="my-2"><strong>Lokasi Tujuan:</strong>Ladang Minyak Duri - MCTN</p>

                <h4 class="fw-bold mt-4">Data Diri Tamu</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIK</th>
                                <th>Tanggal Masa Berlaku</th>
                                <th>Jabatan</th>
                                <th>Foto KTP</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($surat2->surat1->tamu as $tamu)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $tamu->nama_tamu }}</td>
                                <td>{{ $tamu->nik_tamu }}</td>
                                <td>{{ $tamu->masa_berlaku_ktp }}</td>
                                <td>{{ $tamu->jabatan }}</td>
                                <td><a href="{{ asset('uploads/' . $tamu->foto_ktp) }}" target="_blank">Lihat Foto KTP</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <h4 class="fw-bold mt-4">Data Kendaraan</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tipe Mobil</th>
                                <th>Warna</th>
                                <th>No Polisi</th>
                                <th>Nama Supir</th>
                                <th>Masa Berlaku STNK</th>
                                <th>Masa Berlaku KIR</th>
                                <th>Masa Berlaku SIM</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($surat2->surat1->kendaraan->isEmpty())
                                <tr>
                                    <td colspan="11">TIDAK MEMBAWA KENDARAAN</td>
                                </tr>
                            @else
                                @foreach ($surat2->surat1->kendaraan as $kendaraan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $kendaraan->tipe_mobil }}</td>
                                    <td>{{ $kendaraan->warna }}</td>
                                    <td>{{ $kendaraan->no_polisi }}</td>
                                    <td>{{ $kendaraan->nama_supir }}</td>
                                    <td>{{ $kendaraan->masa_berlaku_stnk }}</td>
                                    <td>{{ $kendaraan->masa_berlaku_kir }}</td>
                                    <td>{{ $kendaraan->masa_berlaku_sim }}</td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

                <h4 class="fw-bold mt-4">Foto</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto Kendaraan</th>
                                    <th>Foto STNK</th>
                                    <th>Foto SIM</th>
                                </tr>
                            </thead>
                            <tr>

                                @if ($surat2->surat1->kendaraan->isEmpty())
                                <td colspan="4">TIDAK MEMBAWA KENDARAAN</td>
                                @else
                                @foreach ($surat2->surat1->kendaraan as $kendaraan)
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <a href="{{ asset('uploads/' . $kendaraan->foto_kendaraan) }}" target="_blank">Lihat Foto Kendaraan</a>

                                </td>
                                <td>
                                    <a href="{{ asset('uploads/' . $kendaraan->foto_stnk) }}" target="_blank">Lihat Foto STNK</a>

                                </td>
                                <td>
                                    <a href="{{ asset('uploads/' . $kendaraan->foto_sim) }}" target="_blank">Lihat Foto SIM</a>

                                </td>
                                @endforeach
                                @endif

                            </tr>

                        </table>
                    </div>

                <h4 class="fw-bold mt-4">Kendaraan</h4>
                @if ($surat2->surat1->kendaraan->isNotEmpty())
                <div class="ms-5">
                    <div class="me-5 form-check">
                        <input type="checkbox" class="form-check-input" id="kendaraan" checked disabled>
                        <label class="form-check-label" for="kendaraan">Membawa Kendaraan Pribadi</label>
                        <input type="checkbox" class="form-check-input" id="kendaraan" disabled>
                        <label class="form-check-label" for="kendaraan">Dijemput MCTN</label>
                    </div>
                </div>
                @else
                <div class="ms-5">
                    <div class="me-5 form-check">
                        <input type="checkbox" class="form-check-input" id="kendaraan" disabled>
                        <label class="form-check-label" for="kendaraan">Membawa Kendaraan Pribadi</label>
                        <input type="checkbox" class="form-check-input" id="kendaraan" checked disabled>
                        <label class="form-check-label" for="kendaraan">Dijemput MCTN</label>
                    </div>
                </div>
                @endif

                @if ( $surat2->surat1->pengawalan == 'Ya' )
                <h4 class="fw-bold mt-4">Butuh Pengawalan</h4>
                <div class="container mx-5">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked disabled>
                        <label class="form-check" for="inlineRadio1">Ya</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2" disabled>
                        <label class="form-check" for="inlineRadio2">Tidak</label>
                    </div>
                </div>

                @else
                <h4 class="fw-bold mt-4">Butuh Pengawalan</h4>
                <div class="container mx-5">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" disabled>
                        <label class="form-check" for="inlineRadio1">Ya</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2" checked disabled>
                        <label class="form-check" for="inlineRadio2">Tidak</label>
                    </div>
                </div>

                @endif


                <div class="d-flex my-4">
                    @if($surat2->id_status_surat === 1)
                        <button id="btn-approve" class="btn btn-success mx-2">Setujui</button>
                    @endif

                    @if($surat2->id_status_surat === 1)
                        <button id="btn-reject" class="btn btn-danger mx-2">Tolak</button>
                    @endif
                </div>

                <div id="alasan-form" style="display: none;">
                    <form action="{{ route('phr.approve', $surat2->id_surat_2_duri) }}" method="POST">
                        @csrf
                        <div class="form-group my-3">
                            <label for="alasan_surat_2">Alasan Setuju:</label>
                            <textarea name="alasan_surat2" id="alasan_surat2" cols="40" rows="5" class="form-control" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Setujui</button>
                    </form>
                </div>

                <div id="alasan-tolak-form" style="display: none;">
                    <form action="{{ route('phr.reject', $surat2->id_surat_2_duri) }}" method="POST">
                        @csrf
                        <div class="form-group my-3">
                            <label for="alasan_surat2">Alasan Tolak:</label>
                            <textarea name="alasan_surat2" id="alasan_surat2" cols="40" rows="5" class="form-control" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-danger">Tolak</button>
                    </form>
                </div>
                <div>
                    <a href="/phr" class="btn btn-primary my-4">Kembali</a>
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
                alasanForm.style.display = 'none';
            } else {
                alasanForm.style.display = 'block';
                alasanTolakForm.style.display = 'none';
            }
        });

        btnReject.addEventListener('click', function(e) {
            e.preventDefault();
            if (alasanTolakForm.style.display === 'block') {
                alasanTolakForm.style.display = 'none';
            } else {
                alasanTolakForm.style.display = 'block';
                alasanForm.style.display = 'none';
            }
        });
    });
</script>

@endsection
