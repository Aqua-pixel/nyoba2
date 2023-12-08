<!-- resources/views/perpustakaan/index.blade.php -->
@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+Wy2Q8v6+UZl5Pz9zXRi0JqU6tZLs0FZxqU" crossorigin="anonymous">

    <div class="container mt-5">
        <h1>Daftar Perpustakaan</h1>

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
                </tr>
            </thead>
            <tbody>
                @forelse($perpustakaans as $perpustakaan)
                    <tr>
                        <td>{{ $perpustakaan->id }}</td>
                        <td>{{ $perpustakaan->judul }}</td>
                        <td>{{ $perpustakaan->pengarang }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $perpustakaan->gambar) }}" alt="{{ $perpustakaan->judul }}" style="max-width: 100px;">
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Tidak ada data perpustakaan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
