<main id="main" class="main-site">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">{{ __('cart.home') }}</a></li>
                <li class="item-link"><span>{{ __('cart.cart') }}</span></li>
            </ul>
        </div>
        <div class=" main-content-area">

            <div class="wrap-iten-in-cart">
                @if (Session::has('success_message'))
                    <div class="alert alert-success">
                        <strong>{{ __('cart.success') }}</strong> {{ Session::get('success_message') }}
                    </div>
                @endif
                @if (Cart::count() > 0)
                    <h3 class="box-title">{{ __('cart.products_name') }}</h3>
                    <ul class="products-cart">
                        @foreach (Cart::content() as $product)
                            <li class="pr-cart-item">
                                <div class="product-image">
                                    <figure><img src="bower_components/demo-bower/assets/images/products/{{ $product->model->images->get(0)->name }}" alt="{{ $product->model->name }}"></figure>
                                </div>
                                <div class="product-name">
                                    <a class="link-to-product" href="{{ route('product.details', ['slug' => $product->model->slug]) }}">{{ $product->model->name }}</a>
                                </div>
                                <div class="price-field produtc-price"><p class="price">${{ $product->model->regular_price }}</p></div>
                                <div class="quantity">
                                    <div class="quantity-input">
                                        <input type="text" name="product-quatity" value="{{ $product->qty }}" data-max="120" pattern="[0-9]*" >
                                        <a class="btn btn-increase" href="#" wire:click.prevent="increaseQuantity('{{ $product->rowId }}')"></a>
                                        <a class="btn btn-reduce" href="#" wire:click.prevent="decreaseQuantity('{{ $product->rowId }}')"></a>
                                    </div>
                                </div>
                                <div class="price-field sub-total"><p class="price">${{ $product->subtotal }}</p></div>
                                <div class="delete">
                                    <a href="#" class="btn btn-delete" title="" wire:click.prevent="destroy('{{ $product->rowId }}')">
                                        <span>{{ __('cart.delete_item') }}</span>
                                        <i class="fa fa-times-circle" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>{{ __('cart.blank_cart') }}</p>
                @endif
                
            </div>

            <div class="summary">
                <div class="order-summary">
                    <h4 class="title-box">{{ __('cart.order_summary') }}</h4>
                    <p class="summary-info"><span class="title">{{ __('cart.subtotal') }}</span><b class="index">${{ Cart::subtotal() }}</b></p>
                    <p class="summary-info"><span class="title">{{ __('cart.tax') }}</span><b class="index">${{ Cart::tax() }}</b></p>
                    <p class="summary-info"><span class="title">{{ __('cart.shipping') }}</span><b class="index"></b></p>
                    <p class="summary-info total-info "><span class="title">{{ __('cart.total') }}</span><b class="index">${{ Cart::total() }}</b></p>
                </div>
                <div class="checkout-info">
                    <a class="btn btn-checkout" href="checkout.html">{{ __('cart.checkout') }}</a>
                    <a class="link-to-shop" href="{{ route('shop') }}">{{ __('cart.cont_shopping') }}<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                </div>
                <div class="update-clear">
                    <a class="btn btn-clear" href="#" wire:click.prevent="destroyAll()">{{ __('cart.clear_cart') }}</a>
                    <a class="btn btn-update" href="#">{{ __('cart.update_cart') }}</a>
                </div>
            </div>

        </div><!--end main content area-->
    </div><!--end container-->

</main>
