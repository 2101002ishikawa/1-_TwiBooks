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
    <?php
        session_start();
        if(isset($_SESSION['usermail'])==false
            ||isset($_SESSION['username'])==false){
                header('Location:login.php');
        }
        echo "<div style='text-align:center; margin-top:10%;'><h1>ようこそ　$_SESSION[username]さん<h1><br>";
        
        echo "<a href=\"top.php\">利用を始める</a>
                <br/>
                <a href=\"logout.php\">ログアウト</a></div>";
    ?>
    <link rel="stylesheet" href="css/style.css?v=2">
</body>
</html>