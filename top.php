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
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="  crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/reset.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.7.1/css/lightbox.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.7.1/js/lightbox.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="  crossorigin="anonymous"></script>
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

<nav style="padding:0;margin:0; position: fixed; width: 100%; height:75px; " class="navbar navbar-light alert alert-success">
        <div class="container" style="padding-left:0px; padding-right:0px;margin-left:0px; margin-right:0px;width:100%; height:75px">
        <!-- ロゴ -->
        <a class="navbar-brand" href="top.html"><img style ="margin-left:5px; height:60px;" src="./img/ロゴ.png" alt="サイトロゴ">
        <!-- サイト名 -->
        <img style =" height: 40px;" src="./img/サイト名.png" alt="サイト名"></a>
        <div class="form-inline ml-auto"></div>
        <!-- 検索 -->
        <div class="open-btn1"></div>
  
          <div id="search-wrap">
            
          <form role="search" method="get" id="searchform" action="top.html">
          <input type="text" value="" name="text" id="search-text" placeholder="search">

          <input type="submit" id="searchsubmit" value="">
          </form>
          </div>
        
        <!-- カート -->
        <a class="navbar-brand" style ="margin-right:5px;" href=""><svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
          <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </svg></a>
        <!-- ユーザーアイコン-->
        <a class="navbar-brand" style ="margin-right:5px;" href=""><svg   xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="	#4682B4" class="bi bi-person-circle" viewBox="0 0 16 16">
          <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
          <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
        </svg></a>
      </div>
      </div>
    </nav>

    <button onclick="location.href='./top.php'">トップページ</button>
    <button onclick="location.href='./newMember.php'">会員登録</button>
    <button onclick="location.href='./login.php'">ログイン</button>
    <button onclick="location.href='./insertShohin.php'">本の登録</button>
    <button onclick="location.href='./insertTweet.php'">つぶやき投稿</button>
    <div  id="wrap" style="margin-top:75px;">
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
                        <a href=$path style=text-align: right;>紹介された本を見る</a>
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