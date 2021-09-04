<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AdminOrderComponent extends Component
{
    public function updateOrderStatus($orderId, $status)
    {
        $order = Order::find($orderId);
        $order->status = $status;

        if ($status == config('constant.order_delivered')) {
            $order->delivered_date = DB::raw('CURRENT_DATE');
        } elseif ($status == config('constant.order_canceled')) {
            $order->canceled_date = DB::raw('CURRENT_DATE');
        }

        $order->save();
        session()->flash('order_message', __('orders.status_update_success_msg'));
    }

    public function render()
    {
        $orders = Order::orderBy('created_at', 'DESC')->paginate(config('constant.default_pagesize'));

        return view('livewire.admin.admin-order-component', compact('orders'))->layout('layouts.base');
    }
}
