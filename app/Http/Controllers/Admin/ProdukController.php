<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk; // Import Model agar kode lebih bersih
use App\Models\Kategori;
use App\Models\Penjual;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ProdukController extends Controller
{
    public function index()
    {
        // Mengambil data produk beserta relasinya
        $produks = Produk::with(['kategori', 'penjual'])->get();
        return view('admin.produk.index', compact('produks'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        $penjuals = Penjual::all();
        return view('admin.produk.create', compact('kategoris', 'penjuals'));
    }

public function store(Request $request)
{
    $request->validate([
        'nama_produk' => 'required',
        'kategori_id' => 'required',
        'penjual_id'  => 'required',
        'harga'       => 'required|numeric',
        'stok'        => 'required|integer',
        'foto'        => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validasi foto
    ]);

    $data = $request->all();

    // Logika Upload Foto
    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $nama_file = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/produk', $nama_file); // Simpan di storage/app/public/produk
        $data['foto'] = $nama_file;
    }

    Produk::create($data);

    return redirect()->route('admin.produk.index')->with('success', 'Produk dan Foto berhasil disimpan!');
}

public function edit($id)
{
    $produk = Produk::findOrFail($id);
    $kategoris = Kategori::all();
    $penjuals = Penjual::all();
    return view('admin.produk.edit', compact('produk', 'kategoris', 'penjuals'));
}

public function update(Request $request, $id): RedirectResponse
{
    $produk = Produk::findOrFail($id);
    
    $request->validate([
        'nama_produk' => 'required',
        'kategori_id' => 'required',
        'penjual_id'  => 'required',
        'harga'       => 'required|numeric',
        'stok'        => 'required|integer',
        'foto'        => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $data = $request->all();

    // Logika Update Foto
    if ($request->hasFile('foto')) {
        // Hapus foto lama jika ada
        if ($produk->foto && \Storage::exists('public/produk/' . $produk->foto)) {
            \Storage::delete('public/produk/' . $produk->foto);
        }
        
        $file = $request->file('foto');
        $nama_file = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/produk', $nama_file);
        $data['foto'] = $nama_file;
    }

    $produk->update($data);

    return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil diperbarui!');
}

    public function destroy($id): RedirectResponse
    {
        $produk = Produk::findOrFail($id);
        
        // Hapus foto jika ada
        if ($produk->foto && \Storage::exists('public/produk/' . $produk->foto)) {
            \Storage::delete('public/produk/' . $produk->foto);
        }
        
        $produk->delete();

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil dihapus!');
    }
}