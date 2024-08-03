<?php

namespace App\Models;

use App\ProductStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'status' => ProductStatus::class,
        ];
    }

    public function seller()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function specification()
    {
        return $this->hasOne(Specification::class);
    }

    public function skus()
    {
        return $this->hasMany(Sku::class);
    }

    public function categories(): MorphToMany
    {
        return $this->morphedByMany(Category::class, 'productable');
    }
}
