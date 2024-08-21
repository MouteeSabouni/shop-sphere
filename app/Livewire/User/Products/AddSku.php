<?php

namespace App\Livewire\User\Products;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use App\Livewire\Traits\Attributable;

class AddSku extends Component
{
    use WithFileUploads, Attributable;

    public Product $product;

    public $categories;

    public $code;
    public $price;
    public $quantity;
    public $warranty;
    public $weight;
    public $width;
    public $height;
    public $thickness;
    public $color;

    #[Validate]
    public $photos;

    protected $rules = [
        'code' => 'required|string|regex:/^[A-Za-z]{2}[0-9]{2}[A-Za-z]{2}[0-9]{2}$/',
        'price' => 'required|numeric',
        'quantity' => 'required|integer',
        'warranty' => 'nullable|string|min:3|max:255',
        'weight' => 'required|numeric',
        'width' => 'required|numeric',
        'height' => 'required|numeric',
        'thickness' => 'required|numeric',
        'color' => 'required|string|min:3|max:100',
        'photos' => 'required',
        'photos.*' => 'image|max:2048|extensions:jpg,jpeg,png,gif,bmp,webp,tiff,tif,svg',
    ];

    public function mount()
    {
        $this->categories = $this->product->categories;
        $this->addedAttributes = new Collection();

    }

    public function addSku()
    {
        $this->validate();

        $sku = $this->product->skus()->create([
            'product_id' => $this->product->id,
            'code' => $this->code,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'warranty' => $this->warranty ?? 'No warranty for this product.',
            'weight' => $this->weight,
            'width' => $this->width,
            'height' => $this->height,
            'thickness' => $this->thickness,
            'status' => 1,
            'color' => $this->color,
        ]);

        $this->attachAttributes($sku);

        foreach ($this->photos as $photo) {
            $hash = str()->random(5);
            $photo->storeAs(path: 'public/photos', name: $photo->getClientOriginalName() . $hash);

            Image::create([
                'sku_id' => $sku->id,
                'url' => asset('storage/photos/' . $photo->getClientOriginalName() . $hash),
            ]);
        }

        $this->reset([
            'price', 'quantity', 'warranty', 'weight',
            'width', 'height', 'thickness', 'color', 'photos',
        ]);

        $this->redirect('/products/newest');
    }
    public function render()
    {
        return view('livewire.user.products.add-sku');
    }
}
