<!-- resources/views/pengajuan_tamu.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="text-center my-5">
            <h2 class="fw-bold" style="color: #097B96;">Formulir Pengajuan Kunjungan</h2>
            <h1 class="fw-bold" style="font-size: 200%">PT Mandau Cipta Tenaga Nusantara</h1>
        </div>

        <form action="{{ route('tamu.store') }}" method="post">
        @csrf

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-center">
                            <div class="d-flex rounded-circle justify-content-center mx-3" style="border-radius: 50%; width: 30px; height: 30px; background-color: #097B96">
                                <i class="mdi mdi-clipboard-outline d-flex" style="color:white; align-items: center;"></i>
                            </div>
                            <h2 class="fw-bold d-flex" style="color: #097B96;">Formulir Kunjungan</h2>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col form-group">
                                <label for="nama_tamu" class="form-label">Nama:</label>
                                <input type="text" class="form-control" name="nama_tamu" id="nama_tamu" placeholder="Nama" required>
                            </div>
                            <div class="col form-group">
                                <label for="asal_perusahaan" class="form-label">Asal Perusahaan:</label>
                                <input type="text" class="form-control" name="asal_perusahaan" id="asal_perusahaan" placeholder="Asal Perusahaan" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col form-group">
                                <label for="email_tamu" class="form-label">Email:</label>
                                <input type="email" class="form-control" name="email_tamu" id="email_tamu" placeholder="Email" required>
                            </div>

                            <div class="col form-group">
                                <label for="no_hp_tamu" class="form-label">No. HP:</label>
                                <input type="number" class="form-control" name="no_hp_tamu" id="no_hp_tamu" placeholder="No. HP" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col form-group">
                                <label for="nama_lokasi" class="form-label">Lokasi yang ingin dikunjungi:</label>
                                <select id="nama_lokasi" class="form-select form-control" name="nama_lokasi" required>
                                    <option value="" selected disabled> Lokasi </option>
                                    <option value="1">Jakarta</option>
                                    <option value="2">Pekan Baru</option>
                                    <option value="3">Duri</option>
                                </select>
                            </div>
                            <div class="col form-group">
                                <label for="jam_kedatangan" class="form-label">Jam Kedatangan:</label>
                                <input type="time" class="form-control" name="jam_kedatangan" id="jam_kedatangan" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col form-group">
                                <label for="tanggal_masuk" class="form-label">Tanggal Masuk:</label>
                                <input type="date" class="form-control" name="tanggal_masuk" id="tanggal_masuk" required>
                            </div>
                            <div class="col form-group">
                                <label for="tanggal_keluar" class="form-label">Tanggal Keluar:</label>
                                <input type="date" class="form-control" name="tanggal_keluar" id="tanggal_keluar" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col form-group">
                                <label for="nama_pic" class="form-label">Nama yang ingin dikunjungi:</label>
                                <input type="text" class="form-control" name="nama_pic" id="nama_pic" required>
                            </div>

                            <div class="col form-group">
                                <label for="email_pic" class="form-label">Email yang ingin dikunjungi:</label>
                                <input type="email" class="form-control" name="email_pic" id="email_pic" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col form-group">
                                <label for="tujuan_keperluan" class="form-label">Tujuan dan Keperluan:</label>
                                <textarea class="px-4 py-2" name="tujuan_keperluan" id="tujuan_keperluan"  rows="5" style="border-radius: 5px;border: 1px solid rgba(0, 0, 0, 0.15); width: 100%"></textarea>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-2">
                            <button type="submit" class="btn btn-info" style="background-color:#097B96">Kirim</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>
@endsection
