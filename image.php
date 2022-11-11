<?php
require_once 'functions.php';

$pdo = connectDB();

$sql = 'SELECT * FROM shohindetails WHERE shohin_id = :shohin_id AND shohindetail_id = :shohindetail_id LIMIT 1';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':shohin_id', (int)$_GET['id'], PDO::PARAM_INT);
$stmt->bindValue(':shohindetail_id', (int)$_GET['detailId'], PDO::PARAM_INT);
$stmt->execute();
$image = $stmt->fetch();

header('Content-type: ' . $image['image_type']);
echo $image['image_content'];
exit();
?>