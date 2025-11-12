@extends('adminlte::page')

@section('title','ホーム')

@section('content_header')
  <h1>在庫・売上ダッシュボード</h1>
@stop

@section('content')
<div class="row">
  <div class="col-lg-3 col-6">
    <x-adminlte-small-box title="{{ number_format($totalStock) }}" text="全在庫数" icon="fas fa-boxes" theme="info"/>
  </div>
  <div class="col-lg-3 col-6">
    <x-adminlte-small-box title="¥{{ number_format($totalSales,0) }}" text="累計売上" icon="fas fa-yen-sign" theme="success"/>
  </div>
  <div class="col-lg-3 col-6">
    <x-adminlte-small-box title="¥{{ number_format($totalProfit,0) }}" text="累計利益" icon="fas fa-chart-line" theme="teal"/>
  </div>
  <div class="col-lg-3 col-6">
    <x-adminlte-small-box title="{{ $topViewed->first()->name ?? '—' }}" text="人気商品(閲覧数)" icon="fas fa-fire" theme="warning"/>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <x-adminlte-card title="閲覧数Top5" theme="lightblue" icon="fas fa-eye">
      <ol class="mb-0">
        @foreach($topViewed as $p)
          <li>{{ $p->name }}（{{ number_format($p->views) }} views）</li>
        @endforeach
      </ol>
    </x-adminlte-card>
  </div>
  <div class="col-md-6">
    <x-adminlte-card title="在庫少（5未満）" theme="danger" icon="fas fa-exclamation-triangle">
      <ul class="mb-0">
        @foreach($lowStock as $p)
          <li>{{ $p->name }}：残り {{ $p->stock }}</li>
        @endforeach
      </ul>
    </x-adminlte-card>
  </div>
</div>
@stop
