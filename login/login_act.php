<?php
session_start();
$lname = $_POST["lname"];
$lpw = $_POST["lpw"];

// DB接続の設定
include('../db_Data/db.php');
$pdo = connect_db();

// 2.SQL準備&実行
$sql = 'SELECT * FROM user_table WHERE u_name=:lname AND u_pw=:lpw';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':lname', $lname);
$stmt->bindValue(':lpw', $lpw);
$status = $stmt->execute();

// データ登録処理後
if ($status == false) {
    // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
    $error = $stmt->errorInfo();
    // データ登録失敗次にエラーを表示
    exit('sqlError:'.$error[2]);
}

// 3.抽出データ数を取得
$val = $stmt->fetch();
// print_r($val["id"]);
// exit();
// 4.該当レコードがあればSESSIONに値を代入
if( $val["id"] != ""){
    $_SESSION["chk_ssid"] = session_id();  //session_id();各ユーザーに一人一人違うキーを作成
    $_SESSION["u_name"] = $val["u_name"];
    // 正常にSQL処理が実行された場合はtodo_input.phpに移動
    // echo $_SESSION["chk_ssid"];
    // exit();
    header('Location:../todo/index.php');
}else {
    // NGの場合はlogin.phpに移動
    header('Location:NG.php');
}
// 処理終了
exit();
?>

<!-- bbbbb -->
<!-- dddddd -->