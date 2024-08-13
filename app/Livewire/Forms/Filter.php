<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Sku;
use Livewire\Attributes\Url;
use Livewire\Attributes\Validate;

class Filter extends Form
{
    #[Url]
    public $min;
    #[Url]
    public $max;

    #[Url]
    public $rating;

    #[Url]
    public $from;
    #[Url]
    public $to;

    public function apply($query)
    {
        if(!is_null($this->min) && $this->max > $this->min) $this->applyPriceFilter($query);
        if(!is_null($this->rating)) $this->applyRatingFilter($query);
        if(!is_null($this->from) && !is_null($this->to)) $this->applyDateFilter($query);
    }

    public function applyPriceFilter($query)
    {
        $this->validate([
            'min' => 'numeric',
            'max' => 'numeric',
        ]);

        return $query->whereBetween('price', [$this->min, $this->max]);
    }

    public function applyRatingFilter($query)
    {
        $this->validate([
            'rating' => 'integer',
        ]);

        return $query->whereRaw('(SELECT SUM(rating)/COUNT(*) FROM reviews WHERE reviews.sku_id = skus.id) >= ?', $this->rating);

    }

    public function applyDateFilter($query)
    {
        $this->validate([
            'from' => 'date',
            'to' => 'date'
        ]);

        return $query->whereBetween('created_at', [$this->from, $this->to]);
    }

    public function clear()
    {
        $this->reset(['min', 'max', 'rating', 'from', 'to']);
    }
}
