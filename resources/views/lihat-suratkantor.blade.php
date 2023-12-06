@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body p-5">
            <div class="container table-responsive" style="overflow-x:auto;" >
                <div class="row">
                    <div class="col">
                        <h3 class="fw-bold">FORM IZIN MASUK PT MCTN </h3>

                        <p><strong>Kode Surat &nbsp;:</strong> {{ $surat2->kode_unik }}</p>
                        <p><strong>Asal Perusahaan:</strong> {{ $surat2->surat1->asal_perusahaan }}</p>
                        <p><strong>Tujuan Keperluan:</strong> {{ $surat2->surat1->tujuan_keperluan }}</p>
                        <p><strong>Periode:</strong> {{ $surat2->surat1->periode->tanggal_masuk->format('d-m-Y') }} s.d. {{ $surat2->surat1->periode->tanggal_keluar->format('d-m-Y') }}</p>
                        <p><strong>Jam Kedatangan:</strong> {{ explode(' ', $surat2->surat1->periode->jam_kedatangan)[1] }}</p>

                        {{-- <p><strong>Jam Kedatangan:</strong> {{ $surat2->surat1->periode->jam_kedatangan }}</p> --}}
                        {{-- <p><strong>From Izin Masuk Duri Field PHR - MCTN</strong></p> --}}
                    </div>
                    <div class="col">
                        <div class="d-flex justify-content-end">
                            <h4 class="border" style="padding: 10px; border-radius: 6px"> {{ $surat2->surat1->lokasi->nama_lokasi }}</h4>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    @if ($surat2->statusSurat->id_status_surat == 2)
                        <a href="/cetak-suratjkt/{{$surat2->id_surat_2}}" class="btn btn-primary">Cetak Dokumen</a>
                    @endif
                </div>

                <h4 class="fw-bold">Data Tamu</h4>
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
