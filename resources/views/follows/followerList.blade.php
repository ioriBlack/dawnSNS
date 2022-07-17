@extends('layouts.login')
<div class='container'>
        <h2 class='page-header'>投稿一覧</h2>
        <table class='table table-hover'>
          <tr>
                <th>フォロワー</th>

            <th></th>
          </tr>
            @foreach ($followers as $follower)
            <tr>
                <td>{{ $follower->follower }}</td>

            <td></td>
            </tr>
            @endforeach
        </table>
    </div>
@section('content')
@endsection
