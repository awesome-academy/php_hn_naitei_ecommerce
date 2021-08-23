<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class AdminProductComponent extends Component
{
    use WithPagination;

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
        session()->flash('message', __('admin-product.success_delete'));
    }

    public function render()
    {
        $products = Product::paginate(config('constant.default_pagesize_product'));

        return view('livewire.admin.admin-product-component', compact('products'))->layout('layouts.base');
    }
}
