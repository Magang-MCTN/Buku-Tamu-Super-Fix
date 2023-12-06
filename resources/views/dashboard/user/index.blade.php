@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Pengguna</h2>
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-3">Tambah Pengguna</a>

    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role->keterangan_role }}</td>
                <td>
                    <a href="{{ route('admin.users.edit', $user->id_user) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('admin.users.destroy', $user->id_user) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
