@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center my-5">
        <h2 class="fw-bold" style="color: #097B96;">Formulir Pengajuan Kunjungan</h2>
        <h1 class="fw-bold" style="font-size: 200%">PT Mandau Cipta Tenaga Nusantara</h1>
    </div>

    @if ($status2->isNotEmpty() || $statuss->isNotEmpty())
        <div class="container">
            <div class="card mb-3 px-5">
                <div class="card-body">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th>Kode Surat</th>
                                <th>Tujuan</th>
                                <th>Status Surat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($statuss as $data)
    @if ($data->surat1->lokasi->id_lokasi == 1)
        <tr>
            <td>{{ $data->kode_unik }}</td>
            <td>{{ $data->surat1->lokasi->nama_lokasi }}</td>
            <td>
                @if ($data->id_status_surat2 == 2)
                    <p class="badge badge-success">Disetujui</p>
                @elseif ($data->id_status_surat2 == 3 || $data->id_status_surat2 == 7)
                    <p class="badge badge-danger">{{ $data->statusSurat->nama_status_surat }}</p>
                @else
                    <p class="badge badge-warning">{{ $data->statusSurat->nama_status_surat }}</p>
                @endif
            </td>
            <td>
                <a href="{{ route('surat2.showjkt', $data->id_surat_2) }}" class="btn btn-secondary">Lihat</a>
            </td>
        </tr>
    @endif
@endforeach

@foreach ($statuss as $data)
    @if ($data->surat1->lokasi->id_lokasi == '2')
        <tr>
            <td>{{ $data->kode_unik }}</td>
            <td>{{ $data->surat1->lokasi->nama_lokasi }}</td>
            <td>
                @if ($data->id_status_surat2 == 1 || $data->id_status_surat2 == 4 || $data->id_status_surat2 == 6)
                    <p class="badge badge-warning">{{ $data->statusSurat->nama_status_surat }}</p>
                @elseif ($data->id_status_surat2 == 2)
                    <p class="badge badge-success">Disetujui</p>
                @else
                    <p class="badge badge-danger">{{ $data->statusSurat->nama_status_surat }}</p>
                @endif
            </td>
            <td>
                <a href="{{ route('surat2.showpku', $data->id_surat_2) }}" class="btn btn-secondary">Lihat</a>
            </td>
        </tr>
    @endif
@endforeach

@foreach ($status2 as $datat)
    @if ($datat->surat1->lokasi->id_lokasi == '3')
        <tr>
            <td>{{ $datat->kode_unik }}</td>
            <td>{{ $datat->surat1->lokasi->nama_lokasi }}</td>
            <td>
                @if ($datat->id_status_surat == 2)
                    <p class="badge badge-success">Disetujui</p>
                @elseif ($datat->id_status_surat == 4)
                    <p class="badge badge-warning">{{ $datat->statusSurat->nama_status_surat }}</p>
                @elseif ($datat->id_status_surat == 3)
                    <p class="badge badge-success">Ditolak</p>
                @else
                    <p class="badge badge-danger">{{ $datat->statusSurat->nama_status_surat }}</p>
                @endif
            </td>
            <td>
                <a href="{{ route('surat2.show', $datat->id_surat_2_duri) }}" class="btn btn-secondary">Lihat</a>
            </td>
        </tr>
    @endif
@endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @else
        <p>Data dengan kode unik tersebut tidak ditemukan.</p>
    @endif
</div>
@endsection
