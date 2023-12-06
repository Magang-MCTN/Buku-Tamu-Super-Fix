@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Konfirmasi Hapus Pengguna</h2>

    <p>Anda yakin ingin menghapus pengguna ini?</p>

    <form action="{{ route('admin.users.destroy', $user->id_user) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Hapus</button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
