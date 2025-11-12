<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductStat;
use App\Models\Product;

class AnalyticsController extends Controller
{
    public function index(Request $r)
    {
        $from = $r->date('from') ?? now()->subMonth()->toDateString();
        $to   = $r->date('to')   ?? now()->toDateString();

        $daily = ProductStat::selectRaw('stat_date, SUM(views) as views, SUM(likes) as likes')
            ->whereBetween('stat_date', [$from, $to])
            ->groupBy('stat_date')
            ->orderBy('stat_date')
            ->get();

        $top = Product::orderByDesc('views')->take(10)->get();

        return view('analytics.index', compact('from','to','daily','top'));
    }
}