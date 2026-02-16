<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('admin.kategori.create') }}" class="bg-blue-600 hover:bg-blue-700 text-gray font-bold py-2 px-4 rounded shadow">Tambah Kategori</a>
            
            <table class="min-w-full mt-4 bg-white border">
                <thead>
                    <tr>
                        <th class="border px-4 py-2">ID</th>
                        <th class="border px-4 py-2">Nama Kategori</th>
                        <th class="border px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kategoris as $k)
                        <tr> <td class="border px-4 py-2 text-center">{{ $k->kategori_id }}</td> <td class="border px-4 py-2">{{ $k->nama_kategori }}</td> <td class="border px-4 py-2 flex gap-2">
                            <a href="{{ route('admin.kategori.edit', $k->kategori_id) }}" class="bg-blue-600 hover:bg-blue-700 text-gray font-bold py-2 px-4 rounded shadow">Edit</a>

                            <form action="{{ route('admin.kategori.destroy', $k->kategori_id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-gray font-bold py-2 px-4 rounded shadow">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>