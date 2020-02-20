<?php
    // if文を関数化
    // $request = $_POST[$key];
    // $postの内容が空白かそうでないか確認
    // 空白だったらエラー表示、そうでなければその値を出す
    // 違う$postの値も一緒にバリデーション確認する
    $post = $_POST;
    function isValidation($post){
        if(empty($post["last-name"])){
            $errorMessage[] = "※姓は必須項目です";
        }else{
            $errorMessage[] = "";
        }
        if(empty($post["first-name"])){
            $errorMessage[] = "※名は必須項目です";
        }else{
            $errorMessage[] = "";
        }
        foreach($errorMessage as $val){
            $val; 
        }
        return $val;
    }

    
    
    // $lastName = $post["last-name"];
    function isKanaValidation($post){ //isValidationの中で$_POSTに対して処理をする
       if(!preg_match("/^[ァ-ヶー]+$/u",$post["last-kananame"])){
            $errorMessage = "セイはカナで入力してください";
       }else{
            $errorMessage = "";
       }
       if(!preg_match("/^[ァ-ヶー]+$/u",$post["first-kananame"])){
            $errorMessage = "メイはカナで入力してください";
       }else{
            $errorMessage = "";
       }
       
       return $errorMessage;
    }

    echo "<pre>";
    print_r(isKanaValidation($post));
    echo "</pre>";



