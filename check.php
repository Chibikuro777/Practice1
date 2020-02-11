<?php
// POST送信以外index.phpにリダイレクトする
if($_SERVER["REQUEST_METHOD"] != "POST"){
    header("location: index.php");
    exit;
}

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
    <div class="title">
    <h1>確認フォーム</h1>
    </div>
    <?php if($lastName == "" || $firstName == "" || $firstKanaName =="" || $lastKanaName =="" || $zip == "" || $pref == "" || $city == "" || $num == "" || $tel == "" || $email == "" || $c_email == "" || $content ==""): ?>
        <form action="" method="post">
                <div class="content">
                <p style="color: red; font-weight: bold; font-size: 20px;"><?php echo "※未入力があります。前のページに戻ってください！"?></p>
                </div>
                <div class="content">
                    名前（姓）&nbsp;&nbsp;<input type="text" name="last-name" value=""class="">
                    <?php if($lastName == "") :?>
                    <p style="color: red; font-weight: bold"><?php echo "※必須項目です" ?></p>
                    <?php endif; ?>
                </div>
                <div class="content">
                    名前（名）&nbsp;&nbsp;<input type="text" name="first-name" value="">
                    <?php if($firstName == "") :?>
                    <p style="color: red; font-weight: bold"><?php echo "※必須項目です" ?></p>
                    <?php endif; ?>
                </div>
                <div class="content">
                    フリガナ（セイ）&nbsp;&nbsp;<input type="text" name="last-kananame" value="">
                    <?php if ($lastKanaName == "" && !preg_match("/^[ァ-ヶー]+$/u", $lastKanaName)) :?>
                    <p style="color: red; font-weight: bold"><?php echo "※必須項目です" ?></p>
                    <p style="color: red; font-weight: bold;"><?php echo "※カタカナで入力してください" ?></p>
                    <?php elseif(!preg_match("/^[ァ-ヶー]+$/u", $lastKanaName)):?>
                    <p style="color: red; font-weight: bold;"><?php echo "※カタカナで入力してください" ?></p>
                    <?php endif; ?>
                </div>
                <div class="content">
                    フリガナ（メイ）&nbsp;&nbsp;<input type="text" name="first-kananame" value="">
                    <?php if ($firstKanaName == "" && !preg_match("/^[ァ-ヶー]+$/u", $firstKanaName)) :?>
                    <p style="color: red; font-weight: bold"><?php echo "※必須項目です" ?></p>
                    <p style="color: red; font-weight: bold;"><?php echo "※カタカナで入力してください" ?></p>
                    <?php elseif(!preg_match("/^[ァ-ヶー]+$/u", $firstKanaName)):?>
                    <p style="color: red; font-weight: bold;"><?php echo "※カタカナで入力してください" ?></p>
                    <?php endif; ?>
                </div>
                <div class="content">
                    郵便番号&nbsp;&nbsp;<input type="text" name="zip" value="">
                    <?php if($zip == "" && !preg_match("/^[0-9]{7}$/", $zip)) :?>
                    <p style="color: red; font-weight: bold"><?php echo "※必須項目です" ?></p>
                    <p style="color: red; font-weight: bold"><?php echo "※-(ハイフン)抜き半角数字で入力してください" ?></p>
                    <?php elseif (!preg_match("/^[0-9]{7}$/", $zip)) :?>
                    <p style="color: red; font-weight: bold"><?php echo "※-(ハイフン)抜き半角数字で入力してください" ?></p>
                    <?php endif; ?>
                </div>
                <div class="content">
                    都道府県&nbsp;&nbsp;<input type="text" name="pref" value="">
                    <?php if($pref == "") :?>
                    <p style="color: red; font-weight: bold"><?php echo "※必須項目です" ?></p>
                    <?php endif; ?>
                </div>
                <div class="content">
                    市区町村&nbsp;&nbsp;<input type="text" name="city" value="">
                    <?php if($city == "") :?>
                    <p style="color: red; font-weight: bold"><?php echo "※必須項目です" ?></p>
                    <?php endif; ?>
                </div>
                <div class="content">
                    番地&nbsp;&nbsp;<input type="text" name="num" value="">
                    <?php if($num == "") :?>
                    <p style="color: red; font-weight: bold"><?php echo "※必須項目です" ?></p>
                    <?php endif; ?>
                </div>
                <div class="content">
                    建物名&nbsp;&nbsp;<input type="text" name="bld" value="">
                </div>
                <div class="content">
                    電話番号&nbsp;&nbsp;<input type="text" name="tel" value="">
                    <?php if($tel == "" && !preg_match("/^[0-9]{9,11}$/", $tel)) :?>
                    <p style="color: red; font-weight: bold"><?php echo "※必須項目です" ?></p>
                    <p style="color: red; font-weight: bold"><?php echo "※-(ハイフン)抜き半角数字で入力してください" ?></p>
                    <?php elseif(!preg_match("/^[0-9]{9,11}$/", $tel)) :?>
                    <p style="color: red; font-weight: bold"><?php echo "※-(ハイフン)抜き半角数字で入力してください" ?></p>
                    <?php endif; ?>
                </div>
                <div class="content">
                    メールアドレス&nbsp;&nbsp;<input type="text" name="email" value="">
                    <?php if($email == "" && !preg_match("/^[a-z][a-zA-Z0-9_¥.¥-]*@[a-zA-Z0-9_¥.¥-]+$/",$email)) :?>
                    <p style="color: red; font-weight: bold"><?php echo "※必須項目です" ?></p>
                    <p style="color: red; font-weight: bold"><?php echo "※正しいメールアドレスを入力してください" ?></p>
                    <?php elseif(!preg_match("/^[a-z][a-zA-Z0-9_¥.¥-]*@[a-zA-Z0-9_¥.¥-]+$/",$email)) :?>
                    <p style="color: red; font-weight: bold"><?php echo "※正しいメールアドレスを入力してください" ?></p>
                    <?php endif; ?>
                </div>
                <div class="content">
                    確認用メールアドレス&nbsp;&nbsp;<input type="text" name="c_email" value="">
                    <?php if($c_email == ""):?>
                    <p style="color: red; font-weight: bold"><?php echo "※必須項目です" ?></p>
                    <?php elseif(!preg_match("/^[a-z][a-zA-Z0-9_¥.¥-]*@[a-zA-Z0-9_¥.¥-]+$/",$email) && $email != $c_email) :?>
                    <p style="color: red; font-weight: bold"><?php echo "※正しいメールアドレスを入力してください" ?></p>
                    <p style="color: red; font-weight: bold"><?php echo "※メールアドレスが一致しません" ?></p>
                    <?php elseif($email != $c_email) :?>
                    <p style="color: red; font-weight: bold"><?php echo "※メールアドレスが一致しません" ?></p>
                    <?php endif; ?>
                </div>
                <div class="content">
                    お問い合わせ内容&nbsp;&nbsp;<textarea name="content" cols="50" rows="10"></textarea>
                    <?php if($content == "") :?>
                    <p style="color: red; font-weight: bold"><?php echo "※必須項目です" ?></p>
                    <?php endif; ?>
                </div>
                <div class="content-button">
            <input type="button" name="return" value="戻る" onclick="history.back()" class="submit">
                </div>
        </form>
        <?php endif; ?>
        <form action="thanks.php" method="post">
            <?php if($lastName != "" && $firstName != "" && $firstKanaName !="" && $lastKanaName !="" &&$zip !="" &&$pref !="" &&$city !="" &&$num !="" &&$tel !="" &&$email !="" &&$c_email !="" &&$content !="") : ?>
                <div class="content">
                    <p><?php echo htmlspecialchars($lastName) ?></p>
                </div>
                <div class="content">
                    <p><?php echo htmlspecialchars($firstName) ?></p>
                </div>
                <div class="content">
                    <p><?php echo htmlspecialchars($lastKanaName) ?></p>
                </div>
                <div class="content">
                    <p><?php echo htmlspecialchars($lastKanaName) ?></p>
                </div>
                <div class="content">
                    <p><?php echo htmlspecialchars($zip) ?></p>
                </div>
                <div class="content">
                    <p><?php echo htmlspecialchars($pref) ?></p>
                </div>
                <div class="content">
                    <p><?php echo htmlspecialchars($city) ?></p>
                </div>
                <div class="content">
                    <p><?php echo htmlspecialchars($num) ?></p>
                </div>
                <div class="content">
                    <p><?php echo htmlspecialchars($bld) ?></p>
                </div>
                <div class="content">
                    <p><?php echo htmlspecialchars($tel) ?></p>
                </div>
                <div class="content">
                    <p><?php echo htmlspecialchars($email) ?></p>
                </div>
                <div class="content">
                    <p><?php echo htmlspecialchars($c_email) ?></p>
                </div>
                <div class="content">
                    <p><?php echo htmlspecialchars($content) ?></p>
                </div>
        <div class="content-button">
            <input type="button" name="return" value="戻る" onclick="history.back()" class="submit">
            <input type="submit" name="submit" value="送信" class="submit">
        <?php endif; ?>
        </div>
        </form>
</body>
</html>