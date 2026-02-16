<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori; // Jangan lupa import Model-nya
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all(); // Ambil semua data kategori
        return view('admin.kategori.index', compact('kategoris'));
    }

    public function create()
    {
        return view('admin.kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nama_kategori' => 'required|max:30']);
        Kategori::create($request->all());
        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil ditambah!');
    }
public function edit($id)
{
    // Mengambil data kategori berdasarkan ID yang diklik
    $kategori = Kategori::findOrFail($id); 
    return view('admin.kategori.edit', compact('kategori'));
}

public function update(Request $request, $id)
{
    // Validasi data
    $request->validate(['nama_kategori' => 'required|max:30']);

    // Cari datanya dan update
    $kategori = Kategori::findOrFail($id);
    $kategori->update($request->all());

    // Kembali ke halaman index dengan pesan sukses
    return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil diperbarui!');
}
public function destroy($id)
{
    $kategori = Kategori::findOrFail($id);
    $kategori->delete();

    return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil dihapus!');
}
}
