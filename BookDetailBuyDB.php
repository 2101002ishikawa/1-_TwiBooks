<?php
require_once "DBManager.php";
$db = new DBManager;
header("Content-type: text/plain; charset=UTF-8");
$sender_shohin = $_POST['shohin'];
$sender_mail_address = $_POST['email'];
$sender_quantity = $_POST['quantity'];

//空白チェック
    $errorflag = 0;
	if ($sender_shohin == null) {
		$errorflag = 1;
	}else{
        $error_shohin = "";
    }
    if ($sender_mail_address == null) {
        $errorflag = 1;
    }else{
        $error_mail = "";
    }
    if ($contact_body == null) {
        $errorflag = 1;
    }else{
        $error_quantity = "";
    }
	
    if ($errorflag == 1){
        echo "alert('カートに商品を入れることが出来ませんでした。\nもう一度お確かめください。')";
    }else{
        $db->InsertCart($sender_mail_address,$sender_shohin,$sender_quantity);
        echo "alert('送信が完了しました')";
    }
?>