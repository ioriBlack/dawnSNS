@extends('layouts.login')

@section('content')
<h2>機能を実装していきましょう。</h2>
<p class="pull-right"><a class="btn btn-success" href="/createForm">投稿する</a></p>


<div class="container">
  <div class="btn-wrapper">
    <from action="createForm" method="post" class="createBtn">
      <img src="images/post.png">
    </from>
  </div>
</div>


<head>
    <meta charset='utf-8"'>
    <link rel='stylesheet' href="{{ asset('/css/app.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

    <div class='container'>
        <h2 class='page-header'>投稿一覧</h2>
        <table class='table table-hover'>
            <tr>
                <th>投稿No</th>
                <th>投稿内容</th>
                <th>投稿日時</th>


            <th></th>


            </tr>
            @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->posts }}</td>
                <td>{{ $post->created_at }}</td>

                 <td><a class="btn btn-primary" href="/posts/{{ $post->id }}/update-form">更新</a></td>

            </tr>
            @endforeach
        </table>
    </div>
    <footer>
        <small>Laravel@dawn.curriculum</small>
    </footer>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>



@endsection
