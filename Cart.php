<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css?v=2">
    <title>Cart</title>
    <style>
        body{
            background-color: #E6FFE9;
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
        $cart = $db->getCartsAll($_SESSION['usermail']);
        $cartCount = $db->getCartsAllCount($_SESSION['usermail']);
    ?>
</head>
<body>
    <div class="row">
        <div class="offset-2 col-8 whitewall mt-3">
            <h3>カート</h3>
            <form action="BuyScreen.php" method="post">
                <?php
                    for($i = 0; $i<$cartCount; $i++):
                        $shohin[$i] = $db->getShohinCart($cart[$i]['shohin_id']);
                        $bookimage[$i] = $db->getShohinImg($shohin[$i]['shohin_id'],1);?>
                        <div class="row offset-1 col-10">
                                <?php if(!empty($bookimage[$i])){?>
                                    <img class="box col-3" src=data:images/png;base64,<?=base64_encode($bookimage[$i]['shohin_img'])?> class='img-fluid p-2'  style="display: inline-block;">    
                                <?php }else{?>
                                    <img class="box col-3" src="./img./alt.png" class='img-fluid p-2'  style="display: inline-block;">
                                <?php }?>
                                <div class="box col-5" style="display: inline-block;  _display: inline;"><?php echo $shohin[$i]['shohin_mei']?></div>
                                <div class="box col-2" style="_display: inline;"><?php echo $cart[$i]['shohin_count']?></div>
                                <div class="box col-2" style="display: inline-block; _display: inline;"><?php echo ($shohin[$i]['shohin_kakaku']*$cart[$i]['shohin_count']);?></div>
                                
                        </div>
                <?php endfor;?>
                <div class="text-center"><input class="btn text-center" type="submit" value="購入に進む"></div>
            </form>
                
                

        </div>
    </div>

</body>
</html>