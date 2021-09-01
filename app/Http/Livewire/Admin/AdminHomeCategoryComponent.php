<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\HomeCategory;
use Livewire\Component;

class AdminHomeCategoryComponent extends Component
{
    public $selectedCategories = [];
    public $noOfProducts;

    protected $rules = [
        'noOfProducts' => 'required|numeric',
    ];

    public function messages()
    {
        return [
            'noOfProducts.required' => __('categories.no_of_products_required'),
            'noOfProducts.numeric' => __('categories.numeric'),
        ];
    }

    public function mount()
    {
        $category = HomeCategory::find(config('constant.first_home_cate'));
        $this->selectedCategories = explode(',', $category->sel_categories);
        $this->noOfProducts = $category->no_of_products;
    }

    public function updateHomeCategory()
    {
        $this->validate();
        $category = HomeCategory::find(config('constant.first_home_cate'));
        $category->sel_categories = implode(',', $this->selectedCategories);
        $category->no_of_products = $this->noOfProducts;
        $category->save();
        session()->flash('message', __('categories.home_cate_updated_success_msg'));
    }

    public function render()
    {
        $categories = Category::all();

        return view('livewire.admin.admin-home-category-component', compact('categories'))->layout('layouts.base');
    }
}
