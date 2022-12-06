<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="./css/style.css">
    <title>BuyScreen</title>
    <style>
        body{
            background-color: #e9e9e9;
        }
        .logincard{
            border: 3px solid #000000;
            border-radius: 15px;
        }
        .whitewall{
            border:none;
            background-color:white;
        }
        .box{
            border:1px solid #000000;
        }
    </style>
    <?php
    require_once "DBManager.php";
    $db=new DBManager;
    session_start();
    if(isset($_SESSION['usermail'])==false
        ||isset($_SESSION['username'])==false){
        header('Location:login.php');
    }
    ?>
</head>
<body>
    <div class="container row offset-1 col-10 mt-3 whitewall" >
        <h1 class="mt-3 mb-5">購入</h1>
        <h5>ご購入の商品</h5>
        <div class="row" style="text-align:right">
            <div class="box col-2" style="text-align:center">番号</div>
            <div class="box col-6" style="text-align:center">商品名</div>
            <div class="box col-2" style="text-align:center">個数</div>
            <div class="box col-2" style="text-align:center">小計</div>
            <?php
                $cart = $db->getCartsAll($_SESSION['usermail']);
                $i=0;
                $sum=0;
                foreach ($cart as $key) {
                    $shohin[$i] = $db->getShohinCart($key['shohin_id']);
                    echo "
                    <div class='box col-2'>".($i+1)."</div>
                    <div class='box col-6' style='display: inline-block;  _display: inline;'>".$shohin[$i]['shohin_mei']."</div>
                    <div class='box col-2' style='_display: inline;'>".$cart[$i]['shohin_count']."</div>
                    <div class='box col-2' style='_display: inline;'>".($shohin[$i]['shohin_kakaku']*$cart[$i]['shohin_count'])."</div>";
                    $sum=$sum+$shohin[$i]['shohin_kakaku']*$cart[$i]['shohin_count'];
                    $i++;
                }
            ?>
            <div class="box offset-8 col-2" style="text-align:center">合計</div>
            <div class="box col-2" style="text-align:right"><?php echo $sum ?></div>
        </div>
        <div class="row mt-5">
            <form action="BuyCheck.php" method="post">
            <h5>配達用情報記入欄</h5>
            <div class="col-12 mt-3">
              <label for="email" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">電子メール</font></font><span class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">(オプション)</font></font></span></label>
              <input type="email" class="form-control" name="mail" id="email" placeholder="example@gmail.com" required>
              <div class="invalid-feedback">
                aa
              </div>
            </div>

            <div class="col-12 mt-3">
              <label for="address" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">住所・アドレス</font></font></label>
              <input type="text" class="form-control" name="address" id="address" placeholder="例)福岡県福岡市東区0-0-0 000号室" required>
            </div>

            <div class="col-md-12 mt-3">
              <label for="zip" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">郵便番号</font></font></label>
              <input type="text" class="form-control" name="postNum" id="zip" placeholder="" required>
            </div>
            
            <div class=" mt-3">
                <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">支払方法</font></font>
                <br>
                <label for="1">
                    <input type="radio" id=1 name="buyMethod" value="カード支払い">カード支払い
                </label>
                <br>
                <label for="2">
                    <input type="radio" id=2 name="buyMethod" value="銀行引き落とし">銀行引き落とし   
                </label>
                <br>
                <label for="3">
                    <input type="radio" id=3 name="buyMethod" value="代引き">代引き
                </label>
            </div>
        </label>
            <div class="text-center">
                <input type="submit" value="購入する">
                
            </div>
            </form>
     </div>
     <script>

     </script>
</body>
</html>