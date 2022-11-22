<?php
    require_once "DBManager.php";
    require_once 'functions.php';
    $db = new DBManager;
    $startFlag = false;
    $tweetId=$db->INSERTTweet($_POST['mem_mail'],$_POST['shohin_id'],$_POST['tweets_contents']);
    if(!empty($_FILES['tweets_img'])){
        $db->INSERTTweetImg($tweetId,$_FILES['tweets_img']['tmp_name'],$_FILES['tweets_img']['name'],$_FILES['tweets_img']['type'],$_FILES['tweets_img']['size']);
    }
    $tweet = $db->getTweet($tweetId)->fetchAll();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TopPage</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <script src="./script/script.js"></script>
    <link rel="stylesheet" href="css/style.css?v=2">
</head>
<body>
    <button onclick="location.href='./top.php'">トップページ</button>
    <button onclick="location.href='./newMember.php'">会員登録</button>
    <button onclick="location.href='./login.php'">ログイン</button>
    <button onclick="location.href='./insertShohin.php'">本の登録</button>
    <button onclick="location.href='./insertTweet.php'">つぶやき投稿</button>
    <br>
    <?php 
        
        echo 
        "<div class=tweetcard1>
        <div>
            <img src=img/proto_icon.png style=height:50px; width:50px; text-align:center><nobr>
            <p style=display:inline-block>".$tweet[0]['mem_mail']."</p>
        </div>
        <p class=text mt-2>".$tweet[0]['tweets_contents']."</p><ul>";?>
        <?php for($i = 0; $i < $db->getTweetImgCount($tweetId); $i++):?>
            <li class="media d-block mx-auto">
                <?php $image[$i] = $db->getTweetImg($tweetId,$i);?>
                <div>
                    <img src="data:images/png;base64,<?=base64_encode($image[$i]['tweets_img'])?>" class="img-fluid p-2">
                </div>
            </li>
        <?php endfor ?>

        <?php echo
            "</ul><div>
                <div class=good style=display:inline-block;>
                    <i class=bi bi-hand-thumbs-up></i>
                    <p style=display:inline-block;>1000</p>
                </div>
                <div class=bad style=display:inline-block;>
                    <i class=bi bi-hand-thumbs-down style=display:inline-block;></i>
                    <p style=display:inline-block;>0</p>
                </div>
                <div class=detail style=display:inline-block; text-align:right>
                    <p ><a href=BookDetail.html style=text-align: right;>詳細へ</a></p>
                </div>
            </div>
        </div>";
        ?>
</body>
</html>