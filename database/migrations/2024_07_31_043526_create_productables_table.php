<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Product;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('productables', function (Blueprint $table) {
            $table->foreignIdFor(Product::class)->constrained()->cascadeOnDelete();
            $table->morphs('productable');
            $table->primary(['product_id' , 'productable_id', 'productable_type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productables');
    }
};
