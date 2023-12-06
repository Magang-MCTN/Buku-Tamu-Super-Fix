@extends('layouts/app')

@section('content')
<div class="container">
    <div class="text-center my-5">
        <h2 class="fw-bold" style="color: #097B96;">Formulir Buku Tamu</h2>
        <h1 class="fw-bold" style="font-size: 200%">PT Mandau Cipta Tenaga Nusantara</h1>
    </div>
    <!-- Formulir Data Diri -->
    <form id="form-datadiri">
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card px-5">
                    <div class="card-body">
                        <div class="row px-5">
                            <div class="col d-flex justify-content-center">
                                <div class="d-flex rounded-circle justify-content-center mx-3" style="border-radius: 50%; width: 30px; height: 30px; background-color: #097B96">
                                    <i class="mdi mdi-clipboard-outline d-flex" style="color:white; align-items: center;"></i>
                                </div>
                                <h3 class="fw-bold d-flex" style="color: #097B96;">1. Data Diri Tamu</h3>
                            </div>
                            <div class="col d-flex justify-content-center">
                                <div class="d-flex rounded-circle justify-content-center mx-3" style="border-radius: 50%; width: 30px; height: 30px; background-color: #000; opacity: 0.32">
                                    <i class="mdi mdi-clipboard-outline d-flex" style="color:white; align-items: center;"></i>
                                </div>
                                <h3 class="fw-bold d-flex" style="opacity: 0.32;">2. Data Kendaraan</h3>
                            </div>
                        </div>
                        <hr>
                        <div class="col form-group">
                            <label for="id_surat_1" style="display: none">ID SURAT:</label>
                            <input type="text" style="display: none" class="form-control" name="id_surat_1" id="id_surat_1" required value="{{ $surat1_id }}" disabled>
                        </div>
                        <div class="row">
                            <div class="col form-group">
                                <label for="nama_tamu">Nama</label>
                                <input type="text" class="form-control" name="nama_tamu" id="nama_tamu" required>
                            </div>
                            <div class="col form-group">
                                <label for="nik_tamu">Nomor KTP</label>
                                <input type="text" class="form-control" name="nik_tamu" id="nik_tamu" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col form-group">
                                <label for="masa_berlaku_ktp">Masa Berlaku KTP</label>
                                <input type="text" class="form-control" name="masa_berlaku_ktp" id="masa_berlaku_ktp" value="Seumur Hidup" disabled required>
                            </div>
                            <div class="col form-group">
                                <label for="jabatan">Jabatan</label>
                                <input type="text" class="form-control" name="jabatan" id="jabatan" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col form-group">
                                <label for="foto_ktp">Foto KTP</label>
                                <input type="file" class="form-control" name="foto_ktp" id="foto_ktp" accept="image/*" required>
                            </div>
                            <div class="col">
                            </div>
                            <div class="d-flex justify-content-end">
                                <button class="btn" style="color: white; background-color: #097B96" type="button" id="tambahData">Tambah Data Tamu</button>
                            </div>
                        </div>

                    </div>
                    <!-- Tabel Sementara -->
                    <table class="table">
                        <thead>
                            <tr>
                                {{-- <th>ID surat 1</th> --}}
                                <th>Nama</th>
                                <th>Nomor KTP</th>
                                <th>Masa Berlaku KTP</th>
                                <th>Jabatan</th>
                                <th>Foto KTP</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tabelSementara">
                            <!-- Data tamu yang ditambahkan akan muncul di sini -->
                        </tbody>
                    </table>

                    <!-- Tombol untuk menyimpan data tamu ke database -->
                    <div class="d-flex justify-content-end">
                        <button class="btn" style="color: white; background-color: #097B96" type="button" id="submitTamu">Lanjutkan</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Input Form -->
    </form>

</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Script AJAX untuk Mengirim Data -->
<script>
    $(document).ready(function () {
        let dataTamu = []; // Array untuk menyimpan data tamu sementara

        $('#tambahData').click(function () {
            // Ambil data dari input
            let nama_tamu = $('#nama_tamu').val();
            let nik_tamu = $('#nik_tamu').val();
            let masa_berlaku_ktp = $('#masa_berlaku_ktp').val();
            let jabatan = $('#jabatan').val();
            let id_surat_1 = $('#id_surat_1').val();
            let foto_ktp = $('#foto_ktp')[0].files[0]; // Foto KTP

            // Tambahkan data ke array
            dataTamu.push({
                nama_tamu,
                nik_tamu,
                masa_berlaku_ktp,
                jabatan,
                foto_ktp,
                id_surat_1
            });

            // Tambahkan data tamu ke tabel sementara
            let newRow = `<tr>

                <td>${nama_tamu}</td>
                <td>${nik_tamu}</td>
                <td>${masa_berlaku_ktp}</td>
                <td>${jabatan}</td>
                <td>${foto_ktp.name}</td>
                <td><button class="hapus btn btn-danger">Hapus</button></td>
            </tr>`;
            $('#tabelSementara').append(newRow);

            // Bersihkan input
            $('#form-datadiri')[0].reset();
        });

        // Aksi hapus data tamu
        $('#tabelSementara').on('click', 'button.hapus', function () {
            let index = $(this).closest('tr').index();
            // Hapus data tamu dari array dan baris dari tabel
            dataTamu.splice(index, 1);
            $(this).closest('tr').remove();
        });

        // Tombol "Simpan Data Tamu ke Database"
        $('#submitTamu').click(function () {
            if (dataTamu.length > 0) {
                // Persiapkan data yang akan dikirim
                let formData = new FormData();
                formData.append('_token', $('input[name="_token"]').val());

                // Tambahkan data dan file ke FormData{{ $surat1_id }}
                $.each(dataTamu, function (key, value) {
                    formData.append(`dataTamu[${key}][nama_tamu]`, value.nama_tamu);
                    formData.append(`dataTamu[${key}][nik_tamu]`, value.nik_tamu);
                    formData.append(`dataTamu[${key}][masa_berlaku_ktp]`, value.masa_berlaku_ktp);
                    formData.append(`dataTamu[${key}][jabatan]`, value.jabatan);
                    formData.append(`dataTamu[${key}][foto_ktp]`, value.foto_ktp);
                    formData.append(`dataTamu[${key}][id_surat_1]`, value.id_surat_1 );
                });

                // Kirim data ke server menggunakan AJAX
                $.ajax({
                    url: "/simpanTamu",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        // Setelah data disimpan, bersihkan tabel sementara dan array data
                        dataTamu = [];
                        $('#tabelSementara').empty();
                        alert('Data tamu berhasil disimpan ke database.');

                        window.location.href = "/pilih-kendaraan?surat1_id=" + {{ $surat1_id }};
                    },
                    error: function (xhr, status, error) {
                        alert('Terjadi kesalahan saat menyimpan data.');
                    }
                });
            } else {
                alert('Tidak ada data tamu untuk disimpan.');
            }
        });
    });
</script>
@endsection
