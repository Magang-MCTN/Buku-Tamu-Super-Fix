@extends('dashboard/app')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-sm-12">
                    <div class="home-tab">
                        <div class="row">

                            <!-- Card 1 -->
                            <div class="col">
                                <a href="#" class="text-decoration-none">
                                    <div class="card mb-2">
                                        <div class="card-body d-flex align-self-center">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col">
                                                    <div class="fw-bold text-black">
                                                        Total <br> Kunjungan
                                                    </div>
                                                    <div class="card-title" style="font-size: 24px">10</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="mdi mdi-archive" style="color: #097b96"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <!-- Card 2 -->
                            <div class="col">
                                <a href="#" class="text-decoration-none">
                                    <div class="card mb-2">
                                        <div class="card-body d-flex align-self-center">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col">
                                                    <div class="fw-bold text-black">
                                                        Pengajuan <br> Kunjungan
                                                    </div>
                                                    <div class="card-title" style="font-size: 24px">45</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="mdi mdi-file-document" style="color: #097b96"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <!-- Card 3 -->
                            <div class="col">
                                <a href="#" class="text-decoration-none">
                                    <div class="card mb-2">
                                        <div class="card-body d-flex align-self-center">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col">
                                                    <div class="fw-bold text-black">
                                                        Kunjungan disetujui
                                                    </div>
                                                    <div class="card-title" style="font-size: 24px">50</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="mdi mdi-file-check" style="color: #097b96"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <!-- Card 4 -->
                            <div class="col">
                                <a href="#" class="text-decoration-none">
                                    <div class="card mb-2">
                                        <div class="card-body d-flex align-self-center">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col">
                                                    <div class="fw-bold text-black">
                                                        Kunjungan ditolak
                                                    </div>
                                                    <div class="card-title" style="font-size: 24px">78</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="mdi mdi-file-check" style="color: #097b96"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="card mt-2">
                    <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Tamu</th>
                            <th>Asal Perusahaan</th>
                            <th>Periode</th>
                            <th>Status Surat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($suratToApprove as $data)
                            <tr>
                                <td>{{ $data->surat1->nama_tamu }}</td>
                                <td>{{ $data->surat1->asal_perusahaan }}</td>
                                <td>{{ $data->surat1->periode->tanggal_masuk->format('d-m-Y') }}
                                    - {{ $data->surat1->periode->tanggal_keluar->format('d-m-Y') }}</td>
                                <td>{{ $data->statusSurat->nama_status_surat }}</td>
                                <td>
                                    <a href="{{ route('admin_duri.surat2.show', ['id' => $data->id_surat_2_duri]) }}"
                                       class="btn btn-info">Lihat</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
