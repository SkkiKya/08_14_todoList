<?php
session_start();
require_once('../db_Data/db.php');
$pdo = connect_db();

// 受け取ったデータを変数に入れる
$name = $_POST['u_name'];
$password = $_POST['u_pw'];

$sql = "INSERT INTO `user_table`(`id`, `u_name`, `u_pw`, `indent`) VALUES (null,:name,:password,sysdate())";

// SQL準備&実行
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$status = $stmt->execute();


// データ登録処理後
if ($status == false) {
  // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
$error = $stmt->errorInfo();
// データ登録時，失敗で以下を表示
exit('sqlError:'.$error[2]);
} else {
  $_SESSION["chk_ssid"] = session_id();  //session_id();各ユーザーに一人一人違うキーを作成
  // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
  $_SESSION["u_name"] = $name;
header('Location:../todo/index.php');
}
