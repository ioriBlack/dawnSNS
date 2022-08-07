@extends('layouts.login')
@section('content')
            <div id="search">
                    <form role="search" action="/followerList" method="get">
                        <input type="text" name="search" placeholder="ユーザー名で検索">
                        <button type="submit"><i></i></button>
                    </form>
            </div>

<div class='container'>
        <h2 class='page-header'>フォロワーリスト</h2>
        <table class='table table-hover'>
          <tr>

             @foreach ($my_followers as $follower)
                <td>{{ $follower->username }}</td>
                <td>
                  <a class="btn btn-primary" href="/follows/{{ $follower->id }}/follow">フォロー</a>
                </td>
          </tr>
            @endforeach
        </table>
</div>
@endsection
