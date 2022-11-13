<?php
class DBManager{
    private function  dbConnect(){
        $pdo = new PDO('mysql:host=localhost;dbname=twibooks;charset=utf8',
        'Twibooks','abccsd2');
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
    }

    function shohinIdSearch($name,$bunrui,$day,$kakaku){
        $pdo = $this->dbConnect();
        $search = $pdo->prepare("SELECT shohin_id FROM shohins WHERE shohin_mei=? AND shohin_bunrui=? AND hanbai_bi=? AND shohin_kakaku=?");
        $search->bindValue(1,$name,PDO::PARAM_STR);
        $search->bindValue(2,$bunrui,PDO::PARAM_STR);
        $search->bindValue(3,$day,PDO::PARAM_STR);
        $search->bindValue(4,$kakaku,PDO::PARAM_INT);
        $search->execute();
        $id=0;
        foreach($search as $key){
            $id=$key['shohin_id'];
        }
        return $id;
    }

    function INSERTShohin($name,$bunrui,$day,$kakaku,$writer,$conpany,$isbn,$tosyo){
        $pdo = $this->dbConnect();
        $inS = $pdo->prepare("INSERT INTO shohins(shohin_mei,shohin_bunrui,hanbai_bi,shohin_kakaku) VALUES(?,?,?,?)");
        $inS->bindValue(1,$name,PDO::PARAM_STR);
        $inS->bindValue(2,$bunrui,PDO::PARAM_STR);
        $inS->bindValue(3,$day,PDO::PARAM_STR);
        $inS->bindValue(4,$kakaku,PDO::PARAM_INT);
        $inS->execute();
        $id = $this->shohinIdSearch($name,$bunrui,$day,$kakaku);
        if(!empty($writer)){
            $upwri = $pdo->prepare("UPDATE shohins set shohin_writer = ? WHERE shohin_id = ?");
            $upwri ->bindValue(1,$writer,PDO::PARAM_STR);
            $upwri ->bindValue(2,$id,PDO::PARAM_INT);
            $upwri ->execute();
        }
        if(!empty($conpany)){
            $upcon = $pdo->prepare("UPDATE shohins set shohin_conpany = ? WHERE shohin_id = ?");
            $upcon ->bindValue(1,$conpany,PDO::PARAM_STR);
            $upcon ->bindValue(2,$id,PDO::PARAM_INT);
            $upcon ->execute();
        }
        if(!empty($isbn)){
            $upisb = $pdo->prepare("UPDATE shohins set shohin_ISBN = ? WHERE shohin_id = ?");
            $upisb->bindValue(1,$isbn,PDO::PARAM_INT);
            $upisb ->bindValue(2,$id,PDO::PARAM_INT);
            $upisb ->execute();
        }
        if(!empty($bookcode)){
            $upcod = $pdo->prepare("UPDATE shohins set shohin_bookcode = ? WHERE shohin_id = ?");
            $upcod ->bindValue(1,$tosyo,PDO::PARAM_INT);
            $upcod ->bindValue(2,$id,PDO::PARAM_INT);
            $upcod ->execute();
        }
        return $id;
    }
    function getShohin($id){
        $pdo = $this->dbConnect();
        $getShohin = $pdo->prepare("SELECT * FROM shohins WHERE shohin_id = ?");
        $getShohin->bindValue(1,$id,PDO::PARAM_INT);
        $getShohin->execute();
        return $getShohin->fetchAll();
    }

    function INSERTShohinImg($id,$content,$name,$type,$size){
        $pdo = $this->dbConnect();
        for ($i=0; $i<count($name); $i++) { 
            $inImg = $pdo->prepare("INSERT INTO shohindetails(shohin_id,shohin_img,image_name,image_type,image_size,created_at) VALUES(?,?,?,?,?,now())");
            $inImg ->bindValue(1,$id,PDO::PARAM_INT);
            $inImg ->bindValue(2,file_get_contents($content[$i]),PDO::PARAM_STR);
            $inImg ->bindValue(3,$name[$i],PDO::PARAM_STR);
            $inImg ->bindValue(4,$type[$i],PDO::PARAM_STR);
            $inImg ->bindValue(5,$size[$i],PDO::PARAM_STR);
            $inImg ->execute();
        }
    }
    function getShohinImg($id){
        $pdo = $this->dbConnect();
        $getSImage = $pdo->prepare("SELECT * FROM shohindetails WHERE shohin_id = ?");
        $getSImage ->bindValue(1,$id,PDO::PARAM_STR);
        $getSImage ->execute();
        return $getSImage->fetch();
        
        exit();
    }

    function mailAlready($mail){
        $pdo = $this->dbConnect();
        $isMail = $pdo->prepare("SELECT * FROM members WHERE mem_mail = ?");
        $isMail->bindValue(1,$mail,PDO::PARAM_STR);
        $isMail->execute();
        $mails = $isMail->fetchAll();
        $count=0;
        foreach ($mails as $key){
            if($mail===$key['mem_mail']){
                $count++;
            }
        }
        if($count==0){
            return true;
        }else{
            return false;
        }
    }

    function loginCheck($mail){
        $pdo = $this->dbConnect();
        $sql = "SELECT * FROM members WHERE mem_mail=?";
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