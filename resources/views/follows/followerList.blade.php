@extends('layouts.login')

@section('content')
<div class='container'>
        @foreach($followersPosts as $followersPost)
        <div class="follows_icon">
            <td>
              @if($followersPost->images === 'dawn.png')
              <a href="/{{$followersPost->follower_id}}/followsProfile">
                <img class="TLicon" src="/images/{{ $followersPost->images }}" alt="image">
              </a>
              @else
              <a href="/{{$followersPost->follower_id}}/followsProfile">
                <img class="TLicon" src="{{ asset('storage/images/' . $followersPost->images) }}" alt="image">
              </a>
              @endif
              @endforeach
            </td>
        </div>

@foreach($followersPosts as $followersPost)
        <table class='table table-hover'>
            <td>
              @if($followersPost->images === 'dawn.png')
              <a href="/{{$followersPost->follower_id}}/followsProfile">
              <img class="TLicon" src="/images/{{ $followersPost->images }}" alt="image">
              </a>
              @else
              <a href="/{{$followersPost->follower_id}}/followsProfile">
              <img class="TLicon" src="{{ asset('storage/images/' . $followersPost->images) }}" alt="image">
              </a>
            </td>
              @endif
              <td>{{$followersPost->username}}</td>
              <td>{{$followersPost->posts}}</td>
              <td>{{$followersPost->created_at}}</td>
            @endforeach
          </td>
        </table>
</div>

@endsection
