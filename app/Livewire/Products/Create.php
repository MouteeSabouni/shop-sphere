<?php

namespace App\Livewire\Products;

use Livewire\Component;
use App\Models\Image;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\Attribute;
use Livewire\WithFileUploads;
use App\Models\AttributeOption;
use Livewire\Attributes\Validate;
use Illuminate\Support\Collection;
use App\Livewire\Traits\Attributable;
use App\Rules\Collection as CollectionRule;



class Create extends Component
{
    use WithFileUploads, Attributable;

    public $category_name;
    public Collection $selectedCategories;

    public $brand_name;

    public $product_name;
    public $description;
    public $material;
    public $manufacturer;

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
        'brand_name' => 'required|string|min:3|max:100',
        'product_name' => 'required|string|min:10|max:255',
        'description' => 'required|string|min:10|max:500',
        'material' => 'required|string|min:3|max:100',
        'manufacturer' => 'required|string|min:3|max:100',
        'code' => 'required|string|regex:/^[A-Za-z]{2}[0-9]{2}[A-Za-z]{2}[0-9]{2}$/',
        'price' => 'required|numeric',
        'quantity' => 'required|integer',
        'warranty' => 'string|min:3|max:255',
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
        $this->selectedCategories = new Collection();
        $this->addedAttributes = new Collection();
    }

    public function addNewCategory()
    {
        $this->category_name = ucfirst(strtolower($this->category_name));

        $category = Category::firstOrCreate(['name' => $this->category_name]);

        if(! $this->selectedCategories->contains('id', $category->id)) {
            $this->selectedCategories->push($category);
        }

        $this->reset('category_name');
    }

    public function removeCategory($categoryId)
    {
        $this->selectedCategories = $this->selectedCategories->reject(function ($category) use ($categoryId) {
            return $category->id === $categoryId;
        });

        $category = Category::whereId($categoryId)->first();
        if($category->products->count() === 0) $category->delete();
    }

    public function addProduct()
    {
        $this->validate();

        $this->validate([
            'selectedCategories' => new CollectionRule,
        ]);

        $this->brand_name = ucwords(strtolower($this->brand_name));

        $brand = Brand::firstOrCreate(
            ['name' => $this->brand_name],
            ['user_id' => auth()->id()]
        );

        $product = Product::firstOrCreate([
            'user_id' => auth()->id(),
            'brand_id' => $brand->id,
            'name' => $this->product_name,
            'description' => $this->description,
            'material' => $this->material,
            'manufacturer' => $this->manufacturer,
        ]);

        $categoryIds = $this->selectedCategories->pluck('id');

        $product->categories()->attach($categoryIds);

        $sku = $product->skus()->create([
            'product_id' => $product->id,
            'code' => $this->code,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'warranty' => $this->warranty,
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

        $this->redirect('/products/newest');
    }

    public function render()
    {
        return view('livewire.products.create');
    }
}
