<?php
    require_once "DBManage.php";
    $db=new DBManager;
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
    <title></title>
    <style>
        body{
            background-color: #e9e9e9;
        }
        .logincard{
            border: 3px solid #000000;
            border-radius: 15px;
        }
    </style>
    <script>
        var getURLParams = function(path) {
            if (!path) return false;

            var param = path.match(/\?([^?]*)$/);

            if (!param || param[1] === '') return false;

            var tmpParams = param[1].split('&'),
                keyValue  = [],
                params    = {};

            for (var i = 0, len = tmpParams.length; i < len; i++) {
                keyValue = tmpParams[i].split('=');
                params[keyValue[0]] = keyValue[1];
            }

            return params;
        };
        var result = getURLParams( urlString );//urlのクエリを連想配列にする
        <?php
            
        ?>
    </script>
    <?php
        $bookimage = $db->getShohinImg($id);
        echo "<img src=$image>";
        $book= $db->getShohin($id);
    ?>
</head>
<body>
    <button onclick="location.href='./top.php'">トップページ</button>
    <button onclick="location.href='./newMember.php'">会員登録</button>
    <button onclick="location.href='./login.php'">ログイン</button>
    <button onclick="location.href='./insertBook.php'">本の登録</button>
    <button onclick="location.href='./insertTweet.php'">つぶやき投稿</button>
    <br>
    <div class="text-center">
        

    </div>
</body>
</html>