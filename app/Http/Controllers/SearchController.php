<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    public function index(Request $r)
    {
        $q = $r->q;
        $products = Product::keyword($q)->orderByDesc('views')->limit(50)->get();
        return view('search.index', compact('q','products'));
    }
}