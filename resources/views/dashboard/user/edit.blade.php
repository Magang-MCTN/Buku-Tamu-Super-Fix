@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Pengguna</h2>

    <form action="{{ route('admin.users.update', $user->id_user) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
        </div>
        <div class="form-group">
            <label for="role">Role</label>
            <select class="form-control" id="role" name="role" required>
                @foreach($roles as $role)
                    <option value="{{ $role->id_role }}" @if($user->id_role == $role->id_role) selected @endif>{{ $role->keterangan_role }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
