@extends('layouts.app')

@section('content')

  @include('partials.home.hero')
  <div class="clearfix"></div>
  @include('partials.home.feature')
  @include('partials.home.supporter')
  @include('partials.home.collection')

@endsection
