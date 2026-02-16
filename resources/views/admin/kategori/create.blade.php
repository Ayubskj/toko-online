<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Kategori Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('admin.kategori.store') }}" method="POST">
                    @csrf <div class="mb-4">
                        <label for="nama_kategori" class="block text-gray-700 font-bold mb-2">Nama Kategori:</label>
                        <input type="text" name="nama_kategori" id="nama_kategori" 
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                               placeholder="Contoh: Elektronik" required>
                        @error('nama_kategori')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-gray font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Simpan Kategori
                        </button>
                        <a href="{{ route('admin.kategori.index') }}" class="text-gray-600 hover:underline">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>