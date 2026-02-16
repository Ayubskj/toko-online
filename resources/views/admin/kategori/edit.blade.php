<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Kategori') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('admin.kategori.update', $kategori->kategori_id) }}" method="POST">
                    @csrf
                    @method('PUT') <div class="mb-4">
                        <label for="nama_kategori" class="block text-gray-700 font-bold mb-2">Nama Kategori:</label>
                        <input type="text" name="nama_kategori" id="nama_kategori" 
                               value="{{ $kategori->nama_kategori }}" 
                               class="border rounded w-full py-2 px-3 text-gray-700" required>
                    </div>

                    <div class="flex items-center gap-4">
                        <button type="submit" class="bg-green-600 hover:bg-green-700 text-gray font-bold py-2 px-4 rounded shadow">
                            Update Kategori
                        </button>
                        <a href="{{ route('admin.kategori.index') }}" class="text-gray-600 hover:underline">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>