@extends('layouts.app')
@section('content')
@include('common.errors')
<div class="card-body">
    
    <ul>
        <li>ユーザー名 : {{ $user->name }}</li>
        <li>誕生年月 : {{ $user->birth_year}} / {{ $user->birth_month}}</li>
        <li>自己紹介 : {{ $user->user_desc }}</li>
    </ul>
    @if($user->prof_img)
        <img src="/users/{{ $user->prof_img}}">
    @endif
    @if(Auth::id() == $user->id)
        <form action="{{ url('useredit/'.$user->id) }}" method="GET"> {{ csrf_field() }}
            <button type="submit" class="btn btn-primary">
                編集
            </button>
        </form>
    @endif
    <hr>
    <div>自分の作品一覧</div>
    @foreach ($user->item as $item)
        <tfoot>    
            <tr>
                <!-- 本タイトル -->
                <td class="table-text">
                    <div>{{ $item->item_name }}</div>
                </td>
            
                <!-- 紹介 -->
                <td class="table-text">
                    <div>{{ $item->item_desc }}</div>
                </td>
                <td>
                    <form action="{{ url('item/'.$item->id) }}" method="GET">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-primary">
                            詳細
                        </button>
                    </form>
                </td>
            </tr>
        </tfoot>
        <hr>
    @endforeach
    <div>購入商品一覧</div>
    <hr>
    @if($purchases)

    <?php
        $sum=0;
    ?>
    @foreach ($purchases as $purchase)
        <tfoot>    
            <tr>
                <td class="table-text">
                    <div>商品名: {{ $purchase->item->item_name }}</div>
                </td>
            
                <td class="table-text">
                    <div>購入価格: {{ number_format($purchase->final_price) }}</div>
                </td>
                <td>
                    <form action="{{ url('item/'.$purchase->item->id) }}" method="GET">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-primary">
                            詳細
                        </button>
                    </form>
                </td>
            </tr>
            <?php
                $sum += $purchase->final_price;
            ?>
        </tfoot>
        <hr>
    @endforeach
    <div> 合計支援額: {{number_format($sum)}} 円 </div>
    @endif

    <div>
    <form action="{{ url('/') }}" method="GET"> {{ csrf_field() }}
            <button type="submit" class="btn btn-danger">
                Back
            </button>
    </form>
    </div>
</div>
    
@endsection