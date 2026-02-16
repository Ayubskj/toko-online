<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Daftar Barang Jualan</h2>
                    <a href="{{ route('admin.produk.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-gray px-4 py-2 rounded-lg shadow">
                        + Tambah Produk
                    </a>
                </div>

                <table class="w-full border-collapse bg-white shadow-sm rounded-lg overflow-hidden">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 border-b">Foto</th> <th class="px-6 py-3 border-b">Nama Produk</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">Kategori</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">Harga</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">Stok</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider border-b">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($produks as $p)
                        <tr>
                            <td class="px-6 py-4">
                                @if($p->foto)
                                    <img src="{{ asset('storage/produk/' . $p->foto) }}" 
                                    alt="{{ $p->nama_produk }}" 
                                    class="w-20 h-20 object-cover rounded-lg shadow-sm">
                                @else
                                    <span class="text-gray-400 text-xs">Tidak ada foto</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $p->nama_produk }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    {{ $p->kategori->nama_kategori }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Rp {{ number_format($p->harga, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $p->stok }} Pcs</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium flex gap-2">
                                <a href="{{ route('admin.produk.edit', $p->produk_id) }}" class="text-blue-600 hover:text-blue-900 font-semibold">Edit</a>
                                <form action="{{ route('admin.produk.destroy', $p->produk_id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus barang ini?')" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 font-semibold">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>