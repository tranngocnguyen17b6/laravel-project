<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/style.css') }}">
    <link rel="stylesheet" href="{{asset('css/wellcome.css') }}">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="div-header mb-20">
            <h2>＜全国私立保育園連盟> 災害報告フォーム</h2>
        </div>
        <div class="mb-10 report-form">
            <form action="" method="POST">
                <div class="mb-10">
                    <h4 class="inline-block mr-10">Q1</h4><label class="inline-block" for="">被害の種類を選択してください</label>
                <div class="div-input">
                    <input type="radio">台風10号
                    <input type="radio">台風10号
                </div>
            </div>

            <div class="mb-10">
                <h4 class="inline-block mr-10">Q2</h4><label class="inline-block" for=""><span style="color: red">(必須) </span> 保育施設・事業所のある郵便番号をご記入ください。
                </label>
            <div class="div-input">
                <div class="div-row">
                    <label for="">郵便番号</label>
                    <input class="input" type="text">
                    <button class="btn">住所検索</button>
                </div>
            </div>
        </div>
            </form>
        </div>
    </div>
</body>
</html>