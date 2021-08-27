<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Images;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

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
