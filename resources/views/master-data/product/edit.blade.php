
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Ubah Produk
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <x-card>
                <form action="{{ route('products.update', $product) }}"
                      method="POST"
                      class="space-y-4">

                    @csrf
                    @method('PUT')

                    {{-- Kategori --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">
                            Kategori
                        </label>

                        <select name="category_id"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    @selected(old('category_id', $product->category_id) == $category->id)>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>

                        @error('category_id')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Kode Produk --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">
                            Kode Produk
                        </label>

                        <input type="text"
                               name="code"
                               value="{{ old('code', $product->code) }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">

                        @error('code')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Nama Produk --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">
                            Nama Produk
                        </label>

                        <input type="text"
                               name="name"
                               value="{{ old('name', $product->name) }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">

                        @error('name')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Satuan, Harga, dan Stok --}}
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">
                                Satuan
                            </label>

                            <input type="text"
                                   name="unit"
                                   value="{{ old('unit', $product->unit) }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">

                            @error('unit')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">
                                Harga
                            </label>

                            <input type="number"
                                   name="price"
                                   value="{{ old('price', $product->price) }}"
                                   min="0"
                                   step="any"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">

                            @error('price')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">
                                Stok
                            </label>

                            <input type="number"
                                   name="stock"
                                   value="{{ old('stock', $product->stock) }}"
                                   min="0"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">

                            @error('stock')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Tombol --}}
                    <div class="flex items-center gap-3">
                        <button type="submit"
                                class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
                            Simpan Perubahan
                        </button>

                        <a href="{{ route('products.index') }}"
                           class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300">
                            Batal
                        </a>
                    </div>
                </form>
            </x-card>
        </div>
    </div>
</x-app-layout>
