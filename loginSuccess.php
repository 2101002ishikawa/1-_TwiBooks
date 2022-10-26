<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン成功</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <button onclick="location.href='./INSERT.php'">登録</button>
    <button onclick="location.href='./login.php'">ログイン</button><br>
    <?php
        session_start();
        if(isset($_SESSION['usermail'])==false
            ||isset($_SESSION['username'])==false){
                header('Location:login.php');
        }
        echo "ようこそ　$_SESSION[username]さん<br>";
        echo "<a href=\"logout.php\">ログアウト</a>";
    ?>
    
</body>
</html>