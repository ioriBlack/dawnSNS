@extends('layouts.login')

@section('content')
            <div id="follows_icon">
              @foreach ($my_follows as $follow)
              @if($follow->images === 'dawn.png')
              <a href="">
                <img src="/images/{{ $follow->images }}" alt="image">
              </a>
              @else
              <a href="">
                <img src="{{ asset('storage/images/' . $follow->images) }}" alt="image">
              </a>
              @endif
              @endforeach
            </div>

<div class='container'>
        <h2 class='page-header'>フォロワーリスト</h2>
        <table class='table table-hover'>
          <tr>
            @foreach($followsPosts as $followsPost)
              @if($followsPost->images === 'dawn.png')
              <a href="/view/{{ $followsPost->follow_id }}/profile">
              <img src="/images/{{ $followsPost->images }}" alt="image">
              </a>
              @else
              <a href="">
              <img src="{{ asset('storage/images/' . $followsPost->images) }}" alt="image">
              </a>
              @endif
              <td>{{$followsPost->posts}}</td>
              <td>{{$followsPost->created_at}}</td>
            @endforeach
          </tr>
        </table>
</div>
@endsection
