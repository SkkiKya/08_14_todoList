<?php
session_start();

include('../login/funcs.php');

loginCheck();
require_once('../db_Data/db.php');
$pdo = connect_db();
  // DB接続の設定
  // db.php

// SQL準備&実行
$sql = "SELECT * FROM todo_table WHERE u_name=:name　";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $_SESSION["u_name"], PDO::PARAM_STR);
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
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DB連携型todoリスト（一覧画面）</title>
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
<a href="../login/logout.php" class="">ログアウト</a>
  <fieldset>
    <legend>DB連携型todoリスト（一覧画面）</legend>
    <a href="todo_input.php">入力画面</a>
    <table>
      <thead>
        <tr>
          <th>id</th>
          <th>deadline</th>
          <th>todo</th>
        </tr>
      </thead>
      <tbody>
        <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
          <form action="delete.php" method="post">
            <input type='text' name='d_id'>
            <button type="submit" value="削除">削除</button>
          </form>
        <?= $output ?>
      </tbody>
    </table>
  </fieldset>
</body>

</html>