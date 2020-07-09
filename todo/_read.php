<?php

// SQL準備&実行
$sql = "SELECT * FROM todo_table WHERE u_name=:name AND email=:email";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $_SESSION["u_name"], PDO::PARAM_STR);
$stmt->bindValue(':email', $_SESSION["email"], PDO::PARAM_STR);
$status = $stmt->execute();

// データ登録処理後
if ($status == false) {
    // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
    $error = $stmt->errorInfo();
    // データ登録時，失敗で以下を表示
    exit('sqlError:'.$error[2]);
} else {
    // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
  // fetchAll()関数でSQLで取得したレコードを配列で取得できる
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  // json出力(Ajaxの準備)
  header("Content-Type: application/json; charset=UTF-8");
  echo json_encode($result);
}