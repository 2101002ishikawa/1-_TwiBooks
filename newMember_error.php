<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">    
    <title>会員登録</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body{
            background-color: #e9e9e9;
        }
        .logincard{
            border: 3px solid #000000;
            border-radius: 15px;
        }
        #newMemberButton{
            margin-top: 30px;
        }
        
    </style>
    <?php
        session_start();
        function check(){
            try{
                require_once "DBManager.php";
                $db = new DBManager;
                $mem_name;
                $mem_familyname;
                $mem_firstname;
                $mem_mail;
                $mem_pass;
                $error;
                if (!empty($_POST)) {
                    if(!$_POST['nickName']){
                        $error['nickname'] = "blank";
                    }
                    if(!$_POST['familyName']){
                        $error['familyname'] = "blank";
                    }
                    if(!$_POST['firstName']){
                        $error['firstname'] = "blank";
                    }
                    if(!$_POST['usermail']){
                        $error['usermail'] = "blank";
                    }
                    if(!$_POST['pass']){
                        $error['pass'] = "blank";
                    }
                    if(!isset($error)){
                        if($db->mailAlready($_POST['usermail'])){
                            $error['usermail'] = 'duplicate';
                            echo "<script type='text/javascript'>alert('登録を中断しました');</script>";
                            exit;
                        }
                    }
                    if (!isset($error)) {
                        if (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/",$_POST['usermail'])){
                            $error['usermail'] = 'duplicate';
                            echo "<script type='text/javascript'>alert('登録を中断しました');</script>";
                            exit;
                        }
                    }
                    
                    $mem_name = $_POST['nickName'];
                    $mem_familyname= $_POST['familyName'];
                    $mem_firstname= $_POST['firstName'];
                    $mem_mail = $_POST['usermail'];
                    $mem_pass = $_POST['pass'];
                    $alert = "<script type='text/javascript'>alert('登録が完了しました');</script>";
                        echo $alert;
                    if($db->mailAlready($mem_mail)){
                        $answer=$db->INSERTMember($mem_name,$mem_familyname,$mem_firstname,$mem_mail,$mem_pass);
                        $alert = "<script type='text/javascript'>alert('登録が完了しました');</script>";
                        echo $alert;
                        return false;
                    }else{
                        throw new Exception("a");
                    }
                }    
            }catch(SQLException $e){
                $error['mail'] = 'duplicate';
                return false;
            }catch(Exception $e){
                return false;
            }
        }
    ?>
</head>
<body>
    <button onclick="location.href='./INSERT.php'">登録</button>
    <button onclick="location.href='./login.php'">ログイン</button><br>

    <div class="card offset-3 col-6 text-center logincard" style="padding-bottom:10%; ">
        <h1 class="mt-5 mb-5">新規会員登録</h1>
        <form method="post" name="newmemberform">
            ニックネーム:　　　　　　　　<br><input type="text" name="nickName" class="m-3" placeholder="シンイチ"><br>
            <?php if (!empty($error["nickname"]) && $error['nickname'] === 'blank'): ?>
                    <p class="error">＊ニックネームを入力してください</p>
            <?php endif ?>
            
            苗字:　　　　　　　　　　　<br><input type="text" name="familyName" class="m-3" placeholder="上村"><br>
            <?php if (!empty($error["familyname"]) && $error['familyname'] === 'blank'): ?>
                <p class="error">＊苗字を入力してください</p>
            <?php endif ?>

            名前:　　　　　　　　　　　<br><input type="text" name="firstName" class="m-3" placeholder="晋一"><br>
            <?php if (!empty($error["firstname"]) && $error['firstname'] === 'blank'): ?>
                <p class="error">＊名前を入力してください</p>
            <?php endif ?>
            
            mail:　　　　　　　　　　　<br><input type="text" name="usermail" class="m-3" placeholder="example@gmail.com"><br>
            <?php if (!empty($error["usermail"]) && $error['usermail'] === 'blank'): ?>
                <p class="error">＊メールアドレスを入力してください</p>
            <?php elseif (!empty($error["usermail"]) && $error['usermail'] === 'duplicate'): ?>
                <p class="error">＊このメールアドレスはすでに登録済みです</p>
            <?php endif ?>
            
            pass:　　　　　　　　　　　<br><input type="pass" name="pass" class="m-3"><br>
            <?php if (!empty($error["pass"]) && $error['pass'] === 'blank'): ?>
                <p class="error">＊パスワードを入力してください</p>
            <?php endif ?>
            
            <input type="submit" value="登録" onsubmit="return check()" class="btn">
        </form>
        <div class="row">
                <p class="offset-2 col-3">
                    <a href="passForget.php">ログイン画面へ戻る</a>
                </p>
        </div>
    </div>
    <script language="javascript" type="text/javascript">

    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>