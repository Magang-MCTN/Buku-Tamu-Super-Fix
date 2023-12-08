@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body p-5">
            <div class="container" >
                <div class="row">
                    <h3 class="col fw-bold">FORM IZIN MASUK PT MCTN </h3>
                    <div class="col">
                        <div class="d-flex justify-content-end">
                            <h4 class="border" style="padding: 10px; border-radius: 6px"> {{ $surat2->surat1->lokasi->nama_lokasi }}</h4>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>Nomor Surat</th>
                            <td>{{ $surat2->kode_unik}}</td>
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

            </div>

            <h4 class="fw-bold mt-4">Data Tamu</h4>
            <table class="table table-bordered text-center">
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

            <div class="d-flex justify-content-between my-4">
                <a href="/status" class="btn btn-primary">Kembali</a>
                @if ($surat2->statusSurat->id_status_surat == 2)
                    <a href="/cetak-suratjkt/{{$surat2->id_surat_2}}" class="btn btn-primary">Cetak Dokumen</a>
                @endif
            </div>



                {{-- <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto KTP</th>
                            <th>Foto Kendaraan</th>
                            <th>Foto SIM</th>
                            <th>Foto STNK</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($surat2->surat1->files as $file)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $file->foto_ktp }}</td>
                                <td>{{ $file->kendaraan->foto_kendaraan }}</td>
                                <td>{{ $file->kendaraan->foto_sim }}</td>
                                <td>{{ $file->kendaraan->foto_stnk }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table> --}}


            </div>
        </div>
    </div>
</div>
@endsection
