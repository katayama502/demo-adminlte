<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\OrderItem;

class DashboardController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth'); // 認証必須にしたい場合
    }

    public function index()
    {
        $totalStock  = Product::sum('stock');
        $totalSales  = OrderItem::sum('subtotal');
        $totalProfit = OrderItem::sum('profit');

        $topViewed = Product::orderByDesc('views')->take(5)->get();
        $lowStock  = Product::where('stock','<',5)->orderBy('stock')->take(5)->get();

        return view('dashboard', compact('totalStock','totalSales','totalProfit','topViewed','lowStock'));
    }
}
