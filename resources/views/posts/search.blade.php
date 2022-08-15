@extends('layouts.login')

@section('content')
  <div class="holder">
<form  class="search_search" action="/search/user" name="keyword" method="get">
  <input class="searchA" type="text" name="keyword"  placeholder="ユーザー名">
  <input class="searchB" type="submit" value="検">
</form>
</div>
<div class="container">

@foreach ($users as $user)
<p>{{ $user->username }}</p>

@if($check->contains('follow_id',$user->id))
<form action="/search/unFollow" method="post">
  @csrf
  <input type="hidden" name="id" value="{{ $user->id }}">
  <input type="submit" value="解除">
</form>
@else
<form action="/search/following" method="post">
  @csrf
  <input type="hidden" name="id" value="{{ $user->id }}">
  <input type="submit" value="フォロー">
</form>
@endif
@endforeach
</div>
@endsection
