<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AdminEditCategoryComponent extends Component
{
    public $categorySlug;
    public $categoryId;
    public $name;
    public $slug;

    public function rules()
    {
        return [
            'name' => 'required',
            'slug' => [
                'required',
                Rule::unique('categories')->ignore($this->categoryId),
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('categories.name_required'),
            'slug.required' => __('categories.slug_required'),
            'slug.unique' => __('categories.slug_existed'),
        ];
    }

    public function mount($categorySlug)
    {
        $this->categorySlug = $categorySlug;
        $category = Category::where('slug', $categorySlug)->first();
        $this->categoryId = $category->id;
        $this->name = $category->name;
        $this->slug = $category->slug;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updateCategory()
    {
        $this->validate();
        $category = Category::find($this->categoryId);
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->save();
        session()->flash('message', __('categories.update_success_msg'));
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-category-component')->layout('layouts.base');
    }
}
