<?php
    session_start();
    require_once "DBManager.php";
    $db = new DBManager;
    $id=$db->INSERTShohin($_POST['shohin_mei'],$_POST['bunrui'],$_POST['hanbai_bi'],$_POST['shohin_kakaku'],);
    print_r($id);
?>