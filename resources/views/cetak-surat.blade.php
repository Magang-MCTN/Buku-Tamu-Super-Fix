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
    </style>
</head>
<body>
    {{-- <h1>Cetak Surat Izin Masuk PT MCTN</h1> --}}
    <p style="text-align: center;"><strong>Form Izin Masuk Duri Field PHR - MCTN</strong></p>

    <div class="container">
        {{-- <p><strong>Kode Unik:</strong> {{ $surat2->kode_unik }}</p> --}}

        <p><strong>Kode Surat &nbsp;&nbsp;:</strong> {{ $surat2->kode_unik }}</p>
        <p><strong>Asal Perusahaan&nbsp;:</strong> {{ $surat2->surat1->asal_perusahaan }}</p>

        <p><strong>Periode &nbsp;&nbsp;:</strong> {{ $surat2->surat1->periode->tanggal_masuk->format('d-m-Y') }} s.d. {{ $surat2->surat1->periode->tanggal_keluar->format('d-m-Y') }}</p>
        <p><strong>Jam Kedatangan&nbsp;:</strong> {{ explode(' ', $surat2->surat1->periode->jam_kedatangan)[1] }}</p>
        <p><strong>Tujuan Keperluan&nbsp;:</strong> {{ $surat2->surat1->tujuan_keperluan }}</p>
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

        <div class="card mt-4">
            <div class="card-body">
                <h3>Kendaraan</h3>
                <p><strong>
                    @if ($surat2->surat1->kendaraan->isNotEmpty())
                        Membawa Kendaraan Pribadi
                    @else
                        Di Jemput MCTN.
                    @endif

                    @if ($surat2->surat1->pengawalan == 'ya')
                        Butuh Pengawalan
                    @elseif ($surat2->surat1->pengawalan == 'tidak')
                        Tidak Butuh Pengawalan
                    @else
                    Tidak Butuh Pengawalan
                    @endif </strong>
                </p>
            </div>
        </div>

</body>
</html>
