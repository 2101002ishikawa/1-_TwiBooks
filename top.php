<?php
    session_start();
    if(isset($_SESSION['usermail'])==false
        ||isset($_SESSION['username'])==false){
            header('Location:login.php');
    }
    require_once "DBManager.php";
    $db = new DBManager;
?>    
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <script src="./script/script.js"></script>
    <link rel="stylesheet" href="css/style.css?v=2">
    <title>TopPage</title>

    <style>
        .hrr{
        background-color:black;
        border: none;
        }
        .iconImg{
            border-radius:50%;
            width:50px;
            height:50px;
            float: left;
        }
        .photo{
            border-radius:10%;
            margin-top:15px;
            margin-left:19%;
            margin-right:5%;
        }
        .tweetcard{
            margin-left:3%;
            margin-right:4%;
        }
        h7{
            display: inline-block;
            width: 82%;
        }

        .goodbtn{
        border:none;
        background-color: transparent;
        margin-top:10px;
        margin-left:70px;
        }
        .badbtn{
        border:none;
        background-color: transparent;
        }

        .goodbtn.is-Good{
        animation: rainbow 3s infinite;
        }

        .badbtn.is-Bad{
        color:blue
            }

        @keyframes rainbow{
        0%{color:#ff0053;}
        12%{color:#ff5353;}
        24%{color:#ffcf53;}
        36%{color:#e8ff53;}
        48%{color:#53ff5d;}
        60%{color:#53ffbc;}
        72%{color:#5393ff;}
        84%{color:#ca53ff;}
        100%{color:#ff53bd;}
        }   
    </style>
</head>
<body>
    <button onclick="location.href='./top.php'">トップページ</button>
    <button onclick="location.href='./newMember.php'">会員登録</button>
    <button onclick="location.href='./login.php'">ログイン</button>
    <button onclick="location.href='./insertShohin.php'">本の登録</button>
    <button onclick="location.href='./insertTweet.php'">つぶやき投稿</button>
    <div  id="wrap">
        <?php
            $tweets=$db->getTweetLast(0,5);
            foreach($tweets as $row){
                $mem = $db->getMember($row['mem_mail']);
                echo "
                <div class='tweetcard1 offset-md-2 col-md-8 col-12'>
                    <div style='display: inline-block; _display: inline;'>
                        <div style='display: inline-block; _display: inline;'>
                            <i class='bi bi-person-circle' style='display: inline-block; _display: inline;'></i>
                            <h6 style='display: inline-block; _display: inline;'>
                                <b>$mem[mem_name]</b>
                            </h6>
                            <h7 style='display: inline-block; _display: inline;'>
                                $row[tweets_contents]
                            </h7>
                        </div>
                    </div>
                    <div class='row offset-1 col-10'>
                ";
                for($i = 0; $i < $db->getTweetImgCount($row['tweets_id']); $i++):
                    $image[$i] = $db->getTweetImg($row['tweets_id'],$i);
                    echo
                    "<li class='col-6' style='display: inline-block; _display: inline; padding-left3%;padding-right:3%; border:1px solid;'>"?>
                        <img src='data:images/png;base64,<?=base64_encode($image[$i]['tweets_img'])?>' class="img-fluid" style='display:inline-block;_display:inline;flex-nowrap:nowrap;'>
        <?php echo "</li>";
                endfor;
                echo "</div>";
                $path = "BookDetail.php?Sid=".$row['shohin_id'];
                echo "<div class=detail style=display:inline-block; text-align:right>
                    <p>
                        <a href=$path style=text-align: right;>詳細へ</a>
                    </p>
                </div>
            </div></div></div>
            <hr class=hrr size=3px>";
            }
        ?>
    </div>
    <!-- <div id="loadimg"></div> -->
    
    <!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script type="text/javascript" src="jquery.bottom-1.0.js"></script>
    <script type="text/javascript">
        $(function() {
 
            // オプションのproximityでbottom.jsを発生する位置を指定する
            $(window).bottom({proximity: 0.05});
            $(window).bind('bottom', function() {
    
                var obj = $(this);

                // 「loading」がfalseの時に実行
                if (!obj.data('loading')) {

                    // 「loading」をtrueにする
                    obj.data('loading', true);

                    // ローディング画像を表示
                    $('#loadimg').html('<img src="./img/loading.gif" />');

                    // 追加したい処理を記述
                    setTimeout(function() {

                        // ローディング画像を削除
                        $('#loadimg').html('');

                        // 追加するHTMLを指定
                        $('#wrap').append('<div class="box">test</div><div class="box">test</div><div class="box">test</div>');

                        // 処理が完了したら「loading」をfalseにする
                        obj.data('loading', false);

                    }, 1500);
                }
            });
            // リロードしたときにページの先頭を表示する
            $('html,body').animate({ scrollTop: 0 }, '1');
        });
    </script> -->
</body>
</html>