<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Practice1</title>
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <form action="check.php" method="post">
            <h1>入力フォーム</h1>
            <div class="content">
                名前（姓）&nbsp;&nbsp;<input type="text" name="last-name" value=""class="">
            </div>
            <div class="content">
                名前（名）&nbsp;&nbsp;<input type="text" name="first-name" value="">
            </div>
            <div class="content">
                フリガナ（セイ）&nbsp;&nbsp;<input type="text" name="last-kananame" value="">
            </div>
            <div class="content">
                フリガナ（メイ）&nbsp;&nbsp;<input type="text" name="first-kananame" value="">
            </div>
            <div class="content">
                郵便番号&nbsp;&nbsp;<input type="text" name="zip" value="">
            </div>
            <div class="content">
                都道府県&nbsp;&nbsp;<input type="text" name="pref" value="">
            </div>
            <div class="content">
                市区町村&nbsp;&nbsp;<input type="text" name="city" value="">
            </div>
            <div class="content">
                番地&nbsp;&nbsp;<input type="text" name="num" value="">
            </div>
            <div class="content">
                建物名&nbsp;&nbsp;<input type="text" name="bld" value="">
            </div>
            <div class="content">
                電話番号&nbsp;&nbsp;<input type="text" name="tel" value="">
            </div>
            <div class="content">
                メールアドレス&nbsp;&nbsp;<input type="text" name="email" value="">
            </div>
            <div class="content">
                確認用メールアドレス&nbsp;&nbsp;<input type="text" name="c_email" value="">
            </div>
            <div class="content">
                お問い合わせ内容&nbsp;&nbsp;<textarea name="content" cols="50" rows="10"></textarea>
            </div>
            <input type="submit" name="submit" value="確認" class="submit">
        </form>
    </body>
</html>