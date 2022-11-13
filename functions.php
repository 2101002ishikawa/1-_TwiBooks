<?php
// データベースに接続
function connectDB() {
    $param = 'mysql:dbname=my_image;host=localhost';
    try {
        $pdo = new PDO($param, 'Twibooks', 'abccsd2');
        return $pdo;

    } catch (PDOException $e) {
        exit($e->getMessage());
    }
}
?>