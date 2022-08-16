@extends('layouts.login')

@section('content')
<div class="holder">
  <form  class="search_search" action="/search/user" name="keyword" method="get">
    <input class="searchA" type="text" name="keyword"  placeholder="ユーザー名">
    <input class="searchB" type="submit" value="検">
  </form>
</div>

<div class='container'>
@foreach ($users as $user)

  <td>
    @if($user->images === 'dawn.png')
    <img class="TLicon" src="/images/{{ $user->images }}" alt="image">
    @else
    <img class="TLicon" src="{{ asset('storage/images/' . $user->images) }}" alt="image">
    @endif
  </td>

  <td>{{ $user->username }}</td>

  @if($check->contains('follow_id',$user->id))
  <form action="/search/unFollow" method="post">
    @csrf
    <input type="hidden" name="id" value="{{ $user->id }}">
    <input class="followAndUnFollow" type="submit" value="解除">
  </form>
  @else
  <form action="/search/following" method="post">
    @csrf
    <input type="hidden" name="id" value="{{ $user->id }}">
    <input class="followAndUnFollow" type="submit" value="フォロー">
  </form>
  @endif
  @endforeach
</div>
@endsection
