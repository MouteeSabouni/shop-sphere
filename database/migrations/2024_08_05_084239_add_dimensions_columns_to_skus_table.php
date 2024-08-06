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
        Schema::table('skus', function (Blueprint $table) {
            $table->decimal('weight', 6, 2);
            $table->decimal('width', 5, 2);
            $table->decimal('height', 5, 2);
            $table->decimal('thickness', 5, 2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropColumns(['weight', 'width', 'height', 'thickness']);
    }
};
