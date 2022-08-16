@extends('layouts.login')

@section('content')
      <div class="container">

        <h2 class='page-header'>投稿一覧</h2>
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
                <td>{{ $followProfile->posts }}</td>
                <td>{{ $followProfile->created_at }}</td>
            </tr>
            @endforeach
        </table>
      </div >
@endsection
