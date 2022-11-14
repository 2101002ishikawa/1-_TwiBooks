<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>BuyScreen</title>
    <?php
    require_once "DBManager";
    $db=new DBManager;
    $bookkakaku=$db->getShohin($id);
    $book=
    $userplace=$db->getMember($id)
    $commission=114;

    
    ?>
</head>
<body>
    <div class="text-center">
        <p>単価</p>　<p>値段</p>
        <h3>お届け先住所</h3>
        <br>
        <form action="Cart.php" method="post"></form>
        <input type="text" name="住所">
        <br>
        <p>送料 円</p>
        <p>お支払い方法</p>
        <input type="radio" name="paymentmethod" value="visa">visa
        <br>
        <input type="radio" name="paymentmethod" value="コンビニ">コンビニ
        <br>
        <p>手数料 円</p>
        <br>
        <p>合計 円</p>
        <input type="submit" value="購入">
    </form>
     </div>

 
</body>
</html>