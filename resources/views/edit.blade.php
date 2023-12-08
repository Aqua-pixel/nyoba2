<!-- resources/views/admin/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Edit Buku</h1>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.update', $book->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}">
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Pengarang</label>
            <input type="text" class="form-control" id="author" name="author" value="{{ $book->author }}">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Gambar</label>
            <input type="file" class="form-control" id="image" name="image">
            <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}" style="max-width: 100px;">
        </div>
        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
@endsection
