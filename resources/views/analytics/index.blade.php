@extends('adminlte::page')
@section('title','閲覧・いいね分析')

@section('content_header')
  <h1>閲覧数・いいね数 分析</h1>
@stop

@section('content')
  <form class="row g-2 mb-3" method="get">
    <div class="col-auto"><input type="date" name="from" class="form-control" value="{{ $from }}"></div>
    <div class="col-auto"><input type="date" name="to" class="form-control" value="{{ $to }}"></div>
    <div class="col-auto"><button class="btn btn-outline-primary">適用</button></div>
  </form>

  <x-adminlte-card title="日次推移（合計）" theme="light" icon="fas fa-chart-area">
    <div class="table-responsive">
      <table class="table table-sm">
        <thead><tr><th>日付</th><th>閲覧</th><th>いいね</th></tr></thead>
        <tbody>
          @foreach($daily as $d)
            <tr><td>{{ $d->stat_date }}</td><td>{{ $d->views }}</td><td>{{ $d->likes }}</td></tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </x-adminlte-card>

  <x-adminlte-card title="閲覧数Top10" theme="lightblue" icon="fas fa-fire">
    <ol class="mb-0">
      @foreach($top as $p)
        <li>{{ $p->name }}（{{ $p->views }} views / {{ $p->likes }} likes）</li>
      @endforeach
    </ol>
  </x-adminlte-card>
@stop
