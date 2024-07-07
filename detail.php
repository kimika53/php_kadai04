<?php

//security設定
require_once('funcs.php');


//1.  DB接続します
$id = $_GET['id'];
try {
  $db_name = 'php_kadai04'; //データベース名
  $db_id   = 'root'; //アカウント名
  $db_pw   = ''; //パスワード：MAMPは'root'
  $db_host = 'localhost'; //DBホスト
  //ID:'root', Password: xamppは 空白 ''
//   $pdo = new PDO('mysql:dbname='. $prod_db .';charset=utf8;host='. $prod_host, $prod_id, $prod_pw);
  $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
} catch (PDOException $e) {
  exit('DB Connect Error:'.$e->getMessage());
}

//２．データ取得SQL作成
$stmt = $pdo->prepare('SELECT * FROM booklist04_table WHERE id = :id;');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute(); ///実行した結果、成功か、falseか、

//３．データ表示
$view="";
if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  
  $result = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>お気に入り登録</title>
    <style>
        fieldset{
            border: none;
        }
        a {
            text-decoration: none;
            color: inherit;
        }
    </style>
</head>

<body>

    <!-- Head[Start] -->
    <header>
        <h3><a href="select.php">お気に入り登録</a></h3>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <form method="POST" action="update.php">
        <div>
            <fieldset>
                <label>著者：<br><input type="text" name="author" value="<?= $result['author']?>"></label><br><br>
                <label>タイトル：<br><textarea name="title" rows="3" cols="30"><?= $result['title']?></textarea></label><br><br>
                <label>出版社：<br><input type="text" name="publisher" value="<?= $result['publisher']?>"></label><br><br>
                <!-- <label>出版年:<br><input type="month" name="year"></label><br><br>-->
                <input type="hidden" name="id" value="<?= $result['id']?>">
                <button type="save">登録</button>
            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->
</body>
</html>