<main id="main" class="main-site">

    <div class="container">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">{{ __('details.home') }}</a></li>
                <li class="item-link"><span>{{ __('details.detail') }}</span></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
                <div class="wrap-product-detail">
                    <div class="detail-media">
                        <div class="product-gallery">
                            <ul class="slides">
                                @foreach ($images as $image)
                                    <li data-thumb="{{ asset('bower_components/demo-bower/assets/images/products')}}/{{ $image->name }}">
                                        <img src="{{ asset('bower_components/demo-bower/assets/images/products')}}/{{ $image->name }}" alt="product thumbnail" />
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="detail-info">
                        <h2 class="product-name">{{ $product->name }}</h2>
                        <div class="short-desc">
                            {{ $product->short_description }}
                        </div>
                        <div class="wrap-price"><span class="product-price">${{ $product->regular_price }}</span></div>
                        <div class="stock-info in-stock">
                            <p class="availability">{{ __('details.availability') }}:
                                @if ($product->quantity > 0)
                                    <b>{{ __('details.instock') }}</b>
                                @else
                                    <b>{{ __('details.outofstock') }}</b>
                                @endif
                            </p>
                        </div>
                        <div class="wrap-butons">
                            <a href="#" class="btn add-to-cart" wire:click.prevent="store({{ $product->id }}, '{{ $product->name }}', {{ $product->regular_price }})">{{ __('details.add_to_cart') }}</a>
                        </div>
                    </div>
                    <div class="advance-info">
                        <div class="tab-control normal">
                            <a href="#description" class="tab-control-item active">{{ __('details.description') }}</a>
                            <a href="#review" class="tab-control-item">{{ __('details.review') }}</a>
                        </div>
                        <div class="tab-contents">
                            <div class="tab-content-item active" id="description">
                                {{ $product->description }}
                            </div>

                            <div class="tab-content-item " id="review">
                                <div class="wrap-review-form">
                                    @foreach ($reviews as $review)
                                        <div id="comments">
                                            <ol class="commentlist">
                                                <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1" id="li-comment-20">
                                                    <div id="comment-20" class="comment_container">
                                                        <div class="comment-text">
                                                            <div class="star-rating">
                                                                <span class="width-{{$review->rating * 20}}-percent"><strong class="rating">{{ $review->rating }}</strong></span>
                                                            </div>
                                                            <p class="meta">
                                                                <strong class="woocommerce-review__author">{{ $review->user->name }}</strong>
                                                                <span class="woocommerce-review__dash">–</span>
                                                                <time class="woocommerce-review__published-date" >{{ $review->updated_at }}</time>
                                                            </p>
                                                            <div class="description">
                                                                <p>{{ $review->comment }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ol>
                                        </div><!-- #comments -->
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div><!--end main products area-->

            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                <div class="widget widget-our-services ">
                    <div class="widget-content">
                        <ul class="our-services">

                            <li class="service">
                                <a class="link-to-service" href="#">
                                    <i class="fa fa-truck" aria-hidden="true"></i>
                                    <div class="right-content">
                                        <b class="title">{{ __('details.free_shipping') }}</b>
                                        <span class="subtitle">{{ __('details.free_shipping_desc') }}</span>
                                    </div>
                                </a>
                            </li>

                            <li class="service">
                                <a class="link-to-service" href="#">
                                    <i class="fa fa-gift" aria-hidden="true"></i>
                                    <div class="right-content">
                                        <b class="title">{{ __('details.special_offer') }}</b>
                                        <span class="subtitle">{{ __('details.special_offer_desc') }}</span>
                                    </div>
                                </a>
                            </li>

                            <li class="service">
                                <a class="link-to-service" href="#">
                                    <i class="fa fa-reply" aria-hidden="true"></i>
                                    <div class="right-content">
                                        <b class="title">{{ __('details.order_return') }}</b>
                                        <span class="subtitle">{{ __('details.order_return_desc') }}</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div><!-- Categories widget-->

            </div><!--end sitebar-->

        </div><!--end row-->

    </div><!--end container-->

</main>
