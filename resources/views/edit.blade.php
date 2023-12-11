<!-- resources/views/perpustakaan/edit.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Perpustakaan</title>
    <!-- Tambahkan link ke CSS atau Bootstrap jika diperlukan -->
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Perpustakaan</h1>

        @if($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('perpustakaan.update', $perpustakaan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="judul">Judul</label>
                <input type="text" id="judul" name="judul" value="{{ old('judul', $perpustakaan->judul) }}" required>
            </div>
            <div class="mb-3">
                <label for="pengarang">Pengarang</label>
                <input type="text" id="pengarang" name="pengarang" value="{{ old('pengarang', $perpustakaan->pengarang) }}" required>
            </div>
            <div class="mb-3">
                <label for="gambar">Gambar</label>
                <input type="file" id="gambar" name="gambar">
                <img src="{{ asset('storage/' . $perpustakaan->gambar) }}" alt="{{ $perpustakaan->judul }}" style="max-width: 100px;">
            </div>
            <button type="submit">Perbarui</button>
        </form>
    </div>
    <!-- Tambahkan script atau link ke JavaScript jika diperlukan -->
</body>
</html>
