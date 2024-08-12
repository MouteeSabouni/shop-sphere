<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class User extends Authenticatable
{
    use HasFactory, Notifiable, HasSlug;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(['first_name', 'last_name'])
            ->saveSlugsTo('username')
            ->slugsShouldBeNoLongerThan(50);
    }

    public function favoriteProducts(): BelongsToMany
    {
        return $this->belongsToMany(Sku::class, 'favorites');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function cart(): HasMany
    {
        return $this->hasMany(Cart::class);
    }

    public function ordereItems(): HasMany
    {
        return $this->hasMany(OrderItems::class);
    }

    public function reviews(): hasMany
    {
        return $this->hasMany(Review::class);
    }

    public function testimony(): hasOne
    {
        return $this->hasOne(Testimony::class);
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function sellerRequest(): HasOne
    {
        return $this->hasOne(SellerRequest::class);
    }

    public function fullName(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function cartTotal()
    {
        $total = 0;
        foreach($this->cart as $item)
        {
            $total += $item->sku->price * $item->quantity;
        }

        return $total;
    }

    public function itemsInCart($sku = null)
    {
        if($sku){
            return $this->cart()->where('sku_id', $sku->id)->first()->quantity;
        }

        $items = 0;
        foreach($this->cart as $item)
        {
            $items += $item->quantity;
        }

        return $items;
    }
    public function canAddMore($sku, $itemsToAdd = 1)
    {
        $itemsInCart = $this->cart()->where('sku_id', $sku->id)->first()->quantity;

        return $itemsInCart + $itemsToAdd <= $sku->quantity ? true : false;
    }

    public function hasRated($skuId)
    {
        return $this->reviews()->pluck('sku_id')->contains($skuId) ? true : false;
    }

    public function hasOrdered($skuId)
    {
        return $this->orders()->where('status', 'Delivered')
        ->whereHas('items', function ($query) use ($skuId) {
            $query->where('sku_id', $skuId);
        })->exists();
    }
}
