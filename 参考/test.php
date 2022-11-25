<?PHP
    $name="本";
    $bunrui="絵本";
    $day="2022-11-16";
    $kakaku="5000";
    $pdo = new PDO('mysql:host=mysql209.phy.lolipop.lan;dbname=LAA1417839-twibooks;charset=utf8',
    'LAA1417839','Twibooks');
    $inS = $pdo->prepare("INSERT INTO shohins(shohin_mei,shohin_bunrui,hanbai_bi,shohin_kakaku) VALUES(?,?,?,?)");
    $inS->bindValue(1,$name,PDO::PARAM_STR);
    $inS->bindValue(2,$bunrui,PDO::PARAM_STR);
    $inS->bindValue(3,$day,PDO::PARAM_STR);
    $inS->bindValue(4,$kakaku,PDO::PARAM_INT);
    $inS->execute();
    $data = $inS->fetchAll();
    $id=$data['shohin_id'];
    $getShohin = $pdo->prepare("SELECT * FROM shohins WHERE shohin_id = ?");
    $getShohin->bindValue(1,$id,PDO::PARAM_INT);
    $getShohin->execute();
    $getShohin->fetchAll();
    foreach ($getShohin as $key) {
        echo "$key[shohin_id]:$key[shohin_bunrui]:$key[shohin_mei]:$key[hanbai_bi]:$key[shohin_kakaku]<br>--------------------------------------";
    }
?>