<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;

class SearchComponent extends Component
{
    use WithPagination;
    public $sorting;
    public $pagesize;
    public $search;
    public $product_cate;
    public $product_cate_id;

    public function mount()
    {
        $this->sorting = config('constant.default_sorting');
        $this->pagesize = config('constant.default_pagesize');
        $this->fill(request()->only('search', 'product_cate', 'product_cate_id'));
    }

    public function render()
    {
        if ($this->sorting == 'date') {
            $products = Product::where('name', 'like', '%' . $this->search . '%')
                ->where('category_id', 'like', '%' . $this->product_cate_id . '%')
                ->orderBy('created_at', 'DESC')
                ->paginate($this->pagesize);
        } elseif ($this->sorting == 'price') {
            $products = Product::where('name', 'like', '%' . $this->search . '%')
                ->where('category_id', 'like', '%' . $this->product_cate_id . '%')
                ->orderBy('regular_price', 'ASC')
                ->paginate($this->pagesize);
        } elseif ($this->sorting == 'price-desc') {
            $products = Product::where('name', 'like', '%' . $this->search . '%')
                ->where('category_id', 'like', '%' . $this->product_cate_id . '%')
                ->orderBy('regular_price', 'DESC')
                ->paginate($this->pagesize);
        } else {
            $products = Product::where('name', 'like', '%' . $this->search . '%')
                ->where('category_id', 'like', '%' . $this->product_cate_id . '%')
                ->paginate($this->pagesize);
        }

        $categories = Category::all();

        return view('livewire.search-component', compact('products', 'categories'))->layout('layouts.base');
    }
}
