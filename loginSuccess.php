<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン成功</title>
    <style>
        body{
            background-color: #e9e9e9;
        }
    </style>
</head>
<body>
    <button onclick="location.href='./top.php'">トップページ</button>
    <button onclick="location.href='./newMember.php'">会員登録</button>
    <button onclick="location.href='./login.php'">ログイン</button>
    <button onclick="location.href='./insertBook.php'">本の登録</button>
    <button onclick="location.href='./insertTweet.php'">つぶやき投稿</button>
    <br>
    <?php
        session_start();
        if(isset($_SESSION['usermail'])==false
            ||isset($_SESSION['username'])==false){
                header('Location:login.php');
        }
        echo "ようこそ　$_SESSION[username]さん<br>";
        echo "<a href=\"logout.php\">ログアウト</a>";
    ?>
    <link rel="stylesheet" href="css/style.css?v=2">
</body>
</html>