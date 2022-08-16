@extends('layouts.login')
@section('content')
<div class='container'>
        @foreach($followersPosts as $followersPost)
            <div id="follows_icon">
              @if($followersPost->images === 'dawn.png')
              <a href="">
                <img class="TLicon" src="/images/{{ $followersPost->images }}" alt="image">
              </a>
              @else
              <a href="">
                <img class="TLicon" src="{{ asset('storage/images/' . $followersPost->images) }}" alt="image">
              </a>
              @endif
            </div>


        <table class='table table-hover'>
          <tr>
              @if($followersPost->images === 'dawn.png')
              <a href="/{{$followersPost->follower_id}}/followsProfile">
              <img class="TLicon" src="/images/{{ $followersPost->images }}" alt="image">
              </a>
              @else
              <a href="/{{$followersPost->follower_id}}/followsProfile">
              <img class="TLicon" src="{{ asset('storage/images/' . $followersPost->images) }}" alt="image">
              </a>
              @endif
              <td>{{$followersPost->posts}}</td>
              <td>{{$followersPost->created_at}}</td>
            @endforeach
          </tr>
        </table>
</div>
@endsection
