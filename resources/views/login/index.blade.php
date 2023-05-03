
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="div-form">
           <div class="mb-20">
            <h2 class="title-h2">全国私立保育園連盟 被害報告管理システム</h2>
           </div>
            <div class="div-login">
                <form action="/log-in" method="post">
                    @csrf
                    <div class="mb-10 label-titel"><label for="label-titel">ログインページ</label></div>
                    <div class="div-input mb-10 id">
                        <div class="div-row">
                            <label for="">ID</label>
                            <input style="width: 185px; height: 25px" type="text" name="admin_id" value="{{isset($input['admin_id']) ? $input['admin_id'] : ""}}">
                            <div class="div-err-span mb-10"><span class="err-span err-id">{{ isset($err['admin_id']) ? $err['admin_id'] : ""}}</span></div>
                        </div>
                    </div>
                    <div class="div-input mb-10 password">
                        <div class="div-row">
                            <label for="">パスワード</label>
                            <input style="width: 185px; height: 25px" type="text" name="password" value="{{isset($input['password']) ? $input['password'] : ""}}">
                            <div class="div-err-span mb-10 text-center"><span class="err-span err-pass">{{ isset($err['password']) ? $err['password'] : "" }}</span></div>
                        </div>
                    </div>
                    <div class="mb-10 btn-login">
                        <button>ログイン</button>
                    </div>
                    <div class="div-err-span mb-10 text-center"><span class="err-span">{{ isset($err['login']) ? $err['login'] : "" }}</span></div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>