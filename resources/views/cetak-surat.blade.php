<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <style>
        /* CSS khusus untuk dokumen PDF */
        @page {
            size: landscape; /* Mode landscape */
            margin: 20px;
        }

        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            background-color: #333;
            color: #fff;
            padding: 10px;
        }

        .container {
            margin: 20px;
        }

        p {
            margin: 10px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table, th, td {
            border: 1px solid #333;
        }
        th {
            background-color: rgb(133, 225, 112)2, 212, 8); /* Warna latar belakang kuning */
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        .logo {
            position: absolute;
            top: 20px;
            left: 20px;
        }
        .gate-info {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #ffff00; /* Warna latar belakang kuning */
            padding: 5px; /* Padding untuk memberikan ruang di dalam kotak */
            border: 1px solid #000; /* Garis tepi */
        }
        .warning-box {
            background-color: #ff0000; /* Warna latar belakang merah */
            color: #fff; /* Warna teks putih */
            padding: 10px; /* Padding untuk memberikan ruang di dalam kotak */
            border: 1px solid #000; /* Garis tepi */
            margin-top: 20px; /* Jarak antara kotak merah dengan konten di atasnya */
            font-size: 9.98; /* Ukuran font kecil */
        }
    </style>
</head>
<body>
    <div class="gate-info">
        <p>GATE 117/125</p>
    </div>
    {{-- <div class="logo">
        <img src="data:image/png;base64,'.base64_encode(file_get_contents($imagePath)).'" alt="Logo" width="100">
    </div> --}}
    {{-- <h1>Cetak Surat Izin Masuk PT MCTN</h1> --}}
    <p style="text-align: center;"><strong>Form Izin Masuk Duri Field PHR - MCTN</strong></p>

    <div class="container">
        {{-- <p><strong>Kode Unik:</strong> {{ $surat2->kode_unik }}</p> --}}

        <p><strong>Kode Surat &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong> {{ $surat2->kode_unik }}</p>
        <p><strong>Asal Perusahaan&nbsp;&nbsp;&nbsp;&nbsp;:</strong> {{ $surat2->surat1->asal_perusahaan }}</p>

        <p><strong>Periode&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong> {{ $surat2->surat1->periode->tanggal_masuk->format('d-m-Y') }} s.d. {{ $surat2->surat1->periode->tanggal_keluar->format('d-m-Y') }}</p>
        <p><strong>Jam Kedatangan&nbsp;&nbsp;&nbsp;&nbsp;:</strong> {{ explode(' ', $surat2->surat1->periode->jam_kedatangan)[1] }}</p>
        <p><strong>Tujuan Keperluan&nbsp;&nbsp;:</strong> {{ $surat2->surat1->tujuan_keperluan }}</p>
        <h2>Data Tamu</h2>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>No KTP</th>
                    <th>Tanggal Masa Berlaku</th>
                    <th>Jabatan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($surat2->surat1->tamu as $tamu)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $tamu->nama_tamu }}</td>
                        <td>{{ $tamu->nik_tamu }}</td>
                        <td>{{ $tamu->masa_berlaku_ktp }}</td>
                        <td>{{ $tamu->jabatan }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h2>Data Kendaraan</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tipe Mobil</th>
                    <th>Warna</th>
                    <th>No Polisi</th>
                    <th>Nama Supir</th>
                    <th>Masa Berlaku STNK</th>
                    <th>Masa Berlaku KIR</th>
                    <th>Masa Berlaku SIM</th>
                </tr>
            </thead>
            <tbody>
                @if ($surat2->surat1->kendaraan->isEmpty())
                    <tr>
                        <td colspan="8">TIDAK MEMBAWA KENDARAAN</td>
                    </tr>
                @else
                    @foreach ($surat2->surat1->kendaraan as $kendaraan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kendaraan->tipe_mobil }}</td>
                            <td>{{ $kendaraan->warna }}</td>
                            <td>{{ $kendaraan->nomor_polisi }}</td>
                            <td>{{ $kendaraan->nama_supir }}</td>
                            <td>{{ $kendaraan->masa_berlaku_stnk }}</td>
                            <td>{{ $kendaraan->masa_berlaku_kir }}</td>
                            <td>{{ $kendaraan->masa_berlaku_sim }}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>

        <h4 class="fw-bold mt-4">Kendaraan</h4>
        @if ($surat2->surat1->kendaraan->isNotEmpty())
        <div class="ms-5">
            <div class="me-5 form-check">
                <input type="checkbox" class="form-check-input" id="kendaraan" checked disabled>
                <label class="form-check-label" for="kendaraan">Membawa Kendaraan Pribadi</label>
                <input type="checkbox" class="form-check-input" id="kendaraan" disabled>
                <label class="form-check-label" for="kendaraan">Dijemput MCTN</label>
            </div>
        </div>
        @else
        <div class="ms-5">
            <div class="me-5 form-check">
                <input type="checkbox" class="form-check-input" id="kendaraan" disabled>
                <label class="form-check-label" for="kendaraan">Membawa Kendaraan Pribadi</label>
                <input type="checkbox" class="form-check-input" id="kendaraan" checked disabled>
                <label class="form-check-label" for="kendaraan">Dijemput MCTN</label>
            </div>
        </div>
        @endif

        @if ( $surat2->surat1->pengawalan == 'Ya' )
        <h4 class="fw-bold mt-4">Butuh Pengawalan</h4>
        <div class="container mx-5">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked disabled>
                <label class="form-check" for="inlineRadio1">Ya</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2" disabled>
                <label class="form-check" for="inlineRadio2">Tidak</label>
            </div>
        </div>

        @else
        <h4 class="fw-bold mt-4">Butuh Pengawalan</h4>
        <div class="container mx-5">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" disabled>
                <label class="form-check" for="inlineRadio1">Ya</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2" checked disabled>
                <label class="form-check" for="inlineRadio2">Tidak</label>
            </div>
        </div>

        @endif
        <div class="warning-box">
            <p>Para Tamu : PATUHI PERATURAN MASUK DURI FIELD PHR !!! MAKSIMUM KEGELAPAN KACA FILM MOBIL HANYA 40, BATAS MAKSIMUM KECEPATAN 40 KM/JAM</p>
        </div>
</body>
</html>
