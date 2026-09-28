<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Daftar Kategori
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @foreach ($categories as $category)
                <div class="mb-4">
                    <p>{{ $category->name }}</p>
                </div>
            @endforeach

        </div>
    </div>
</x-app-layout>