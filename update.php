<?php

//1. POSTデータ取得
$author = $_POST['author'];
$title = $_POST['title'];
$publisher = $_POST['publisher'];
$id = $_POST['id']; ///


//2. DB接続します
try {
  $db_name = 'php_kadai04'; //データベース名
  $db_id   = 'root'; //アカウント名
  $db_pw   = ''; //パスワード：MAMPは'root'
  $db_host = 'localhost'; //DBホスト
  //ID:'root', Password: xamppは 空白 ''
  // $pdo = new PDO('mysql:dbname='. $prod_db .';charset=utf8;host='. $prod_host, $prod_id, $prod_pw);
  $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}

//３．データ登録SQL作成 /SQL文を用意
$stmt = $pdo->prepare('UPDATE booklist04_table SET author= :author, title= :title, publisher= :publisher WHERE id= :id;'); /// :xxxとは悪用されないように直接に入力するのではなく、変数のようなものを用意して処理する

//  2. バインド変数を用意
// Integer 数値の場合 PDO::PARAM_INT
// String文字列の場合 PDO::PARAM_STR

$stmt->bindValue(':author', $author, PDO::PARAM_STR);
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':publisher', $publisher, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);

//  3. 実行
$status = $stmt->execute();

//４．データ登録処理後
if($status === false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit('ErrorMessage:'.$error[2]);
}else{
 
  header('Location: index.php');

}
?>