<?php

//最初にSESSIONを開始！！ココ大事！！
session_start();


//POST値を受け取る
$lid = $_POST['lid'];
$lpw = $_POST['lpw'];

//1.  DB接続します
require_once('funcs.php');

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

//2. データ登録SQL作成
// booklist_user_tableに、IDとWPがあるか確認する。
// $stmt = $pdo->prepare('SELECT * FROM booklist_user_table WHERE lid = :lid AND lpw = :lpw'); ///hash化されたあと、【AND lpw= :lpw】を消す
$stmt = $pdo->prepare('SELECT * FROM booklist_user_table WHERE lid = :lid');
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
// $stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR); ///この段階ではなく、31行あたりにハッシュ化されたpwを確認
$status = $stmt->execute();

//3. SQL実行時にエラーがある場合STOP
if($status === false){
    $error = $stmt->errorInfo();
    exit('ErrorMessage:'.$error[2]);
}

//4. 抽出データ数を取得
$val = $stmt->fetch();

// if(password_verify($lpw, $val['lpw'])){ //* PasswordがHash化の場合はこっちのIFを使う
if( $val['id'] != ''){
    //Login成功時 該当レコードがあればSESSIONに値を代入
    $_SESSION['chk_ssid'] = session_id();
    $_SESSION['kanri'] = $val['kanri_flg'];
    header('Location: select.php');
}else{
    //Login失敗時(Logout経由)
    header('Location: login.php');
}

exit();
