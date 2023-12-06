
@extends('layouts.app')

@section('content')

<div class="container my-5">
    <div class="d-flex justify-content-center">
        <div class="card p-5 shadow-lg">
            <div class="card-body">
                <h1>TERIMA KASIH</h1>
                <span>Status: Terkirim</span><br><br>
                <span>MCTN REQ: <input type="text" value="{{ $kodeUnik }} {{ $kodeUnikkantor }}  " id="unique_key" disabled></span><i class="mdi mdi-content-copy border btn-secondary px-2 py-1 ms-2" onclick="copy()" style="border-radius: 5px"></i><br><br>
                <p>Silahkan simpan kode diatas untuk melihat status request anda di kolom status.</p>
                <p>Terima Kasih sudah mengirim pengajuan kunjungan ke PT Mandau Cipta Tenaga Nusantara</p>
                <a class="btn btn-primary mt-4" href="/pengajuan-tamu/create">Kembali</a>
            </div>
        </div>
    </div>
</div>
<script>
    function copy(){
        var copyText = document.getElementById("unique_key");
        copyText.select();
        copyText.setSelectionRange(0, 99999)
        navigator.clipboard.writeText(copyText.value);
        document.execCommand("copy");
        alert("Copied the text: " + copyText.value);

    }
</script>
@endsection

