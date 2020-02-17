<?php
// POST送信以外index.phpにリダイレクトする
if($_SERVER["REQUEST_METHOD"] !== "POST" && $_POST["button"] !== "input"){
    header("location: index.php");
    exit;
}

// inputからの値を多次元配列にする（バリデーション項目が増えたときの対応）
// $requestに配列を代入
$request = [];

$request["posts"]["first-name"] = $_POST["first-name"];
$request["posts"]["last-name"] = $_POST['last-name'];
$request["posts"]["first-kananame"] = $_POST['first-kananame'];
$request["posts"]["last-kananame"] = $_POST['last-kananame'];
$request["posts"]["zip"] = $_POST['zip'];
$request["posts"]["pref"] = $_POST['pref'];
$request["posts"]["city"] = $_POST['city'];
$request["posts"]["bld"] = $_POST['bld'];
$request["posts"]["num"] = $_POST['num'];
$request["posts"]["tel"] = $_POST['tel'];
$request["posts"]["email"] = $_POST['email'];
$request["posts"]["c_email"] = $_POST['c_email'];
$request["posts"]["content"] = $_POST['content'];

$request["errors"]["first-name"] = "";
$request["errors"]["last-name"] = "";
$request["errors"]["first-kananame"] = "";
$request["errors"]["last-kananame"] = "";
$request["errors"]["zip"] = "";
$request["errors"]["pref"] = "";
$request["errors"]["city"] = "";
$request["errors"]["num"] = "";
$request["errors"]["tel"] = "";
$request["errors"]["email"] = "";
$request["errors"]["c_email"] = "";
$request["errors"]["content"] = "";

// バリデーション詳細（項目毎)
if(empty($request["posts"]["first-name"])){
    $request["errors"]["first-name"] = "※名は必須項目です";
}

if(empty($request["posts"]["last-name"])){
    $request["errors"]["last-name"] = "※姓は必須項目です";
}

if(empty($request["posts"]["last-kananame"])){
    $request["errors"]["last-kananame"] = "※フリガナ（セイ）は必須項目です";
}elseif(!preg_match("/^[ァ-ヶー]+$/u", $request["posts"]["last-kananame"])){
    $request["errors"]["last-kananame"] = "※カタカナで入力してください";
}

if(empty($request["posts"]["first-kananame"])){
    $request["errors"]["first-kananame"] = "※フリガナ（メイ）は必須項目です";
}elseif(!preg_match("/^[ァ-ヶー]+$/u", $request["posts"]["first-kananame"])){
    $request["errors"]["first-kananame"] = "※カタカナで入力してください";
}

if(empty($request["posts"]["zip"])){
    $request["errors"]["zip"] = "※郵便番号は必須項目です";
}elseif(!preg_match("/^[0-9]{7}$/", $request["posts"]["zip"])){
    $request["errors"]["zip"] = "※-(ハイフン)抜き半角数字で入力してください";
}

if(empty($request["posts"]["pref"])){
    $request["errors"]["pref"] = "※都道府県は必須項目です";
}

if(empty($request["posts"]["city"])){
    $request["errors"]["city"] = "※市町村は必須項目です";
}

if(empty($request["posts"]["num"])) {
    $request["errors"]["num"] = "※番地は必須項目です";
}

if(empty($request["posts"]["tel"])){
    $request["errors"]["tel"] = "※電話番号は必須項目です";
}elseif(!preg_match("/^[0-9]{9,11}$/", $request["posts"]["tel"])){
    $request["errors"]["tel"] = "-(ハイフン)抜き半角数字で入力してください";
}

// メールアドレスバリデーション
if($request["posts"]["email"] === $request["posts"]["c_email"]){
    if(empty($request["posts"]["email"] && $request["posts"]["c_email"])){
        $request["errors"]["email"] = "※メールアドレスは必須項目です";
    }
    
    if(!preg_match("/^[a-z][a-zA-Z0-9_¥.¥-]*@[a-zA-Z0-9_¥.¥-]+$/",$request["posts"]["email"])){
        $request["errors"]["email"] = "※メールアドレス形式で入力してください";
    }

    if(!preg_match("/^[a-z][a-zA-Z0-9_¥.¥-]*@[a-zA-Z0-9_¥.¥-]+$/",$request["posts"]["c_email"])){
        $request["errors"]["c_email"] = "※メールアドレス形式で入力してください";
    }
}else{
    $request["errors"]["c_email"] = "※メールアドレスが一致しません";
}

