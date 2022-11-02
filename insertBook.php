<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>本の情報登録</title>
    <style>
        body{
            background-color: #e9e9e9;
        }
    </style>
    <script>
        const time= new Date();
        const year = today.getFullYear();
        const month = today.getMonth()+1;
        const day = today.getDate();
        const target = document.getElementById("days");
        target.value=year+"-"+month+"-"+day;
    </script>
</head>
<body>
    <button onclick="location.href='./newMember.php'">会員登録</button>
    <button onclick="location.href='./login.php'">ログイン</button>
    <button onclick="location.href='./insertBook.php'">本の登録</button>
    <button onclick="location.href='./insertTweet.php'">つぶやき投稿</button>
    <br>

    <div class="card offset-3 col-6 text-center logincard" style="padding-bottom:10%; ">
        <h1 class="mt-5 mb-5">本の情報登録</h1>
        <form action="/" name="insertBookForm">
            <input type="text" name="shohin_mei">
            <input type="text" list="bunrui">
                <datalist id="bunrui">
                    <option value="shosetu">小説</option>
                    <option value="zasshi">雑誌</option>
                    <option value="jikokeihatu">自己啓発</option>
                    <option value="ehon">絵本</option>
                    <option value="kouryakubon">攻略本</option>
                    <option value="syashinsyuu">写真集</option>
                </datalist>
                <input type="date"name="hanbai_bi" id="days"
                    value=""
                    min="0001-01-01" max="2099-12-31">
        </form>
    </div>


    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <script src="./script/script.js"></script>
</body>
</html>