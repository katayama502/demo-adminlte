@extends('adminlte::page')
@section('title','商品登録')

@section('content_header') <h1>商品登録</h1> @stop

@section('content')
  <form method="post" action="{{ route('products.store') }}">
    @csrf
    @include('products._form', ['product' => new App\Models\Product()])
    <button class="btn btn-primary">保存</button>
    <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">戻る</a>
  </form>
@stop
