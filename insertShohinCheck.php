<?php
    session_start();
    require_once "DBManager.php";
    $db = new DBManager;
    try {
        $id=$db->INSERTShohin($_POST['shohin_mei'],$_POST['bunrui'],$_POST['hanbai_bi'],$_POST['shohin_kakaku'],$_POST['shohin_writer'],$_POST['shohin_conpany'],$_POST['isbn'],$_POST['tosyo']);

        if(!empty($_FILES['shohin_img'])){
            $db->INSERTShohinImg($id,$_FILES['shohin_img']['tmp_name'],$_FILES['shohin_img']['name'],$_FILES['shohin_img']['type'],$_FILES['shohin_img']['size']);
        }
        $shohin = $db->getShohin($id);
        foreach ($shohin as $shohinData) {
            echo "<p>書籍名：$shohinData[shohin_mei]<br>著者：$shohinData[shohin_writer]<br>出版社：$shohinData[shohin_conpany]<br>価格：$shohinData[shohin_kakaku]<br>ISBNコード：$shohinData[shohin_ISBN]<br>書籍コード：$shohinData[shohin_bookcode]<br>ジャンル：$shohinData[shohin_bunrui]<br>販売日：$shohinData[hanbai_bi]<br></p>";
        }
        $images = $db->getShohinImg($id);
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
    <title>Document</title>
</head>
<body>
    <div class="row">
        <div class="col-md-8 border-right">
            <ul class="list-unstyled">
                <?php for($i = 0; $i < count($images); $i++): ?>
                    <li class="media mt-5">
                        <a href="#lightbox" data-toggle="modal" data-slide-to="<?= $i; ?>">
                            <img src="image.php?id=<?= $images[$i]['image_id']; ?>" width="100" height="auto" class="mr-3">
                        </a>
                    </li>
                <?php endfor; ?>
            </ul>
        </div>
    </div>
    <div class="modal carousel slide" id="lightbox" tabindex="-1" role="dialog" data-ride="carousel" style="position:fixed;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-body">
            <ol class="carousel-indicators">
                <?php for ($i = 0; $i < 3; $i++): ?>
                    <li data-target="#lightbox" data-slide-to="<?= $i; ?>" <?php if ($i == 0) echo 'class="active"'; ?>></li>
                <?php endfor; ?>
            </ol>

            <div class="carousel-inner">
                <?php for ($i = 0; $i < 3; $i++): ?>
                    <div class="carousel-item <?php if ($i == 0) echo 'active'; ?>">
                    <img src="cat.jpg" class="d-block w-100">
                    </div>
                <?php endfor; ?>
            </div>

            <a class="carousel-control-prev" href="#lightbox" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#lightbox" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        </div>
    </div>
    </div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
</body>
</html>