// POST送信以外index.phpにリダイレクトする
// if($_SERVER["REQUEST_METHOD"] !== "POST" && $_POST["button"] !== "input"){
//     header("location: index.php");
//     exit;
// }

    // $post = $_POST;
    // print_r(isValidate($post));

    // function isValidate($post)
    // {
    //     if(!empty($post["last-name"])){
    //         $errorMessage['last-name'] = '必須項目です';
    //     }

    //     if(empty($post["first-name"])){
    //         $errorMessage['first-name']  '必須項目です'];
    //     }

    //     return $errorMessage;
    // }

    // $request["posts"]["first-name"] = $_POST["first-name"]; //POSTの値を多次元配列に入れる
    // $request["posts"]["last-name"] = $_POST['last-name'];
    // $request["posts"]["first-kananame"] = $_POST['first-kananame'];
    // $request["posts"]["last-kananame"] = $_POST['last-kananame'];
    // $request["posts"]["zip"] = $_POST['zip'];
    // $request["posts"]["pref"] = $_POST['pref'];
    // $request["posts"]["city"] = $_POST['city'];
    // $request["posts"]["bld"] = $_POST['bld'];
    // $request["posts"]["num"] = $_POST['num'];
    // $request["posts"]["tel"] = $_POST['tel'];
    // $request["posts"]["email"] = $_POST['email'];
    // $request["posts"]["c_email"] = $_POST['c_email'];
    // $request["posts"]["content"] = $_POST['content'];
   
    // $request["errors"]["first-name"] = "";
    // $request["errors"]["last-name"] = "";
    // $request["errors"]["first-kananame"] = "";
    // $request["errors"]["last-kananame"] = "";
    // $request["errors"]["zip"] = "";
    // $request["errors"]["pref"] = "";
    // $request["errors"]["city"] = "";
    // $request["errors"]["num"] = "";
    // $request["errors"]["tel"] = "";
    // $request["errors"]["email"] = "";
    // $request["errors"]["c_email"] = "";
    // $request["errors"]["content"] = "";

        // if(empty($request["posts"]["first-name"])){
        //     $errorMessage[] = $errors["first-name"];
        // }
        
        // if(empty($request["posts"]["last-kananame"])){
        //     $errorMessage[] = $errors["last-kananame"];
        // }elseif(!preg_match("/^[ァ-ヶー]+$/u", $request["posts"]["last-kananame"])){
        //     $errorMessage[] = $errors["last-kananame2"];
        // }
    

        // echo '<pre>';
        // print_r(isValidation(["last-name"]));
        // echo '</pre>';
       

        // $errorsを引数に受け取る
        
        // if(empty($request["posts"]["first-name"])){ //条件と処理を入力
        //     $request["errors"]["first-name"] = "※名は必須項目です";
        // }
        
        // if(empty($request["posts"]["last-name"])){
        //     $request["errors"]["last-name"] = "※姓は必須項目です";
        // }
        
        // if(empty($request["posts"]["last-kananame"])){
        //     $request["errors"]["last-kananame"] = "※フリガナ（セイ）は必須項目です";
        // }elseif(!preg_match("/^[ァ-ヶー]+$/u", $request["posts"]["last-kananame"])){
        //     $request["errors"]["last-kananame"] = "※カタカナで入力してください";
        // }
        
        // if(empty($request["posts"]["first-kananame"])){
        //     $request["errors"]["first-kananame"] = "※フリガナ（メイ）は必須項目です";
        // }elseif(!preg_match("/^[ァ-ヶー]+$/u", $request["posts"]["first-kananame"])){
        //     $request["errors"]["first-kananame"] = "※カタカナで入力してください";
        // }
        
        // if(empty($request["posts"]["zip"])){
        //     $request["errors"]["zip"] = "※郵便番号は必須項目です";
        // }elseif(!preg_match("/^[0-9]{7}$/", $request["posts"]["zip"])){
        //     $request["errors"]["zip"] = "※-(ハイフン)抜き半角数字で入力してください";
        // }
        
        // if(empty($request["posts"]["pref"])){
        //     $request["errors"]["pref"] = "※都道府県は必須項目です";
        // }
        
        // if(empty($request["posts"]["city"])){
        //     $request["errors"]["city"] = "※市町村は必須項目です";
        // }
        
        // if(empty($request["posts"]["num"])) {
        //     $request["errors"]["num"] = "※番地は必須項目です";
        // }
        
        // if(empty($request["posts"]["tel"])){
        //     $request["errors"]["tel"] = "※電話番号は必須項目です";
        // }elseif(!preg_match("/^[0-9]{9,11}$/", $request["posts"]["tel"])){
        //     $request["errors"]["tel"] = "-(ハイフン)抜き半角数字で入力してください";
        // }
        
        // // メールアドレスバリデーション
        // if($request["posts"]["email"] === $request["posts"]["c_email"]){
        //     if(empty($request["posts"]["email"] && $request["posts"]["c_email"])){
        //         $request["errors"]["email"] = "※メールアドレスは必須項目です";
        //     }
            
        //     if(!preg_match("/^[a-z][a-zA-Z0-9_¥.¥-]*@[a-zA-Z0-9_¥.¥-]+$/",$request["posts"]["email"])){
        //         $request["errors"]["email"] = "※メールアドレス形式で入力してください";
        //     }
        
        //     if(!preg_match("/^[a-z][a-zA-Z0-9_¥.¥-]*@[a-zA-Z0-9_¥.¥-]+$/",$request["posts"]["c_email"])){
        //         $request["errors"]["c_email"] = "※メールアドレス形式で入力してください";
        //     }
        // }else{
        //     $request["errors"]["c_email"] = "※メールアドレスが一致しません";
        // }
        
        // if(empty($request["posts"]["content"])){
        //     $request["errors"]["content"] = "※内容は必須項目です";
        // }

        // if(!empty(array_filter($request["errors"]) || $_POST["button"] === "return")){
        //     $request["flag"] = "input";
        // }else{
        //     $request["flag"] = "confirm";
        // }

    // function getPostData($error){ // 関数に$request多次元配列を引数に入れる
    //     $request = [];
    //         foreach($request as $key => $val){
    //             $error = $request[$key][$val];
    //         }
    //     return $error;
    // }
    // echo '<pre>';
    // print_r($request);
    // echo '</pre>';

    // // if文を関数化
    // $request = $_POST[$key]; // POSTのデータをrequestに代入
    // function isError($errors){ // $errorsを引数に受け取る
    //     if(empty($request)){ // POSTデータが空だったら
    //         $errors = $request[$key2][$val]; // エラーメッセージを関数に返す
    //     }
    //     return $errors;
    // }

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
        <form action="" method="POST">
                <div class="content">
                    <!-- <p><?php echo htmlspecialchars($display_name)?></p> -->
                    名前（姓）&nbsp;&nbsp;<input type="text" name="last-name" value="<?= isset($post["last-name"]) ? htmlspecialchars($post["last-name"]) : ""?>" class="">
                    <?php if(empty($post["last-name"])) : ?>
                    <p style="color: red;"><?php echo isValidation($post["last-name"])?></p>
                    <?php endif; ?>
                </div>
                <div class="content">
                    名前（名）&nbsp;&nbsp;<input type="text" name="first-name" value="<?= isset($post["first-name"]) ? htmlspecialchars($post["first-name"]) : ""?>">
                    <?php if(empty($post["first-name"])) : ?>
                    <p style="color: red;"><?php echo isValidation($post["first-name"])?></p>
                    <?php endif; ?>
                </div>
                <div class="content">
                    フリガナ（セイ）&nbsp;&nbsp;<input type="text" name="last-kananame" value="<?= isset($request["posts"]["last-kananame"]) ? htmlspecialchars($request["posts"]["last-kananame"]) : "" ?>">
                    <?php if(!empty($post["last-kananame"])) :?>
                    <p style="color: red;"><?php echo isKanaValidation($post["last-kananame"])?></p>
                    <?php endif; ?>
                </div>
                <div class="content">
                    フリガナ（メイ）&nbsp;&nbsp;<input type="text" name="first-kananame" value="<?= isset($request["posts"]["first-kananame"]) ? htmlspecialchars($request["posts"]["first-kananame"]) : ""?>">
                    <?php if(!empty($post["first-kananame"])) :?>
                    <p style="color: red;"><?php echo isKanaValidation($post["first-kananame"]) ?></p>
                    <?php endif; ?>
                </div>
                <div class="content-button">
                    <button type="submit" name="button" value="input" class="submit">確認</button>
                </div>
        </form>
</body>
</html>