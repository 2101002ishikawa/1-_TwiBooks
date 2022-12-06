<?php
    session_start();
    require_once "DBManager.php";
    $db = new DBManager;
    
    $bool = $db->InsertCart($_SESSION['usermail'],$_POST['shohinId'],$_POST['quantity']);   
    if($bool){
        $book= $db->getShohin($_POST['shohinId']);
        echo "<script>alert(商品名：.$book[0][shohin_mei].\n個数：.$_POST[quantity].\nこの内容でカートに商品を入れました。\nカート画面へ移行します。)</script>";
        header("Location:cart.php");
    }else{
        echo "<script>alert(処理に失敗しました。もう一度お試しください)</script>";
        header("Location:BookDetail.php?id=$_POST[shohinId]");
    }
?>