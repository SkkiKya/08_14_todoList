<?php
require_once('../db_Data/db.php');
connect_db();

// 削除内容の取得
$d_id = $_POST["d_id"];

// データを削除
$sql = "DELETE FROM `todo_table` WHERE id = :d_id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":d_id", $d_id);
$status = $stmt->execute();

// データ登録処理後
if ($status == false) {
  // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
$error = $stmt->errorInfo();
// データ登録時，失敗で以下を表示
exit('sqlError:'.$error[2]);
} else {
  // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
header('Location:todo_read.php');
}