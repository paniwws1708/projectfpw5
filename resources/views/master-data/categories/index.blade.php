<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800">
                Daftar Kategori
            </h2>
            <a href="{{ route('categories.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium px-4 py-2 rounded-md text-sm transition">
                + Tambah Kategori
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-card>
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead class="bg-gray-50 text-gray-500 font-medium">
                            <tr>
                                <th class="px-6 py-4 w-20">No</th>
                                <th class="px-6 py-4">Nama Kategori</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 bg-white">
                            @forelse ($categories as $index => $category)
                                <tr>
                                    <td class="px-6 py-4 text-gray-600">
                                        {{ $categories->firstItem() ? $categories->firstItem() + $index : $index + 1 }}
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-gray-900">
                                        {{ $category->name }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="px-6 py-4 text-center text-gray-500">
                                        Belum ada data kategori.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if (method_exists($categories, 'hasPages') && $categories->hasPages())
                    <div class="mt-4">
                        {{ $categories->links() }}
                    </div>
                @endif
            </x-card>
        </div>
    </div>
</x-app-layout>