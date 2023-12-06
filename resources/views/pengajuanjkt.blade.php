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
                                <h2 class="fw-bold d-flex" style="color: #097B96;">1. Data Diri Tamu</h2>
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
                                <label for="jabatan">Jabatan</label>
                                <input type="text" class="form-control" name="jabatan" id="jabatan" required>
                            </div>
                        </div>

                        <div class="row">
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
                                <th>Jabatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tabelSementara">
                            <!-- Data tamu yang ditambahkan akan muncul di sini -->
                        </tbody>
                    </table>

                    <!-- Tombol untuk menyimpan data tamu ke database -->
                    <div class="d-flex justify-content-end">
                        <button class="btn" style="color: white; background-color: #097B96" type="button" id="submitTamu">Submit</button>
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
            let jabatan = $('#jabatan').val();
            let id_surat_1 = $('#id_surat_1').val();

            // Tambahkan data ke array
            dataTamu.push({
                nama_tamu,
                jabatan,
                id_surat_1
            });

            // Tambahkan data tamu ke tabel sementara
            let newRow = `<tr>

                <td>${nama_tamu}</td>
                <td>${jabatan}</td>
                <td><button class="hapus">Hapus</button></td>
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
                    formData.append(`dataTamu[${key}][jabatan]`, value.jabatan);
                    formData.append(`dataTamu[${key}][id_surat_1]`, value.id_surat_1 );
                });

                // Kirim data ke server menggunakan AJAX
                $.ajax({
                    url: "/simpanTamukantor",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        // Setelah data disimpan, bersihkan tabel sementara dan array data
                        dataTamu = [];
                        $('#tabelSementara').empty();
                        alert('Data tamu berhasil disimpan ke database.');

                        window.location.href = '/kode-unik/{{ $surat1_id }}';
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
