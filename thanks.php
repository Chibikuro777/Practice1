<?php
if($_SERVER["REQUEST_METHOD"] !== "POST" || $_POST["button"] !== "submit"){
    header("location: index.php");
}

// メール送信
    $email = isset($_POST['email']);
    $subject = "タイトル";
    $message = "メールアドレス";
    $headers = "From: webmaster@example.com". "\r\n";

    mb_language("Japanese");
    mb_internal_encoding("UTF-8");
    if(mb_send_mail($email, $subject, $message, $headers)){
        echo "送信されました。 ";
    }else{
        echo "送信失敗しました";
    }
    ?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>送信完了</title>
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <form>
            <h1>送信が完了しました！</h1>
            <div class="content">
            <p>ありがとうございました。</p>
            </div>
        </form>
    </body>
</html>