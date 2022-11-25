<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">    
    <title>会員登録</title>
    <style>
        body{
            background-color: #e9e9e9;
        }
        .card{
            border: 3px solid #000000;
            border-radius: 15px;
        }
        #newMemberButton{
            margin-top: 30px;
        }
    </style>
    <?php
        session_start();
        
        require_once "DBManager.php";
        $db = new DBManager;
        $mem_name;
        $mem_familyname;
        $mem_firstname;
        $mem_mail;
        $mem_pass;
        $error;
        if(!empty($_POST)){
            
            $mem_mail = $_POST['usermail'];
            $mem_name = $_POST['nickName'];
            $mem_familyname= $_POST['familyName'];
            $mem_firstname= $_POST['firstName'];
            $mem_pass = $_POST['pass'];
            if($db->mailAlready($mem_mail)){
                $answer=$db->INSERTMember($mem_name,$mem_familyname,$mem_firstname,$mem_mail,$mem_pass);
                $SESSION['usermail'] = $mem_mail;
                $SESSION['username'] = $mem_name;
                $alert = "<script type='text/javascript'>alert('登録が完了しました。');</script>";
                echo $alert;
                $SESSION['usermail'] = $mem_mail;
                $SESSION['username'] = $mem_name;
                if(!empty($SESSION['usermail'])&&!empty($SESSION['username'])){

                }
            }else{
                echo "<script type='text/javascript'>alert('$mem_mail メールアドレスが既に使用されています。\n他のメールアドレスをご使用ください。');</script>";
                
            }
            
        }
    ?>
        
</head>
<body>
    <button onclick="location.href='./top.php'">トップページ</button>
    <button onclick="location.href='./newMember.php'">会員登録</button>
    <button onclick="location.href='./login.php'">ログイン</button>
    <button onclick="location.href='./insertShohin.php'">本の登録</button>
    <button onclick="location.href='./insertTweet.php'">つぶやき投稿</button>
    <br>

    <div class="card offset-3 col-6 text-center dlogincar" style="padding-bottom:10%; ">
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
            
            pass:　　　　　　　　　　　<br><input type="password" name="pass" class="m-3"><br>
            <?php if (!empty($error["pass"]) && $error['pass'] === 'blank'): ?>
                <p class="error">＊パスワードを入力してください</p>
            <?php endif ?>
            
            <input type="submit" value="登録" class="btn" id="submitBtn">
        </form>
        <div class="row">
                <p class="offset-2 col-3">
                    <a href="login.php">ログイン画面へ戻る</a>
                </p>
        </div>
    </div>
    <script language="javascript" type="text/javascript">

    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css?v=2">
</body>
</html>