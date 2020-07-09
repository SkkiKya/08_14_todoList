<?PHP

function h($val){
  return htmlspecialchars($val, ENT_QUOTES);
}

// LOGIN認証がされているかチェックする関数
function loginCheck() {
  // sessionIdがなかったり，一致しないと表示する。
if( !isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"] != session_id() ){
  echo "LOGIN ERROR!";
  exit();
}else {
  // 新しいsessionIdを発行(前のセッションは無効)
session_regenerate_id();
// 新しいsessionIdを取得
$_SESSION["chk_ssid"] = session_id();
// echo "新しいセッションId：{$_SESSION["chk_ssid"]}";
}
}