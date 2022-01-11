@extends('layouts.app')

@section('content')

  @include('partials.home.hero')
  <div class="clearfix"></div>
  @include('partials.home.feature')
  @include('partials.home.seller')
  @include('partials.home.collection')
  @include('partials.home.auctions')

@endsection
