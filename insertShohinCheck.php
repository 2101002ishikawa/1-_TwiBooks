<?php
    session_start();
    require_once "DBManager.php";
    $db = new DBManager;
    $id=$db->INSERTShohin($_POST['shohin_mei'],$_POST['bunrui'],$_POST['hanbai_bi'],$_POST['shohin_kakaku'],$_POST['shohin_writer'],$_POST['shohin_conpany'],$_POST['isbn'],$_POST['tosyo']);
    print_r($id);
    if(!empty($_FILES['shohin_img'])){
        $db->INSERTShohinImg($id,file_get_contents($_FILES['shohin_img']['tmp_name']),$_FILES['shohin_img']['name'],$_FILES['shohin_img']['type'],$_FILES['shohin_img']['size']);
    }
?>