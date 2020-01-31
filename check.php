<?php
    $nickname = $_POST['nickname'];
    $email = $_POST['email'];
    $submit = $_POST['submit'];
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>確認フォーム</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<form action="thanks.php" method="post">
    <h1>確認フォーム</h1>
    <?php if ($nickname =='' || $email ==''): ?>
    <p>入力されていません</p>
    <input type="submit" name="return" value="戻る" class="submit">

    <div class="content">
    <input type="hidden" name="nickname" value=""class="">
    </div>
    <div class="content">
    <input type="hidden" name="email" value="">
    </div>
    
    <input type="hidden" name="return" value="戻る" class="submit">
    <input type="hidden" name="submit" value="確認" class="submit">
    <?php elseif ($nickname != '' && $email != ''): ?>
    <p><?php echo "あなたのニックネームは{$nickname}です"?></p>
    <p><?php echo "あなたのメールアドレスは{$email}です"?></p>
    <div class="content-button">
    <input type="submit" name="return" value="戻る" class="submit">
    <input type="submit" name="submit" value="送信" class="submit">
    <?php endif; ?>
    </div>
    </form>
</body>
</html>