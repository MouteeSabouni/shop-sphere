<?php

use App\Models\User;
use App\Models\Brand;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Brand::class)->constrained()->cascadeOnDelete();
            $table->string('name', 255);
            $table->string('slug', 255)->unique();
            $table->text('description');
            $table->enum('status', [1, -1, 0])->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
