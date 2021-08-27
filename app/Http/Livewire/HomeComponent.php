<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\HomeCategory;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $category = HomeCategory::find(config('constant.first_home_cate'));
        $categories = Category::whereIn('id', explode(',', $category->sel_categories))->get();
        $noOfProducts = $category->no_of_products;

        return view('livewire.home-component', compact('categories', 'noOfProducts'))->layout('layouts.base');
    }
}
