<?php
class DBManager{
    private function  dbConnect(){
        $pdo = new PDO('mysql:host=localhost;dbname=webdb;charset=utf8',
        'webuser','abccsd2');
        return $pdo;
    }
    function InsertUser($pass,$name,$mail,$address){
        $pdo = $this->dbConnect();
        $sql = "INSERT INTO user_tbl2(pass,username,usermail,address) VALUES(?,?,?,?)";
        $insert = $pdo->prepare($sql);
        $insert->bindValue(1,password_hash($pass,PASSWORD_DEFAULT),PDO::PARAM_STR);
        $insert->bindValue(2,$name,PDO::PARAM_STR);
        $insert->bindValue(3,$mail,PDO::PARAM_STR);
        $insert->bindValue(4,$address,PDO::PARAM_STR);
        $insert->execute();
        return 1;
    }
    function loginCheck($mail){
        $pdo = $this->dbConnect();
        $sql = "SELECT * FROM user_tbl2 WHERE usermail=?";
        $ps=$pdo->prepare($sql);
        $ps->bindValue(1,$mail,PDO::PARAM_STR);
        $ps->execute();
        $ans = $ps->fetchAll();
        return $ans;
    }
    function getUser(){
        $pdo = $this->dbConnect();
        $sql = "SELECT * FROM user_tbl2";
        $a = $pdo->query($sql);
        return $a->fetchAll();
    }
}
?>