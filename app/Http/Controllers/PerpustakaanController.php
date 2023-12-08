<?php

namespace App\Http\Controllers;

use App\Models\Perpustakaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PerpustakaanController extends Controller
{
    public function index()
    {
        $perpustakaans = Perpustakaan::all();
        return view('perpustakaan', compact('perpustakaans'));
    }

    public function create()
    {
        return view('perpustakaan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string',
            'pengarang' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $gambarPath = $request->file('gambar')->store('images/perpustakaan');

        Perpustakaan::create([
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('perpustakaan.index')->with('success', 'Data perpustakaan berhasil ditambahkan.');
    }

    public function show($id)
    {
        $perpustakaan = Perpustakaan::findOrFail($id);
        return view('perpustakaan.show', compact('perpustakaan'));
    }

    public function edit($id)
    {
        $perpustakaan = Perpustakaan::findOrFail($id);
        return view('perpustakaan.edit', compact('perpustakaan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string',
            'pengarang' => 'required|string',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $perpustakaan = Perpustakaan::findOrFail($id);

        if ($request->hasFile('gambar')) {
            Storage::delete($perpustakaan->gambar);
            $gambarPath = $request->file('gambar')->store('images/perpustakaan');
            $perpustakaan->update([
                'gambar' => $gambarPath,
            ]);
        }

        $perpustakaan->update([
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
        ]);

        return redirect()->route('perpustakaan.index')->with('success', 'Data perpustakaan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $perpustakaan = Perpustakaan::findOrFail($id);
        Storage::delete($perpustakaan->gambar);
        $perpustakaan->delete();

        return redirect()->route('perpustakaan.index')->with('success', 'Data perpustakaan berhasil dihapus.');
    }
}
