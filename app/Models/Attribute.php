<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attribute extends Model
{
    use HasFactory;

    protected $fiilable = [
        'name',
    ];

    public function attributeOptions(): HasMany
    {
        return $this->hasMany(AttributeOption::class);
    }
}
