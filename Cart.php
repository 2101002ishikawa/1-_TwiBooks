<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Cart</title>
    <style>
        body{
            background-color: #e9e9e9;
        }
        .logincard{
            border: 3px solid #000000;
            border-radius: 15px;
        }
        .card{
            border: 3px solid #000000;
            border-radius: 15px;
        }
    </style>
    <?php
    require_once "DBManager";
    $db=new DBManager;
    $book=$db->getShohin($id);
    $bookkakaku=$book["shohin_kakaku"];
    $bookname=$book["shoin_mei"];
    ?>
</head>
<body>
    <div class="card ext-center">
        <h2>カート</h2>
        <div class="card offset-3 col-6">
            <p><?php=$bookname?></p> <!-- 本の名前 -->
            <p><?php=$bookkakaku?>円</p>    <!-- 単価 -->
            <input type="number" name="kosuu" value="">
            <br>
        </div>
        <p>小計 値段テスト</p>
        <input type="submit" value="購入手続きへ" class="mb-3 btn">
    </div>

    <link rel="stylesheet" href="css/style.css?v=2">
</body>
</html>