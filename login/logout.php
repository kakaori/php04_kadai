<?php
session_start();

//SESSIONを初期化（空っぽにする） //
$_SESSION = array(); //

//Cookieに保存してある"SessionIDの保存期間を過去にして破棄　
if (isset($_COOKIE[session_name()])) { //session_name()は、セッションID名を返す関数
    setcookie(session_name(), '', time()-42000, '/');
}

//サーバ側での、セッションIDの破棄
session_destroy(); //XAMMPのファイルを削除している

//処理後、index.phpへリダイレクト
header("Location: /gs_php/php04/kadai/");
exit();