<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TopPage</title>
    <?php
        $mail = $_POST['mail'];
        $address = $_POST['address'];
        $postNum = $_POST['postNum'];
        $method =$_POST['buyMethod'];
    ?>
    <script>
        let answer = window.confirm('<?php echo $mail?>\n<?php echo $address?>\n<?php echo $postNum?>\n<?php echo $method?>\nこの内容でよろしいですか？');
        if(answer){
            alert("購入が完了しました。\nトップページに移動します。");
            window.location="top.php";
        }else{
            alert("購入をキャンセルしました。\nカート画面に移動します。");
            window.location="cart.php";
        }
    </script>
</head>
<body>



    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <script src="./script/script.js"></script>
    <link rel="stylesheet" href="css/style.css?v=2">
</body>
</html>