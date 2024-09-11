<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\Esewa;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __invoke(Order $order)
    {

        Esewa::pay(1000, 'product being purchased', $order->id);
    }
}
