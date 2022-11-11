<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品登録</title>
    <style>
        body{
            background-color: #e9e9e9;
        }
        .inputs{
            width:80%;
        }
        .fixText{
            padding-left:10%;
        }
        .card{
            border: 3px solid #000000;
            border-radius: 15px;
        }
        #preview img {
            width: 200px;
            margin: 10px;
            border: solid 1px silver;
        }
    </style>
    <script>
        
    </script>
</head>
<body>
    <button onclick="location.href='./top.php'">トップページ</button>
    <button onclick="location.href='./newMember.php'">会員登録</button>
    <button onclick="location.href='./login.php'">ログイン</button>
    <button onclick="location.href='./insertShohin.php'">本の登録</button>
    <button onclick="location.href='./insertTweet.php'">つぶやき投稿</button>
    <br>

    <div class="row">

    </div>
    <div class="card offset-3 col-6" style="padding-bottom:10%; ">
        <h1 class="mt-5 mb-5 text-center">本の情報登録</h1>
        <form action="insertShohinCheck.php" name="insertBookForm" method="post" enctype="multipart/form-data">
            <div class="fixText">
                <h6>商品名：<font color="#ff0000">必須</font></h6>
                <input type="text" name="shohin_mei" class="inputs"><br/>
                <h6><font color="#ff0000">エラーメッセージをここに表示</font></h6>
                <hr width="80%"><br/>
            </div>
            <div class="fixText">
                <h6>バーコード一段目(ISBNコード)：</h6>
                <input type="text" name="isbn" class="inputs"><br/>
                <h6><font color="#ff0000">エラーメッセージをここに表示</font></h6>
                <hr width="80%"><br/>
            </div>
            <div class="fixText">
                <h6>バーコード二段目(日本図書コード)：</h6>
                <input type="text" name="tosyo" class="inputs"><br/>
                <h6><font color="#ff0000">エラーメッセージをここに表示</font></h6>
                <hr width="80%"><br/>
            </div>
            <div class="fixText">
                <h6>ジャンル：<font color="#ff0000">必須</font></h6>
                <label for="b1"><input type="radio" name="bunrui" value="文芸" id="b1"checked>文芸</label><br/>
                <label for="b2"><input type="radio" name="bunrui" value="実用書" id="b2">実用書</label><br/>
                <label for="b3"><input type="radio" name="bunrui" value="ビジネス書" id="b3">ビジネス書</label><br/>
                <label for="b4"><input type="radio" name="bunrui" value="経済・経営" id="b4">経済・経営</label><br/>
                <label for="b5"><input type="radio" name="bunrui" value="絵本" id="b5">絵本</label><br/>
                <label for="b6"><input type="radio" name="bunrui" value="児童書" id="b6">児童書</label><br/>
                <label for="b7"><input type="radio" name="bunrui" value="学習参考書" id="b7">学習参考書</label><br/>
                <label for="b8"><input type="radio" name="bunrui" value="専門書" id="b8">専門書</label><br/>
                <label for="b9"><input type="radio" name="bunrui" value="コミック" id="b9">コミック</label><br/>
                <label for="b10"><input type="radio" name="bunrui" value="雑誌" id="b10">雑誌</label><br/>
                <label for="b11"><input type="radio" name="bunrui" value="その他" id="b11">その他</label><br/><br/>
                <h6><font color="#ff0000">エラーメッセージをここに表示</font></h6>
                <hr width="80%"><br/>
            </div>
            <div class="fixText">
                <h6>販売日：<font color="#ff0000">必須</font></h6>
                <input type="date" name="hanbai_bi" id="days" value="" class="inputs"><br/>
                <h6><font color="#ff0000">エラーメッセージをここに表示</font></h6>
                <hr width="80%"><br/>
            </div>
            <div class="fixText">
                <h6>価格：<font color="#ff0000">必須</font></h6>
                <input type="number" name="shohin_kakaku" class="inputs"><br/>
                <h6><font color="#ff0000">エラーメッセージをここに表示</font></h6>
                <hr width="80%"><br/>
            </div>
            <div class="fixText">
                <h6>画像<font color="#ff0000"></font></h6>
                <input type="file" name="shohin_img[]" class="inputs" id="example" multiple><br/>
                <!-- 👇ここにプレビュー画像を追加する -->
                <div id="preview"></div>
                <h6><font color="#ff0000">エラーメッセージをここに表示</font></h6>
                <hr width="80%"><br/>
            </div>
            <div class="fixText">
                <h6>著者：</h6>
                <input type="text" name="shohin_writer" class="inputs"><br/>
                <h6><font color="#ff0000">エラーメッセージをここに表示</font></h6>
                <hr width="80%"><br/>
            </div>
            <div class="fixText">
                <h6>出版社：</h6>
                <input type="text" name="shohin_conpany" class="inputs"><br/>
                <h6><font color="#ff0000">エラーメッセージをここに表示</font></h6>
                <hr width="80%"><br/>
            </div>
            <div class="text-center">
                <input type="submit" value="登録" class="btn">
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
    <link rel="stylesheet" href="css/style.css?v=2">
</body>
</html>