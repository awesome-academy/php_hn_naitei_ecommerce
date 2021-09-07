<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Images;
use App\Models\Product;
use Livewire\Component;
use Cart;
use Livewire\WithPagination;

class ShopComponent extends Component
{
    public $sorting;
    public $pagesize;
    use WithPagination;

    public function mount()
    {
        $this->sorting = config('constant.default_sorting');
        $this->pagesize = config('constant.default_pagesize');
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id, $product_name, config('constant.defautl_add_to_cart_amount'), $product_price)
            ->associate(Product::class);
        session()->flash('success_message', __('cart.added_success_msg'));

        return redirect()->route('cart');
    }

    public function render()
    {
        if ($this->sorting == 'date') {
            $products = Product::orderby('created_at', 'DESC')->paginate($this->pagesize);
        } elseif ($this->sorting == 'price') {
            $products = Product::orderby('regular_price', 'ASC')->paginate($this->pagesize);
        } elseif ($this->sorting == 'price-desc') {
            $products = Product::orderby('regular_price', 'DESC')->paginate($this->pagesize);
        } else {
            $products = Product::paginate($this->pagesize);
        }
        
        $categories = Category::all();

        return view('livewire.shop-component', compact('products', 'categories'))->layout('layouts.base');
    }
}
