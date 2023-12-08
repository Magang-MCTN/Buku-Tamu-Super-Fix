<!DOCTYPE html>
<html>
<head>
    <title>Pesan Email Notifikasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #dedede;

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
    <center><img src="https://mctn.co.id/wp-content/uploads/2023/11/LOGO-PLN-MCTN-2_-2048x722.png"></center>
    <div class="container">
        <h2>Hello!</h2>
        <p>Yang Terhormat Bapak/Ibu</p>
        <ul>
            <li>Pengajuan Kunjungan Anda Telah Disetujui Tuan Rumah, Silahkan klik link dibawah ini untuk menginput data diri tamu yang akan hadir ke perusahaan kami.</li>
        </ul>
        <center><a href="http://127.0.0.1:8000/pengajuan-tamu2?surat1_id={{ $surat1_id }}">Isi Surat 2</a></center>
        <ul>
            <li>Info lebih lanjut hubungi PT PLN MCTN (021) 22760235</li>
            <li>Terima kasih,</li>
            <li>PT PLN Mandau Cipta Tenaga Nusantara</li>
        </ul>
    </div>
</body>
</html>
