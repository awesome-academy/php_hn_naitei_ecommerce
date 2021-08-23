<div class="container" style="padding: 30px 0">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6"> {{ __('admin-product.add_new') }}</div>
                        <div class="col-md-6">
                            <a href="{{ route('admin.products') }}" class="btn btn-success pull-right">{{ __('admin-product.products') }}</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                    @endif
                    <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="addProduct">
                        <div class="form-group">
                            <label class="col-md-4 control-label">{{ __('admin-product.name') }}</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="{{ __('admin-product.name') }}" class="form-control input-md" wire:model="name" wire:keyup="generateSlug" />
                                @error('name') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">{{ __('admin-product.slug') }}</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="{{ __('admin-product.slug') }}" class="form-control input-md" wire:model="slug" />
                                @error('slug') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">{{ __('admin-product.short_des') }}</label>
                            <div class="col-md-4">
                                <textarea type="text" placeholder="{{ __('admin-product.short_des') }}" class="form-control input-md" wire:model="short_description"></textarea>
                                @error('short_description') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">{{ __('admin-product.des') }}</label>
                            <div class="col-md-4">
                                <textarea type="text" placeholder="{{ __('admin-product.des') }}" class="form-control input-md" wire:model="description"></textarea>
                                @error('description') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">{{ __('admin-product.price') }}</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="{{ __('admin-product.price') }}" class="form-control input-md" wire:model="regular_price"/>
                                @error('regular_price') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">{{ __('admin-product.SKU') }}</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="{{ __('admin-product.SKU') }}" class="form-control input-md" wire:model="SKU"/>
                                @error('SKU') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">{{ __('admin-product.quantity') }}</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="{{ __('admin-product.quantity') }}" class="form-control input-md" wire:model="quantity"/>
                                @error('quantity') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">{{ __('admin-product.image') }}</label>
                            <div class="col-md-4">
                                <input type="file"  class="input-file" wire:model="image">
                                @if ($image)
                                    <img src="{{ $image->temporaryUrl() }}" width="120" />
                                @endif
                                @error('image') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">{{ __('admin-product.category') }}</label>
                            <div class="col-md-4">
                                <select class="form-control" wire:model="category_id">
                                    <option value="">{{ __('admin-product.sel_cate') }}</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('category_id') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-4">
                                <button type="submit"  class="btn btn-primary">{{ __('admin-product.submit') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
