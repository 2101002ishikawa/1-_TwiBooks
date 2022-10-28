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
        session_start();
    ?>
</head>
<body>
    <button onclick="location.href='./INSERT.php'">登録</button>
    <button onclick="location.href='./login.php'">ログイン</button><br>

    <div class="card offset-3 col-6 text-center logincard" style="padding-bottom:10%; ">
        <h1 class="mt-5">新規会員登録</h1>
        <form action="" method="post" name="form1">
            mail:<input type="text" name="usermail" class="m-3"><br>
            pass:<input type="pass" name="pass" class="m-3"><br>
            <div>
                <font color="#ff0000" id="error"><?php echo htmlspecialchars($errorMessage, ENT_QUOTES)."<br>"; ?></font>
            </div>
            <input type="submit" value="登録" class="mb-3 btn" id="newMemberButton">
        </form>
    </div>
    <script language="javascript" type="text/javascript">

    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <script src="./script/script.js"></script>
</body>
</html>