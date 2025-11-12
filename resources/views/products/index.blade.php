@extends('adminlte::page')
@section('title','商品一覧')

@section('content_header')
  <div class="d-flex justify-content-between align-items-center">
    <h1>商品一覧</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary">商品登録</a>
  </div>
@stop

@section('content')
  <form class="mb-3" method="get">
    <div class="input-group">
      <input class="form-control" name="q" value="{{ request('q') }}" placeholder="キーワード（SKU/商品名）">
      <button class="btn btn-outline-secondary">検索</button>
    </div>
  </form>

  <div class="table-responsive">
    <table class="table table-striped">
      <thead><tr>
        <th>ID</th><th>SKU</th><th>商品名</th><th>価格</th><th>原価</th><th>在庫</th><th>閲覧/いいね</th><th></th>
      </tr></thead>
      <tbody>
      @foreach($products as $p)
        <tr>
          <td>{{ $p->id }}</td>
          <td>{{ $p->sku }}</td>
          <td>{{ $p->name }}</td>
          <td>¥{{ number_format($p->price,0) }}</td>
          <td>¥{{ number_format($p->cost,0) }}</td>
          <td>{{ $p->stock }}</td>
          <td>{{ $p->views }} / {{ $p->likes }}</td>
          <td class="text-nowrap">
            <a href="{{ route('products.edit',$p) }}" class="btn btn-sm btn-secondary">編集</a>
            <form method="post" action="{{ route('products.destroy',$p) }}" class="d-inline" onsubmit="return confirm('削除しますか？');">
              @csrf @method('delete')
              <button class="btn btn-sm btn-danger">削除</button>
            </form>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
    {{ $products->withQueryString()->links() }}
  </div>
@stop
