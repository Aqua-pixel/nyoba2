<!-- resources/views/admin/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Daftar Buku</h1>

    <a href="{{ route('admin.create') }}" class="btn btn-primary">Tambah Buku</a>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}" style="max-width: 100px;">
                    </td>
                    <td>
                        <a href="{{ route('admin.edit', $book->id) }}" class="btn btn-warning">Edit</a>
                        <a href="{{ route('admin.destroy', $book->id) }}" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
