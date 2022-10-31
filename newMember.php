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
        require_once "DBManager.php";
        $db = new DBManager;
        $errorMessage = "";
        $mem_name;
        $mem_familyname;
        $mem_firstname;
        $mem_mail;
        $mem_pass;

        if (!empty($_POST)) {
            $mem_name = $_POST['nickName'];
            $mem_familyname= $_POST['familyName'];
            $mem_firstname= $_POST['firstName'];
            $mem_mail = $_POST['usermail'];
            $mem_pass = $_POST['pass'];

            // eメールアドレスバリデーションチェック
            // 空白チェック
            if ($mem_mail === '') {
                $errorMessage = $errorMessage."<br>メールアドレスは入力必須です";
            }
            // 文字数チェック
            if (strlen($mem_mail) > 200) {
                $errorMessage = $errorMessage."メールアドレスは200文字以内で入力してください";
            }
            
            // パスワードバリデーションチェック
            // 空白チェック
            if ($mem_pass === '') {
                $errorMessage= $errorMessage."<br>パスワードを入力してください";
            }
            // 文字数チェック
             else{
                if (strlen($mem_pass) > 200) {
                $errorMessage = $errorMessage."<br>メールアドレス又はパスワードが違います";
                }
            // 形式チェック
                if (!preg_match("/^[a-zA-Z0-9]+$/", $mem_pass)) {
                    $errorMessage = $errorMessage."<br>メールアドレス又はパスワードが違います";
                }
            }

            //ニックネームチェック
            if ($mem_name === '') {
                $errorMessage = $errorMessage."<br>ニックネームは入力必須です";
            }
            // 文字数チェック
            if (strlen($mem_name) > 200) {
                $errorMessage = $errorMessage."<br>ニックネームは200文字以内で入力してください";
            }

            //苗字チェック
            // 空白チェック
            if ($mem_familyname === '') {
                $errorMessage = $errorMessage."<br>苗字は入力必須です";
            }
            // 文字数チェック
            if (strlen($mem_familyname) > 200) {
                $errorMessage = $errorMessage."<br>苗字は200文字以内で入力してください";
            }

            //名前チェック
            // 空白チェック
            if ($mem_firstname === '') {
                $errorMessage = $errorMessage."<br>名前は入力必須です";
            }
            // 文字数チェック
            if (strlen($mem_firstname) > 200) {
                $errorMessage = $errorMessage."<br>入力は200文字以内で入力してください";
            }

            //データベース処理の開始を判断
            if(empty($errorMessage)){
                 if($db->mailAlready($mem_mail)==0){
                    $answer=$db->INSERTMember($mem_name,$mem_familyname,$mem_firstname,$mem_mail,$mem_pass);
                    if($answer==1){
                        $_POST['check']=1;
                    }   
                }else{
                    $errorMessage = "<br>このメールアドレスは既に使用されています。";
                }
            }
        }
    ?>
</head>
<body>
    <button onclick="location.href='./INSERT.php'">登録</button>
    <button onclick="location.href='./login.php'">ログイン</button><br>

    <div class="card offset-3 col-6 text-center logincard" style="padding-bottom:10%; ">
        <h1 class="mt-5 mb-5">新規会員登録</h1>
        <form action="" method="post" name="newmemberform">
            ニックネーム:　　　　　　　　<br><input type="text" name="nickName" class="m-3" placeholder="シンイチ"><br>
            苗字:　　　　　　　　　　　<br><input type="text" name="familyName" class="m-3" placeholder="上村"><br>
            名前:　　　　　　　　　　　<br><input type="text" name="firstName" class="m-3" placeholder="晋一"><br>
            mail:　　　　　　　　　　　<br><input type="text" name="usermail" class="m-3" placeholder="example@gmail.com"><br>
            pass:　　　　　　　　　　　<br><input type="pass" name="pass" class="m-3"><br>
            <input type="hidden" name="check" value="">
            <div>
                <?php echo "<font color=#ff0000 id=error>".$errorMessage."<br></font>"; ?>
            </div>
            <input type="submit" value="登録" class="mb-3 btn" id="newMemberButton">
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
    <script language="javascript" type="text/javascript">

    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <script src="./script/script.js"></script>
</body>
</html>