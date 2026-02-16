<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Produk Baru</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label class="block font-bold mb-2">Nama Produk</label>
                        <input type="text" name="nama_produk" class="w-full border border-gray-300 rounded p-2" value="{{ old('nama_produk') }}" required>
                        @error('nama_produk')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-bold mb-2">Kategori</label>
                        <select name="kategori_id" class="w-full border border-gray-300 rounded p-2" required>
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($kategoris as $kat)
                                <option value="{{ $kat->kategori_id }}" {{ old('kategori_id') == $kat->kategori_id ? 'selected' : '' }}>
                                    {{ $kat->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-bold mb-2">Toko Penjual</label>
                        <select name="penjual_id" class="w-full border border-gray-300 rounded p-2" required>
                            <option value="">-- Pilih Toko --</option>
                            @foreach($penjuals as $pen)
                                <option value="{{ $pen->penjual_id }}" {{ old('penjual_id') == $pen->penjual_id ? 'selected' : '' }}>
                                    {{ $pen->nama_toko }}
                                </option>
                            @endforeach
                        </select>
                        @error('penjual_id')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block font-bold mb-2">Harga</label>
                            <input type="number" name="harga" class="w-full border border-gray-300 rounded p-2" value="{{ old('harga') }}" required>
                            @error('harga')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block font-bold mb-2">Stok</label>
                            <input type="number" name="stok" class="w-full border border-gray-300 rounded p-2" value="{{ old('stok') }}" required>
                            @error('stok')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block font-bold mb-2">Foto Produk</label>
                        <input type="file" name="foto" class="w-full border border-gray-300 rounded p-2" accept="image/*">
                        <p class="text-xs text-gray-500 mt-1">*Format: jpg, png, jpeg. Maks 2MB.</p>
                        @error('foto')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex gap-4">
                        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded font-semibold">
                            Simpan Produk
                        </button>
                        <a href="{{ route('admin.produk.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white px-6 py-2 rounded font-semibold">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>