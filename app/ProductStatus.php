<?php

namespace App;

enum ProductStatus: int
{
    case Active = 1;
    case Inactive = -1;
    case Out_Of_Stock = 0;

    public function isActive(): bool
    {
        return $this === self::Active;
    }

    public function isInactive(): bool
    {
        return $this === self::Inactive;
    }

    public function isOutOfStock(): bool
    {
        return $this === self::Out_Of_Stock;
    }

    public function label(): string
    {
        return match ($this) {
            static::Active => 'Active',
            static::Inactive => 'Inactive',
            static::Out_Of_Stock => 'Out of stock',
        };
    }

    public function color()
    {
        return match ($this) {
            static::Active => 'green',
            static::Out_Of_Stock => 'gray',
            static::Inactive => 'red',
        };
    }
}
