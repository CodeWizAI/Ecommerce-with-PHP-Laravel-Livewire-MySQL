<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\Order;

use Illuminate\Support\Facades\DB;

class OrderComponent extends Component
{
    //for status change order
    public function updateOrderStatus($order_id,$status)
    {
        $order = Order::find($order_id);
        $order->status = $status;
        if($status == 'delivered')
        {
            $order->delivered_date = DB::raw('CURRENT_DATE');
        }
        if($status == 'canceled')
        {
            $order->cancelled_date = DB::raw('CURRENT_DATE');
        }
        $order->save();
        session()->flash('order_message','Order has Been Updated Successfully');
    }
    public function render()
    {
        $orders = Order::orderby('created_at','DESC')->paginate(12);
        return view('livewire.admin.order-component',['orders'=>$orders])->layout('layouts.dashboard');
    }
}
