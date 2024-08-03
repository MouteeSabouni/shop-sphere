<?php

use App\Models\Sku;
use App\Models\AttributeOption;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('attribute_option_sku', function (Blueprint $table) {
            $table->foreignIdFor(Sku::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(AttributeOption::class)->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attribute_option_sku');
    }
};
