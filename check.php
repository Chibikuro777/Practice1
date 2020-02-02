<?php
    $firstName = $_POST['first-name'];
    $lastName = $_POST['last-name'];
    $firstKanaName = $_POST['first-kananame'];
    $lastKanaName = $_POST['last-kananame'];
    $zip = $_POST['zip'];
    $pref = $_POST['pref'];
    $city = $_POST['city'];
    $num = $_POST['num'];
    $bld = $_POST['bld'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $c_email = $_POST['c_email'];
    $content = $_POST['content'];
    $submit = $_POST['submit'];

    if (preg_match("/^[ァ-ヶー]+$/u", $lastKanaName)){
        $lastKanaName_result = "";
    }else{
        $lastKanaName_result = "※カタカナで入力してください";
    }
    
    if (preg_match("/^[ァ-ヶー]+$/u", $firstKanaName)){
        $firstKanaName_result = "";
    }else{
        $firstKanaName_result = "※カタカナで入力してください";
    }
    
    if (preg_match("/^[0-9]{7}$/", $zip)){
        $zip_result = "";
    }else{
        $zip_result = "※-(ハイフン)抜き半角数字で入力してください";
    }

    if(preg_match("/^[0-9]{9,11}$/", $tel)){
        $tel_result = "";
    }else{
        $tel_result = "※-(ハイフン)抜き半角数字で入力してください";
    }

    if(preg_match("/^[a-z][a-zA-Z0-9_¥.¥-]*@[a-zA-Z0-9_¥.¥-]+$/",$email)&&(preg_match("/^[a-z][a-zA-Z0-9_¥.¥-]*@[a-zA-Z0-9_¥.¥-]+$/", $c_email))){
        $email_result = "";
    }else{
        $email_result = "※正しいメールアドレスを入力してください";
    }

    if($email != $c_email){
        $c_email_result = "※メールアドレスが一致しません";
    }else{
        $c_email_result = "";
    }

   
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
    <?php if ($firstName =='' || $lastName =='' || $firstKanaName =='' || $lastKanaName =='' || $zip ==''||
    $pref =='' || $city =='' || $num =='' || $tel =='' || $email =='' || $content ==''): ?>
    <div class="content">
    <p>必須項目に入力してください</p>
    </div>
    <input type="button" name="return" onclick="history.back()" value="戻る" class="submit">

    <div class="content">
    <input type="hidden" name="firstname" value=""class="">
    </div>
    <div class="content">
    <input type="hidden" name="email" value="">
    </div>
    
    <input type="hidden" name="return" value="戻る" class="submit">
    <input type="hidden" name="submit" value="確認" class="submit">
    <?php elseif ($firstName !='' || $lastName !='' || $zip !=''||
    $pref !='' || $city !='' || $num !='' || $tel !='' || $email !='' || $c_email !=''|| $content !=''): ?>
    <div class="content">
    <p><?php echo $lastName ?></p>
    </div>
    <div class="content">
    <p><?php echo $firstName ?></p>
    </div>
    <div class="content">
    <p><?php echo $lastKanaName ?></p>
    <p style="color: red; font-weight: bold;"><?php echo $lastKanaName_result ?></p>
    </div>

    <div class="content">
    <p><?php echo $firstKanaName ?></p>
    <p style="color: red; font-weight: bold;"><?php echo $firstKanaName_result ?></p>
    </div>


    <div class="content">
    <p><?php echo $zip ?></p>
    <p style="color: red; font-weight: bold;"><?php echo $zip_result ?></p>
    </div>
    <div class="content">
    <p><?php echo $pref ?></p>
    </div>
    <div class="content">
    <p><?php echo $city ?></p>
    </div>
    <div class="content">
    <p><?php echo $num ?></p>
    </div>
    <div class="content">
    <p><?php echo $bld ?></p>
    </div>
    <div class="content">
    <p><?php echo $tel ?></p>
    <p style="color: red; font-weight: bold;"><?php echo $tel_result ?></p>
    </div>
    <div class="content">
    <p><?php echo $email ?></p>
    </div>
    <div class="content">
    <p><?php echo $c_email ?></p>
    <p style="color: red; font-weight: bold;"><?php echo $email_result ?></p>
    <p style="color: red; font-weight: bold;"><?php echo $c_email_result ?></p>
    </div>
    <div class="content">
    <p><?php echo $content ?></p>
    </div>

    <div class="content-button">
    <input type="button" name="return" value="戻る" onclick="history.back()" class="submit">
    <input type="submit" name="submit" value="送信" class="submit">
    <?php endif; ?>

    </div>
    </form>
</body>
</html>