<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{asset('css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/motion.js')}}"></script>
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
        <a href="/top"><img src="images/main_logo.png"></a>
            <div id="iconList">

                <p class="username"><?php $users = Auth::user(); ?>{{$users->username}}さん</p>

                <div id="icon">
                  <a href="/myProfile">
                    <img class="profileIcon" src="images/dawn.png">
                  </a>
                <div>

                <div class="openBtn">
                    <span></span>
                    <span></span>

                    <div class="pulldown-wrapper">
                        <ul class="pulldown">
                          <li><a class ="menu" href="/top">ホーム</a></li>
                          <li><a class ="menu" href="/myProfile">プロフィール</a></li>
                          <li><a class ="menu" href="/logout">ログアウト</a></li>
                        </ul>
                    </div>
                </div>
            </div>
    </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p class="rightMenu"><?php $users = Auth::user(); ?>{{$users->username}}さんの</p>
                <div>
                <p class="rightMenu">フォロー数</p>
                <p class="FC">{{ $follows_count }}名</p>
                </div>
                <p class="btn"><a class="list" href="/followsList">フォローリスト</a></p>
                <div>
                <p class="rightMenu">フォロワー数</p>
                <p class="FC">{{$followers_count}}名</p>
                <p class="btn"><a class="list" href="/followerList">フォロワーリスト</a></p>
                <p class="btn"><a class="list" href="/search">ユーザー検索</a></p>
                </div>
        </div>
    </div>
    <footer>
    </footer>
    <script src="JavaScriptファイルのURL"></script>
    <script src="JavaScriptファイルのURL"></script>
</body>
</html>
