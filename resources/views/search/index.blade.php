@extends('adminlte::page')
@section('title','一発検索')

@section('content_header')
  <h1>一発検索</h1>
@stop

@section('content')
  <form class="mb-3" method="get">
    <div class="input-group">
      <input class="form-control" name="q" value="{{ $q }}" placeholder="商品名/ SKU キーワード">
      <button class="btn btn-primary">検索</button>
    </div>
  </form>

  @if($q)
  <p class="text-muted">「{{ $q }}」の検索結果：{{ $products->count() }}件</p>
  @endif

  <div class="row">
    @foreach($products as $p)
      <div class="col-md-6">
        <div class="card mb-3">
          <div class="card-body">
            <h5 class="card-title">{{ $p->name }}</h5>
            <p class="mb-1">SKU: {{ $p->sku }}</p>
            <p class="mb-1">価格: ¥{{ number_format($p->price,0) }} / 原価: ¥{{ number_format($p->cost,0) }}</p>
            <p class="mb-1">在庫: {{ $p->stock }} ／ 閲覧: {{ $p->views }} ／ いいね: {{ $p->likes }}</p>
            <a class="btn btn-sm btn-secondary" href="{{ route('products.edit',$p) }}">編集</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
@stop
