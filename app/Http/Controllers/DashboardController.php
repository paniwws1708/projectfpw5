<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Data Ringkasan Card
        $omzetHariIni = Transaction::whereDate('created_at', today())->sum('total');
        $omzetKemarin = Transaction::whereDate('created_at', today()->subDay())->sum('total');
        $transaksiHariIni = Transaction::whereDate('created_at', today())->count();
        $produkMenipis = Product::where('stock', '<', 10)->count();

        // 2. Data Grafik Tren Penjualan 7 Hari Terakhir
        $tren = Transaction::selectRaw('DATE(created_at) as tanggal, SUM(total) as total')
            ->where('created_at', '>=', now()->subDays(6)->startOfDay())
            ->groupBy('tanggal')
            ->orderBy('tanggal')
            ->get();

        $labelTren = collect(range(6, 0))->map(fn ($i) => now()->subDays($i)->format('Y-m-d'));
        $dataTren = $labelTren->map(function ($tanggal) use ($tren) {
            return optional($tren->firstWhere('tanggal', $tanggal))->total ?? 0;
        });

        // 3. Data Produk Terlaris
        $produkTerlaris = Product::select('products.name', 'products.id')
            ->selectRaw('SUM(transaction_details.qty) as total_qty')
            ->join('transaction_details', 'transaction_details.product_id', '=', 'products.id')
            ->groupBy('products.id', 'products.name')
            ->orderByDesc('total_qty')
            ->take(5)
            ->get();

        // Kirim SELURUH 7 variabel ke view
        return view('dashboard', compact(
            'omzetHariIni', 
            'omzetKemarin', 
            'transaksiHariIni', 
            'produkMenipis',
            'labelTren', 
            'dataTren', 
            'produkTerlaris'
        ));
    }
}