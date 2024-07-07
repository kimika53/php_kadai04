<?php
session_start();
require_once('funcs.php');
loginCheck();
//1. POSTデータ取得
$id = $_GET['id'];

//2. DB接続します


try {
  $db_name = 'php_kadai04'; //データベース名
  $db_id   = 'root'; //アカウント名
  $db_pw   = ''; //パスワード：MAMPは'root'
  $db_host = 'localhost'; //DBホスト
  // ID:'root', Password: xamppは 空白 ''
  // $pdo = new PDO('mysql:dbname='. $prod_db .';charset=utf8;host='. $prod_host, $prod_id, $prod_pw);
  $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}


//３．データ登録SQL作成 /SQL文を用意
$stmt = $pdo->prepare('DELETE FROM booklist04_table WHERE id = :id;'); /// 

//  2. バインド変数を用意
// Integer 数値の場合 PDO::PARAM_INT
// String文字列の場合 PDO::PARAM_STR
$stmt->bindValue(':id', $id, PDO::PARAM_INT);

//  3. 実行
$status = $stmt->execute();

//４．データ登録処理後
if($status === false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit('ErrorMessage:'.$error[2]);
}else{
  header('Location: select.php'); 
}
?>