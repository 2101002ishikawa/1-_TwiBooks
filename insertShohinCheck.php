<?php
    session_start();
    require_once "DBManager.php";
    require_once 'functions.php';
    $db = new DBManager;
    try {
        $shohinId=$db->INSERTShohin($_POST['shohin_mei'],$_POST['bunrui'],$_POST['hanbai_bi'],$_POST['shohin_kakaku'],$_POST['shohin_writer'],$_POST['shohin_conpany'],$_POST['isbn'],$_POST['tosyo']);
        if(empty($shohinId)){
            throw new Exception("Error Processing Request");
        }
        if(!empty($_FILES['shohin_img'])){
            $db->INSERTShohinImg($shohinId,$_FILES['shohin_img']['tmp_name'],$_FILES['shohin_img']['name'],$_FILES['shohin_img']['type'],$_FILES['shohin_img']['size']);
        }
        $shohintagArray;
        $shohinDataArray;
        $shohin = $db->getShohinCart($shohinId);
        $shohintagArray = array("書籍名","著者","出版社","価格","ISBNコード","書籍コード","ジャンル","販売日");
        $shohinDataArray= array($shohin['shohin_mei'],$shohin['shohin_writer'],$shohin['shohin_conpany'],$shohin['shohin_kakaku'],$shohin['shohin_ISBN'],$shohin['shohin_bookcode'],$shohin['shohin_bunrui'],$shohin['hanbai_bi']);
    } catch (Throwable $th) {
        echo "<script type='text/javascript'>alert('商品IDが設定されていない数値に設定されています。\nもう一度お確かめください。');</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>商品登録の確認</title>
    <style>
        table{
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
        }

        table th,table td{
            padding: 10px 0;
            text-align: center;
        }
        .type{
            background-color: #f2f2f2;
            border:solid 1px #927141;
        }
        .data{
            background-color: #ffffff;
            border:solid 1px #927141;
        }

        table td{
            border-bottom: solid 2px #ddd;
            text-align: center;
            padding: 10px 0;
        }
        table tr{
            margin-bottom:10px;
        }
    </style>
</head>
<body>
    <button onclick="location.href='./top.php'">トップページ</button>
    <button onclick="location.href='./newMember.php'">会員登録</button>
    <button onclick="location.href='./login.php'">ログイン</button>
    <button onclick="location.href='./insertShohin.php'">本の登録</button>
    <button onclick="location.href='./insertTweet.php'">つぶやき投稿</button>
    <br>
    <div class="row">
        <div class="border-right text-center">
            <div>
                <?php
                    if($db->getShohinImgCount($shohinId)!=0){
                        echo "<h1>登録が完了しました</h1>";
                    }
                ?>
            </div>
            <div class="offset-md-3 col-md-6 offset-1 col-10" ><table class="row">
            <?php
                for($i=0; $i<count($shohintagArray);$i++){
                    if(empty($shohinDataArray)==true){
                        $shohinDataArray[$i] = "-";
                    }
                    echo "<tr class='mb-1'><th class='type col-md-3 col-4'>$shohintagArray[$i]</th><th class='data col-md-9 col-8'>$shohinDataArray[$i]</th></tr>";
                }
                echo "<tr class=mb-1><th class=type>商品画像</th><th class=data>";
            ?>
            <ul class="list-unstyled">
            <?php for($i = 1; $i < $db->getShohinImgCount($shohinId)+1; $i++): ?>
                <li class="media d-block mx-auto">
                    <?php
                            $image[$i] = $db->getShohinImg($shohinId,$i);
                    ?>
                    <div>
                        <img src="data:images/png;base64,<?=base64_encode($image[$i]['shohin_img'])?>" class="img-fluid p-2">
                    </div>
                </li>
                    
            <?php endfor; ?>
            </ul>
            <?php
                echo "</th></tr>
                </table></div>";
            ?>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
</body>
</html>