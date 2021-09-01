<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminAddCategoryComponent extends Component
{
    public $name;
    public $slug;

    protected $rules = [
        'name' => 'required',
        'slug' => 'required|unique:categories',
    ];

    public function messages()
    {
        return [
            'name.required' => __('categories.name_required'),
            'slug.required' => __('categories.slug_required'),
            'slug.unique' => __('categories.slug_existed'),
        ];
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function storeCategory(Request $request)
    {
        $this->validate();
        $data = $request->all()['serverMemo']['data'];
        Category::create($data);
        session()->flash('message', __('categories.add_success_msg'));
    }

    public function render()
    {
        return view('livewire.admin.admin-add-category-component')->layout('layouts.base');
    }
}
