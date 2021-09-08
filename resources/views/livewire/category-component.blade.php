<main id="main" class="main-site left-sidebar">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">{{ __('shop.home') }}</a></li>
                <li class="item-link"><span>{{ __('shop.product_cate') }}</span></li>
                <li class="item-link"><span>{{ $categoryName }}</span></li>
            </ul>
        </div>
        <div class="row">

            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">

                <div class="banner-shop">
                    <a href="#" class="banner-link">
                        <figure><img src="{{ asset('bower_components/demo-bower/assets/images/shop-banner.jpg') }}" alt=""></figure>
                    </a>
                </div>

                <div class="wrap-shop-control">

                    <h1 class="shop-title">{{ $categoryName }}</h1>

                    <div class="wrap-right">

                        <div class="sort-item orderby ">
                            <select name="orderby" class="use-chosen" wire:model="sorting">
                                <option value="menu_order" selected="selected">{{ __('shop.default_sorting') }}</option>
                                <option value="date">{{ __('shop.sort_by_newest') }}</option>
                                <option value="price">{{ __('shop.sort_by_price_low') }}</option>
                                <option value="price-desc">{{ __('shop.sort_by_price_high') }}</option>
                            </select>
                        </div>

                        <div class="sort-item product-per-page">
                            <select name="post-per-page" class="use-chosen" >
                                <option value="{{ config('constant.products_per_page')[0] }}" selected="selected">{{ config('constant.products_per_page')[0] }} {{ __('shop.per_page') }}</option>
                                @foreach (config('constant.products_per_page') as $productsPerPage)
                                    <option value="{{ $productsPerPage }}">{{ $productsPerPage }} {{ __('shop.per_page') }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                </div><!--end wrap shop control-->

                <div class="row">

                    <ul class="product-list grid-products equal-container">
                        @foreach ($products as $product)
                            <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                            <div class="product product-style-3 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="{{ route('product.details', ['slug' => $product->slug]) }}" title="{{ $product->name }}">
                                        <figure><img src="{{ asset('bower_components/demo-bower/assets/images/products/' . $product->images->get(0)->name) }}" alt="{{ $product->name }}"></figure>
                                    </a>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>{{ $product->name }}</span></a>
                                    <div class="wrap-price"><span class="product-price">${{ $product->regular_price }}</span></div>
                                    <a href="#" class="btn add-to-cart" wire:click.prevent="store({{ $product->id }}, '{{ $product->name }}', {{ $product->regular_price }})">{{ __('shop.add_to_cart') }}</a>
                                </div>
                            </div>
                        </li>
                        @endforeach

                    </ul>

                </div>

                <div class="wrap-pagination-info">
                    {{ $products->links() }}
                </div>
            </div><!--end main products area-->

            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                <div class="widget mercado-widget categories-widget">
                    <h2 class="widget-title">{{ __('shop.all_categories') }}</h2>
                    <div class="widget-content">
                        <ul class="list-category">
                            @foreach ($categories as $category)
                                <li class="category-item">
                                    <a href="{{ route('product.category', $category->slug) }}" class="cate-link">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div><!-- Categories widget-->

            </div><!--end sitebar-->

        </div><!--end row-->

    </div><!--end container-->

</main>
