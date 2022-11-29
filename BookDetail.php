<?php
    session_start();
    require_once "DBManager.php";
    $db=new DBManager;

    if(isset($_POST['cart'])){
        $db->InsertCart($_SESSION['userId'],$id,);
    }else if(isset($_POST['asSoon'])){
        
    }
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
    </script>
    <?php
        $id;
        if(isset($_GET['Sid'])){
            $id = $_GET['Sid']; 
        }
        $book= $db->getShohin($id);
        $imgcount = $db->getShohinImgCount($id);
    ?>
</head>
<body>
    <button onclick="location.href='./top.php'">トップページ</button>
    <button onclick="location.href='./newMember.php'">会員登録</button>
    <button onclick="location.href='./login.php'">ログイン</button>
    <button onclick="location.href='./insertBook.php'">本の登録</button>
    <button onclick="location.href='./insertTweet.php'">つぶやき投稿</button>
    <br>
    <div class="container">
        <div class="row bg-light">
            <h1 class="offset-1 col-11"><?php echo $book[0]['shohin_mei'] ?></h1>
            <div class="p-5 col-md-6 col-12 text-center">
                <?php for($i = 1; $i < $imgcount+1; $i++):
                    $bookimage[$i] = $db->getShohinImg($id,$i);?>
                    <img src=data:images/png;base64,<?=base64_encode($bookimage[$i]['shohin_img'])?> class='img-fluid p-2'>
                <?php endfor;?>
            </div>
            <div class="pt-5 col-md-6 offset-1 col-11 text-left">
                <p>著：<?php echo $book[0]['shohin_writer'] ?></p>
                <p>出版社：<?php echo $book[0]['shohin_conpany'] ?></p>
                <p>価格：<?php echo number_format($book[0]['shohin_kakaku']) ?>円</p>
                <form id="form">
                    <select name="quantity">
                    <?php for($i=1;$i<=6;$i++): ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php endfor; ?>
                    </select><br/>
                    <input type="hidden" name="kazu">

                </form>
                <button class="offset-2 col-3" name="cart"  onclick="cartsubmit()">カートに入れる</button>
                <button class="offset-2 col-3" name="asSoon" onclick="buysubmit()">今すぐ購入する</button>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function cartsubmit(){
            const form = document.getElementById("form");
            const quantity =document.form..options[num].value;
            form.kazu=quantity;
            form.submit();
        }
        function buysubmit(){

        }
    </script>
</body>
</html>