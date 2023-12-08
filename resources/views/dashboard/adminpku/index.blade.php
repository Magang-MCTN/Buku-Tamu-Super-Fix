@extends('dashboard/app')

@section('content')
<link rel="stylesheet" href="{{ asset('dashboard\template\css\cards.css') }}">
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="home-tab">
                    <div class="row">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col">
                            <a href="/tuanrumah" class="text-decoration-none">
                                <div class="card mb-2">
                                    <div class="card-body d-flex align-self-center">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col">
                                                <div class="fw-bold text-black">
                                                    Total <br> Kunjungan
                                                </div>
                                                <div class="card-title" style="font-size: 24px">{{$jumlahPengajuanBarang ? $jumlahPengajuanBarang: '0'}}</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="mdi mdi-archive" style="color: #097b96"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col">
                            <a href="/persetujuan" class="text-decoration-none">
                                <div class="card mb-2">
                                    <div class="card-body d-flex align-self-center">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col">
                                                <div class="fw-bold text-black">
                                                    Pengajuan <br> Kunjungan
                                                </div>
                                                <div class="card-title" style="font-size: 24px">{{$jumlahPengajuanDiajukan ? $jumlahPengajuanDiajukan: '0'}}</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="mdi mdi-file-document" style="color: #097b96"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col">
                            <a href="/history" class="text-decoration-none">
                                <div class="card mb-2">
                                    <div class="card-body d-flex align-self-center">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col">
                                                <div class="fw-bold text-black">
                                                    Kunjungan <br>
                                                     Disetujui
                                                </div>
                                                <div class="card-title" style="font-size: 24px">{{$jumlahPengajuanDisetujui ? $jumlahPengajuanDisetujui: '0'}}</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="mdi mdi-file-check" style="color: #097b96"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col">
                            <a href="/history" class="text-decoration-none">
                                <div class="card mb-2">
                                    <div class="card-body d-flex align-self-center">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col">
                                                <div class="fw-bold text-black">
                                                    Kunjungan <br>
                                                    Ditolak
                                                </div>
                                                <div class="card-title" style="font-size: 24px">{{$jumlahPengajuanDitolak ? $jumlahPengajuanDitolak: '0'}}</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="mdi mdi-file-check" style="color: #097b96"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        {{-- <form action="{{ route('tuanrumah.home') }}" method="get">
                    <div class="form-group">
                        <label for="tanggal_mulai">Tanggal Mulai:</label>
                        <input type="date" name="tanggal_mulai" id="tanggal_mulai">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_selesai">Tanggal Selesai:</label>
                        <input type="date" name="tanggal_selesai" id="tanggal_selesai">
                    </div>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </form> --}}
                        <div class="container">
                            <div class="card mt-4">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table text-center">
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
                                                            s.d. {{ $data->surat1->periode->tanggal_keluar->format('d-m-Y') }}</td>
                                                        <td><p class="badge badge-warning">{{ $data->statusSurat->nama_status_surat }}</p></td>
                                                        <td><a href="{{ route('admin.surat2pku.show', ['id' => $data->id_surat_2]) }}"
                                                            class="btn" style="background-color: #097b96; color: white">Lihat</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            </table>
                                            <div class="text-center">
                                            <a href="/persetujuanadminjkt" >Lihat Selengkapnya</a></td>
                                            </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


