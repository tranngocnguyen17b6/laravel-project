<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/style.css') }}">
    <link rel="stylesheet" href="{{asset('css/header.css') }}">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="div-left" style="width: 70%">
              <nav class="navbar">
                  <ul class="navbar-nav" >
                    <li class="inline-block"><a class="navbar-brand label-hover " href="">
                        <h2>全国私立保育園連盟 被害報告管理</h2>
                      </a></li>
                    <li class="inline-block">
                      <a  href="/User/user_list">会員園管理</a>
                    </li>
                    <li class="inline-block">
                      <a  href="/Subject/subject_list">報告管理</a>
                    </li>
                    <li class="inline-block">
                      <a  href="/Subject/subject_list">権限者管理</a>
                    </li>
                    <li class="inline-block">
                      <a  href="/Subject/subject_list">被害報告データ</a>
                    </li>
                    <li class="inline-block">
                      <a  href="/format">フォーマット管理</a>
                    </li>
                  </ul>
                </nav>
            </div>
          <div class="div-right" style="width: 30%; height:100% box-sizing:border-box">
              <div class="div-logout"><a href="">ログアウト</a></div>
          </div>
      </div>
    </div>
</body>
</html>