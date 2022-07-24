@extends('layouts.login')
@section('content')
<div class='container'>
        <h2 class='page-header'>フォロワーリスト</h2>
        <table class='table table-hover'>
          <th></th>
          <th></th>
             @foreach ($followers as $follower)
            <tr>
                <td>{{ $follower->username }}</td>
            </tr>
              <td><a class="btn btn-primary" href="/follows/{{ $follower->id }}/follow">フォロー</a></td>
            @endforeach
        </table>
    </div>
    </div>
@endsection
