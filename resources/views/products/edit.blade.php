@extends('adminlte::page')
@section('title','商品編集')

@section('content_header') <h1>商品編集</h1> @stop

@section('content')
  <form method="post" action="{{ route('products.update',$product) }}">
    @csrf @method('put')
    @include('products._form', ['product' => $product])
    <button class="btn btn-primary">更新</button>
    <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">戻る</a>
  </form>
@stop