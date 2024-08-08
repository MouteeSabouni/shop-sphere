<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function cart()
    {
        return $this->belongsTo(User::class);
    }

    public function numberOfItems()
    {
        $numberOfItems = 0;
        foreach ($this->items as $item) {
            $numberOfItems += $item->quantity;
        }

        return $numberOfItems;
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function totalItems()
    {
        $totalItems = 0;
        foreach ($this->items as $item) {
            $totalItems += $item->quantity;
        }

        return $totalItems;
    }

    public function statusIcon()
    {
        if($this->status === 'Pending') return '/images/order-status/pending.svg';
        elseif($this->status === 'Out for delivery') return '/images/order-status/out-for-delivery.svg';
        elseif($this->status === 'Delivered') return '/images/order-status/delivered.svg';
        elseif($this->status === 'Cancelled') return '/images/order-status/cancelled.svg';
        elseif($this->status === 'Return requested') return '/images/order-status/pending.svg';
        elseif($this->status === 'Returned') return '/images/order-status/returned.svg';
    }
}
