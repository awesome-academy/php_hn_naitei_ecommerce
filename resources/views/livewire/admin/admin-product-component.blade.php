<div>
    <div class="container pad-cus" >
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                {{ __('admin-product.products') }}
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.addproduct') }}" class="btn btn-success pull-right">{{ __('admin-product.add_new') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>{{ __('admin-product.id') }}</th>
                                <th>{{ __('admin-product.image') }}</th>
                                <th>{{ __('admin-product.name') }}</th>
                                <th>{{ __('admin-product.quantity') }}</th>
                                <th>{{ __('admin-product.price') }}</th>
                                <th>{{ __('admin-product.category') }}</th>
                                <th>{{ __('admin-product.date') }}</th>
                                <th>{{ __('admin-product.action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td><img src="{{ asset('bower_components/demo-bower/assets/images/products') }}/{{ $product->images->get(0)->name }}" width="60" /></td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->regular_price }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ $product->created_at }}</td>
                                    <td>
                                        <a href="{{route('admin.editproduct', ['product_slug' => $product->slug])}}"><i class="fa fa-edit fa-2x text-info"></i></a>
                                        <a href="#" class="margin-cus" wire:click.prevent="deleteProduct({{$product->id}})"><i class="fa fa-times fa-2x text-danger"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$products->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
