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
          </div>
        </div>

        <div class="tweet">
          <div class="tweeting">
            <a class="" href="/createForm">
              <img src="images/post.png">
            </a>
            <div class="tweet_icon">
            </div>
          </div>
        </div>

        <h2 class='page-header'>投稿一覧</h2>
        <table class='table table-hover'>
            <tr>
                <th></th>
                <th>投稿内容</th>
                <th>投稿日時</th>

            <th></th>
            <th></th>

            @foreach($posts as $post)
            <tr>

                <td>
                  @if($post->images === 'dawn.png')
                  <img src="/images/{{ $post->images }}" alt="image">
                  @else
                  <img src="{{ asset('storage/images/' . $post->images) }}" alt="image">
                  @endif
                </td>
                <td>{{ $post->posts }}</td>
                <td>{{ $post->created_at }}</td>

                 <!-- <td>
                  <a class="edit" href="/posts/{{ $post->id }}/update-form">
                    <img class="edit-btn" src="images/edit.png">
                  </a>
                </td>
                 <td>
                    <a class="trash" href="/post/{{ $post->id }}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">
                      <img class="trash-btn" src="images/trash_h.png">
                    </a>
                </td> -->

            </tr>
            @endforeach
        </table>
    </div>
    <footer>
        <small>Laravel@dawn.curriculum</small>
    </footer>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>



@endsection
