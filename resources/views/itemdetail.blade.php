@extends('layouts.app')
@section('content')
@include('common.errors')
<div class="card-body">
<?php 
$status = strtotime($item->endtime) - strtotime('now');
?>
@if($item->status == 6)
    <div>取引成功!!!</div>
    <div>購買者: <a href="{{url('user/'.$user->id)}}">{{ $user->name }} </a></div>
    <div>購入額: {{ number_format($purchase->final_price)}}</div>
    <div>応募者数: {{ $bid_count}}</div>

@elseif($item->status == 7)
    <div>出品期間終了</div>
@elseif($item->status == 1)
    <div>購入申請募集中!</div>
    <form action="{{ url('purchase/'.$item->id) }}" method="GET">
        {{ csrf_field() }}
        <button type="submit" class="btn btn-primary">
            購入へ
        </button>
        <!-- <a class="btn btn-danger pull-right" href="{{ url('/') }}">Back</a> -->
    </form>
@endif

@if ($status > 0 && Auth::id()==$item->user_id)
    <form action="{{ url('itemsedit/'.$item->id) }}" method="GET"> {{ csrf_field() }}
        <button type="submit" class="btn btn-primary">
            更新
        </button>
    </form>
    <form action="{{ url('itemdelete/'.$item->id) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button type="submit" class="btn btn-danger">
            削除
        </button>
    </form>
@elseif($status < 0 && Auth::id()==$item->user_id)
    <form action="{{ url('transaction/'.$item->purchaser->id) }}" method="GET">
        {{ csrf_field() }}
        <input type="hidden" name="purchaser_id" value="{{ $item ->purchaser->id }}">
        <button type="submit" class="btn btn-primary">
            取引画面へ
        </button>
    </form>
@endif

<!-- 購買者には取引画面を表示 -->
@if($item->purchaser)
@if($item->purchaser->purchaser_id == Auth::id() && $status < 0)
    <form action="{{ url('transaction/'.$item->purchaser->id) }}" method="GET">
        {{ csrf_field() }}
        <input type="hidden" name="purchaser_id" value="{{ $item -> purchaser -> id }}">
        <button type="submit" class="btn btn-primary">
            取引画面へ
        </button>
    </form>
@endif
@endif
    <hr>
    <ul>
        <li>商品名 : {{ $item->item_name }}</li>
        <li>クリエイター名 : <a href="{{url('user/'.$item->user_id)}}">{{ $item->user->name}}</a></li>
        <li>最低価格 : {{ number_format($item->min_price) }}</li>
        <li>商品紹介 : {{ $item->item_desc }}</li>
        <li>募集終了 : {{ $item->published }}</li>
    </ul>
    <a class="btn btn-danger pull-right" href="#" onclick="history.back(-1);return false">Back</a>
</div>

<hr>
@if($bid)
<li>応募日時 : {{ $bid -> bid_time}}</li>
<li>申請価格 : {{ number_format($bid -> max_price)}}</li>
<li>メッセージ : {{ $bid -> message}}</li>

@endif

@endsection