@extends('dashboard/app')

@section('content')


    <div class="main-panel">
        <div class="container py-3 px-4">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                    <h3 class="mb-4 fw-bold">IZIN MASUK PT MCTN - LADANG MINYAK DURI</h3>

                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <td>{{ $surat2->id_surat_2_duri }}</td>
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
                                <td>{{ explode(' ', $surat2->surat1->periode->jam_kedatangan)[1] }}</td>
                            </tr>
                            <tr>
                                <th>Tujuan</th>
                                <td>{{ $surat2->surat1->tujuan_keperluan }}</td>
                            </tr>
                            <tr></tr>
                        </table>
                    </div>
                    <h3 class="fw-bold mt-4">Data Diri Tamu</h3>
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

                    <h3 class="fw-bold mt-4">Data Kendaraan</h3>
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
                                        <td>{{ $kendaraan->nomor_polisi }}</td>
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

                    <h3 class="fw-bold mt-4">Foto</h3>
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
                            @if ($surat2->surat1->kendaraan->isEmpty())
                                <tr>
                                    <td colspan="4">TIDAK MEMBAWA KENDARAAN</td>
                                </tr>
                            @else
                                @foreach ($surat2->surat1->kendaraan as $kendaraan)
                                    <tr>
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
                                    </tr>
                                @endforeach
                            @endif
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
                    @if($surat2->id_status_surat === 6)
                        <button id="btn-approve" class="btn btn-success mx-2">Setuju</button>
                    @endif

                    @if($surat2->id_status_surat === 6)
                        <button id="btn-reject" class="btn btn-danger mx-2">Tolak</button>
                    @endif
                </div>

                <div id="alasan-form" style="display: none;">
                    <form action="{{ route('admin_duri.approve', $surat2->id_surat_2_duri) }}" method="POST">
                        @csrf
                        <div class="my-3 me-3">
                            <label for="alasan_surat_2">Alasan Setuju:</label>
                        </div>
                        <textarea name="alasan_surat2" id="alasan_surat2" cols="40" rows="5" style="border-radius: 5px"required></textarea><br>
                        <button type="submit" class="btn btn-success my-2">Setuju</button>
                    </form>
                </div>

                <div id="alasan-tolak-form" style="display: none;">
                    <form action="{{ route('admin_duri.reject', $surat2->id_surat_2_duri) }}" method="POST">
                        @csrf
                        <div class="my-3 me-3">
                            <label for="alasan_surat2">Alasan Tolak:</label>
                        </div>
                        <textarea name="alasan_surat2" id="alasan_surat2" cols="40" rows="5" style="border-radius: 5px" required></textarea><br>
                        <button type="submit" class="btn btn-danger my-2">Tolak</button>
                    </form>
                </div>
                <div>
                    <a href="/persetujuanadminduri" class="btn btn-primary my-4">Kembali</a>
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
