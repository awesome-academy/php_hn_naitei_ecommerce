<div>
    <div class="container admin-table">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ __('orders.all_orders') }}
                    </div>
                    <div class="panel-body">
                        @if (Session::has('order_message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('order_message') }}</div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>{{ __('orders.id') }}</th>
                                    <th>{{ __('orders.subtotal') }}</th>
                                    <th>{{ __('orders.tax') }}</th>
                                    <th>{{ __('orders.total') }}</th>
                                    <th>{{ __('orders.firstname') }}</th>
                                    <th>{{ __('orders.lastname') }}</th>
                                    <th>{{ __('orders.mobile') }}</th>
                                    <th>{{ __('orders.email') }}</th>
                                    <th>{{ __('orders.status') }}</th>
                                    <th>{{ __('orders.order_date') }}</th>
                                    <th colspan="2" class="text-center">{{ __('orders.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->subtotal }}</td>
                                        <td>{{ $order->tax }}</td>
                                        <td>{{ $order->total }}</td>
                                        <td>{{ $order->firstname }}</td>
                                        <td>{{ $order->lastname }}</td>
                                        <td>{{ $order->mobile }}</td>
                                        <td>{{ $order->email }}</td>
                                        @if ($order->status == config('constant.order_delivered'))
                                            <td>{{ __('orders.delivered') }}</td>
                                        @elseif ($order->status == config('constant.order_canceled'))
                                            <td>{{ __('orders.canceled') }}</td>
                                        @else
                                            <td>{{ __('orders.ordered') }}</td>
                                        @endif
                                        <td>{{ $order->created_at }}</td>
                                        <td><a href="{{ route('admin.orderdetails', $order->id) }}" class="btn btn-info btn-sm">{{ __('orders.details') }}</a></td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                                                    {{ __('orders.status') }} <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#" wire:click.prevent="updateOrderStatus({{ $order->id }}, {{ config('constant.order_delivered') }})">{{ __('orders.delivered') }}</a></li>
                                                    <li><a href="#" wire:click.prevent="updateOrderStatus({{ $order->id }}, {{ config('constant.order_canceled') }})">{{ __('orders.canceled') }}</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
