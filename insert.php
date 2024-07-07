<?php

/**
 * 1. index.phpのフォームの部分がおかしいので、ここを書き換えて、
 * insert.phpにPOSTでデータが飛ぶようにしてください。
 * 2. insert.phpで値を受け取ってください。
 * 3. 受け取ったデータをバインド変数に与えてください。
 * 4. index.phpフォームに書き込み、送信を行ってみて、実際にPhpMyAdminを確認してみてください！
 */

//1. POSTデータ取得
$author = $_POST['author'];
$title = $_POST['title'];
$publisher = $_POST['publisher'];


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
$stmt = $pdo->prepare('INSERT INTO booklist04_table(id, author, title, publisher) VALUES(NULL, :author, :title, :publisher)'); /// :xxxとは悪用されないように直接に入力するのではなく、変数のようなものを用意して処理する

//  2. バインド変数を用意
// Integer 数値の場合 PDO::PARAM_INT
// String文字列の場合 PDO::PARAM_STR

$stmt->bindValue(':author', $author, PDO::PARAM_STR);
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':publisher', $publisher, PDO::PARAM_STR);


//  3. 実行
$status = $stmt->execute();

//４．データ登録処理後
if($status === false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit('ErrorMessage:'.$error[2]);
}else{
  //５．index.phpへリダイレクト
  header('Location: index.php');

}
?>
