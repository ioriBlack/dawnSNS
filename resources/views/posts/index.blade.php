@extends('layouts.login')

@section('content')

 <div class="tweetBox">

                  <a class="topicon" href="/myProfile">
                    <img class="profileIcon" src="images/dawn.png">
                  </a>

          <div class="holder">
            <h5 class="whatTweet">何をつぶやこうか…</h5>
          </div>

            <div class="tweet">
              <div class="tweeting">
                <a class="modalOpen" data-target="modal01">
                  <img src="images/post.png">
                </a>
                <div class="tweet_icon">
                </div>
              </div>
            </div>

</div>
    <div class='container'>
        <div class="container">
          <div class="btn-wrapper">
          </div>
        </div>



        <div class="post-main js-modal" id="modal01">
          <div class="post-inner">
            <div class="inner-content">
              <form action="post/create" method="post">
              @csrf
              <input class="form" type="text" name="post">
              <input type="submit" value="投稿">
              <a class="modalClose">戻る</a>
              </form>
            </div>
          </div>
        </div>

        <table class='table table-hover'>

            @foreach($posts as $post)


                <td>
                  @if($post->images === 'dawn.png')
                  <img class="TLicon" src="/images/{{ $post->images }}" alt="image">
                  @else
                  <img class="TLicon" src="{{ asset('storage/images/' . $post->images) }}" alt="image">
                  @endif
                </td>
                <td>{{ $post->posts }}</td>
                <td>{{ $post->created_at }}</td>

                @if($post->user_id == Auth::id())
                 <td>
                  <a class="edit editOpen" data-target="modal{{$post->id}}">
                    <img class="edit-btn" src="images/edit.png">
                  </a>
                </td>

                <div class="edit-main js-modal" id="modal{{$post->id}}">
                  <div class="post-inner">
                    <div class="inner-content">
                      <form action="post/update" method="post">
                      @csrf
                      <input type="hidden" name="id" value="{{$post->id}}">
                      <input type="text" name="post" value="{{$post->posts}}" >
                      <input type="submit" value="編集">
                      </form>
                      <a class="modalClose">戻る</a>
                    </div>
                  </div>
                </div>

                 <td>
                    <a class="trash" href="/post/{{ $post->id }}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">
                      <img class="trash-btn" src="images/trash_h.png">
                    </a>
                </td>
                @endif
            </tr>
            @endforeach
        </table>
<!-- href="/posts/{{ $post->id }}/update-form" -->


    </div>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

@endsection
