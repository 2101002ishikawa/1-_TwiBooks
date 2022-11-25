<?php
require_once 'functions.php';

$pdo = connectDB();

$sql = 'SELECT * FROM shohindetails WHERE shohin_id = :shohin_id AND shohindetail_id = :shohindetail_id LIMIT 1';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':shohin_id', $_POST['id'], PDO::PARAM_INT);
$stmt->bindValue(':shohindetail_id', (int)$_POST['detailId'], PDO::PARAM_INT);
$stmt->execute();
$image = $stmt->fetch();
header('Content-type: ' . $image['image_type']);
echo $image['shohin_img'];
?>