<?php

namespace App\Livewire\Traits;

trait Scrollable
{
    public function scrollLeft($itemsToScroll)
    {
        $this->currentIndex = $this->currentIndex - $itemsToScroll;
    }

    public function scrollRight($itemsToScroll)
    {
        $this->currentIndex = $this->currentIndex + $itemsToScroll;
    }
}
