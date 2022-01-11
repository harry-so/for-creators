@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
    @include('common.errors')
    @if(Auth::check())
        @if(Auth::id() == $user->id)
        <form action="{{ url('user/update') }}" method="POST" enctype="multipart/form-data">
               <!-- enctype = 複合データ型であることを示し、１回のHTTP通信で、複数の種類のデータ形式を扱う事でできるようになります。 -->
            <!-- item_name -->
            <div class="form-group">
                <label for="user_name">ユーザー名</label>
                <input type="text" name="name" class="form-control" value="{{$user->name}}">
                <label for="birthday">誕生年月</label>
                <input type="number" name="birth_year" class="form-control" value="{{$user->birth_year}}"> /
                <input type="number" name="birth_month" class="form-control" value="{{$user->birth_month}}">
                <label for="user_desc">紹介</label>
                <input type="text" name="user_desc" class="form-control" value="{{$user->user_desc}}">
                <label for="prof_img">プロフィール画像</label>
                <input type="file" name="prof_img" class="form-control" accept='image/' enctype="multipart/form-data" multiple="multiple" required autofocus>
            </div>
            <!--/ item_name -->
            <!-- Save ボタン/Back ボタン -->
            <div class="well well-sm">
                <button type="submit" class="btn btn-primary">Save</button>
                <a class="btn btn-link pull-right" href="{{ url('/user/.$user->id') }}"> Back</a>
            </div>
            <!--/ Save ボタン/Back ボタン -->
            <!-- id 値を送信 -->
            <input type="hidden" name="id" value="{{$user->id}}" /> <!--/ id 値を送信 -->
            <!-- CSRF -->
            {{ csrf_field() }}
            <!--/ CSRF -->
        </form>
    </div>
        @endif
    @endif
</div>
@endsection