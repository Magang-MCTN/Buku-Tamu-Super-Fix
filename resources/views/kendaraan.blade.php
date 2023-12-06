@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center my-5">
        <h2 class="fw-bold" style="color: #097B96;">Formulir Buku Tamu</h2>
        <h1 class="fw-bold" style="font-size: 200%">PT Mandau Cipta Tenaga Nusantara</h1>
    </div>
    <div style="">

        <p> ID SURAT ANDA ADALAH {{ $surat1_id }} </p>

    </div>
    <form id="form-kendaraan">
        @csrf
    <div class="card m-5">
        <div class="card-body">
            <div class="container">
                <div class="row px-5">
                    <div class="col d-flex justify-content-center">
                        <div class="d-flex rounded-circle justify-content-center mx-3" style="border-radius: 50%; width: 30px; height: 30px; background-color: #000; opacity: 0.32">
                            <i class="mdi mdi-clipboard-outline d-flex" style="color:white; align-items: center;"></i>
                        </div>
                        <h2 class="fw-bold d-flex" style="opacity: 0.32;">1. Data Diri Tamu</h2>
                    </div>
                    <div class="col d-flex justify-content-center">
                        <div class="d-flex rounded-circle justify-content-center mx-3" style="border-radius: 50%; width: 30px; height: 30px; background-color: #097B96">
                            <i class="mdi mdi-clipboard-outline d-flex" style="color:white; align-items: center;"></i>
                        </div>
                        <h2 class="fw-bold d-flex" style="color: #097B96;">2. Data Kendaraan</h2>
                    </div>
                </div>
                <hr>



                        <div class="col form-group">
                            <label for="id_surat_1" style="display: none">ID SURAT:</label>
                            <input type="text" style="display: none" class="form-control" name="id_surat_1" id="id_surat_1" required value="{{ $surat1_id }}" disabled>
                        </div>
                    <div class="row">
                        <div class="col form-group">
                            <label for="tipe_mobil">Tipe Mobil</label>
                            <input type="text" class="form-control" name="tipe_mobil" id="tipe_mobil" required>
                        </div>
                        <div class="col form-group">
                            <label for="warna">Warna Mobil</label>
                            <input type="text" class="form-control" name="warna" id="warna" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-group">
                            <label for="nomor_polisi">Nomor Polisi</label>
                            <input type="text" class="form-control" name="nomor_polisi" id="nomor_polisi" required>
                        </div>
                        <div class="col form-group">
                            <label for="nama_supir">Nama Supir</label>
                            <input type="text" class="form-control" name="nama_supir" id="nama_supir" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-group">
                            <label for="masa_berlaku_stnk">Masa Berlaku STNK</label>
                            <input type="date" class="form-control" name="masa_berlaku_stnk" id="masa_berlaku_stnk" type="image/*" required>
                        </div>
                        <div class="col form-group">
                            <label for="masa_berlaku_kir">Masa Berlaku KIR (optional)</label>
                            <input type="date" class="form-control" name="masa_berlaku_kir" id="masa_berlaku_kir" type="image/*">
                        </div>
                        <div class="col form-group">
                            <label for="masa_berlaku_sim">Masa Berlaku SIM</label>
                            <input type="date" class="form-control" name="masa_berlaku_sim" id="masa_berlaku_sim" type="image/*" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-group">
                            <label for="foto_kendaraan">Foto Kendaraan</label>
                            <input type="file" class="form-control" name="foto_kendaraan" id="foto_kendaraan" required>
                        </div>
                        <div class="col form-group">
                            <label for="foto_stnk">Foto STNK:</label>
                            <input type="file" class="form-control" name="foto_stnk" id="foto_stnk" required>
                        </div>
                        <div class="col form-group">
                            <label for="foto_sim">Foto SIM:</label>
                            <input type="file" class="form-control" name="foto_sim" id="foto_sim" required>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button class="btn" style="background-color: #097b96; color: white" type="button" id="tambahData">Tambah Data Kendaraan</button>
                    </div>
                </form>

                <!-- Tabel Sementara -->
                <div class="table-responsive">
                    <table class="table ">
                        <thead>
                            <tr>
                               <th>ID SURAT 1</th>
                                <th>Tipe Mobil</th>
                                <th>Warna Mobil</th>
                                <th>Nomor Polisi</th>
                                <th>Nama Supir</th>
                                <th>Masa Berlaku STNK</th>
                                <th>Masa Berlaku KIR</th>
                                <th>Masa Berlaku SIM</th>
                                <th>Foto Kendaraan</th>
                                <th>Foto STNK</th>
                                <th>Foto SIM</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tabelSementara">
                            <!-- Data kendaraan yang ditambahkan akan muncul di sini -->
                        </tbody>
                    </table>
                </div>

                <!-- Tombol "Simpan Data Kendaraan" -->
                <div class="d-flex justify-content-end">
                    <button class="btn" style="background-color: #097B96; color: white" type="button" id="submitKendaraan">Submit</button>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        let datakendaraan = [];

        $('#tambahData').click(function () {
            // Ambil data dari input
            let id_surat_1 = $('#id_surat_1').val();
            let tipe_mobil = $('#tipe_mobil').val();
            let warna = $('#warna').val();
            let nomor_polisi = $('#nomor_polisi').val();
            let nama_supir = $('#nama_supir').val();
            let masa_berlaku_stnk = $('#masa_berlaku_stnk').val();
            let masa_berlaku_kir = $('#masa_berlaku_kir').val();
            let masa_berlaku_sim = $('#masa_berlaku_sim').val();
            let foto_kendaraan = $('#foto_kendaraan')[0].files[0];
            let foto_stnk = $('#foto_stnk')[0].files[0];
            let foto_sim = $('#foto_sim')[0].files[0];

            // Tambahkan data ke array
            datakendaraan.push({
                id_surat_1,
                tipe_mobil,
                warna,
                nomor_polisi,
                nama_supir,
                masa_berlaku_stnk,
                masa_berlaku_kir,
                masa_berlaku_sim,
                foto_kendaraan,
                foto_stnk,
                foto_sim
            });

            // Tambahkan data kendaraan ke tabel sementara
            let newRow = `<tr>
                <td>${id_surat_1}</td>
                <td>${tipe_mobil}</td>
                <td>${warna}</td>
                <td>${nomor_polisi}</td>
                <td>${nama_supir}</td>
                <td>${masa_berlaku_stnk}</td>
                <td>${masa_berlaku_kir}</td>
                <td>${masa_berlaku_sim}</td>
                <td>${foto_kendaraan.name}</td>
                <td>${foto_stnk.name}</td>
                <td>${foto_sim.name}</td>
                <td><button class="hapus">Hapus</button></td>
            </tr>`;
            $('#tabelSementara').append(newRow);

            // Bersihkan input
            $('#form-kendaraan')[0].reset();
        });

        // Aksi hapus data kendaraan
        $('#tabelSementara').on('click', 'button.hapus', function () {
            let index = $(this).closest('tr').index();
            // Hapus data kendaraan dari array dan baris dari tabel
            datakendaraan.splice(index, 1);
            $(this).closest('tr').remove();
        });

        // Tombol "Simpan Data Kendaraan"
        $('#submitKendaraan').click(function () {
            if (datakendaraan.length > 0) {
                let formData = new FormData();
                formData.append('_token', $('input[name="_token"]').val());

                // Kirim data kendaraan ke kontroler untuk disimpan
                $.each(datakendaraan, function (key, value) {
                    formData.append(`datakendaraan[${key}][id_surat_1]`, value.id_surat_1);
                    formData.append(`datakendaraan[${key}][tipe_mobil]`, value.tipe_mobil);
                    formData.append(`datakendaraan[${key}][warna]`, value.warna);
                    formData.append(`datakendaraan[${key}][nomor_polisi]`, value.nomor_polisi);
                    formData.append(`datakendaraan[${key}][nama_supir]`, value.nama_supir);
                    formData.append(`datakendaraan[${key}][masa_berlaku_stnk]`, value.masa_berlaku_stnk);
                    formData.append(`datakendaraan[${key}][masa_berlaku_kir]`, value.masa_berlaku_kir);
                    formData.append(`datakendaraan[${key}][masa_berlaku_sim]`, value.masa_berlaku_sim);
                    formData.append(`datakendaraan[${key}][foto_kendaraan]`, value.foto_kendaraan);
                    formData.append(`datakendaraan[${key}][foto_stnk]`, value.foto_stnk);
                    formData.append(`datakendaraan[${key}][foto_sim]`, value.foto_sim);

                });
                $.ajax({
                    url: "/simpankendaraan",
                    type: "POST",
                    data:formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        // Tampilkan pop-up konfirmasi
                        datakendaraan = [];
                        $('#tabelSementara').empty();
                        alert('Data kendaraan berhasil disimpan ke database.');
                        window.location.href = "/kode-unik/" + {{ $surat1_id }};
                    },
                    error: function (xhr, status, error) {
    console.error(xhr.responseText); // Menampilkan respon kesalahan dari server di console
    alert('Terjadi kesalahan saat menyimpan data kendaraan.');

                    }
                });
            } else {
                alert('Tidak ada data kendaraan untuk disimpan.');
            }
        });
    });
</script>
@endsection
