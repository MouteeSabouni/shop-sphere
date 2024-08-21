<?php

namespace App\Livewire\Traits;

use App\Models\Attribute;
use App\Models\AttributeOption;

trait Attributable
{
    public $attribute_name;
    public $attribute_value;
    public $addedAttributes;

    public function addNewAttribute()
    {
        $this->validate([
            'attribute_name' => 'required|string|min:3|max:255',
            'attribute_value' => 'required|string|min:3|max:255',
        ]);

        $this->attribute_name = ucfirst(strtolower($this->attribute_name));
        $this->attribute_value = ucfirst(strtolower($this->attribute_value));

        $attribute = Attribute::firstOrCreate(['name' => $this->attribute_name]);
        $attributeOption = AttributeOption::firstOrCreate(['attribute_id' => $attribute->id, 'value' => $this->attribute_value]);

        if(! $this->addedAttributes->contains($attribute->name)) {
            $this->addedAttributes[$attribute->name] = $attributeOption->value;
        }

        $this->reset(['attribute_name', 'attribute_value']);
    }

    public function removeAttribute($name, $value)
    {
        $this->addedAttributes = $this->addedAttributes->reject(function () use ($name, $value) {
            return $this->addedAttributes[$name] === $value;
        });

        $attribute = Attribute::where('name', $name)->first();
        $attributeOption = AttributeOption::where('value', $value)
            ->where('attribute_id', $attribute->id)
            ->first();

        if($attributeOption->skus()->count() === 0)
        {
            $attributeOption->delete();
            if ($attribute->options()->count() === 0) $attribute->delete();
        }
    }

    public function attachAttributes($sku)
    {
        if($this->addedAttributes->count() > 0) {
            foreach($this->addedAttributes as $attributeName => $attributeValue) {
                $attribute = Attribute::where('name', $attributeName)->first();
                $attributeOption = AttributeOption::where('value', $attributeValue)
                    ->where('attribute_id', $attribute->id)
                    ->first();

                $sku->attributeOptions()->attach($attributeOption->id);
            }
        }
    }
}
