@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center my-5">
        <h2 class="fw-bold" style="color: #097B96;">Formulir Pengajuan Kunjungan</h2>
        <h1 class="fw-bold" style="font-size: 200%">PT Mandau Cipta Tenaga Nusantara</h1>
    </div>

    @if ($status->isNotEmpty() || $statuss->isNotEmpty())
    <div class="container">
        <div class="card mb-3 px-5">
            <div class="card-body">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>Kode Surat</th>
                            <th>Tujuan</th>
                            <th>Nama Status Surat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($status as $data)
                        <tr>
                            <td>{{ $data->kode_unik }}</td>
                            <td>{{ $data->surat1->lokasi->nama_lokasi }}</td>
                            <td>
                                <p class="badge badge-warning">{{ $statuss->statusSurat->nama_status_surat }}</p>
                            </td>
                            <td>
                                <a href="{{ route('surat2.showjkt', $statuss->id_surat_2)}}" class="btn btn-primary">Lihat</a>
                            </td>
                        </tr>
                        @endforeach

                        @foreach ($statuss as $data)
                        <tr>
                            <td>{{ $data->kode_unik }}</td>
                            <td>{{ $data->surat1->lokasi->nama_lokasi }}</td>
                            <td>
                                <p class="badge badge-warning">{{ $statuss->statusSurat->nama_status_surat }}</p>
                            </td>
                            <td>
                                <a href="{{ route('surat2.showjkt', $statuss->id_surat_2)}}" class="btn btn-primary">Lihat</a>
                            </td>
                        </tr>
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