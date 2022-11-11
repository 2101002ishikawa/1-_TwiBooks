<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>BookDetail</title>
    <?php
        require_once "DBManager";
        $db=new DBManager;
        $shohin = $db->getShohins($id);
        $image = $db->getShohinImg($id);
        echo "<img src=$image>";
        $bookprice=
        $bookimg=
        $bookname=
        
        echo

    ?>
</head>
<body>
    <div class="text-center">
        <p>名前テスト</p>
        <h3>本の名前テスト</h3>
        <br>
        <?php echo "<p>てすとぽっちゃま</p>"?>
        <img src="book/自己啓発系統/筋.png" class="img-fluid iconImg"><br>
        <form action="BookDetail.php" method="post">
        <input type="number" name="kosuu"><nobr><h4>値段テスト</h4></nobr>
        <input type="submit" name="cart"value="カートに入れる" >
        <br>
        <input type="submit" name="buynow" value="今すぐ購入">
    </form>
     </div>

 
</body>
</html>