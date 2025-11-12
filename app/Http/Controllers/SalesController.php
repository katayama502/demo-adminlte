<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class SalesController extends Controller
{
    public function index(Request $r)
    {
        $from = $r->date('from') ?? now()->startOfMonth()->toDateString();
        $to   = $r->date('to')   ?? now()->toDateString();

        $orders = Order::with('items')
            ->whereBetween('order_date', [$from, $to])
            ->orderByDesc('order_date')
            ->paginate(20);

        $totalSales  = OrderItem::whereHas('order', fn($q)=>$q->whereBetween('order_date',[$from,$to]))->sum('subtotal');
        $totalProfit = OrderItem::whereHas('order', fn($q)=>$q->whereBetween('order_date',[$from,$to]))->sum('profit');
        $profitRate  = $totalSales>0 ? round($totalProfit/$totalSales*100,2) : 0;

        return view('sales.index', compact('orders','from','to','totalSales','totalProfit','profitRate'));
    }
}
