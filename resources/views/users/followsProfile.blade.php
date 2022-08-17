@extends('layouts.login')

@section('content')
 <div class="holder">
<td>
                  @if($images->images === 'dawn.png')
                  <img class="TLicon" src="/images/{{ $images->images }}" alt="image">
                  @else
                  <img class="TLicon" src="{{ asset('storage/images/' . $images->images) }}" alt="image">
                  @endif
</td>
<td>
  <span>{{$images->username}}</span>
</td>
<td>
  <span>{{$images->bio}}</span>
</td>
<td>

  @if($check->contains('follow_id',$images->id))
  <form action="/search/unFollow" method="post">
    @csrf
    <input type="hidden" name="id" value="{{ $images->id }}">
    <input class="followAndUnFollow" type="submit" value="解除">
  </form>
  @else
  <form action="/search/following" method="post">
    @csrf
    <input type="hidden" name="id" value="{{ $images->id }}">
    <input class="followAndUnFollow" type="submit" value="フォロー">
  </form>
  @endif

</td>
</div>
      <div class="container">
        <table class='table table-hover'>
            @foreach($followsProfile as $followProfile)
            <tr>
                <td>
                  @if($followProfile->images === 'dawn.png')
                  <img class="TLicon" src="/images/{{ $followProfile->images }}" alt="image">
                  @else
                  <img class="TLicon" src="{{ asset('storage/images/' . $followProfile->images) }}" alt="image">
                  @endif
                </td>
                <td>{{ $followProfile->username }}</td>
                <td>{{ $followProfile->posts }}</td>
                <td>{{ $followProfile->created_at }}</td>
            </tr>
            @endforeach
        </table>
      </div >
@endsection
