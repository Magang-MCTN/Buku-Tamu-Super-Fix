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

        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: rgb(133, 225, 112)2, 212, 8; /* Warna latar belakang kuning */
        }
    </style>
</head>
<body>
    {{-- <h1>Cetak Surat Izin Masuk PT MCTN</h1> --}}
    <p style="text-align: center;"><strong>Form Izin Masuk {{ $surat2->surat1->lokasi->nama_lokasi }}</strong></p>

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



</body>
</html>
