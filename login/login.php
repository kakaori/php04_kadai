<?php
session_start();

//POST値
$name   = $_POST["name"]; //lid
$lpw    = $_POST["lpw"]; //lpw

//1.  DB接続します
include($_SERVER['DOCUMENT_ROOT'] . '/gs_php/php04/kadai/func/function.php');// function化
$pdo = db_conn();

//2. データ登録SQL作成
//* PasswordがHash化→条件はlidのみ！！
$stmt = $pdo->prepare("SELECT * FROM user_table WHERE name=:name");
$stmt->bindValue(':name', $name, PDO::PARAM_STR);//変数
$status = $stmt->execute();

//3. SQL実行時にエラーがある場合STOP
if($status==false){
    sql_error($stmt);
}

//4. 抽出データ数を取得
$val = $stmt->fetch();         //1レコードだけ取得する方法
//$count = $stmt->fetchColumn(); //SELECT COUNT(*)で使用可能()

//5.該当１レコードがあればSESSIONに値を代入
//入力したPasswordと暗号化されたPasswordを比較！[戻り値：true,false]
$pw = password_verify($lpw, $val["lpw"]); //$lpw = password_hash($lpw, PASSWORD_DEFAULT);   //パスワードハッシュ化
if($pw){ 
  //Login成功時
  $_SESSION["chk_ssid"]  = session_id();
  $_SESSION["kanri_flg"] = $val['kanri_flg'];
  $_SESSION["name"]      = $val['name'];
  $_SESSION["id"]        = $val['id'];
  // ログイン成功時
  $_SESSION['login_success'] = true;
  //Login成功時（select.phpへ）
  redirect("/gs_php/php04/kadai/mypage/");
}else{
  //Login失敗時(login.phpへ)
  redirect("/gs_php/php04/kadai/login/");
}

exit();


