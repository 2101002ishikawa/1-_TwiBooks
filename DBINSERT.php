<button onclick="location.href='./INSERT.php'">登録</button>
<button onclick="location.href='./login.php'">ログイン</button><br>
<?php
    require "DBManager.php";
    $DB = NEW DBManager;
    $responce = $DB->InsertUser($_POST['pass'],$_POST['username'],$_POST['usermail'],$_POST['address']);
    if($responce == 1){
        echo "登録完了しました。別ページに移動する場合は上のボタンから移動してください";
    }
?>
