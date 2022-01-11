@extends('layouts.app')
@section('content')

<div class="card-title">
    アイテム登録
</div>
    <!-- バリデーションエラーの表示に使用-->
    @include('common.errors')
    <!-- ログインしたユーザーしか投稿できない -->
    @if(Auth::check())
    <!-- 本登録フォーム -->
    <form action="{{ url('list') }}" method="POST" class="form-horizontal"　enctype='multipart/form-data'>
        {{ csrf_field() }}
        <!-- 本のタイトル -->
        <div class="form-group">
            <div class="card-title">
                アイテム名
            </div>
            <div class="col-sm-6">
                <input type="text" name="item_name" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <div class="card-title">
                最低価格
            </div>
            <div class="col-sm-6">
                <input type="number" name="min_price" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <div class="card-title">
                紹介
            </div>
            <div class="col-sm-6">
                <input type="textbox" name="item_desc" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <div class="card-title">
                画像アップロード
            </div>
            <div class="col-sm-6">
                <input type="file" name="img_1" class="form-control" accept='image/' enctype="multipart/form-data" multiple="multiple" required autofocus>
            </div>
        </div>

        <div class="form-group">
            <div class="card-title">
                <div>募集期間</div>
            </div>
            <div class="col-sm-6">
                <select name="duration">
                    <option value="1">1時間</option>
                    <option value="2">1日 (24時間)</option>
                    <option value="3">3日間</option>
                    <option value="4">1週間</option>
                    <option value="5">3分間</option>
                </select>
            </div>
        </div>
        
        <!-- アイテム 登録ボタン -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-primary">
                    出品
                </button>
            </div>
        </div>
    </form>
@else
    <div>
        ログインしてください！
        <a href="/login">ログイン画面へ</a>
    </div>

@endif
@endsection
