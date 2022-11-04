<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">    
    <title>ログイン</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body{
            background-color: #e9e9e9;
        }
        .logincard{
            border: 3px solid #000000;
            border-radius: 15px;
        }
    </style>
    <?php

//セッションを使う
session_start();

if(isset($SESSION['usermail'])&&isset($SESSION['username'])){
header('location:loginsuccess.php');
}


// 変数の初期化
$usermail = '';
$pass = '';
$errorMessage = "";
function login($usermail,$pass){
    require_once "DBManager.php";
    $DB = new DBManager;
    try{
        $userdata = $DB->loginCheck($usermail);
        $counter=0;
        if(isset($userdata)==true){
            foreach ($userdata as $row) {
                if(password_verify($pass,$row['mem_pass'])){
                    $_SESSION['usermail'] = $row['mem_mail'];
                    $_SESSION['username'] = $row['mem_name'];
                    header('Location:loginSuccess.php');
                }else{
                    $errorMessage="メールアドレス又はパスワードが違います";
                    stopSubmit();
                }
                $counter++;
            }
            if($counter==0){
                $errorMessage="メールアドレス又はパスワードが違います";
                stopSubmit();
            }
        }else{
            $errorMessage="メールアドレス又はパスワードが違います";
            stopSubmit();
        }
    }catch(loginException $lex){
        $errorMessage="メールアドレス又はパスワードが違います";
        stopSubmit();
    }catch(Exception $e){
        $errorMessage=$e;
    }
}

function stopSubmit(){
    echo "<script language=javascript type=text/javascript>
        document.getElementByName(form1).onsubmit = function(){ return false }
    </script>";
}

// POST送信があるかないか判定
if (!empty($_POST)) {
  // 各データを変数に格納
  $usermail = $_POST['usermail'];
  $pass = $_POST['pass'];
  $count=0;

  // eメールアドレスバリデーションチェック
  // 空白チェック
  if ($usermail === '') {
    $errorMessage = "メールアドレスは入力必須です";
  }
  // 文字数チェック
  if (strlen($usermail) > 200) {
    $errorMessage = 'メールアドレス200文字以内で入力してください';
  }
  
  // パスワードバリデーションチェック
  // 空白チェック
  if ($pass === '') {
    $errorMessage= 'パスワードを入力してください';
  }
  // 文字数チェック
  else{
    if (strlen($pass) > 200) {
    $errorMessage = 'メールアドレス又はパスワードが違います';
    }
  // 形式チェック
    if (!preg_match("/^[a-zA-Z0-9]+$/", $pass)) {
        $errorMessage = 'メールアドレス又はパスワードが違います';
    }
    
  }
  if(empty($errorMessage)){
    login($usermail,$pass);
  }
}

?>
</head>
<body>
    <button onclick="location.href='./newMember.php'">会員登録</button>
    <button onclick="location.href='./login.php'">ログイン</button>
    <button onclick="location.href='./insertBook.php'">本の登録</button>
    <button onclick="location.href='./insertTweet.php'">つぶやき投稿</button>
    <br>

    <div class="row">
        <div class="card offset-3 col-6 text-center" style="padding-bottom:10%; ">
            <h1 class="mt-5">ログイン</h1>
            <form action="" method="post" name="form1">
                mail:<input type="text" name="usermail" class="m-3"><br>
                pass:<input type="password" name="pass" class="m-3"><br>
                <div>
                    <font color="#ff0000" id="error"><?php echo htmlspecialchars($errorMessage, ENT_QUOTES)."<br>"; ?></font>
                </div>
                <input type="submit" value="ログイン" class="mb-3 btn" id="loginButton">
            </form>
            <div class="row">
                <p class="offset-2 col-3">
                    <a href="passForget.php">パスワードを忘れた方はこちら</a>
                </p>
                <p class="offset-2 col-3">
                    <a href="newMember.php">新規会員登録</a>
                </p>
            </div>
        </div>
    </div>

    
    
    <script language="javascript" type="text/javascript">

    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <script src="./script/script.js"></script>
</body>
</html>