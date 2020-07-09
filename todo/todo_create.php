<?php
require '../model/funcs.php';
$error = '';
$pdo = connect_db();
// 送信確認

// 項目入力のチェック
// 値が存在しないor空で送信されてきた場合はNGにする
// todoとdeadlineが完全に入力されていないと，エラーが出る
if(
  !isset($_POST['todo']) || $_POST['todo'] == '' 
  || !isset($_POST['deadline']) || $_POST['deadline'] == '' 
  ) {
    exit('PramError');
  }

  // DB接続の設定
  // db.php

// 受け取ったデータを変数に入れる
$todo = $_POST['todo'];
$deadline = $_POST['deadline'];
//  print_r($todo);
//  print_r($deadline);
//  exit();
// データ登録SQL作成

// // // `created_at`と`updated_at`には実行時の`sysdate()`関数を用いて実行時の日時を入力する
$sql ="INSERT INTO `todo_table`(`id`, `todo`,`u_name`,`email`, `deadline`, `create_at`) VALUES (null,:todo,:name,:email,:deadline,sysdate())";

// SQL準備&実行
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':todo', $todo, PDO::PARAM_STR);
$stmt->bindValue(':deadline', $deadline, PDO::PARAM_STR);
$stmt->bindValue(':name', $_SESSION["u_name"], PDO::PARAM_STR);
$stmt->bindValue(':email', $_SESSION["email"], PDO::PARAM_STR);
$status = $stmt->execute();
// print_r($status);
// exit();
// データ登録処理後
if ($status == false) {
  // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
$error = $stmt->errorInfo();
// データ登録時，失敗で以下を表示
exit('sqlError:'.$error[2]);
} else {
  // echo $status;
  // exit();
  // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
  // SQL準備&実行
$sql = "SELECT * FROM todo_table WHERE u_name=:name AND email=:email";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $_SESSION["u_name"], PDO::PARAM_STR);
$stmt->bindValue(':email', $_SESSION["email"], PDO::PARAM_STR);
$status = $stmt->execute();
$todoList = array();

while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
  $todoList[] = array(
    'id' => $row['id'],
    'todo' => $row['todo'],
    'deadline'=> $row['deadline']
  );
}

header("Content-Type: application/json; charset=UTF-8");
echo json_encode($todoList);
}

