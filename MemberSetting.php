<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>MemberSetting</title>
    <style>
        body{
            background-color: whitesmoke;
        }
        .iconImg{
            border-radius:50%;
            margin-bottom:40px;
            margin-left:10%;
            margin-right:10%;
        }
        label{
            margin-bottom:20px;
            display:inline-block;
            text-align:right;
            width:112px;
            margin-left:5%;
            margin-right:5%;
        }
        .btn{
            position: fixed;
            bottom: 0;
            text-align:center;
        }
    </style>

    <?php

    ?>
</head>
<body>
    <button onclick="location.href='./top.php'">トップページ</button>
    <button onclick="location.href='./newMember.php'">会員登録</button>
    <button onclick="location.href='./login.php'">ログイン</button>
    <button onclick="location.href='./insertShohin.php'">本の登録</button>
    <button onclick="location.href='./insertTweet.php'">つぶやき投稿</button>
    <br>
<div class="text-center">
    <img src="img/proto_icon.png" class="iconImg"  style="width:45%">
        <label>ニックネーム：</label>
        <input type="text" name="PName" class="Settingtext"><br>
        <?php if(!empty($error['PName'])&&$error['PName']===blank):?>
            <p class="error">ニックネームを入力してください</p>
        <?php endif ?>

        <label>所在地：</label>
        <input type="text" name="PAddress" class="Settingtext"><br>

        <label>コメント:</label>    
        <input type="text" name="PComment" class="Settingtext"><br>

        <label>苗字：</label>
        <input type="text" name="FirstName" class="Settingtext"><br>

        <label>名前：</label>
        <input type="text" name="LastName" class="Settingtext "><br>


        <div class="col-3">
            <button class="btn" style="width:36%" onclick="location.href='./MemberSetting.html'">戻る</button>
        </div>
        <div class="offset-5 col-3">
            <button class="btn" style="width:36%" onclick="location.href='./MemberPass.html'">完了</button>
        </div>
</div>
<link rel="stylesheet" href="css/style.css?v=2">
</body>
</html>