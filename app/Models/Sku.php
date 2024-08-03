<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Sku extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function attributeOptions(): BelongsToMany
    {
        return $this->belongsToMany(AttributeOption::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    public function favoritedBy(): belongsToMany
    {
        return $this->belongsToMany(User::class, 'favorites');
    }

    public function cartedBy(): belongsToMany
    {
        return $this->belongsToMany(User::class, 'carts');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function reviewers()
    {
        return $this->belongsToMany(User::class, 'reviews')
                    ->withPivot('review', 'rating')
                    ->withTimestamps();
    }

    public function cart(): HasMany
    {
        return $this->hasMany(Cart::class);
    }

    public function rating()
    {
        $total = $this->reviews()->sum('rating');

        $rating = $total/$this->reviews()->count();

        $rating = number_format($rating, 1);

        return $rating;
    }
}
