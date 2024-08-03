<?php

use App\Models\Sku;
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
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Sku::class)->constrained()->cascadeOnDelete();
            $table->string('url');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
