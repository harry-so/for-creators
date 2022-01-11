
@extends('layouts.app')
@section('content')


<hr>
@if($purchaser->item->transaction === 3)
支払い待ち
@elseif($purchaser->item->transaction === 4)
発送待ち
@elseif($purchaser->item->transaction === 5)
配送中
@else
取引完了！
@endif
<hr>

@if($chats)

<tr>
@foreach($chats as $chat)
    @if($chat->user_id == Auth::id())
    <!-- LINEみたいに右側から吹き出しをつける -->
    <div> 
    <td>{{$chat->user_id}}</td>
    <td>{{$chat->created_at}}</td>
    <td>{{$chat->message}}</td>
    </div>

    @else
    <!-- LINEみたいに左からから吹き出しをつける -->
    <div> 
    <td>{{$chat->created_at}}</td>
    <td>{{$chat->message}}</td>
    </div>
    @endif
@endforeach
</tr>

@else
何もチャットがないよ〜
@endif
<hr>


<!-- チャット送信 -->
<form action="{{ url('/chat/') }}" method="POST">
    {{ csrf_field() }}
    <input type="textbox" name="message" class="form-control">
    <input type="hidden" name="item_id" value="{{ $purchaser->item->id }}" > 
    <input type="hidden" name="user_id" value="{{Auth::id()}}" > 
    <input type="hidden" name="purchaser_id" value="{{ $purchaser->id }}">
    <button type="submit">Send</button>

</form>
<hr>


@endsection