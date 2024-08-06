<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($address) {
            if (is_null($address->name) || empty($address->name)) {
                $user = $address->user;
                $addressesCount = $user->addresses()->count() + 1;
                $address->name = 'Address #' . $addressesCount;
            }
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
