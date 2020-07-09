<?php
require '../model/funcs.php';
loginCheck();
$pdo = connect_db();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DB連携型todoリスト（入力画面）</title>
  <link rel="stylesheet" href="../css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script> 
</head>

<body>
<a href="../login/logout.php" class="">ログアウト</a>
<fieldset>
  <legend>DB連携型todoリスト（入力画面）</legend>
  <!-- <form action="todo_create.php" method="post" id="new_todo"> -->
  <div>
     todo: <input type="text" name="todo" id="todo">
     deadline: <input type="date" name="deadline" id="date">
     <button id="submit">submit</button>
    </div>
    <!-- </form> -->
    <table id="listbox">
      <tr>
       <th>id</th><th>deadline</th><th>todo</th>
     </tr>
    </table>
    </fieldset>

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
   <script src="ajax.js"></script>
</body>
</html>