<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
        body{
            background-color: whitesmoke;
        }
        label{
            margin-bottom:20px;
            display:inline-block;
            text-align:right;
            width:130px;
            margin-left:4%;
            margin-right:4%;
        }
        .btn{
            position: fixed;
            bottom: 0;
            text-align:center;
        }
    </style>
</head>
<body>
    <button onclick="location.href='./top.php'">トップページ</button>
    <button onclick="location.href='./newMember.php'">会員登録</button>
    <button onclick="location.href='./login.php'">ログイン</button>
    <button onclick="location.href='./insertShohin.php'">本の登録</button>
    <button onclick="location.href='./insertTweet.php'">つぶやき投稿</button>
    <div class="text-center">
        <label style="margin-top:150px;">
            現在のパスワード
        </label>
        <input type="text" name="OldPass" class="Settingtext"><br>
        <?php if(!empty($error['OldPass'])&&$error['OldPass']===blank):?>
            <p class="error">現在のパスワードを入力してください</p>
        <?php endif ?>
        
        <labael>
            新しいパスワード
        </labael>
        <input type="text" name="1NewPass" class="Settingtext"><br><br>
        <?php if(!empty($error['1NewPass'])&&$error['1NewPass']===blank):?>
            <p class="error">新しいパスワードを入力してください</p>
        <?php endif ?>

        <label>
            パスワード再入力
        </label>
        <input type="text" name="2NewPass" class="Settingtext"><br>
        <?php if(!empty($error['2NewPass'])&&$error['2NewPass']===blank):?>
            <p class="error">新しいパスワードを入力してください</p>
        <?php endif ?>

        <div class=" col-3">
            <button class="btn" style="width:36%" onclick="location.href='./MemberSetting.html'">戻る</button>
        </div>
        <div class="offset-5 col-3">
            <button class="btn" style="width:36%" onclick="location.href='./MemberPass.html'">完了</button>
        </div>
    </div>

    <link rel="stylesheet" href="css/style.css?v=2">
</body>
</html>