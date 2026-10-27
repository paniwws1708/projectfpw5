<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-card>
                <h3 class="text-lg font-semibold mb-2">Ringkasan Hari Ini</h3>
                <p class="text-gray-600 mb-4">Selamat datang, {{ auth()->user()->name }}. Anda login sebagai <strong class="uppercase">{{ auth()->user()->role }}</strong>.</p>
                
                <!-- Contoh Pengujian Komponen Badge -->
                <div class="pt-4 border-t flex space-x-3 items-center">
                    <span class="text-sm text-gray-500 font-medium">Contoh Status Stok:</span>
                    <x-badge type="aman">Stok Aman</x-badge>
                    <x-badge type="menipis">Stok Menipis</x-badge>
                    <x-badge type="habis">Stok Habis</x-badge>
                </div>
            </x-card>
        </div>
    </div>
</x-app-layout>