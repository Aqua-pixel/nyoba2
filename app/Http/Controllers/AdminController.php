<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book; // Pastikan Anda memiliki model Book yang sudah dibuat sebelumnya

class AdminController extends Controller
{
    // public function index() {
    //     return view('admin/admin');
    // }

    public function index()
    {
        $books = Book::all();
        return view('admin.index', compact('books'));
    }

    public function edit($id)
    {
        $book = Book::find($id);
        return view('admin.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Update data buku
        $book = Book::find($id);
        $book->title = $request->input('title');
        $book->author = $request->input('author');

        if ($request->hasFile('image')) {
            // Upload gambar baru
            $imagePath = $request->file('image')->store('images/books');
            $book->image = $imagePath;
        }

        $book->save();

        return redirect()->route('admin.index')->with('success', 'Buku berhasil diperbarui.');
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Upload gambar buku
        $imagePath = $request->file('image')->store('images/books');

        // Simpan data buku baru
        $book = new Book;
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->image = $imagePath;
        $book->save();

        return redirect()->route('admin.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        // Hapus data buku
        $book = Book::find($id);
        $book->delete();

        return redirect()->route('admin.index')->with('success', 'Buku berhasil dihapus.');
    }
}

