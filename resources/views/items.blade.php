@extends('layouts.app')
@section('content')


@include('partials.discover.breadcumb')
@include('partials.home.collection')
@include('partials.home.feature')

<div class="card-body">
    <form action="{{ url('sell') }}" method="GET">
        {{ csrf_field() }}
        <button type="submit" class="btn btn-danger">
            出品へ
        </button>
    </form>
    @if (count($items) > 0)
    <div class="card-body">
        <div class="card-body">
            <table class="table table-striped task-table">
                <!-- テーブルヘッダ -->
                <thead>
                    <th>アイテム一覧</th>
                    <th>&nbsp;</th>
                </thead>
                <!-- テーブル本体 -->
                <tbody>
                    <tr>
                        <th>アイテム名</th>
                        <th>出品者</th>
                        <th>最低価格</th>
                        <th>商品紹介</th>
                        <th>残り時間</th>
                    </tr>
                </tbody>  
                @foreach ($items as $item)
                <tfoot>    
                    <tr>
                        <!-- 本タイトル -->
                        <td class="table-text"><a href="{{url('item/'.$item->id)}}">
                            <div>{{ $item->item_name }}</div></a>
                        </td>
                        <!-- 紹介者 -->
                        <td class="table-text"><a href="{{url('user/'.$item->user_id)}}">
                            <div>{{ $item->user->name }}</div></a>
                        </td>
                        <!-- 最低価格 -->
                        <td class="table-text">
                            <div>{{ number_format($item->min_price) }}</div>
                        </td>
                        <!-- 紹介 -->
                        <td class="table-text">
                            <div>{{ $item->item_desc }}</div>
                        </td>
                        
                        
                        <!-- 残り時間計算 -->
                        <?php
                        $enddate = strtotime($item->endtime);
                        $startdate = strtotime('now');
                        $diff = $enddate - $startdate;

                        if (0 <= $diff && $diff < 60) {
                            $timeleft = 'あと1分以内に終了';
                        } elseif (61 <= $diff && $diff < 3600) {
                            $timeleft = round($diff / 60) . '分前';
                        } elseif (3600 <= $diff && $diff < 24*3600) {
                            $timeleft = round($diff / 3600) . '時間前';
                        } elseif (24*3600 <= $diff && $diff < 24*3600*7) {
                            $timeleft= round($diff / (3600*24)) . '日前';
                        } elseif ($diff < 0) {
                            $timeleft = '終了！';
                        } else {
                            $timeleft = "1週間以上";
                        };
                        ?>                  
                        <td class="table-text">
                            <div>{{ $timeleft }}</div>
                        </td>
                        <!--                            
                        @if($item->img_1)
                        <td class="table-text">
                            <img src="/items/{{ $item->img_1}}"> -->
                        <!-- </td> -->
                        <!-- @endif -->
                        <!-- <td>
                            <form action="{{ url('item/'.$item->id) }}" method="GET">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-primary">
                                    詳細
                                </button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ url('user/'.$item->user_id) }}" method="GET"> 
                            {{ csrf_field() }}
                                <button type="submit" class="btn btn-primary">
                                    ユーザー
                                </button>
                            </form>
                        </td> -->
                        <!-- 本: 削除ボタン -->
                        @if(Auth::check())
                            @if(Auth::id() == $item->user_id)
                            <td>
                                <form action="{{ url('itemdelete/'.$item->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger">
                                        削除
                                    </button>
                                </form>
                            </td>
                            
                            <td>
                                <form action="{{ url('itemsedit/'.$item->id) }}" method="GET"> {{ csrf_field() }}
                                    <button type="submit" class="btn btn-primary">
                                        更新
                                    </button>
                                </form>
                            </td>
                            
                            @endif
                            @if(Auth::id() != $item->user_id && $item->fav_user()->where('user_id',Auth::id())->exists() !== true)
                            <td>
                                <form action="{{ url('item/fav/'.$item->id) }}" method="POST"> {{ csrf_field() }}
                                    <button type="submit" class="btn btn-primary">
                                        FAV
                                    </button>
                                </form>
                            @endif
                        @endif
                        </td>
                    </tr>
                @endforeach
                </tfoot>
            </table>
        </div>
    </div>
    @endif

</div>

@if( Auth::check())
@if (count($fav_items) > 0)
        <div class="card-body">
            <div class="card-body">
                <table class="table table-striped task-table">
                    <!-- テーブルヘッダ -->
                    <thead>
                        <th>お気に入り一覧</th>
                        <th>&nbsp;</th>
                    </thead>
                    <tr>
                        <th>アイテム名</th>
                        <th>商品紹介</th>
                        <th>出品者</th>
                    </tr>
                    <!-- テーブル本体 -->
                    <tbody>
                        @foreach ($fav_items as $fav_item)
                            <tr>
                                <!-- 投稿タイトル -->
                                <td class="table-text"><a href="{{url('item/'.$fav_item->id)}}">
                                    <div>{{ $fav_item->item_name }}</div></a>
                                </td>
                                 <!-- 投稿詳細 -->
                                <td class="table-text">
                                    <div>{{ $fav_item->item_desc }}</div>
                                </td>
                                <!-- 投稿者名の表示 -->
                                <td class="table-text"><a href="{{url('user/'.$fav_item->user->id)}}">
                                    <div>{{ $fav_item->user->name }}</div></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>		
    @endif

@endif

<div class="row">
	<div class="col-md-4 offset-md-4">
		{{ $items->links()}}
    </div>
</div>
@endsection