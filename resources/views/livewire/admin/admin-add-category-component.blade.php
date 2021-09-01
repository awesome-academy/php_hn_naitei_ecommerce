<div>
    <div class="container admin-table">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <h5 class="col-md-6">{{ __('categories.add_new_cate') }}</h5>
                            <div class="col-md-6">
                                <a href="{{ route('admin.categories') }}" class="btn btn-success pull-right">{{ __('categories.all_categories') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="storeCategory">
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">{{ __('categories.cate_name') }}</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="{{ __('categories.cate_name') }}" class="form-control input-md" wire:model="name" wire:keyup="generateSlug" />
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">{{ __('categories.cate_slug') }}</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="{{ __('categories.cate_slug') }}" class="form-control input-md" wire:model="slug" />
                                    @error('slug')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">{{ __('categories.submit') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
