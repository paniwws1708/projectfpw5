<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function create()
    {
        $products = Product::orderBy('name')->get();
        $suppliers = Supplier::orderBy('name')->get();

        return view('master-data.purchase.create', compact('products', 'suppliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'supplier_id'    => 'required|exists:suppliers,id',
            'product_id'     => 'required|exists:products,id',
            'qty'            => 'required|integer|min:1',
            'purchase_price' => 'required|numeric|gt:0',
            'purchase_date'  => 'required|date',
        ]);

        $totalPrice = $request->qty * $request->purchase_price;

        Purchase::create([
            'supplier_id'    => $request->supplier_id,
            'product_id'     => $request->product_id,
            'qty'            => $request->qty,
            'purchase_price' => $request->purchase_price,
            'total_price'    => $totalPrice,
            'purchase_date'  => $request->purchase_date,
        ]);

        // Otomatis Tambah Stok Produk
        $product = Product::findOrFail($request->product_id);
        $product->increment('stock', $request->qty);

        return redirect()->route('purchases.create')->with('success', 'Pembelian berhasil dicatat & stok produk otomatis bertambah!');
    }
    public function index()
    {
        // Ganti 'purchases.index' sesuai dengan nama folder/file view kamu
        return view('master-data.purchase.index');
    }
}