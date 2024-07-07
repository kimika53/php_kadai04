<?php
//共通に使う関数を記述
//XSS対応（ echoする場所で使用！それ以外はNG ）

//security設定
function h($str) {
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8'); // $strに対して、specialcharsできかせたものを返す。＝実行することがなく、stringとして表示されるだけ。
}
//DB接続


//SQLエラー


//リダイレクト



// ログインチェク処理 loginCheck()
function loginCheck(){
    if (!isset($_SESSION['chk_ssid']) || $_SESSION['chk_ssid'] !== session_id()){
        exit('LOGIN ERROR');
    }
    session_regenerate_id(true);
    $_SESSION['chk_ssid'] = session_id();
}