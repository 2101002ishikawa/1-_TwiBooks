<?php
    session_start();
    require_once "DBManager.php";
    require_once 'functions.php';
    $db = new DBManager;
    try {
        $id=$db->INSERTShohin($_POST['shohin_mei'],$_POST['bunrui'],$_POST['hanbai_bi'],$_POST['shohin_kakaku'],$_POST['shohin_writer'],$_POST['shohin_conpany'],$_POST['isbn'],$_POST['tosyo']);

        if(!empty($_FILES['shohin_img'])){
            $db->INSERTShohinImg($id,$_FILES['shohin_img']['tmp_name'],$_FILES['shohin_img']['name'],$_FILES['shohin_img']['type'],$_FILES['shohin_img']['size']);
        }
        $shohin = $db->getShohin($id);
        foreach ($shohin as $shohinData) {
         
        }

    } catch (Exception $e) {
        echo $e.getMessage();
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
</head>
<body>
    <div class="row">
        <div class="col-md-8 border-right">
            <ul class="list-unstyled">
                <?php for($i = 0; $i < $db->getShohinImgCount($id); $i++): ?>
                    <li class="media mt-5">
                    <?php
                        

                        $pdo = connectDB();

                        $sql = 'SELECT * FROM shohindetails WHERE shohin_id = :shohin_id AND shohindetail_id = :shohindetail_id LIMIT 1';
                        $stmt = $pdo->prepare($sql);
                        $stmt->bindValue(':shohin_id', $id, PDO::PARAM_INT);
                        $stmt->bindValue(':shohindetail_id', $i, PDO::PARAM_INT);
                        $stmt->execute();
                        $image = $stmt->fetch();
                        header('Content-type: ' . $image['image_type']);
                        echo $image['shohin_img'];
                        echo "<p>書籍名：$shohinData[shohin_mei]<br>著者：$shohinData[shohin_writer]<br>出版社：$shohinData[shohin_conpany]<br>価格：$shohinData[shohin_kakaku]<br>ISBNコード：$shohinData[shohin_ISBN]<br>書籍コード：$shohinData[shohin_bookcode]<br>ジャンル：$shohinData[shohin_bunrui]<br>販売日：$shohinData[hanbai_bi]<br></p>";
                    ?>      
                    </li>
                <?php endfor; ?>
            </ul>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
</body>
</html>