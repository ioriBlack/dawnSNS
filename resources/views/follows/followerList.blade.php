@extends('layouts.login')
@section('content')
<div class='container'>
        <h2 class='page-header'>投稿一覧</h2>
        <table class='table table-hover'>
          <tr>
                <th>フォロワー</th>
          </tr>
             @foreach ($follows as $follower)
            <tr>
                <td>{{ $follower->follower }}</td>
            </tr>
            @endforeach
        </table>
        <h2 class='page-header'>フォロワー一覧</h2>
        {!! Form::open(['url' => 'post/follower']) !!}
        <div class="form-group">
            {!! Form::input('text', 'newFollower', null, ['required', 'class' => 'form-control', 'placeholder' => '']) !!}
        </div>
        <button type="submit" class="btn btn-success pull-right">追加</button>
        {!! Form::close() !!}
    </div>
@endsection
