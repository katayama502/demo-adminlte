<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function index(Request $r)
    {
        $products = Product::keyword($r->q)->orderBy('id','desc')->paginate(20);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $r)
    {
        $data = $r->validate([
            'sku'   => ['required','string','max:64','unique:products,sku'],
            'name'  => ['required','string','max:255'],
            'price' => ['required','numeric','min:0'],
            'cost'  => ['required','numeric','min:0'],
            'stock' => ['required','integer','min:0'],
            'is_active' => ['boolean'],
        ]);
        $data['is_active'] = $r->boolean('is_active');
        Product::create($data);
        return redirect()->route('products.index')->with('ok','商品を登録しました');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $r, Product $product)
    {
        $data = $r->validate([
            'sku'   => ['required','string','max:64', Rule::unique('products','sku')->ignore($product->id)],
            'name'  => ['required','string','max:255'],
            'price' => ['required','numeric','min:0'],
            'cost'  => ['required','numeric','min:0'],
            'stock' => ['required','integer'],
            'is_active' => ['boolean'],
        ]);
        $data['is_active'] = $r->boolean('is_active');
        $product->update($data);
        return redirect()->route('products.index')->with('ok','商品を更新しました');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('ok','商品を削除しました');
    }
}
