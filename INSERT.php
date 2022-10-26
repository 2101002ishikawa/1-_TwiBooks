<button onclick="location.href='./INSERT.php'">登録</button>
<button onclick="location.href='./login.php'">ログイン</button><br>
<form action="DBINSERT.php" method="post">
    パスワード　　：<input type="text" name="pass"><br>
    名前　　　　　：<input type="text" name="username"><br>
    メールアドレス：<input type="text" name="usermail"><br>
    住所　　　　　：<input type="text" name="address"><br>
    <input type="submit" value="登録"><br>
</form>

<?php
    require "DBManager.php";
    $DB = NEW DBManager;
    $userdata = $DB->getUser();
    echo "------------------------------------------<br>";
    foreach ($userdata as $key) {
        echo "$key[username]<br>$key[address]<br>------------------------------------------<br>";
    }

?>