if(empty($request["posts"]["content"])){
    $request["errors"]["content"] = "※内容は必須項目です";
}

if(!empty(array_filter($request["errors"]) || $_POST["button"] === "return")){
    $request["flag"] = "input";
}else{
    $request["flag"] = "confirm";
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
    <div class="title">
    <h1>確認フォーム</h1>
    </div>
    <?php if ($request["flag"] === "input"): ?>
        <form action="" method="POST">
                <div class="content">
                    名前（姓）&nbsp;&nbsp;<input type="text" name="last-name" value="<?= isset($request["posts"]["last-name"]) ? htmlspecialchars($request["posts"]["last-name"]) : ""?>" class="">
                    <?php if(!empty($request["errors"]["last-name"])) : ?>
                    <p style="color: red;"><?php echo htmlspecialchars($request["errors"]["last-name"])?></p>
                    <?php endif; ?>
                </div>
                <div class="content">
                    名前（名）&nbsp;&nbsp;<input type="text" name="first-name" value="<?= isset($request["posts"]["first-name"]) ? htmlspecialchars($request["posts"]["first-name"]) : ""?>">
                    <?php if(!empty($request["errors"]["first-name"])) : ?>
                    <p style="color: red;"><?php echo htmlspecialchars($request["errors"]["first-name"])?></p>
                    <?php endif; ?>
                </div>
                <div class="content">
                    フリガナ（セイ）&nbsp;&nbsp;<input type="text" name="last-kananame" value="<?= isset($request["posts"]["last-kananame"]) ? htmlspecialchars($request["posts"]["last-kananame"]) : "" ?>">
                    <?php if(!empty($request["errors"]["last-kananame"])) :?>
                    <p style="color: red;"><?php echo htmlspecialchars($request["errors"]["last-kananame"])?></p>
                    <?php endif; ?>
                </div>
                <div class="content">
                    フリガナ（メイ）&nbsp;&nbsp;<input type="text" name="first-kananame" value="<?= isset($request["posts"]["first-kananame"]) ? htmlspecialchars($request["posts"]["first-kananame"]) : ""?>">
                    <?php if(!empty($request["errors"]["first-kananame"])) :?>
                    <p style="color: red;"><?php echo htmlspecialchars($request["errors"]["first-kananame"]) ?></p>
                    <?php endif; ?>
                    </div>
                <div class="content">
                    郵便番号&nbsp;&nbsp;<input type="text" name="zip" value="<?= isset($request["posts"]["zip"]) ? htmlspecialchars($request["posts"]["zip"]) : ""?>">
                    <?php if(!empty($request["errors"]["zip"])) :?>
                    <p style="color: red;"><?php echo htmlspecialchars($request["errors"]["zip"])?></p>
                    <?php endif;?>
                </div>
                <div class="content">
                    都道府県&nbsp;&nbsp;<input type="text" name="pref" value="<?php echo isset($request["posts"]["pref"]) ? htmlspecialchars($request["posts"]["pref"]) : ""?>">
                    <?php if(!empty($request["errors"]["pref"])) :?>
                    <p style="color: red;"><?php echo htmlspecialchars($request["errors"]["pref"])?></p>
                    <?php endif; ?>
                </div>
                <div class="content">
                    市区町村&nbsp;&nbsp;<input type="text" name="city" value="<?= isset($request["posts"]["city"]) ? htmlspecialchars($request["posts"]["city"]) : "" ?>">
                    <?php if(!empty($request["errors"]["city"])) :?>
                    <p style="color: red;"><?php echo htmlspecialchars($request["errors"]["city"])?></p>
                    <?php endif; ?>
                </div>
                <div class="content">
                    番地&nbsp;&nbsp;<input type="text" name="num" value="<?= isset($request["posts"]["num"]) ? htmlspecialchars($request["posts"]["num"]) : ""?>">
                    <?php if(!empty($request["errors"]["num"])) :?>
                    <p style="color: red;"><?php echo htmlspecialchars($request["errors"]["num"])?></p>
                    <?php endif; ?>
                </div>
                <div class="content">
                    建物名&nbsp;&nbsp;<input type="text" name="bld" value="<?= isset($request["posts"]["bld"]) ? htmlspecialchars($request["posts"]["bld"]) : ""?>">
                </div>
                <div class="content">
                    電話番号&nbsp;&nbsp;<input type="text" name="tel" value="<?= isset($request["posts"]["tel"]) ? htmlspecialchars($request["posts"]["tel"]) : ""?>">
                    <?php if(!empty($request["errors"]["tel"])) :?>
                    <p style="color: red;"><?php echo htmlspecialchars($request["errors"]["tel"])?></p>
                    <?php endif; ?>
                </div>
                <div class="content">
                    メールアドレス&nbsp;&nbsp;<input type="text" name="email" value="<?= isset($request["posts"]["email"]) ? htmlspecialchars($request["posts"]["email"]) : ""?>">
                    <?php if(!empty($request["errors"]["email"])) :?>
                    <p style="color: red;"><?php echo htmlspecialchars($request["errors"]["email"])?></p>
                    <?php endif; ?>
                </div>
                <div class="content">
                    確認用メールアドレス&nbsp;&nbsp;<input type="text" name="c_email" value="<?= isset($request["posts"]["c_email"]) ? htmlspecialchars($request["posts"]["c_email"]) : ""?>">
                    <?php if(!empty($request["errors"]["c_email"])) :?>
                    <p style="color: red;"><?php echo htmlspecialchars($request["errors"]["c_email"])?></p>
                    <?php endif; ?>
                </div>
                <div class="content">
                    お問い合わせ内容&nbsp;&nbsp;<textarea name="content" cols="50" rows="10"><?= isset($request["posts"]["content"]) ? htmlspecialchars($request["posts"]["content"]) : ""?></textarea>
                    <?php if(!empty($request["errors"]["content"])) :?>
                    <p style="color: red;"><?php echo htmlspecialchars($request["errors"]["content"])?></p>
                    <?php endif; ?>
                </div>
                <div class="content-button">
                    <button type="submit" name="button" value="input" class="submit">確認</button>
                </div>
        </form>

        <?php elseif($request["flag"] === "confirm") :?>
        <form action="" method="POST">
            <?php foreach($request["posts"] as $key => $val) :?>
                <input type="hidden" name="<?= $key ?>" value="<?= $val?>">
                <?php endforeach ?>
                <div class="content">
                    姓：
                    <p><?php echo htmlspecialchars($request["posts"]["last-name"]) ?></p>
                </div>
                <div class="content">
                    名：
                    <p><?php echo htmlspecialchars($request["posts"]["first-name"]) ?></p>
                </div>
                <div class="content">
                    セイ：
                    <p><?php echo htmlspecialchars($request["posts"]["last-kananame"]) ?></p>
                </div>
                <div class="content">
                    メイ：
                    <p><?php echo htmlspecialchars($request["posts"]["first-kananame"]) ?></p>
                </div>
                <div class="content">
                    郵便番号：
                    <p><?php echo htmlspecialchars($request["posts"]["zip"]) ?></p>
                </div>
                <div class="content">
                    都道府県：
                    <p><?php echo htmlspecialchars($request["posts"]["pref"]) ?></p>
                </div>
                <div class="content">
                    市区町村：
                    <p><?php echo htmlspecialchars($request["posts"]["city"]) ?></p>
                </div>
                <div class="content">
                    番地：
                    <p><?php echo htmlspecialchars($request["posts"]["num"]) ?></p>
                </div>
                <div class="content">
                    建物：
                    <p><?php echo htmlspecialchars($request["posts"]["bld"]) ?></p>
                </div>
                <div class="content">
                    電話番号：
                    <p><?php echo htmlspecialchars($request["posts"]["tel"]) ?></p>
                </div>
                <div class="content">
                メールアドレス：<p><?php echo htmlspecialchars($request["posts"]["email"]) ?></p>
                </div>
                <div class="content">
                    確認用メールアドレス：
                    <p><?php echo htmlspecialchars($request["posts"]["c_email"]) ?></p>
                </div>
                <div class="content">
                    内容：
                    <p><?php echo htmlspecialchars($request["posts"]["content"]) ?></p>
                </div>
        <div class="content-button">
            <button type="submit" name="button" formaction= "" value="return" class="submit">キャンセル</button>
            <button type="submit" name ="button" formaction= "thanks.php" value="submit" class="submit">送信</button>
        </div>
        </form>
        <?php endif; ?>
</body>
</html>