<?php

namespace App\Http\Livewire;

use App\Models\Images;
use App\Models\Product;
use Livewire\Component;

class DetailsComponent extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        $product = Product::where('slug', $this->slug)->first();
        $images = Images::where('product_id', $product->id)->get();

        return view('livewire.details-component', compact('product', 'images'))->layout('layouts.base');
    }
}
