@extends('layouts.login')
@section('content')
<div class="container">
  @foreach($followsPosts as $followsPost)
      <div id="follows_icon">
        <td>
          @if($followsPost->images === 'dawn.png')
                <a href="">
                  <img class="TLicon" src="/images/{{ $followsPost->images }}" alt="image">
                </a>
          @else
                <a href="">
                  <img class="TLicon" src="{{ asset('storage/images/' . $followsPost->images) }}" alt="image">
                </a>
          @endif
  @endforeach
        </td>
    </div>

    @foreach($followsPosts as $followsPost)
        <table class='table table-hover'>
            <td>
              @if($followsPost->images === 'dawn.png')
                <a href="/{{$followsPost->follow_id}}/followsProfile">
                  <img class="TLicon" src="/images/{{ $followsPost->images }}" alt="image">
                </a>
              @else
                <a href="/{{$followsPost->follow_id}}/followsProfile">
                  <img class="TLicon" src="{{ asset('storage/images/' . $followsPost->images) }}" alt="image">
                </a>
            </td>
              @endif
                <td>{{$followsPost->posts}}</td>
                <td>{{$followsPost->created_at}}</td>
            @endforeach
           </td>
        </table>
</div>
@endsection
