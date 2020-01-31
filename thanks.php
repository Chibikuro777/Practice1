<?php
    $to = "sanae.kawasaka@gmail.com";
    $subject = "入力がありました！";
    $message = "入力です";
    $from = "test@example.com";

    mb_language("Japanese");
    mb_encode_mimeheader("UTF-8");
    mb_send_mail($to, $subject, $message, "From" .$from);
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
    <form action="" method="post">
        <h1>送信が完了しました！</h1>
        <p>ありがとうございました。</p>
        <input type="hidden" name="nickname" value="">
        <input type="hidden" name="email" value="">
    </form>
</body>
</html>