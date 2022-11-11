<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>TopPage</title>
</head>
<body>
    <button onclick="location.href='./top.php'">トップページ</button>
    <button onclick="location.href='./newMember.php'">会員登録</button>
    <button onclick="location.href='./login.php'">ログイン</button>
    <button onclick="location.href='./insertBook.php'">本の登録</button>
    <button onclick="location.href='./insertTweet.php'">つぶやき投稿</button>
    <br>
    <div class="row">
        <div class="offset-3 col-6 tweetcard mt-5">
            <div>
                <img src="img/proto_icon.png" style="height:50px; width:50px; text-align:center"><nobr>
                <p style="display:inline-block">どやっちゃま</p>
            </div>
            <p class="text mt-2">これはテスト用ツイートです。<br>これはテスト用ツイートです。<br>これはテスト用ツイートです。<br>これはテスト用ツイートです。</p>
            <div class="" >
                <div class="good" style="display:inline-block;">
                    <i class="bi bi-hand-thumbs-up"></i>
                    <p style="display:inline-block;">1000</p>
                </div>
                <div class="bad" style="display:inline-block;">
                    <i class="bi bi-hand-thumbs-down" style="display:inline-block;"></i>
                    <p style="display:inline-block;">0</p>
                </div>
                <div class="detail" style="display:inline-block; text-align:right">
                    <p ><a href="BookDetail.html" style="text-align: right;">詳細へ</a></p>
                </div>
            </div>
        </div>
        <div class="offset-3 col-6 tweetcard">
            <div>
                <img src="img/proto_icon.png" style="height:50px; width:50px; text-align:center"><nobr>
                <p style="display:inline-block">どやっちゃま</p>
            </div>
            <p class="text mt-2">これはテスト用ツイートです。<br>これはテスト用ツイートです。<br>これはテスト用ツイートです。<br>これはテスト用ツイートです。</p>
            <div class="" >
                <div class="good" style="display:inline-block;">
                    <i class="bi bi-hand-thumbs-up"></i>
                    <p style="display:inline-block;">1000</p>
                </div>
                <div class="bad" style="display:inline-block;">
                    <i class="bi bi-hand-thumbs-down" style="display:inline-block;"></i>
                    <p style="display:inline-block;">0</p>
                </div>
                <div class="detail" style="display:inline-block; text-align:right">
                    <p ><a href="BookDetail.html" style="text-align: right;">詳細へ</a></p>
                </div>
            </div>
        </div>
        <div class="offset-3 col-6 tweetcard mt-10">
            <div>
                <img src="img/proto_icon.png" style="height:50px; width:50px; text-align:center"><nobr>
                <p style="display:inline-block">どやっちゃま</p>
            </div>
            <p class="text mt-2">これはテスト用ツイートです。<br>これはテスト用ツイートです。<br>これはテスト用ツイートです。<br>これはテスト用ツイートです。</p>
            <div class="" >
                <div class="good" style="display:inline-block;">
                    <i class="bi bi-hand-thumbs-up"></i>
                    <p style="display:inline-block;">1000</p>
                </div>
                <div class="bad" style="display:inline-block;">
                    <i class="bi bi-hand-thumbs-down" style="display:inline-block;"></i>
                    <p style="display:inline-block;">0</p>
                </div>
                <div class="detail" style="display:inline-block; text-align:right">
                    <p ><a href="BookDetail.html" style="text-align: right;">詳細へ</a></p>
                </div>
            </div>
        </div>
    </div>


    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <script src="./script/script.js"></script>
    <link rel="stylesheet" href="css/style.css?v=2">
</body>
</html>