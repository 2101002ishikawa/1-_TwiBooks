<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TopPage</title>
    <style>
        .fixText{
            padding-left:10%;
        }
        #preview img {
            width: 200px;
            margin: 10px;
            border: solid 1px silver;
        }
    </style>
</head>
<body>
    <button onclick="location.href='./newMember.php'">会員登録</button>
    <button onclick="location.href='./login.php'">ログイン</button>
    <button onclick="location.href='./insertBook.php'">本の登録</button>
    <button onclick="location.href='./insertTweet.php'">つぶやき投稿</button>
    <br>

    <div class="card offset-3 col-6" style="padding-bottom:10%;">
        <h1 class="mt-5 mb-5 text-center">つぶやき投稿</h1>
        <form action="" method="post">
            <div class="fixText">
                <h6>mail:<font color="#ff0000">必須</font></h6>
                <input type="text" name="mem_mail" class="inputs"><br/>
                <h6><font color="#ff0000">エラーメッセージをここに表示</font></h6>
                <hr width="80%"><br/>
            </div>
            <div class="fixText">
                <h6>商品番号:<font color="#ff0000">必須</font></h6>
                <input type="text" name="shohin_id" class="inputs"><br/>
                <h6><font color="#ff0000">エラーメッセージをここに表示</font></h6>
                <hr width="80%"><br/>
            </div>
            <div class="fixText">
                <h6>つぶやき内容:<font color="#ff0000">必須</font></h6>
                <input type="text" name="tweets_contents" class="inputs"><br/>
                <h6><font color="#ff0000">エラーメッセージをここに表示</font></h6>
                <hr width="80%"><br/>
            </div>
            <div class="fixText">
                <h6>画像<font color="#ff0000"></font></h6>
                <input type="file" name="tweets_img" class="inputs" id="example" multiple><br/>
                <!-- 👇ここにプレビュー画像を追加する -->
                <div id="preview"></div>
                <h6><font color="#ff0000">エラーメッセージをここに表示</font></h6>
                <hr width="80%"><br/>
            </div>
            <div class="text-center">
                <input type="submit" value="投稿する" class="btn">
            </div>
        </form>
    </div>


    <script>
        function previewFile(file) {
            // プレビュー画像を追加する要素
            const preview = document.getElementById('preview');

            // FileReaderオブジェクトを作成
            const reader = new FileReader();

            // ファイルが読み込まれたときに実行する
            reader.onload = function (e) {
                const imageUrl = e.target.result; // 画像のURLはevent.target.resultで呼び出せる
                const img = document.createElement("img"); // img要素を作成
                img.src = imageUrl; // 画像のURLをimg要素にセット
                preview.appendChild(img); // #previewの中に追加
        }

        // いざファイルを読み込む
        reader.readAsDataURL(file);
        }

        // <input>でファイルが選択されたときの処理
        const fileInput = document.getElementById('example');
        const handleFileSelect = () => {
            const files = fileInput.files;
                for (let i = 0; i < files.length; i++) {
                    previewFile(files[i]);
                }
        }
        fileInput.addEventListener('change', handleFileSelect);
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <script src="./script/script.js"></script>
    <link rel="stylesheet" href="css/style.css">
</body>
</html>