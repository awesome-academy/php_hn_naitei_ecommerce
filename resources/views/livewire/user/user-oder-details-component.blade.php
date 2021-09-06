<div>
    <div class="container admin-table">
        <div class="row">
            <div class="col-md-12">
                @if (Session::has('order_message'))
                    <div class="alert alert-success" role="alert">{{ Session::get('order_message') }}</div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">{{ __('orders.details') }}</div>
                            <div class="col-md-6">
                                <a href="{{ route('user.orders') }}" class="btn btn-success pull-right">{{ __('orders.all_orders') }}</a>
                                @if ($order->status == config('constant.ordered_status'))
                                    <a href="#" class="btn btn-danger pull-right cancel-btn" wire:click.prevent="cancelOrder()">{{ __('orders.cancel') }}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>{{ __('orders.id') }}</th>
                                <td>{{ $order->id }}</td>
                                <th>{{ __('orders.order_date') }}</th>
                                <td>{{ $order->created_at }}</td>
                                <th>{{ __('orders.status') }}</th>
                                @if ($order->status == config('constant.order_delivered'))
                                    <td>{{ __('orders.delivered') }}</td>
                                @elseif ($order->status == config('constant.order_canceled'))
                                    <td>{{ __('orders.canceled') }}</td>
                                @elseif ($order->status == config('constant.ordered_status'))
                                    <td>{{ __('orders.ordered') }}</td>
                                @endif
                                @if ($order->status == config('constant.order_delivered'))
                                    <th>{{ __('orders.delivered_date') }}</th>
                                    <td>{{ $order->delivered_date }}</td>
                                @elseif ($order->status == config('constant.order_canceled'))
                                    <th>{{ __('orders.canceled_date') }}</th>
                                    <td>{{ $order->canceled_date }}</td>
                                @endif
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">{{ __('orders.ordered_items') }}</div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="wrap-iten-in-cart">
                            <h3 class="box-title">{{ __('cart.products_name') }}</h3>
                            <ul class="products-cart">
                                @foreach ($order->products as $product)
                                    <li class="pr-cart-item">
                                        <div class="product-image">
                                            <figure><img src="{{ asset('bower_components/demo-bower/assets/images/products/' . $product->images->get(0)->name) }}" alt="{{ $product->name }}"></figure>
                                        </div>
                                        <div class="product-name">
                                            <a class="link-to-product" href="{{ route('product.details', $product->slug) }}">{{ $product->name }}</a>
                                        </div>
                                        <div class="price-field produtc-price"><p class="price">${{ $product->regular_price }}</p></div>
                                        <div class="quantity">
                                            <h5>{{ $product->pivot->quantity }}</h5>
                                        </div>
                                        <div class="price-field sub-total"><p class="price">${{ $product->regular_price * $product->pivot->quantity }}</p></div>
                                        @if ($order->status == config('constant.order_delivered'))
                                            <div class="price-field sub-total">
                                                <p class="price">
                                                    <a href="{{ route('user.review', $product->id) }}">
                                                        {{ __('review.write_review') }}
                                                    </a>
                                                </p>
                                            </div>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="summary">
                            <div class="order-summary">
                                <h4 class="title-box">{{ __('orders.summary') }}</h4>
                                <p class="summary-info"><span class="title">{{ __('orders.subtotal') }}</span><b class="index">${{ $order->subtotal }}</b></p>
                                <p class="summary-info"><span class="title">{{ __('orders.tax') }}</span><b class="index">${{ $order->tax }}</b></p>
                                <p class="summary-info"><span class="title">{{ __('orders.shipping') }}</span><b class="index">{{ __('orders.freeship') }}</b></p>
                                <p class="summary-info"><span class="title">{{ __('orders.total') }}</span><b class="index">${{ $order->total }}</b></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ __('orders.bill_items') }}
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>{{ __('orders.firstname') }}</th>
                                <td>{{ $order->firstname }}</td>
                                <th>{{ __('orders.lastname') }}</th>
                                <td>{{ $order->lastname }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('orders.mobile') }}</th>
                                <td>{{ $order->mobile }}</td>
                                <th>{{ __('orders.email') }}</th>
                                <td>{{ $order->email }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('orders.line1') }}</th>
                                <td>{{ $order->line1 }}</td>
                                <th>{{ __('orders.line2') }}</th>
                                <td>{{ $order->line2 }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('orders.city') }}</th>
                                <td>{{ $order->city }}</td>
                                <th>{{ __('orders.province') }}</th>
                                <td>{{ $order->province }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('orders.country') }}</th>
                                <td>{{ $order->country }}</td>
                                <th>{{ __('orders.zipcode') }}</th>
                                <td>{{ $order->zipcode }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ __('orders.shipping_details') }}
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>{{ __('orders.firstname') }}</th>
                                <td>{{ $order->firstname }}</td>
                                <th>{{ __('orders.lastname') }}</th>
                                <td>{{ $order->lastname }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('orders.mobile') }}</th>
                                <td>{{ $order->mobile }}</td>
                                <th>{{ __('orders.email') }}</th>
                                <td>{{ $order->email }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('orders.line1') }}</th>
                                <td>{{ $order->line1 }}</td>
                                <th>{{ __('orders.line2') }}</th>
                                <td>{{ $order->line2 }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('orders.city') }}</th>
                                <td>{{ $order->city }}</td>
                                <th>{{ __('orders.province') }}</th>
                                <td>{{ $order->province }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('orders.country') }}</th>
                                <td>{{ $order->country }}</td>
                                <th>{{ __('orders.zipcode') }}</th>
                                <td>{{ $order->zipcode }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ __('orders.transaction') }}
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>{{ __('orders.trans_mode') }}</th>
                                @if ($order->transaction->mode == config('constant.cod_payment_method'))
                                    <td>{{ __('orders.cod') }}</td>
                                @endif
                            </tr>
                            <tr>
                                <th>{{ __('orders.status') }}</th>
                                @if ($order->transaction->status == config('constant.trans_approved'))
                                    <td>{{ __('orders.approved') }}</td>
                                @elseif ($order->transaction->status == config('constant.trans_declined'))
                                    <td>{{ __('orders.declined') }}</td>
                                @elseif ($order->transaction->status == config('constant.trans_refunded'))
                                    <td>{{ __('orders.refunded') }}</td>
                                @elseif ($order->transaction->status == config('constant.pending_status'))
                                    <td>{{ __('orders.pending') }}</td>
                                @endif
                            </tr>
                            <tr>
                                <th>{{ __('orders.trans_date') }}</th>
                                <td>{{ $order->transaction->created_at }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
