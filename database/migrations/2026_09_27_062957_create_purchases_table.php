<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('purchases', function (Blueprint $table) {
           $table->id();
           $table->foreignId('supplier_id')->constrained()->cascadeOnDelete();
           $table->foreignId('product_id')->constrained()->cascadeOnDelete();
           $table->integer('qty');
           $table->decimal('purchase_price', 12, 2); // Harga beli per unit dari supplier
           $table->decimal('total_price', 12, 2);
           $table->date('purchase_date');
           $table->timestamps();  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
