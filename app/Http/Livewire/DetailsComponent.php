<?php

namespace App\Http\Livewire;

use App\Models\Images;
use App\Models\Product;
use Livewire\Component;
use Cart;

class DetailsComponent extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function store($productId, $productName, $productPrice)
    {
        Cart::add($productId, $productName, config('constant.defautl_add_to_cart_amount'), $productPrice)
            ->associate(Product::class);
        session()->flash('success_message', __('cart.added_success_msg'));

        return redirect()->route('cart');
    }

    public function render()
    {
        $product = Product::where('slug', $this->slug)->first();
        $images = Images::where('product_id', $product->id)->get();

        return view('livewire.details-component', compact('product', 'images'))->layout('layouts.base');
    }
}
