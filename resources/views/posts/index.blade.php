@extends('layouts.login')

@section('content')
<head>
    <meta charset='utf-8"'>
    <link rel='stylesheet' href="{{ asset('/css/app.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

    <div class='container'>
        <div class="container">
          <div class="btn-wrapper">
            <a class="" href="/createForm">
              <img src="images/post.png">
            </a>
            <!-- <from action="createForm" method="post" class="createBtn">
              <img src="images/post.png">
            </from> -->
          </div>
        </div>

        <h2 class='page-header'>投稿一覧</h2>
        <table class='table table-hover'>
            <tr>
                <th>投稿No</th>
                <th>投稿内容</th>
                <th>投稿日時</th>

            <th></th>
            <th></th>

            </tr>
            @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->posts }}</td>
                <td>{{ $post->created_at }}</td>

                 <td><a class="btn btn-primary" href="/posts/{{ $post->id }}/update-form">更新</a></td>
                 <td><a class="btn btn-danger" href="/post/{{ $post->id }}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">削除</a></td>

            </tr>
            @endforeach
        </table>
    </div>
    <footer>
        <small>Laravel@dawn.curriculum</small>
    </footer>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>



@endsection
