<?php
session_start();

//1. POSTデータ取得
$id = $_POST["id"];

//2. DB接続します
include($_SERVER['DOCUMENT_ROOT'] . '/gs_php/php04/kadai/func/function.php');// function化
$pdo = db_conn();

//３．データ登録SQL作成
$sql = "DELETE FROM gs_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行

//４．データ登録処理後
if($status==false){
  sql_error($stmt);
}else{
  // 削除成功後、セッションにフラグを設定
  $_SESSION['diary_deleted'] = true;
  redirect("/gs_php/php04/kadai/mypage/");
}

