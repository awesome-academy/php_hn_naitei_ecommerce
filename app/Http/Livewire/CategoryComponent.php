<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Images;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class CategoryComponent extends Component
{
    public $sorting;
    public $pagesize;
    public $categorySlug;

    public function mount($categorySlug)
    {
        $this->sorting = config('constant.default_sorting');
        $this->pagesize = config('constant.default_pagesize');
        $this->categorySlug = $categorySlug;
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id, $product_name, config('constant.defautl_add_to_cart_amount'), $product_price)
            ->associate(Product::class);
        session()->flash('success_message', __('cart.added_success_msg'));

        return redirect()->route('cart');
    }

    use WithPagination;
    public function render()
    {
        $category = Category::where('slug', $this->categorySlug)->first();
        $categoryId = $category->id;
        $categoryName = $category->name;

        if ($this->sorting == 'date') {
            $products = Product::where('category_id', $categoryId)->orderby('created_at', 'DESC')
                ->paginate($this->pagesize);
        } elseif ($this->sorting == 'price') {
            $products = Product::where('category_id', $categoryId)->orderby('regular_price', 'ASC')
                ->paginate($this->pagesize);
        } elseif ($this->sorting == 'price-desc') {
            $products = Product::where('category_id', $categoryId)->orderby('regular_price', 'DESC')
                ->paginate($this->pagesize);
        } else {
            $products = Product::where('category_id', $categoryId)->paginate($this->pagesize);
        }
        
        $categories = Category::all();

        return view('livewire.category-component', compact('products', 'categories', 'categoryName'))
            ->layout('layouts.base');
    }
}
