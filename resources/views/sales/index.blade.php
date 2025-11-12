@extends('adminlte::page')
@section('title','売上確認')

@section('content_header')
  <h1>売上確認</h1>
@stop

@section('content')
  <form class="row g-2 mb-3" method="get">
    <div class="col-auto"><input type="date" name="from" class="form-control" value="{{ $from }}"></div>
    <div class="col-auto"><input type="date" name="to" class="form-control" value="{{ $to }}"></div>
    <div class="col-auto"><button class="btn btn-outline-primary">適用</button></div>
  </form>

  <div class="row">
    <div class="col-md-4"><x-adminlte-info-box text="期間売上"   icon="fas fa-yen-sign" number="¥{{ number_format($totalSales,0) }}" theme="success"/></div>
    <div class="col-md-4"><x-adminlte-info-box text="期間利益"   icon="fas fa-coins"    number="¥{{ number_format($totalProfit,0) }}" theme="teal"/></div>
    <div class="col-md-4"><x-adminlte-info-box text="利益率"     icon="fas fa-percentage" number="{{ $profitRate }}%" theme="light"/></div>
  </div>

  <div class="table-responsive">
    <table class="table table-striped">
      <thead><tr><th>注文日</th><th>注文ID</th><th>明細数</th><th>売上</th><th>利益</th></tr></thead>
      <tbody>
        @foreach($orders as $o)
          <tr>
            <td>{{ $o->order_date }}</td>
            <td>#{{ $o->id }}</td>
            <td>{{ $o->items->count() }}</td>
            <td>¥{{ number_format($o->total,0) }}</td>
            <td>¥{{ number_format($o->profit,0) }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
    {{ $orders->withQueryString()->links() }}
  </div>
@stop
