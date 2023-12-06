<!DOCTYPE html>
<html>
<head>
    <title>Pesan Email Notifikasi</title>
</head>
<body>
    <p>Halo, Mohon Maaf Pengajuan Kunjungan Anda Ditolak </p>

    {{-- <ul>
        <li><strong>Nama Tamu:</strong> {{ $surat1->nama_tamu }}</li>
        <li><strong>Email Tamu:</strong> {{ $surat1->email_tamu }}</li>
        <li><strong>No HP Tamu:</strong> {{ $surat1->no_hp_tamu }}</li>
        <li><strong>Asal Perusahaan:</strong> {{ $surat1->asal_perusahaan }}</li>
        <li><strong>Periode:</strong> {{ $surat1->periode->tanggal_masuk }} - {{ $surat1->periode->tanggal_keluar }}</li>
        <li><strong>Jam Kedatangan:</strong> {{ $surat1->periode->jam_kedatangan }}</li>
        <li><strong>Keperluan:</strong> {{ $surat1->tujuan_keperluan }}</li>
        <li><strong>Daerah Kunjungan:</strong> Ladang Minyak Duri - MCTN</li>
        <li><strong>Alasan:</strong> {{ $surat1->alasan }}</li>
    </ul> --}}



</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Pesan Email Notifikasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;

            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            padding: 60px;
            margin: 40px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        img {
            width: 120px;
        }

        h2 {
            color: #333;
        }

        p {
            margin: 10px 0;
            color: #555;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }

        a {
            display: inline-block;
            text-align: center;
            padding: 10px 20px;
            text-decoration: none;
            background-color: #097B96;
            color: #fff;
            border-radius: 5px;
        }

        a:hover {
            background-color: #0B6E86;
        }
    </style>
</head>
<body>
        <center><img src="https://mctn.co.id/wp-content/uploads/2023/05/MCTN.png"></center>
    <div class="container">
        <h2>Hello!</h2>
        <p>Yang Terhormat Bapak/Ibu</p>
        <ul>
            <p>Halo, Mohon Maaf Pengajuan Kunjungan Anda Ditolak </p>
        </ul>
        <p>Silahkan Melakukan Pengajuan Ulang </p>
        <ul>
            <li>Info lebih lanjut hubungi PT MCTN (021) 22760235</li>
            <li>Terima kasih,</li>
            <li>PT Mandau Cipta Tenaga Nusantara</li>
        </ul>
    </div>
</body>
</html>

