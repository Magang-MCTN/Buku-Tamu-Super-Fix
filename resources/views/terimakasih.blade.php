@extends('layouts.app')

@section('content')

<div class="container my-5">
    <div class="d-flex justify-content-center">
        <div class="card p-5 shadow-lg">
            <div class="card-body">
                <h1>TERIMA KASIH</h1>
                <span>Status: Terkirim</span><br><br>
                <p>Silahkan cek Email secara berkala untuk melihat status pengajuan kunjungan anda</p>
                <p>Terima Kasih sudah mengirim pengajuan kunjungan ke PT Mandau Cipta Tenaga Nusantara</p>
                <a class="btn btn-primary mt-4" href="/pengajuan-tamu/create">Kembali</a>
            </div>
        </div>
    </div>
</div>

@endsection
