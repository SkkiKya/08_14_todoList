<?php
session_start();
include('../login/funcs.php');
loginCheck();
require_once('../db_Data/db.php');
connect_db();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome!!</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <?php if(h($_SESSION["u_name"]) != ""):?>
  <h1>ようこそ <?=h($_SESSION["u_name"])?>さんのtodoリストです。</h1>
  <a href="todo_read.php">一覧画面</a>
  <a href="todo_input.php">入力画面</a>
  <a href="../login/logout.php" class="">ログアウト</a>
  <?php else: ?>
    <a href="../login/login.php"></a>
  <?php endif ?>

</body>
</html>