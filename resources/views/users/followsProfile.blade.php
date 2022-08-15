<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>
<body>
    <header>
    <div id = "head">
        <h1><a href="/top"><img src="images/main_logo.png"></a></h1>
            <div id="iconList">
                <div id="icon">
                    <p><?php $users = Auth::user(); ?>{{$users->username}}さん</p>
                        <a href="/myProfile">
                            <img class="profileIcon" src="images/dawn.png">
                        </a>
                <div>
                <div class="pulldown-wrapper">
                    <ul class="pulldown">
                        <li><a href="/top">ホーム</a></li>
                        <li><a href="/myProfile">プロフィール</a></li>
                        <li><a href="/logout">ログアウト</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <div id="row">
        <div id="container">

        <h2 class='page-header'>投稿一覧</h2>
        <table class='table table-hover'>
            <tr>
                <th></th>
                <th>投稿内容</th>
                <th>投稿日時</th>

            <th></th>
            <th></th>

            @foreach($followsProfile as $followProfile)
            <tr>
                <td>
                  @if($followProfile->images === 'dawn.png')
                  <img src="/images/{{ $followProfile->images }}" alt="image">
                  @else
                  <img src="{{ asset('storage/images/' . $followProfile->images) }}" alt="image">
                  @endif
                </td>
                <td>{{ $followProfile->posts }}</td>
                <td>{{ $followProfile->created_at }}</td>

                 <td><a class="edit" href="/posts/{{ $followProfile->id }}/update-form">
                  <img class="edit-btn" src="images/edit.png"></a></td>
                 <td><a class="trash" href="/post/{{ $followProfile->id }}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><img class="trash-btn" src="images/trash_h.png"></a></td>

            </tr>
            @endforeach
        </table>
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p><?php $users = Auth::user(); ?>{{$users->username}}さんの</p>
                <div>
                <p>フォロー数</p>
                <p>{{ $follows_count }}名</p>
                <p class="btn"><a href="/followsList">フォローリスト</a></p>
                <div>
                <p>フォロワー数</p>
                <p>{{$followers_count}}名</p>
                </div>
                <p class="btn"><a href="/followerList">フォロワーリスト</a></p>
            </div>
            <p class="btn"><a href="/search">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>
    <script src="JavaScriptファイルのURL"></script>
    <script src="JavaScriptファイルのURL"></script>
</body>
</html>
