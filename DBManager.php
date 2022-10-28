<?php
class DBManager{
    private function  dbConnect(){
        $pdo = new PDO('mysql:host=localhost;dbname=webdb;charset=utf8',
        'webuser','abccsd2');
        return $pdo;
    }
    function INSERTMember($nickname,$familyname,$firstname,$mail,$pass){
        $pdo = $this->dbConnect();
        $in = $pdo->prepare("INSERT INTO members(mem_name,mem_familyname,mem_firstname,mem_mail,mem_pass) VALUES(?,?,?,?,?)");
        $in->bindValue(1,$nickname,PDO::PARAM_STR);
        $in->bindValue(2,$familyname,PDO::PARAM_STR);
        $in->bindValue(3,$firstname,PDO::PARAM_STR);
        $in->bindValue(4,$mail,PDO::PARAM_STR);
        $in->bindValue(5,password_hash($pass,PASSWORD_DEFAULT),PDO::PARAM_STR);
        $in->execute();
        return 1;
    }

    function mailAlready($mail){
        $pdo = $this->dbConnect();
        $isMail = $pdo->prepare("SELECT COUNT(*) FROM members WHERE mem_mail = ?");
        $isMail->bindValue(1,$mail,PDO::PARAM_STR);
        $isMail->execute();
        return $isMail;
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